<?php

use Illuminate\Database\Seeder;

class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('appointments')->delete();

        $appointments = array(
            [
                'id' => 1,
                'doctor_id'=> 1,
                'has_occured' => 0,
                'patient_name' => 'Trajko Trajkovski' ,
                'time_from' => new DateTime,
                'time_to' => new DateTime,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 2,
                'doctor_id'=> 3,
                'has_occured' => 1,
                'patient_name' => 'Veljo od Popaj',
                'time_from' => new DateTime,
                'time_to' => new DateTime,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 3,
                'doctor_id'=> 4,
                'has_occured' => 0,
                'patient_name' => 'Veljo od Popaj',
                'time_from' => new DateTime,
                'time_to' => new DateTime,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 4,
                'doctor_id'=> 1,
                'has_occured' => 0,
                'patient_name' => 'Veljo od Popaj1',
                'time_from' => '2016-05-14 08:30:00',
                'time_to' => '2016-05-14 09:30:00',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 5,
                'doctor_id'=> 1,
                'has_occured' => 0,
                'patient_name' => 'Veljo od Popaj2',
                'time_from' => '2017-07-14 08:30:00',
                'time_to' => '2017-07-14 09:30:00',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 6,
                'doctor_id'=> 1,
                'has_occured' => 0,
                'patient_name' => 'Veljo od Popaj3',
                'time_from' => '2017-05-16 08:30:00',
                'time_to' => '2017-05-16 09:30:00',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 7,
                'doctor_id'=> 1,
                'has_occured' => 0,
                'patient_name' => 'Veljo od Popaj4',
                'time_from' => '2017-05-20 08:30:00',
                'time_to' => '2017-05-20 09:30:00',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
        );

        // Uncomment the below to run the seeder
        DB::table('appointments')->insert($appointments);
    }
}
