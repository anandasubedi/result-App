<?php

class ResultController extends \BaseController {

	public function all(){
		$classes = Classes::all();
		return View::make('results.all',compact('classes'));
	}
	public function student($studentId){
		$student = Student::find($studentId);
		$result = StudentMark::whereStudentId($studentId)->get();
		return View::make('results.subject');
	}
	public function subject($subject){

		//$subjects = Subject::whereClassId($class)->get();
		return View::make('results.subject');
	}

	public function classes($class){
		$results = StudentResult::whereClassId($class)->orderBy('rank')->orderBy('total_marks')->get();
		$class = Classes::find($class);
		return View::make('results.class',compact('results','class'));
	}

	public function view($student){
		$marks = StudentMark::whereStudentId($student)->get();
		$result = StudentResult::whereStudentId($student)->first();
		return View::make('results.view',compact('result','marks'));
	}

	public function calculate($classId){
		$class = Classes::find($classId);
		$students = $class->students;
		$subjects = $class->subjects;
		$passMarks = [];
		$subjectTotal = 0;
		foreach($subjects as $sub){
			$passMarks[$sub->id] = $sub->pass_marks;
			$subjectTotal+= $sub->full_marks;
		}
		StudentResult::whereClassId($classId)->delete();
		foreach($students as $student){
			$marks = StudentMark::whereStudentId($student->id)->get();
			$total = 0;
			$result = new StudentResult();
			$result->student_id = $student->id;
			$result->class_id = $classId;
			$result->remarks = "Passed";
			foreach($marks as $mark){
				if($mark->status==0){
					$result->remarks = "Failed";
					continue;
				}
				$pass_marks = $passMarks[$mark->subject_id];
				if($mark->marks_obtained < $pass_marks){
					$result->remarks = "Failed";
					continue;
				}
				$total = $total+$mark->marks_obtained;
			}
			$result->total_marks = $total;
			$result->division = "Failed";
			$result->percentage = (float)($result->total_marks/$subjectTotal)*100;
			if($result->remarks=="Passed"){
				if($result->percentage>=80)
					$result->division = "Distinction";
				elseif($result->percentage>=60 && $result->percentage<80)
					$result->division = "First";
				elseif($result->percentage>=50 && $result->percentage<60)
					$result->division = "Second";
				else
					$result->division = "Third";
			}
			$result->save();
		}
		$results = StudentResult::whereClassId($classId)->orderBy('percentage','desc')->get();
		$rank = 1;
		foreach($results as $result){
			$result->rank = $rank;
			$rank++;
			$result->save();
		}
		$success = "Result is successfully calculated";
		return Redirect::route('results.class',$classId)
			->with('success', $success);
	}

	public function createClass(){

	}
	public function createSubject(){

	}

	public function storeClass(){

	}
	public function storeSubject(){

	}
}