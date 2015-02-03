<?php

class Classes extends \Eloquent {
	protected $table = "classes";
	protected $fillable = ['grade','section'];

	public function subjects(){
		return $this->hasMany('Subject','class_id');
	}

	public function students(){
		return $this->hasMany('Student','class_id');
	}
	public function passed(){
		return StudentResult::where("division","!=","Failed")->whereClassId($this->id)->count();
	}

	public function failed(){
		return StudentResult::where("division","=","Failed")->whereClassId($this->id)->count();
	}

	public function avg(){
		return substr(StudentResult::whereClassId($this->id)->avg('percentage'), 0, 5);
	}

	public function highest(){
		$highest = StudentResult::whereClassId($this->id)->orderBy('rank')->first();
		if($highest)
		return $highest->percentage."% (".$highest->student->name.")";
		return "-";
	}
}