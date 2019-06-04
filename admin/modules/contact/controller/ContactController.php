<?php 
class ContactController extends Controller{
	public $modelContact;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->modelContact = $this->loadModel('Contact');
	}
	public function index(){
		// Check if there are any SUCCESS messages
		if (isset($_SESSION['flash_success'])) {
			$this->view->data['flash_success'] = Session::get('flash_success');
			unset($_SESSION['flash_success']);
		}
		if (isset($_SESSION['flash_warning'])) {
			$this->view->data['flash_warning'] = Session::get('flash_warning');
			unset($_SESSION['flash_warning']);
		}
		// Xuất dữ liệu với truy vấn
		$this->view->data['data'] = $this->modelContact->getPagiContact();
		$this->view->render('index');
	}
	public function del(){
		if(preg_match("/,85,/",$_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20'){
			if (isset($_GET['id']) && is_numeric($_GET['id'])) {
				$id = $_GET['id'];
				$this->modelContact->delete($id);
				$mess = array(
					'flash_success' => lang('delete_success'),
				);
				Session::create($mess);
				redirect(base_url().'contact/contact/index');
			}
		}else{
			$mess = array(
				'flash_warning' => "Bạn không có quyền này!!!"
			);
			Session::create($mess);
			redirect(base_url()."contact/contact/index");
		}
	}
	public function dellAll(){
		if (isset($_POST['all'])) {
			if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];
                $this->modelContact->dellWhereInArray($names_id);
                $mess = array(
					'flash_success' => lang('delete_all_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'contact/contact/index'
				);
				echo json_encode($data_mess);
            }
		}
	}

	public function status(){
		if (isset($_POST['status'])) {
			if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];
                if ($_POST['status']=='public') {
                	$data = array(
                		'status' => 1
                	);
                }else{
                	$data = array(
                		'status' => 0
                	);
                }
                foreach ($names_id as $value) {
                	$this->modelContact->update($data,$value);
                }
                $mess = array(
					'flash_success' => lang('status_pages_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'contact/contact/index'
				);
				echo json_encode($data_mess);
            }
		}
	}
}