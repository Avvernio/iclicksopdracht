<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'town' => Str::random(10),
            'password' => bcrypt('secret'),
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now(),
            'email_verified_at' =>Carbon::now(),
        ]);
    }
}
