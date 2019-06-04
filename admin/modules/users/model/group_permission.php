<?php 
	class Group_Permission{
	private $group_permission;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->group_permission     = new system\Model('group_permission');
	}
	public function insertData_Permission($data){
		$this->group_permission->insert($data);
	}
	public function getList(){
		$result  = $this->group_permission->get();
		return $result;
	}
	
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = 'DELETE FROM group_permission WHERE id IN ('.$name.')';
		$this->group_permission->rawQuery($sql);
	}
	public function getPerById($id){
		$this->group_permission->where('id',$id);
		$result  = $this->group_permission->getOne();
		return $result;
	}
	public function getPagiPer($start,$limit){
		$select = "*";
		$result  = $this->group_permission->get(null, array($start,$limit),$select);

		//$sql ='SELECT * FROM user LIMIT '.$start.','.$limit;
		//$result  = $this->user->rawQuery($sql);
		return $result;
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