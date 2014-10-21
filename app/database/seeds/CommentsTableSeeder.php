<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('comments')->delete();
		$faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            $user = User::orderByRaw("RAND()")->first();
			Comment::create([
                'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'user_id' => $user->id
			]);
		}
	}

}
