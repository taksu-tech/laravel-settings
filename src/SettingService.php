<?php

namespace Taksu\Settings;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class SettingService
{

    /**
     *
     * @param string $key
     * @return Setting
     * @throws Exception
     */
    public function findOne(string $key)
    {
        /* @var $model Setting|null */
        $model = Setting::where('key', $key)->first();
        if ($model) {
            return $model;
        }

        throw new Exception(__("Model not found"), 404);
    }

    public function getValue(string $key, $default = null)
    {
        // first, find in cache
        $value = Cache::get($key);
        if ($value) {
            return $value;
        }

        // if not found, find in database and store it in cache
        /** @var Setting */
        try {
            $model = $this->findOne($key);
            $value = $model->value;
            Cache::forever($key, $value);
            return $value;
        } catch (Exception $e) {
            Log::error("Cannot get value in Setting for key: $key");
        }

        return $default;
    }

    public function store(string $key, $value, string $type = 'string', string $description = '')
    {
        $model = Setting::where('key', $key)->first();
        if (!$model) {
            $model = new Setting([
                'key' => $key,
            ]);
        }

        $model->type = $type;
        $model->description = $description;
        $model->value = $value;
        $model->save();

        Cache::forever($key, $value);
    }

    public function refreshCache()
    {
        $models = Setting::all();
        foreach ($models as $model) {
            Cache::forever($model->key, $model->value);
        }
    }
}
