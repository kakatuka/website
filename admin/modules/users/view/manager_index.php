<div class="col_right">
    <div class="page-content clearfix">
        <div class="page-body">
            <div class="page-body-render" id="content">
                <style>
                    .dropdown-menu .break-top {
                        border-top: 1px solid #e6e6e6;
                        margin-top: 5px;
                        padding-top: 5px;
                    }
                </style>
                <div class="page-shipment">
                    <div class="page-heading page-heading-md">
                        <h2 class="header__main"><span class="breadcrumb hidden-xs"><i class="fa fa-user-o"></i> </span><span class="title">Quản lý người dùng</span></h2>
                        <div class="header-right">
                            <!-- <a class="btn btn-default background_orange" href="<?php echo base_url().'product/product/add';?>">Thêm <span class="hidden-xs">sản phẩm</span>mới</a> -->
                            <a class="btn background_orange" data-toggle="modal" role="button" href="#invite_modal"><i class="fa fa-plus-circle"></i> <?php echo lang('add_acc');?></a>
                        </div>
                    </div>
                    <div class="container-fluid-md notifications">
                        <div class="ajax-notification"><span class="ajax-notification-message"></span><a class="close-notification"><i class="fa fa-times"></i></a></div>
                    </div>
                    <div class="container-fluid-md">
                        <div class="panel panel-default has-bulk-actions">
                            <div class="filters">
                                <ul class="filter-tab-list" id="filter-tab-list">
                                    <li class="filter-tab-item">
                                        <a href="" class="filter-tab filter-tab-active show-all-items">Danh sách tài khoản</a>
                                    </li>
                                    <li class="dropdown-container" id="hidden-search" style="display: none">
                                        <a class="dropdown-toggle btn-hidden-search filter-tab" data-toggle="dropdown">
                                            Xem thêm
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu arrow-style dropdown-hidden-search pull-right padding-sm" id="dropdown-hidden-search">
                                            <li><a href="">Hủy giao hàng</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="shipments">
                                <div>
                                    <div class="panel-body bulk-action-context">
                                        <div class="table-responsive table--no-overflow">
                                            <div id="datatables_filter" class="dataTables_filter">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                    <!-- /input-group -->
                                                    </div><!-- /.col-lg-6 -->
                                                    <div class="col-lg-4"></div>
                                                    <div class="col-lg-4" style="text-align: right;margin-bottom: 10px;">
                                                        <!-- Single button -->
                                                        <div class="btn-group">

                                                            <ul class="dropdown-menu">
                                                                <?php
                                                                if(preg_match("/,71,/",$_SESSION['permission_id'], $matches) || $_SESSION['id'] == $value['create_author'] || $_SESSION['group_id'] == '20'){
                                                                    ?>
                                                                    <li><a href="javascript:void(0)" id="del_list_user"><i class="fa fa-trash-o" aria-hidden="true"></i> &nbsp;<?php echo lang('delete');?></a></li>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                if(preg_match("/,71,/",$_SESSION['permission_id'], $matches) || $_SESSION['id'] == $value['create_author'] || $_SESSION['group_id'] == '20'){
                                                                    ?>
                                                                    <li><a href="javascript:void(0)" id="unlock_product"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;<?php echo lang('private');?></a></li>
                                                                    <li><a href="javascript:void(0)" id="lock_product"><i class="fa fa-unlock" aria-hidden="true"></i>&nbsp;<?php echo lang('public');?></a></li>
                                                                    <?php 
                                                                }
                                                                ?>

                                                            </ul>
                                                        </div>


                                                    </div><!-- /.col-lg-6 -->


                                                </div><!-- /.row -->                                        
                                            </div>
                                            <table class="table table-hover vert-align order-list" id="datatable">
                                                <thead>
                                                    <tr style="text-align: center;">
                                                        <th class="select select-all not-select">
                                                            <span><input type="checkbox" class="js-no-dirty all-bulk-action" id="checkAll"></span>
                                                            <div class="bulk-actions  " style="display: none;left: 0">
                                                                <ul>
                                                                    <li>
                                                                        <span class="selection-count bulk-action-items-count" selected-bulk-action-items="0">
                                                                            <span class="hidden-xs">Đã chọn</span>
                                                                            <span class="display-bulk-action-items-count"></span> danh mục <span class="hidden-xs">sản phẩm</span>
                                                                        </span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="dropdown">
                                                                            <a class="btn btn-default btn-sm dropdown-toggle" id="chonthaotac" data-toggle="dropdown" onclick="event.stopPropagation();">
                                                                                Chọn thao tác
                                                                                <span class="caret"></span>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown_menu996 arrow-style" role="menu">
                                                                                <li><a class="perform-print-orders" href="javascript:void(0)" id="del_list_user">Xóa</a></li>
                                                                                <li class="break-top"></li>
                                                                                <li><a class="perform-archive-orders" href="javascript:void(0)" id="unlock_user">Riêng tư</a></li>
                                                                                <li><a class="perform-unarchive-orders" href="javascript:void(0)" id="lock_user"">Công khai</a></li>
                                                                            </ul>
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </th>
                                                        <!-- <th>ID sản phẩm</th> -->
                                                        <th style="text-align: center;">ID</th>
                                                        <th style="text-align: center;">Ảnh</th>
                                                        <th style="text-align: center;">Tên tài khoản</th>
                                                        <th style="text-align: center;">Hòm thư cá nhân</th>
                                                        <th style="text-align: center;">Quyền hạn</th>
                                                        <!-- <th style="text-align: center;">Trạng thái</th> -->
                                                        <th style="text-align: center;">Quê quán</th>
                                                        <th style="text-align: center;">Thời gian tạo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?php 
                                                   if (!empty($this->data['users'])) {
                                                    foreach ($this->data['users'] as $key => $value) {
                                                        // dd($value);?>
                                                        <tr class="is-archived odd" role="row" style="text-align: center;">
                                                            <td class="select checker">
                                                                <input type="checkbox" name="name_id[]" class="checkboxes" value="<?php echo $value['id'];?>">
                                                            </td>
                                                            
                                                            <td>
                                                                <a href="<?php echo base_url().'users/manager/view/'.$value['id'];?>"><?php echo $value['id'];?></a>
                                                            </td>

                                                            <td>
                                                                <a href="<?php echo base_url().'users/manager/view/'.$value['id'];?>"><img src="<?php echo (isset($value['avatar']) && $value['avatar']!='') ? base_url_cloud().'timthumb.php?src='.base_url_cloud().'cdn/'.$value['avatar'].'&h=50&w=50&zc=2' : base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url().'tmp/public/images/img.png&h=50&w=50&zc=2'; ?>" class="img-thumbnail"/></a>
                                                            </td>

                                                            <td>
                                                                <a href="<?php echo base_url().'users/manager/view/'.$value['id'];?>">
                                                                    <span class="label label-warning"><?php echo $value['username'];?></span>
                                                                </a>
                                                            </td>
                                                            <td><a href="<?php echo base_url().'users/manager/view/'.$value['id'];?>"><?php echo $value['email'];?></a></td>
                                                            
                                                            <td>
                                                                <a href="<?php echo base_url().'users/grouppermission/index'; ?>" class="editable editable-click">
                                                                    <?php 
                                                                    foreach ($this->data['getGroup_permission'] as $k => $v) {
                                                                        if($value['group_id'] == $v['id']){
                                                                            echo $v['name'];
                                                                        }
                                                                    }
                                                                    ?>
                                                                </a>
                                                            </td>

                                                            
                                                            <td>
                                                                <?php echo $value['address']; ?>
                                                            </td>
                                                            <td class="total" style="text-align: center;">
                                                                <?php echo date('d-m-Y',$value['create_time']);?>
                                                            </td>

                                                        </tr>
                                                    <?php }} ?>
                                                </tbody>
                                            </table>
                                                    <?php 
                                                    if (empty($this->data['users'])) {
                                                        echo '<div class="alert alert-warning alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>'.lang('notification').'</strong> '.lang('not_users').' </div>';
                                                    }
                                                    ?>
                                                         <!-- Modal -->
                                            <div id="modelDelete" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"><?php echo lang('notification'); ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?php echo lang('delete_messager');?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo lang('cancel');?></button>
                                                            <a href="" id="agree_del" class="btn btn-success"><?php echo lang('agree');?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                            <div id="modelDeleteAll" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"><?php echo lang('notification'); ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?php echo lang('delete_messager');?></p>
                                                        </div>  
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo lang('cancel');?></button>
                                                            <a href="" id="agree_del_all" class="btn btn-success"><?php echo lang('agree');?></a>
                                                        </div> 
                                                    </div>

                                                </div>
                                            </div>
                                            <div id="invite_modal" class="modal fade in" tabindex="-1" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title"><i class="icon-user-plus"></i> <?php echo lang('add_new_acc');?></h4>
                                                        </div>

                                                        <!-- Form inside modal -->
                                                        <form method="POST" id="form_add_user" username-error="" email-error="" accept-charset="UTF-8" role="form">
                                                            <div class="modal-body with-padding">
                                                                <p><?php echo lang('add_new_acc_p');?></p>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label><?php echo lang('username');?>(*):</label>
                                                                            <input class="form-control username" name="username" type="text">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label><?php echo lang('role');?>(*):</label>
                                                                            <select class="form-control roles-list" name="role">
                                                                                <?php foreach ($this->data['getGroup_permission'] as $key => $value) { ?>
                                                                                <option value="<?php echo $value['id']; ?>" <?php if($this->data['data_user']['group_id'] == $value['id']) echo "selected='selected'";?>><?php echo $value['name']; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label><?php echo lang('first_name');?>(*):</label>
                                                                            <input class="form-control first_name" name="first_name" type="text">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label><?php echo lang('last_name');?>(*):</label>
                                                                            <input class="form-control last_name" name="last_name" type="text">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label><?php echo lang('email');?>(*):</label>
                                                                            <input class="form-control email" name="email" type="text">


                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label><?php echo lang('address');?>(*):</label>
                                                                            <input class="form-control address" name="address" type="text">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label><?php echo lang('password');?>(*):</label>
                                                                            <input class="form-control password" name="password" type="password">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label><?php echo lang('re-password');?>(*):</label>
                                                                            <input class="form-control re-password" name="re-password" type="password">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <label>Đôi chút về bản thân:</label>
                                                                            <textarea class="form-control about" name="about" cols="50" rows="10"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo lang('cancel');?></button>
                                                                <button type="button" id="user_add" class="btn btn-success"><?php echo lang('add');?></button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="bizweb-modal"></div>
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