<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert([
            [
                'skill' => 'برمجة',
            ],
            [
                'skill' => 'تصميم',
            ],
            [
                'skill' => 'كتابة',
            ],
            [
                'skill' => 'مونتاج',
            ],
            [
                'skill' => 'تدقيق لغوي'
            ]
        ]);
    }
}
