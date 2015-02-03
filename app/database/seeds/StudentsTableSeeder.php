<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('students')->truncate();
		DB::table('student_marks')->truncate();
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			$rand = rand(20,30);
			foreach( range(1,$rand) as $count)
			{
				$gender = rand(0,1);
				$name = ($gender == 0)?$faker->firstNameMale:$faker->firstNameFemale;
				$name = $name." ".$faker->lastName;
				$gender = ($gender == 0)?"Male":"Female";
				
				$student = new Student();
				$student->name = $name;
				$student->class_id = $index;
				$student->roll_no = $count;
				$student->gender = $gender;
				$student->save();

			/*	$student = DB::table('students')->insert([
					'name'	=> $name,
					'class_id'	=> $index,
					'gender'	=>	$gender,
				]);*/

				$subjects = Subject::whereClassId($index)->get();
				$student_type = rand(1,8);
				foreach ($subjects as $subject) {
					$roll = rand(1,30);
					$marks_obtained = null;
					$status = 0;
					if($roll>1){
						$status = 1;
						if($student_type==1){
							$marks_obtained = rand(35,50);
						}
						elseif($student_type>1 && $student_type<4){
							$marks_obtained = rand(45,60);
						}
						elseif($student_type>3 && $student_type<7){
							$marks_obtained = rand(60,80);
						}
						else{
							$marks_obtained = rand(75,90);
						}
					}
					$marks = new StudentMark();
					$marks->student_id = $student->id;
					$marks->subject_id = $subject->id;
					$marks->marks_obtained = $marks_obtained;
					$marks->status = $status;
					$marks->save();
				}
			}
		}
	}

}