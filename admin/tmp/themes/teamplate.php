<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminPANEL | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <!-- <link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>css/bootstrap.min.css"> -->
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- <link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>css/animation.css"> -->
  <!-- bootstrap wysihtml5 - text editor -->
  <script src="<?php echo base_url()."tmp/public/";?>plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
  <script src="<?php echo base_url()."tmp/public/";?>plugins/ckfinder/ckfinder.js" type="text/javascript"></script>

  <!-- Datatables -->
  <link href="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>/css/cmsthienvietjsc.css">
  <link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>plugins/datepicker/css/datepicker3.css"> -->
  
  <link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."tmp/public/";?>plugins/tagsinput/jquery.tagsinput.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url()."tmp/public/";?>css_truong/style.css?v=<?php echo date(time()); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()."tmp/public/";?>css_truong/non-responsive.css?v=<?php echo date(time()); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()."tmp/public/";?>css_truong/style1.css?v=<?php echo date(time()); ?>">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()."tmp/public/";?>css_truong/font-awesome.min.css?v=<?php echo date(time()); ?>"> -->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url()."tmp/public/";?>css_truong/bootstrap.min.css?v=<?php echo date(time()); ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url()."tmp/public/";?>css/jquery-ui.css?v=<?php echo date(time()); ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url()."tmp/public/";?>css/cmscuongle.css?v=<?php echo date(time()); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script> 
  <script src="<?php echo base_url()."tmp/public/plugins";?>/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({

        editor_selector : "mceEditor",

        selector: '#mytextarea',
        height:600,

        relative_urls:false,

        remove_script_host:false,

         plugins: [
                "legacyoutput",
                "codesample",
                'advlist autolink autosave lists link image charmap print preview hr anchor pagebreak',

                'searchreplace wordcount visualblocks visualchars code fullscreen',

                'insertdatetime media nonbreaking save table contextmenu directionality',

                    'emoticons template paste textcolor colorpicker textpattern imagetools responsivefilemanager'

                  ],

                  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | responsivefilemanager',

                  toolbar2: 'print preview media | forecolor backcolor emoticons | fontselect | fontsizeselect | restoredraft | codesample',

                  image_advtab: true,

                templates: [

                    { title: 'Test template 1', content: 'Test 1' },

                    { title: 'Test template 2', content: 'Test 2' }

                  ],

                external_filemanager_path:"<?php echo base_url()."tmp/public/plugins";?>/filemanager/",

                filemanager_title:"Responsive Filemanager" ,

                external_plugins: { "filemanager" :"<?php echo base_url()."tmp/public/plugins";?>/filemanager/plugin.min.js"}
      });
    </script>


  <?php echo ($this->appendCss!='') ? $this->appendCss : '';?>

  <?php echo ($this->_appendCss!='') ? $this->_appendCss : '';?>

  <script type="text/javascript">
    var baseUrl       =  '<?php echo base_url();?>';
    var baseUrlcloud  =  '<?php echo $_SESSION['base_url_cloud'];?>';
    var security_key  =  '<?php echo $_web['security_key'];?>';
  </script>
</head>

<body  vlink="red">
  <div class="container-fluid">
    <div class="row">
      <div class="page-wrapper">
        <div class="page-wrapper-sub">


          <?php require_once "header.php"; ?>
          <!-- Left side column. contains the logo and sidebar -->
          
          <?php require_once "sidebar.php"; ?>
          
          <!-- Content Wrapper. Contains page content -->
          <?php
          require_once DIR_MODULES . $_web['uri']['mod'] . "/view/" . $this->_fileView . ".php";
          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
  

  <?php require_once "footer.php"; ?>





  <!-- ./wrapper -->

  <!-- jQuery 2.2.3 -->
  
  <!-- <script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>plugins/jQuery/jquery-2.2.3.min.js"></script> -->
  <!-- jQuery UI 1.11.4 -->
  <!-- <script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>plugins/jQueryUI/jquery-ui.min.js"></script>

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

  <!-- Datatables -->
  <script src="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="<?php echo base_url()."tmp/public/";?>plugins/data_table/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="<?php echo base_url()."tmp/public/";?>plugins/data_table/jszip/dist/jszip.min.js"></script>
  <script src="<?php echo base_url()."tmp/public/";?>plugins/data_table/pdfmake/build/pdfmake.min.js"></script>
  <script src="<?php echo base_url()."tmp/public/";?>plugins/data_table/pdfmake/build/vfs_fonts.js"></script>

  <script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>js/cmscustomdatatable.js"></script>

  <script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>js/jquery-ui.js?v=<?php echo date(time()); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url()."tmp/public/";?>js/khuong.js?v=<?php echo date(time()); ?>"></script>


  <!-- <script type="text/javascript" src="js_truong/jquery.min.js?v=<?php echo date(time()); ?>"></script> -->
  <!-- <script type="text/javascript" src="js_truong/bootstrap.min.js?v=<?php echo date(time()); ?>"></script> -->
  <script type="text/javascript" src="<?php echo base_url()."tmp/public/"; ?>js_truong/app.js?v=<?php echo date(time()); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url()."tmp/public/"; ?>js_truong/jquery_media.js?v=<?php echo date(time()); ?>"></script>
 <!--  <script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js'></script> -->
  <?php echo ($this->appendJs!='') ? $this->appendJs : '';?>

  <?php echo ($this->_appendJs!='') ? $this->_appendJs : '';?>

<script>
$(document).ready(function() {
        $('#dataTables-example').DataTable({
          "responsive": true,
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
    });
  </script>
<script>
     $(document).ready(function() {

        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
         $("input:checkbox").change(function() {
            $("table>thead>tr>th:first-child").removeClass("sorting_asc");
         $("table>thead>tr>th:first-child").removeClass("sorting_desc");
            var a = $("input:checked").length;
            if($("#checkAll").is(":checked")){
                $(".display-bulk-action-items-count").text(a-1);
            }
            else{
                 $(".display-bulk-action-items-count").text(a);
            }
           
            if( $("input:checkbox").is(":checked")){
               $(".bulk-actions").css("display","block");

            }
            else{
                $(".bulk-actions").css("display","none");
            }
        });
$("table>thead>tr>th:first-child").removeClass("sorting_asc");
$("#chonthaotac").click(function(event){
  $(".dropdown_menu996").toggle();


});
$("#chonthaotac_order").click(function(){
  $(".dropdown_menu669").toggle();
});
        });
</script>
<script>
  function renderImage (url, scale = 0.3) {
    let img = new Image()

    img.onload = () => {
      const style = `
      display: block !important;
      margin: 10px 0;
      font-size: ${img.height * scale}px;
      padding: ${Math.floor(img.height * scale/2)}px ${Math.floor(img.width * scale/2)}px;
      background: url(${url});
      background-size: ${img.width * scale}px ${img.height * scale}px;
      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
      `
      console.log('%c', style)
    }

    img.src = url
  }

  console.image = renderImage
</script>

  
</body>
</html>
