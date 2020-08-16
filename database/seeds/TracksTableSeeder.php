<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TracksTableSeeder extends Seeder {

    public function run() {

        DB::table('tracks')->insert([
            'id' => 1,
            'title' => 'Beginning C#',
            'summary' => 'Learn the basics of C# development and create
                .NET applications.',
            'duration' => 300,
            'language' => 'C#',
            'difficulty' => 'Beginner'
        ]);

        DB::table('tracks')->insert([
            'id' => 2,
            'title' => 'Beginning Python',
            'summary' => 'Learn the fundamentals of Python development and create
                web applications using a framework.',
            'duration' => 600,
            'language' => 'Python',
            'difficulty' => 'Beginner'
        ]);

    }

}
