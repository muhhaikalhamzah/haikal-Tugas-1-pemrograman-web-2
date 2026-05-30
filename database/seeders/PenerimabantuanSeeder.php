<?php

namespace Database\Seeders;

use App\Models\Penerimabantuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenerimabantuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penerimabantuan::factory()->count(500)->create();
    }
}
