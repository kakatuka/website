<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	 <!-- Bootstrap 3.3.6 -->
  <!-- <link rel="stylesheet" href="<?php echo base_url();?>/tmp/public/css/bootstrap.min.css"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
 <!--  <link rel="stylesheet" href="<?php echo base_url()."tmp/public/login";?>/css/style.css"> -->
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="<?php echo base_url();?>/tmp/public/plugins/iCheck/square/blue.css"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!-- [if lt IE 9]> -->
  <!-- <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script> -->
  <!-- <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> -->
  <style type="text/css" media="screen">
        *, *:before, *:after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
html, body {
  font-size: 62.5%;
  height: 100%;
  overflow: hidden;
}
@media (max-width: 768px) {
  html, body {
    font-size: 50%;
  }
}
svg {
  display: inline-block;
  width: 2rem;
  height: 2rem;
  overflow: visible;
}
.svg-icon {
  cursor: pointer;
}
.svg-icon path {
  stroke: rgba(255, 255, 255, 0.9);
  fill: none;
  stroke-width: 1;
}
input, button {
  outline: none;
  border: none;
}
.cont {
  position: relative;
  height: 100%;
  background-size: cover;
  overflow: auto;
  font-family: 'Open Sans', Helvetica, Arial, sans-serif;
}
.demo {
    position: absolute;
    top: 50%;
    left: 50%;
    /* margin-left: 50%; */
    /* margin-top: -26.5rem; */
    width: 42rem;
    height: 35rem;
    overflow: hidden;
    transform: translate(-50%,-50%);
}
.login {
  position: relative;
  height: 100%;
      background: linear-gradient(to bottom, rgba(213, 212, 220, 0.8) 0%, rgba(0, 0, 0, 0.6) 100%);
  transition: opacity 0.1s, transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25);
  transform: scale(1);
}
.login.inactive {
  opacity: 0;
  transform: scale(1.1);
}
.login__check {
    position: absolute;
    top: 3rem;
    left: 12.5rem;
    transform-origin: 0 100%;
}

.login__form {
    position: absolute;
    top: 25%;
    left: 0;
    width: 100%;
    height: 50%;
    text-align: center;
    padding: 1.5rem 2.5rem;
}
.login__row {
  height: 5rem;
  text-align: left;
  padding-top: 1rem;
  border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}
