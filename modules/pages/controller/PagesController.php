<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class PagesController extends Controller{
	public $modelPages;
	//public $loadPages;
	 //biến lưu trữ token sinh tự động
	 private $formKey;
     
    //biến lưu trữ lại token cũ
    private $old_formKey;

	public function __construct(){
		parent::__construct();
		$this->modelPages = $this->loadModel('Pages');
		//lưu lại token lấy từ session
        if(isset($_SESSION['form_key']))
        {
            $this->old_formKey = $_SESSION['form_key'];
        }
	}
	public function index(){

		$this->view->render('index');
	}
    public function detail(){   
        $this->view->data['intro'] = $this->modelPages->getDetail();
        // dd($this->view->data['intro']);
        $this->view->render('detail');
    }
	public function ContactForm()
	{
        require_once DIR_ROOT."vendor/PHPMailer/src/SMTP.php";
        require_once DIR_ROOT."vendor/PHPMailer/src/PHPMailer.php";
        require_once DIR_ROOT."vendor/PHPMailer/src/Exception.php";
        $title      = "Tư vấn tour du lịch";
        $hoten      = "Họ và tên: ".$_POST['name'];
        $phone      = "Số điện thoại: ".$_POST['phone'];
        $email      = "Email liên hệ: ". $_POST['email'];
        $content    = "Nội dung: ". $_POST['message'];
        $html = '<div>
                <h1 style="\text-align:center\"> '.$title.'</h1>
                <p>Họ và tên: <span style="font-size:15px;color:red;font-weight: 600;padding-right:10px">'.$hoten.'</span></p>
                <p>Số điện thoại:<span style="font-size:15px;color:red;font-weight: 600;padding-right:10px">'. $phone.'</span></p>
                <p>Email liên hệ: <span style="font-size:15px;color:red;font-weight: 600;padding-right:10px">'.$email.'</span></p>
                <p>Nội dung: <span style="font-size:15px;color:red;font-weight: 600;padding-right:10px">'.$content.'</span></p>
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
            $mail->setFrom('developersonano@gmail.com','Contac khách hàng');
            $mail->addAddress('toansafza204@gmail.com');     // Add a recipient
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Khách hàng liên hệ';
            $mail->Body    =  "$html";
            // $mail->AddAttachment($file);
            $mail->send();

        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        
		return redirect(base_url()."lien-he.htm");
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

    //hàm trả về page cũ
    function goback()
	{
	    header("Location: {$_SERVER['HTTP_REFERER']}");
	    exit;
	}
}