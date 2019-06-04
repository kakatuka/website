<?php 
class AdvertisementController extends Controller{
	public $modelAdvertisement;
	public function __construct(){
		parent::__construct();
		$this->modelAdvertisement = $this->loadModel('Advertisement');

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
			$this->view->data['data'] = $this->modelAdvertisement->findSearch($search);
			$this->view->data['s'] = $search;
			$this->view->data['curpage'] = 1;
			$this->view->data['count_page'] = 1;
			$this->view->data['pagination'] ='';
		}else{
			
			$link = base_url().'advertisement/advertisement/index';
			$all_pages = $this->modelAdvertisement->getPages();

			$paging = new Paging(count($all_pages),$link);
			$limit =20;
			// Tổng số trang
			$count_page = $paging->findPages($limit);
			// Bắt đầu từ mẫu tin
			$start =$paging->rowStart($limit);
			// Trang hiện tại
			$curpage = ($start/$limit)+1;

			// Xuất dữ liệu với truy vấn
			$this->view->data['data'] = $this->modelAdvertisement->getPagiPages($start,$limit);
			$this->view->data['curpage'] = $curpage;
			$this->view->data['count_page'] = $count_page;
			
			$this->view->data['pagination'] = $paging->pagesList($curpage);  
		}
		// dd($this->view->data['data']);
		$this->view->render('advertisement_index');
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

		$dir          = DIR_TMP.'cdn/';
		$this->view->data['images'] = getImagesToFolder($dir);
		$this->view->render('advertisement_edit');
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

	public function save(){
		if (isset($_POST['submit'])) {
			$title = htmlentities($this->input->post('title'),ENT_QUOTES);
			$content = htmlentities($this->input->post('description'),ENT_QUOTES);
			$note = htmlentities($this->input->post('note'),ENT_QUOTES);
			$thumbnail = trim(addslashes($this->input->post('hidden_thumb_pages')));
			$link = trim(addslashes($this->input->post('link')));

			$data = array(
				'title'	=> $title,
				'alias'	=> alias($title),
				'description'	=> $content,
				'images'	=> $thumbnail,
				'note'		=> $note,
				'link'		=> $link,
			);
			if (isset($_POST['id_advertisement']) && is_numeric($_POST['id_advertisement'])) { // như thế này là đang update
				$data['author_update'] 	= Session::get('id');
				$data['update_time'] 	= time();
				$this->modelAdvertisement->update($data,$_POST['id_advertisement']);
				$mess = array(
					'flash_success' => lang('update_page_success'),
				);
			}else{ // như thế này là đang insert
				$data['author_create'] 	= Session::get('id');
				$data['create_time'] 	= time();
				$data['status'] 	= 1;
				$this->modelAdvertisement->insertData($data);
				$mess = array(
					'flash_success' => lang('insert_page_success'),
				);
			}
			
            Session::create($mess);
            if ($_POST['submit']=='save') {
            	redirect(base_url().'advertisement/advertisement/index');
            }else{
            	redirect(base_url().'advertisement/advertisement/add');
            }
            
		}
	}
	public function edit(){
		$dir          = DIR_TMP.'cdn/';
		$this->view->data['images'] = getImagesToFolder($dir);
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			if ($this->modelAdvertisement->checkId($_GET['id']) == FALSE) {
				$this->view->data['data']=$this->modelAdvertisement->getUserById($_GET['id']);
				$this->view->render('advertisement_edit');
			}
		}
	}
	public function del(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];
			
			$this->modelAdvertisement->delete($id);

			$mess = array(
				'flash_success' => lang('delete_success'),
			);
			Session::create($mess);
			redirect(base_url().'advertisement/advertisement/index');
		}
	}
	public function dellAll(){
		if (isset($_POST['all'])) {
			if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];
                $this->modelAdvertisement->dellWhereInArray($names_id);
                $mess = array(
					'flash_success' => lang('delete_all_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'advertisement/advertisement/index'
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
                	$this->modelAdvertisement->update($data,$value);
                }
                $mess = array(
					'flash_success' => lang('status_pages_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'advertisement/advertisement/index'
				);
				echo json_encode($data_mess);
            }
		}
	}
}