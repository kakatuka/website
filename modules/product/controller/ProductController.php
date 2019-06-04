<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class ProductController extends Controller{
	public $modelProduct;
	public $cart;
	public $modelAddress;
	public $modelCart;
	public function __construct(){
		parent::__construct();
		
		$this->modelProduct = $this->loadModel('Product');
		$this->modelAddress = $this->loadModel('Address');
		$this->modelCart 	= $this->loadModel('Cart');
	}
	public function index(){
        if($_GET['id']){
        	global $_web;
        	$id = $_GET['id'];
        	$id_cate = ','.$id.',';
	        // Lay san pham theo cate
	        $link       = base_url().'catalog.htm';
            $allnews    = $this->modelProduct->getAllProduct1();
            $all_pages  = getRelatedPosts($id, $allnews); 
            if (!empty($all_pages )) {
	  			$paging     = new Paging(count($all_pages), $link);
	            $limit 		= $_web['options']['pagination_number_product'];
	            // Tổng số trang
	            $count_page = $paging->findPages($limit);
	            // Bắt đầu từ mẫu tin
	            $start      = $paging->rowStart($limit);
	            // Trang hiện tại
	            $curpage    = ($start / $limit) + 1;
	            $this->view->data['data']          = getLimitPosts($all_pages,$start,$limit);
                $this->view->data['pagination']    = $paging->pagesListCatalog($id, $curpage);
            }
            // dd( $this->view->data['data']);
            $category_name = $this->modelProduct->getCateProuct($id);
            $this->view->data['infoCate']      = $this->modelProduct->getCateProuct($id);
            $this->view->data['img_cate']      = $this->modelProduct->getCateProuct($id);
            $this->view->data['tour_date']     = $this->modelProduct->getTourdate();
            $this->view->data['count_le']      = $this->modelProduct->getCountle();
            $this->view->data['count_doan']    = $this->modelProduct->getCountdoan();
	        
	       	$this->view->title       = isset($category_name['title']) ? stripcslashes( $category_name['title']) : '';
			$this->view->description = isset($category_name['meta_description']) ? stripcslashes($category_name['meta_description']) : '';
			$this->view->keywords    = isset($category_name['meta_keyword']) ? stripcslashes($category_name['meta_keyword']) : '';
	        $this->view->render('index');
        }	
	}
	public function ajaxTour(){
		$start      = $_POST['start'];
		$limit      = $_POST['limit'];
		$group_tour = $_POST['group_tour'];
		$date_tomorow = date('d-m-Y', strtotime("+3 days"));
        $date_str   = strtotime($date_tomorow);
		$data_group = $this->modelProduct->getGroupTour($start,$limit,$group_tour);
		if (!empty($data_group)) {
			foreach ($data_group as $key => $value) {
				$arr_listDay = json_decode($value['other_info'],true);
				$html ='<div class="col-xs-12">
					<div class="box_tour">
					    <div class="row">
					        <div class="col-xs-12 col-sm-5 col-md-5">
					         	<a href="'.base_url() .  $value['alias'] . "-" .  $value['id'] .'.htm"><img src="'.getImage($value['image'],261,146,1).'" title="'.$value['name'] .'" alt="'. $value['name'].'"></a>
					        </div>
					      <div class="col-xs-12 col-sm-7 col-md-7">
					        <div class="box_main">
					          <h3>	<a href="'.base_url() .  $value['alias'] . "-" .  $value['id'] .'.htm">'. $value['name'] .'</a></h3>
					          <h4>';
						        $diemden = json_decode($value['tour_end'] ,true);
                                     if (!empty($diemden)) {
                                        foreach ($diemden as $key => $value1) {
                                           $value1.' ';
                                       }
                                     }
						        $html.='</h4>
					          <div class="content">
					            <p>'. $value['short_info'].'</p>
					            <p> Thời gian: '. $value['day'] .'</p>
					            <p>Phương tiện: '. $value['tour_car'] .'</p>
					            <p></p>
					          </div>
					        </div>
					        <div class="box_price">
					            <p>Giá từ</p>
					            <p class="price">'. number_format($value['price']) .'</p>
					            <a href="'. base_url() .  $value['alias'] . "-" .  $value['id'] .'.htm">CHI TIẾT</a>
					        </div>
					      </div>
					      <div class="col-xs-12 ">';
					      	if ($value['group_tour']==1) {
					      		 $html.='<div class="box_book">
								            <div class="box_1">
								            	<span class="book_date"><i class="fa fa-calendar"></i>';
									                foreach ($arr_listDay as $key => $day) {
									                  $day_list = str_replace('/','-',$day['start_day']);
									                  $date = strtotime($day_list);
									                  	if ($date > $date_str) {
									                       $html.=' '.$day['start_day'];
									                      break;
									                  	}
									                }
								          		$html.='</span>
								            <span class="book_price"><i class="fa fa-money" aria-hidden="true"></i> '.number_format($value['price']) .'</span>
								        </div>
								        <div class="box_2">
								            <a href=""><span class="book_detail">Chi tiết </span></a>
								            <span class="book_now"  data-id="'.$value['id'].'" data-img="'.$value['image'].'">Giữ chỗ 
												<input type="hidden" name="title" id="title" value="'. $value['name'].'">
                                                <input type="hidden" name="day"  id="day"  value="'. $value['day'] .'">';
                                                foreach ($arr_listDay as $key => $day) {
                                                  $day_list = str_replace('/','-',$day['start_day']);
                                                  $date = strtotime($day_list);
                                                  if ($date > $date_str) {
                                                    $html.='<input type="hidden" name="date" id="date" value="'.$day['start_day'] .'">
                                                    <input type="hidden" name="price_men" id="code" value="'. $day['code'] .'">
                                                    <input type="hidden" name="price_men" id="price_men" value="'. $day['price_men'].'">
                                                    <input type="hidden" name="price_child" id="price_child" value="'.$day['price_child'] .'">
                                                    <input type="hidden" name="price_baby" id="price_baby" value="'. $day['price_baby'] .'">';
                                                     break;
                                                  }
                                              }
								            $html.='</span>
								        </div>
							            <p class="load_date" data-id="'. $value['id'].'">Xem thêm ngày khỏi hành</p>
							   		</div>';
					      	}else{
					      		$html.='<div class="box_book doan">
                                 <p class="load_date doan_date" data-id="'.$value['id'].'">Xem thêm ngày khỏi hành</p>
                                </div>';
					      	}
					$html.='<div id="load_'.$value['id'].'" class="load_more">
					          <table class="table table-bordered table-customize table-responsive">
					            <thead>
					                <tr>
					                    <th>Khởi hành</th>
					                    <th>Mã tour</th>
					                    <th>Giá</th>
					                    <th>Trẻ em</th>
					                    <th>Em bé</th>
					                    <th></th>
					                </tr>
					            </thead>
					            <tbody>';
					            foreach ($arr_listDay as $key => $day) {
					                $day_list = str_replace('/','-',$day['start_day']);
					                $date     = strtotime($day_list);
					                if ($date > $date_str) {
					               		 $html.='<tr>
						                      <td data-title="Khởi hành" > <span class="tb_date">'. $day['start_day'] .'</span></td>
						                      <td data-title="Mã tour"><span class="tb_date">'. $day['code'] .'</span></td>
						                      <td data-title="Giá"><span class="tb_prie">'. number_format($day['price_men']).'</span></td>
						                      <td data-title="Trẻ em" ><span class="tb_prie">'. number_format($day['price_child']) .'</span></td>
						                      <td data-title="Em bé" ><span class="tb_prie">'. number_format($day['price_baby']).'</span></td>
						                      <td>
						                       <span class="tb_book book_now" data-id="'. $value['id'] .'" data-img="'. $value['image'].'">Mua 
						                        <input type="hidden" name="title" id="title" value="'. $value['name'].'">
                                                <input type="hidden" name="day"  id="day"  value="'. $value['day'].'">
                                                <input type="hidden" name="date" id="date" value="'.$day['start_day'] .'">
                                                <input type="hidden" name="price_men" id="code" value="'. $day['code'] .'">
                                                <input type="hidden" name="price_men" id="price_men" value="'. $day['price_men'] .'">
                                                <input type="hidden" name="price_child" id="price_child" value="'.$day['price_child'] .'">
                                                <input type="hidden" name="price_baby" id="price_baby" value="'. $day['price_baby'] .'">
						                       </span>
						                      </td>
						                  </tr>';
					                }
					              }
					             $html.='</tbody>
					          </table>
					        </div>
					      </div>
					    </div>  
				  </div>
				</div>';
			}
		    $check="success";
		}else{
		    $check="error";
		}
		$data_array= array(
		'htm'    => $html,
		'check'  => $check
		);
		echo json_encode($data_array);
	}
	public function ajaxTourDoan(){
		$group_tour = $_POST['group_tour'];
		$cate   = $_POST['cate'];
		$date_tomorow = date('d-m-Y', strtotime("+3 days"));
        $date_str   = strtotime($date_tomorow);
		$data_group = $this->modelProduct->getGroupTour(0,8,$group_tour,$cate);
		if (!empty($data_group)) {
			foreach ($data_group as $key => $value) {
				$arr_listDay = json_decode($value['other_info'],true);
				$html.='<div class="col-xs-12">
							<div class="box_tour">
							    <div class="row">
							        <div class="col-xs-12 col-sm-5 col-md-5">
							         	<a href="'.base_url() .  $value['alias'] . "-" .  $value['id'] .'.htm"><img src="'.getImage($value['image'],261,146,1).'" title="'.$value['name'] .'" alt="'. $value['name'].'"></a>
							        </div>
							      <div class="col-xs-12 col-sm-7 col-md-7">
							        <div class="box_main">
							          <h3><a href="'.base_url() .  $value['alias'] . "-" .  $value['id'] .'.htm">'. $value['name'] .'</a></h3>
							          <h4>';
							             $diemden = json_decode($value['tour_end'] ,true);
                                             if (!empty($diemden)) {
                                               foreach ($diemden as $key => $value1) {
                                                   $value1.' ';
                                               }
                                             }
							          $html.='</h4>
							          <div class="content">
							            <p>'. $value['short_info'].'</p>
							            <p> Thời gian: '. $value['day'] .'</p>
							            <p>Phương tiện: '. $value['tour_car'] .'</p>
							            <p></p>
							          </div>
							        </div>
							        <div class="box_price">
							            <p>Giá từ</p>
							            <p class="price">'. number_format($value['price']) .'</p>
							            <a href="'. base_url() .  $value['alias'] . "-" .  $value['id'] .'.htm">CHI TIẾT</a>
							        </div>
							     </div>
							 
							    </div>
							    </div>  
						  </div>
						</div>';
			}
		    $check="success";
		}else{
		    $check="error";
		}
		$data_array= array(
		'htm'    => $html,
		'check'  => $check
		);
		echo json_encode($data_array);
	}
	public function detail_view(){
		$id = $_GET['id'];

		$this->view->data['cate'] = $this->modelProduct->getCateHienTai($id);
		$this->view->data['title'] = $_SESSION['a'];
		$this->view->data['description'] = $_SESSION['b'];
		$link 			= base_url().$this->view->data['cate']['alias'];
		$getPr   	=  $this->modelProduct->getListpr($id);
		$paging 	 = new Paging(count($getPr),$link);
		$limit 		 = 12;
		// Tổng số trang
		$count_page = $paging->findPages($limit);
		// Bắt đầu từ mẫu tin
		$start 		= $paging->rowStart($limit);
		// Trang hiện tại
		$curpage 	= ($start/$limit)+1;
		$this->view->data['list'] = getLimitPosts($getPr,$start,$limit);
		$this->view->data['pagination'] = $paging->pagesList2($id,$curpage); 
	    $this->view->render('detail_view');
	}	

	public function search(){
	$keyword = $_POST["keyword"];
	$data = $this->modelProduct->findSearch($keyword);
	if (!empty($keyword) && isset($data)) {
		foreach ($data as $key => $value) {
			if ($value['price']!="") {
				$html_seaech .= '<div class="product_add" id="id_product_seaech-'.$value['id'].'" style="overflow: hidden;">'
				.'<div class="images_product">'
				.'<a href="'.base_url().$value['alias'].'-'.$value['id'].'.htm'.'"><img src="'.base_url_cloud().'timthumb.php?src='.base_url_cloud().'cdn/'.$value['image'].'&h=80&w=100&zc=2" alt="" width="80px;"></a>'
				.'</div>'
				.'<input type="hidden" class="hidden_product" value="'.$value['name'].'" />'
				.'<input type="hidden" class="hidden_price" value="'.$value['price'].'">'
				.'<input type="hidden" class="hidden_id_order" value="'.'" />'
				.'<input type="hidden" class="images" value="'.$value['image'].'" />'
				.'<div class="product_name">'
				.'<a href="'.base_url().$value['alias'].'-'.$value['id'].'.htm'.'"><h5>'.$value['name'].'</h5></a>'
				.'</div>'
				.'<div class="price" style="color:red;">'.covertMoney($value['price']) .'  VNĐ'
				.'</div>'
				.'</div><hr>';
			}else{
				$html_seaech .= '<div class="product_add" id="id_product_seaech-'.$value['id'].'" style="overflow: hidden;">'
				.'<div class="images_product">'
				.'<a href="'.base_url().$value['alias'].'-'.$value['id'].'.htm'.'"><img src="'.base_url_cloud().'timthumb.php?src='.base_url_cloud().'cdn/'.$value['image'].'&h=80&w=100&zc=2" alt="" width="80px;"></a>'
				.'</div>'
				.'<input type="hidden" class="hidden_product" value="'.$value['name'].'" />'
				.'<input type="hidden" class="hidden_price" value="'.'Liên Hệ'.'">'
				.'<input type="hidden" class="hidden_id_order" value="'.'" />'
				.'<input type="hidden" class="images" value="'.$value['image'].'" />'
				.'<div class="product_name">'
				.'<a href="'.base_url().$value['alias'].'-'.$value['id'].'.htm'.'"><h5>'.$value['name'].'</h5></a>'
				.'</div>'
				.'<div class="price" style="color:red;">'.'Liên Hệ'
				.'</div>'
				.'</div><hr>';
			}
		}
	}else{
		$html_seaech .="Không có kết quả nào phù hợp";
	}
	$data =  array(
		'status'=>true,
		'html'  => $html_seaech,
		);
	echo json_encode($data);
   }
	public function detail(){
		global $_web;
		global $_L;
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];
			$_SESSION['_token'] = $token;
			$this->view->data['data_product']  = $this->modelProduct->getDetail($id);
			$this->view->data['product_new']   = $this->modelProduct->getProductNew();
			$this->view->data['date_tour']     = $this->modelProduct->getTour($id);
			$cate_id = $this->view->data['data_product']['category'];
			if ($cate_id) {
			$cate_array = explode(',', $cate_id);
			$this->view->data['product_lien_quan'] = $this->modelProduct->getProductLienQuan($id,','.$cate_array[1].',');
			$this->view->date['name_cate']         = $this->modelProduct->getBreadcrumbsCategory($cate_array[1]);
			$this->view->data['listNamecate']      = $this->modelProduct->getNamecate($cate_array[1]);
			}
			// dd($this->view->data['product_lien_quan']);
			// $tag = $this->view->data['data_posts']['tags'];
			// $this->view->data['post_tags']  = explode(",", $tag);

            $this->view->data['sale'] = false;
			$this->view->title       = isset($this->view->data['data_product']['name']) ? stripcslashes( $this->view->data['data_product']['name']) : '';
			$this->view->description = isset($this->view->data['data_product']['meta_title']) ? stripcslashes($this->view->data['data_product']['meta_title']) : '';
			$this->view->keywords    = isset($this->view->data['data_product']['meta_keyword']) ? stripcslashes($this->view->data['data_product']['meta_keyword']) : '';
		}
		// dd($this->view->data['data_product']);
		$this->view->render('product_detail');
		
	}
	public function bookTour(){
		$id    = $_POST['id'];
		$title = $_POST['title'];
		$img   = $_POST['img'];
		$day   = $_POST['day'];
		$date  = $_POST['date'];
		$code  = $_POST['code'];
		$price_men   = $_POST['price_men'];
		$price_child = $_POST['price_child'];
		$price_baby  = $_POST['price_baby'];
		$data_book = array(
		 'id'           => $id,
		 'title'        => $title,
		 'img'          => $img,
		 'day'          => $day,
		 'date'         => $date,
		 'code'         => $code,
		 'price_men'    => $price_men,
		 'price_child'  => $price_child,
		 'price_baby'   => $price_baby,
		);
		if (isset($_SESSION["cart_book"])) {
			$_SESSION["cart_book"] = $data_book;
		}else{
			$_SESSION["cart_book"] = $data_book;
		}
		$check ="success";
		echo json_encode($check);
	}
	public function checktour(){
		global $_web;
		$this->view->render('book_tour');
	}
	public function confimTour(){
		require_once DIR_ROOT."vendor/PHPMailer/src/SMTP.php";
        require_once DIR_ROOT."vendor/PHPMailer/src/PHPMailer.php";
        require_once DIR_ROOT."vendor/PHPMailer/src/Exception.php";
		$name     =  $_POST['name'];
		$phone    = $_POST['phone'];
		$email    = $_POST['email'];
		$address  = $_POST['address'];
		$content  = $_POST['content'];
		$title    = $_POST['title'];
		$day      = $_POST['day'];
		$date     = $_POST['date'];
		$code     = $_POST['code_tour'];
		$nguoi_lon   = $_POST['adult'];
		$tre_em      = $_POST['child'];
		$em_be       = $_POST['infant'];
		$price_men   = $_POST['price-adult'];
		$price_child = $_POST['price-child'];
		$price_baby  = $_POST['price-baby'];
		$price_total =  $_POST['price-total'];
		$methor      = $_POST['method'];
		if ($methor==1) {
			$pay ="Thanh toán chuyển khoản qua Ngân Hàng";
		}else{
			$pay ="Thanh toán tiền mặt";
		}
		$info_buy = array(
			'fullname'	=> $name,
			'email' 	=> $email,
			'phone' 	=> $phone,
			'address' 	=> $address,
			'content'   =>$content
		);
		$data_order = array(
		 'title'        => $title,
		 'day'          => $day,
		 'date'         => $date,
		 'code_tour'    => $code,
		 'invoice'      => 'BILL-'.time(),
		 'int_men'      => $nguoi_lon,
		 'int_child'    => $tre_em, 
		 'int_baby'     => $em_be,
		 'price_men'    => $price_men,
		 'price_child'  => $price_child,
		 'price_baby'   => $price_baby,
		 'payment_type_method' =>$methor,
		 'total'        => $price_total,
		 'status'       => 1,
		 'info_buy'		=> json_encode($info_buy),
		 'create_time'   => time()
		);
		$lastid = $this->modelCart->addCart($data_order);
        $html = '<div>
                <h1 style="text-align:center">Thông Tin Khách Hàng Book Touris</h1>
                <p>Họ và tên: <span style="font-size:15px;color:red;font-weight: 600;padding-right:10px">'.$name.'</span></p>
                <p>Số điện thoại:<span style="font-size:15px;color:red;font-weight: 600;padding-right:10px">'. $phone.'</span></p>
                <p>Địa chỉ:<span style="font-size:15px;color:red;font-weight: 600;padding-right:10px">'. $address.'</span></p>
                <p>Email : <span style="font-size:15px;color:red;font-weight: 600;padding-right:10px">'.$email.'</span></p>
                <p>Nội dung: <span style="font-size:15px;color:red;font-weight: 600;padding-right:10px">'.$content.'</span></p>
                <h2 style="text-align:center">Thông Tin Tour Du Lịch</h2>
                <table class="table">
				    <thead>
				      <tr>
				        <th style="width: 23%;">Ngày khởi hành</th>
				        <th style="width: 23%;">Mã tour</th>
				        <th style="width: 23%;">Người lớn</th>
				        <th style="width: 23%;">Trẻ em </th>
					    <th style="width: 23%;">Em bé </th>
				      </tr>
				    </thead>
				    <tbody>
				      <tr>
				        <td style="text-align:center;font-size:15px;color:red">'.$date.'</td>
					    <td style="text-align:center;font-size:15px;color:red">'.$code.'</td> 
					    <td style="text-align:center;font-size:15px;color:red">'.number_format($price_men).'<span style="color:black"> x '.$nguoi_lon.' </span></td>
					    <td style="text-align:center;font-size:15px;color:red">'.number_format($price_child).'<span style="color:black"> x '.$tre_em.'</span></td>
					    <td style="text-align:center;font-size:15px;color:red">'.number_format($price_baby).'<span style="color:black"> x '.$em_be.'</span></td>
				      </tr>
				    </tbody>
				</table>
				<h3>Tên tour: '.$title.'</h3>
                <p>Thời gian: <span style="font-size:15px;color:red;font-weight: 600;padding-right:10px">'.$day.'</span></p>
                <p>Phương thức thanh toán: <span style="font-size:15px;color:blue;font-weight: 600;padding-right:10px">'.$pay.'</span></p>
                <p>Tổng tiền: <span style="font-size:15px;color:red;font-weight: 600;padding-right:10px">'.number_format($price_total).' VNĐ</span></p>
        </div>';
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug  = 1;                                 // Enable verbose debug output
            $mail->isSMTP();   
            $mail->CharSet    = "utf-8";                                   // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                               // Enable SMTP authentication
            $mail->Username   = 'developersonano@gmail.com';                 // SMTP username
            $mail->Password   = '12319901993';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to
            //Recipients
            $mail->setFrom('developersonano@gmail.com','Book Tour');
            $mail->addAddress('ìnfo@hungvuongtourist.com.vn');     // Add a recipient
            $mail->addCC($email);
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Khách hàng đặt Tour';
            $mail->Body    =  "$html";
            // $mail->AddAttachment($file);
            $mail->send();
        } catch (Exception $e) {
        	 echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
		echo '<script type="text/javascript">window.location = "http://dulichvietnamtourism.com/succses.htm"</script>';
	}
	public function succsessorder(){
    	if (isset($_SESSION['cart_book'])) {
			$this->view->render('done');
			unset($_SESSION['cart_book']);
		}else{
			redirect(base_url());
		}
    }
    public function orderRoom(){
    	if (isset($_POST['datphong'])) {
    		$name	      = trim(addslashes($this->input->post('name')));
			$phone 	      = trim(addslashes($this->input->post('phone')));
			$todate       = str_replace("/", "-",$this->input->post('todate'));
			$enddate      = str_replace("/", "-", $this->input->post('enddate'));
			$style_room	  = trim(addslashes($this->input->post('room')));
			$date_1       = date("Y-m-d",strtotime(str_replace(" ", "", $todate )));
			$date_2       = date("Y-m-d",strtotime(str_replace(" ", "", $enddate)));
			$email 		  = trim(addslashes($this->input->post('email')));
			$roomAdults   = trim(addslashes($this->input->post('room_Adults')));
			$roomChildren = trim(addslashes($this->input->post('roomChildren')));
			$numberroom   = trim(addslashes($this->input->post('numberroom')));
			$data  = array(
				"name"         => $name,
				"phone"        => $phone,
				"todate"       => $date_1,
				"endate"       => $date_2,
				"room_style"   => $style_room,
				"roomAdults"   => $roomAdults,
				"roomChildren" => $roomChildren,
				"numberroom"   => $numberroom,
				"email"        => $email,
			);
			$data['create_time'] 	= time();
			$this->modelProduct->insertDatPhong($data);
    	}
    	redirect(base_url());
    }

	public function ajaxAddRateProduct(){
		if (!empty($_POST['data'])) {
			$id_product = $_POST['data']['id_product'];
			$name = trim(addslashes($_POST['data']['name']));
			$code = trim(addslashes($_POST['data']['code']));
			$email = $_POST['data']['email'];
			$review = trim(addslashes($_POST['data']['review']));
			$rate = $_POST['data']['rate'];
			$status = true;
			if (!filter_var($email, FILTER_VALIDATE_EMAIL) === true) {
				$status = false;
				$fiel = "email";
			    $mess = lang('invalid_email');
			}else{
				$data = array(
					'id_product' => $id_product,
					'name' 		 => $name,
					'code' 		 => $code,
					'email' 	 => $email,
					'review' 	 => $review,
					'star'  	 => $rate,
					'status'  	 => 1,
					'create_time'=> time()
				);
				// dd($data);
				$this->modelProduct->insertRate($data);
				$fiel = "";
			    $mess = lang('success').' '.lang('success_review');

			}
			$data_mess = array(
				'status'	=> $status,
				'fiel'	=> $fiel,
				'mess'	=> $mess
			);
			echo json_encode($data_mess);
		}
	}
	public function ajaxAdd2Cart(){
		header("Access-Control-Allow-Origin: *");
		global $_web;
		if (!empty($_POST['data'])) {
			if (is_numeric($_POST['data']['id'])) {
				$id = $_POST['data']['id'];
				$data = $this->modelProduct->getThumbnailAddCart($id);
				$item = array(
						    'id'       => $_POST['data']['id'],
						    'name'     => $_POST['data']['name'],
						    'code'     => $_POST['data']['code'],
						    'price'    => $_POST['data']['price'],
						    'quantity' => $_POST['data']['qty'],
						    'options'  => array(
						                'size' => $_POST['data']['size']=='' || !isset($_POST['data']['size']) ? null : $_POST['data']['size'],
						                'color'=> $_POST['data']['color']=='' || !isset($_POST['data']['color']) ? null : $_POST['data']['color'],
						                'image'	=>$data['image']
				            )

				);
				// session_destroy();
				$this->cart->insert($item);
				$status = true;
				$mess = lang('add_item_to_cart');
				$html ='';
				$data_cart = & $this->cart->contents();
				foreach ( $data_cart as $key => $value) {
					$price_0 = "Liên hệ";
                    $html .= '<div class="product-cart " data-id="'.$value->id.'" data-identifier="'.$value->identifier.'">
						<i class="fa fa-times del-cart-top" data-id="'.$value->id.'" data-identifier="'.$value->identifier.'" aria-hidden="true" title="xóa"></i>
							<a href="#">
								<div class="img-cart">
									<img src="'.getImage($value->options['image'], '70', '50', 'zc=1').'" alt="1.jpg">
								</div>
								<div class="title-cart">
									<p>'.$value->name.'</p>
									<p>Giá:
										<span>';
										if ($value->price >0 ) {
										 $html .= number_format($value->price).' VNĐ';
										}else{
										 $html .= $price_0;
										}	
									$html.='</span></p>
									<p>SL: <span>'. $value->quantity.'</span></p>
								</div>
							</a>
							<div class="clearfix"></div>
						</div> ';
	            }
	            $total_cart 	= $this->cart->total();
				$total_item 	= $this->cart->totalItems();
				$total_unique 	= $this->cart->totalUniqueItems();
				$data_mess = array(
					'status'		=>$status,
					'mess'			=>$mess,
					'html'			=> $html,
					'total_cart'	=> number_format($total_cart,0,'','.').' VNĐ',
					'total_item'	=> $total_item,
					'total_unique'	=> $total_unique
				);
				echo json_encode($data_mess);
			}
			
			
		}
	}
	public function ajaxChangePropertyProductOnCart(){
		global $_web;
		if (isset($_POST['data']['identifier']) && is_numeric($_POST['data']['id'])) {
			$id = $_POST['data']['id'];
			$data = $this->modelProduct->getThumbnailAddCart($id);
			foreach ($this->cart->contents() as $key => $item) {
				if ($item->id ==$_POST['data']['id'] && $key==$_POST['data']['identifier']) {
				    if (isset($_POST['data']['color'])) {
				    	$this->cart->update($_POST['data']['identifier'],"options", array('color'=>$_POST['data']['color']));
				    	$status = true;
				    	$mess = lang('updated_color');
				    }
				    if(isset($_POST['data']['size'])){
				    	$this->cart->update($_POST['data']['identifier'],"options", array('size'=>$_POST['data']['size']));
				    	$status = true;
				    	$mess = lang('updated_size');
				    }
				    if(isset($_POST['data']['quantity'])){
				    	$this->cart->update($_POST['data']['identifier'],"quantity", $_POST['data']['quantity']);
				    	$status = true;
				    	$mess = lang('updated_quantity');
				    }
				    $this->cart->contents()[$key]->total = $item->price * $item->quantity;
				  
				    echo json_encode(
				    	array(
					    	'status'	   =>$status,
					    	'mess'		   =>$mess,
					    	'identifier'   => $key,
					    	'total_item'   => number_format($this->cart->contents()[$key]->total,0,'','.'),
					    	'total_cart'   => number_format($this->cart->total(),0,'','.')
				    	)
				    );
				    break;
				}
			}
		}
	}
	public function ajaxRemoveItemCart(){

		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			foreach ($this->cart->contents() as $key => $item) {
				if ($item->id == $_POST['id'] && $key == $_POST['identifier']) {
					$item->remove();
					$status = true;
					$mess = lang('remove_item_to_cart');
					$total_cart 	= $this->cart->total();
					$total_item 	= $this->cart->totalItems();
					$total_unique 	= $this->cart->totalUniqueItems();
					$data_mess = array(
						'status'		=>$status,
						'mess'			=>$mess,
						'total_cart'	=> number_format($total_cart,0,'','.'),
						'total_item'	=> $total_item,
						'total_unique'	=> $total_unique
					);
					echo json_encode($data_mess);
					break;
				}
			}
		}
	}

	public function cart(){
		global $_web;
		$this->view->data['OtherProducts'] 	= $this->modelProduct->getAllOtherProducts(0,4);
		$this->view->data['cart'] =& $this->cart->contents();
		foreach ($this->view->data['cart'] as $key => $value) {
			$this->view->data['cart'][$key]->total = $value->price * $value->quantity;
		}
		$this->view->data['total_cart'] 	= $this->cart->total();
		$this->view->data['total_item'] 	= $this->cart->totalItems();
		$this->view->data['total_unique'] 	= $this->cart->totalUniqueItems();
		$this->view->data['province']		= $this->modelAddress->getProvince();
		// dd($this->view->data['cart']);
		$this->view->render('cart_view');
	}

	public function checkout(){
		global $_web;
		if (!empty($this->cart->contents(true))) {
			$this->view->data['cart'] 			=& $this->cart->contents();

			foreach ($this->view->data['cart'] as $key => $value) {
				$this->view->data['cart'][$key]->total = $value->price * $value->quantity;
			}
			$this->view->data['total_cart'] 	= $this->cart->total();
			$this->view->data['total_item'] 	= $this->cart->totalItems();
			$this->view->data['total_unique'] 	= $this->cart->totalUniqueItems();
			$this->view->data['province']		= $this->modelAddress->getProvince();

// dd($this->view->data['total_item']);

		
			$this->view->render('checkout_view');
		}else{
			redirect(base_url());
		}


	}
	public function getDistrict(){
		header("Access-Control-Allow-Origin: *");
		if (isset($_POST['province_id']) && is_numeric($_POST['province_id'])) {
			$province_id = $_POST['province_id'];
			$data = $this->modelAddress->getDistrictByProvinceId($province_id);
			$html='<option value=""> --- '.lang('please_select').' --- </option>';
			foreach ($data as $key => $value) {
				$html .= '<option value="'.$value['districtid'].'">'.$value['nhanh_name'].'</option>';
			}
			echo json_encode(array(
                'status' => true,
                'html'	 => $html
			));
		}
	}

	public function tags(){
		if(isset($_GET['tag'])){
			$tag = $_GET['tag'];
			$link = base_url() . 'tags.htm?tag=' . $tag . '';
			$all_pages = $this->modelProduct->getTags(convertEnglish($tag));
			// dd($all_pages);
			$paging = new Paging(count($all_pages), $link);
			$limit = 5;
			$count_page = $paging->findPages($limit);

			if (isset($_GET['p'])) {
				$curpage = $_GET['p'];
				$start = ($_GET['p'] - 1) * $limit;
			} else {
				$curpage = ($start / $limit) + 1;
				$start = $paging->rowStart($limit);
			}
			$this->view->data['tag'] = getLimitPosts($all_pages, $start, $limit);
			// dd($this->view->data['tag']);
			$this->view->title       = isset($this->data['tag']['title']) ? stripcslashes($this->data['tag']['title']) : '';
			$this->view->description = isset($this->data['tag']['meta_description']) ? stripcslashes($this->data['tag']['meta_description']) : '';
			$this->view->keywords    = isset($this->view->data['tag']['meta_keyword']) ? stripcslashes($this->data['tag']['meta_keyword']) : '';
			$this->view->data['pagination'] = $paging->pagesListSearch($curpage);
		}
		$this->view->data['product_hot']  = $this->modelProduct->getProductHot();
		$this->view->render('tags');
	}

	public function confirmOrder(){
		global $_web;
		if (isset($_POST['confirm_order'])) {
			// dd($_POST);
			$left_fullname = trim(addslashes($this->input->post('left_fullname')));
			$left_email = trim(addslashes($this->input->post('left_email')));
			$left_phone = trim(addslashes($this->input->post('left_phone')));
			$left_province = trim(addslashes($this->input->post('left_province')));
			$left_district = trim(addslashes($this->input->post('left_district')));
			$left_address = trim(addslashes($this->input->post('left_address')));
			$info_buy = array(
				'fullname'	=> $left_fullname,
				'email' 	=> $left_email,
				'phone' 	=> $left_email,
				'province' 	=> $left_province,
				'district' 	=> $left_district,
				'address' 	=> $left_address
			);
			$right_fullname = trim(addslashes($this->input->post('right_fullname')));
			$right_email = trim(addslashes($this->input->post('right_email')));
			$right_phone = trim(addslashes($this->input->post('right_phone')));
			$right_province = trim(addslashes($this->input->post('right_province')));
			$right_district = trim(addslashes($this->input->post('right_district')));
			$right_address = trim(addslashes($this->input->post('right_address')));

			// $payment_type = trim(addslashes($this->input->post('payment')));
			$info_receive = array(
				'fullname'	=> $right_fullname,
				'email' 	=> $right_email,
				'phone' 	=> $right_email,
				'province' 	=> $right_province,
				'district' 	=> $right_district,
				'address' 	=> $right_address
			);

			$data = array(
				'invoice'       => 'BILL'.time(),
				'sub_total'     => $this->cart->total(),
				'total'         => $this->cart->total(),
				'currency_code' => 'VNĐ',
				'id_user'       => ($_SESSION['userid'])? $_SESSION['userid'] : 0, // 0 : khách
				'status'        => 1, // 1 : đơn hàng mới, 
				'info_buy'		=> json_encode($info_buy),
				'info_receive'	=> json_encode($info_receive),
				// 'payment_type_method'	=> $payment_type,
				'create_time'   => time()
			);
			$lastid = $this->modelCart->addCart($data);


			// insert data to product_order_product (làm tạm)
			// dd($this->cart->contents(true));
			if(!empty($this->cart->contents(true))){
				foreach ($this->cart->contents(true) as $k => $v) {
					$data_item = array(
						'order_id'   => $lastid,
						'product_id' => $v['id'],
						'image'      => $v['options']['image'],
						'name'       => $v['name'],
						'code'       => $v['code'],
						'size'    	 => $v['options']['size'],
						'color'  	 => $v['options']['color'],
						'quantity'   => $v['quantity'],
						'price'      => $v['price'],
						'total'      => $v['total'],
						'tax'        => 0,
						'reward'     => 0
					);
					// de($data_item);
					$this->modelCart->addCartProduct($data_item);//Thế này là đang insert các trường vào bảng product_order_product
				}
			}
			// die("ok");
			$_SESSION['invoice'] 		= $data['invoice'];
			$_SESSION['idCart'] 		= $lastid;

			$this->cart->destroy();
			redirect(base_url().'done');

		}else{
			redirect(base_url().'checkout');
		}
	}
	public function done(){
		if (isset($_SESSION['idCart'])) {
			$this->view->data['invoice'] =  $_SESSION['invoice'];
			$this->view->render('done');
			unset($_SESSION['idCart']);
			unset($_SESSION['invoice']);
		}else{
			redirect(base_url());
		}
	}	
}