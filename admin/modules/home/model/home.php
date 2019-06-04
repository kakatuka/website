<?php 
class Home{
	private $user;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->user     = new system\Model('user');
		$this->online     = new system\Model('online');
		$this->web_settings     = new system\Model('web_settings');
		$this->order     = new system\Model($this->lang.'_product_cart');
	}
	public function getUserById($id){
		$this->user->where('group_id',$id);
		$result  = $this->user->getOne();
		return $result;
	}
	public function getSettingsOne(){
		$this->web_settings->where('id',2);
		$result  = $this->web_settings->getOne();
		return $result;
	}
	public function getTotalOrder(){
		$result  = $this->order->num_rows();
		return $result;
	}
	public function getNewOrder(){
		$this->user->where('status',1);
		$result  = $this->order->num_rows();
		return $result;
	}
	public function getTotalUser(){
		$result  = $this->user->num_rows();
		return $result;
	}
	public function getCountUser($my_ip){
		$this->online->where('ip',$my_ip);
		$result  = $this->online->num_rows();
		return $result;
	}

	public function getUserOnline(){
		$select ='online.time,online.id_user,online.ip,user.username,user.avatar';
		$this->online->orderBy('time','DESC');
		$this->online->join('user', 'user.id = online.id_user', 'LEFT');
		$result  = $this->online->get(null,20,$select);
		return $result;
	}
}