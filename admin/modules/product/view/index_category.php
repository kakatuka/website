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
                    <h2 class="header__main"><span class="breadcrumb hidden-xs"><i class="fa fa-cube"></i> </span><span class="title">Danh mục Tour</span></h2>
                    <div class="header-right">
                        <a class="btn btn-default background_orange" href="<?php echo base_url().'product/category/add';?>">Thêm <span class="hidden-xs">danh mục </span>mới</a>
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
                                    <a href="" class="filter-tab filter-tab-active show-all-items">Tất cả danh mục và địa điểm tour</a>
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
                                                            <li><a href="javascript:void(0)" id="del_list_category"><i class="fa fa-trash-o" aria-hidden="true"></i> &nbsp;<?php echo lang('delete');?></a></li>
                                                            <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if(preg_match("/,71,/",$_SESSION['permission_id'], $matches) || $_SESSION['id'] == $value['create_author'] || $_SESSION['group_id'] == '20'){
                                                            ?>
                                                            <li><a href="javascript:void(0)" id="unlock_category"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;<?php echo lang('private');?></a></li>
                                                            <li><a href="javascript:void(0)" id="lock_category"><i class="fa fa-unlock" aria-hidden="true"></i>&nbsp;<?php echo lang('public');?></a></li>
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

                                            <tr>

                                                <th class="select select-all not-select">
                                                    <span><input type="checkbox" class="js-no-dirty all-bulk-action" id="checkAll"></span>
                                                    <div class="bulk-actions  " style="display: none;left: 0">
                                                        <ul>
                                                            <li>
                                                                <span class="selection-count bulk-action-items-count" selected-bulk-action-items="0">
                                                                    <span class="hidden-xs">Đã chọn</span>
                                                                    <span class="display-bulk-action-items-count"></span> danh mục <span class="hidden-xs">tour</span>
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <span class="dropdown">
                                                                    <a class="btn btn-default btn-sm dropdown-toggle" id="chonthaotac" data-toggle="dropdown" onclick="event.stopPropagation();">
                                                                        Chọn thao tác
                                                                        <span class="caret"></span>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown_menu996 arrow-style" role="menu">
                                                                        <li><a class="perform-print-orders" href="javascript:void(0)" id="del_list_category">Xóa</a></li>
                                                                        <li class="break-top"></li>
                                                                        <li><a class="perform-archive-orders" href="javascript:void(0)" id="unlock_category">Riêng tư</a></li>
                                                                        <li><a class="perform-unarchive-orders" href="javascript:void(0)" id="lock_category"">Công khai</a></li>
                                                                    </ul>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </th>
                                                <!-- <th>ID sản phẩm</th> -->
                                                <th>ID</th>
                                                <th>Hình ảnh</th>
                                                <th>Địa điểm</th>
                                                <th>Loại tour</th>
                                                <th>Người tạo</th>
                                                <th style="text-align: center;">Thời gian tạo</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php 
                                         if (!empty($this->data['data'])) {
                                            foreach ($this->data['data'] as $key => $value) {
                                                    // dd($value);?>
                                                    <tr class="is-archived odd" role="row">
                                                        <td class="select checker">
                                                            <input type="checkbox" name="name_id[]" class="checkboxes" value="<?php echo $value['id'];?>">
                                                        </td>

                                                <!-- <td>
                                                   <a href="<?php echo base_url().'product/product/edit/'.$value['id'];?>"><?php echo $value['id'];?></a> 
                                               </td> -->
                                               <td>
                                                <a href="<?php echo base_url().'product/category/edit/'.$value['id'];?>"><?php echo $value['id'];?></a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url().'product/category/edit/'.$value['id'];?>">
                                                    <img src="<?php echo (isset($value['avatar']) && $value['avatar']!='') ? base_url_cloud().'timthumb.php?src='.base_url_cloud().'cdn/'.$value['avatar'].'&h=50&w=50&zc=2' : $_SESSION['base_url_cloud'].'timthumb.php?src='.$_SESSION['base_url_cloud'].'cdn/'.$this->data['settings'][0]['logo'].'&amp;h=50&amp;w=50&amp;zc=2'; ?>" class="img-thumbnail"/>
                                                </a>
                                            </td>
                                            <td><a href="<?php echo base_url().'product/category/edit/'.$value['id'];?>"><?php echo stripcslashes($value['title']);?></a></td>
                                            <?php
                                                    // dd($value['parent_id']);
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
                                            <td>
                                                <span class="label label-warning"><?php echo $value['username']; ?></span>
                                            </td>
                                            <td class="total" style="text-align: center;">
                                                <?php echo date('d-m-Y',$value['create_time']);?>
                                            </td>
                                            <td>
                                             <?php 
                                             if ($value['status']==1) {
                                                echo "  <span style='cursor:pointer'  class='label label-sm label-success cate' status ='0' id_status=".$value['id'].">Hiển thị trang chủ</span>";
                                            }else{
                                                echo "  <span style='cursor:pointer' class='label label-sm label-warning cate'status ='1' id_status=".$value['id'].">Lưu nháp</span>";
                                            }
                                            ?>
                                            <td colspan="" rowspan="" headers="">
                                                <a id="ok" href="<?php echo base_url()?>/product/category/edit/<?php echo $value['id']; ?>"><span class="fa fa-pencil"></span></a> 
                                                <a data-toggle="modal" data-target="#modelDelete" data-href="<?php echo base_url()?>/product/category/del/<?php echo $value['id'];?>" class=" btn-icon  deleteDialog tip"><span class="fa fa-trash-o"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
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
                                        <a href="" id="agree_del_all_category" class="btn btn-success"><?php echo lang('agree');?></a>
                                    </div>
                                </div>

                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div></div>
            <div class="modal fade" id="bizweb-modal"></div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
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