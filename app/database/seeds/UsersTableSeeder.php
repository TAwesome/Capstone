<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
        DB::table('users')->delete();
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			User::create([
                'first_name'      => $faker->firstName($gender = null|'male'|'female'),
                'last_name'       => $faker->lastName,
                'email'           => $faker->unique()->email,
                'date_of_birth'   => $faker->date($format = 'Y-m-d', $max = '2006-00-00'),
                'gender'          => $faker->randomElement($array = ['M','F']),
                'native_language' => $faker->randomElement($array = ['english','spanish', 'french']),
                'password'        => Hash::make('adminPass123!')
			]);
		}
	}

}
