<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
			    <li><a href="<?php echo base_url().'home/home/index'; ?>"><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
                <li><a href="javascript:void(0)"><?php echo lang('post'); ?></a></li>
			</ol>

        </div>
        <div class="pull-right">
            <a class="btn-main with-icon" data-toggle="modal" data-target="#widget_manager" href="#"></a>
        </div>
        <div class="clearfix"></div>
    </div>
    </section> -->
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
                <a href="<?php echo base_url().'posts/categories/index';?>" class="list-group-item">
                    <i class="fa fa-tasks" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('categories');?></h4>
                    <p class="list-group-item-text"><?php echo lang('manage_roles');?></p>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="list-group config-item">
                <a href="<?php echo base_url().'posts/posts/index';?>" class="list-group-item">
                    <i class="fa fa-newspaper-o" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('all_posts');?></h4>
                    <p class="list-group-item-text"><?php echo lang('manage_team_users');?></p>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="list-group config-item">
                <a href="<?php echo base_url().'pages/pages/index'; ?>" class="list-group-item">
                    <i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('pages'); ?></h4>
                    <p class="list-group-item-text"><?php echo lang('manage_team_users');?></p>
                </a>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="list-group config-item">
                <a href="<?php echo base_url().'posts/manager/index';?>" class="list-group-item">
                    <i class="fa fa-cog fa-spin" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('manager_show_index');?></h4>
                    <p class="list-group-item-text">Cài đặt các bài viết được hiển thị ngoài trang chủ</p>
                </a>
            </div>
        </div> -->
        <!-- <div class="col-md-4">
            <div class="list-group config-item">
                <a href="<?php echo base_url().'manager/manager/index';?>" class="list-group-item">
                    <i class="fa fa-cog fa-spin" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('manager_show_index');?></h4>
                    <p class="list-group-item-text">Lấy ra trang chủ các bài viết mới nhất theo số lượng được chọn </p>
                </a>
            </div>
        </div> -->
        <!-- <div class="col-md-4">
            <div class="list-group config-item">
                <a href="<?php echo base_url().'posts/comments_posts/index';?>" class="list-group-item">
                    <i class="fa fa-comment" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('comments');?></h4>
                    <p class="list-group-item-text"><?php echo lang('manage_roles');?></p>
                </a>
            </div>
        </div> -->

    </div>
      <!-- /.row -->
      <!-- Main row -->

    </section>
    <!-- /.content -->
  </div>