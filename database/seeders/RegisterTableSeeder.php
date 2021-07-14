<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegisterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('registers')->insert([
            'email' => 'rgowtham708@gmail.com',
            'password' => bcrypt('1234567')
        ]);
    }
}
