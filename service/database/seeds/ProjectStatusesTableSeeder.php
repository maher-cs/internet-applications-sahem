<?php

use Illuminate\Database\Seeder;

class ProjectStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_statuses')->insert([
            [
                'status' => 'استقبال العروض'
            ],
            [
                'status' => 'تحت التنفيذ'
            ],
            [
                'status' => 'مكتمل'
            ],
            [
                'status' => 'متوقف'
            ]
            
        ]);
    }
}
