<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class StudentmarkTableSeeder extends Seeder {

	public function run()
	{
		DB::table('student_marks')->delete();

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Studentmark::create([
				
			]);
		}
	}

}