<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'news_type' => $this->faker->name,
            'description' => $this->faker->text,
            'eventStartDate' =>  $this->faker->dateTimeBetween('-30 days','-3 days'),
            'eventEndDate' => $this->faker->dateTimeBetween('now','+17 days'),

        ];
    }
}

