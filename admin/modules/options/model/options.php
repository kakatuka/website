<?php 
class Options{
	private $options;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->options     = new system\Model('web_options');
	}
	public function getInfo(){
		$this->options->where('id',1);
		$result  = $this->options->getOne();
		return $result;
	}
	public function update($data){
		$this->options->where('id',1);
		$this->options->update($data);
	}
}