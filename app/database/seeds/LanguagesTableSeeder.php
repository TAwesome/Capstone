<?php

class LanguagesTableSeeder extends Seeder {

	
	public function run()
    {
        DB::table('languages')->delete();
        
        $language1 = new Language();
        $language1->language = 'English';
        $language1->save();
        
        $language2 = new Language();
        $language2->language = 'French';
        $language2->save();
        
        $language3 = new Language();
        $language3->language = 'Spanish';
        $language3->save();
    }

}
