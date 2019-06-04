<?php 
class Uploadfile{
	private $file;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->file     = new system\Model('upload_file_folder');
	}
	public function getAllFile(){
		$result  = $this->file->get();
		return $result;
	}
	
}