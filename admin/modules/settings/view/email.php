<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
						<li><a href="<?php echo base_url().'home/home/index'; ?>"><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
						<li class="active"><?php echo lang('settings'); ?></li>
			</ol>

        </div>
        <div class="pull-right">
            <a class="btn-main with-icon" data-toggle="modal" data-target="#widget_manager" href="#"></a>
        </div>
        <div class="clearfix"></div>
    </div>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Main row -->
      <div class="row">
      <!-- left col -->
      <div class="col-md-12">

            <?php 
            if (isset($this->data['success'])) { ?>

                <div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><?php echo lang('success');?>!</strong> <?php echo $this->data['success'];?>
                </div>

              <?php 
            }

            ?>
            
        </div>

        <section class="col-lg-9">



          <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-cog" aria-hidden="true"></i>
              <h3 class="box-title"> <?php echo lang('settings'); ?></h3>

            </div>
             <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <div class="tab-content no-padding">

                  <br>
                  <div class="box-setting-info tab-pane active" id="revenue-chart" style="position: relative; min-height: 736px;">

                      
                      <form action="" method="post">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="box box-danger">
                          <div class="box-header with-border">
                              <i class="fa fa-clock"></i>
                              <h3 class="box-title"><?php echo lang('google_web_tool');?></h3>
                          </div>
                          <div class="box-body">

                              <div class="form-group ">
                                  <label for="google_analytics" class="control-label">Google Analytics</label>
                                  <input class="form-control" id="google_analytics" placeholder="Google Analytics" name="google_analytics" type="text" value="<?php echo (isset($this->data['info']['google_analytics'])) ? $this->data['info']['google_analytics'] : '';?>">
                                  <p><a href="https://analytics.google.com" target="_blank"><?php echo lang('path_analytics');?></a></p>
                              </div>

                              <div class="form-group ">
                                  <label for="google_site_verification" class="control-label"><?php echo lang('google_verify');?></label>
                                  <input class="form-control" id="google_site_verification" placeholder="Google Site Verification" name="google_site_verification" type="text" value="<?php echo (isset($this->data['info']['google_site_verification'])) ? $this->data['info']['google_site_verification'] : '';?>">
                                  <p><a target="_blank" href="https://ga-dev-tools.appspot.com/account-explorer/"><?php echo lang('view_id_analytics');?></a></p>
                              </div>
                              <div class="form-group ">
                                  <label for="file_google" class="control-label"><?php echo lang('json_analytics');?></label> <a href="https://console.developers.google.com/?pli=1" target="_blank"><?php echo lang('link');?></a> <br>
                                    <div style="position:relative;">
                                      <a class='btn btn-default' href='javascript:;'>
                                        Choose File...
                                        <input type="file" name="file_source" id="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                                      </a>
                                      &nbsp;
                                      <span class='label label-info' id="upload-file-info" style="max-width: 350px; position: absolute; top: 41px; left: 0px;overflow: hidden;"><?php echo (isset($this->data['info']['google_file_json'])) ? $this->data['info']['google_file_json'] : '';?></span>
                                    </div>
                              </div>

                          </div>
                          <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                  </div>
                  <div class="clearfix"></div>
                    <!-- / SAVE -->
                    <div class="col-md-12 col-sm-12 col-xs-12 no-padding" style="text-align: center;margin-bottom: 20px;">
                      <button type="submit" name="ok" class="btn btn-info">
                      <i class="fa fa-save"></i>
                      <?php echo lang('save');?></button>
                    </div>
                    <!-- / END SAVE -->

                    </form>
                  <div style="clear: both;"></div>
                  </div>
                </div>
              </div>
              <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.box -->

        </section>
        <!-- END LEFT COL -->

        <!-- left col -->
        <section class="col-lg-3">

          <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient bg-header-left box-left">
            <div class="box-header">
              <i class="fa fa-file-image-o" aria-hidden="true"></i>
              <h3 class="box-title"><?php echo lang('image');?></h3>
            </div>
             <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <div class="tab-content no-padding">
                  <div>
                      <br>
                        <div class="modal-image-choose">
                            <div class="text-center">
                                  <a class="text-center" data-toggle="modal" data-target="#myModalLogo">
                                  <img src="<?php echo (isset($this->data['info']['logo']) && $this->data['info']['logo']!='') ? base_url_cloud().'timthumb.php?src='.base_url_cloud().'cdn/'.$this->data['info']['logo'].'&h=150&w=210&zc=2' : base_url().'tmp/public/images/img.png';?>" class="logo-website load-img" alt="">
                                  </a>
                                  <h5 class="text-center"><a href="" class="del-image-choose-logo" style="color: #FF5722;font-weight:bold;"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo lang('delete'); ?> </a></h5>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="myModalLogo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="label-model-folder-img">
                                       <?php echo lang('choose_logo'); ?>
                                    </h4>
                                  </div>
                                  <div id="loadMediaModel" class="modal-body" data-mess-one="<?php echo lang('warning_choose_img');?>" data-mess-two="<?php echo lang('warning_choose_img_one');?>" data-title="logo">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close');?></button>
                                    <button type="button" class="btn btn-primary choose_img"><?php echo lang('choose');?></button>
                                  </div>
                                </div>
                              </div>
                            </div><!--END MODAL-->
                        </div>
                        <div class="modal-image-choose">
                            <div class="text-center">
                                  <a class="text-center" data-toggle="modal" data-target="#myModalFavicon">
                                  <img src="<?php echo (isset($this->data['info']['icon']) && $this->data['info']['icon']!='') ? base_url_cloud().'cdn/'.$this->data['info']['icon'] : base_url().'tmp/public/images/img.png';?>" class="logo-favicon load-img" alt="">
                                  </a>
                                  <h5 class="text-center"><a href="" class="del-image-choose-favicon" style="color: #FF5722;font-weight:bold;"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo lang('delete'); ?> </a></h5>
                            </div>
                            <!-- Modal -->
                              <div class="modal fade" id="myModalFavicon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="label-model-folder-img">
                                         <?php echo lang('choose_favicon'); ?>
                                      </h4>
                                    </div>
                                    <div id="loadMediaModelfavicon" class="modal-body" data-mess-one="<?php echo lang('warning_choose_img');?>" data-mess-two="<?php echo lang('warning_choose_img_one');?>" data-title="favicon">
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close');?></button>
                                      <button type="button" class="btn btn-primary choose_img"><?php echo lang('choose');?></button>
                                    </div>
                                  </div>
                                </div>
                              </div><!--END MODAL-->
                        </div>
                        
                        <br>
                    

                    

                    



                  </div>
                </div>
              </div>
              <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.box -->

        </section>
        <!-- left col -->





      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
      <div class="loading"></div>
<div class="fade_loading"></div>