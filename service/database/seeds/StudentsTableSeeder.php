<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            [
                'first_name' => 'محمد ماهر',
                'last_name' => 'عزقول',
                'breif' => 'طالب علوم حاسب، مهتم بالبرمجة والذكاء الاصطناعي',
                'major_id' => '1',
                'user_id' => '1'
            ],
            [
                'first_name' => 'أسامة',
                'last_name' => 'فطاني',
                'breif' => 'طالب علوم حاسب، في السنة الثالثة، شغوف بالبرمجة',
                'major_id' => '1',
                'user_id' => '4'
            ]
        ]);
    }
}
