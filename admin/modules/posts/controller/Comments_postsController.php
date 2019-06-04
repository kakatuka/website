<?php 
class Comments_postsController extends Controller{
	public $modelComments_posts;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->modelComments_posts = $this->loadModel('Comments_posts');
	}
	public function index(){
		// Check if there are any SUCCESS messages
		if (isset($_SESSION['flash_success'])) {
			$this->view->data['flash_success'] = Session::get('flash_success');
			unset($_SESSION['flash_success']);
		}
		if(preg_match("/,80,/",$_SESSION['permission_id'], $matches) || $_SESSION['id'] == $this->view->data['data']['author_create'] || $_SESSION['group_id'] == '20'){
			// Xuất dữ liệu với truy vấn
			$this->view->data['data'] = $this->modelComments_posts->getPagiComments();
			$this->view->render('comments_posts');
		}else{
			$mess = array(
				'flash_warning' => "Bạn không có quyền này!!!"
			);
			Session::create($mess);
			redirect(base_url()."posts/managerindex/index");
		}
	}
	public function del(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];
			$this->modelComments_posts->delete($id);
			$mess = array(
				'flash_success' => lang('delete_success'),
			);
			Session::create($mess);
			redirect(base_url().'posts/comments_posts/index');
		}
	}
	public function dellAll(){
		if (isset($_POST['all'])) {
			if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];
                $this->modelComments_posts->dellWhereInArray($names_id);
                $mess = array(
					'flash_success' => lang('delete_all_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'		=> true,
					'redirect'		=> base_url().'posts/comments_posts/index'
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
                	$this->modelComments_posts->update($data,$value);
                }
                $mess = array(
					'flash_success' => lang('status_pages_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'posts/comments_posts/index'
				);
				echo json_encode($data_mess);
            }
		}
	}
}