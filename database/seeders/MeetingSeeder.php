<?php

namespace Database\Seeders;

use App\Models\Meeting;
use App\Models\User;
use Illuminate\Database\Seeder;

class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meeting::factory(5)->create()->each(function($meeting){
            $meeting->users()->sync(User::all()->random());
            $meeting->users()->sync(User::all()->random());
            $meeting->users()->sync(User::all()->random());
            $meeting->users()->sync(User::all()->random());
        });
    }
}
