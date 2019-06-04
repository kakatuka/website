<?php 
class Login{
	private $user,$group,$onlinem,$settings;
	public function __construct(){
		global $_web;
		$this->lang        		= $_web['lang'];
		$this->user     		= new system\Model('user');
		$this->online     		= new system\Model('online');
		$this->group     		= new system\Model('group');
		$this->settings     	= new system\Model('web_settings');
		$this->group_permission = new system\Model('group_permission');
	}
	public function getSettings(){
		$this->settings->where('id',2);
		$result = $this->settings->getOne();
		return $result;
	}
	public function getAll($id){
		$this->user->where('group_id',$id);
		$result  = $this->user->get();
		return $result;
	}
	public function checkEmail($email){
		$this->user->where("email",$email);
		return $this->user->num_rows();
	}
	public function checkLogin($email,$pass){
		$select = "user.*, group_permission.id as id_grouppermission,"
		." group_permission.name as namepermission, group_permission.permission_id";
		$this->user->where("email",$email);
		$this->user->where("password",$pass);
		$this->user->join('group_permission', 'group_permission.id = user.group_id', 'LEFT');
		return $this->user->getOne(null,$select);
	}
	public function setTime($data){
		$this->online->insert($data);
	}
	
}