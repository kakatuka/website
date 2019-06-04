<?php 
	class Permission{
	private $permission;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->permission     = new system\Model($this->lang.'_permission');
	}
	public function insertData_Permission($data){
		$this->permission->insert($data);
	}
	public function getList(){
		$this->permission->orderBy('create_time', 'DESC');
		$result  = $this->permission->get();
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = 'DELETE FROM '.$this->lang.'_permission WHERE id IN ('.$name.')';
		$this->permission->rawQuery($sql);
	}
	public function getPerById($id){
		$this->permission->where('id',$id);
		$result  = $this->permission->getOne();
		return $result;
	}
	public function getPagiPer($start,$limit){
		$select = "*";
		$result  = $this->permission->get(null, array($start,$limit),$select);

		//$sql ='SELECT * FROM user LIMIT '.$start.','.$limit;
		//$result  = $this->user->rawQuery($sql);
		return $result;
	}
	public function update($data,$id){
		$this->permission->where('id',$id);
		$this->permission->update($data);
	}
	public function delete($id){
		$this->permission->where('id',$id);
		$this->permission->delete();
	}
}
?>