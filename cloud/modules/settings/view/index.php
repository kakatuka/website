
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
                                <h3 class="box-title"><?php echo lang('seo_config');?></h3>
                            </div>
                            <div class="box-body">

                                <div class="form-group ">
                                    <label for="seo_title" class="control-label"><?php echo lang('seo_title');?></label>
                                    <input class="form-control" id="seo_title" placeholder="SEO Title (maximum 120 characters)" data-counter="120" name="seo_title" type="text" value="<?php echo (isset($this->data['info']['seo_title'])) ? $this->data['info']['seo_title'] : '';?>">
                                </div>

                                <div class="form-group ">
                                    <label for="seo_description" class="control-label"><?php echo lang('seo_des');?></label>
                                    <input class="form-control" id="seo_description" placeholder="SEO Description (maximum 120 characters)" data-counter="120" name="seo_description" type="text" value="<?php echo (isset($this->data['info']['seo_description'])) ? $this->data['info']['seo_description'] : '';?>">
                                </div>

                                <div class="form-group ">
                                    <label for="seo_keywords" class="control-label"><?php echo lang('seo_key');?></label>
                                    <input class="form-control" id="seo_title" placeholder="SEO Keywords (maximum 60 characters, separate by &quot;,&quot; character)" data-counter="60" name="seo_keywords" type="text" value="<?php echo (isset($this->data['info']['seo_keywords'])) ? $this->data['info']['seo_keywords'] : '';?>">
                                </div>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>


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
                                      <span class='label label-info' id="upload-file-info"><?php echo (isset($this->data['info']['google_file_json'])) ? $this->data['info']['google_file_json'] : '';?></span>
                                    </div>
                              </div>

                          </div>
                          <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                  </div>
                  <div class="clearfix"></div>





                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <i class="fa fa-clock"></i>
                                <h3 class="box-title"><?php echo lang('social');?></h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group ">
                                    <label for="link_fb" class="control-label">Facebook</label>
                                    <input class="form-control" id="link_fb" placeholder="<?php echo lang('link_fb') ?>" name="link_fb" type="text" value="<?php echo (isset($this->data['info']['link_facebook'])) ? $this->data['info']['link_facebook'] : '';?>">
                                </div>

                                <div class="form-group ">
                                    <label for="link_gg" class="control-label">Google</label>
                                    <input class="form-control" id="link_gg" placeholder="<?php echo lang('link_gg') ?>" name="link_gg" type="text" value="<?php echo (isset($this->data['info']['link_google'])) ? $this->data['info']['link_google'] : '';?>">
                                </div>

                                <div class="form-group ">
                                    <label for="link_yt" class="control-label">Youtube</label>
                                    <input class="form-control" id="link_yt" placeholder="<?php echo lang('link_yt') ?>" name="link_yt" type="text" value="<?php echo (isset($this->data['info']['link_youtube'])) ? $this->data['info']['link_youtube'] : '';?>">
                                </div>

                                <div class="form-group ">
                                    <label for="link_tt" class="control-label">Twitter</label>
                                    <input class="form-control" id="link_tt" placeholder="<?php echo lang('link_tt') ?>" name="link_tt" type="text" value="<?php echo (isset($this->data['info']['link_tt'])) ? $this->data['info']['link_tt'] : '';?>">
                                </div>

                                <div class="form-group ">
                                    <label for="link_gm" class="control-label">Google map</label>
                                    <input class="form-control" id="link_gm" placeholder="<?php echo lang('link_gm') ?>" name="link_gm" type="text" value="<?php echo (isset($this->data['info']['link_google_map'])) ? $this->data['info']['link_google_map'] : '';?>">
                                </div>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!--END COL 6 -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <i class="fa fa-clock"></i>
                                <h3 class="box-title"><?php echo lang('contact_info');?></h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group ">
                                    <label for="contact_address" class="control-label">Address</label>
                                    <input class="form-control" id="contact_address" placeholder="Contact address" name="contact_address" type="text" value="<?php echo (isset($this->data['info']['address'])) ? $this->data['info']['address'] : '';?>">
                                </div>

                                <div class="form-group ">
                                    <label for="contact_email" class="control-label">Email</label>
                                    <input class="form-control" id="contact_email" placeholder="Email" name="contact_email" type="text" value="<?php echo (isset($this->data['info']['email'])) ? $this->data['info']['email'] : '';?>">
                                </div>

                                <div class="form-group ">
                                    <label for="email_support" class="control-label">Email Support</label>
                                    <input class="form-control" id="email_support" placeholder="Email Support" name="email_support" type="text" value="<?php echo (isset($this->data['info']['email_support'])) ? $this->data['info']['email_support'] : '';?>">
                                </div>

                                <div class="form-group">
                                    <label for="contact_phone" class="control-label">Phone</label>
                                    <input class="form-control" id="contact_phone" placeholder="Contact phone" name="contact_phone" type="text" value="<?php echo (isset($this->data['info']['phone'])) ? $this->data['info']['phone'] : '';?>">
                                </div>

                                <div class="form-group ">
                                    <label for="contact_hotline" class="control-label"> Hotline</label>
                                    <input class="form-control" id="seo_title" placeholder="Hotline" name="contact_hotline" type="text" value="<?php echo (isset($this->data['info']['hotline'])) ? $this->data['info']['hotline'] : '';?>">
                                </div>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!--END COL 6 -->

                    <!-- / SAVE -->
                    <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                      <button type="submit" name="ok" class="btn btn-info">
                      <i class="fa fa-save"></i>
                      <?php echo lang('save');?></button>
                    </div>
                    <!-- / END SAVE -->

                    </form>






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
                                  <img src="<?php echo (isset($this->data['info']['logo']) && $this->data['info']['logo']!='') ? base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url().'tmp/cdn/'.$this->data['info']['logo'].'&h=150&w=210&zc=2' : base_url().'tmp/public/images/img.png';?>" class="logo-website load-img" alt="">
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
                                  <div class="modal-body" data-mess-one="<?php echo lang('warning_choose_img');?>" data-mess-two="<?php echo lang('warning_choose_img_one');?>" data-title="logo">
                                   <?php
                                    /*if (!empty($this->data['images'])) {
                                      foreach ($this->data['images'] as $key => $value) {
                                        echo "<img class='img-load-folder' data-src='".$value."' src='".base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url().'tmp/cdn/'.$value."&h=100&w=150&zc=2' width='150' height='100'/>";
                                       }
                                    }*/

                                    $dir          = DIR_TMP.'cdn/';
                                      $html = listAllFolderChooseImage($dir);
                                      echo $html;

                                    ?>
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
                                  <img src="<?php echo (isset($this->data['info']['icon']) && $this->data['info']['icon']!='') ? base_url().'tmp/cdn/'.$this->data['info']['icon'] : base_url().'tmp/public/images/img.png';?>" class="logo-favicon load-img" alt="">
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
                                    <div class="modal-body" data-mess-one="<?php echo lang('warning_choose_img');?>" data-mess-two="<?php echo lang('warning_choose_img_one');?>" data-title="favicon">
                                     <?php
                                      /*if (!empty($this->data['images'])) {
                                        foreach ($this->data['images'] as $key => $value) {
                                          echo "<img class='img-load-folder' data-src='".$value."' src='".base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url().'tmp/cdn/'.$value."&h=100&w=150&zc=2' width='150' height='100'/>";
                                         }
                                      }
*/
                                      $dir          = DIR_TMP.'cdn/';
                                      $html = listAllFolderChooseImage($dir);
                                      echo $html;

                                      ?>
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