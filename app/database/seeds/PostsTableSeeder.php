<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('posts')->delete();
		$faker = Faker::create();
        $user = User::first();
        $language = Language::first();

		foreach(range(1, 10) as $index)
		{
			Post::create([
                'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'user_id' => $user->id,
                'language_id' => $language->id
			]);
		}
	}

}
