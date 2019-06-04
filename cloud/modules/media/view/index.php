<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
						<li><a href="<?php echo base_url().'home/home/index'; ?>"><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
						<li class="active"><?php echo lang('media'); ?></li>
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

        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-left">
              <li class="active"><a href="#revenue-chart" data-toggle="tab"><?php echo lang('image'); ?></a></li>
              <li><a href="#sales-chart" data-toggle="tab"><?php echo lang('file'); ?></a></li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
                  
                  <form id="form-uploads-ajax" enctype="multipart/form-data" method="post">
                  <div class="container">
                      <div class="row">
                        </br>
                        
                        <div class="col-md-12">
                              <div class="fileUpload btn btn-primary">
                                  <span><i class="fa fa-cloud-upload" aria-hidden="true"></i> <?php echo lang('uploadmedia');?></span>
                                  <input type="file" id="media" class="media upload" name="media" />
                                  <input type="hidden" value="<?php echo time(); ?>" class="" name="media"/>
                              </div>
                              <button class="btn btn-info refesh" type="button">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                <?php echo lang('reload');?>
                              </button> 
                              <button class="btn btn-success create_folder" type="button">
                                <i class="fa fa-folder-o" aria-hidden="true"></i>
                                <?php echo lang('create_folder');?>
                              </button> 

                              
                              
                            
                        </div>
                        <div class="col-md-12" id="loadMedia">
                                      <?php
                                          // $dir  = $_SESSION['base_url_cdn'];
                                          $dir  = DIR_CDN;
                                          $html = listAllFolder($dir);
                                          echo $html;

                                      ?>
                        </div>
                        
                    </div>
                  </div>
                   

                  </form>


              </div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Rename -->
          <div id="myModalRename" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><?php echo lang('rename_file');?></h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for=""><?php echo lang('label_newname');?>:</label>
                    <input type="text" placeholder="<?php echo lang('typing_new_name');?>" class="form-control" id="new_name"/>
                    <input type="hidden" id="old_name" value="" />
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-info" id="rename"><i class="fa fa-font" aria-hidden="true"></i> <?php echo lang('rename');?></button>
                  <button type="button" class="btn btn-success" id="copy_rename"><i class="fa fa-files-o" aria-hidden="true"></i> <?php echo lang('copyandrename');?></button>
                  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close');?></button>
                </div>
              </div>

            </div>
          </div>


          <!-- Modal Rename -->
          <div id="myModalCreateFolder" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><?php echo lang('create_folder');?></h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for=""><?php echo lang('name_folder_required');?></label>
                    <input type="text" placeholder="<?php echo lang('typing_name_folder');?>" class="form-control" id="new_name_folder"/>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" id="create_acept"><i class="fa fa-check" aria-hidden="true"></i> <?php echo lang('create_acept');?></button>
                  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close');?></button>
                </div>
              </div>

            </div>
          </div>

        





      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>


  <div class="loading"></div>
  <div class="fade_loading"></div>