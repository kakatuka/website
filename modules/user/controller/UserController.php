<?php 
class UserController extends Controller{
	public $modelUser;
	public function __construct(){
		parent::__construct();
		$this->modelUser = $this->loadModel('User');
	}
	public function index(){
		global $_web;
		$status = true;
		$error = array();
		$success = array();
		if (isset($_POST['regis_ok']) && $_SESSION['_token'] == $_POST['_token']) {
            if ($this->input->post('email') == '') {
                $status = false;
                $error[] = lang('no_email');
            }
            if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
                $status = false;
                $error[] = lang('invalid_email');
            }
            if ($this->input->post('username') == '') {
                $status = false;
                $error[] = lang('no_username');
            }
            if ($this->input->post('password') == '') {
                $status = false;
                $error[] = lang('no_pass');
            }
            if ($this->input->post('password') != $this->input->post('repassword')) {
                $status = false;
                $error[] = lang('invalid_pass');
            }
            if (checkCaptcha($_POST['captcha_cha']) == true && $status == true) {

                $keyverify = generateRandomString(32, '0123456789');
                // dd($keyverify);
                $title = "[" . $_web['settings']['slogan'] . "] Please verify your email";
                $metacontent = "Logo HOME SERVICES SUPPORT Hello, Thank you for joining " . $_web['settings']['slogan'] . " and signing up for our newsletter to receive news and limited time discounts! Before we can send you anything we need you to verify your";
                $link = base_url() . "verify.htm&e" . $this->input->post('email') . "&v" . $keyverify;
                $content = getcontentmail(base_url(), base_url_cdn(). $_web['settings']['logo'], $_web['settings']['slogan'], $link, $_web['settings']['address']);
                $data = array(
                    'email' => trim(addslashes($this->input->post('email'))),
                    'username' => trim(addslashes($this->input->post('username'))),
                    'password' => md5("nxthd1991@gmail.com|" . $this->input->post('password')),
                    'create_time' => time(),
                    'status' => 1,
                    'verify_key' => $keyverify // để trống sau này dùng confirm send mail
                );
               // dd($content);
                if ($this->modelUser->checkEmail($data['email']) == 0) {

                    $this->modelUser->insertData($data);
                    $sendmail = sendMail($_web['settings']['email'], $_web['settings']['slogan'], $data['email'], $data['username'], $metacontent, $content, $title, null, $_web['options']['email_mailler'], $_web['options']['email_pass']);

                    switch ($sendmail) {
                        case "error file":
                            $error[] = lang('sendmail_failpath');
                            break;
                        case "Mailer Error!":
                            $error[] = lang('sendmail_fail');
                            break;
                        case "Message sent!":
                            $success[] = lang('success_regis');
                            break;
                        default:
                            break;
                    }
                } else {
                    $error[] = lang('email_regis');
                }
            } else {
                $error[] = lang('no_capcha');
            }
        }
		//Kiểm tra login
        if (isset($_POST['login_ok'])) {
            if ($this->input->post('txtemail') == '') {
                $status = false;
                $error[] = lang('no_email');
            }
            if (!filter_var($this->input->post('txtemail'), FILTER_VALIDATE_EMAIL)) {
                $status = false;
                $error[] = lang('invalid_email');
            }
            if ($this->input->post('txtpassword') == '') {
                $status = false;
                $error[] = lang('no_pass');
            }
            if ($status == true) {
                $email = $this->input->post('txtemail');
                $pass = md5("nxthd1991@gmail.com|" . $this->input->post('txtpassword'));
                $data_user = $this->modelUser->checkLogin($email, $pass);
                if (!empty($data_user)) {
                    //session_destroy();
                    $data_new = array(
                        'userid' => $data_user['id'],
                        'username' => $data_user['username']
                    );
                    Session::create($data_new);

                    // echo "<pre>";
                    // print_r($_SESSION);
                    // echo "</pre>";
                    redirect(base_url());
                } else {
                    $status = false;
                    $error[] = lang('no_email_no_pass');
                }
            }
        }



		$token =  rand(0,1000000000);
		$this->view->data['_token'] =$token;
		$_SESSION['_token'] = $token;
		$this->view->error = $error;
		$this->view->success = $success;
		$this->view->render('index');
	}
	public function dangxuat() {
        $data = array('id','email','username','group_id','avatar','job','create_time','namepermission','permission_id','userid');
        Session::destroy($data);
        session_unset();
        redirect(base_url());
    }
	public function verify() {
        $status = true;
        $error = array();
        $success = array();
        if (isset($_GET['email']) && isset($_GET['code'])) {
            $email = $_GET['email'];
            $code = $_GET['code'];
            $countUser = $this->modelUser->checkVerify($email);
            if ($countUser > 0 && $countUser['status'] == 2) {
                $error[] = "Tài khoản đã bị dừng hoạt động! Vui lòng liên hệ để được hỗ trợ";
            } else if ($countUser > 0 && $countUser['status'] == 1) {
                $error[] = "Tài khoản này đã được kích hoạt và đang hoạt động!";
            } else if ($countUser <= 0) {
                $error[] = "Tài khoản bạn xác thực ko tồn tại";
            } else if ($countUser > 0 && $countUser['status'] == 0 && $countUser['verify_key'] != $code) {
                $error[] = "Mã Code bạn không đúng";
            } else if ($countUser > 0 && $countUser['status'] == 0 && $countUser['verify_key'] == $code) {
            	$keyverify = generateRandomString(32, '0123456789');
                $data = array(
                    'status' => "1",
					'verify_key' => $keyverify
                );
                $this->modelUser->update($data, $email, $code);
                $success[] = "Xác Thực Thành Công!";
            }
        }
        $this->view->error = $error;
        $this->view->success = $success;
        $this->view->render('index');
    }

    public function capcha() {
        createCaptcha();
    }
}