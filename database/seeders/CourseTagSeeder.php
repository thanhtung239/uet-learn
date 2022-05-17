<?php

namespace Database\Seeders;

use App\Models\CourseTag;
use Illuminate\Database\Seeder;

class CourseTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseTag::factory(1000)->create();
    }
}
