<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Faker\Generator;
use App\Models\Tag;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // unique() обязателен: у колонки name уникальный индекс, а словарь
        // faker невелик, и на пяти тегах совпадение выпадает регулярно.
        //
        // Генератор общий на все вызовы, а не свой на каждый, как в остальных
        // фабриках: unique() помнит выданные значения внутри экземпляра, и на
        // свежем экземпляре не значит ничего.
        return [
            'name' => self::faker()->unique()->word(),
        ];
    }

    private static ?Generator $generator = null;

    private static function faker(): Generator
    {
        if (self::$generator === null) {
            self::$generator = Faker::create();
        }

        return self::$generator;
    }
}
