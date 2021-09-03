<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class employeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:table('employee')->insert([
        	'firstname'=>'Sujan',
        	'lastname'=>
        ]);
    }
}
