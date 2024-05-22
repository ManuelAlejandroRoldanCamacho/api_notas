<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $grades = ["6A", "6B", "7A", "7B", "8A", "8B", "9A", "9B", "10A", "10B", "11A", "11B"];
        
        foreach($grades as $grade){
            DB::table('grades')->insert([
                'grade' => $grade,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

    }
}
