<?php 
class PagesController extends Controller{
	public $modelPages;
	public function __construct(){
		parent::__construct();
		$this->modelPages = $this->loadModel('Pages');

	}
	public function index(){
		global $_web;
		// Check if there are any SUCCESS messages
		if (isset($_SESSION['flash_success'])) {
			$this->view->data['flash_success'] = Session::get('flash_success');
			unset($_SESSION['flash_success']);
		}
		if(preg_match("/,81,/",$_SESSION['permission_id'], $matches) || $_SESSION['id'] == $this->view->data['data']['author_create'] || $_SESSION['group_id'] == '20'){
			// Xuất dữ liệu với truy vấn
			$this->view->data['data'] = $this->modelPages->getPagiPages(0,1000);
			$this->view->render('pages_index');
		}else{
			$mess = array(
				'flash_warning' => "Bạn không có quyền này!!!"
			);
			Session::create($mess);
			redirect(base_url()."posts/managerindex/index");
		}
	}	
	public function add(){
		if (isset($_SESSION['flash_success'])) {
			$this->view->data['flash_success'] = Session::get('flash_success');
			unset($_SESSION['flash_success']);
		}

		$dir          = DIR_TMP.'cdn/';
		$this->view->data['images'] = getImagesToFolder($dir);
		$this->view->render('pages_edit');
	}
	public function save(){
		if (isset($_POST['submit'])) {
			$title = htmlentities($this->input->post('title'),ENT_QUOTES);
			$description = htmlentities($this->input->post('description'),ENT_QUOTES);
			$content = $this->input->post('content');
			$note = htmlentities($this->input->post('note'),ENT_QUOTES);
			$thumbnail = trim(addslashes($this->input->post('hidden_thumb_pages')));
			if (isset($_POST['show_contact_form'])) {
				$show_contact_form = trim(addslashes($this->input->post('show_contact_form')));
			}else{
				$show_contact_form = false;
			}
			

			$data = array(
				'title'	=> $title,
				'description'	=> $description,
				'alias'	=> alias($title),
				'content'	=> $content,
				'thumbnail'	=> $thumbnail,
				'note'		=> $note,
			);
			if ($show_contact_form == true) {
				$data['contact_form'] = $this->loadFormContact();
			}else{
				$data['contact_form'] = '';
			}
			if (isset($_POST['id_pages']) && is_numeric($_POST['id_pages'])) { // như thế này là đang update
				$data['author_update'] 	= Session::get('id');
				$data['update_time'] 	= time();
				$this->modelPages->update($data,$_POST['id_pages']);
				$mess = array(
					'flash_success' => lang('update_page_success'),
				);
			}else{ // như thế này là đang insert
				$data['author_create'] 	= Session::get('id');
				$data['create_time'] 	= time();
				$data['status'] 	= 1;
				$this->modelPages->insertData($data);
				$mess = array(
					'flash_success' => lang('insert_page_success'),
				);
			}
			
            Session::create($mess);
            if ($_POST['submit']=='save') {
            	redirect(base_url().'pages/pages/index');
            }else{
            	redirect(base_url().'pages/pages/add');
            }
            
		}
	}
	public function loadMessagerChecked(){
		echo json_encode(array('mess'=>lang('choose_form_contact')));
	}
	public function loadFormContact(){
		$html = '<form action="" method="POST" role="form">
				    <div class="row">
				        <div class="col-xs-12 col-md-6">
				            <label for="">'.lang('fullname').'</label>
				            <div class="form-group">
				                <input type="text" placeholder="'.lang('fullname').'" class="form-control" id="" name="name" required="">
				            </div>

				            <label for="">'.lang('phone').'</label>
				            <div class="form-group">
				                <input name="phone" placeholder="'.lang('phone').'" class="form-control" type="text" required="">
				            </div>

				            <label for="">'.lang('email').'</label>
				            <div class="form-group">
				                <input name="email" placeholder="'.lang('email').'" class="form-control" type="email" required="">
				            </div>
				            <button type="submit" class="btn btn-primary checkout-info-submit-button" name="send_mess">GỬI TIN</button>
				        </div>

				        <div class="col-xs-12 col-md-6">
				            <label for="">'.lang('content').'</label>
				            <div class="form-group">
				                <textarea class="form-control" name="mess" placeholder="'.lang('content').'" required=""></textarea>
				            </div>
				        </div>
				    </div>
				</form>';
		return $html;
	}
	public function edit(){
		$dir          = DIR_TMP.'cdn/';
		$this->view->data['images'] = getImagesToFolder($dir);
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			if ($this->modelPages->checkId($_GET['id']) == FALSE) {
				$this->view->data['data']=$this->modelPages->getUserById($_GET['id']);
				//$this->view->data['data_en']=$this->modelPages->getUserByIdEng($_GET['id']);
				$this->view->render('pages_edit');
			}
		}
	}
	public function del(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];

			// delete record in htaccess
			$data = $this->modelPages->getUserById($id);
			if (isset($data['old_url']) && $data['old_url']!="") {
				$old_link = $data['old_url'];
				$new_root = str_replace("\admin\\", "\\", DIR_ROOT);
				$htaccess = file($new_root.".htaccess");
				$savestring ="";
				foreach ($htaccess as $key => $value) {
					if (preg_match("/".$old_link."/",$value , $matches)){  // Tìm kiếm đường link cũ đã lưu trong CSDL có trùng với dòng trong file .htaccess ko? nếu mà có trùng thì xóa dòng đó
	    				$value = str_replace("RewriteRule ^".$old_link."\.htm$ index.php?mod=pages&controller=pages&action=detail&id=".$id." [L,QSA]","",$value);
	    			}

	    			$savestring .= $value;
					
				}
				$savestring = $savestring;
				file_put_contents($new_root.".htaccess", $savestring);
			}
			
			// end htaccess




			
			$this->modelPages->delete($id);


			$mess = array(
				'flash_success' => lang('delete_success'),
			);
			Session::create($mess);
			redirect(base_url().'pages/pages/index');
		}
	}









	public function dellAll(){
		if (isset($_POST['all'])) {
			if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];

                if (!empty($names_id)) {
                	foreach ($names_id as $k => $v) {
                		$data = $this->modelPages->getUserById($v);
                		if (isset($data['old_url']) && $data['old_url']!="") {
							$old_link = $data['old_url'];
							$new_root = str_replace("\admin\\", "\\", DIR_ROOT);
							$htaccess = file($new_root.".htaccess");
							$savestring ="";
							foreach ($htaccess as $key => $value) {
								if (preg_match("/".$old_link."/",$value , $matches)){  // Tìm kiếm đường link cũ đã lưu trong CSDL có trùng với dòng trong file .htaccess ko? nếu mà có trùng thì xóa dòng đó
				    				$value = str_replace("RewriteRule ^".$old_link."\.htm$ index.php?mod=pages&controller=pages&action=detail&id=".$v." [L,QSA]","",$value);
				    			}

				    			$savestring .= $value;
								
							}
							$savestring = $savestring;
							file_put_contents($new_root.".htaccess", $savestring);
						}
                	}
                }



                $this->modelPages->dellWhereInArray($names_id);
                $mess = array(
					'flash_success' => lang('delete_all_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'pages/pages/index'
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
                	$this->modelPages->update($data,$value);
                }
                $mess = array(
					'flash_success' => lang('status_pages_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'pages/pages/index'
				);
				echo json_encode($data_mess);
            }
		}
	}
	public function getDomChangeUrl(){
		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			$id = $_POST['id'];
			$data = $this->modelPages->getUserById($id);
			if (isset($data['old_url']) && $data['old_url']!="") {
				$old_link = $data['old_url'];
			}else{
				$old_link = "";
			}
			echo '<span class="default-slug">'.replaceAdmin(base_url()).
				'<span id="editable-post-name"><input type="text" id="new-post-slug" class="form-control" value="'.$old_link.'" autocomplete="off"></span>.htm</span>';
		}
		
	}
	public function changeHtaccess(){
		if (isset($_POST['old_url']) && isset($_POST['new_url']) && is_numeric($_POST['id'])) {
			$old_url = alias($_POST['old_url']);
			$new_url = alias($_POST['new_url']);
			$id = $_POST['id'];



			$new_root = str_replace("\admin\\", "\\", DIR_ROOT);
			$new_root = str_replace("/admin/", "/", $new_root);
			$htaccess = file($new_root.".htaccess");
			$savestring ="";
			//dd($htaccess);
			foreach ($htaccess as $key => $value) {
				if (preg_match("/".$old_url."/",$value , $matches)){  // Tìm kiếm đường link cũ đã lưu trong CSDL có trùng với dòng trong file .htaccess ko? nếu mà có trùng thì thay thế dòng đó bằng đường dẫn mới
    				$value = str_replace("RewriteRule ^".$old_url."\.htm$ index.php?mod=pages&controller=pages&action=detail&id=".$id." [L,QSA]","RewriteRule ^".$new_url."\.htm$ index.php?mod=pages&controller=pages&action=detail&id=".$id." [L,QSA]",$value);
    				$data_update = array('old_url'=>$new_url);
    				$this->modelPages->update($data_update,$id);
    			}

    			$savestring .= $value;
				
			}
			if ($old_url=="" && $old_url!=$new_url) {
				$savestring .= "\n"."RewriteRule ^".$new_url."\.htm$ index.php?mod=pages&controller=pages&action=detail&id=".$id." [L,QSA]";
			}
			$savestring = $savestring;
			file_put_contents($new_root.".htaccess", $savestring);
			$data_mess = array(
				'status'	=> true,
				'mess'		=> lang('update_link_success'),
				'new_url'	=> $new_url,
				'base'		=> replaceAdmin(base_url())
			);
			echo json_encode($data_mess);
		}

	}
}