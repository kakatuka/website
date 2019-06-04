<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class HomeController extends Controller {
	public $modelHome;
	public function __construct() {
		parent::__construct();
		$this->modelHome = $this->loadModel('Home');
	}
	public function index() {   
    $this->view->data['banner']         = $this->modelHome->getBanner();
    $this->view->data['popup']          = $this->modelHome->getPopup();
   
    $this->view->data['product_hot']    = $this->modelHome->getProdcutHot();
    $this->view->data['Trongnuoc']      = $this->modelHome->getTourhome(',1,',0,5);
    $this->view->data['Nuocngoai']      = $this->modelHome->getTourhome(',2,',0,5);
    $this->view->data['free']           = $this->modelHome->getTourhome(',22,',0,5);
    $this->view->data['new_hot']        =  $this->modelHome->getNewhot(',1,',0,5);
    $this->view->data['video']          =  $this->modelHome->getNewhot(',6,',0,5);
    $this->view->data['imgNew']         =  $this->modelHome->getNewhot(',8,',0,6);
    $this->view->data['khampha']        =  $this->modelHome->getNewhot(',7,',0,5);
    $this->view->data['camnang']        =  $this->modelHome->getNewhot(',4,',0,5);
    $this->view->data['diemden']        =  $this->modelHome->getNewhot(',5,',0,6);
	$this->view->title       = isset($_web['settings']['seo_title']) ? stripcslashes($_web['settings']['seo_title']) : '';
	$this->view->description = isset($_web['settings']['seo_description']) ? stripcslashes($_web['settings']['seo_description']) : '';
	$this->view->keywords    = isset($_web['settings']['seo_keywords']) ? stripcslashes($_web['settings']['seo_keywords']) : '';
	$this->view->author      = "Mr.Toán - 0987687869";
	$this->view->render('index');
	}
 
    public function contactMail(){
        require_once DIR_ROOT."vendor/PHPMailer/src/SMTP.php";
        require_once DIR_ROOT."vendor/PHPMailer/src/PHPMailer.php";
        require_once DIR_ROOT."vendor/PHPMailer/src/Exception.php";
        $email =  $_POST['email'];
        $html  = '<div>
                    <h2 style="text-align:center">Đăng ký nhận thông tin khuyến mãi tour</h2>
                    <p>Email khách hàng: <span style="font-size:15px;color:red;font-weight: 600;padding-right:10px">'.$email.'</span></p>
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
            $mail->setFrom('developersonano@gmail.com','Nhận thông tin khuyến mãi tour');
            $mail->addAddress('info@hungvuontourist.com.vn');     // Add a recipient
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Nhận thông tin khuyến mãi tour';
            $mail->Body    =  "$html";
            // $mail->AddAttachment($file);
            $mail->send();
        } catch (Exception $e) {
             echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        echo '<script type="text/javascript">window.location = "http://dulichhungvuong.com.vn/"</script>';
    }
    public function search() {
		    global $_web;
            $lang = $_web['lang'];
            $title  =  $_GET['title'];
            $from   =  $_GET['date'];
            $to     =  $_GET['to'];
            $cate   =  $_GET['type'];
            $s_date = date("Y-m-d", strtotime($from));
            $e_date = date("Y-m-d", strtotime($to));
           if ($title=="") {
                $title="";
           }else{
             $title = " AND ".$lang."_product_basic.name LIKE '%$title%'"; 
           }
           if ($cate=="") {
                $cate ="";
            }else{
                $cate = " AND ".$lang."_product_basic.category LIKE '%$cate%' "; 
            }
            if ($from !="" && $to !="") {
                $date_tour = " AND  str_to_date(".$lang."_price_tour.date_tour,'%d/%m/%Y') BETWEEN '$s_date' AND '$e_date' ";
            }

            if($from !="" && $to ==""){
                $date_tour = " AND str_to_date(".$lang."_price_tour.date_tour,'%d/%m/%Y') LIKE '%$s_date%'";
            }
             if($from =="" && $to !=""){
                $date_tour = " AND str_to_date(".$lang."_price_tour.date_tour,'%d/%m/%Y') LIKE '%$e_date%'";
            }
            if($from =="" && $to ==""){
               $date_tour = "";
            }
            $this->view->data['all_tour'] = $this->modelHome->searchGroup($title,$cate,$date_tour);
           
			// $link      = base_url() . 'tim-kiem.htm?search=' . $search . '';
			// $all_pages = $this->modelHome->getSearch($search);
			// $paging    = new Paging(count($all_pages), $link);
			// $limit     = 6;
			// $count_page = $paging->findPages($limit);
			// if (isset($_GET['p'])) {
			// 	$curpage = $_GET['p'];
			// 	$start   = ($_GET['p'] - 1) * $limit;
			// } else {
			// 	$curpage = ($start / $limit) + 1;
			// 	$start   = $paging->rowStart($limit);
			// }
			// $this->view->data['data']       = getLimitPosts($all_pages, $start, $limit);
			// $this->view->data['pagination']   = $paging->pagesListSearch($curpage);
			// $this->view->data['count_search'] = $this->modelHome->getCount($search);
			
		$this->view->render('search');
	}
     public function setLang(){
        $lang = $this->input->post('lang');
        $cookie_name = "lang";
        $cookie_value = $lang;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day
        $data = array(
            'status' => true,
            'mess'   => 'Success'
        );
        echo json_encode($data);
    }
    public function moreTour(){
        $id   = $_POST['id'];
        $name = $_POST['name'];
        $img  = $_POST['img'];
        $day  = $_POST['day'];
        $date_tomorow = date('d-m-Y', strtotime("+1 days"));
        $date_str = strtotime($date_tomorow);
        $dateTour = $this->modelHome->getTourdate($id);
        $data_array = array();
        if (!empty($dateTour)) {
           foreach ($dateTour as $key => $value) {
            $day_list = str_replace('/','-',$value['date_tour']);
            $date = strtotime($day_list);
            if ($date > $date_str) {
              array_push($data_array,$value);
            }
          } 
        } 
        $html ='';
        if (!empty($data_array)) {
            $i=0;
            foreach ($data_array as $key => $value) {
              $i++;
               $html.='
                <div class="row">
                    <h5>Thông tin tour chi tiết thứ
                        #'.$i.'</h5>
                    <div></div>
                    <div class="col-md-2 col-xs-12">
                        <label>Ngày khởi
                            hành</label>
                        <strong>'.$value['date_tour'].'</strong>
                    </div>
                    <div class="col-md-2 col-xs-12">
                        <label>Mã Tour</label>
                        <strong style="margin-left: -30px;">'.$value['code'].'</strong>
                    </div>
                    <div class="col-md-2 col-xs-12 price">
                        <label>Giá</label>
                        <strong>'. number_format($value['price']).'</strong>
                    </div>
                    <div class="col-md-2 col-xs-12 price">
                        <label>Giá trẻ em</label>
                        <strong>'. number_format($value['price_e']).'</strong>
                    </div>
                    <div class="col-md-2 col-xs-12 price">
                        <label>Giá trẻ sơ
                            sinh</label>
                        <strong>'. number_format($value['price_b']).'</strong>
                    </div>
                    <div class="col-md-2 col-xs-12 packageInfo">
                        <label>Đặt/Mua tour</label>
                        <span>
                            <a class="btn buttonCustomPrimary buy-tour book_now" data-id="'.$id.'" data-img="'.$img.'">
                                Mua tour
                                 <input type="hidden" name="title" id="title" value="'.$name.'">
                                <input type="hidden" name="day"  id="day"  value="'.$date.'">
                                <input type="hidden" name="date" id="date" value="'.$value['date_tour'].'">
                                <input type="hidden" name="price_men" id="code" value="'.$value['code'].'">
                                <input type="hidden" name="price_men" id="price_men" value="'.$value['price'].'">
                                <input type="hidden" name="price_child" id="price_child" value="'. $value['price_e'].'">
                                <input type="hidden" name="price_baby" id="price_baby" value="'. $value['price_b'].'">
                            </a>
                        </span>
                    </div>
                </div> ';
            }
        }
        $data_array= array(
        'htm'    => $html
        );
        echo json_encode($data_array);
    }
}