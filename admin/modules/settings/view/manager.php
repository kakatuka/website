<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
                        <li><a href="javascript:void(0)"><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
                        <li class="active"><?php echo lang('settings'); ?></li>
            </ol>

        </div>
        <div class="pull-right">
            <a class="btn-main with-icon" data-toggle="modal" data-target="#widget_manager" href="#"></a>
        </div>
        <div class="clearfix"></div>
    </div>
    </section>
     <section class="content-header">
        <?php 
        if (isset($this->data['flash_success'])) {
            echo '<div class="alert alert-success">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>'.lang('success').'</strong> '.$this->data['flash_success'].'
                    </div>';
        }
        ?>
        <?php 
        if (isset($this->data['flash_warning'])) {
            echo '<div class="alert alert-warning">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>'.lang('warning').'</strong> '.$this->data['flash_warning'].'
                    </div>';
        }
        ?>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row" style="min-height:700px">
        <div class="col-md-4">
            <div class="list-group config-item">
                <a href="<?php echo base_url().'settings/settings/index'; ?>" class="list-group-item">
                    <i class="fa fa-wrench" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('info_website');?></h4>
                    <p class="list-group-item-text"><?php echo lang('manager_info_website');?></p>
                </a>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="list-group config-item">
                <a href="<?php echo base_url().'settings/googleanalytics/index'; ?>" class="list-group-item">
                    <i class="fa fa-line-chart" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('google_analytics');?></h4>
                    <p class="list-group-item-text"><?php echo lang('manage_analytics');?></p>
                </a>
            </div>
        </div> -->
        <div class="col-md-4">
            <div class="list-group config-item">
                <a href="<?php echo base_url().'options/options/index'; ?>" class="list-group-item">
                    <i class="fa fa-cogs" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('options');?></h4>
                    <p class="list-group-item-text">Tính năng bình luận và phân trang</p>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="list-group config-item">
                <a href="<?php echo base_url().'menu/position/index';?>" class="list-group-item">
                    <i class="fa fa-cog fa-spin" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('menu');?></h4>
                    <p class="list-group-item-text"><?php echo lang('manage_group_permissions');?></p>
                </a>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="list-group config-item">
                <a href="<?php echo base_url().'widgets/widgets/index';?>" class="list-group-item">
                    <i class="fa fa-comment" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('widgets');?></h4>
                    <p class="list-group-item-text"><?php echo lang('manage_roles');?></p>
                </a>
            </div>
        </div> -->
        <div class="col-md-4">
            <div class="list-group config-item">
                <a href="<?php echo base_url().'banners/banners/index';?>" class="list-group-item">
                    <i class="fa fa-picture-o" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading">Ảnh Slider</h4>
                    <p class="list-group-item-text">Quản lý các hình ảnh slider ngoài trang chủ</p>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="list-group config-item">
                <a href="<?php echo base_url().'advertisement/advertisement/index';?>" class="list-group-item">
                    <i class="fa fa-picture-o" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('advertisement'); ?></h4>
                    <p class="list-group-item-text">Các hình ảnh đối tác</p>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="list-group config-item">
                <a href="<?php echo base_url().'slider/slider/index';?>" class="list-group-item">
                    <i class="fa fa-picture-o" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading">Ảnh quảng cáo</h4>
                    <p class="list-group-item-text">Quản lý các hình ảnh quảng cáo</p>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="list-group config-item">
                <a href="<?php echo base_url().'branch/branch/index';?>" class="list-group-item">
                    <i class="fa fa-picture-o" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('branch'); ?></h4>
                    <p class="list-group-item-text">Địa chỉ các chi nhánh thuộc hệ thống</p>
                </a>
            </div>
        </div>
    </div>
      <!-- /.row -->
      <!-- Main row -->

    </section>
    <!-- /.content -->
  </div>