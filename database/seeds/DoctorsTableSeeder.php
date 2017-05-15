<?php

use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('doctors')->delete();

        $doctors = array(
            [
                'id' => 1,
                'name' => 'Pero Perovski',
                'speciality' => 'opst lekar',
                'is_active' => 1,
                'institution' => 'Klinicki centar Majka Tereza' ,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 2,
                'name' => 'Mitre Mitrevski',
                'speciality' => 'hirurg',
                'is_active' => 1,
                'institution' => 'Filip Vtori' ,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 3,
                'name' => 'Koce Kocevski',
                'speciality' => 'ginikolog',
                'is_active' => 0,
                'institution' => 'Klinicki centar Majka Tereza' ,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 4,
                'name' => 'Ivo od probistip',
                'speciality' => 'vozac na brza pomos',
                'is_active' => 1,
                'institution' => 'Ambulanta Probistip' ,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],

        );

        // Uncomment the below to run the seeder
        DB::table('doctors')->insert($doctors);
    }
}
