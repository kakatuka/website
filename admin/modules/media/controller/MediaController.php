<?php
class MediaController extends Controller {
	public $modelImages;
	//public $loadPages;
	public function __construct() {
		parent::__construct();
		$this->modelImages = $this->loadModel('media');
	}
	public function index() {
		global $_web;
		//$this->view->data['images']  = $this->modelImages->getAllImages();
		$this->view->render('index');
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

	public function uploadImages() {
		$html = '';
		if (isset($_POST)) {
			$dir = trim($_POST['directory']);
			if (isset($_FILES['media'])) {
				$handle = new upload($_FILES['media']);
				if ($handle->uploaded) {
					//$handle->file_new_name_body   = 'image_resized';
					//$handle->image_resize         = true;
					//$handle->image_x              = 100;
					//$handle->image_ratio_y        = true;
					//$dir          = DIR_TMP.'cdn/';
					$handle->process($dir);
					if ($handle->processed) {
						$html = listAllFolder($dir);
						$data = array(
							'status' => true,
							'html' => $html,
							'mess' => lang('notification') . lang('uploaded_message'),
						);
						$handle->clean();
					} else {
						$data = array(
							'status' => false,
							'html' => $html,
							'mess' => lang('warning') . lang('not_uploaded_message'),
						);
					}
				}
			} else {
				$data = array(
					'status' => false,
					'html' => $html,
					'mess' => lang('warning') . lang('not_uploaded_message'),
				);
			}
			sleep(2);
			echo json_encode($data);
		}
	}
	public function refesh() {
		//$dir          = DIR_TMP.'cdn/';
		if (isset($_POST['directory'])) {
			$dir = trim($_POST['directory']);
			$html = listAllFolder($dir);
			$data = array(
				'status' => true,
				'html' => $html,
				'mess' => lang('notification') . lang('uploaded_message'),
			);
			sleep(2);
			echo json_encode($data);
		}

	}
	public function deleteImage() {
		//$dir          = DIR_TMP.'cdn/';
		if (isset($_POST['title']) && isset($_POST['directory'])) {
			$title = trim(addslashes($_POST['title']));
			$dir = trim($_POST['directory']);
			if (file_exists($dir . $title)) {
				if (is_dir($dir . $title)) {
					delete_dir($dir . $title);
				} else {
					unlink($dir . $title);
				}

			}
			$html = listAllFolder($dir);
			$data = array(
				'status' => true,
				'html' => $html,
				'mess' => lang('notification') . lang('uploaded_message'),
			);
			sleep(1);
			echo json_encode($data);
		}
	}

	public function createNameFolder() {
		//$dir          = DIR_TMP.'cdn/';
		if (isset($_POST['new_name']) && isset($_POST['directory'])) {
			$dir = trim($_POST['directory']);
			$new_name = alias(trim($_POST['new_name']));
			if (!is_dir($dir . $new_name)) {
				mkdir($dir . $new_name, 0777, true);
				$status = true;
				$mess = lang("create_folder_success");
				$arr = array(
					'status' => $status,
					'mess' => $mess,
				);
				echo json_encode($arr);
			}
		}
	}
	public function renameImage() {
		//$dir          = DIR_TMP.'cdn/';
		if (isset($_POST['new_name']) && isset($_POST['old_name'])) {
			$old_name = $_POST['old_name'];
			$dir = trim($_POST['directory']);
			$new_name = alias(trim($_POST['new_name']));
			if (is_dir($dir . $old_name)) {
				rename($dir . $old_name, $dir . $new_name);
				$data = array(
					'status' => true,
					'mess' => lang('mess_copy'),
				);
			} else {
				$tmp_name = explode(".", $old_name);
				if (count($tmp_name) == 2) {
					$ext = $tmp_name[1];
					rename($dir . $old_name, $dir . $new_name . "." . $ext);
					$data = array(
						'status' => true,
						'mess' => lang('mess_copy'),
					);
				} else {
					$data = array(
						'status' => false,
						'mess' => lang('mess_copy_false'),
					);
				}
			}
			echo json_encode($data);
		}
	}
	public function renameCopyImage() {
		//$dir          = DIR_TMP.'cdn/';
		if (isset($_POST['new_name']) && isset($_POST['old_name'])) {
			$dir = trim($_POST['directory']);
			$old_name = $_POST['old_name'];
			$new_name = alias(trim($_POST['new_name']));
			if (is_dir($dir . $old_name)) {
				copy_directory($dir . $old_name, $dir . $new_name);
				$data = array(
					'status' => true,
					'mess' => lang('mess_copy_rename'),
				);
			} else {
				$tmp_name = explode(".", $old_name);
				if (count($tmp_name) == 2) {
					$ext = $tmp_name[1];
					copy($dir . $old_name, $dir . $new_name . "." . $ext);
					$data = array(
						'status' => true,
						'mess' => lang('mess_copy_rename'),
					);
				} else {
					$data = array(
						'status' => false,
						'mess' => lang('mess_copy_rename_false'),
					);
				}
			}
			echo json_encode($data);
		}
	}
	public function openDirectory() {
		if (isset($_POST['check_folder']) && $_POST['check_folder'] != false && isset($_POST['directory'])) {
			$direct = trim(addslashes($_POST['check_folder']));
			$dir = trim($_POST['directory']) . $direct . "/";
			//$dir          = DIR_TMP.'cdn/'.$direct."/";
			$html = listAllFolder($dir);
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
			$html = listAllFolder($directory);
			$data = array(
				'status' => true,
				'html' => $html,
				'mess' => lang('notification') . lang('uploaded_message'),
			);
			echo json_encode($data);
		}

	}

}