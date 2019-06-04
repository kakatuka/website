<?php 
class Branch{
	private $branch;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->branch     = new system\Model($this->lang.'_branch');
	}
	public function getPages(){
		$result  = $this->branch->get();
		return $result;
	}
	public function getPagiPages($start,$limit){
		$select = $this->lang."_branch.*, user.id as id_user, user.username";
		$this->branch->join('user', 'user.id = '.$this->lang.'_branch.author_create', 'LEFT');
		$this->branch->orderBy('create_time', 'DESC');
		$result  = $this->branch->get(null, array($start,$limit),$select);
		//$result  = $this->branch->rawQuery($sql);
		return $result;
	}
	public function update($data,$id){
		$this->branch->where('id',$id);
		$this->branch->update($data);
	}
	public function delete($id){
		$this->branch->where('id',$id);
		$this->branch->delete();
	}
	public function insertData($data_insert){
		$this->branch->insert($data_insert);
	}



	public function checkId($id){
		$this->branch->where('id',$id);
		$result  = $this->branch->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function getUserById($id){
		$this->branch->where('id',$id);
		$result  = $this->branch->getOne();
		return $result;
	}
	
	public function findSearch($search){
		$select = $this->lang."_branch.*, user.id as id_user, user.username";
		$this->branch->where($this->lang.'_branch.title', '%'.$search.'%', 'like');
		$this->branch->join('user', 'user.id = '.$this->lang.'_branch.author_create', 'LEFT');
		$result  = $this->branch->get(null,null,$select);
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_branch WHERE id IN (".$name.")";
		$this->branch->rawQuery($sql);
	}

}