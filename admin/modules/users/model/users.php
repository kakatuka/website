<?php 
class Users{
	private $group_permission;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->user     = new system\Model('user');
		$this->group_permission     = new system\Model('group_permission');
	}
	public function getUsers(){
		$result  = $this->user->get();
		return $result;
	}
	public function getGroup_permission(){
		$this->group_permission->where('status','1');
		$result  = $this->group_permission->get();
		return $result;
	}
	public function getPagiUser($start,$limit){
		$select = "*";
		$result  = $this->user->get(null, array($start,$limit),$select);

		//$sql ='SELECT * FROM user LIMIT '.$start.','.$limit;
		//$result  = $this->user->rawQuery($sql);
		return $result;
	}
	public function checkUser($username){
		$this->user->where('username',$username);
		$result  = $this->user->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function checkEmail($email){
		$this->user->where('email',$email);
		$result  = $this->user->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function checkId($id){
		$this->user->where('id',$id);
		$result  = $this->user->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function insertData($data_insert){

		// $account    = $data_insert['username'];
		// $firstname  = $data_insert['firstname'];
		// $lastname   = $data_insert['lastname'];
		// $email      = $data_insert['email'];
		// $password   = $data_insert['password'];
		// $address    = $data_insert['address'];
		// $start      = $data_insert['status'];
		// $gruop      = $data_insert['group_id'];
  //       $create     = $data_insert['create_time'];
  //       $author     = $data_insert['author'];
		// $sql ="INSERT INTO user (username,firstname,lastname,email,password,address,status,group_id,create_time,author)
  //       VALUES ('$account','$firstname','$lastname','$email','$password','address','1','$gruop','$create','$author')";
  //      dd($sql);
  //       $this->user->rawQuery($sql);
		$this->user->insert($data_insert);
	}


	public function getUserById($id){
		$this->user->where('id',$id);
		$result  = $this->user->getOne();
		return $result;
	}
	public function update($data,$id){
		$this->user->where('id',$id);
		$this->user->update($data);
	}
	public function delete($id){
		$this->user->where('id',$id);
		$this->user->delete();
	}
	public function findSearch($search){
		$this->user->where('username', '%'.$search.'%', 'like');
		$result  = $this->user->get();
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = 'DELETE FROM user WHERE id IN ('.$name.')';
		$this->user->rawQuery($sql);
	}

}