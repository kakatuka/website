<?php 
class ManagerController extends Controller{
	public $modelUsers;
	public function __construct(){
		parent::__construct();
		$this->modelUsers = $this->loadModel('Users');

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
				$this->view->data['users'] = $this->modelUsers->findSearch($search);
				$this->view->data['s'] = $search;
				$this->view->data['curpage'] = 1;
				$this->view->data['count_page'] = 1;
				$this->view->data['pagination'] ='';
			}else{
				$link = base_url().'users/manager/index';
				$all_users = $this->modelUsers->getUsers();
				$paging = new Paging(count($all_users),$link);
				$limit =20;
				// Tổng số trang
				$count_page = $paging->findPages($limit);
				// Bắt đầu từ mẫu tin
				$start =$paging->rowStart($limit);
				// Trang hiện tại
				$curpage = ($start/$limit)+1;

				// Xuất dữ liệu với truy vấn
				$this->view->data['users'] = $this->modelUsers->getPagiUser($start,$limit);
				$this->view->data['curpage'] = $curpage;
				$this->view->data['count_page'] = $count_page;
				
				$this->view->data['pagination'] = $paging->pagesList($curpage);
				$this->view->data['getGroup_permission']=$this->modelUsers->getGroup_permission();  
			}
		
			$this->view->render('manager_index');
		}else{
            $mess = array(
                            'flash_warning' => "Bạn không có quyền này!!!"
                        );
            Session::create($mess);
            return redirect(base_url().'users/users/index');
        }
	}	
	public function ajaxAdd(){
		//$status = true;
		$username 	 = trim(addslashes($this->input->post('username')));
		$role		 = trim(addslashes($this->input->post('role')));
		$first_name  = trim(addslashes($this->input->post('first_name')));
		$last_name   = trim(addslashes($this->input->post('last_name')));
		$email       = trim(addslashes($this->input->post('email')));
		$address     = trim(addslashes($this->input->post('address')));
		$password    = md5(md5("lnc".$this->input->post('password')));
		$re_password = md5(md5("lnc".$this->input->post('re_password')));

		if ($password!=$re_password) {
			$data = array(
				'status'	=> false,
				'mess'		=> lang('pass-repass')
			);
		}else{
			
			$data_insert = array(
				'username'	    => $username,
				'firstname'	    => $first_name,
				'lastname'	    => $last_name,
				'email'	        => $email,
				'password'	    => $password,
				'address'	    => $address,
				'status'	    => 1,
				'group_id'	    => $role,
				'create_time'	=> time(),
				'author'		=> Session::get('id')
			);
			$this->modelUsers->insertData($data_insert);

			$data = array(
				'status'	=> true,
				'mess'		=> lang('success_user')
			);
		}
		echo json_encode($data);
	}
	public function checkUsername(){
		if ($this->input->post('username')) {
			$username=trim(addslashes($this->input->post('username')));
			if ($this->modelUsers->checkUser($username)==FALSE) {
				$data=array(
					'status'	=> false,
					'mess'		=> lang('error_user')
				);
			}else{
				$data=array(
					'status'	=> true,
					'mess'		=> lang('succ_user')
				);
			}
			echo json_encode($data);
		}
	}
	public function checkEmail(){
		if ($this->input->post('email')) {
			$email=trim(addslashes($this->input->post('email')));
			if ($this->modelUsers->checkEmail($email)==FALSE) {
				$data=array(
					'status'	=> false,
					'mess'		=> lang('error_email')
				);
				
			}else{
				$data=array(
					'status'	=> true,
					'mess'		=> lang('succ_email')
				);
			}
			echo json_encode($data);
		}
	}
	public function edit(){
		$dir          = DIR_TMP.'cdn/';
		$this->view->data['images'] = getImagesToFolder($dir);
		$this->view->data['getGroup_permission']=$this->modelUsers->getGroup_permission();
		// dd($this->view->data['getGroup_permission']);
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			if ($this->modelUsers->checkId($_GET['id']) == FALSE) {
				$this->view->data['data_user']=$this->modelUsers->getUserById($_GET['id']);
				$this->view->render('manager_edit');
			}
		}
	}
	public function view(){
		$dir          = DIR_TMP.'cdn/';
		$id         =  $_SESSION['id'];
		$data       =  $this->modelUsers->getUserById($id );
		if($data['group_id'] == 20){
			$this->view->data['images'] = getImagesToFolder($dir);
			$this->view->data['getGroup_permission']=$this->modelUsers->getGroup_permission();
			if (isset($_GET['id']) && is_numeric($_GET['id'])) {
				if ($this->modelUsers->checkId($_GET['id']) == FALSE) {
					$this->view->data['data_user']=$this->modelUsers->getUserById($_GET['id']);
					$this->view->render('user_view');
				}
			}
		}else{
			$this->view->data['images'] = getImagesToFolder($dir);
			$this->view->data['getGroup_permission']=$this->modelUsers->getGroup_permission();
			if (isset($_GET['id']) && is_numeric($_GET['id'])) {
				if ($this->modelUsers->checkId($_GET['id']) == FALSE) {
					$this->view->data['data_user']=$this->modelUsers->getUserById($_GET['id']);
					$this->view->render('manager_edit');
				}
			}
		}
		
	}
	public function updateAvatar(){
		if (isset($_POST['src'])) {
			$data= array(
				'avatar' => trim(addslashes($_POST['src']))
			);
			if (is_numeric($_POST['id'])) {
				$id = $_POST['id'];
				$this->modelUsers->update($data,$id);
				$data_mess = array(
					'status'	=> true,
					'mess' 		=> lang('logo_update_success')
				);
				echo json_encode($data_mess);
			}
		}
	}
	public function update(){
		$id         =  $_SESSION['id'];
		$data       =  $this->modelUsers->getUserById($id );
		if (isset($_POST['submit'])) {
			$username = trim(addslashes($this->input->post('username')));
			$role = trim(addslashes($this->input->post('role')));
			$first_name = trim(addslashes($this->input->post('first_name')));
			$last_name = trim(addslashes($this->input->post('last_name')));
			$email = trim(addslashes($this->input->post('email')));
			$address = trim(addslashes($this->input->post('address')));
			$job_position = trim(addslashes($this->input->post('job_position')));
			$birthday = trim(addslashes($this->input->post('birthday')));

			$date = date_parse_from_format('d-m-Y', $birthday);
			$timestamp = mktime(0, 0, 0, $date['month'], $date['day'], $date['year']);


			$phone = trim(addslashes($this->input->post('phone')));
			$gender = trim(addslashes($this->input->post('gender')));
			$about = trim(addslashes($this->input->post('about')));
			$skype = trim(addslashes($this->input->post('skype')));
			$facebook = trim(addslashes($this->input->post('facebook')));
			$twitter = trim(addslashes($this->input->post('twitter')));
			$github = trim(addslashes($this->input->post('github')));
			$website = trim(addslashes($this->input->post('website')));
			$data_insert = array(
				'username'	=> $username,
				'firstname'	=> $first_name,
				'lastname'	=> $last_name,
				'email'		=> $email,
				'address'	=> $address,
				'job'		=> $job_position,
				'birthday'	=> $timestamp,
				'phone'		=> $phone,
				'gender'	=> $gender,
				'about'		=> $about,
				'facebook'	=> $facebook,
				'twitter'	=> $twitter,
				'github'	=> $github,
				'website'	=> $website,
				'group_id'	=> $role,
				'update_time'	=> time(),
				'author'		=> Session::get('id')
			);
			if (is_numeric($_POST['id_user'])) {
				$this->modelUsers->update($data_insert,$_POST['id_user']);
				$mess = array(
					'flash_success' => lang('update_success'),
				);
				Session::create($mess);
				redirect(base_url().'users/manager/index');
			}
			
		}
		
	}
	public function updatePassw(){
		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			if (isset($_POST['password'])) {
				$data = array(
					'password'	=> md5(md5("lnc".$_POST['password']))
				);
				$this->modelUsers->update($data,$_POST['id']);
				$mess = array(
					'flash_success' => lang('update_success'),
				);
				Session::create($mess);

				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'users/manager/index'
				);
				echo json_encode($data_mess);
			}
		}
	}
	public function del(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];
			$this->modelUsers->delete($id);
			$mess = array(
				'flash_success' => lang('delete_success'),
			);
			Session::create($mess);
			redirect(base_url().'users/manager/index');
		}
	}
	public function dellAll(){
		if (isset($_POST['all'])) {
			if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];
                $this->modelUsers->dellWhereInArray($names_id);
                $mess = array(
					'flash_success' => lang('delete_all_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'users/manager/index'
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
                	$this->modelUsers->update($data,$value);
                }
                $mess = array(
					'flash_success' => lang('update_status_all_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'users/manager/index'
				);
				echo json_encode($data_mess);
            }
		}
	}
}