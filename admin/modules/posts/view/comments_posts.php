<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
            <li class="active"><?php echo lang('contact'); ?></li>
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
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs">
                    <li class="active" style="width: 100%;"><a href="#revenue-chart" data-toggle="tab" aria-expanded="true"></a></li>
                </ul>
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
                                          </div><!-- /.col-lg-6 -->
                                          <div class="col-lg-4"></div>
                                          <div class="col-lg-4" style="text-align: right;">
                                            <!-- Single button -->
                                            <div class="btn-group">
                                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php echo lang('action');?> <span class="caret"></span>
                                              </button>
                                              <ul class="dropdown-menu">
                                                <li><a href="javascript:void(0)" id="del_list_comment"><i class="fa fa-trash-o" aria-hidden="true"></i> &nbsp;<?php echo lang('delete');?></a></li>
                                                <li><a href="javascript:void(0)" id="lock_comment"><i class="fa fa-unlock" aria-hidden="true"></i>&nbsp;<?php echo lang('public');?></a></li>
                                                <li><a href="javascript:void(0)" id="unlock_comment"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;<?php echo lang('private');?></a></li>
                                              </ul>
                                            </div>


                                          </div><!-- /.col-lg-6 -->


                                        </div><!-- /.row -->                                        
                                    </div>


                                    </br>
                                    <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr role="row">
                                                    <th class="table-checkbox no-sort no-search sorting_disabled" rowspan="1" colspan="1" aria-label="
                                                                    
                                                                " style="width: 44px;">
                                                        <div class="checker"><span class="">
                                                            <input type="checkbox" id="checkboxAll">
                                                        </span></div>
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" aria-label="ID: orderby asc" style="width: 50px;">
                                                        <a href="#"><?php echo lang('id');?></a>
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" aria-label="Role: orderby asc" style="width: 188px;"><?php echo lang('username');?></th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" aria-label="
                                                                     Status
                                                                : orderby asc" style="width: 52px;">
                                                        <?php echo lang('status');?>
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" aria-label="
                                                                     Created At
                                                                : orderby asc" style="width: 81px;">
                                                        <?php echo lang('created_time');?>
                                                    </th>
                                                    <th class="no-sort no-search sorting_disabled" rowspan="1" colspan="1" aria-label="
                                                                    Operations
                                                                " style="width: 92px;">
                                                        <?php echo lang('operations');?>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php 
                                                if (!empty($this->data['data'])) {
                                                    foreach ($this->data['data'] as $key => $value) { ?>
                                                              <!-- Modal VIEW -->
                                                              <div id="modelView<?php echo $value['id']; ?>" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">

                                                                  <!-- Modal content-->
                                                                  <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                      <h4 class="modal-title"><?php echo lang('detail'); ?></h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                      <p> <label><?php echo lang('fullname');?>   : </label> <?php echo $value['username']; ?></p>
                                                                      <p> <label><?php echo lang('time');?>    : </label> <?php echo date('H:i:s d/m/Y',$value['create_time']); ?></p>
                                                                      <p> <label><?php echo lang('email');?>      : </label> <?php echo $value['email']; ?></p>
                                                                      <p> <label><?php echo lang('content');?>    : </label> <?php echo $value['content']; ?></p>
                                                                      <p> <label><?php echo lang('link');?>    : </label> <a target="_blank" href="<?php echo replaceAdmin(base_url()).$value['alias'].'-n'.$value['id_posts'].'.htm';?>"><?php echo $value['title'];?></a></p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                      <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo lang('cancel');?></button>
                                                                    </div>
                                                                  </div>

                                                                </div>
                                                              </div>
                                                              <!--END Modal VIEW -->

                                                        <tr role="row" class="odd">
                                                            <td>
                                                                <div class="checker"><span>
                                                                <input type="checkbox" name="name_id[]" class="checkboxes" value="<?php echo $value['id'];?>">
                                                                </span></div>
                                                            </td>
                                                            <td><?php echo $value['id'];?></td>
                                                            <td><?php echo $value['username']; ?></td>
                                                            <td>

                                                                <?php 
                                                                if ($value['status']!=0) { 
                                                                    echo '<i class="fa fa-check text-success"></i>';
                                                                }else{
                                                                    echo '<i class="fa fa-times-circle-o" style="color: #dd4b39;"></i>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo date('H:m:s d-m-Y',$value['create_time']);?></td>
                                                            <td><a data-toggle="modal" data-target="#modelView<?php echo $value['id']; ?>" class="btn btn-icon btn-primary tip"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;<a data-toggle="modal" data-target="#modelDelete" data-href="<?php echo base_url().'posts/comments_posts/del/'.$value['id'];?>" class="btn btn-icon btn-danger deleteDialog tip"><i class="fa fa-trash-o"></i></a></td>
                                                        </tr>
                                                <?php 
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>

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
                                    <a href="javascript:void(0)" id="agree_del_all_comment" class="btn btn-success"><?php echo lang('agree');?></a>
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

<div class="loading"></div>
<div class="fade_loading"></div>