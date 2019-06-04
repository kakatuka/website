<?php 
class PositionController extends Controller{
	public $modelPosition;
	public function __construct(){
		parent::__construct();
		$this->modelPosition = $this->loadModel('Position');

	}
	public function index(){
		global $_web;
		if ($_SESSION['group_id'] == '22' || $_SESSION['group_id'] == '20') {
			// Check if there are any SUCCESS messages
			if (isset($_SESSION['flash_success'])) {
				$this->view->data['flash_success'] = Session::get('flash_success');
				unset($_SESSION['flash_success']);
			}
			if (isset($_GET['s']) && $_GET['s']!='') {
				$search = trim(addslashes($_GET['s']));
				$this->view->data['data'] = $this->modelPosition->findSearch($search);
				$this->view->data['s'] = $search;
				$this->view->data['curpage'] = 1;
				$this->view->data['count_page'] = 1;
				$this->view->data['pagination'] ='';
			}else{
				$link = base_url().'index.php?mod=menu&controller=position&action=index';
				$all_pages = $this->modelPosition->getPages();

				$paging = new Paging(count($all_pages),$link);
				$limit =20;
				// Tổng số trang
				$count_page = $paging->findPages($limit);
				// Bắt đầu từ mẫu tin
				$start =$paging->rowStart($limit);
				// Trang hiện tại
				$curpage = ($start/$limit)+1;

				// Xuất dữ liệu với truy vấn
				$this->view->data['data'] = $this->modelPosition->getPagiPages($start,$limit);
				$this->view->data['curpage'] = $curpage;
				$this->view->data['count_page'] = $count_page;
				
				$this->view->data['pagination'] = $paging->pagesList($curpage);  
			}
			
			$this->view->render('position_index');
		}else{
			$mess = array(
						'flash_warning' => "Bạn không có quyền này!!!"
					);
			Session::create($mess);
			return redirect(base_url().'settings/settings/manager');
		}
	}	
	public function add(){
		if (isset($_SESSION['flash_success'])) {
			$this->view->data['flash_success'] = Session::get('flash_success');
			unset($_SESSION['flash_success']);
		}

		$this->view->render('position_add');
	}
	public function save(){
		if (isset($_POST['submit'])) {
			$title_menu = trim(addslashes($this->input->post('title_menu')));
			$position = trim(addslashes($this->input->post('position')));
			if ($this->modelPosition->checkId($position)==FALSE) {
				$data = array(
					'title'	=> $title_menu
				);
				$data['author_update'] 	= Session::get('id');
				$data['update_time'] 	= time();
				$this->modelPosition->update($data,$position);
				$mess = array(
					'flash_success' => lang('update_page_success'),
				);
			}else{
				$data = array(
					'id'	=> $position,
					'title'	=> $title_menu
				);
				$data['author_create'] 	= Session::get('id');
				$data['create_time'] 	= time();
				$this->modelPosition->insertData($data);
				$mess = array(
					'flash_success' => lang('insert_page_success'),
				);
			}
			
			
            Session::create($mess);
            redirect(base_url().'menu/position/index');
            
		}
	}
	public function loadMessagerChecked(){
		echo json_encode(array('mess'=>lang('choose_form_contact')));
	}
	

	// public function del(){
	// 	if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	// 		$id = $_GET['id'];
	// 		$this->modelPosition->delete($id);
	// 		$mess = array(
	// 			'flash_success' => lang('delete_success'),
	// 		);
	// 		Session::create($mess);
	// 		redirect(base_url().'menu/position/index');
	// 	}
	// }
	public function del(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];
			$this->view->data['data']=$this->modelPosition->getUserById($_GET['id']);
			if(preg_match("/,62,/",$_SESSION['permission_id'], $matches) || $_SESSION['id'] == $this->view->data['data']['author_create'] || $_SESSION['group_id'] == '20'){
				$this->modelPosition->delete($id);
				$mess = array(
					'flash_success' => lang('delete_success'),
				);
				Session::create($mess);
				redirect(base_url().'menu/position/index');
			}else{
				$mess = array(
					'flash_warning' => "Bạn không có quyền này!!!"
				);
				Session::create($mess);
				redirect(base_url()."menu/position/index");
			}
		}
	}









	public function dellAll(){
		if (isset($_POST['all'])) {
			if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];
                $this->modelPosition->dellWhereInArray($names_id);
                $mess = array(
					'flash_success' => lang('delete_all_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'menu/position/index'
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
                	$this->modelPosition->update($data,$value);
                }
                $mess = array(
					'flash_success' => lang('status_pages_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'menu/position/index'
				);
				echo json_encode($data_mess);
            }
		}
	}
}