<!-- <form action="<?php echo base_url().'audio/audio/save'?>" method="post" id="form-uploads-ajax"> -->
<form action="<?php echo base_url().'audio/audio/save'?>" class="form-uploads-ajax" id="form-uploads-ajax" method="post">
<div class="content-wrapper">
	<div class="page-heading page-heading-md">
                        <h2 class="header__main">
					<span class="breadcrumb hidden-xs">
						<i class="fa fa-credit-card"></i>
						<a href="<?php echo base_url().'audio/audio/index';?>">Audio</a> /
					</span>
					<span class="title">Thêm mới - chỉnh sửa</span>
				</h2>
                        <div class="header-right">
						<button type="submit" name="submit" value="save" class="btn background_orange"><i class="fa fa-save"></i> <?php echo lang('save_one');?></button>
				        <button type="submit" name="submit" value="apply" class="btn background_orange"><i class="fa fa-check-circle"></i> <?php echo lang('save_one');?> &amp; <?php echo lang('add_one');?></button>
                     </div>
                    </div>
	<!-- Main content -->
	    <div class="col_right">
     <div class="content_col_right">
    <div class="container-fluid-md" style="margin-bottom:20px;margin-top: 50px;">
	<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
			<div class="col-md-4 col-lg-3 margin-md-bottom">
            <h4>Thông tin bài hát</h4>
            <p class="text-muted">- Bạn hãy nhập tên cho file nhạc của mình</p>
            <p class="text-muted">- Đường link sẽ tự sinh ra khi bạn chọn file nhạc đã tải lên trước đó</p>
          </div>
        	
        	<input type="hidden" name="id_audio" id="id_audio" value="<?php if(isset($this->data['data']['id'])) echo $this->data['data']['id'];?>">
			<div class="col-md-9" style="min-height:374px;">
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
			                        <input class="form-control" id="title" placeholder="<?php echo lang('maximum_pages'); ?>" value="<?php if(isset($this->data['data']['title'])) echo $this->data['data']['title']; ?>" name="title" type="text" required>
			                    </div>
			                    <div class="form-group ">
			                        <label for="name" class="control-label required"><?php echo lang('link');?></label>
			                        <input class="form-control" id="link" placeholder="<?php echo lang('maximum_pages'); ?>" value="<?php if(isset($this->data['data']['link'])) echo $this->data['data']['link']; ?>" name="link" type="text">
			                    </div>
			                    <div class="form-group ">
			                        <label class="control-label required"><?php echo lang('description');?></label>
			                        <textarea class="form-control" id="description" name="description" cols="50" rows="4">
			                        	<?php if(isset($this->data['data']['description'])) echo $this->data['data']['description']; ?>
			                        </textarea>
			                    </div>
			                </div>
			            </div>
			            <div class="tab-pane" id="tab_note">
			                <div class="form-group">
			                    <label class="col-sm-2 control-label text-right"><?php echo lang('note_content');?></label>
			                    <div class="col-sm-10">
			                        <textarea class="form-control" name="note" cols="50" rows="10" style="margin-top: 0px; margin-bottom: 0px; height: 281px;" placeholder="Nhập vào thông tin file nhạc...">
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
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
				<div class="col-md-4 col-lg-3 margin-md-bottom">
		            <h4>Hình ảnh</h4>
		            <p class="text-muted">- Bạn chọn một ảnh làm ảnh đại diện cho file nhạc</p>
		          </div>
		          <div class="col-md-9">
					<!-- solid sales graph -->
			          <div class="box box-solid bg-teal-gradient bg-header-left box-left">
			              <div class="nav-tabs-custom">
			                <div class="tab-content no-padding">
			                  <div>
			                      <br>
			                        <div class="modal-image-choose" style="width: 50%;float: left;">
			                        <p style="font-weight: bold;text-align: center;">Ảnh đại diện</p>
			                            <div class="text-center">
			                                  <a class="text-center" data-toggle="modal" data-target="#myModalPages">
			                                  <img src="<?php echo (isset($this->data['data']['images']) && $this->data['data']['images']!='') ? base_url_cloud().'timthumb.php?src='.base_url_cloud().'cdn/'.$this->data['data']['images'].'&h=150&w=210&zc=2' : base_url_cloud().'timthumb.php?src='.base_url().'tmp/public/images/img.png'.'&h=150&w=210&zc=2';?>" class="logo-website pages-website load-img" id="uploadPreview" alt="" />
			                                  <input type="hidden" class="hidden_thumb_pages" name="hidden_thumb_pages" value="<?php if(isset($this->data['data']['images'])) echo $this->data['data']['images']; ?>"/>
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
<div class="modal-file-choose" style="width: 50%;float: left;">
<p style="font-weight: bold;text-align: center;">File nhạc của bạn</p>
    <div class="text-center">
      <a class="text-center" data-toggle="modal" data-target="#myModalFile">
        <img src="<?php echo (isset($this->data['data']['file_url']) && $this->data['data']['file_url']!='') ? base_url_cloud().'timthumb.php?src='.base_url_cloud().'tmp/public/images/img-mp3.png&h=150&w=210&zc=2' : base_url_cloud().'timthumb.php?src='.base_url_cloud().'tmp/public/images/img-mp3.png&h=150&w=210&zc=2';?>" class="logo-website file-website load-img" id="uploadPreview" alt="" />
        <input type="hidden" class="hidden_thumb_file" name="hidden_thumb_file" value="<?php if(isset($this->data['data']['file_url'])) echo $this->data['data']['file_url']; ?>"/>
      </a>
      <p><?php echo $this->data['data']['file_url']; ?></p>
      <h5 class="text-center"><a href="" class="del-file-choose-pages" style="color: #FF5722;font-weight:bold;"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo lang('delete'); ?> </a></h5>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModalFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="label-model-folder-img">
             <?php echo lang('choose_logo'); ?>
           </h4>
         </div>
         <div id="loadMediaModelFile" class="modal-body-file" data-mess-one="<?php echo lang('warning_choose_img');?>" data-mess-two="<?php echo lang('warning_choose_img_one');?>" data-title="thumbnail_file">
           <!-- <?php
           $dir          = DIR_TMP.'files/';
           $html = listAllFolderChooseFile($dir);
           echo $html;
           ?> -->
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
			          </div>
				</div>
		      </div>
    </section>
</div>
</div>
</div>
</div>
<div class="loading"></div>
<div class="fade_loading"></div>
</form>