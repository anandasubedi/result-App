<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SubjectsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('subjects')->truncate();
		$faker = Faker::create();

		$subjects = ["Science","Maths","English", "Nepali", "Social Studies"];

		foreach(range(1, 10) as $index)
		{
			foreach($subjects as $sub)
				{
					$subject = new Subject();
					$subject->name = $sub;
					$subject->class_id = $index;
					$subject->full_marks = 100;
					$subject->pass_marks = 40;
					$subject->save();
				}
		}
	}

}