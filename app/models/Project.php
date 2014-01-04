<?php

class Project extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function cameras() {
		return $this->hasMany('Camera');
	}
}
