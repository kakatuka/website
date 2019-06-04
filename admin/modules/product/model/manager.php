<?php 
class Manager{
	private $manager;
	public function __construct(){
		global $_web;
		$this->lang        				= $_web['lang'];
		$this->manager     			= new system\Model($this->lang.'_manager_view_home');
	}
	public function getManagerView(){
		$select = $this->lang."_manager_view_home.*, user.id as id_user, user.username";
		$this->manager->join('user', 'user.id = '.$this->lang.'_manager_view_home.create_author', 'LEFT');
		$this->manager->orderBy($this->lang.'_manager_view_home.position','asc');
		$this->manager->where($this->lang.'_manager_view_home.status','1');
		$result  = $this->manager->get(null, null,$select);
		return $result;
	}
	public function update($data,$id){
		$this->manager->where('id',$id);
		$this->manager->update($data);
	}
	public function delete($id){
		$this->manager->where('id',$id);
		$this->manager->delete();
	}
	public function insertData($data_insert){
		return $this->manager->insert($data_insert);
	}
	public function getDataById($id){
		$this->manager->where('id',$id);
		$result  = $this->manager->getOne();
		return $result;
	}
	public function checkId($id){
		$this->manager->where('id',$id);
		$result  = $this->manager->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_manager_view_home WHERE id IN (".$name.")";
		$this->manager->rawQuery($sql);
	}
}