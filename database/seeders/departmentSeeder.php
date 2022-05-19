<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class departmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id=[1,2,3,4,5,6,7];
        $department_name=["computer science","stat","phy","chem","math","ocean"];
        $counter=[2,2,2,2,2,2,2];
        for($i=0;$i<6;$i++){
            DB::table('departments')->insert([
                'id' =>  $id[$i],
                'dep_name' => $department_name[$i],
                'counter' =>  $counter[$i],
            ]);
        }

    }
}
