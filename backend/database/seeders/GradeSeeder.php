<?php

namespace database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('grade')->insert([
            ['grade' => 'Grade 1'],
            ['grade' => 'Grade 2'],
            ['grade' => 'Grade 3'],
            ['grade' => 'Grade 4'],
            ['grade' => 'Grade 5'],
            ['grade' => 'Grade 6'],
            ['grade' => 'Grade 7'],
            ['grade' => 'Grade 8'],
            ['grade' => 'Grade 9'],
            ['grade' => 'Grade 10'],
            ['grade' => 'Grade 11'],
            ['grade' => 'Grade 12'],
        ]);
    }
}
