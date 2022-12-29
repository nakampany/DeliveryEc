<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'test1',
            'email' => 'test1@test.com',
            'zip_code' => '9104103',
            'address' => '福井県あわら市二面33-1-5',
            'address_detail' => 'えちぜん鉄道の駅の目の前の家',
            'tel' => '09000000000',
            'password' => Hash::make('test1111'),
            'created_at' => '2022/01/01 11:11:11'
        ]);
    }
}
