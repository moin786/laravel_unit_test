<?php

namespace Database\Factories\Peal\CorePackages\Category\Models;


use Illuminate\Database\Eloquent\Factories\Factory;
use Peal\CorePackages\Category\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'category_parent' => 0
        ];
    }
}
