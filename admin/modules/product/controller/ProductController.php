<?php
class ProductController extends Controller{
	public $modelProduct;
	public $modelCategory;
	public $modelBrand;
	public function __construct(){
		parent::__construct();
		$this->modelCategory = $this->loadModel('Category');
		$this->modelProduct = $this->loadModel('Product');
		$this->modelBrand = $this->loadModel('Brand');
	}
	public function index(){
		global $_web;
		// Check if there are any SUCCESS messages
		if (isset($_SESSION['flash_success'])) {
			$this->view->data['flash_success'] = Session::get('flash_success');
			unset($_SESSION['flash_success']);
		}
		if (isset($_SESSION['flash_warning'])) {
			$this->view->data['flash_warning'] = Session::get('flash_warning');
			unset($_SESSION['flash_warning']);
		}
		$this->view->data['data'] = $this->modelProduct->getPagiProduct();
		// dd($this->view->data['data']);
		$this->view->data['cate'] = $this->modelProduct->getAllCategory();
		$this->view->data['brand'] = $this->modelBrand->getBrand();

		$this->view->render('index_product');
	}

	public function del(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];
			$this->view->data['data'] = $this->modelProduct->getDataById($_GET['id']);
			if(preg_match("/,71,/",$_SESSION['permission_id'], $matches) || $_SESSION['id'] == $this->view->data['data']['create_author'] || $_SESSION['group_id'] == '20'){
				$this->modelProduct->delete($id);
				$this->modelProduct->deleteDetail($id);
				$this->modelProduct->deleteImage($id);
				$this->modelProduct->deleteTour($id);
				$mess = array(
					'flash_success' => lang('delete_success'),
				);
				Session::create($mess);
				redirect(base_url().'product/product/index');
			}else{
				$mess = array(
						'flash_warning' => "Bạn không có quyền này!!!"
					);
					Session::create($mess);
					redirect(base_url()."product/product/index");
			}
		}
	}
	public function dellAll(){
		if (isset($_POST['all'])) {
			if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];
                $this->modelProduct->dellWhereInArray($names_id);
                $this->modelProduct->dellWhereInArrayDetail($names_id);
                $this->modelProduct->dellWhereInArrayImage($names_id);
                $this->modelProduct->deleteTourArray($names_id);
                $mess = array(
					'flash_success' => lang('delete_all_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'		=> true,
					'redirect'		=> base_url().'product/product/index'
				);
				echo json_encode($data_mess);
            }
		}

}
	public function add(){
		global $_web;
		if (preg_match("/,69,/",$_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20') {
			$this->view->data['data_category']   		= $this->modelCategory->getCategories();
			$this->view->data['data_brand']   			= $this->modelBrand->getBrand();
			$this->view->data['data_product_related']   = $this->modelProduct->list_product(0, 20,$id = null,$where_search = null);
			$this->view->data['more_product_related']   = $this->modelProduct->check_load_more_product(20);
			$this->view->render('add_product');
		}else{
			$mess = array(
				'flash_warning' => "Bạn không có quyền này!!!"
			);
			Session::create($mess);
			redirect(base_url()."product/product/index");
		}



	}
	public function save(){
		if (isset($_POST['submit'])) {
			$title 				= trim(addslashes($this->input->post('title')));
			// $hot              = trim(addslashes($this->input->post('show_contact_form')));
			$content 			= htmlentities($this->input->post('content'),ENT_QUOTES);
			$description 		= $_POST['description'];
			$price 				= trim(addslashes(str_replace(".","",$this->input->post('price'))));
			$meta_title         = trim(addslashes($this->input->post('meta_title')));
			$meta_keyword 		= trim(addslashes($this->input->post('meta_keyword')));
			$meta_description 	= trim(addslashes($this->input->post('meta_description')));
			$avatar 			= trim(addslashes($this->input->post('avatar')));
			$price_old          = trim(addslashes($this->input->post('price_market')));
			$day_tour           = trim(addslashes($this->input->post('day')));
			$tour_cart          = trim(addslashes($this->input->post('tour_car')));
			$tour_start	        = trim(addslashes($this->input->post('tour_start')));
			$tour_end           = $_POST['tour_end'];
			$tour_hot           = $_POST['hot'];
			$tour_hot_1         = $_POST['hot_1'];
			$group_tour         = $_POST['group_tour'];
			$star               = $_POST['star'];
			$event              = trim(addslashes($this->input->post('event')));
			$dichvu             = htmlentities($this->input->post('dichvu'),ENT_QUOTES);
			$dieukhoan          = htmlentities($this->input->post('dieukhoan'),ENT_QUOTES);
			$note               = htmlentities($this->input->post('mote'),ENT_QUOTES);
			$day_add            = $_POST['info_day'];
			$code_add           = $_POST['info_code'];
			$priceMen_add       = $_POST['price_men'];
			$priceCild_add      = $_POST['price_child'];
			$priceBaby_add      = $_POST['price_baby'];
			$start_date         = $_POST['start_date'];
			$end_date           = $_POST['end_date'];
			$order              = $_POST['order'];
			$date_1 = date( 'Y-m-d',strtotime($start_date));
			$date_2 = date( 'Y-m-d',strtotime($end_date));
			if($_POST['categories']){
				$categories 		= $this->input->post('categories');
				if (is_array($categories)) {
					$cate = ",".implode(",",$categories).",";
				}
			}else{
				$cate = '';
			}
			// dd($_POST['images_js']);
			$image_arr = array();
			if (!empty($_POST['images_js'])) {
				for ($i=0; $i < count($_POST['images_js']); $i++) {
					$image_arr[] = array(
						'name' 		=> $_POST['images_js'][$i],
						'att_title' => $_POST['att_title'][$i],
						'att_alt' 	=> $_POST['att_alt'][$i],

					);
				}
			}
			$images = json_encode($image_arr);
			$info_arr = array();
			for ($i=0; $i < count($_POST['info_color']); $i++) {
				$info_arr[] = array(
					'title' 	=> $_POST['info_color'][$i],
				);
			}
			$other_info 		= json_encode($info_arr);
			$timestamp_start 	= $time_start ? \DateTime::createFromFormat('d/m/Y', $time_start)->getTimestamp() : '';
			$timestamp_end 		= $time_end ? \DateTime::createFromFormat('d/m/Y', $time_end)->getTimestamp() : '';
			// product related
			$related = array(
				'category' => array(
					'status'   => trim(addslashes($_POST['status_related_category'])),
					'sort'     => trim(addslashes($_POST['sort_related_category'])),
					'display'  => trim(addslashes($_POST['display_related_category'])),
					'order_by' => trim(addslashes($_POST['order_by_related_category'])),
					'number'   => trim(addslashes($_POST['number_related_category'])),
				),
				'brand'    => array(
					'status'   => trim(addslashes($_POST['status_related_brand'])),
					'sort'     => trim(addslashes($_POST['sort_related_brand'])),
					'display'  => trim(addslashes($_POST['display_related_brand'])),
					'order_by' => trim(addslashes($_POST['order_by_related_brand'])),
					'number'   => trim(addslashes($_POST['number_related_brand'])),
				),
				'price'    => array(
					'status'   => trim(addslashes($_POST['status_related_price'])),
					'sort'     => trim(addslashes($_POST['sort_related_price'])),
					'display'  => trim(addslashes($_POST['display_related_price'])),
					'order_by' => trim(addslashes($_POST['order_by_related_price'])),
					'number'   => trim(addslashes($_POST['number_related_price'])),
					'range'    => str_replace('.', '', $_POST['range_related_price']),
				),
				'select'   => array(
					'status'     => trim(addslashes($_POST['status_related_select'])),
					'sort'       => trim(addslashes($_POST['sort_related_select'])),
					'display'    => trim(addslashes($_POST['display_related_select'])),
					'order_by'   => trim(addslashes($_POST['order_by_related_select'])),
					'id_related' => str_replace(',', '|', $_POST['product_related']),
				),
			);

			// brand
			if (!empty($_POST['brand'])) {
				$brand = '|' . implode('|', $_POST['brand']) . '|';
			} else {
				$brand = '';
			}
			// state
			if (!empty($_POST['state'])) {
				$state = '|' . implode('|', array_filter($_POST['state'])) . '|';
			} else {
				$state = 0;
			}
			$data_basic = array(
				'name'			=> $title,
				'alias'			=> alias($title),
				'destination'   => $destination,
				'hot'           => $tour_hot,
				'hot_1'         => $tour_hot_1,
				'group_tour'    => $group_tour,
				'category'		=> $cate,
				'price'			=> $price,
				'state'			=> $state,
				'short_info'	=> $description,
				'image'			=> $avatar,
				'price_market'  => $price_old,
				'day'           => $day_tour,
				'tour_car'		=> $tour_cart,
				'tour_start'	=> $tour_start,
				'tour_end'		=> json_encode($tour_end),
				'start_date'    => $date_1,
				'end_date'      => $date_2,
				'event'			=> $event,
				'order_by'	    => $order,
				'star'          => $star,
				'status'		=> 1,
			);
			// dd($data_basic);
			if (isset($_POST['id_product']) && is_numeric($_POST['id_product'])) { // như thế này là đang update
				$id_product = $_POST['id_product'];
				$data_basic['update_author'] 	= Session::get('id');
				$data_basic['update_time'] 		= time();
				$this->modelProduct->deleteIdproduct($id_product);
				$this->modelProduct->update($data_basic,$id_product);
				$data_images = array(
					'avatar'	=> $avatar,
					'image'	=> $images
				);
				// dd($data_images);
				$this->modelProduct->updateDataImage($data_images,$id_product);
				$data_detail = array(
					'full_info'			=> $content,
					'dichvu'		    => $dichvu,
					'dieukhoan'		    => $dieukhoan,
					'ghichu'			=> $note, 
					'tags'				=> $meta_keyword,
					'meta_title'		=> $title,
					'meta_keyword'		=> $meta_keyword,
					'meta_description'	=> $meta_description,
					'related_product'	=> json_encode($related)
				);
				$this->modelProduct->updateDataDetail($data_detail,$id_product);
				$j = 1;
				for ($i = 0; $i <count($day_add); $i++) {
					$j+=$id_product;
					$data_tt = array(
						'date_tour'   => $day_add[$i],
						'code'        => 'DLVN'.rand(0,999).$j,
						'product_id'  => $id_product,
						'price'       => $priceMen_add[$i],
						'price_e'     => $priceCild_add[$i],
						'price_b'     => $priceBaby_add[$i],
						'created_at'   =>time(),
				    );
				    $this->modelProduct->insertTour($data_tt);
				}
				$mess = array(
					'flash_success' => lang('update_page_success'),
				);
			}else{ // như thế này là đang insert
				$data_basic['create_author'] 	= Session::get('id');
				$data_basic['create_time'] 	= time();
				$id = $this->modelProduct->insertData($data_basic);
				$data_images = array(
					'id_product'	=> $id,
					'avatar'	=> $avatar,
					'image'	=> $images
				);
				
				$this->modelProduct->insertDataImage($data_images);
				$data_detail = array(
					'id_product'		=> $id,
					'full_info'			=> $content,
					'dichvu'		    => $dichvu,
					'dieukhoan'		    => $dieukhoan,
					'ghichu'			=> $note, 
					'tags'				=> $meta_keyword,
					'meta_title'		=> $meta_title,
					'meta_keyword'		=> $meta_keyword,
					'meta_description'	=> $meta_description,
					'related_product'	=> json_encode($related)
				);
				$this->modelProduct->insertDataDetail($data_detail);
				$j = 1;
				for ($i = 0; $i <count($day_add); $i++) {
					$j+=$id;
					$data_tt = array(
						'date_tour'   => $day_add[$i],
						'code'        => 'DLVN'.rand(0,999).$j,
						'product_id'  => $id,
						'price'       => $priceMen_add[$i],
						'price_e'     => $priceCild_add[$i],
						'price_b'     => $priceBaby_add[$i],
						'created_at'   =>time(),
				    );
				    $this->modelProduct->insertTour($data_tt);
				}
				/*end*/
				$mess = array(
					'flash_success' => lang('insert_page_success'),
				);
			}

            Session::create($mess);
            if ($_POST['submit']=='save') {
            	redirect(base_url().'product/product/index');
            }else{
            	redirect(base_url().'product/product/add');
            }

		}

	}
	public function edit(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $this->input->get('id');
			if ($this->modelProduct->checkId($id) == FALSE) {
				    $this->view->data['data']			 =	$this->modelProduct->getDataById($id);
				    // dd($this->view->data['data']);
				    $this->view->data['data_other_info'] =  $this->modelProduct->getTour($id);
					$this->view->data['data_detail']	 =	$this->modelProduct->getDataDetailById($id);
					$this->view->data['data_images']	 =	$this->modelProduct->getDataImageById($id);
					$this->view->data['data_brand']   	 = 	$this->modelBrand->getBrand();
					$this->view->data['data_detail']['related_product'] = json_decode($this->view->data['data_detail']['related_product'],true);

					// get list product related
					if (!empty($this->view->data['data_detail'])) {
						$arrid = explode('|', $this->view->data['data_detail']['related_product']['select']['id_related']);
						$arr_list_selected = array();
						foreach ($arrid as $value) {
							$arr_list_selected[] = $this->modelProduct->list_product_selected($value);
						}
						$this->view->data['arr_list_selected'] = $arr_list_selected;
						$this->view->data['data_product_related_active'] = implode(",",$arrid);
						array_push($arrid,$id);
						$this->view->data['data_product_related']   = $this->modelProduct->list_product(0, 20,$arrid,$where_search = null);

					}

					foreach ($this->view->data['data'] as $key => $value) {
						if ($key=='time_start') {
							$this->view->data['data'][$key] = ($this->view->data['data'][$key]!=0) ? date('d/m/Y',$value) : "";
						}
						if ($key=='time_end') {
							$this->view->data['data'][$key] = ($this->view->data['data'][$key]!=0) ? date('d/m/Y',$value) : "";
						}
					}

					$this->view->data['data_category']   = $this->modelCategory->getCategories();
					// if (isset($this->view->data['data']['color'])) {
					// 	$this->view->data['data_other_info'] = json_decode($this->view->data['data']['color']);
					// }
					// dd($this->view->data['data_other_info']);
					if (!empty($this->view->data['data_images'])) {
						$this->view->data['data_images']['image'] = json_decode($this->view->data['data_images']['image']);
					}
					$this->view->render('add_product');
				
			}
		}
	}


	public function addInfo(){
		if (isset($_POST['status']) && $_POST['status']==true) {
			$html = '<div class="element-info">
						<div class="col-md-2 noPadding">
					        <input type="color" class="form-control maxlength-handler" name="info_color[]" >
					    </div>
					    <div class="col-md-2" style="padding:0px">
					        <a href="javascript:void(0)" class="btn green add_info" style="border-radius:3px !important"><i class="fa fa-plus"></i></a>
					    </div>
						<div class="clearfix" style="margin:8px 0px;"></div>
					</div>';
			echo $html;
		}
	}

	public function addImagesProduct(){
		if (!empty($_POST['list'])) {
			$list = $_POST['list'];
			// dd($list);
			$i = 1;
			$html='';
			foreach ($list as $key => $value) {
				$url = base_url_cloud().'cdn/'.$value;
				$html .= '<li>
							<div class="imgs">
								<img src="'.$url.'" class="handle">
								<a href="javascript:void(0)" class="btn btn-xs green select_avatar" data-img="'.$value.'" data-choose-avatar="'.lang('choose_avatar').'" data-message="'.lang('selected').'">'.lang('choose_avatar').'</a>
		                        <a href="javascript:void(0)" class="btn btn-xs red delete_image" data-title="'.lang('notification').'" data-message="'.lang('mess_remove_image').'" data-agree="'.lang('agree').'" data-cancel="'.lang('cancel').'" data-lang="vi">'.lang('delete_image').'</a>
							</div>
						    <input type="hidden" name="images_js[]" value="'.$value.'" />
						    <input type="text" name="att_title[]" class="form-control" maxlength="100" placeholder="'.lang('title_image').'">
						    <textarea name="att_alt[]" class="form-control" maxlength="150" placeholder="'.lang('descript_image').'"></textarea>
					  </li>';
			}
			$data = array(
				'status'	=> true,
				'html'		=> $html
			);
			echo json_encode($data);
		}

	}
	public function addImagesProduct1(){
		if (!empty($_POST['list'])) {
			$list = $_POST['list'];
			// dd($list);
			$i = 1;
			$html='';
			foreach ($list as $key => $value) {
				$url = base_url_cloud().'cdn'.$value;
				$html .= '<li>
							<div class="imgs">
								<img src="'.$url.'" class="handle">
								<a href="javascript:void(0)" class="btn btn-xs green select_avatar" data-img="'.$value.'" data-choose-avatar="'.lang('choose_avatar').'" data-message="'.lang('selected').'">'.lang('choose_avatar').'</a>
		                        <a href="javascript:void(0)" class="btn btn-xs red delete_image" data-title="'.lang('notification').'" data-message="'.lang('mess_remove_image').'" data-agree="'.lang('agree').'" data-cancel="'.lang('cancel').'" data-lang="vi">'.lang('delete_image').'</a>
							</div>
						    <input type="hidden" name="images_js[]" value="'.$value.'" />
						    <input type="text" name="att_title[]" class="form-control" maxlength="100" placeholder="'.lang('title_image').'">
						    <textarea name="att_alt[]" class="form-control" maxlength="150" placeholder="'.lang('descript_image').'"></textarea>
					  </li>';
			}
			$data = array(
				'status'	=> true,
				'html'		=> $html
			);
			echo json_encode($data);
		}

	}
	public function addImagesBrand(){
		if (isset($_POST['brand_id']) && is_numeric($_POST['brand_id'])) {
			$id = $_POST['brand_id'];
			$img = $_POST['list'][0];
			$data = array(
				'avatar'	=> $img
			);
			$this->modelBrand->update($data,$id);
			$data_mess = array(
				'status'	=> true,
				'mess'		=> lang('logo_update_success'),
				'avatar'		=> Image(base_url_cloud(),base_url_cloud().'cdn/'.$img,25,25,0)
			);
			echo json_encode($data_mess);
		}
	}
	public function ajaxLoadMore(){
		//$data = array();
		$status = false;
		$start                         = $_POST['data']['start'];
		$arrid                         = ($_POST['data']['id_related']!="") ? explode(',', $_POST['data']['id_related']) : null;
		$list_product_related = $this->modelProduct->list_product($start, 20, $arrid);
		$more_product_related = $this->modelProduct->check_load_more_product($start + 20, true, $arrid);
		$html = '';
		foreach ($list_product_related as $key => $value) {
			$html .='<li class="select-product" data-id="'.$value['id'].'">
                    	<div class="imgs">
                    		<img src="'.base_url_cloud().'cdn/'.$value['image'].'" alt="'.$value['name'].'"/>
                    	</div>
                    	<a>'.$value['name'].'</a>
                	</li>';
		}
		if (!empty($list_product_related)) {
			$status = true;
		}
		$data =array(
			'status'	=> $status,
			'flag'		=> $more_product_related['flag'],
			'start'		=> $more_product_related['start'],
			'ajax'		=> $more_product_related['ajax'],
			'html'		=> $html
		);
		echo json_encode($data);
	}
	public function ajaxSearchProductRelated(){
		$status = false;
		$text                          = trim(addslashes($_POST['data']['text']));
		$arrid                         = ($_POST['data']['id_related']!="") ? explode(',', $_POST['data']['id_related']) : null;
		$list_product_related 			= $this->modelProduct->search_product($text, $arrid);
		$html = '';
		foreach ($list_product_related as $key => $value) {
			$html .='<li class="select-product" data-id="'.$value['id'].'">
                    	<div class="imgs">
                    		<img src="'.base_url_cloud().'cdn/'.$value['image'].'" alt="'.$value['name'].'"/>
                    	</div>
                    	<a>'.$value['name'].'</a>
                	</li>';
		}
		if (!empty($list_product_related)) {
			$status = true;
		}
		$data =array(
			'status'	=> $status,
			'html'		=> $html
		);
		echo json_encode($data);
	}
	public function ajaxAddBrand(){
		if (isset($_POST['title'])) {
			$title = trim(addslashes($this->input->post("title")));
			$alias = alias($title);
			$data_insert = array(
				'name'	=> $title,
				'alias'	=> $alias,
				'create_time'	=> time(),
				'create_author'	=> Session::get('id')
			);
			$id = $this->modelBrand->insertData($data_insert);
			$data = array(
				'status'	=> true,
				'id'		=> $id,
				'title'		=> $title
			);
			echo json_encode($data);
		}
	}
	public function ajaxDeleteBrand(){
		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			$id = $_POST['id'];
			$this->modelBrand->delete($id);
			$data = array(
				'status'	=> true,
				'id'		=> $id
			);
			echo json_encode($data);
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
                	$this->modelProduct->update($data,$value);
                }
                $mess = array(
					'flash_success' => lang('status_pages_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'product/product/index'
				);
				echo json_encode($data_mess);
            }
		}
	}
	public function uploadStatus(){
		if (isset($_POST['status']) && isset($_POST['id'])) {
			$status = $_POST['status'];
			$id = $_POST['id'];
			$data = array(
			"status" => $status,
			);
		 $this->modelProduct->updateStatus($id,$data);
		}
	}

}
