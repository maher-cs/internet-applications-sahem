<?php

use Illuminate\Database\Seeder;

class ProjectSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_skill')->insert([
            [
                'skill_id' => '1',
                'project_id' => '1',
            ],
            [
                'skill_id' => '5',
                'project_id' => '2',
            ]
        ]);
    }
}
