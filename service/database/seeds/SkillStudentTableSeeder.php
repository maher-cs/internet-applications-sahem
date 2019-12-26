<?php

use Illuminate\Database\Seeder;

class SkillStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skill_student')->insert([
            [
                'skill_id' => '1',
                'student_id' => '1',
            ],
            [
                'skill_id' => '1',
                'student_id' => '2',
            ]
        ]);
    }
}
