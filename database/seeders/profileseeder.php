<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class profileseeder extends Seeder
{

    public function run()
    {
        $id=[10,2020,2000];
        $student_name=["mohamed emad","ahmed ali","ali ","mohamed"];

        for($i=0;$i<=2;$i++){
            DB::table('profile_student')->insert([
                'user_id' =>  $id[$i],
                'id' =>  $id[$i],
                'student_name' => $student_name[$i],
                'major' => "0",
                'minor' => "0",
                'level' => "0",
                'hours' => "0",
                'cgpa' => "0",
            ]);
        }

        DB::table('profile_student')->insert([
            'user_id' =>  "2019",
            'id' => "2019",
            'major' => "cs",
            'minor' => "stat",
            'level' => "2",
            'hours' => "40",
            'cgpa' => "3.3",
            'student_name' => "mohamed emad",
        ]);
    }
}
