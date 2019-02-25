<?php

use Illuminate\Database\Seeder;

class insert_roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        DB::table('roles')->insert([
            'id' => null,
            'type' => 'Admin',
            
        ]);
        DB::table('roles')->insert([
            'id' => null,
            'type' => 'GPC',
            
        ]);
        DB::table('roles')->insert([
            'id' => null,
            'type' => 'Supervisor',
            
        ]);
        DB::table('roles')->insert([
            'id' => null,
            'type' => 'Examinar',
            
        ]);
        DB::table('roles')->insert([
            'id' => null,
            'type' => 'Student',
            
        ]);
    }
}
