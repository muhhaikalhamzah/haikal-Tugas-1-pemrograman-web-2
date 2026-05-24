<?php

namespace Database\Seeders;

use App\Models\Databantuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenerimabantuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Databantuan::factory()->count(500)->create();
    }
}
