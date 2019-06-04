<?php 
class PostsController extends Controller{
	public $modelPosts;
	 //biến lưu trữ token sinh tự động
	private $formKey;
     
    //biến lưu trữ lại token cũ
    private $old_formKey;
	public function __construct(){
		parent::__construct();
		$this->modelPosts = $this->loadModel('Posts');
		//lưu lại token lấy từ session
        if(isset($_SESSION['form_key']))
        {
            $this->old_formKey = $_SESSION['form_key'];
        }
	}
	
	public function categories(){
		global $_web;
		if (isset($_GET['id'])) {
			$id 		= $_GET['id'];
			$link 		= base_url().$this->view->data['menu']['alias'];
			$id_cate = ','.$id.',';
			$getAllpost = $this->modelPosts->getPostByCate($id_cate);
			// dd($getAllpost);
			$all_pages 	= getPostLienQuan($id,$getAllpost);
			$paging 	= new Paging(count($all_pages),$link);
			// dd($paging);
			$limit 		= $_web['options']['pagination_number'];
			// dd($limit);
			if (isset($_GET['p'])) {
				$curpage = $_GET['p'];
				$start = ($_GET['p'] - 1) * $limit;
			} else {
				$curpage = ($start / $limit) + 1;
				$start = $paging->rowStart($limit);
			}
			// Tổng số trang
			$count_page = $paging->findPages($limit);
			// Bắt đầu từ mẫu tin
			$start 		= $paging->rowStart($limit);

			// Trang hiện tại
			$curpage 	= ($start/$limit)+1;
			// Tạo session id_cate_now khi vào chuyên mục
			if($_SESSION['id_cate_now'] && $_SESSION['id_cate_now'] != ""){
				$_SESSION['id_cate_now'] 	= $id;
			} else{
				$data = array(
					'id_cate_now' => $id
				);
				Session::create($data);
			}
			//Xuất dữ liệu với truy vấn
			$this->view->data['cate_name']  = $this->modelPosts->getCatePost($id);
			$this->view->data['data'] 		= getLimitPosts($all_pages,$start,$limit);
			$this->view->data['AllPost']	= $getAllpost;
			$this->view->data['pagination'] = $paging->pagesList1($id,$curpage); 
			$this->view->data['posts_hot']  = $this->modelPosts->getPostHot(','. $id.',');
			

			$manager = $this->modelPosts->getManager();
	        $homepost = $this->modelPosts->getAllNews();
	        $this->view->data['list'] = getManagerHome($manager, $homepost);
			// SEO
			$this->view->title 			= stripslashes($this->view->data['data']['title']);
			$this->view->description 	= stripslashes($this->view->data['data']['description']);
			$this->view->keywords 		= stripslashes($this->view->data['data']['tags']);
			$this->view->author 		= $_web['settings']['slogan'];
		}
		$this->view->render('index');
	}
	public function detail(){
		global $_L;
		global $_web;
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];
			$this->view->data['getId'] = $id;
			$_SESSION['_token'] = $token;
			// Lấy chi tiết tin
			$this->view->data['data_posts']   = $this->modelPosts->getDetail($id);
			$this->view->data['post_new']     = $this->modelPosts->getPostsNew();
		    $this->view->data['post_related'] = $this->modelPosts->getPostRelated($cateid,$id);
		    
			$cate_id   = str_replace(array( ','),'',$this->view->data['data_posts']['cate_id']);
			$this->view->data['cate_name']  = $this->modelPosts->getcate($cate_id);
			$this->view->data['posts_cate'] = $this->modelPosts->getPostsCate($id);
			$this->view->data['posts_view'] = $this->modelPosts->getPostsView();

