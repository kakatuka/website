<form action="<?php echo base_url().'pages/pages/save'?>" method="post" id="form-uploads-ajax">
<div class="content-wrapper">
<div class="page-heading page-heading-md">
                        <h2 class="header__main">
					<span class="breadcrumb hidden-xs">
						<i class="fa fa-credit-card"></i>
						<a href="<?php echo base_url().'pages/pages/index';?>">Trang tĩnh</a> /
					</span>
					<span class="title">Thêm mới - chỉnh sửa trang tĩnh</span>
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
        	
        	
        	<input type="hidden" name="id_pages" id="id_pages" value="<?php if(isset($this->data['data']['id'])) echo $this->data['data']['id'];?>">
        	<div class="col-md-4 col-lg-3 margin-md-bottom">
            <h4>Thông tin website</h4>
            <p class="text-muted">Thông tin được sử dụng để Thiên Việt và khác hàng liên hệ đến bạn.</p>
          </div>
			<div class="col-md-9" style="min-height:750px;">
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
			                <a href="#tab_detail" data-toggle="tab" data-lang="vi" aria-expanded="true"><?php echo lang('detail');?></a>
			            </li>
			            <li class="">
			                <a href="#tab_note" data-toggle="tab" data-lang="en" aria-expanded="false"><?php echo lang('record_note');?></a>
			            </li>
			        </ul>
			        <div class="tab-content">
			            <div class="tab-pane active" id="tab_detail">
			                <div class="form-body">

			                    <div class="form-group ">
			                        <label for="name" class="control-label required"><?php echo lang('title');?></label>
			                        <input class="form-control" id="title" placeholder="<?php echo lang('maximum_pages'); ?>" value="<?php if(isset($this->data['data']['title'])) echo $this->data['data']['title']; ?>" name="title" type="text">
			                    </div>

			                    <div class="form-group ">
			                       <!--  <label for="name" class="control-label required"><?php echo lang('description');?></label> -->
			                       <!--  <input class="form-control" id="description" placeholder="<?php echo lang('maximum_pages'); ?>" value="<?php if(isset($this->data['data']['description'])) echo $this->data['data']['description']; ?>" name="description" type="text"> -->
			                    </div>
			                    
			                    <?php if(isset($this->data['data']['id']) && is_numeric($this->data['data']['id'])) { ;?>
			                    <div class="form-group">
								    <div id="edit-slug-box">
								        <strong>Permalink:</strong>
								        <span id="sample-permalink" data-base="<?php echo replaceAdmin(base_url());?>" data-link-old="<?php if(isset($this->data['data']['old_url'])) echo $this->data['data']['old_url'];?>">
								        	<a class="permalink" href="
								        	<?php 
								        	if(isset($this->data['data']['old_url']) && $this->data['data']['old_url']!=""){
								        		echo replaceAdmin(base_url()).$this->data['data']['old_url'].'.htm';
								        	}else{
								        		echo replaceAdmin(base_url()).'pages/pages/detail/'.$this->data['data']['id'];
								        	}
								        	?>">
												<span class="default-slug"><?php echo replaceAdmin(base_url());?><span id="editable-post-name"><?php 
												if(isset($this->data['data']['old_url']) && $this->data['data']['old_url']!=""){
													echo $this->data['data']['old_url'];
												}
												?></span>.htm</span>

								        	</a>
								        </span>
								        &lrm;
								        <span id="edit-slug-buttons">
											<button type="button" class="btn btn-success btn-sm" id="change_slug">Edit</button>
											<button type="button" class="btn btn-info btn-sm" id="btn-ok-slug" style="display: none;">OK</button>
											<button type="button" class="btn btn-danger btn-sm" id="btn-cancel-slug" style="display: none;">Cancel</button>
										</span>
								    </div>
								    <input type="hidden" id="current-slug" name="slug" value="contact">
								    <div data-id="1" data-route="pages.create.slug" data-view="public.view" id="object_id"></div>
								</div>
								<?php };?>
			                    <div class="form-group ">
			                        <label class="control-label required"><?php echo lang('content');?></label>
			                        <textarea class="form-control" id="content" name="content" cols="50" rows="10" style="visibility: hidden; display: none;">
			                        	<?php if(isset($this->data['data']['content'])) echo $this->data['data']['content']; ?>
			                        </textarea>
			                        <script type="text/javascript">CKEDITOR.replace('content');

			                         </script>

			                    </div>

			                   <!--  <div class="form-group">
			                        <div class="widget light bordered meta-boxes">
			                            <div class="widget-title">
			                                <h4><i class="fa fa-info-circle"></i> <?php echo lang('contact_field'); ?></h4>
			                            </div>
			                            <div class="widget-body">
			                                <div class="meta-box check-box" data-slug="1_show_contact_form">
			                                    <p>
			                                        <label class="sbold"></label><br>
			                                        <span class="font-size-13"></span>
			                                    </p>
			                                    <div class="scf-checkbox-wrap">
			                                        <span class="dis-block">
												        <label>
												        	<?php echo lang('show_contact_form');?> &nbsp;
												            <input type="checkbox" name="show_contact_form" id="show_contact_form" value="true" <?php if(isset($this->data['data']['contact_form']) && $this->data['data']['contact_form']!="") echo " checked"; ?>> <?php echo lang('yes');?>
												        </label>
									    			</span>

									            </div>
									        </div>
									    </div>
									</div>
			                    </div> -->
			                    
			                </div>
			            </div>
			            <!-- <div class="tab-pane" id="tab_note">
			                <div class="form-group">
			                    <label class="col-sm-2 control-label text-right"><?php echo lang('note_content');?></label>
			                    <div class="col-sm-10">
			                        <textarea class="form-control" name="note" cols="50" rows="10">
			                        	<?php if(isset($this->data['data']['note'])) echo $this->data['data']['note']; ?>
			                        </textarea>
			                    </div>
			                </div>
			                <div class="clearfix"></div>
			            </div> -->
			        </div>
			    </div>
			</div>






				
				

















        

    	</div>
    	<div class="row">
    		<div class="col-md-4 col-lg-3 margin-md-bottom">
            <h4>Thông tin website</h4>
            <p class="text-muted">Thông tin được sử dụng để Thiên Việt và khác hàng liên hệ đến bạn.</p>
          </div>
				<div class="col-md-9">

					

					<div class="panel panel-default">
				      <div class="panel-heading">
			              <i class="fa fa-file-image-o" aria-hidden="true"></i> <?php echo lang('image');?>
			          </div>
				      <div class="panel-body">

				      		<div class="modal-image-choose">
	                            <div class="text-center">
	                                  <a class="text-center" data-toggle="modal" data-target="#myModalPages">
	                                  <img src="<?php echo (isset($this->data['data']['thumbnail']) && $this->data['data']['thumbnail']!='') ? base_url_cloud().'timthumb.php?src='.base_url_cloud().'cdn/'.$this->data['data']['thumbnail'].'&h=150&w=210&zc=2' : base_url().'tmp/public/images/img.png';?>"  class="logo-website pages-website load-img" style="width: 25%;" alt="" id="uploadPreview" style="width: 100%" />
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
	                            </div><!--END MODAL-->
	                        </div>

				      </div>
				    </div>





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
      <!-- /.row -->
      <!-- Main row -->

    </section>
    <!-- /.content -->
</div>
</div>
</div>
  </div>

  <div class="loading"></div>
<div class="fade_loading"></div>

</form>