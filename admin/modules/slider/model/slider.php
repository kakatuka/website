<?php 
class slider{
	private $Slider;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->slider     = new system\Model($this->lang.'_slider');
	}
	public function getPages(){
		$result  = $this->slider->get();
		return $result;
	}
	public function getPagiPages($start,$limit){
		$select = $this->lang."_slider.*, user.id as id_user, user.username";
		$this->slider->join('user', 'user.id = '.$this->lang.'_slider.author_create', 'LEFT');
		$this->slider->orderBy('create_time', 'DESC');
		$result  = $this->slider->get(null, array($start,$limit),$select);
		//$result  = $this->slider->rawQuery($sql);
		return $result;
	}

	public function update($data,$id){
		$this->slider->where('id',$id);
		$this->slider->update($data);
	}
	public function delete($id){
		$this->slider->where('id',$id);
		$this->slider->delete();
	}
	public function insertData($data_insert){
		$this->slider->insert($data_insert);
	}



	public function checkId($id){
		$this->slider->where('id',$id);
		$result  = $this->slider->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function getUserById($id){
		$this->slider->where('id',$id);
		$result  = $this->slider->getOne();
		return $result;
	}
	
	public function findSearch($search){
		$select = $this->lang."_slider.*, user.id as id_user, user.username";
		$this->slider->where($this->lang.'_slider.title', '%'.$search.'%', 'like');
		$this->slider->join('user', 'user.id = '.$this->lang.'_slider.author_create', 'LEFT');
		$result  = $this->slider->get(null,null,$select);
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_slider WHERE id IN (".$name.")";
		$this->slider->rawQuery($sql);
	}

}