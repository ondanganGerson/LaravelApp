<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //add dummy data for testing
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'position' => 'Web Developer',
            'age'      => mt_rand(23, 60),
            'salary'   => mt_rand(50000, 150000),
            'allowances' => $this->faker->randomFloat(2, 100 , 5000)
        ];
    }
}
