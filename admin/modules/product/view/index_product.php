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
                        <h2 class="header__main"><span class="breadcrumb hidden-xs"><i class="fa fa-cubes"></i> </span><span class="title">Danh sách tour</span></h2>
                        <div class="header-right">
                            <a class="btn btn-default background_orange" href="<?php echo base_url().'product/product/add';?>">Thêm <span class="hidden-xs">tour </span>mới</a>
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
                                        <a href="" class="filter-tab filter-tab-active show-all-items">Tất cả phiếu giao hàng</a>
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
                                                                <li><a href="javascript:void(0)" id="del_list_product"><i class="fa fa-trash-o" aria-hidden="true"></i> &nbsp;<?php echo lang('delete');?></a></li>
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

                                                <tr>

                                                    <th class="select select-all not-select">
                                                        <span><input type="checkbox" class="js-no-dirty all-bulk-action" id="checkAll"></span>
                                                        <div class="bulk-actions  " style="display: none;left: 0">
                                                            <ul>
                                                                <li>
                                                                    <span class="selection-count bulk-action-items-count" selected-bulk-action-items="0">
                                                                        <span class="hidden-xs">Đã chọn</span>
                                                                        <span class="display-bulk-action-items-count"></span> phiếu <span class="hidden-xs">giao hàng</span>
                                                                    </span>
                                                                </li>
                                                                <li>
                                                                    <span class="dropdown">
                                                                        <a class="btn btn-default btn-sm dropdown-toggle" id="chonthaotac" data-toggle="dropdown" onclick="event.stopPropagation();">
                                                                            Chọn thao tác
                                                                            <span class="caret"></span>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown_menu996 arrow-style" role="menu">
                                                                            <li><a class="perform-print-orders" href="javascript:void(0)" id="del_list_product">Xóa</a></li>
                                                                            <li class="break-top"></li>
                                                                            <li><a class="perform-archive-orders" href="javascript:void(0)" id="unlock_product">Riêng tư</a></li>
                                                                            <li><a class="perform-unarchive-orders" href="javascript:void(0)" id="lock_product"">Công khai</a></li>
                                                                        </ul>
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </th>
                                                    <th style="text-align: center;">Ảnh</th>
                                                    <th style="text-align: center;">Tên tour</th>
                                                    <!-- <th style="text-align: center;">Giá </th> -->
                                                    <th style="text-align: center;">Danh Mục</th>
                                                    <th style="text-align: center;">Người tạo</th>
                                                    <th style="text-align: center;">Thời gian </th>
                                                    <th style="text-align: center;">Trạng thái</th>
                                                    <th style="text-align: center;">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php 
                                               if (!empty($this->data['data'])) {
                                                foreach ($this->data['data'] as $key => $value) {
                                                    // dd($value);?>
                                                    <tr class="is-archived odd" role="row" style="text-align: center;">
                                                        <td class="select checker">
                                                            <input type="checkbox" name="name_id[]" class="checkboxes" value="<?php echo $value['id'];?>">
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url().'product/product/edit/'.$value['id'];?>">
                                                                <img src="<?php echo (isset($value['image']) && $value['image']!='') ? base_url_cloud().'timthumb.php?src='.base_url_cloud().'cdn/'.$value['image'].'&h=50&w=50&zc=2' : base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url().'tmp/public/images/img.png&h=50&w=50&zc=2'; ?>" class="img-thumbnail"/>
                                                            </a>
                                                        </td>
                                                        <td><a href="<?php echo base_url().'product/product/edit/'.$value['id'];?>"><?php echo stripcslashes($value['name']);?></a></td>
                                                       <!--  <td><span><?php if ($value['price']> 0) {
                                                            echo number_format($value['price']);
                                                        }else{
                                                             echo "0 VNĐ";
                                                        } ?></span>
                                                      </td> -->
                                                        <td>
                                                            <?php if($value['category']!="" && isset($value['category'])){
                                                                foreach ($this->data['cate'] as $key1 => $value1) {
                                                                    if (preg_match('/,'.$value1['id'].',/',$value['category'],$matches)) {   
                                                                        ?>

                                                                        <?php echo $value1['title']."</br>"; ?>

                                                                        <?php
                                                                    }
                                                                }
                                                            }else{
                                                                echo "<p style='color: red'>Không</p>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <span class="label label-warning"><?php echo $value['username']; ?></span>
                                                        </td>
                                                        <td class="total" style="text-align: center;">
                                                            <?php echo date('d-m-Y',$value['create_time']);?>
                                                        </td>
                                                         <td class="total" style="text-align: center;">
                                                            <?php 
                                                                if ($value['status']==1) {
                                                                    echo "  <span style='cursor:pointer'  class='label label-sm label-success toan' status ='0' id_status=".$value['id'].">Hiển thị</span>";
                                                                }else{
                                                                    echo "  <span style='cursor:pointer' class='label label-sm label-warning toan'status ='1' id_status=".$value['id'].">Lưu nháp</span>";
                                                                }
                                                             ?>
                                                         
                                                        </td>
                                                        <td colspan="" rowspan="" headers="">
                                                            <a id="ok" data-id ="<?php echo $value['id'];?>" href="<?php echo base_url()?>/product/product/edit/<?php echo $value['id']; ?>"><span class="fa fa-pencil edit"></span></a> 
                                                            <a data-toggle="modal" data-target="#modelDelete" data-href="<?php echo base_url()?>/product/product/del/<?php echo $value['id'];          ?>" class=" btn-icon  deleteDialog tip"><span class="fa fa-trash-o"></span>
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
                                                    <a href="" id="agree_del_all_product" class="btn btn-success"><?php echo lang('agree');?></a>
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