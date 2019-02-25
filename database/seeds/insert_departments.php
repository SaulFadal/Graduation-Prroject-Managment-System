<?php

use Illuminate\Database\Seeder;

class insert_departments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('departments')->insert([
            'id' => null,
            'name' => 'IT',
            
        ]);
        DB::table('departments')->insert([
            'id' => null,
            'name' => 'IS',
            
        ]);
        DB::table('departments')->insert([
            'id' => null,
            'name' => 'CS',
            
        ]);
    }
}
