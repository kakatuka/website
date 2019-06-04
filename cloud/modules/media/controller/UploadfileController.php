<?php 
class UploadfileController extends Controller{
	public $modeluploadfile;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->modeluploadfile = $this->loadModel('uploadfile');
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

	public function uploadFile(){
		header('Access-Control-Allow-Origin: *');
		$html = '';
		if (isset($_POST)) {
			$dir = trim($_POST['directory']);
			if (isset($_FILES['media'])) {
				// dd($_FILES['media']);
				$file_display = ['application/vnd.ms-powerpoint','application/vnd.ms-excel','application/msword','application/json','application/pdf','text/plain','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/vnd.openxmlformats-officedocument.presentationml.presentation','application/vnd.openxmlformats-officedocument.presentationml.slideshow','text/csv','application/zip','application/x-tar','application/octet-stream'];
				if(in_array($_FILES['media']['type'],$file_display) == true){
					$handle = new upload($_FILES['media']);
					// dd($handle);
					if ($handle->uploaded) {
					  $handle->process($dir);
					  if ($handle->processed) {
					  	// dd(1);
	                    $html = listAllFolderFile($dir);
					    $data = array(
					    	'status'	=> true,
					    	'html'		=> $html,
					    	'mess'		=> lang('notification').': '.lang('uploaded_message')
					    );
					    $handle->clean();
					  } else {
					  	// dd(2);
					    $data = array(
					    	'status'	=> false,
					    	'html'		=> $html,
					    	'mess'		=> lang('warning').': '.lang('not_uploaded_message')
					    );
					  }
					}
				}else{
					$data = array(
				    	'status'	=> false,
				    	'html'		=> $html,
				    	'mess'		=> lang('warning').': '.lang('not_type_uploaded_message')
				    );
				}
			}else{
				$data = array(
				    	'status'	=> false,
				    	'html'		=> $html,
				    	'mess'		=> lang('warning').': '.lang('not_uploaded_message')
				);
			}
			sleep(2);
			echo json_encode($data);
		}
	}
	public function refesh(){
		header('Access-Control-Allow-Origin: *');
		//$dir          = DIR_TMP.'cdn/';
		if (isset($_POST['directory'])) {
			$dir = trim($_POST['directory']);
			$html = listAllFolderFile($dir);
	        $data = array(
					    	'status'	=> true,
					    	'html'		=> $html,
					    	'mess'		=> lang('notification').': '.lang('uploaded_message')
					    );
			sleep(2);
			echo json_encode($data);
		}
		
	}
	public function deleteFile(){
		header('Access-Control-Allow-Origin: *');
		//$dir          = DIR_TMP.'cdn/';
		if (isset($_POST['title']) && isset($_POST['directory'])) {
			$title = trim(addslashes($_POST['title']));
			$dir = trim($_POST['directory']);
			if (file_exists($dir.$title)) {
				if (is_dir($dir.$title)) {
					delete_dir($dir.$title);
				}else{
					unlink($dir.$title);
				}
    			
    		}
    		$html = listAllFolderFile($dir);
	        $data = array(
					    	'status'	=> true,
					    	'html'		=> $html,
					    	'mess'		=> lang('notification').': '.lang('uploaded_message')
					    );
			sleep(1);
			echo json_encode($data);
		}
	}
	