			$this->view->title 			= stripslashes($this->view->data['data_posts']['title']);
			$this->view->description 	= stripslashes($this->view->data['data_posts']['meta_description']);
			$this->view->keywords 		= stripslashes($this->view->data['data_posts']['meta_keyword']);
			$this->view->author 		= $_web['settings']['slogan'];
		}
		$this->view->render('detail_view');
	}
	public function conment(){
		if (isset($_POST['email'])) {
			$phone   = $_POST['phone'];
			$name    = $_POST['name'];
			$email   = $_POST['email'];
			$content = $_POST['conment'];
			$id      = $_POST['id'];
			$title   = $_POST['title'];
			$data = array(
				'phone'    =>$phone,
				'name'     =>$name,
				'email'    =>$email,
				'content'  =>$content,
				'id_posts' =>$id,
				'title'    =>$title,
				'status'   => 0,
			);
			$data['create_time'] = time();
			$this->modelPosts->InsertConment($data);
			$html.="success";
		}
		$data = array(
				'status' => true,
				'html' => $html,
			);
		echo json_encode($data);
	}
	public function tags(){
		if(isset($_GET['tag'])){
			$tag = $_GET['tag'];
			$link = base_url() . 'tag.htm?tag=' . $tag . '';
			$all_pages = $this->modelPosts->getTags($tag);
			// dd($all_pages);
			$paging = new Paging(count($all_pages), $link);
			$limit = 6;
			$count_page = $paging->findPages($limit);

			if (isset($_GET['p'])) {
				$curpage = $_GET['p'];
				$start = ($_GET['p'] - 1) * $limit;
			} else {
				$curpage = ($start / $limit) + 1;
				$start = $paging->rowStart($limit);
			}
			// dd($limit);
			$this->view->data['tag'] = getLimitPosts($all_pages, $start, $limit);
			// dd($this->view->data['tag']);
			$this->view->data['pagination'] = $paging->pagesListSearch($curpage);
		}
		$this->view->data['posts_hot']  = $this->modelPosts->getPostHot();
		// dd($this->view->data['posts_hot']);
		$this->view->data['list_hot']   = $this->modelPosts->getListHot();
		// dd($this->view->data['list_hot']);
		$this->view->data['posts_care'] = $this->modelPosts->getPostsCare(0,4);
		// dd($this->view->data['posts_care']);

		$this->view->render('tags');
	}
	
	function goback()
	{
	    header("Location: {$_SERVER['HTTP_REFERER']}");
	    exit;
	}
	public function albumAnh(){
		global $_web;
		$link 		= base_url().'album-anh.htm';
		$all_pages  = $this->modelPosts->getAlbumAnh();
		$paging 	= new Paging(count($all_pages),$link);
		$limit 		= 10;
		// Tổng số trang
		$count_page = $paging->findPages($limit);
		// Bắt đầu từ mẫu tin
		$start 		= $paging->rowStart($limit);
		// Trang hiện tại
		$curpage 	= ($start/$limit)+1;

		$this->view->data['data'] 		 = getLimitPosts($all_pages,$start,$limit);
		$this->view->data['pagination']  = $paging->pagesList1(1,$curpage); 
		// dd($this->view->data['pagination']);
		$this->view->render('index_album');
	} 
	public function detail_image(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];
			$this->view->data['getId'] = $id;
			// Lấy chi tiết tin
			$this->view->data['data_image'] = $this->modelPosts->getDetailImage($id);
			$view = 1;
			$data_view  =  $this->modelPosts->getViewImage($id);
			$data_view['view'] = $data_view['view'] + rand($view, 8);
			$data = array(
				'view' => $data_view['view'],
			);
			$this->modelPosts->updateViewImage($data,$id);
			$this->view->data['image_view'] = $this->modelPosts->getImageView();

			$this->view->title 			= stripslashes($this->view->data['data_posts']['title']);
			$this->view->description 	= stripslashes($this->view->data['data_posts']['description']);
			$this->view->keywords 		= stripslashes($this->view->data['data_posts']['tags']);
			$this->view->author 		= $_web['settings']['slogan'];
		}
		$this->view->render('detail_album');
	}
	//hàm sinh token 
    private function generateKey()
    {
        //lấy địa chi ip user
        $ip = $_SERVER['REMOTE_ADDR'];
         
        // sinh số ngẫu nhiên
        $uniqid = uniqid(mt_rand(), true);
         
        //Return the hash
        return md5($ip . $uniqid);
    }
 
     
    //hàm xuất token ra html
    public function outputKey()
    {
        $this->formKey = $this->generateKey();

        //lưu token vào session
        $_SESSION['form_key'] = $this->formKey;
         
        //xuất thẻ input chứa token ra html
        echo "<input type='hidden' name='form_key' id='form_key' value='".$this->formKey."' />";
    }
 
     
    //hàm kiểm tra token 
    public function validate()
    {
        //kiểm tra xem token cũ có trùng với token được submit từ form ko
        // dd($_POST['form_key'].'----'.$this->old_formKey );
        if($_POST['form_key'] == $this->old_formKey)
        {
            // token hợp lệ
            // dd("ok");
            return true;
        }
        else
        {
        	// dd("ok1");
            // token không hợp lệ
            return false;
        }
    }
	
}