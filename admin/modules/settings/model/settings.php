<?php 
class Settings{
	private $images;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->settings     = new system\Model('web_settings');
	}
	public function getInfo(){
		$this->settings->where('id',2);
		$result  = $this->settings->getOne();
		return $result;
	}
	public function update($data){
		$this->settings->where('id',2);
		$this->settings->update($data);
	}
}