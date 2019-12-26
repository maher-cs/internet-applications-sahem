<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SkillsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProjectStatusesTableSeeder::class);
        $this->call(OfferStatusesTableSeeder::class);
        $this->call(MajorsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(AuthoritiesTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(OffersTableSeeder::class);
        $this->call(SkillStudentTableSeeder::class);
        $this->call(ProjectSkillTableSeeder::class);
    }
}
