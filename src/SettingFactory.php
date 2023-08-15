<?php

namespace Taksu\Settings;

use Illuminate\Database\Eloquent\Factories\Factory;
use Madeadi\Settings\Setting;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'key' => $this->faker->isbn10,
            'value' => $this->faker->word,
            'type' => Setting::TYPE_STRING,
            'description' => $this->faker->text(),
        ];
    }
}
