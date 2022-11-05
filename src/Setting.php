<?php

namespace Madeadi\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    const TYPE_STRING = 'string';
    const TYPE_JSON = 'json';
    const TYPE_NUMBER = 'number';
    const TYPE_FLOAT = 'float';
    const TYPE_HTML = 'html';

    protected $fillable = [
        'key',
        'type',
        'value',
        'description',
    ];

    public function getValueAttribute($value)
    {
        switch ($this->type) {
            case 'float':
                return floatval($value);
            case 'number':
                return floatval($value);
            default:
                return $value;
        }
    }

    protected static function newFactory()
    {
        return SettingFactory::new();
    }

    /**
     * Cache the value. Every time it's accessed, read from the cache
     *
     * @param array $options
     * @return void
     */
    public function save(array $options = [])
    {
        // update the cache
        Cache::forever($this->key, $this->value);

        return parent::save($options);
    }
}
