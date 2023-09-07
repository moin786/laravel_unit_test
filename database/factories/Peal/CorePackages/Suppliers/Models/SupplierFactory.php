<?php

namespace Database\Factories\Peal\CorePackages\Suppliers\Models;


use Illuminate\Database\Eloquent\Factories\Factory;
use Peal\CorePackages\Suppliers\Models\Supplier;

class SupplierFactory extends Factory
{
    protected $model = Supplier::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'mobile' =>  $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'landphone' => $this->faker->phoneNumber(),
            'contact_person' => $this->faker->name(),
            'contact_person_mobile' => $this->faker->phoneNumber(),
            'contact_person_email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
