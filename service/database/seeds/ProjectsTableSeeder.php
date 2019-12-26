<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            [
                'title' => 'منصة الكترونية لتسجيل الطلبات',
                'category_id' => '1',
                'description' => 'مطلوب إنشاء موقع الكتروني لكتابعة طلبات الطلاب واقتراحاتهم',
                'status_id' => '1',
                'progress' => '0',
                'end_date' => '12-1-2020',
                'authority_id' => '1'
            ],
            [
                'title' => 'تدقيق نص باللغة العربية',
                'category_id' => '3',
                'description' => 'كطلوب تدقيق نص مكون من حوالي 10 صفحات تدقيق لغوي دقيق',
                'status_id' => '1',
                'progress' => '0',
                'end_date' => '120-1-2020',
                'authority_id' => '2'
            ]           
        ]);
    }
}
