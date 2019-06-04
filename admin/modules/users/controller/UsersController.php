<?php 
class UsersController extends Controller{
	public $modelUsers;
	public function __construct(){
		parent::__construct();
		$this->modelUsers = $this->loadModel('Users');
	}
	public function index(){
		global $_web;
		if (isset($_SESSION['flash_success'])) {
                $this->view->data['flash_success'] = Session::get('flash_success');
                unset($_SESSION['flash_success']);
        }
        if (isset($_SESSION['flash_warning'])) {
                $this->view->data['flash_warning'] = Session::get('flash_warning');
                unset($_SESSION['flash_warning']);
        }
		$this->view->render('index');
	}	
}