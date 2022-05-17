<?php

namespace Database\Seeders;

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
        $this->call(AdminSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(LessonTableSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(CourseTagSeeder::class);
    }
}
