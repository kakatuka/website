<style type="text/css" media="screen">
	ul.list-categories {
    height: 500px;
    overflow: scroll;
    overflow-x: hidden;
    }
</style>
<form action="<?php echo base_url().'product/product/save'?>" method="post" id="form-uploads-ajax">
	<!-- col_right -->
	<div class="col_right">
		<!-- banner_top -->
		<div class="banner_top">
			<div class="page-heading page-heading-md dashboard-header">
				<h2 class="header__main">
					<span class="breadcrumb hidden-xs">
						<i class="fa fa-credit-card"></i>
						<a href="<?php echo base_url().'product/product/index';?>">Tour</a> /
					</span>
					<span class="title">Thêm mới tour</span>
				</h2>
				<div class="header-right">
 				<!-- <div class="form-actions">
 				<div class="btn-set"> -->
 					<button class="btn btn-default" type="submit" name="submit" value="apply">Lưu & thêm mới</button>
 					<button class="btn btn-default" type="submit" name="submit" value="save" style="background: #FF9632;color: white"><i class="fa fa-save"></i> Lưu</button>
 					<!-- </div>
 				</div> -->
 			</div>
 		</div>
 	</div>
 	<!-- end banner_top -->
 	<!-- main -->
 	
 	<input type="hidden" name="id_product" value="<?php if(isset($this->data['data']['id'])) echo $this->data['data']['id'];?>" id="id_product">
 	<div class="content_col_right">
 		<div class="container-fluid-md" style="margin-bottom:20px;margin-top: 50px;">
 			<?php 
 			if (isset($this->data['flash_success'])) {
 				echo '<div class="alert alert-success">
 				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 				<strong>'.lang('success').'</strong> '.$this->data['flash_success'].'
 			</div>';
 		}
 		?>
 		<div class="row">
 			<div class="col-md-12">
 				<div class="panel panel-default panel-light">
 					<div class="panel-body">
 						<?php include DIR_MODULES . 'product/view/product_form_title.php'; ?>
 						<?php include DIR_MODULES . 'product/view/product_form_price.php'; ?>
 						<!-- <?php include DIR_MODULES . 'product/view/product_rent_time.php'; ?> -->
 						<?php include DIR_MODULES . 'product/view/product_form_description.php'; ?>
 						<?php include DIR_MODULES . 'product/view/product_form_content.php'; ?>
 						<?php include DIR_MODULES . 'product/view/product_from_tienich.php'; ?> 
 						<?php include DIR_MODULES . 'product/view/product_form_category.php'; ?>
 					</div>
 				</div>
 			</div>
 		</div>
 		<!-- row menu -->
 		<div class="row">
 			<div class="col-xs-12">
 				
 			</div>
 		</div>
		<div class="row">
			<div class="col-xs-12">
				<?php include DIR_MODULES . 'product/view/product_form_info_other.php'; ?>
			</div>
		</div>
 		<div class="row">
 			<?php include DIR_MODULES . 'product/view/product_form_images.php'; ?>
 		</div>

 		<!-- row manage option -->
 		<div class="row">
 			<!-- <div class="col-md-4 col-lg-3">
 				<h4>Quản lý kho và tùy chọn</h4>
 				<p class="text-muted">Bạn có thể cấu hình nhiều phiên bản và quản lý kho cho từng loại của sản phẩm này</p>
 			</div> -->
 			<div class="col-md-8 col-lg-9 variant-panel">
 				<!-- <div class="panel panel-default panel-light"> -->
 					<div style="padding-bottom:0" class="panel-body form-bordered variants">
 						<div>

 							<?php include DIR_MODULES . 'product/view/product_form_code.php'; ?>

 						</div>
 					</div>
 				<!-- </div> -->
 			</div>
 		</div>
 		<!-- end row menu -->

 		<!-- row add_tag -->
 		<div class="row">

 			<?php include DIR_MODULES . 'product/view/product_form_meta.php'; ?>

 		</div>
 		<!-- end row add_tag -->
 	</div>
 </div> 
</div>
</form>
