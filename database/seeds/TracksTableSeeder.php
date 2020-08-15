<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TracksTableSeeder extends Seeder {

    public function run() {

        DB::table('tracks')->insert([
            'id' => 1,
            'title' => 'Beginning C#',
            'summary' => 'Learn the basics of C# development and create
                .NET applications',
            'duration' => 8,
            'language' => 'C#',
            'difficulty' => 'easy'
        ]);

    }

}
