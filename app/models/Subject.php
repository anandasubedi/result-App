<?php

class Subject extends \Eloquent {
	protected $fillable = ['name','class_id','full_marks','pass_marks'];

	public function classes(){
		return $this->belongsTo('Classes','class_id');
	}

	public function marks(){
		return $this->hasMany('StudentMark','subject_id');
	}

}
