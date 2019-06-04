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
  <!-- Content Header (Page header) -->
  <!--   <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
						<li><a href="<?php echo base_url().'home/home/index'; ?>"><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
            <li><a href="<?php echo base_url().'posts/managerindex/index'; ?>"><?php echo lang('post'); ?></a></li>
            <li><a href="javascript:void(0)"><?php echo lang('categories'); ?></a></li>
			</ol>

        </div>
        <div class="pull-right">
            <a class="btn-main with-icon" data-toggle="modal" data-target="#widget_manager" href="#"></a>
        </div>
        <div class="clearfix"></div>
    </div>
  </section> -->
  <div class="page-heading page-heading-md">
    <h2 class="header__main"><span class="breadcrumb hidden-xs"><i class="fa fa-tasks"></i> </span><span class="title">Danh mục bài viết</span></h2>
    <div class="header-right">
      <a class="btn background_orange" href="<?php echo base_url().'posts/categories/add';?>"><i class="fa fa-plus-circle"></i> <?php echo lang('add_category');?></a>
    </div>
  </div>
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
  <div class="col_right">
   <div class="content_col_right">
    <div class="container-fluid-md" style="margin-bottom:20px;margin-top: 50px;">
      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <div class="nav-tabs-custom">
              <!-- Tabs within a box -->
              <!--   <ul class="nav nav-tabs">
                    <li class="active" style="width: 100%;"><a href="#revenue-chart" data-toggle="tab" aria-expanded="true"></a></li>
                  </ul> -->
                  <div class="tab-content no-padding">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative;min-height: 700px;">
                     <div class="col-xs-12">
                      <div id="datatables_filter" class="dataTables_filter">
                        <div class="row">
                          <div class="col-lg-4">
                                            <!-- <div class="input-group">
                                              <input type="text" class="form-control search_categories" placeholder="Search for..." value="<?php if(isset($this->data['s'])) echo $this->data['s'];?>">
                                              <span class="input-group-btn">
                                                <button class="btn btn-primary search_button_categories" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                              </span>
                                            </div> --><!-- /input-group -->
                                          </div><!-- /.col-lg-6 -->
                                          <div class="col-lg-4"></div>
                                          <div class="col-lg-4" style="text-align: right;">
                                            <!-- <a class="btn btn-success" href="<?php echo base_url().'posts/categories/add';?>"><i class="fa fa-plus-circle"></i> <?php echo lang('add_category');?></a> -->

                                            <!-- Single button -->
                                           <!--  <div class="btn-group">
                                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php echo lang('action');?> <span class="caret"></span>
                                              </button>
                                              <ul class="dropdown-menu">
                                                <?php if(preg_match("/,94,/",$_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20'){ ?>
                                                <li><a href="javascript:void(0)" id="del_list_categories"><i class="fa fa-trash-o" aria-hidden="true"></i> &nbsp;<?php echo lang('delete');?></a></li>
                                                <?php } ?>
                                                <?php if(preg_match("/,93,/",$_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20'){ ?>
                                                <li><a href="javascript:void(0)" id="unlock_categories"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;<?php echo lang('private');?></a></li>
                                                <li><a href="javascript:void(0)" id="lock_categories"><i class="fa fa-unlock" aria-hidden="true"></i>&nbsp;<?php echo lang('public');?></a></li>
                                                <?php } ?>
                                              </ul>
                                            </div> -->


                                          </div><!-- /.col-lg-6 -->


                                        </div><!-- /.row -->                                        
                                      </div>


                                    </br>
                                    <table class="table table-hover vert-align order-list" id="datatable">
                                      <thead>
                                        <tr role="row">
                                                    <!-- <th class="table-checkbox no-sort no-search sorting_disabled" rowspan="1" colspan="1" aria-label="
                                                                    
                                                                " style="width: 44px;">
                                                        <div class="checker"><span class="">
                                                            <input type="checkbox" id="checkboxAll">
                                                        </span></div>
                                                    </th>
                                                  -->
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
                                                             <?php if(preg_match("/,94,/",$_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20'){ ?>
                                                             <li><a class="perform-print-orders" href="javascript:void(0)" id="del_list_categories">Xóa</a></li>
                                                             <?php } ?>
                                                             <li class="break-top"></li>
                                                             <?php if(preg_match("/,93,/",$_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20'){ ?>
                                                             <li><a class="perform-archive-orders" href="javascript:void(0)" id="lock_categories">Riêng tư</a></li>
                                                             <li><a class="perform-unarchive-orders" href="javascript:void(0)" id="unlock_categories">Công khai</a></li>
                                                             <?php } ?>
                                                           </ul>
                                                         </span>
                                                       </li>
                                                     </ul>
                                                   </div>
                                                 </th>
                                                 <th><?php echo lang('id');?></th>
                                                 <th><?php echo lang('thumbnail');?></th>
                                                 <th><?php echo lang('title');?></th>
                                                 <th>Tên của danh mục cha</th>
                                                 <th><?php echo lang('author');?></th>
                                                 <th><?php echo lang('created_time');?></th>
                                                 <th><?php echo lang('status');?></th>
                                                 <th>Thao tác</th>
                                                    <!-- <th class="no-sort no-search sorting_disabled" rowspan="1" colspan="1" aria-label="
                                                                    Operations
                                                                " style="width: 92px;">
                                                        <?php echo lang('operations');?>
                                                      </th> -->
                                                    </tr>
                                                  </thead>
                                                  <tbody>

                                                    <?php 
                                                    if (!empty($this->data['data'])) {
                                                      foreach ($this->data['data'] as $key => $value) { ?>
                                                      <tr role="row" class="odd">
                                                        <td>
                                                          <div class="checker"><span>
                                                            <input type="checkbox" name="name_id[]" class="checkboxes" value="<?php echo $value['id'];?>">
                                                          </span></div>
                                                        </td>
                                                        <td>
                                                          <a href="<?php echo base_url().'posts/categories/edit/'.$value['id'];?>">
                                                            <?php echo $value['id'];?>
                                                          </a>
                                                        </td>
                                                        <td>
                                                          <a href="<?php echo base_url().'posts/categories/edit/'.$value['id'];?>">
                                                            <img src="<?php echo (isset($value['thumbnail']) && $value['thumbnail']!='') ? base_url_cloud().'timthumb.php?src='.base_url_cloud().'cdn/'.$value['thumbnail'].'&h=80&w=80&zc=2' : base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url().'tmp/public/images/img.png&h=80&w=80&zc=2'; ?>" width="80" height="80" class="img-thumbnail"/>
                                                          </a>
                                                        </td>
                                                        <td class="sorting_1">
                                                          <a href="<?php echo base_url().'posts/categories/edit/'.$value['id'];?>">
                                                            <?php echo $value['title'];?>
                                                          </a>
                                                        </td>
                                                        <?php
                                                    // dd($value['parent_id']);
                                                    // 
                                                        if($value['parent_id']!="" && isset($value['parent_id'])){
                                                          foreach ($this->data['data'] as $key1 => $value1) {
                                                            if ($value1['id']==$value['parent_id']) {   
                                                              ?>
                                                              <td>

                                                                <?php

                                                                echo $value1['title']; ?>
                                                              </td>
                                                              <?php
                                                            }
                                                          }
                                                        }else{
                                                          echo "<td><i class='fa fa-folder-open' aria-hidden='true'>&nbsp Danh mục gốc</i></td>";
                                                        }
                                                        ?>
                                                        <td><span class="label label-warning"><?php echo $value['username']; ?></span></td>
                                                        <td><?php echo date('d-m-Y',$value['create_time']);?></td>
                                                          <td>
                                                            <?php 
                                                            if ($value['status']==1) {
                                                                echo "  <span style='cursor:pointer'  class='label label-sm label-success cate' status ='0' id_status=".$value['id'].">Hiển thị trang chủ</span>";
                                                                    }else{
                                                                echo "  <span style='cursor:pointer' class='label label-sm label-warning cate'status ='1' id_status=".$value['id'].">Lưu nháp</span>";
                                                                }
                                                            ?>
                                                          </td>
                                                          <td>
                                                            <a id="ok" href="<?php echo base_url()?>/posts/categories/edit/<?php echo $value['id']; ?>"><span class="fa fa-pencil"></span></a>
                                                            <?php if($value['id'] != 20){
                                                              ?>
                                                              <a data-toggle="modal" data-target="#modelDelete" data-href="<?php echo base_url()?>/posts/categories/del/<?php echo $value['id'];      ?>" class=" btn-icon  deleteDialog tip"><span class="fa fa-trash-o"></span>
                                                              </a>
                                                              <?php
                                                            }
                                                            ?> 
                                                            
                                                         </td>
                                                            <!-- <td>
                                                            <?php if(preg_match("/,93,/",$_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20' || $_SESSION['id'] == $value['author_create']){ ?>
                                                              <a href="<?php echo base_url().'posts/categories/edit/'.$value['id'];?>" class="btn btn-icon btn-primary tip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i><i class="fa fa-eye"></i></a>&nbsp;
                                                            <?php } ?>
                                                            <?php if(preg_match("/,94,/",$_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20' || $_SESSION['id'] == $value['author_create']){ ?>
                                                              <a data-toggle="modal" data-target="#modelDelete" data-href="<?php echo base_url().'posts/categories/del/'.$value['id'];?>" class="btn btn-icon btn-danger deleteDialog tip"><i class="fa fa-trash-o"></i></a>
                                                              <?php } ?>
                                                            </td> -->
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
                                                          <a href="" id="agree_del_all_categories" class="btn btn-success"><?php echo lang('agree');?></a>
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
                                      <!-- /.row -->
                                      <!-- Main row -->
                                    </section>
                                  </div>
                                </div>
                              </div>
                              <!-- /.content -->
                            </div>
<div id="modelDelete" class="modal fade" role="dialog">
      <div class="modal-dialog">
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