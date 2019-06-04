<?php 
class LoginController extends Controller{
	public $modelNews;
	public $errors = array();
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->modelUser = $this->loadModel('Login');
	}
	public function index(){
		if (isset($_SESSION['id']) || isset($_SESSION['group_id'])) redirect(base_url());
		$this->view->data  = $this->modelUser->getAll(1);
		if ($this->isPost('login')==true) {
			$email = $this->input->post('email');
			$password = md5(md5("lnc".$this->input->post('password')));
			if ($email==null) {
				$this->view->errors[] = "Bạn không được để email trống!";
			}elseif ($password==null) {
				$this->view->errors[] = "Bạn không đươc để mật khẩu trống!";
			}else{
				if ($this->modelUser->checkEmail($email) > 0) {
					$user = $this->modelUser->checkLogin($email,$password);
					if (!empty($user)) {
						$data = array(
							'id' 			=> $user['id'],
							'email' 		=> $user['email'],
							'username' 		=> $user['username'],
							'avatar' 		=> $user['avatar'],
							'job' 			=> $user['job'],
							'create_time' 	=> $user['create_time'],
							'group_id'		=> $user['group_id'],
							'namepermission'=> $user['namepermission'],
							'permission_id'	=> $user['permission_id'],
							
						);
						Session::create($data);
						$data_time = array(
							'ip'   => getIp(),
							'time' => time(),
							'id_user' => $user['id']
						);
						$this->modelUser->setTime($data_time);
						redirect(base_url()."settings/settings/index");
					}else{
						$this->view->errors[] = "Mật khẩu của bạn không chính xác.";
					}
				}else{
					$this->view->errors[] = "Email của bạn không chính xác.";
				}
			}
		}
		$this->view->data['settings'] = $this->modelUser->getSettings();
		$this->view->render('index',false);
	}
	public function login(){
		
		
	}
	public function logout(){
		$data = array('id','email','username','group_id');
		Session::destroy($data);
		session_unset();
		redirect(base_url());
	}
	

	/*public function __destruct(){
		$this->loadView();
	}*/
	
}