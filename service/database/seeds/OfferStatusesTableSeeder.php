<?php

use Illuminate\Database\Seeder;

class OfferStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offer_statuses')->insert([
            [
                'status' => 'مقدم'
            ],
            [
                'status' => 'مختار'
            ]            
        ]);
    }
}
