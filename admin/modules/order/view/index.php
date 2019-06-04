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
            <h2 class="header__main"><span class="breadcrumb hidden-xs"><i class="fa fa-cart-arrow-down"></i> </span><span class="title">Danh sách khách đặt Tour</span></h2>
            <div class="header-right">
             <!--  <a class="btn btn-default" href="javascript:void(0)">Xuất <span class="hidden-xs">danh sách</span> vận đơn</a> -->
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
                    <a href="" class="filter-tab filter-tab-active show-all-items">Tất cả đơn hàng khách đặt</a>
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
                <!-- <div class="filter-container">
                  <div class="btn-group btn-group-filter next-field__connected-wrapper display_list_product">
                    <div class="next-field--connected--no-flex display_list_product_internal1">
                      <a class="btn btn-default dropdown-toggle btn-filter" id="dropdown_display_listproduct">
                        Điều kiện lọc
                        <span class="caret"></span>
                      </a>
                      <div class="dropdown-menu arrow-style dropdown-filter" id="dropdown_display_listproduct_internal" style="margin-top: 0">
                        <div class="arrow"></div>
                        <div class="filters">
                          <label class="filter-title">Hiển thị phiếu giao hàng theo:</label>
                          <div class="filter-content">
                            <select class="form-control form-selectboxit" id="filter-conditions">
                              <option value="">Chọn điều kiện lọc...</option>
                              <option value="" id="select1">Trạng thái</option>
                              <option value="" id="select2">Trạng thái thu hộ</option>
                              <option value="" id="select3">Trạng thái giao hàng</option>
                              <option value="" id="select4">Ngày tạo</option>
                              <option value="" id="select5">Đã được tag với</option>
                            </select>
                            <div class="inline filter-choose1 " style="display: none">
                              <select class="form-control form-selectboxit filter-select">
                                <option value="">Chọn điều kiện lọc...</option>
                                <option value="">Mở</option>
                                <option value="">Lưu trữ</option>
                                <option value="">Hủy</option>
                              </select>
                              <input type="button" class="btn btn-default add-filter filtering-complete" value="Lọc">
                            </div>
                            <div class="inline filter-choose2 " style="display: none">
                              <select class="form-control form-selectboxit filter-select">
                                <option value="">Chọn điều kiện lọc...</option>
                                <option value="pending">Chưa thu tiền</option>
                                <option value="paid">Đã thu tiền</option>
                                <option value="received">Đã nhận tiền</option>
                                <option value="have">Có thu hộ</option>
                                <option value="none">Không thu hộ</option>
                              </select>
                              <input type="button" class="btn btn-default add-filter filtering-complete" value="Lọc">
                            </div>
                            <div class="inline filter-choose3 " style="display: none">
                              <select class="form-control form-selectboxit filter-select">
                                <option value="">Chọn điều kiện lọc...</option>
                                <option value="pending">Chờ lấy hàng</option>
                                <option value="delivering">Đang giao hàng</option>
                                <option value="delivered">Đã giao hàng</option>
                                <option value="returning">Chờ chuyển hoàn</option>
                                <option value="returned">Đã chuyển hoàn</option>
                                <option value="cancelled">Hủy giao hàng</option>
                                <option value="failed">Giao hàng lỗi</option>
                              </select>
                              <input type="button" class="btn btn-default add-filter filtering-complete" value="Lọc">
                            </div>
                            <div class="inline filter-choose4 " style="display: none">
                              <select class="form-control form-selectboxit filter-select">
                                <option value="">Chọn điều kiện lọc...</option>
                                <option value="less_than">Từ ngày này về trước</option>
                                <option value="greater_than">Từ ngày</option>
                              </select>
                              <div class="input-group filter-choose6 date inline margin-right ">
                                <input type="text" class="form-control inline filter-input no-margin" data-rel="datepicker">

                                <span class="input-group-addon padding-lg-right"><i class="glyphicon glyphicon-calendar"></i></span>
                              </div>
                              <input type="button" class="btn btn-default add-filter filtering-complete" value="Lọc">
                            </div>
                            <div class="inline filter-choose5 " style="display: none">
                              <form method="" action="" novalidate="novalidate">
                                <input type="text" class="form-control inline filter-input">
                                <input type="submit" class="btn btn-default add-filter filtering-complete" value="Lọc">
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="next-form next-form--full-width display_list_product_internal2">
                      <form action="" method="" novalidate="novalidate">
                        <input type="text" class="form-control form-large search-input" placeholder="Nhập từ khóa tìm kiếm ..." value="">
                      </form>
                    </div>
                    <div class="segmented next-field--connected--no-flex saved-search-actions-next" id="saved-search-actions-next">
                    </div>
                  </div>
                </div> -->
              </div>
              <div class="shipments">
                <div>
                  <div class="panel-body bulk-action-context">
                    <div class="table-responsive table--no-overflow">

                      <table class="table table-hover vert-align order-list" id="datatable">
                        <thead>
                          <tr>
                            <th class="select select-all not-select">
                              <span><input type="checkbox" class="js-no-dirty all-bulk-action" id="checkAll"></span>
                             <div class="bulk-actions  " style="display: none;left: 0">
                                <ul>
                                  <li>
                                    <span class="selection-count bulk-action-items-count" selected-bulk-action-items="0">
                                      <span class="hidden-xs">Đã chọn</span> <span class="display-bulk-action-items-count"></span> phiếu <span class="hidden-xs">giao hàng</span>
                                    </span>
                                  </li>
                                  <li>
                                    <span class="dropdown">
                                      <a class="btn btn-default btn-sm dropdown-toggle" onclick="event.stopPropagation();" id="chonthaotac_order" data-toggle="dropdown">Chọn thao tác<span class="caret"></span>
                                      </a>
                                      <ul class="dropdown-menu dropdown_menu669 arrow-style" role="menu">
                                        <li><a class="perform-print-orders" href="javascript: void(0);">In vận đơn</a></li>
                                        <li class="break-top"></li>
                                        <li><a class="perform-archive-orders" href="javascript: void(0);">Lưu trữ</a></li>
                                        <li><a class="perform-unarchive-orders" href="javascript: void(0);">Hủy lưu trữ</a></li>
                                        <li><a class="perform-unarchive-orders" id="del_list_user" aria-hidden="true" href="javascript: void(0);">Xóa được chọn</a></li>
                                      </ul>
                                    </span>
                                  </li>
                                </ul>
                              </div>
                            </th>

                            <th>ID</th>
                            <th>Mã đơn hàng</th>
                            <th>Khách hàng</th>
                            <th>Ngày đặt</th>
                            <th>Tình trạng</th>
                            <th style="text-align: right;">Tổng tiền</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          if (!empty($this->data['data_order'])) {
                            foreach ($this->data['data_order'] as $key => $value) {
                              if ($value['info_buy']!="" && !empty($value['info_buy'])) {
                                $info = json_decode($value['info_buy'],true); //dd($info);?>
                                <tr class="is-archived">
                                <!-- <td class="select">
                                  <input type="checkbox" value="85853" name="ids" id="bulk-action" class="bulk-action-item">
                                </td> -->
                                <td>
                                  <div class="checker"><span>
                                    <input type="checkbox" name="name_id[]" class="checkboxes" value="<?php echo $value['id'];?>">
                                  </span></div>
                                </td>
                                <td>
                                  <a href="<?php echo base_url().'order/order/detail/'.$value['id'];?>"><?php echo $value['id']; ?></a>
                                </td>
                                <td>
                                  <a href="<?php echo base_url().'order/order/detail/'.$value['id'];?>"><?php echo $value['invoice'];?></a>
                                </td>
                                <td>
                                  <span><?php echo $info['fullname']; ?></span>
                                </td>
                                <td><?php echo date('H:i', $value['create_time']);?> Ngày <?php echo date('d-m-Y', $value['create_time']);?></td>
                              <!-- <td>
                                <span class="label label-warning">Chờ lấy hàng</span>
                              </td> -->
                              <td>
                                <?php 
                                if ($this->data['data_status_order']) {
                                 foreach ($this->data['data_status_order'] as $v2) {
                                   if ($v2['id']==$value['status']) {
                                     echo "<span class='label label-warning'>".$v2['title']."</span>";
                                   }
                                 }
                               }
                               ?>
                             </td>
                            <td class="total" style="text-align: right;color: red">
                              <?php echo number_format($value['total'],0,'','.')?> vnđ
                            </td>
                          </tr>
                          <?php }}} ?>
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