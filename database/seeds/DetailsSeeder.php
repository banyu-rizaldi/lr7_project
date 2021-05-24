<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {

            // insert data ke table pegawai menggunakan Faker
            DB::table('details')->insert([
                'nama_kota' => $faker->country,
                'total_lis' => $faker->numberBetween(1, 9999999),
                'total_alert' => $faker->numberBetween(1, 999999),
                'total_churn' => $faker->numberBetween(1, 999)
            ]);
        }
    }
}
