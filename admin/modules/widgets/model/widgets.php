<?php 
class Widgets{
	private $widgets;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->widgets     = new system\Model($this->lang.'_widgets');
	}
	public function getWidgets(){
		$this->widgets->orderBy('sort','ASC');
		$result  = $this->widgets->get();
		return $result;
	}
	public function update($data,$id){
		$this->widgets->where('id',$id);
		$this->widgets->update($data);
	}
	public function delete($id){
		$this->widgets->where('id',$id);
		$this->widgets->delete();
	}
	public function insertData($data_insert){
		$id = $this->widgets->insert($data_insert);
		return $id;
	}
	public function count(){
		$result  = $this->widgets->num_rows();
		return $result;
	}


	public function checkId($id){
		$this->widgets->where('id',$id);
		$result  = $this->widgets->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}

}