<?php
class ServiceController extends Controller {
	public $modelService;
	public function __construct() {
		parent::__construct();
		$this->modelService = $this->loadModel('service');

	}
	public function index() {
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
		$this->view->data['data'] = $this->modelService->getALLposts();
		// dd($this->view->data['data_categories1']);
		$this->view->render('posts_index');
	}
	public function add() {
		if (preg_match("/,60,/", $_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20') {
			$dir = DIR_TMP . 'cdn/';
			$this->view->data['images'] = getImagesToFolder($dir);
			$this->view->render('posts_edit');
		} else {
			$mess = array(
				'flash_warning' => "Bạn không có quyền này!!!",
			);
			Session::create($mess);
			redirect(base_url() . "service/service/index");
		}
	}
	public function edit() {
		$dir = DIR_TMP . 'cdn/';
		$this->view->data['images'] = getImagesToFolder($dir);
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			if ($this->modelService->checkId($_GET['id']) == FALSE) {
				$this->view->data['data'] = $this->modelService->getUserById($_GET['id']);
				if (preg_match("/,61,/", $_SESSION['permission_id'], $matches) || $_SESSION['id'] == $this->view->data['data']['author_create'] || $_SESSION['group_id'] == '20') {
					$this->view->render('posts_edit');
				} else {
					$mess = array(
						'flash_warning' => "Bạn không có quyền này!!!",
					);
					Session::create($mess);
					redirect(base_url() . "service/service/index");
				}
			}
		}
	}
	public function save() {
		if (isset($_POST['submit'])) {
			// dd($this->input->post('content'));
			$title       = trim(addslashes($this->input->post('title')));
			$description = trim(addslashes($this->input->post('description')));
			$thumbnail   = trim(addslashes($this->input->post('hidden_thumb_pages')));
			// $file_url 		= trim(addslashes($this->input->post('hidden_thumb_pages1')));
			// Xử lý lựa chọn là tin tiêu điểm hay không
			if (isset($_POST['show_contact_form'])) {
				$show_contact_form = trim(addslashes($this->input->post('show_contact_form')));
			} else {
				$show_contact_form = false;
			}
			// END xử lý tin tiêu điểm

			// Xử lý lựa chọn là tin tiêu điểm hay không
			if (isset($_POST['show_contact_form1'])) {
				$show_contact_form1 = trim(addslashes($this->input->post('show_contact_form1')));
			} else {
				$show_contact_form1 = false;
			}
			// END xử lý tin tiêu điểm

			if ($_POST['categories']) {
				$categories = $this->input->post('categories');
				if (is_array($categories)) {
					$cate = "," . implode(",", $categories) . ",";
				}
			} else {
				$cate = '';
			}

			$data = array(
				'title' => $title,
				'content' => $description,
				'image' => $thumbnail,
				'status' => 1,
			);
			if (isset($_POST['id_posts']) && is_numeric($_POST['id_posts'])) {
				// như thế này là đang update
				$this->modelService->update($data, $_POST['id_posts']);
				$mess = array(
					'flash_success' => lang('update_page_success'),
				);
			} else {
				// như thế này là đang insert
				$data['create_time'] = time();
				$this->modelService->insertData($data);
				$mess = array(
					'flash_success' => lang('insert_page_success'),
				);
			}

			Session::create($mess);
			if ($_POST['submit'] == 'save') {
				redirect(base_url() . 'service/service/index');
			} else {
				redirect(base_url() . 'service/service/add');
			}
		}
	}
	public function del() {
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];
			$this->view->data['data'] = $this->modelService->getUserById($_GET['id']);
			if (preg_match("/,62,/", $_SESSION['permission_id'], $matches) || $_SESSION['id'] == $this->view->data['data']['author_create'] || $_SESSION['group_id'] == '20') {
				$this->modelService->delete($id);
				$mess = array(
					'flash_success' => lang('delete_success'),
				);
				Session::create($mess);
				redirect(base_url() . 'service/service/index');
			} else {
				$mess = array(
					'flash_warning' => "Bạn không có quyền này!!!",
				);
				Session::create($mess);
				redirect(base_url() . "service/service/index");
			}
		}
	}

	public function dellAll() {
		if (isset($_POST['all'])) {
			if (!empty($_POST['all']) && is_array($_POST['all'])) {
				$names_id = $_POST['all'];
				$this->modelService->dellWhereInArray($names_id);
				$mess = array(
					'flash_success' => lang('delete_all_success'),
				);
				Session::create($mess);
				$data_mess = array(
					'status' => true,
					'redirect' => base_url() . 'service/service/index',
				);
				echo json_encode($data_mess);
			}
		}
	}
	public function status() {
		if (isset($_POST['status'])) {
			if (!empty($_POST['all']) && is_array($_POST['all'])) {
				$names_id = $_POST['all'];
				if ($_POST['status'] == 'public') {
					$data = array(
						'status' => 1,
					);
				} else {
					$data = array(
						'status' => 0,
					);
				}
				foreach ($names_id as $value) {
					$this->modelService->update($data, $value);
				}
				$mess = array(
					'flash_success' => lang('status_pages_success'),
				);
				Session::create($mess);
				$data_mess = array(
					'status' => true,
					'redirect' => base_url() . 'service/service/index',
				);
				echo json_encode($data_mess);
			}
		}
	}
	public function uploadStatus() {
		if (isset($_POST['status']) && isset($_POST['id'])) {
			$status = $_POST['status'];
			$id = $_POST['id'];
			$data = array(
				"status" => $status,
			);
			$this->modelService->statusNew($id, $data);
		}
	}
}