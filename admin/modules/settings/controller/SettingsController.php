<?php
class SettingsController extends Controller {
	public $info;
	public $modelAddress;

	//public $loadPages;
	public function __construct() {
		parent::__construct();
		$this->info = $this->loadModel('Settings');
		$this->modelAddress = $this->loadModel('Address');
	}
	public function manager() {
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
	public function index() {
		global $_web;
		if ($_SESSION['group_id'] == '22' || $_SESSION['group_id'] == '20') {
			$dir = DIR_TMP . 'cdn/';
			$this->view->data['province'] = $this->modelAddress->getProvince();
			if (isset($_POST['ok'])) {
				$seo_title                = trim(addslashes($this->input->post('seo_title')));
				// $name                  = trim(addslashes($this->input->post('name')));
				$slogan                   = trim(addslashes($this->input->post('slogan')));
				$seo_description          = trim(addslashes($this->input->post('seo_description')));
				$seo_keywords             = trim(addslashes($this->input->post('seo_keywords')));
				$google_analytics         = trim(addslashes($this->input->post('google_analytics')));
				$google_site_verification = trim(addslashes($this->input->post('google_site_verification')));
				$email_footer             = trim(addslashes($this->input->post('email_footer')));
				$mst           			  = trim(addslashes($this->input->post('mst')));
				$contact_hotline          = trim(addslashes($this->input->post('contact_hotline')));
				// $content                  = trim(addslashes($this->input->post('content')));
				$domain                   = trim(addslashes($this->input->post('domain')));
				$fax                      = trim(addslashes($this->input->post('fax')));
				$map                      = trim(addslashes($this->input->post('map')));
				$livechat                 = base64_encode($_POST['livechat']);
				$address                  = trim(addslashes($this->input->post('contact_address')));
				$address_hn               = trim(addslashes($this->input->post('address_hn')));
				$phone_hn                 = trim(addslashes($this->input->post('phone_hn')));
				$fax_hn                   = trim(addslashes($this->input->post('fax_hn')));
				$hotline_hn               = trim(addslashes($this->input->post('hotline_hn')));
				$email_hn                 = trim(addslashes($this->input->post('email_hn')));
				$address_hcm              = trim(addslashes($this->input->post('address_hcm')));
				$phone_hcm                = trim(addslashes($this->input->post('phone_hcm')));
				$fax_hcm                  = trim(addslashes($this->input->post('fax_hcm')));
				$hotline_hcm              = trim(addslashes($this->input->post('hotline_hcm')));
				$email_hcm                = trim(addslashes($this->input->post('email_hcm')));
				$content_address          = htmlentities($this->input->post('content_address'),ENT_QUOTES);
				// $fax                   = trim(addslashes($this->input->post('fax')));
				// $email_1               = trim(addslashes($this->input->post('email1')));
				// $right_province        = trim(addslashes($this->input->post('right_province')));
				// $right_district        = trim(addslashes($this->input->post('right_district')));
				// $right_address         = trim(addslashes($this->input->post('right_address')));
				$link_gg                 = $this->input->post('link_gg');
				$link_yt                 = $this->input->post('link_yt');
				$link_tt                 = $this->input->post('link_tt');
				$link_face               = $this->input->post('link_fabook');
				$data_insert = array(
					'seo_title'                => $seo_title,
					'slogan'                   => $slogan,
					'seo_description'          => $seo_description,
					'seo_keywords'             => $seo_keywords,
					'address'                  => $address,
					'mst'                      => $mst,
					'email'                    => $email_footer,
					'hotline'                  => $contact_hotline,
					'conten'                   => $content_address,
					'fax'                      => $fax,
					'address_hn'			   =>$address_hn,
					'phone_hn'				   =>$phone_hn,
					'fax_hn'				   =>$fax_hn,   
					'hotline_hn'			   =>$hotline_hn,
					'email_hn'				   =>$email_hn,
					'link_google'	           => $link_gg,
					'link_tt'	               => $link_tt,
					'link_youtube'	           => $link_yt,
					'link_facebook'	           => $link_face,
					// 'link_google_map'	   => $link_gm,
				);
			   
				$this->info->update($data_insert);
				$this->view->data['success'] = lang('success_settings');
			}

			//$this->view->data['images'] = getImagesToFolder($dir);
			$this->view->data['info'] = $this->info->getInfo();
			$this->view->render('index');
		} else {
			$mess = array(
				'flash_warning' => "Bạn không có quyền này!!!",
			);
			Session::create($mess);
			return redirect(base_url() . 'product/product/index');
		}
	}
	public function userOnline() {
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
		*/
	}
	public function setLang() {
		$lang = $this->input->post('lang');
		//Session::create(array('lang'=> $lang));
		$cookie_name = "lang";
		$cookie_value = $lang;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day

		$data = array(
			'status' => true,
			'mess' => 'Success',
		);

		echo json_encode($data);
	}

	public function updateInfo() {
		if (isset($_POST['src'])) {
			$title = trim(addslashes($_POST['title']));
			if ($title == 'logo') {
				$data = array(
					'logo' => trim(addslashes($_POST['src'])),
				);
			} else {
				$data = array(
					'icon' => trim(addslashes($_POST['src'])),
				);
			}

			$this->info->update($data);
			$data_mess = array(
				'status' => true,
				'mess' => lang('logo_update_success'),
			);
			echo json_encode($data_mess);
		}
	}
	public function loadImageDefault() {
		if (isset($_POST['status']) && is_numeric($_POST['status'])) {
			if ($_POST['status'] != 0) {
				$data_update = array(
					'logo' => '',
				);
			} else {
				$data_update = array(
					'icon' => '',
				);
			}
			$this->info->update($data_update);
			$data = array(
				'status' => true,
				'mess' => lang('notification') . lang('success_settings'),
			);
			echo json_encode($data);
		}
	}
	public function openDirectory() {
		if (isset($_POST['check_folder']) && $_POST['check_folder'] != false && isset($_POST['directory'])) {
			$direct = trim(addslashes($_POST['check_folder']));
			$dir = trim($_POST['directory']) . $direct . "/";
			//$dir          = DIR_TMP.'cdn/'.$direct."/";
			$html = listAllFolderChooseImage($dir);
			$data = array(
				'status' => true,
				'html' => $html,
				'mess' => lang('notification') . lang('uploaded_message'),
			);
			echo json_encode($data);
		}

	}
	public function backDirectory() {
		if (isset($_POST['back']) && isset($_POST['directory'])) {
			$directory = dirname($_POST['directory']) . "/";
			$html = listAllFolderChooseImage($directory);
			$data = array(
				'status' => true,
				'html' => $html,
				'mess' => lang('notification') . lang('uploaded_message'),
			);
			echo json_encode($data);
		}

	}

	public function openDirectoryFile() {
		if (isset($_POST['check_folder']) && $_POST['check_folder'] != false && isset($_POST['directory'])) {
			$direct = trim(addslashes($_POST['check_folder']));
			$dir = trim($_POST['directory']) . $direct . "/";
			//$dir          = DIR_TMP.'cdn/'.$direct."/";
			$html = listAllFolderChooseFile($dir);
			$data = array(
				'status' => true,
				'html' => $html,
				'mess' => lang('notification') . lang('uploaded_message'),
			);
			echo json_encode($data);
		}

	}
	public function backDirectoryFile() {
		if (isset($_POST['back']) && isset($_POST['directory'])) {
			$directory = dirname($_POST['directory']) . "/";
			$html = listAllFolderChooseFile($directory);
			$data = array(
				'status' => true,
				'html' => $html,
				'mess' => lang('notification') . lang('uploaded_message'),
			);
			echo json_encode($data);
		}

	}
	public function sendFiles() {
		if (isset($_FILES['file']['name'])) {
			$file_name = $_FILES['file']['name'];
			$tmp_name = explode('.', $_FILES['file']['name']);
			$ext = end($tmp_name);
			if ($ext == 'json') {
				if (move_uploaded_file($_FILES['file']['tmp_name'], DIR_TMP . 'files/' . $file_name)) {
					$data_insert = array(
						'google_file_json' => $file_name,
					);
					$this->info->update($data_insert);
					$status = true;
					$mess = lang('success') . lang('uploaded_message');
				} else {
					$status = false;
					$mess = lang('warning') . lang('not_uploaded_message');
				}
			} else {
				$status = false;
				$mess = lang('warning') . lang('not_uploaded_message');
			}
			$data = array(
				'status' => $status,
				'mess' => $mess,
			);
			echo json_encode($data);
		}
	}

}