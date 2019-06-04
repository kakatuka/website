<?php 
class User{
	private $user;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->user     = new system\Model('frontend_user');
	}
	public function getAll(){
		$result  = $this->user->get();
		return $result;
	}
	public function checkEmail($email){
		$this->user->where("email",$email);
		return $this->user->num_rows();
	}
	public function checkLogin($email,$pass){
		$this->user->where("email",$email);
		$this->user->where("password",$pass);
		$this->user->where("status",'1');
		return $this->user->getOne();
	}
	public function update($data, $email, $code) {
        $this->user->where('email', $email);
        $this->user->where('verify_key', $code);
        $this->user->update($data);
    }
	public function insertData($data){
		$this->user->insert($data);
	}
	 public function checkVerify($email = null, $status = null) {
        if ($email != null) {
            $this->user->where("email", $email);
        }
        if ($status != null) {
            $this->user->where("status", $status);
        }
        return $this->user->getOne();
    }
}