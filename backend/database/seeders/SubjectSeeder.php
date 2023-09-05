<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('subjects')->insert([
            ['subject_name' => 'Mathematics'],
            ['subject_name' => 'Science'],
            ['subject_name' => 'English Language'],
            ['subject_name' => 'french Language'],
            ['subject_name' => 'Spanish Language'],
            ['subject_name' => 'German Language'],
            ['subject_name' => 'Social Studies'],
            ['subject_name' => 'History'],
            ['subject_name' => 'Geography'],
            ['subject_name' => 'Physical Education'],
            ['subject_name' => 'Art'],
            ['subject_name' => 'Music'],
            ['subject_name' => 'Computer Science'],
            ['subject_name' => 'Religious Studies'],
            ['subject_name' => 'Environmental Science'],
            ['subject_name' => 'Physics'],
            ['subject_name' => 'Chemistry'],
            ['subject_name' => 'Biology'],
            ['subject_name' => 'Business Studies'],
            ['subject_name' => 'Physical Science'],
            ['subject_name' => 'Agriculture'],
            ['subject_name' => 'Home Science'],
        ]);
    }
}
