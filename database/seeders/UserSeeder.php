<?php

namespace Database\Seeders;

use App\Models\categorie;
use App\Models\data;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        categorie::create([
            'name'     => 'Agaton',
            'description'    => 'agaton',
        ]);
    }
}
