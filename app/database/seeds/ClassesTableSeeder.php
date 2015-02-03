<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ClassesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('classes')->truncate();
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			$class = new Classes;
			$class->grade = $index;
			$class->save();
		}
	}

}