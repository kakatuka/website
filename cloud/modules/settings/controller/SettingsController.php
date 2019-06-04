<?php 
class SettingsController extends Controller{
	public $info;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->info = $this->loadModel('Settings');
	}
	public function index(){
		global $_web;
		$dir          = DIR_CDN;
		if (isset($_POST['ok'])) {
			$seo_title = trim(addslashes($this->input->post('seo_title')));
			$seo_description = trim(addslashes($this->input->post('seo_description')));
			$seo_keywords = trim(addslashes($this->input->post('seo_keywords')));
			$google_analytics = trim(addslashes($this->input->post('google_analytics')));
			$google_site_verification = trim(addslashes($this->input->post('google_site_verification')));
			$contact_address = trim(addslashes($this->input->post('contact_address')));
			$contact_email = trim(addslashes($this->input->post('contact_email')));
			$email_support = trim(addslashes($this->input->post('email_support')));
			$contact_phone = trim(addslashes($this->input->post('contact_phone')));
			$contact_hotline = trim(addslashes($this->input->post('contact_hotline')));
			$link_fb = trim(addslashes($this->input->post('link_fb')));
			$link_gg = trim(addslashes($this->input->post('link_gg')));
			$link_yt = trim(addslashes($this->input->post('link_yt')));
			$link_tt = trim(addslashes($this->input->post('link_tt')));
			$link_gm = trim(addslashes($this->input->post('link_gm')));
 
			$data_insert = array(
				'seo_title'	=> $seo_title,
				'seo_description'	=> $seo_description,
				'seo_keywords'	=> $seo_keywords,
				'google_analytics'	=> $google_analytics,
				'google_site_verification'	=> $google_site_verification,
				'address'	=> $contact_address,
				'email'	=> $contact_email,
				'email_support'	=> $email_support,
				'phone'	=> $contact_phone,
				'hotline'	=> $contact_hotline,
				'link_facebook'	=> $link_fb,
				'link_google'	=> $link_gg,
				'link_tt'	=> $link_tt,
				'link_youtube'	=> $link_yt,
				'link_google_map'	=> $link_gm,
			);
			$this->info->update($data_insert);
			$this->view->data['success'] = lang('success_settings');
		}


		//$this->view->data['images'] = getImagesToFolder($dir);
		$this->view->data['info']  = $this->info->getInfo();

		$this->view->render('index');
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
		header('Access-Control-Allow-Origin: *');
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
		header('Access-Control-Allow-Origin: *');
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
		header('Access-Control-Allow-Origin: *');
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
		header('Access-Control-Allow-Origin: *');
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
		header('Access-Control-Allow-Origin: *');
		if (isset($_FILES['file']['name'])) {
			$file_name = $_FILES['file']['name'];
			$tmp_name = explode('.',$_FILES['file']['name']);
			$ext = end($tmp_name);
			if ($ext=='json') {
				if (move_uploaded_file($_FILES['file']['tmp_name'], DIR_FILES . $file_name)) {
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