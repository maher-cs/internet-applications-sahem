<?php

use Illuminate\Database\Seeder;

class MajorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('majors')->insert([
            [
                'major' => 'علوم الحاسب الآلي'
            ],
            [
                'major' => 'الهندسة المدنية'
            ],
            [
                'major' => 'الرياضيات'
            ],
            [
                'major' => 'اللغة العربية'
            ]
            
        ]);
    }
}
