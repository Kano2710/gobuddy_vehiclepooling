<?php


class Upload
{

	private $response = array();

	private $filename = "";
	private $max_width = "";
	private $max_height = "";
	private $auto_name = "";
	private $file_name = "";
	private $save_dir = "";
	private $imagesize = array();
	private $width1 = "";
	private $height1 = "";
	private $width = "";
	private $height = "";
	private $image_p = "";
	private $type = "";
	private $formate = "";

	// For Watermark 
	private $is_watermark = false;
	private $image_path = "";
	private $watermark_text = "";
	private $image_name = "";


	function __construct($param = array())
	{

		if (count($param) > 0) {
			$this->initialize($param);
		}
	}
	function initialize($param)
	{
		$this->filename = isset($param["file"]) ? $_FILES[$param["file"]] : '';
		$this->max_width = isset($param["width"]) ? $param["width"] : '';
		$this->max_height = isset($param["height"]) ? $param["height"] : '';
		$this->auto_name = isset($param["auto_name"]) ? $param["auto_name"] : true;
		$this->file_name = isset($param["file_name"]) ? $param["file_name"] : "";
		$this->save_dir = isset($param["directory"]) ? $param["directory"] : "";
		$this->imagesize = $this->filename != '' ? getimagesize($this->filename["tmp_name"]) : '';

		// For WaterMark variable initialize
		$this->is_watermark = isset($param["is_watermark"]) ? $param["is_watermark"] : false;
		if ($this->is_watermark) {
			$this->image_path = isset($param["image_path"]) ? $param["image_path"] : "";
			$this->watermark_text = isset($param["watermark_text"]) ? $param["watermark_text"] : $_SERVER['SERVER_NAME'];
			$this->image_name = isset($param["image_name"]) ? $param["image_name"] : "";
		}
		return true;
	}
	function doUpload()
	{
		if ($this->filename == '') {
			$this->response["is_error"] = true;
			$this->response["msg"] = "Please Enter File Array";
			return $this->response;
		}
		if ($this->save_dir == '') {
			$this->response["is_error"] = true;
			$this->response["msg"] = "Please Describe Directory";
			return $this->response;
		}

		list($this->width1, $this->height1) = $this->imagesize;

		$this->width = $this->width1;
		$this->height = $this->height1;

		# taller
		if ($this->height > $this->max_height) {
			$this->width = ($this->max_height / $this->height) * $this->width;
			$this->height = $this->max_height;
		}

		# wider
		if ($this->width > $this->max_width) {
			$this->height = ($this->max_width / $this->width) * $this->height;
			$this->width = $this->max_width;
		}

		$this->image_p = imagecreatetruecolor($this->width, $this->height);

		$this->type = $this->filename["type"];
		if ($this->type == "image/png") {
			$this->image = imagecreatefrompng($this->filename['tmp_name']);
		} else if ($this->type == "image/jpeg") {
			$this->image = imagecreatefromjpeg($this->filename['tmp_name']);
		} else {
			$this->response['is_error'] = false;
			$this->response['msg'] = "invalid type";
			return $this->response;
		}

		imagecopyresized($this->image_p, $this->image, 0, 0, 0, 0, $this->width, $this->height, $this->width1, $this->height1);

		$this->formate = image_type_to_extension($this->imagesize[2]);

		if ($this->auto_name) {
			$this->file_name = md5(date('Y-m-d') . time());
		}

		$this->save_name = $this->file_name . $this->formate;
		if ($this->type == "image/png") {
			if ($this->max_width == '' && $this->max_height == '') {
				imagepng($this->image, $this->save_dir . $this->save_name);
			} else {
				imagepng($this->image_p, $this->save_dir . $this->save_name);
			}
		} else if ($this->type == "image/jpeg") {
			if ($this->max_width == '' && $this->max_height == '') {
				imagejpeg($this->image, $this->save_dir . $this->save_name);
			} else {
				imagejpeg($this->image_p, $this->save_dir . $this->save_name);
			}
		}
		$this->response["is_error"] = false;
		$this->response["full_path"] = $this->save_dir . $this->save_name;
		$this->response["image_name"] = $this->save_name;
		$this->response["image_ext"] = $this->formate;
		if ($this->is_watermark) {
			$this->image_path = $this->save_dir;
			$this->image_name = $this->save_name;
			$this->add_watermarks();
		}
		return $this->response;
	}
	function add_watermarks()
	{

		if ($this->image_path == "") {
			echo 'Please Enter Image Path';
			return false;
		}
		if ($this->image_name == "") {
			echo 'Please Enter Image Path';
			return false;
		}
		$imageURL = $this->image_path . $this->image_name;
		list($width1, $height1) = getimagesize($imageURL);
		$imageProperties = imagecreatetruecolor($width1, $height1);
		$targetLayer = imagecreatefromjpeg($imageURL);
		imagecopyresampled($imageProperties, $targetLayer, 0, 0, 0, 0, $width1, $height1, $width1, $height1);
		$WaterMarkText = $this->watermark_text;

		$watermarkColor = imagecolorallocate($imageProperties, 191, 191, 191);

		$font = 5;
		$font_width = ImageFontWidth($font);
		$font_height = ImageFontHeight($font);

		$text_width = $font_width * strlen($WaterMarkText);

		// Position to align in center
		$position_center = ceil(($width1 - $text_width) / 2);

		$text_height = $font_height;

		// Position to align in abs middle
		$position = ceil(($height1 - $text_height));
		$position_middle = ceil(($height1 - $text_height) / 2);
		$position_middle = $position - (ceil($position_middle / 4));

		imagestring($imageProperties, $font, $position_center, $position_middle, $WaterMarkText, $watermarkColor);

		header('Content-type: image/jpeg');

		imagepng($imageProperties);
		unset($imageURL);
		imagejpeg($imageProperties, $this->image_path . $this->image_name);
		imagedestroy($targetLayer);
		imagedestroy($imageProperties);
	}
}
?>