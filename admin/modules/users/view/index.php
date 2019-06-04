<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
						<li><a href="<?php echo base_url().'home/home/index'; ?>"><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
						<li class="active"><?php echo lang('administrator'); ?></li>
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
                <a href="<?php echo base_url().'users/grouppermission/index';?>" class="list-group-item">
                    <i class="fa fa-users" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('roles_group_permissions');?></h4>
                    <p class="list-group-item-text"><?php echo lang('manage_group_permissions');?></p>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="list-group config-item">
                <a href="<?php echo base_url().'users/permission/index';?>" class="list-group-item">
                    <i class="fa fa-user-secret" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('roles_permissions');?></h4>
                    <p class="list-group-item-text"><?php echo lang('manage_roles');?></p>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="list-group config-item">
                <a href="<?php echo base_url().'users/manager/index';?>" class="list-group-item">
                    <i class="fa fa-address-card" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('user_manager');?></h4>
                    <p class="list-group-item-text"><?php echo lang('manage_team_users');?></p>
                </a>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="list-group config-item">
                <a href="" class="list-group-item">
                    <i class="fa fa-flag-o" aria-hidden="true" style="font-size: 40px;float: left;margin-right:20px;"></i>
                    <h4 class="list-group-item-heading"><?php echo lang('roles_permissions');?></h4>
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