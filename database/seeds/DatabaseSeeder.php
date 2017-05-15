<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
/*
        $this->call(DrugsTableSeeder::class);
        $this->call(DrugCommentsTableSeeder::class);*/
        $this->call(DoctorsTableSeeder::class);
        $this->call(AppointmentsTableSeeder::class);

        Model::reguard();

    }
}
