<?php

use Illuminate\Database\Seeder;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offers')->insert([
            [
                'description' => 'لدي خبرة سابقة في برمجة المواقع ويمكنني تنفيذ المطلوب خلال المدة المحددة إن شاء الله',
                'status_id' => '1',
                'project_id' => '1',
                'student_id' => '2'
            ],
            [
                'description' => 'عملت على عدة موقع سابقًا ولدي خبرة جيدة في برمجتها، ويمكنني تنفيذ المطلوب كمشروع مقرر تطبيقات الانترنت',
                'status_id' => '1',
                'project_id' => '1',
                'student_id' => '1'
            ]         
        ]);
    }
}
