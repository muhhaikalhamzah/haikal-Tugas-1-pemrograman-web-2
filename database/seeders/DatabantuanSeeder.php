<?php

namespace Database\Seeders;

use App\models\Databantuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabantuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Databantuan::factory()->count(100)->create();
    }
}
