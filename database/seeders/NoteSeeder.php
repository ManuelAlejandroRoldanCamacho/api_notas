<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //This section will be repaited 15 times, onece for each subject       
        $students = DB::table('Users')->select('id')->distinct()->where('type_user', '=', 'student')->get();
        $subjects = DB::table('Subjects')->select('id')->distinct()->get();

        foreach($students as $student){
            foreach($subjects as $subject){
                $note_one = fake()->randomFloat(2, 1, 5);
                $note_two = fake()->randomFloat(2, 1, 5);
                $note_three = fake()->randomFloat(2, 1, 5);
                $note_four = fake()->randomFloat(2, 1, 5);
    
                $note_average = ($note_one + $note_two + $note_three + $note_four) / 4;
    
                DB::table('Notes')->insert([
                    'note_one' => $note_one,
                    'note_two' => $note_two,
                    'note_three' => $note_three,
                    'note_four' => $note_four,
                    'note_average' => $note_average,
                    'subject_id' => $subject->id,
                    'student_id' => $student->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }    
    }
}
