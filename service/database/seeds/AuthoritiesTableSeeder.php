<?php

use Illuminate\Database\Seeder;

class AuthoritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authorities')->insert([
            [
                'name' => 'كلية الحاسب الآلي ونظم المعلومات',
                'user_id' => '2',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'كلية اللغة العربية',
                'user_id' => '3',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]            
        ]);
    }
}
