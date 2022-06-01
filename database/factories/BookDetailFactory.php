<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'isbn' => random_int(1000, 90000),
            'title' => $this->faker->title . " " . $this->faker->name,
            'author' => $this->faker->name,
            'genre_id' => Genre::all()->random()->id,
            'page_no' => random_int(100, 500),
            'category_id' => Category::all()->random()->id,
            'description' => $this->faker->text,
            'quantity' => random_int(5, 10),
            'encoded_by' => User::all()->random()->id,
            'date_encoded' => $this->faker->dateTimeThisYear('now', 'Jamaica')
        ];
    }

//    public function fiction()
//    {
//        return $this->state(function (array $attributes){
//
//            return [
//
//                'type' => 'fiction'
//
//            ];
//
//        });
//    }
//
//    public function nonFiction()
//    {
//        return $this->state(function (array $attributes){
//
//            return [
//
//                'type' => 'Non-fiction'
//
//            ];
//
//        });
//    }
}
