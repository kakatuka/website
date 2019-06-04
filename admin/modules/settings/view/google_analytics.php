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
          <?php if (isset($this->data['success'])) { ?>
            <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong><?php echo lang('success');?>!</strong> <?php echo $this->data['success'];?>
            </div>
          <?php } ?>
        </div>
        <section class="col-lg-12">
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
                      <div class="col-md-12 col-sm-12 col-xs-12">
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
                                      <span class='label label-info' id="upload-file-info" style="position: absolute;"><?php echo (isset($this->data['info']['google_file_json'])) ? $this->data['info']['google_file_json'] : '';?></span>
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
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
<div class="loading"></div>
<div class="fade_loading"></div>