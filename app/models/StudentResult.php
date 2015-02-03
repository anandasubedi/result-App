<?php

class StudentResult extends \Eloquent {
	protected $table = "student_result";
	protected $fillable = [];

	public function student(){
		return $this->belongsTo('Student','student_id');
	}
	public function subject(){
		return $this->belongsTo('Subject','subject_id');
	}

}