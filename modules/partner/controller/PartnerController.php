<?php
class PartnerController extends Controller {
	public $modelPartner;
	public function __construct() {
		parent::__construct();
		$this->modelPartner = $this->loadModel('Partner');
	}
	public function index() {
		global $_web;
			$id 		= $_GET['id'];
			$link 		= base_url(). 'du-an.htm';
			$id_cate = ','.$id.',';
			$getAllpost = $this->modelPartner->getPartByCate();
			$all_pages 	= getPostLienQuan($id,$getAllpost);
			$paging 	= new Paging(count($getAllpost),$link);
			$limit 		= $_web['options']['pagination_number'];
			if (isset($_GET['page'])) {
				$curpage = $_GET['page'];
				$start = ($_GET['page'] - 1) * $limit;
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
			if($_SESSION['id'] && $_SESSION['id'] != ""){
				$_SESSION['id'] 	= $id;
			} else{
				$data = array(
					'id' => $id
				);
				Session::create($data);
			}
		$this->view->data['part_ner'] = getLimitPosts($getAllpost, $start, $limit);
		$this->view->data['pagination'] = $paging->pagesPartner($curpage); 
		$this->view->render('index');
	}
	public function detail(){
		$id = $_GET['id'];
		$this->view->data['data_partner'] = $this->modelPartner->getDetail($id);
		$this->view->render('detail_view');
	}
}