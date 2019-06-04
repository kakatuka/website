<div class="col_right">
  <div class="content-wrapper">
    <div class="page-heading page-heading-md">
      <h2 class="header__main"><span class="breadcrumb hidden-xs"><i class="fa fa-file-image-o"></i> </span><span class="title">Kho lưu trữ hình ảnh và tư liệu</span></h2>
    </div>
    <!-- Main content -->
    <div class="content_col_right">
      <div class="container-fluid-md" style="margin-bottom:20px;margin-top: 50px;">
        <section class="content">
          <!-- Main row -->
          <div class="row">
            <div class="col-md-4 col-lg-3 margin-md-bottom">
            <h4>Kho lưu trữ</h4>
            <p class="text-muted">- Tại tab hình ảnh bạn có thể tải lên các hình ảnh với định dạng phổ biến</p>
          </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#revenue-chart" data-toggle="tab"><?php echo lang('image'); ?></a></li>
                  <li class=""><a href="#sales-chart" data-toggle="tab"><?php echo lang('file'); ?></a></li>
                </ul>
                <div class="tab-content no-padding">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
                    <form id="form-uploads-ajax" enctype="multipart/form-data" method="post">
                    </br>
                    <div class="fileUpload btn btn-primary">
                      <span><i class="fa fa-cloud-upload" aria-hidden="true"></i> <?php echo lang('uploadmedia'); ?></span>
                      <input type="file" id="media" class="media upload" name="media[]" multiple/>
                      <input type="hidden" value="<?php echo time(); ?>" class="" name="media"/>
                    </div>
                    <button class="btn btn-info refesh" type="button">
                      <i class="fa fa-refresh fa-spin" aria-hidden="true"></i>
                      <?php echo lang('reload'); ?>
                    </button>
                    <button class="btn btn-success create_folder" type="button">
                      <i class="fa fa-folder-o" aria-hidden="true"></i>
                      <?php echo lang('create_folder'); ?>
                    </button>
                    <div class="">
                    </div>
                    <div class="" id="loadMedia">
                    </div>
                  </form>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative;">
                  <form id="form-uploads-ajax" enctype="multipart/form-data" method="post">
                  </br>
                  <div class="fileUpload btn btn-primary">
                    <span><i class="fa fa-cloud-upload" aria-hidden="true"></i> <?php echo lang('uploadmedia'); ?></span>
                    <input type="file" id="media" class="media upload" name="media" />
                    <input type="hidden" value="<?php echo time(); ?>" class="" name="media"/>
                  </div>
                  <button class="btn btn-info refesh" type="button">
                    <i class="fa fa-refresh fa-spin" aria-hidden="true"></i>
                    <?php echo lang('reload'); ?>
                  </button>
                  <button class="btn btn-success create_folder" type="button">
                    <i class="fa fa-folder-o" aria-hidden="true"></i>
                    <?php echo lang('create_folder'); ?>
                  </button>
                  <div class="" id="loadMediaFiles">
                  </div>
                </form>
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
                <h4 class="modal-title"><?php echo lang('rename_file'); ?></h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for=""><?php echo lang('label_newname'); ?>:</label>
                  <input type="text" placeholder="<?php echo lang('typing_new_name'); ?>" class="form-control" id="new_name"/>
                  <input type="hidden" id="old_name" value="" />
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" id="rename"><i class="fa fa-font" aria-hidden="true"></i> <?php echo lang('rename'); ?></button>
                <button type="button" class="btn btn-success" id="copy_rename"><i class="fa fa-files-o" aria-hidden="true"></i> <?php echo lang('copyandrename'); ?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close'); ?></button>
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
                <h4 class="modal-title"><?php echo lang('create_folder'); ?></h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for=""><?php echo lang('name_folder_required'); ?></label>
                  <input type="text" placeholder="<?php echo lang('typing_name_folder'); ?>" class="form-control" id="new_name_folder"/>

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" id="create_acept"><i class="fa fa-check" aria-hidden="true"></i> <?php echo lang('create_acept'); ?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close'); ?></button>
              </div>
            </div>

          </div>
        </div>
        <!-- Modal RenameFILES -->
        <div id="myModalRenameFiles" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo lang('rename_file'); ?> Files</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for=""><?php echo lang('label_newname'); ?>:</label>
                  <input type="text" placeholder="<?php echo lang('typing_new_name'); ?>" class="form-control" id="new_name"/>
                  <input type="hidden" id="old_name" value="" />
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" id="rename"><i class="fa fa-font" aria-hidden="true"></i> <?php echo lang('rename'); ?></button>
                <button type="button" class="btn btn-success" id="copy_rename"><i class="fa fa-files-o" aria-hidden="true"></i> <?php echo lang('copyandrename'); ?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close'); ?></button>
              </div>
            </div>

          </div>
        </div>
        <!-- Modal CreateFILES -->
        <div id="myModalCreateFolderFiles" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo lang('create_folder'); ?> Files</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for=""><?php echo lang('name_folder_required'); ?></label>
                  <input type="text" placeholder="<?php echo lang('typing_name_folder'); ?>" class="form-control" id="new_name_folder"/>

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" id="create_acept"><i class="fa fa-check" aria-hidden="true"></i> <?php echo lang('create_acept'); ?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close'); ?></button>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- /.row (main row) -->
    </section>
  </div>
</div>
<!-- /.content -->
</div>
<div class="loading"></div>
<div class="fade_loading"></div>
</div>