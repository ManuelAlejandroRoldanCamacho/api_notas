<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        #Grades dates (OK)
        $this->call(GradeSeeder::class);

        #User dates (OK)
        User::factory()->create([
            'name' => 'Teacher Lin',
            'email' => 'lin@teacher.com',
            'type_user' => 'teacher',
        ]);

        User::factory()->count(14)->state(['type_user' => 'teacher'])->create();

        User::factory()->create([
            'name' => 'Student Jake',
            'email' => 'jack@student.com',
            'grade_id' => 12, //Grade 11B
        ]);

        for ($subject=1; $subject <= 12; $subject++) { 
            User::factory()->count(20)->state(['grade_id' => $subject])->create();
        }

        #Subjects dates (OK)
        $this->call(SubjectSeeder::class);

        #Notes dates (OK)
        $this->call(NoteSeeder::class); 

        #Cycles (OK)
        $this->call(CycleSeeder::class);
        
        #Grade_to_cycle date (OK)
        $this->call(GradeToCycleSeeder::class);

        #Subject_to_grade dates (OK)
        $this->call(SubjectToGradeSeeder::class);

        /* 
            -- Select test for the dates:
            SELECT u.id, u.name, s.subject, n.note_average, c.cycle, g.grade FROM USERS AS u
            INNER JOIN NOTES AS n ON u.id = n.student_id
            INNER JOIN SUBJECTS AS s ON n.subject_id = s.id
            INNER JOIN GRADES AS g ON u.grade_id = g.id
            INNER JOIN GRADE_CYCLE AS gc ON gc.grade_id = g.id
            INNER JOIN cycles AS c ON c.id = gc.cycle_id
            WHERE c.cycle = 2; 
        */
    }
}
