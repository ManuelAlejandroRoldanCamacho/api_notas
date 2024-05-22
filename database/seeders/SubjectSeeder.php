<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            "Mathematics",
            "English",
            "Science",
            "History",
            "Geography",
            "Physical Education",
            "Art",
            "Music",
            "Computer Science",
            "Biology",
            "Chemistry",
            "Physics",
            "Economics",
            "Literature",
            "Foreign Language"
        ];

        $teachers = DB::table('Users')->select('id')->where('type_user', '!=' ,'student')->get();
        
        for ($i=0; $i < 15; $i++) { 
            DB::table('Subjects')->insert([
                'subject' => $subjects[$i],
                'time_per_week' => rand(1,4),
                'teacher_asigned' => $teachers[$i]->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);    
        }
    }
}
