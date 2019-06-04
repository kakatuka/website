<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo ($this->_title != '') ? $this->_title : '<title>' . $_web['settings']['seo_title'] . '</title>' . "\n"; ?>
	<?php echo ($this->_description != '') ? $this->_description : '<meta name="description" content="' . $_web['settings']['seo_description'] . '">' . "\n"; ?>
	<?php echo ($this->_keywords != '') ? $this->_keywords : '<meta name="keywords" content="' . $_web['settings']['seo_keywords'] . '">' . "\n"; ?>
	<?php echo ($this->_author != '') ? $this->_author : '' . "\n"; ?>
	  <link rel="shortcut icon" href="<?php echo (isset($_web['settings']['icon']) && $_web['settings']['icon']) ? $_web['base_url_cdn'] . $_web['settings']['icon'] : ''; ?>" type="image/x-icon" />
    <script src="<?php echo base_url() . 'tmp/public/'?>js/jquery.js"></script>
    <link href="<?php echo base_url() . 'tmp/public/'?>css/css.css" rel="stylesheet" />
    <link href="<?php echo base_url() . 'tmp/public/'?>css/details.css" rel="stylesheet" />
    <!-- <script src="<?php echo base_url() . 'tmp/public/'?>ResizeSensor.js"></script>
    <script src="<?php echo base_url() . 'tmp/public/'?>sticky-sidebar.js"></script>    -->        

</head>

<body class="changeHeader">
  <div id="wrap">
      <?php 
        require_once "header.php";
       ?>
    <!-- main-->
        <?php require_once DIR_MODULES . $_web['uri']['mod'] . "/view/" . $this->_fileView . ".php";?>
    <!-- main -->
        <?php require_once "footer.php";?>
      <!-- end -->
  </div>
   <script type="text/javascript" src="http://static.subiz.com/public/js/loader.js"></script>
  <?php echo ($this->_appendPluginsModJs != '') ? $this->_appendPluginsModJs : ''; ?>
  <?php echo ($this->_appendJs != '') ? $this->_appendJs : ''; ?>
    <script>
        $(window).load(function() {
            $("#stickymenu").sticky({ topSpacing: 0 });
        });
        $(function() {
            $("img.lazy").lazyload();
        });
        $('.fix_20').find('.dropdown-menu').addClass('quocgia');
        $('.fix_21').find('.dropdown-menu').addClass('quocgia');
        $('.fix_22').find('.dropdown-menu').addClass('quocgia');
        $('.fix_23').find('.dropdown-menu').addClass('quocgia');
        $('.fix_24').find('.dropdown-menu').addClass('quocgia');
        $('.fix_31').find('.dropdown-menu').addClass('quocgia');
    </script>
     <!-- Subiz -->
    <script type='text/javascript'>
    window._sbzq || function(e) { e._sbzq = []; var t = e._sbzq;
        t.push(["_setAccount", 25865]); var n = e.location.protocol == "https:" ? "https:" : "http:"; var r = document.createElement("script");
        r.type = "text/javascript";
        r.async = true;
        r.src = n + "//static.subiz.com/public/js/loader.js"; var i = document.getElementsByTagName("script")[0];
        i.parentNode.insertBefore(r, i) }(window);
    </script>

    
    <script>
    $(document).ready(function() {
        var w = $(document).width();
        var imgpaddleft = (w - 800) / 2;
        $("#delayedPopup").css('left', imgpaddleft + 'px');
        $("#delayedPopup").css('top', '120px');
        //Fade in delay for the background overlay (control timing here)
        $("#bkgOverlay").delay(3500).fadeIn(400);
        //Fade in delay for the popup (control timing here)
        $("#delayedPopup").delay(4000).fadeIn(400);
        //Hide dialouge and background when the user clicks the close button
        $("#btnClose").click(function(e) {
            HideDialog();
            e.preventDefault();
        });
        $("#bkgOverlay").click(function(e) {
            HideDialog();
            e.preventDefault();
        });
    });
    //Controls how the modal popup is closed with the close button
    function HideDialog() {
        $("#bkgOverlay").fadeOut(400);
        $("#delayedPopup").fadeOut(300);
    }
    </script>
</body>
</html>

