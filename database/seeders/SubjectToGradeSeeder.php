<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectToGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = DB::table('Subjects')->select('id')->distinct()->get();
        $grades = DB::table('Grades')->select('id')->distinct()->get();

        foreach($grades as $grade){
            foreach($subjects as $subject){
                DB::table('Subject_Grade')->insert([
                    'subject_id' => $subject->id,
                    'grade_id' => $grade->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
