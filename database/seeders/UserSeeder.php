<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User();
        $user->name = "mamad bagher";
        $user->email = "sefer@zon.com";
        $user->password = Hash::make('sefer@zone');
        $user->save();
    }
}
