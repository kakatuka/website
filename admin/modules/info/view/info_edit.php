<form action="<?php echo base_url() . 'info/info/save' ?>" method="post" id="form-uploads-ajax">
<div class="content-wrapper">
	<div class="page-heading page-heading-md">
                        <h2 class="header__main">
					<span class="breadcrumb hidden-xs">
						<i class="fa fa-credit-card"></i>
						<a href="<?php echo base_url() . 'info/info/index'; ?>">Danh sách Giới Thiệu</a> /
					</span>
					<span class="title">Thêm mới - chỉnh sửa giới thiệu</span>
				</h2>
                        <div class="header-right">
                        	<button type="submit" name="submit" value="save" class="btn btn-default"><i class="fa fa-save"></i> <?php echo lang('save_one'); ?></button>
									<button type="submit" name="submit" value="apply" class="btn background_orange"><i class="fa fa-check-circle"></i> <?php echo lang('save_one'); ?> &amp; <?php echo lang('add_one'); ?></button>
                     </div>
                    </div>
	<!-- Main content -->
	    <div class="col_right">
     <div class="content_col_right">
    <div class="container-fluid-md" style="margin-bottom:20px;margin-top: 50px;">
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">

				<input type="hidden" name="id_posts" value="<?php if (isset($this->data['data']['id'])) {
					echo $this->data['data']['id'];
				}
				?>">
				<div class="col-md-4 col-lg-3 margin-md-bottom">
            <h4>Thông tin website</h4>
            <p class="text-muted">Thông tin được sử dụng để Thiên Việt và khác hàng liên hệ đến bạn.</p>
          </div>
				<div class="col-md-9">
					<div class="tabbable-custom ">
						<?php
						if (isset($this->data['flash_success'])) {
							echo '<div class="alert alert-success">
							              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							              <strong>' . lang('success') . '</strong> ' . $this->data['flash_success'] . '
							            </div>';
						}
						?>
						<ul class="nav nav-tabs ">
							<li class="active">
								<a href="#tab_detail" data-toggle="tab" aria-expanded="true"><?php echo lang('detail'); ?></a>
							</li>
							<li class="">
								<a href="#tab_note" data-toggle="tab" aria-expanded="false"><?php echo lang('record_note'); ?></a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_detail">
								<div class="form-body">
									<!-- <div class="form-group ">
										<label for="name" class="control-label required">Tiêu đề giói thiệu</label>
										<input class="form-control" id="title" placeholder="Tiêu đề giới thiệu " value="<?php if (isset($this->data['data']['name'])) {
											echo stripslashes($this->data['data']['name']);
										}
										?>" name="name" type="text">
									</div> -->
									<div class="form-group ">
										<label for="name" class="control-label required">Tiêu đề</label>
										<input class="form-control" id="title" placeholder="Tiêu đề con" value="<?php if (isset($this->data['data']['title'])) {
											echo stripslashes($this->data['data']['title']);
										}
										?>" name="title" type="text">
									</div>
									<div class="form-group ">
										<label for="description" class="control-label required">Nội dung</label>
										<textarea class="form-control" rows="4" id="description" placeholder="Nội dung" data-counter="300" name="description" cols="50"><?php if (isset($this->data['data']['content'])) {
											echo stripslashes($this->data['data']['content']);
										}
										?></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


		</div>
		<div class="row">
			<div class="col-md-4 col-lg-3 margin-md-bottom">
          </div>
			<div class="col-md-9">
				<div class="box box-solid bg-teal-gradient bg-header-left box-left">
						<div class="box-header">
							<i class="fa fa-file-image-o" aria-hidden="true"></i>
							<h3 class="box-title" style="display: inline-block;font-size: 22px;margin:0;">Ảnh đại diện</h3>
						</div>
						<!-- Custom tabs (Charts with tabs)-->
						<div class="nav-tabs-custom">
							<div class="tab-content no-padding">
								<div>
									<br>
									<div class="modal-image-choose">
										<div class="text-center">
											<a class="text-center" data-toggle="modal" data-target="#myModalPages">
											<img src="<?php echo (isset($this->data['data']['image']) && $this->data['data']['image'] != '') ? base_url_cloud() . 'timthumb.php?src=' . base_url_cloud() . 'cdn/' . $this->data['data']['image'] . '&h=150&w=210&zc=2' : base_url() . 'tmp/public/images/img.png'; ?>" class="logo-website pages-website load-img" id="uploadPreview" alt=""  style="width: 25%"/>
											<input type="hidden" class="hidden_thumb_pages" name="hidden_thumb_pages" value="<?php if (isset($this->data['data']['image'])) {
												echo $this->data['data']['image'];
											}
											?>"/>
											</a>
											<h5 class="text-center"><a href="" class="del-image-choose-pages" style="color: #FF5722;font-weight:bold;"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo lang('delete'); ?> </a></h5>
										</div>
										<!-- Modal -->
										<div class="modal fade" id="myModalPages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title" id="label-model-folder-img">
															<?php echo lang('choose_logo'); ?>
														</h4>
													</div>
													<div id="loadMediaModel" class="modal-body" data-mess-one="<?php echo lang('warning_choose_img'); ?>" data-mess-two="<?php echo lang('warning_choose_img_one'); ?>" data-title="thumbnail_pages">
													</div>
													<div class="modal-footer">
														<div class="fileUpload btn btn-primary">
															<span><i class="fa fa-cloud-upload" aria-hidden="true"></i> <?php echo lang('uploadmedia'); ?></span>
															<input  type="file" id="media" class="media upload" name="media" />
															<input type="hidden" id="uploadImage" value="<?php echo time(); ?>" class=""  name="media"/>
														</div>
														<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close'); ?></button>
														<button type="button" class="btn btn-primary choose_img"><?php echo lang('choose'); ?></button>
													</div>
												</div>
											</div>
										</div>
										<!--END MODAL-->
									</div>
								</div>
							</div>
						</div>
						<!-- /.nav-tabs-custom -->
					</div>
			</div>
		</div>
		<!-- /.row -->
		<!-- Main row -->
	</section>
</div>
</div>
</div>
	<!-- /.content -->
</div>
<div class="loading"></div>
<div class="fade_loading"></div>
</form>