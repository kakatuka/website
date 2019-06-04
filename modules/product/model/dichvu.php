<?php 
class Dichvu{
    private $dichvu;
	public function __construct(){
		global $_web;
        $this->dichvu    = new system\Model('service');
	}
    public function getDichvu(){
        $this->dichvu->where('status',1);
        $this->dichvu->orderBy('id',"DESC");
        $data = $this->dichvu->get();
        return $data;
    }
    
}