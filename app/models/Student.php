<?php

class Student extends \Eloquent {
	protected $fillable = ['name','class_id','gender'];

	public function classes(){
		return $this->belongsTo('Classes','class_id');
	}

	public function marks(){
		return $this->hasMany('StudentMark','student_id');
	}
}