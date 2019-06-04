<div class="portlet light bordered" id="block-image">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-sliders" aria-hidden="true"></i> &nbsp;
			<span class="caption-subject font-red-sunglo bold uppercase">Nhà cung cấp</span>
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse" data-status="true"></a>
			<a href="javascript:;" class="remove"></a>
		</div>
	</div>
	<div class="portlet-body form">
		<div class="note note-info">
			<p>Tính năng phục vụ cho việc phân loại sản phẩm theo thương hiệu trên website của bạn. Thêm mới thương hiệu <a href="javascript:void(0)" data-toggle="modal" data-target="#myModalBrand" style="font-weight: bolder;">tại đây</a></p>
		</div>
		<div class="form-group">
			<fieldset>
				<legend>Chọn thương hiệu</legend>
			</fieldset>
			<div class="col-md-12">
				<div class=" height-auto">
					<div class="scrollbar">

						<ul class="list-unstyled" id="list_brand">
							<?php 
							if (!empty($this->data['data_brand'])) {
								foreach ($this->data['data_brand'] as $key => $value) {
								// dd($value); ?>
								<li class="brand_<?php echo $value['id'];?>">
									<label><span class="<?php if (strpos($this->data['data']['brand'], '|'.$value['id'].'|') !== false) echo 'after_opacity'; ?>"><input class="checkboxes" type="radio" name="brand[]" value="<?php echo $value['id'];?>" <?php if (strpos($this->data['data']['brand'], '|'.$value['id'].'|') !== false) echo 'checked';?>/></span>&nbsp;&nbsp;&nbsp;<?php echo $value['name'];?></label>
								</li>
								<?php 
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</div>
<div>
	<!-- Modal Choose Images List -->
	<div class="modal fade" id="myModalBrand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="label-model-folder-img">
						<?php echo lang('add_brand'); ?>
					</h4>
				</div>
				<div class="modal-body">
					<div class="element-brand">
						<div class="col-md-10">
							<input type="text" class="form-control maxlength-handler" id="brand_title" placeholder="Nhập tên thương hiệu.." value="">
						</div>
						<div class="col-md-2" style="padding:0px">
							<a href="javascript:void(0)" class="btn green add_brand" style="border-radius:3px !important"><i class="fa fa-plus"></i></a>
						</div>
						<div class="clearfix" style="margin:8px 0px;"></div>
						<div class="col-md-12">
							<ul class="list-unstyled" id="element-list-brand">
								<?php 
								if (!empty($this->data['data_brand'])) {
									// dd($this->data['data_brand']);
									foreach ($this->data['data_brand'] as $key => $value) {?>
									<li>
										<?php echo $value['name'];?>

										<span class="input-group-btn del_brand" data-id="<?php echo $value['id'];?>">
											<button class="btn default date-reset" type="button"><i class="fa fa-times"></i></button>
										</span>
										
										<span class="">
											<div class="file-upload-wrapper">
											<a href="javascript:void(0)" class="getIdBrand file-upload-native" data-toggle="modal" data-target="#myModalBrandImg"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a>
											</div>
										</span>
										
										<span class="avatar_brand preview img-wrapper" data-id="<?php echo $value['id'];?>">
											<?php 
											if ($value['avatar']!=null) { ?>
											<img src="<?php echo base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url_cloud().'cdn/'.$value['avatar'].'&amp;h=25&amp;w=25&amp;zc=2';?>" alt="">
											<?php 
										}
										?>
									</span>

								</li>
								<?php
							}
						}
						?>
					</ul>
				</div>
				<div class="clearfix" style="margin:8px 0px;"></div>
			</div>


		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close');?></button>
		</div>
	</div>
</div>
</div><!--END MODAL Choose Images List-->
<style>
	@media (min-width: 768px){
		.modal-image-choose-brand .modal-dialog {
			width: 670px;
			margin: 30px auto;
		}
	}
	.modal-image-choose-brand .modal-body {
		height: 450px;
		overflow-y: scroll;
	}
</style>
<div class="modal-image-choose-brand">
	<!-- Modal Choose Images List -->
	<div class="modal fade" id="myModalBrandImg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="label-model-folder-img">
						<?php echo lang('choose_logo'); ?>
					</h4>
				</div>

				<div id="loadMediaModel" class="modal-body" data-mess-one="<?php echo lang('warning_choose_img');?>" data-mess-two="<?php echo lang('warning_choose_img_one');?>" data-title="list-images-product">
					<!-- <?php
					$dir          = DIR_TMP.'cdn/';
					$html = listAllFolderChooseImage($dir);
					echo $html;

					?> -->
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close');?></button>
					<button type="button" class="btn btn-primary choose_img_list_brand"><?php echo lang('choose');?></button>
				</div>
			</div>
		</div>
	</div><!--END MODAL Choose Images List-->
</div>



</div>
<style type="text/css">
	.height-auto .scrollbar ul li{
		display: inline;
		padding: 10px;
	}
	.height-auto .scrollbar ul li label span{
		vertical-align: sub;
	}
</style>