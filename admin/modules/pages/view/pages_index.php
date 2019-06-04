<style type="text/css">
    .fa-pencil,.fa-trash-o{
    cursor: pointer;
    border: 1px solid #fefcfc;
    padding: 5px;
    border-radius: 4px;
    background: #F05A28;
    color: white;
    }
</style>
<div class="content-wrapper">
 <div class="page-heading page-heading-md">
  <h2 class="header__main"><span class="breadcrumb hidden-xs"><i class="fa fa-file-image-o"></i> </span><span class="title">Danh sách trang tĩnh</span></h2>
  <div class="header-right">
    <a class="btn background_orange" href="<?php echo base_url().'pages/pages/add';?>"><i class="fa fa-plus-circle"></i> <?php echo lang('add_pages');?></a>
  </div>
</div>
<!-- Main content -->
<div class="col_right">
 <div class="content_col_right">
  <div class="container-fluid-md" style="margin-bottom:20px;margin-top: 50px;">
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
                <!-- <ul class="nav nav-tabs">
                    <li class="active" style="width: 100%;"><a href="#revenue-chart" data-toggle="tab" aria-expanded="true"></a></li>
                  </ul> -->
                  <div class="tab-content no-padding">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative;min-height: 700px;">
                     <div class="col-xs-12">
                      <?php 
                      if (isset($this->data['flash_success'])) {
                        echo '<div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>'.lang('success').'</strong> '.$this->data['flash_success'].'
                        </div>';
                      }
                      ?>


                      <div id="datatables_filter" class="dataTables_filter">
                        <div class="row">
                          <div class="col-lg-4">
                                            <!-- <div class="input-group">
                                              <input type="text" class="form-control search_users" placeholder="Search for..." value="<?php if(isset($this->data['s'])) echo $this->data['s'];?>">
                                              <span class="input-group-btn">
                                                <button class="btn btn-primary search_button_users" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                              </span>
                                            </div> --><!-- /input-group -->
                                          </div><!-- /.col-lg-6 -->
                                          <div class="col-lg-4"></div>
                                          <div class="col-lg-4" style="text-align: right;">



                                            <!-- Single button -->
                                            <!-- <div class="btn-group">
                                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php echo lang('action');?> <span class="caret"></span>
                                              </button>
                                              <ul class="dropdown-menu">
                                                <li><a href="javascript:void(0)" id="del_list_user"><i class="fa fa-trash-o" aria-hidden="true"></i> &nbsp;<?php echo lang('delete');?></a></li>
                                                <li><a href="javascript:void(0)" id="lock_user"><i class="fa fa-unlock" aria-hidden="true"></i>&nbsp;<?php echo lang('public');?></a></li>
                                                <li><a href="javascript:void(0)" id="unlock_user"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;<?php echo lang('private');?></a></li>
                                              </ul>
                                            </div> -->


                                          </div><!-- /.col-lg-6 -->


                                        </div><!-- /.row -->                                        
                                      </div>


                                    </br>
                                    <!-- <table id="datatable" class="table table-striped table-bordered"> -->
                                      <table class="table table-hover vert-align order-list" id="datatable">
                                        <thead>

                                          <tr>

                                            <th class="select select-all not-select">
                                              <span><input type="checkbox" class="js-no-dirty all-bulk-action" id="checkAll"></span>
                                              <div class="bulk-actions  " style="display: none;left: 0">
                                                <ul>
                                                  <li>
                                                    <span class="selection-count bulk-action-items-count" selected-bulk-action-items="0">
                                                      <span class="hidden-xs">Đã chọn</span>
                                                      <span class="display-bulk-action-items-count"></span> bản <span class="hidden-xs">ghi</span>
                                                    </span>
                                                  </li>
                                                  <li>
                                                    <span class="dropdown">
                                                      <a class="btn btn-default btn-sm dropdown-toggle" id="chonthaotac" data-toggle="dropdown" onclick="event.stopPropagation();">
                                                        Chọn thao tác
                                                        <span class="caret"></span>
                                                      </a>
                                                      <ul class="dropdown-menu dropdown_menu996 arrow-style" role="menu">
                                                        <?php if(preg_match("/,62,/",$_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20'){ ?>
                                                        <li><a class="perform-print-orders" href="javascript:void(0)" id="del_list_user">Xóa</a></li>
                                                        <?php } ?>
                                                        <li class="break-top"></li>
                                                        <?php if(preg_match("/,61,/",$_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20'){ ?>
                                                        <li><a class="perform-archive-orders" href="javascript:void(0)" id="unlock_user">Riêng tư</a></li>
                                                        <li><a class="perform-unarchive-orders" href="javascript:void(0)" id="lock_user"">Công khai</a></li>
                                                        <?php } ?>
                                                      </ul>
                                                    </span>
                                                  </li>
                                                </ul>
                                              </div>
                                            </th>
                                            <!-- <th>ID sản phẩm</th> -->
                                            <th style="text-align: center;">ID</th>
                                            <th style="text-align: center;">Hình ảnh</th>
                                            <th style="text-align: center;">Tên trang tĩnh</th>
                                            <th style="text-align: center;">Đường dẫn</th>
                                            <th style="text-align: center;">Người tạo</th>
                                            <th style="text-align: center;">Thời gian tạo </th>
                                            <th style="text-align: center;">Trạng thái</th>
                                            <th style="text-align: center;">Thao tác </th>   
                                          </tr>
                                        </thead>
                                        <tbody>

                                          <?php 
                                          if (!empty($this->data['data'])) {
                                                  // dd($this->data['data']);
                                            foreach ($this->data['data'] as $key => $value) { ?>
                                            <tr role="row" class="odd" style="text-align: center;">
                                              <td>
                                                <div class="checker"><span>
                                                  <input type="checkbox" name="name_id[]" class="checkboxes" value="<?php echo $value['id'];?>">
                                                </span></div>
                                              </td>
                                              <td><?php echo $value['id'];?></td>
                                              <td>
                                                <a href="<?php echo base_url().'pages/pages/edit/'.$value['id'];?>">
                                                  <img src="<?php echo (isset($value['thumbnail']) && $value['thumbnail']!='') ? base_url_cloud().'timthumb.php?src='.base_url_cloud().'cdn/'.$value['thumbnail'].'&h=50&w=50&zc=2' : base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url().'tmp/public/images/img.png&h=50&w=50&zc=2'; ?>" class="img-thumbnail"/>
                                                </a>
                                              </td>
                                              <td class="sorting_1">
                                                <a href="<?php echo base_url().'pages/pages/edit/'.$value['id'];?>"><?php echo $value['title'];?></a>
                                              </td>
                                              <td><a href="<?php echo base_url_fontend().$value['old_url'].'.htm'; ?>" target="_blank"><?php echo $value['old_url'].'.htm'; ?></a></td>
                                              <td><span class="label label-warning"><?php echo $value['username']; ?></span></td>
                                              <td><?php echo date('d-m-Y',$value['create_time']);?></td>
                                              <td><?php 
                                                if ($value['status']==1) {
                                                    echo "  <span  class='label label-sm label-success toan' status ='0' id_status=".$value['id'].">Hiển thị </span>";
                                                }else{
                                                    echo "  <span  class='label label-sm label-warning toan'status ='1' id_status=".$value['id'].">Lưu nháp</span>";
                                                }
                                             ?>
                                            </td>
                                            <td>
                                                <a id="ok" href="<?php echo base_url()?>/pages/pages/edit/<?php echo $value['id']; ?>"><span class="fa fa-pencil"></span></a> 
                                                <a data-toggle="modal" data-target="#modelDelete" data-href="<?php echo base_url()?>/pages/pages/del/<?php echo $value['id'];?>" class=" btn-icon  deleteDialog tip"><span class="fa fa-trash-o"></span>
                                                </a>
                                            </td>
                                          </tr>
                                          <?php 
                                        }
                                      }
                                      ?>
                                    </tbody>
                                  </table>
                                  <?php 
                                  if (empty($this->data['data'])) {
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
                                                  <select class="form-control roles-list" name="role"><option value="1">Administrator</option><option value="2">Member</option></select>
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
                                                                <label>Message:</label>
                                                                <textarea class="form-control" name="message" cols="50" rows="10"></textarea>
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