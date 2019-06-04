<?php 
class Advertisement{
	private $advertisement;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->advertisement     = new system\Model($this->lang.'_advertisement');
	}
	public function getPages(){
		$result  = $this->advertisement->get();
		return $result;
	}
	public function getPagiPages($start,$limit){
		$select = $this->lang."_advertisement.*, user.id as id_user, user.username";
		$this->advertisement->join('user', 'user.id = '.$this->lang.'_advertisement.author_create', 'LEFT');
		$this->advertisement->orderBy('create_time', 'DESC');
		$result  = $this->advertisement->get(null, array($start,$limit),$select);
		//$result  = $this->advertisement->rawQuery($sql);
		return $result;
	}

	public function update($data,$id){
		$this->advertisement->where('id',$id);
		$this->advertisement->update($data);
	}
	public function delete($id){
		$this->advertisement->where('id',$id);
		$this->advertisement->delete();
	}
	public function insertData($data_insert){
		$this->advertisement->insert($data_insert);
	}



	public function checkId($id){
		$this->advertisement->where('id',$id);
		$result  = $this->advertisement->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function getUserById($id){
		$this->advertisement->where('id',$id);
		$result  = $this->advertisement->getOne();
		return $result;
	}
	
	public function findSearch($search){
		$select = $this->lang."_advertisement.*, user.id as id_user, user.username";
		$this->advertisement->where($this->lang.'_advertisement.title', '%'.$search.'%', 'like');
		$this->advertisement->join('user', 'user.id = '.$this->lang.'_advertisement.author_create', 'LEFT');
		$result  = $this->advertisement->get(null,null,$select);
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_advertisement WHERE id IN (".$name.")";
		$this->advertisement->rawQuery($sql);
	}

}