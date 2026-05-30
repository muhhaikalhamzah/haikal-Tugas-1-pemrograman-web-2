<?php

namespace Database\Factories;

use App\Models\Desa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Penerimabantuan>
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
            'desa_id' => Desa::inRandomOrder()->first()->id,

            'nokk' => fake()->randomElement([
                '730101000001',
                '730101000002',
                '730101000003',
                '730101000004',
                '730101000005',
            ]),

            'nama_penerima' => fake()->randomElement([
                'Muh Haikal Hamzah',
                'Andi Akbar',
                'Nur Aisyah',
                'Muhammad Rizky',
                'Siti Rahma',
                'Fadli Ahmad',
                'Putri Maharani',
                'Rizal Ramadhan',
            ]),

            'jenis_kelamin' => fake()->randomElement([
                'Laki-Laki',
                'Perempuan',
            ]),

            'alamat' => fake()->randomElement([
                'Jl. Perintis Kemerdekaan',
                'Jl. Antang Raya',
                'Jl. Tamalanrea Indah',
                'Jl. Bontoala',
                'Jl. Barabaraya',
                'Jl. Sudiang Raya',
            ]),
        ];
    }
}
