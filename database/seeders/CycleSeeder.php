<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $cycles = [1,2,3,4];
        
        foreach($cycles as $cycle){
            DB::table('Cycles')->insert([
                'cycle' => $cycle,
                'created_at' => now(),
                'updated_at' => now()           
            ]);
        }

    }
}