.login__icon {
  margin-bottom: -0.4rem;
  margin-right: 0.5rem;
}
.login__icon.name path {
  stroke-dasharray: 73.50196;
  stroke-dashoffset: 73.50196;
  animation: animatePath 2s 0.5s forwards;
}
.login__icon.pass path {
  stroke-dasharray: 92.10663;
  stroke-dashoffset: 92.10663;
  animation: animatePath 2s 0.5s forwards;
}
.login__input {
  display: inline-block;
  width: 92%;
  height: 100%;
  padding-left: 1.5rem;
  font-size: 1.5rem;
  background: transparent;
  color: #fdfcfd;
}
.login__submit {
  position: relative;
  width: 100%;
  height: 4rem;
  margin: 5rem 0 2.2rem;
  color: rgba(255, 255, 255, 0.8);
  background: #f36;
  font-size: 1.5rem;
  border-radius: 3rem;
  cursor: pointer;
  overflow: hidden;
  transition: width 0.3s 0.15s, font-size 0.1s 0.15s;
}
.login__submit:after {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  margin-left: -1.5rem;
  margin-top: -1.5rem;
  width: 3rem;
  height: 3rem;
  border: 2px dotted #fff;
  border-radius: 50%;
  border-left: none;
  border-bottom: none;
  transition: opacity 0.1s 0.4s;
  opacity: 0;
}
.login__submit.processing {
  width: 4rem;
  font-size: 0;
}
.login__submit.processing:after {
  opacity: 1;
  animation: rotate 0.5s 0.4s infinite linear;
}
.login__submit.success {
  transition: transform 0.3s 0.1s ease-out, opacity 0.1s 0.3s, background-color 0.1s 0.3s;
  transform: scale(30);
  opacity: 0.9;
}
.login__submit.success:after {
  transition: opacity 0.1s 0s;
  opacity: 0;
  animation: none;
}
.login__signup {
  font-size: 1.2rem;
  color: #aba8ae;
}
.login__signup a {
  color: #fff;
  cursor: pointer;
}
.app {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  display: none;
  transition: opacity 0.1s, transform 0.3s cubic-bezier(0.68, -0.45, 0.465, 1.25);
  transform: scale(1.2);
}
.app.active {
  opacity: 1;
  transform: scale(1);
}
.app.active .app__user-photo {
  transform: scale(1);
}
.app.active .app__meeting {
  transform: translateY(0);
  opacity: 1;
}
.app.active .app__logout {
  transform: scale(1);
}
.app__top {
  position: relative;
  height: 28rem;
  background: rgba(0, 0, 0, 0.5);
  padding: 6rem 1.5rem 2rem;
  text-align: center;
}
.app__bot {
  position: relative;
  height: 25rem;
  background: #fff;
}
.app__menu-btn {
  position: absolute;
  top: 2rem;
  left: 1.5rem;
  width: 1.8rem;
  height: 1.7rem;
  cursor: pointer;
}
.app__menu-btn span, .app__menu-btn:before, .app__menu-btn:after {
  position: absolute;
  left: 0;
  width: 100%;
  height: 1px;
  background: rgba(255, 255, 255, 0.6);
}
.app__menu-btn span {
  top: 0.8rem;
}
.app__menu-btn:before {
  content: "";
  top: 0;
}
.app__menu-btn:after {
  content: "";
  bottom: 0;
}
.app__icon {
  position: absolute;
  top: 2rem;
}
.app__icon.search {
  right: 1.5rem;
  stroke-dasharray: 61.84714;
  stroke-dashoffset: 61.84714;
  animation: animatePath 0.5s 0.5s forwards;
}
.app__hello {
  font-size: 2.2rem;
  color: #fff;
  font-weight: normal;
  margin-bottom: 3rem;
}
.app__user {
  position: relative;
  display: inline-block;
  width: 9rem;
  height: 9rem;
  margin-bottom: 3rem;
}
.app__user-photo {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  transition: transform 0.3s 0.2s cubic-bezier(0.62, 0.35, 0.56, 1.55);
  transform: scale(0);
}
.app__user-notif {
  position: absolute;
  top: 0;
  right: 0;
  width: 3rem;
  height: 3rem;
  border-radius: 50%;
  line-height: 3rem;
  text-align: center;
  background: #50d2c2;
  color: #fff;
  font-size: 1.5rem;
}
.app__month:after {
  content: "";
  display: table;
  clear: both;
}
.app__month-name {
  display: inline-block;
  color: rgba(255, 255, 255, 0.6);
  font-size: 1.2rem;
  text-transform: uppercase;
}
.app__month-btn {
  display: inline-block;
  width: 1.2rem;
  height: 1.2rem;
  border: 1px solid rgba(255, 255, 255, 0.6);
  border-left: none;
  border-bottom: none;
  cursor: pointer;
}
.app__month-btn.left {
  float: left;
  transform: rotate(-135deg);
}
.app__month-btn.right {
  float: right;
  transform: rotate(45deg);
}
.app__days {
  height: 7rem;
  padding: 1.5rem 2rem;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}
.app__day {
  width: 14%;
  text-align: center;
  font-size: 1.2rem;
}
.app__day.weekday {
  color: #919197;
  text-transform: uppercase;
}
.app__day.date {
  font-size: 1.2rem;
  font-weight: bold;
  color: #3c3c43;
}
.app__meeting {
  position: relative;
  height: 6rem;
  border-top: 1px solid #eeeeef;
  padding: 1rem 2rem 1rem 7.5rem;
  transition: transform 0.3s, opacity 0.3s;
  transform: translateY(-50%);
  opacity: 0;
}
.app__meeting:nth-child(1) {
  transition-delay: 0.2s;
}
.app__meeting:nth-child(2) {
  transition-delay: 0.3s;
}
.app__meeting:nth-child(3) {
  transition-delay: 0.4s;
}
.app__meeting:nth-child(4) {
  transition-delay: 0.5s;
}
.app__meeting:nth-child(5) {
  transition-delay: 0.6s;
}
.app__meeting-photo {
  position: absolute;
  left: 2rem;
  top: 1rem;
  width: 4rem;
  height: 4rem;
}
.app__meeting-name {
  color: #000;
  font-size: 1.3rem;
}
.app__meeting-info {
  color: #949498;
  font-size: 1.1rem;
}
.app__logout {
  position: absolute;
  bottom: 3.3rem;
  right: 3.3rem;
  width: 4.6rem;
  height: 4.6rem;
  margin-right: -2.3rem;
  margin-bottom: -2.3rem;
  background: #fc3768;
  color: #fff;
  font-size: 2rem;
  border-radius: 50%;
  cursor: pointer;
  transition: bottom 0.4s 0.1s, right 0.4s 0.1s, transform 0.4s 0.4s, opacity 0.1s 0.7s, background-color 0.1s 0.7s;
  transform: scale(0);
}
.app__logout.clicked {
  bottom: 50%;
  right: 50%;
  transform: scale(30) !important;
  opacity: 0.9;
}
.app__logout.clicked svg {
  opacity: 0;
}
.app__logout-icon {
  position: absolute;
  width: 3rem;
  height: 3rem;
  top: 50%;
  left: 50%;
  margin-left: -1.5rem;
  margin-top: -1.5rem;
  transition: opacity 0.1s;
}
.app__logout-icon path {
  stroke-width: 4px;
  stroke-dasharray: 64.36235;
  stroke-dashoffset: 64.36235;
  animation: animatePath 0.5s 0.5s forwards;
}
.ripple {
  position: absolute;
  width: 15rem;
  height: 15rem;
  margin-left: -7.5rem;
  margin-top: -7.5rem;
  background: rgba(0, 0, 0, 0.4);
  transform: scale(0);
  animation: animRipple 0.4s;
  border-radius: 50%;
}
@keyframes animRipple {
  to {
    transform: scale(3.5);
    opacity: 0;
  }
}
@keyframes rotate {
  to {
    transform: rotate(360deg);
  }
}
@keyframes animatePath {
  to {
    stroke-dashoffset: 0;
  }
}
input::placeholder {
    color: #e5e1e5;
}
.info_admin{
      position: absolute;
    bottom: 0;
    text-align: center;
    /* left: 50%; */
    left: 50%;
    transform: translate(-50%,-50%);
    color: white;
}
.info_admin h1{
  margin-bottom: 10px;
}
.view-pass{
  font-size: 15pt !important;position: absolute;right: 8%;top: 50%;color: #ccc;
  cursor: pointer;

}
.view-pass:hover{
  color: white;
}
  </style>
