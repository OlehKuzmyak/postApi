<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 100; $i++){
            $user = User::firstOrFail('id', rand(1, User::count()));
            Advertisement::create([
                'title' => "title$i",
                'body' => "body$i",
                'user_id' => $user->id,
            ]);
        }
    }
}
