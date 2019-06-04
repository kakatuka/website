<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminPANEL | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>/css/animation.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <script src="<?php echo base_url()."tmp/public/";?>plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
  <script src="<?php echo base_url()."tmp/public/";?>plugins/ckfinder/ckfinder.js" type="text/javascript"></script>

  <!-- Theme style -->

  <link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>/css/cmsthienvietjsc.css">
  <link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>plugins/datepicker/css/datepicker3.css">
  <link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>plugins/tagsinput/jquery.tagsinput.css">
  <link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>plugins/toastr/toastr.min.css">
  <?php echo ($this->appendCss!='') ? $this->appendCss : '';?>

  <?php echo ($this->_appendCss!='') ? $this->_appendCss : '';?>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script type="text/javascript">
    var baseUrl =  '<?php echo base_url();?>';
  </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
  <?php require_once "header.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->
  
	<?php require_once "sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  	<?php
	require_once DIR_MODULES . $_web['uri']['mod'] . "/view/" . $this->_fileView . ".php";
	 ?>
  <!-- /.content-wrapper -->
	

	<?php require_once "footer.php"; ?>




</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>plugins/jQueryUI/jquery-ui.min.js"></script>
<!--jQuery TAGS INPUT-->
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>plugins/tagsinput/jquery.tagsinput.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>plugins/input-mask/jquery.inputmask.js"></script>
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>js/cmscustom.js"></script>
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url()."tmp/public/";?>plugins/datepicker/locales/bootstrap-datepicker.vi.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>js/dashboard.js"></script> -->
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>js/demo.js"></script>
<?php echo ($this->appendJs!='') ? $this->appendJs : '';?>

<?php echo ($this->_appendJs!='') ? $this->_appendJs : '';?>

</body>
</html>