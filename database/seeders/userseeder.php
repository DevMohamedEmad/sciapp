<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id=[10,2019,2020,2000];
        $password=[10,2019,2020,2000];
        for($i=0;$i<=3;$i++){
            DB::table('users')->insert([
                'id' =>  $id[$i],
                'password' => Hash::make($password[$i]),
            ]);
        }

    }
}
