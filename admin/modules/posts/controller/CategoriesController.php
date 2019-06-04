<?php 
class CategoriesController extends Controller{
	public $modelCategories;
	public function __construct(){
		parent::__construct();
		$this->modelCategories = $this->loadModel('Categories');

	}
	public function index(){
		global $_web;
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
		$this->view->data['data'] = $this->modelCategories->getCategories();
		$this->view->render('categories_index');
	}	
	public function add(){
		if(preg_match("/,92,/",$_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20'){
			$dir  = DIR_TMP.'cdn/';
			$this->view->data['images'] = getImagesToFolder($dir);
			$this->view->data['menu']   = $this->modelCategories->getCategories();
			$this->view->render('categories_edit');
		}else{
			$mess = array(
				'flash_warning' => "Bạn không có quyền này!!!"
			);
			Session::create($mess);
			redirect(base_url()."posts/categories/index");
		}
	}
	public function save(){
		if (isset($_POST['submit'])) {
			$title = trim(addslashes($this->input->post('title')));
			$description = trim(addslashes($this->input->post('description')));
			$note = trim(addslashes($this->input->post('note')));
			$order_by = trim(addslashes($this->input->post('order_by')));
			$parent_id = trim(addslashes($this->input->post('parent_id')));
			$thumbnail = trim(addslashes($this->input->post('hidden_thumb_pages')));
			// Xử lý lựa chọn là tin tiêu điểm hay không
			if (isset($_POST['show_contact_form'])) {
				$show_contact_form = trim(addslashes($this->input->post('show_contact_form')));
			}else{
				$show_contact_form = false;
			}
			// END xử lý tin tiêu điểm

			$data = array(
				'title'			=> $title,
				'alias'			=> alias($title),
				'description'	=> $description,
				'thumbnail'		=> $thumbnail,
				'note'			=> $note,
				'sort'			=> $order_by,
				'parent_id'			=> $parent_id,
				'status'			=> 1,
			);
			// Xử lý lựa chọn là tin tiêu điểm hay không
			if ($show_contact_form == true) {
				$data['hot'] = 1;
			}else{
				$data['hot'] = 0;
			}
			// END xử lý tin tiêu điểm
			if (isset($_POST['id_category']) && is_numeric($_POST['id_category'])) { // như thế này là đang update
				$data['author_update'] 	= Session::get('id');
				$data['update_time'] 	= time();
				$this->modelCategories->update($data,$_POST['id_category']);
				$mess = array(
					'flash_success' => lang('update_page_success'),
				);
			}else{ // như thế này là đang insert
				$data['author_create'] 	= Session::get('id');
				$data['create_time'] 	= time();
				$this->modelCategories->insertData($data);
				$mess = array(
					'flash_success' => lang('insert_page_success'),
				);
			}
			
            Session::create($mess);
            if ($_POST['submit']=='save') {
            	redirect(base_url().'posts/categories/index');
            }else{
            	redirect(base_url().'posts/categories/add');
            }
            
		}
	}
	
	public function edit(){
		if(preg_match("/,93,/",$_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20'){
			$dir          = DIR_TMP.'cdn/';
			$this->view->data['images'] = getImagesToFolder($dir);
			if (isset($_GET['id']) && is_numeric($_GET['id'])) {
				if ($this->modelCategories->checkId($_GET['id']) == FALSE) {
					$this->view->data['data']=$this->modelCategories->getDataById($_GET['id']);
					$this->view->data['menu']   = $this->modelCategories->getCategories();
					if(preg_match("/,93,/",$_SESSION['permission_id'], $matches) || $_SESSION['id'] == $this->view->data['data']['author_create'] || $_SESSION['group_id'] == '20'){
						$this->view->render('categories_edit');
					}else{
						$mess = array(
							'flash_warning' => "Bạn không có quyền này!!!"
						);
						Session::create($mess);
						redirect(base_url()."posts/categories/index");
					}
				}
			}
		}else{
			$mess = array(
				'flash_warning' => "Bạn không có quyền này!!!"
			);
			Session::create($mess);
			redirect(base_url()."posts/categories/index");
		}
	}
	public function del(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];
			$data = $this->modelCategories->getDelete($id);
			if ($data==0) {
				$this->view->data['data']=$this->modelCategories->getDataById($_GET['id']);
				if(preg_match("/,94,/",$_SESSION['permission_id'], $matches) || $_SESSION['id'] == $this->view->data['data']['author_create'] || $_SESSION['group_id'] == '20'){
					$this->modelCategories->delete($id);
					$mess = array(
						'flash_success' => lang('delete_success'),
					);
					Session::create($mess);
					redirect(base_url().'posts/categories/index');
				}else{
					$mess = array(
						'flash_warning' => "Bạn không có quyền này!!!"
					);
					Session::create($mess);
					redirect(base_url()."posts/categories/index");
				}
			}else{
				redirect(base_url()."posts/categories/index");
			}
			
		}
	}

	public function dellAll(){
		if (isset($_POST['all'])) {
			if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];
                $this->modelCategories->dellWhereInArray($names_id);
                $mess = array(
					'flash_success' => lang('delete_all_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'/posts/categories/index'
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
                	$this->modelCategories->update($data,$value);
                }
                $mess = array(
					'flash_success' => lang('status_pages_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'posts/categories/index'
				);
				echo json_encode($data_mess);
            }
		}
	}
	public function  uploadStatusCate(){
		if (isset($_POST['status']) && isset($_POST['id'])) {
			$status = $_POST['status'];
			$id = $_POST['id'];
			$data = array(
			"status" => $status,
			);
		 $this->modelCategories->statusCate($id,$data);
		}
	}
}