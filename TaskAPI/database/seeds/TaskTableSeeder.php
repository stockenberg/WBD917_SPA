<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 21; $i++){
            \Illuminate\Support\Facades\DB::table('tasks')->insert([
                'title' => str_random(10),
                'description' => str_random(10),
            ]);
        }
    }
}
