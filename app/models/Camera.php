<?php

class Camera extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function frames() {
		return $this->hasMany('Frame');
	}
}
