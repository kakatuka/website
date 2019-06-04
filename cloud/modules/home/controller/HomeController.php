<?php 
session_start();
class HomeController extends Controller{
	public $modelHome;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->modelHome = $this->loadModel('Home');
	}
	public function index(){
		global $_web;
		//$this->view->data  = $this->modelHome->getUserById(1);
		echo "Trang Lưu Trữ File";
	}
	public function setLang(){
		$lang = $this->input->post('lang');
		//Session::create(array('lang'=> $lang));
		$cookie_name = "lang";
		$cookie_value = $lang;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day




		$data = array(
			'status' => true,
			'mess'	 => 'Success'
		);
		
		echo json_encode($data);
	}
	public function notfound(){
		$this->view->render('404',false);
	}

	/*public function __destruct(){
		$this->loadView();
	}*/
	
}