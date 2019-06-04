<?php 
class GoogleanalyticsController extends Controller{
	public $info;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->info = $this->loadModel('Googleanalytics');
	}
	public function manager(){
		if (isset($_SESSION['flash_success'])) {
			$this->view->data['flash_success'] = Session::get('flash_success');
			unset($_SESSION['flash_success']);
		}
		if (isset($_SESSION['flash_warning'])) {
			$this->view->data['flash_warning'] = Session::get('flash_warning');
			unset($_SESSION['flash_warning']);
		}
		$this->view->render('manager');
	}
	public function index(){
		global $_web;
		if ($_SESSION['group_id'] == '22' || $_SESSION['group_id'] == '20') {
			$dir          = DIR_TMP.'cdn/';
			if (isset($_POST['ok'])) {
				$google_analytics = trim(addslashes($this->input->post('google_analytics')));
				$google_site_verification = trim(addslashes($this->input->post('google_site_verification')));
	 
				$data_insert = array(
					'google_analytics'	=> $google_analytics,
					'google_site_verification'	=> $google_site_verification,
				);
				$this->info->update($data_insert);
				$this->view->data['success'] = lang('success_settings');
			}

			//$this->view->data['images'] = getImagesToFolder($dir);
			$this->view->data['info']  = $this->info->getInfo();

			$this->view->render('google_analytics');
		}else{
			$mess = array(
						'flash_warning' => "Bạn không có quyền này!!!"
					);
			Session::create($mess);
			return redirect(base_url().'settings/googleanalytics/index');
		}
	}
	public function userOnline(){
		//$my_ip = getHostByName(php_uname('n'));
		$my_ip = getIP();
		echo $my_ip;die;
		/*$my_url = $_SERVER['PHP_SELF'];

		$sql = "SELECT * FROM online WHERE ip = '".$my_ip."'";
		$count = $database->count_query($sql);
		$data = array(
		  'ip'  => $my_ip,
		  'url' => $my_url,
		  'time'  => time()
		);
		if ($count>0) {
		  $where = array(
		    array('ip',$my_ip,'and'),
		        array('url',$my_url)
		  );
		  $database->update('online',$data,$where);
		}else{
		  // nếu chưa có ip trong database thì thêm địa chỉ ip mới vào
		  $database->insert('online',$data);

		}
		$time = time();
		$database->delete_sql("DELETE FROM online WHERE `time` + 1 < $time");

		// Select
		$data_ip = $database->query("SELECT * FROM online");


		if (isset($data_ip) && !empty($data_ip)) {
		  echo "<pre>";
		  print_r($data_ip);
		  echo "</pre>";
		}*/
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

	public function updateInfo(){
		if (isset($_POST['src'])) {
			$title = trim(addslashes($_POST['title']));
			if ($title=='logo') {
				$data= array(
					'logo' => trim(addslashes($_POST['src']))
				);
			}else{
				$data= array(
					'icon' => trim(addslashes($_POST['src']))
				);
			}
			
			$this->info->update($data);
			$data_mess = array(
				'status'	=> true,
				'mess' 		=> lang('logo_update_success')
			);
			echo json_encode($data_mess);
		}
	}
	public function loadImageDefault(){
		if (isset($_POST['status']) && is_numeric($_POST['status'])) {
	    	if ($_POST['status']!=0) {
	    		$data_update = array(
		    		'logo'	=> ''
		    	);
	    	}else{
	    		$data_update = array(
		    		'icon'	=> ''
		    	);
	    	}
	    	$this->info->update($data_update);
		    $data = array(
		    	'status'	=> true,
		    	'mess'		=> lang('notification').lang('success_settings')
		    );
		    echo json_encode($data);
		}
	}
	public function openDirectory(){
		if (isset($_POST['check_folder']) && $_POST['check_folder']!=false && isset($_POST['directory'])) {
			$direct = trim(addslashes($_POST['check_folder']));
			$dir = trim($_POST['directory']).$direct."/";
			//$dir          = DIR_TMP.'cdn/'.$direct."/";
			$html = listAllFolderChooseImage($dir);
	        $data = array(
					    	'status'	=> true,
					    	'html'		=> $html,
					    	'mess'		=> lang('notification').lang('uploaded_message')
					    );
			echo json_encode($data);
		}
		
	}
	public function backDirectory(){
		if (isset($_POST['back']) && isset($_POST['directory'])) {
			$directory = dirname($_POST['directory'])."/";
			$html = listAllFolderChooseImage($directory);
	        $data = array(
					    	'status'	=> true,
					    	'html'		=> $html,
					    	'mess'		=> lang('notification').lang('uploaded_message')
					    );
			echo json_encode($data);
		}
		
	}
	public function sendFiles(){
		if (isset($_FILES['file']['name'])) {
			$file_name = $_FILES['file']['name'];
			$tmp_name = explode('.',$_FILES['file']['name']);
			$ext = end($tmp_name);
			if ($ext=='json') {
				if (move_uploaded_file($_FILES['file']['tmp_name'], DIR_TMP . 'files/' . $file_name)) {
					$data_insert = array(
							'google_file_json'	=> $file_name
						);
				  $this->info->update($data_insert);
			      $status = true;
			      $mess = lang('success').lang('uploaded_message');
			    } else {
			      $status = false;
			      $mess = lang('warning').lang('not_uploaded_message');
			    }
			}else{
				$status = false;
			    $mess = lang('warning').lang('not_uploaded_message');
			}
			$data = array(
				'status' => $status,
				'mess'	 => $mess
			);
			echo json_encode($data);
		}
	}
	
}