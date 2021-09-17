<?php

namespace Database\Seeders;

use App\Models\People;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        People::factory(30)->create();

        $user = new User();
        $user->name = 'Snow';
        $user->email = 'snow@winterfell.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('pa$$w0rd');
        $user->remember_token = Str::random(10);
        $user->save();
    }
}
