<?php 
	class Grouppermission{
	private $group_permission;
	private $permission;
	public function __construct(){
		global $_web;
		$this->lang        			= $_web['lang'];
		$this->group_permission     = new system\Model('group_permission');
		$this->permission     		= new system\Model($this->lang.'_permission');
	}
	// permission
	public function getListPermission(){
		$result  = $this->permission->get();
		return $result;
	}
	// Group permission
	public function getList(){
		$result  = $this->group_permission->get();
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = 'DELETE FROM group_permission WHERE id IN ('.$name.')';
		$this->group_permission->rawQuery($sql);
	}
	public function dellWhereName($name){
		$this->group_permission->where('name',$name);
		$result  = $this->group_permission->num_rows();
		return $result;
	}
	public function getPerById($id){
		$this->group_permission->where('id',$id);
		$result  = $this->group_permission->getOne();
		return $result;
	}
	public function insertData_Permission($data){
		$this->group_permission->insert($data);
	}
	public function update($data,$id){
		$this->group_permission->where('id',$id);
		$this->group_permission->update($data);
	}
	public function delete($id){
		$this->group_permission->where('id',$id);
		$this->group_permission->delete();
	}
}
?>