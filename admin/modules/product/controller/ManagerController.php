<?php 
class ManagerController extends Controller{
	public $modelProduct;
	public $modelCategory;
	public $modelBrand;
	public $modelManager;
	public function __construct(){
		parent::__construct();
		$this->modelCategory = $this->loadModel('Category');
		$this->modelProduct = $this->loadModel('Product');
		$this->modelBrand = $this->loadModel('Brand');
		$this->modelManager = $this->loadModel('Manager');
	}
	public function index(){

		global $_web;
		if (preg_match("/,79,/",$_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20') {
			$this->view->data['cate'] = $this->modelCategory->getCategories();
			$this->view->data['view_home'] = $this->modelManager->getManagerView();

			foreach ($this->view->data['view_home'] as $key => $value) {
				$this->view->data['view_home'][$key]['content'] = ($value['content']!="") ? json_decode($value['content'],true) : '';
			}
			$this->view->render('manager_home');
		}else{
			$mess = array(
				'flash_warning' => "Bạn không có quyền này!!!"
			);
			Session::create($mess);
			redirect(base_url()."product/managerindex/index");
		}
	}
	public function add(){
		if (isset($_POST['title'])) {
			sleep(2);
			$title = trim(addslashes($this->input->post('title')));	
			$count = trim(addslashes($this->input->post('count')));	
			$data = array(
				'title'			=> $title,
				'status'			=> 1,
				'position'			=> $count,
			);
			$data['create_author'] 	= Session::get('id');
			$data['create_time'] 	= time();
			$id = $this->modelManager->insertData($data);
			$mess = lang('insert_page_success');
			$data_mess = array(
				'status'	=> true,
				'id'		=> $id,
				'title'		=> $title,
				'position'	=> $count,
				'mess'		=> $mess
			);
			echo json_encode($data_mess);    
		}
	}
	public function edit(){
		if (isset($_POST['title']) && is_numeric($_POST['id'])) {
			$title = trim(addslashes($this->input->post('title')));	
			$id = trim(addslashes($this->input->post('id')));	
			$data = array(
				'title'			=> $title
			);
			$data['update_author'] 	= Session::get('id');
			$data['update_time'] 	= time();
			$id = $this->modelManager->update($data,$id);
			$mess = lang('update_page_success');
			$data_mess = array(
				'status'	=> true,
				'id'		=> $id,
				'title'		=> $title,
				'mess'		=> $mess
			);
			echo json_encode($data_mess);
		}
	}
	public function sortable(){
		if (isset($_GET['listItem'])) {
			foreach ($_GET['listItem'] as $position => $item) {
				$data = array(
					'position'	=> $position
				);
				$this->modelManager->update($data,$item);
			}
			$data_mess = array(
				'status'	=> true,
				'mess'		=> lang('update_page_success')
			);
			echo json_encode($data_mess);
		}
	}

	public function dellAll(){
		if (isset($_POST['all'])) {
			if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];
                $this->modelManager->dellWhereInArray($names_id);
                $mess = array(
					'flash_success' => lang('delete_all_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'product/manager/index'
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
                	$this->modelManager->update($data,$value);
                }
                $mess = array(
					'flash_success' => lang('status_pages_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'product/manager/index'
				);
				echo json_encode($data_mess);
            }
		}
	}
	public function getOption(){
		if (isset($_POST['param']) && $_POST['param'] == 1) {
			$data = $this->modelManager->getManagerView();
			$html = '<option value="0">'.lang('select_cate').'</option>';
			foreach ($data as $key => $value) {
				$html .= '<option value="'.$value['id'].'">'.$value['title'].'</option>';
			}
			echo $html;
		}
	}
	public function getProductByCate(){
		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			$id = $_POST['id'];
			$data = $this->modelProduct->getProductByCateModel(0, 20,$id,null,$where_search = null);
			$data_mess = $this->modelProduct->check_load_more_productByCate($number = 20, $ajax = false, $id,null);
			$html = '';
			if (!empty($data)) {
				foreach ($data as $key => $value) {
					$html .= '<div class="col-md-3" data-id="'.$value['id'].'">
								<div class="imgs">
		                    		<img src="'.base_url_cloud().'timthumb.php?src='.base_url_cloud().'cdn/'.$value['image'].'&h=220&w=170&zc=2" alt="'.$value['name'].'" class="img-thumbnail">
		                    		<h5 class="text-center">'.$value['name'].'</h5>
		                    	</div>
							</div>';
				}
			}else{
				$html = "<h6 class='text-center'>".lang('empty_data')."</h6>";
			}
			$result = array(
				'status'	=> true,
				'flag'		=> $data_mess['flag'],
				'start'		=> $data_mess['start'],
				'html'		=> $html
			);
			echo json_encode($result);
		}
	}
	public function ajaxLoadMore(){
		if (!empty($_POST['data'])) {
			$start = $_POST['data']['start'];
			$cate_id = $_POST['data']['cate_id'];
			$arrid   = ($_POST['data']['not_id']!="") ? explode(',', $_POST['data']['not_id']) : null;
			$data = $this->modelProduct->getProductByCateModel($start, 20, $cate_id, $arrid, null);

			$data_mess = $this->modelProduct->check_load_more_productByCate($start + 20, $ajax = false, $cate_id,$arrid);
			$html = '';
			if (!empty($data)) {
				foreach ($data as $key => $value) {
					$html .= '<div class="col-md-3" data-id="'.$value['id'].'">
								<div class="imgs">
		                    		<img src="'.base_url_cloud().'timthumb.php?src='.base_url_cloud().'cdn/'.$value['image'].'&h=220&w=170&zc=2" alt="'.$value['name'].'" class="img-thumbnail">
		                    		<h5 class="text-center">'.$value['name'].'</h5>
		                    	</div>
							</div>';
				}
			}else{
				$html = "<div class='clearfix'></div><h6 class='text-center notProduct'>".lang('empty_list_product')."</h6>";
			}
			$result = array(
				'status'	=> true,
				'flag'		=> $data_mess['flag'],
				'start'		=> $data_mess['start'],
				'html'		=> $html
			);
			echo json_encode($result);
		}
	}
	public function ajaxAddProductHome(){
		if (!empty($_POST['data']) && isset($_POST['id_cate'])) {
			$result =array();
			$id = $_POST['id_cate'];
			foreach ($_POST['data'] as $value) {
				$result[] = $this->modelProduct->getDataById($value);
			}
			$data_succ = $this->modelManager->getDataById($id);
			$remove_values_arr = '';
			if ($data_succ['content']=="null" || $data_succ['content']==null || $data_succ['content']=="") {
				$remove_values_arr = $result;
			}else{
				$data_succ['content'] = json_decode($data_succ['content'],true);
				$arr_merge = array_merge_recursive($data_succ['content'],$result);
				$remove_values_arr  = remove_duplicate_values_array($arr_merge);
			}
			
			if ($remove_values_arr!='') {
				$data = array(
					'content'	=> json_encode($remove_values_arr)
				);
				$this->modelManager->update($data,$id);
				$html='';
				foreach ($remove_values_arr as $key => $value) {
					$html .= '<div class="col-md-3" data-id="'.$value['id'].'" data-key="'.$key.'">
									<div class="imgs">
			                    		<img src="'.base_url_cloud().'timthumb.php?src='.base_url_cloud().'cdn/'.$value['image'].'&h=220&w=170&zc=2" alt="'.$value['name'].'" class="img-thumbnail">
			                    		<h5 class="text-center">'.$value['name'].'</h5>
			                    	</div>
								</div>';
				}
				$data_mess = array(
					'status'	=> true,
					'id_cate'	=> $id,
					'html'		=> $html,
					'mess'		=> lang('status_pages_success')
				);
				echo json_encode($data_mess);
			}
			
		}
	}
	public function ajaxRemoveProduct(){
		if (!empty($_POST['data'])) {
			$key = $_POST['data']['key'];
			$id_home = $_POST['data']['id_home'];
			$id_product = $_POST['data']['id_product'];
			if (isset($id_home)) {
				$data = $this->modelManager->getDataById($id_home);
				if ($data['content']!="null" || $data['content']!=null || $data['content']!="") {
					$data['content'] = json_decode($data['content'],true);
					if ($data['content'][$key]['id']==$id_product) {
						unset($data['content'][$key]);
						$content = $data['content'];
						$data_update = array(
							'content'	=> json_encode($content),
						);
						$this->modelManager->update($data_update,$id_home);
						$data_mess = array(
							'status'	=> true,
							'mess'		=> lang('del_page_success')
						);
						echo json_encode($data_mess);
					}
				}
				
			}
		}
	}
	
}