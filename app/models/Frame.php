<?php

class Frame extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function image()
	{

		$image = $this->grabImage(true);
		return $image;
	}

	public function imageRaw()
	{
		$image = $this->grabImage(false);
		return $image;
	}

	protected function grabImage($overlay) {
		$resource = imagecreatefromstring(base64_decode($this->imageBytes));

		if($overlay) {
			$font = "/usr/share/fonts/truetype/msttcorefonts/arial.ttf";
			$fontsize = 10;
			$borderwidth = 5;

			//$title = DateTime::createFromFormat('Y/m/d H:i:s', $frame->captureTime);
			$title = $this->captureTime;
			$dims = imagettfbbox($fontsize, 0, $font, $title);

			$titlewidth = ($dims[4]-$dims[6])+2*$borderwidth;
			$titleheight = ($dims[3]-$dims[5])+2*$borderwidth;

			$bgcolor = imagecolorallocate($resource, 0, 0, 0);
			$fontcolor = imagecolorallocate($resource, 255, 255, 255);

			imagefilledrectangle($resource, 0, 0, $titlewidth, $titleheight, $bgcolor);
			imagettftext($resource, $fontsize, 0, $borderwidth, $borderwidth+$fontsize, $fontcolor, $font, $title);
		}

		$image = Image::make($resource);
		return $image;
	}

	public function camera() {
		return $this->belongsTo('Camera');
	}
}
