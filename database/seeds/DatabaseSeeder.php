<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(insert_roles::class);
         $this->call(insert_departments::class);
         $this->call(insert_users::class);
         $this->call(insert_students::class);
         $this->call(insert_supervisors::class);
         $this->call(inseer_committees::class);
    }
}
