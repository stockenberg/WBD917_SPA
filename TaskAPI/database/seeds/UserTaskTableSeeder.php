<?php

use Illuminate\Database\Seeder;

class UserTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 21; $i++){
            \Illuminate\Support\Facades\DB::table('task_user')->insert([
                'user_id' => rand(1,3),
                'task_id' => rand(1,20),
            ]);
        }
    }
}