<!-- [endif] -->
</head>
<?php 
	$rand = rand(1, 4);
 ?>
<body>
	<div class="cont" style="background-image: url(<?php echo base_url();?>tmp/public/images/breadcrumb_bg<?php echo $rand;?>.jpg);">
		<form method="POST" action="" accept-charset="UTF-8"><input name="_token" type="hidden" value="">
        <div class="demo">
            <div class="login">
                <div class="login__check" style="margin-left: 30px;">
                    <img src="<?php echo $_SESSION['base_url_cloud'].'timthumb.php?src='.$_SESSION['base_url_cloud'].'cdn/'.$this->data['settings']['icon'].'&amp;h=60&amp;w=80&amp;zc=1';?> " alt="<?php echo $this->data['settings']['seo_title']; ?>" style="width: 100px">
                </div>
                <div class="login__form">
                    <div class="login__row">
                        <!-- <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                        </svg> -->
                        <input class="login__input name" placeholder="Username" placeholder="Email" name="email" type="text" required=""/>
                        <!-- <input class="form-control form-control-solid placeholder-no-fix" > -->
                    </div>
                    <div class="login__row">
                        <!-- <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                        </svg> -->
                        <input class="login__input pass form-control" placeholder="Password" id="Passwod" name="password" type="password" value="" required=""/>
                        <!-- <input class="form-control form-control-solid placeholder-no-fix" placeholder="Mật khẩu" name="password" type="password" value=""> -->
                        <i class="view-pass fa fa-eye" style="  display: none;"></i>
                    </div>
                    <button type="submit" name="login" class="login__submit">Sign in</button>
                    <!-- <button type="submit" name="login" class="btn btn-warning pull-right">Đăng nhập</button> -->
                    <p class="login__signup">Don't have an account? &nbsp;<a>Sign up</a></p>
                </div>
            </div>
        </div>
		</form>
        <div class="info_admin">
            <!-- <h1>Bộ phận CSKH: </h1> -->
            <h1>Hỗ trợ khách hàng các ngày trong tuần từ thứ 2 đến Chủ nhật (từ 8h00 – 22h00 hàng ngày)</h1>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        var animating = false,
            submitPhase1 = 1100,
            submitPhase2 = 400,
            logoutPhase1 = 800,
            $login = $(".login"),
            $app = $(".app");

        function ripple(elem, e) {
            $(".ripple").remove();
            var elTop = elem.offset().top,
                elLeft = elem.offset().left,
                x = e.pageX - elLeft,
                y = e.pageY - elTop;
            var $ripple = $("<div class='ripple'></div>");
            $ripple.css({ top: y, left: x });
            elem.append($ripple);
        };

     
    });
    $(document).ready(function() {
        $('.form-control').keyup(function() {
            if ($('#Passwod').val().length > 0) {
                $('.view-pass').show();
            } else {
                $('.view-pass').hide();
            }
        });
        $('.view-pass').mousedown(function() {
            $('#Passwod').attr('type', 'text');
        });
        $('.view-pass').mouseup(function() {
            $('#Passwod').attr('type', 'password');
        });


    });
    </script>
</body>
</html>