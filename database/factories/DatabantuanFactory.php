<?php

namespace Database\Factories;

use App\Models\Databantuan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Databantuan>
 */
class DatabantuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nokk' => fake()->numerify('###########'),
            'nik' => fake()->numerify('###########'),
            'namapenerima' => fake()->name(),
            'jeniskelamin' => fake()->randomElement(['laki-laki','perempuan']),
            'alamat' => fake()->address(),
            'pekerjaan' => fake()->jobTitle(),
            'keterangan' => fake()->sentence(),
        ];
    }
}
