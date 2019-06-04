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
  <link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>/css/cmserrors.css">
  
  <link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>plugins/timepicker/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>plugins/toastr/toastr.min.css">

  <?php echo ($this->_appendCss!='') ? $this->_appendCss : '';?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
  <?php require_once DIR_THEME."header.php"; ?>

  <!-- Content Wrapper. Contains page content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h1>
                        Oops!</h1>
                    <h2>
                        404 Not Found</h2>
                    <div class="error-details">
                        Sorry, an error has occured, Requested page not found!
                    </div>
                    <div class="error-actions">
                        <a href="<?php echo base_url();?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                            Take Me Home </a><a href="" class="btn btn-default btn-lg"><i class="fa fa-skype fa-4" aria-hidden="true"></i> Contact Support </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- /.content-wrapper -->
    

    <footer class="child-footer">
       <div class="container">
           <div class="row">
                <div class="pull-right hidden-xs">
                  <b>Version</b> 1.0
                </div>
                <strong>Copyright &copy; 2016 <a href="https://3s.com.vn" target="_blank">ThienVietJSC</a>.</strong> All rights
                reserved.
           </div>
       </div>
      </footer>





</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>plugins/jQueryUI/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>js/cmscustom.js"></script>
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>plugins/timepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>js/dashboard.js"></script> -->
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>js/demo.js"></script>

<?php echo ($this->_appendJs!='') ? $this->_appendJs : '';?>

</body>
</html>

