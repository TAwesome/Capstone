<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder {
    
	public function run()
	{
        $adjectives = [
            'pretty',
            'awesome',
            'interesting',
            'delicious',
            'help',
            'new',
            'important',
            'jealous',
            'blanco',
            'ojos',
            'modern',
            'loco',
            'crazy',
            'adorable',
            'amazing',
            'hilarious',
            'brilliant',
            'creepy',
            'charming',
            'cold',
            'creative',
            'considerate',
            'classic',
            'dangerous',
            'different',
            'difficult',
            'disgusting',
            'dirty',
            'easy',
            'exotic',
            'exhausted',
            'fake',
            'flashy',
            'fluffy',
            'gregarious',
            'hideous'
        ];
        DB::table('tags')->delete();
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Tag::create([
                'tag' => $faker->unique()->randomElement($adjectives)
			]);
		}
	}

}
