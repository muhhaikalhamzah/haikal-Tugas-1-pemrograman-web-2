<?php

namespace Database\Factories;

use App\Models\Penerimabantuan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Penerimabantuan>
 */
class PenerimabantuanFactory extends Factory
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
            'desa_id' => fake()->desa::inRandomDatabantuan()->first()->id,
            'nik' => fake()->numerify('###########'),
            'nama_penerima' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['Laki-Laki', 'Perempuan']),
            'alamat' => fake()->address(),
            ''
        ];
    }
}
