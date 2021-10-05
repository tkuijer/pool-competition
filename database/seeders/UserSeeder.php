<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (config('admin.name')) {
            User::firstOrCreate(['email' => config('admin.email')], [
                'name' => config('admin.name'),
                'password' => bcrypt(config('admin.password')),
            ]);
        }
    }
}
