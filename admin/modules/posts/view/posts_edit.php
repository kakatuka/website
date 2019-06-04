<form action="<?php echo base_url().'posts/posts/save'?>" method="post" id="form-uploads-ajax">
<div class="content-wrapper">
	<div class="page-heading page-heading-md">
        <h2 class="header__main">
			<span class="breadcrumb hidden-xs">
				<i class="fa fa-credit-card"></i>
				<a href="<?php echo base_url().'posts/posts/index';?>">Danh sách bài viết</a> /
			</span>
		     <span class="title">Thêm mới - chỉnh sửa bài viết</span>
		</h2>
        <div class="header-right">
            <button type="submit" name="submit" value="save" class="btn btn-default"><i class="fa fa-save"></i> <?php echo lang('save_one');?></button>
			<button type="submit" name="submit" value="apply" class="btn background_orange"><i class="fa fa-check-circle"></i> <?php echo lang('save_one');?> &amp; <?php echo lang('add_one');?></button>
        </div>
    </div>
	<!-- Main content -->
    <div class="col_right">
    	<div class="content_col_right">
    		<div class="container-fluid-md" style="margin-bottom:20px;margin-top: 50px;">
				<section class="content">
				<!-- Small boxes (Stat box) -->
				<div class="row">
				<input type="hidden" name="id_posts" value="<?php if(isset($this->data['data']['id'])) echo $this->data['data']['id'];?>">
				<div class="col-md-12" style="min-height:750px;">
					<div class="tabbable-custom ">
						<?php 
							if (isset($this->data['flash_success'])) {
							    echo '<div class="alert alert-success">
							              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							              <strong>'.lang('success').'</strong> '.$this->data['flash_success'].'
							            </div>';
							}
							?>
						<ul class="nav nav-tabs ">
							<li class="active">
								<a href="#tab_detail" data-toggle="tab" aria-expanded="true"><?php echo lang('detail');?></a>
							</li>
							<li class="">
								<a href="#tab_note" data-toggle="tab" aria-expanded="false"><?php echo lang('record_note');?></a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_detail">
								<div class="form-body">
									<div class="form-group ">
										<label for="name" class="control-label required"><?php echo lang('title');?></label>
										<input class="form-control" id="title" placeholder="<?php echo lang('maximum_posts'); ?>" value="<?php if(isset($this->data['data']['title'])) echo stripslashes($this->data['data']['title']); ?>" name="title" type="text">
									</div>
									<div class="form-group ">
										<label for="description" class="control-label required"><?php echo lang('description');?></label>
										<textarea class="form-control" rows="4" id="description" placeholder="<?php echo lang('description_required');?>" data-counter="300" name="description" cols="50"><?php if(isset($this->data['data']['description'])) echo stripslashes($this->data['data']['description']); ?></textarea>
									</div>
									 <div class="form-group ">
										<label class="control-label required"><?php echo lang('content');?></label>
										<textarea name="content" id="content" name="content"> 
											<?php if(isset($this->data['data']['content'])) echo $this->data['data']['content']; ?>
										</textarea>
										<script type="text/javascript">CKEDITOR.replace('content');</script>
									</div>
								   <!-- <div class="form-group ">
										<label for="name" class="control-label required"><?php echo lang('tags');?> (<?php echo lang('meta_keyword_required');?>)</label>
										<input class="form-control" id="tags" placeholder="<?php echo lang('tags'); ?>" value="<?php if(isset($this->data['data']['tags'])) echo $this->data['data']['tags']; ?>" name="tags" type="text">
									</div> -->
									<div class="form-group ">
										<label for="name" class="control-label required">Meta title</label>
										<input class="form-control" id="title" placeholder="title seo" value="<?php if(isset($this->data['data']['meta_title'])) echo stripslashes($this->data['data']['meta_title']); ?>" name="meta_title" type="text">
									</div>
									<div class="form-group ">
										<label for="name" class="control-label required">Meta keyword</label>
										<input class="form-control" id="title" placeholder="từ khóa seo" value="<?php if(isset($this->data['data']['meta_keyword'])) echo stripslashes($this->data['data']['meta_keyword']); ?>" name="meta_keyword" type="text">
									</div>
									<div class="form-group ">
										<label for="name" class="control-label required">Meta description</label>
										<textarea class="form-control" rows="4" id="description" placeholder="Mô tả seo" data-counter="300" name="meta_description" cols="50"><?php if(isset($this->data['data']['meta_description'])) echo stripslashes($this->data['data']['meta_description']); ?></textarea>
									</div>
									<div class="form-group" >
										<div class="widget light bordered meta-boxes">
											<div class="widget-title" style="padding: 10px;">
												<h4><i class="fa fa-info-circle"></i>Bài viết hiển thị trang Chủ</h4>
											</div>
											<div class="widget-body">
												<div class="meta-box check-box" data-slug="1_show_contact_form1">
													<div class="scf-checkbox-wrap">
														<span class="dis-block">
														<label>
														Bài viết hiển thị? &nbsp;
														<input type="checkbox" name="show_contact_form1" id="show_contact_form1" value="true" <?php if(isset($this->data['data']['hot1']) && $this->data['data']['hot1']!="" && $this->data['data']['hot1'] == 1) echo " checked"; ?>> <?php echo lang('yes');?>
														</label>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="widget light bordered meta-boxes">
											<div class="widget-title" style="padding: 10px;">
												<h4><i class="fa fa-info-circle"></i>Bài viết hiển thị trang Page</h4>
											</div>
											<div class="widget-body">
												<div class="meta-box check-box" data-slug="show_contact_form">
													<div class="scf-checkbox-wrap">
														<span class="dis-block">
														<label>
														Chọn bài hiển thị &nbsp;
														<input type="checkbox" name="show_contact_form" id="show_contact_form" value="true" <?php if(isset($this->data['data']['hot']) && $this->data['data']['hot']!="" && $this->data['data']['hot'] == 1) echo " checked"; ?>> <?php echo lang('yes');?>
														</label>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="widget light bordered meta-boxes">
											<div class="widget-title" style="padding: 10px;">
												<h4><i class="fa fa-info-circle"></i>Bài viết hiển thị banner index</h4>
											</div>
											<div class="widget-body">
												<div class="meta-box check-box" data-slug="show_contact_form">
													<div class="scf-checkbox-wrap">
														<span class="dis-block">
														<label>
														Chọn bài hiển thị &nbsp;
														<input type="checkbox" name="slider" id="show_contact_form" value="1" <?php if(isset($this->data['data']['view']) && $this->data['data']['view']!="" && $this->data['data']['view'] == 1) echo " checked"; ?>> <?php echo lang('yes');?>
														</label>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label strong" for="name">Sắp xếp hiển thị</label> <span class="asterisk">*</span>
										<div class="controls" style="width: 15%">
											<input class="form-control" placeholder="Nhập số" id="title" value="<?php if(isset($this->data['data']['order_by'])) echo stripcslashes($this->data['data']['order_by']); ?>" name="order" type="text">
											<span class="help-block"><span class="field-validation-valid help-block" ></span></span>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab_note">
								<div class="form-group">
									<label class="col-sm-2 control-label text-right"><?php echo lang('note_content');?></label>
									<div class="col-sm-10">
										<textarea class="form-control" name="note" cols="50" rows="10">
										<?php if(isset($this->data['data']['note'])) echo $this->data['data']['note']; ?>
										</textarea>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
				
			
		</div>
		<div class="row">
			<div class="col-md-12">
					<!-- solid sales graph -->
					<div class="box box-solid bg-teal-gradient bg-header-left box-left">
						<div class="box-header">
							<i class="fa fa-list-ol" aria-hidden="true"></i>
							<h3 class="box-title" style="display: inline-block;font-size: 22px;margin:0;"><?php echo lang('categories');?></h3>
						</div>
						<!-- Custom tabs (Charts with tabs)-->
						<div class="nav-tabs-custom">
							<div class="tab-content no-padding categories_scoll">
								<div>
									<br>
									<div class="form-group ">
										<?php 
											if (isset($this->data['data']['id'])) {
												if (!empty($this->data['data_categories'])) {
													listCategoriesController($this->data['data_categories'],$this->data['data']['cate_id'],'posts');
													
												}
											}else{
												if (!empty($this->data['data_categories'])) {
													listCategoriesController($this->data['data_categories'],null,'posts');
												}
											}
											?>
									</div>
								</div>
							</div>
						</div>
						<!-- /.nav-tabs-custom -->
					</div>
					<!-- /.box -->
					<!-- solid sales graph -->
					
					<!-- /.box -->
					<!-- link bài viết kiên code -->
					<!-- <div class="box box-solid bg-teal-gradient bg-header-left box-left" id="block-image">
						<div class="box-header">
							<i class="fa fa-file-image-o" aria-hidden="true"></i>
							<h3 class="box-title">Tệp tin đính kèm</h3>
						</div>
						<div class="nav-tabs-custom">
							<div class="tab-content no-padding">
								<div>
									<br>
									<div class="modal-file-choose">
										<div class="text-center">
											<a class="text-center" data-toggle="modal" data-target="#myModalFile">
											<img src="<?php echo (isset($this->data['data']['file_url']) && $this->data['data']['file_url']!='') ? base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url().'tmp/public/images/img-pdf.png'.'&h=150&w=210&zc=2' : base_url().'tmp/public/images/img.png';?>" class="logo-website pages-website load-img" alt="" />
											<input type="hidden" class="hidden_thumb_pages1" name="hidden_thumb_pages1" value="<?php if(isset($this->data['data']['file_url'])) echo $this->data['data']['file_url']; ?>"/>
											</a>
											<h5 class="text-center"><a href="" class="del-image-choose-pages" style="color: #FF5722;font-weight:bold;"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo lang('delete'); ?> </a></h5>
										</div>

										<div class="modal fade" id="myModalFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title" id="label-model-folder-img">
															<?php echo lang('choose_logo'); ?>
														</h4>
													</div>
													<div class="modal-body"  data-mess-one="<?php echo lang('warning_choose_img');?>" data-mess-two="<?php echo lang('warning_choose_img_one');?>" data-title="thumbnail_pages">
														<?php
															$dir          = DIR_TMP.'files/';
															 $html = listAllFolderChooseFile($dir);
															 echo $html;
														?>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close');?></button>
														<button type="button" class="btn btn-primary choose_file"><?php echo lang('choose');?></button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<!-- end link bài viết -->
					<div class="sidebar-box">
						<div class="form-group">
							<div class="form-actions">
								<div class="btn-set">
								
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid bg-teal-gradient bg-header-left box-left">
						<div class="box-header">
							<i class="fa fa-file-image-o" aria-hidden="true"></i>
							<h3 class="box-title" style="display: inline-block;font-size: 22px;margin:0;"><?php echo lang('image');?></h3>
						</div>
						<!-- Custom tabs (Charts with tabs)-->
						<div class="nav-tabs-custom">
							<div class="tab-content no-padding">
								<div>
									<br>
									<div class="modal-image-choose">
										<div class="text-center">
											<a class="text-center" data-toggle="modal" data-target="#myModalPages">
											<img src="<?php echo (isset($this->data['data']['thumbnail']) && $this->data['data']['thumbnail']!='') ? base_url_cloud().'timthumb.php?src='.base_url_cloud().'cdn/'.$this->data['data']['thumbnail'].'&h=150&w=210&zc=2' : base_url().'tmp/public/images/img.png';?>" class="logo-website pages-website load-img" id="uploadPreview" alt=""  style="width: 25%"/>
											<input type="hidden" class="hidden_thumb_pages" name="hidden_thumb_pages" value="<?php if(isset($this->data['data']['thumbnail'])) echo $this->data['data']['thumbnail']; ?>"/>
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
													<div id="loadMediaModel" class="modal-body" data-mess-one="<?php echo lang('warning_choose_img');?>" data-mess-two="<?php echo lang('warning_choose_img_one');?>" data-title="thumbnail_pages">
													</div>
													<div class="modal-footer">
														<div class="fileUpload btn btn-primary">
															<span><i class="fa fa-cloud-upload" aria-hidden="true"></i> <?php echo lang('uploadmedia');?></span>
															<input  type="file" id="media" class="media upload" name="media" />
															<input type="hidden" id="uploadImage" value="<?php echo time(); ?>" class=""  name="media"/>
														</div>
														<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close');?></button>
														<button type="button" class="btn btn-primary choose_img"><?php echo lang('choose');?></button>
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