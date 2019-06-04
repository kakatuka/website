<div class="col_right">
<div class="content-wrapper">
<div class="page-heading page-heading-md">
                        <h2 class="header__main"><span class="breadcrumb hidden-xs"><i class="fa fa-address-book"></i> </span><span class="title">Nhóm người dùng</span></h2>
                        <div class="header-right">
                        <a class="btn background_orange"  href="<?php echo base_url().'users/grouppermission/edit' ?>"><i class="fa fa-plus-circle"></i> Thêm mới</a>
                     </div>
                    </div>
                    
  <!-- Main content -->
  <div class="content_col_right">
    <div class="container-fluid-md" style="margin-bottom:20px;margin-top: 50px;">
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <!-- Tabs within a box -->
         <!--  <ul class="nav nav-tabs">
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
              }else if(isset($this->data['flash_warning'])){
                  echo '<div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>'.lang('warning').'</strong> '.$this->data['flash_warning'].'
              </div>';
              }
              ?>

              <div id="datatables_filter" class="dataTables_filter">
                <div class="row">
                  <div class="col-lg-12" style="text-align: right;">
                  <?php
                    if ($_SESSION['group_id'] == '22' || $_SESSION['group_id'] == '20') {
                      ?>
                     
                      <?php
                    }
                   ?>
                    

                    <!-- Single button -->
                    <!-- <div class="btn-group">
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo lang('action');?> <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)" id="del_list_permission"><i class="fa fa-trash-o" aria-hidden="true"></i> &nbsp;<?php echo lang('delete');?></a></li>

                      </ul>
                    </div> -->


                  </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->                                        
              </div>
              </br>
              <!-- Table -->
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr role="row">
                    <th class="table-checkbox no-sort no-search sorting_disabled" rowspan="1" colspan="1" aria-label=" " style="width: 44px;">
                      <div class="checker"><span class="">
                        <input type="checkbox" id="checkboxAll">
                      </span></div>
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" aria-label="Username: orderby asc" style="width: 77px;">
                      <a href=""><?php echo lang('username');?></a>
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" aria-label="Status: orderby asc" style="width: 52px;">
                      <?php echo lang('status');?>
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" aria-label="Created At: orderby asc" style="width: 81px;">
                      <?php echo lang('created_time');?>
                    </th>
                    <th class="no-sort no-search sorting_disabled" rowspan="1" colspan="1" aria-label="Operations" style="width: 92px;">
                      <?php echo lang('operations');?>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if (isset($this->data['users'])) {
                      foreach ($this->data['users'] as $key => $value) {  ?>
                      <tr role="row" class="odd">
                        <td>
                          <div class="checker"><span>
                            <input type="checkbox" name="name_id[]" class="checkboxes" value="<?php echo $value['id'];?>">
                          </span></div>
                        </td>
                        <td>
                          <?php echo $value['name'];?>
                        </td>
                        <td>
                          <?php 
                          if ($value['status']!=0) { 
                            echo '<i class="fa fa-check text-success"></i>';
                          }else{
                            echo '<i class="fa fa-times-circle-o" style="color: #dd4b39;"></i>';
                          }
                          ?>
                        </td>
                        <td>
                          <?php echo date('h:i:s d/m/Y',$value['create_time']);?>
                        </td>


                        <td>
                          <?php if(preg_match("/,61,/",$_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20' || $_SESSION['id'] == $value['author_create']){ ?>
                            <a href="<?php echo base_url().'users/grouppermission/edit/'.$value['id'];?>" class="btn btn-icon btn-primary tip" data-original-title="Edit"><i class="fa fa-eye"></i></a>&nbsp;<a data-toggle="modal" data-target="#modelDelete" data-href="<?php echo base_url().'users/grouppermission/del/'.$value['id'];?>" class="btn btn-icon btn-danger deleteDialog tip"><i class="fa fa-trash-o"></i></a>
                            <?php } ?>
                        </td>
                      </tr>
                  <?php } } ?>
                </tbody>
              </table>
              <!-- End Table -->
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
              <!-- End Modal -->
              <!-- Modal -->
              <div id="modelDeleteAll_group_permission" class="modal fade" role="dialog">
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
              <!-- End Modal -->
            </div>
            </div>
          </div>
  </div>
</div>
</div>
<!-- /.row -->
<!-- Main row -->

</section>
</div>
</div>
<!-- /.content -->
</div>
</div>