	public function createNameFolder(){
		header('Access-Control-Allow-Origin: *');
		//$dir          = DIR_TMP.'cdn/';
		if (isset($_POST['new_name']) && isset($_POST['directory'])) {
			$dir = trim($_POST['directory']);
			$new_name = alias(trim($_POST['new_name']));
			if (!is_dir($dir.$new_name)) {
			    mkdir($dir.$new_name,0777, true);
			    $status = true;
			    $mess 	= lang("create_folder_success");
			    $arr = array(
			    	'status'  	=>	$status,
			    	'mess'		=> $mess
			    );
			    echo json_encode($arr);
			}
		}
	}
	public function renameFile(){
		header('Access-Control-Allow-Origin: *');
		//$dir          = DIR_TMP.'cdn/';
		if (isset($_POST['new_name']) && isset($_POST['old_name'])) {
			$old_name = $_POST['old_name'];
			$dir = trim($_POST['directory']);
			$new_name = alias(trim($_POST['new_name']));
			if (is_dir($dir.$old_name)) {
				rename($dir.$old_name,$dir.$new_name);
				$data = array(
					'status'	=> true,
					'mess'		=> lang('mess_copy')
				);
			}else{
				$tmp_name = explode(".",$old_name);
				if (count($tmp_name)==2) {
					$ext = $tmp_name[1];
					rename($dir.$old_name,$dir.$new_name.".".$ext);
					$data = array(
						'status'	=> true,
						'mess'		=> lang('mess_copy')
					);
				}else{
					$data = array(
						'status'	=> false,
						'mess'		=> lang('mess_copy_false')
					);
				}
			}
			echo json_encode($data);
		}
	}
	public function renameCopyFile(){
		header('Access-Control-Allow-Origin: *');
		//$dir          = DIR_TMP.'cdn/';
		if (isset($_POST['new_name']) && isset($_POST['old_name'])) {
			$dir = trim($_POST['directory']);
			$old_name = $_POST['old_name'];
			$new_name = alias(trim($_POST['new_name']));
			if (is_dir($dir.$old_name)) {
				copy_directory($dir.$old_name,$dir.$new_name);
				$data = array(
					'status'	=> true,
					'mess'		=> lang('mess_copy_rename')
				);
			}else{
				$tmp_name = explode(".",$old_name);
				if (count($tmp_name)==2) {
					$ext = $tmp_name[1];					
					copy($dir.$old_name,$dir.$new_name.".".$ext);
					$data = array(
						'status'	=> true,
						'mess'		=> lang('mess_copy_rename')
					);
				}else{
					$data = array(
						'status'	=> false,
						'mess'		=> lang('mess_copy_rename_false')
					);
				}
			}
			echo json_encode($data);
		}
	}
	public function openDirectory(){
		header('Access-Control-Allow-Origin: *');
		if (isset($_POST['check_folder']) && $_POST['check_folder']!=false && isset($_POST['directory'])) {
			$direct = trim(addslashes($_POST['check_folder']));
			$dir = trim($_POST['directory']).$direct."/";
			//$dir          = DIR_TMP.'cdn/'.$direct."/";
			$html = listAllFolderFile($dir);
	        $data = array(
					    	'status'	=> true,
					    	'html'		=> $html,
					    	'mess'		=> lang('notification').': '.lang('uploaded_message')
					    );
			echo json_encode($data);
		}
		
	}
	public function backDirectory(){
		header('Access-Control-Allow-Origin: *');
		if (isset($_POST['back']) && isset($_POST['directory'])) {
			$directory = dirname($_POST['directory'])."/";
			$html = listAllFolderFile($directory);
	        $data = array(
					    	'status'	=> true,
					    	'html'		=> $html,
					    	'mess'		=> lang('notification').': '.lang('uploaded_message')
					    );
			echo json_encode($data);
		}
		
	}
	public function openOneDirectory(){
		header('Access-Control-Allow-Origin: *');
		global $_web;
		if (isset($_POST['open']) && $_POST['open'] == $_web['security_key']) {
			$direct = trim(addslashes($_POST['open']));
			$dir = DIR_FILES;
			//$dir          = DIR_TMP.'cdn/'.$direct."/";
			$html = listAllFolderFile($dir);
	        $data = array(
					    	'status'	=> true,
					    	'html'		=> $html,
					    	'mess'		=> lang('notification').': '.lang('uploaded_message')
					    );
			echo json_encode($data);
		}else{
			echo "Đây là nơi lưu trữ files!";
		}		
	}
	public function openOneFilesDirectory(){
		header('Access-Control-Allow-Origin: *');
		global $_web;
		if (isset($_POST['open']) && $_POST['open'] == $_web['security_key']) {
			$direct = trim(addslashes($_POST['open']));
			$dir = DIR_FILES;
			//$dir          = DIR_TMP.'cdn/'.$direct."/";
			$html = listAllFolderChooseFile($dir);
	        $data = array(
					    	'status'	=> true,
					    	'html'		=> $html,
					    	'mess'		=> lang('notification').': '.lang('uploaded_message')
					    );
			echo json_encode($data);
		}else{
			echo "Đây là nơi lưu trữ files!";
		}		
	}
}