<?php

namespace Database\Factories;

use App\Enums\AccessType;
use App\Models\Document;
use App\Models\Employee;
use App\Models\Office;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Document>
 */
class DocumentFactory extends Factory
{
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->paragraph(),
            'uploaded_by' => Employee::get()->random(),
            'office_responsible' => Office::get()->random(),
            'file_path' => 'C:\laragon\www\udh-app\storage\app\public\forms\Web Developer Accomplishment for the month of July.docx',
            'file_content' => fake()->text(),
            'file_type' => 'docx',
            'size' => fake()->numberBetween(1000, 5000),
            'version' => fake()->randomDigit(),
            'access_level' => fake()->randomElement(AccessType::all()),
            'status' => fake()->randomElement(['active', 'archived', 'deprecated']),
            'uploaded_at' => fake()->date(),
            'coordinates' => json_encode(['latitude' => fake()->latitude(), 'longitude' => fake()->longitude()]),
        ];
    }
}
