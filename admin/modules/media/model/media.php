<?php 
class Media{
	private $images;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->images     = new system\Model('upload_images_folder');
	}
	public function getAllImages(){
		$result  = $this->images->get();
		return $result;
	}
	
}