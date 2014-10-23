<?php

class LanguagesTableSeeder extends Seeder {

	
	public function run()
    {
        DB::table('languages')->delete();
        
        $language1 = new Language();
        $language1->language = 'english';
        $language1->save();
        
        $language2 = new Language();
        $language2->language = 'french';
        $language2->save();
        
        $language3 = new Language();
        $language3->language = 'spanish';
        $language3->save();
    }

}
