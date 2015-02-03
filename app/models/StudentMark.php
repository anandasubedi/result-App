<?php

class StudentMark extends \Eloquent {
	protected $table = "student_marks";
	protected $fillable = ['subject_id','student_id','marks_obtained','status'];

	public function student(){
		return $this->belongsTo('Student','student_id');
	}
	public function subject(){
		return $this->belongsTo('Subject','subject_id');
	}
	public function getHighest(){
		return StudentMark::whereSubjectId($this->subject_id)->max('marks_obtained');
	}
}