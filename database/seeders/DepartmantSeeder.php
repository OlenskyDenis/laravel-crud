<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department_list = 
        [
            'Operations',
            'Finance',
            'Sales',
            'Human Resource',
            'Purchase',
        ];

        for($i = 0; $i < count($department_list); $i++){
            DB::table('departmants')->insert([
                'name' => $department_list[$i],
                'employees_count' => 0,
                'top_salary' => 0,
            ]);
        }
    }
}
