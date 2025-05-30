<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'customer_name' => $this->faker->name(),
            'customer_email' => $this->faker->unique()->safeEmail(),
            'customer_phone' => $this->faker->phoneNumber(),
            'customer_address' => $this->faker->address(),
            'customer_date' => $this->faker->date(),
            'customer_image' => null,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
