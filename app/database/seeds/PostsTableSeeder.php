<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('posts')->delete();
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
            $language = Language::orderByRaw("RAND()")->first();
            $user = User::orderByRaw("RAND()")->first();
			Post::create([
                'content'     => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'user_id'     => $user->id,
                'language_id' => $language->id
			]);
		}
	}

}
