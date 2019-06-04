<?php
class CategoryController extends Controller {
	public $modelCategory;
	public function __construct() {
		parent::__construct();
		$this->modelCategory = $this->loadModel('Category');
	}
	public function index() {
		global $_web;
		if (isset($_SESSION['flash_success'])) {
			$this->view->data['flash_success'] = Session::get('flash_success');
			unset($_SESSION['flash_success']);
		}
		if (isset($_SESSION['flash_warning'])) {
			$this->view->data['flash_warning'] = Session::get('flash_warning');
			unset($_SESSION['flash_warning']);
		}

		$this->view->data['data'] = $this->modelCategory->getPagiCategory();
		$this->view->data['settings'] = $this->modelCategory->getSetting();
		// dd($this->view->data['settings']);
		$this->view->render('index_category');
	}
	public function add() {
		if (preg_match("/,88,/", $_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20') {
			$this->view->data['menu'] = $this->modelCategory->getCategories();
			$this->view->render('add_category');
		} else {
			$mess = array(
				'flash_warning' => "Bạn không có quyền thêm mới!!!",
			);
			Session::create($mess);
			redirect(base_url() . "product/category/index");
		}
	}

	public function save() {
		if (isset($_POST['submit'])) {
			$title            = trim(addslashes($this->input->post('title')));
			$description      = trim(addslashes($this->input->post('description')));
			$parent_id        = trim(addslashes($this->input->post('parent_id')));
			$thumbnail        = trim(addslashes($this->input->post('hidden_thumb_pages')));
			$meta_keyword     = trim(addslashes($this->input->post('meta_keyword')));
			$meta_description = trim(addslashes($this->input->post('meta_description')));
			$sort = trim(addslashes($this->input->post('sort')));
			$data = array(
				'title'       => $title,
				'alias'       => alias($title),
				'description' => $description,
				'avatar'      => $thumbnail,
				'parent_id'   => $parent_id,
				'meta_title'  => $title,
				'meta_description' => $meta_description,
				'meta_keyword'     => $meta_keyword,
				'status' => 1,
			);
// 			dd($data);
			if (isset($_POST['id_category']) && is_numeric($_POST['id_category'])) {
				// như thế này là đang update
				$data['update_author'] = Session::get('id');
				$data['update_time'] = time();
				$this->modelCategory->update($data, $_POST['id_category']);
				$mess = array(
					'flash_success' => lang('update_page_success'),
				);
			} else {
				// như thế này là đang insert
				$data['create_author'] = Session::get('id');
				$data['create_time'] = time();
				$this->modelCategory->insertData($data);
				$mess = array(
					'flash_success' => lang('insert_page_success'),
				);
			}

			Session::create($mess);
			if ($_POST['submit'] == 'save') {
				redirect(base_url() . 'product/category/index');
			} else {
				redirect(base_url() . 'product/category/add');
			}

		}
	}
	public function edit() {
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$this->view->data['data'] = $this->modelCategory->getDataById($_GET['id']);
			if (preg_match("/,89,/", $_SESSION['permission_id'], $matches) || $_SESSION['id'] == $this->view->data['data']['create_author'] || $_SESSION['group_id'] == '20' || $_SESSION['id'] == $data) {
				$this->view->data['data'] = $this->modelCategory->getDataById($_GET['id']);
				$this->view->data['menu'] = $this->modelCategory->getCategories();
				$this->view->render('add_category');
			} else {
				$mess = array(
					'flash_warning' => "Bạn không có quyền này!!!",
				);
				Session::create($mess);
				redirect(base_url() . "product/category/index");
			}
		}

	}
	public function del() {
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			if ($this->modelCategory->checkId($_GET['id']) == FALSE) {
				$id = $_GET['id'];
				$data = $this->modelCategory->getDelete($id);
				if ($data == 0) {
					$this->view->data['data'] = $this->modelCategory->getDataById($_GET['id']);
					if (preg_match("/,90,/", $_SESSION['permission_id'], $matches) || $_SESSION['id'] == $this->view->data['data']['create_author'] || $_SESSION['group_id'] == '20') {
						$this->modelCategory->delete($id);
						$mess = array(
							'flash_success' => lang('delete_success'),
						);
						Session::create($mess);
						redirect(base_url() . 'product/category/index');
					} else {
						$mess = array(
							'flash_warning' => "Bạn không có quyền này!!!",
						);
						Session::create($mess);
						redirect(base_url() . "product/category/index");
					}
				} else {
					redirect(base_url() . "product/category/index");
				}
			}
		}
	}
	public function dellAll() {
		if (isset($_POST['all'])) {
			if (!empty($_POST['all']) && is_array($_POST['all'])) {
				if (preg_match("/,90,/", $_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20') {
					$names_id = $_POST['all'];
					$this->modelCategory->dellWhereInArray($names_id);
					$mess = array(
						'flash_success' => lang('delete_all_success'),
					);
					Session::create($mess);
					$data_mess = array(
						'status' => true,
						'redirect' => base_url() . 'product/category/index',
					);
					echo json_encode($data_mess);
				} else {
					$mess = array(
						'flash_warning' => "Bạn không có quyền này!!!",
					);
					Session::create($mess);
					redirect(base_url());
				}
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
					$this->modelCategory->update($data, $value);
				}
				$mess = array(
					'flash_success' => lang('status_pages_success'),
				);
				Session::create($mess);
				$data_mess = array(
					'status' => true,
					'redirect' => base_url() . 'product/category/index',
				);
				echo json_encode($data_mess);
			}
		}
	}
	public function uploadStatusCate() {
		if (isset($_POST['status']) && isset($_POST['id'])) {
			$status = $_POST['status'];
			$id = $_POST['id'];
			$data = array(
				"status" => $status,
			);
			$this->modelCategory->statusCate($id, $data);
		}
	}
}