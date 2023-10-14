<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Office;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => str(date('Y'))->append('-')->append(str_pad(Employee::count() + 1, '6', '0', STR_PAD_LEFT)),
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'suffix' => fake()->suffix(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'office' => Office::get()->random()->id,
            'address' => fake()->address(),
            'position' => Position::get()->random()->id,
            'work_status' => fake()->randomElement(['Full-time', 'Part-time']),
            'active_status' => fake()->boolean(),
        ];
    }
}
