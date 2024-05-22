<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeToCycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = DB::table('Grades')->select('id')->distinct()->get();
        $cycles = DB::table('Cycles')->select('id')->distinct()->get();

        foreach($cycles as $cycle){
            foreach($grades as $grade){
                DB::table('grade_cycle')->insert([
                    'grade_id' => $grade->id,
                    'cycle_id' => $cycle->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);    
            }
        }
    }
}
