<form action="<?php echo base_url().'posts/posts/save'?>" method="post">
  <div class="col_right">
      <div class="page-heading page-heading-md">
              <h2 class="header__main"><span class="breadcrumb hidden-xs"><i class="fa fa-truck"></i> </span><span class="title"><a href="<?php echo base_url().'order/order/index'; ?>">Danh sách đơn hàng</a> / <span>Xem đơn hàng</span></span></h2>
              <div class="header-right">
                <!-- <a class="btn btn-default" href="javascript:void(0)"><i class="fa fa-save"></i>&nbsp;Lưu <span class="hidden-xs"> </span>  </a> -->
                <div class="col-md-12 sidebar-box text-left">
                  <div class="form-group">
                      <div class="form-actions">
                          <div class="btn-set">
                              <button type="button" value="save" id="save_order" class="btn btn-default" data-id="<?php echo $this->data['data_info_order']['id'];?>"><i class="fa fa-save"></i> <?php echo lang('save_one');?></button>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
        </div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="dashboard-breadcrumb">
                <div class="pull-left">
                    <ol class="breadcrumb">
                    <li><a href="<?php echo base_url().'home/home/index'; ?>"><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
                        <li><a href="<?php echo base_url().'order/order/index'; ?>"><?php echo lang('order'); ?></a></li>
                    <li class="active"><?php echo lang('order_detail'); ?></li>
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
                  <input type="hidden" name="id_posts" value="<?php if(isset($this->data['data']['id'])) echo $this->data['data']['id'];?>">
              <div class="col-md-12" style="min-height:750px;">
                    <div class="tabbable-custom ">
                        <?php 
                        if (isset($this->data['flash_success'])) {
                            echo '<div class="alert alert-success">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>'.lang('success').'</strong> '.$this->data['flash_success'].'
                                    </div>';
                        }
                        ?>
                      <ul class="nav nav-tabs ">
                          <li class="active">
                          </li>
                      </ul>
                      <div class="tab-content">
                          <div class="tab-pane active" id="tab_detail">
                              <div class="row">
                                    <div class="col-md-6">
                                      
                                      <div class="panel panel-default">
                                        <div class="panel-heading">
                                          <h3 class="panel-title">Thông tin người mua</h3>
                                          <div class="pull-right">
                                            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                            </span>
                                          </div>
                                        </div>
                                        <div class="panel-body">
                                              <table class="table table-hover" id="dev-table">
                                                <thead>
                                                  <tr>
                                                    <th>#</th>
                                                    <th></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td><?php echo lang('fullname');?></td>
                                                    <td><?php echo $this->data['data_info_order']['info_buy']['fullname'];?></td>
                                                  </tr>
                                                  <tr>
                                                    <td><?php echo lang('email');?></td>
                                                    <td><?php echo $this->data['data_info_order']['info_buy']['email'];?></td>
                                                  </tr>
                                                  <tr>
                                                    <td><?php echo lang('phone');?></td>
                                                    <td><?php echo $this->data['data_info_order']['info_buy']['phone'];?></td>
                                                  </tr>
                                                  <tr>
                                                    <td><?php echo lang('address');?></td>
                                                    <td><?php echo $this->data['data_info_order']['info_buy']['address'];?></td>
                                                  </tr>
                                                   <tr>
                                                    <td>Nội dung</td>
                                                    <td><?php echo $this->data['data_info_order']['info_buy']['content'];?></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                        </div>
                                      </div>
                                </div>
                              <!--   <div class="col-md-6">
                                      <div class="panel panel-default">
                                        <div class="panel-heading">
                                          <h3 class="panel-title">Thông tin người nhận</h3>
                                          <div class="pull-right">
                                            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                          
                                            </span>
                                          </div>
                                        </div>
                                        <div class="panel-body">
                                              <table class="table table-hover" id="dev-table">
                                                <thead>
                                                  <tr>
                                                    <th>#</th>
                                                    <th></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td><?php echo lang('fullname');?></td>
                                                    <td><?php echo $this->data['data_info_order']['info_receive']['fullname'];?></td>
                                                  </tr>
                                                  <tr>
                                                    <td><?php echo lang('email');?></td>
                                                    <td><?php echo $this->data['data_info_order']['info_receive']['email'];?></td>
                                                  </tr>
                                                  <tr>
                                                    <td><?php echo lang('phone');?></td>
                                                    <td><?php echo $this->data['data_info_order']['info_receive']['phone'];?></td>
                                                  </tr>
                                                  <tr>
                                                    <td><?php echo lang('address');?></td>
                                                    <td><?php echo $this->data['data_info_order']['info_receive']['full_address'];?></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                        </div>
                                      </div>
                                </div> -->
                                <div class="col-md-6">
                                      <div class="panel panel-default">
                                        <div class="panel-heading">
                                          <h3 class="panel-title">Thông tin đơn hàng</h3>
                                          <div class="pull-right">
                                            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                            </span>
                                          </div>
                                        </div>
                                        <div class="panel-body">
                                              <table class="table table-hover" id="dev-table">
                                                <thead>
                                                  <tr>
                                                    <th>#</th>
                                                    <th></th>
                                                    <th></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>Mã đơn hàng</td>
                                                    <td><?php echo $this->data['data_info_order']['invoice']; ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Tour</td>
                                                    <td><?php echo $this->data['data_info_order']['title']; ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Mã tour</td>
                                                    <td><?php echo $this->data['data_info_order']['code_tour']; ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Thời gian</td>
                                                    <td><?php echo $this->data['data_info_order']['day']; ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Ngày khởi hành</td>
                                                    <td><?php echo $this->data['data_info_order']['date']; ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Người lớn</td>
                                                    <td><?php echo number_format($this->data['data_info_order']['price_men']) ; ?> x <?php echo $this->data['data_info_order']['int_men']; ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Trẻ em</td>
                                                    <td><?php echo number_format($this->data['data_info_order']['price_child']) ; ?> x <?php echo $this->data['data_info_order']['int_child']; ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Em bé</td>
                                                    <td><?php echo number_format($this->data['data_info_order']['price_baby']) ; ?> x <?php echo $this->data['data_info_order']['int_baby']; ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Phương thức thanh toán</td>
                                                    <td>
                                                      <?php
                                                      if ($this->data['data_info_order']['payment_type_method']==1) {
                                                        echo "Chuyển khoản qua Ngân Hàng"  ; 
                                                      }else{
                                                         echo "Thanh toán tiền mặt tại văn phòng"  ; 
                                                      }
                                                        
                                                       ?>
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                    <td style="font-weight: 600">Tổng tiền</td>
                                                    <td style="font-weight: 600"><?php echo covertMoney($this->data['data_info_order']['total']).' '. $this->data['data_info_order']['currency_code']; ?> VNĐ</td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                        </div>
                                        
                                      </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="panel panel-default">
                                        <div class="panel-heading">
                                          <h3 class="panel-title">Ghi chú</h3>
                                          <div class="pull-right">
                                            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                            </span>
                                          </div>
                                        </div>
                                        <div class="panel-body">
                                          <div class="form-group">
                                              <label class="col-sm-12 control-label text-left">Trạng thái: </label>
                                              <div class="col-sm-12">
                                                <select class="form-control" id="status">
                                                    <?php 
                                                    if (!empty($this->data['order_status'])) {
                                                        foreach ($this->data['order_status'] as $key => $value) {
                                                            if ($value['id']==$this->data['data_info_order']['status']) {
                                                               $selected = ' selected';
                                                            }else{
                                                              $selected='';
                                                            }
                                                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                                                        }
                                                    }
                                                    ?>
                                                    
                                                </select>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="col-sm-12 control-label text-left"><?php echo lang('note_content');?></label>
                                              <div class="col-sm-12">
                                                  <textarea class="form-control" id="note" name="note" cols="50" rows="5">
                                                    <?php if(isset($this->data['data_info_order']['note'])) echo trim($this->data['data_info_order']['note']); ?>
                                                  </textarea>

                                              </div>
                                          </div>
                                          <div style="clear: both;"></div>
                                          <br/>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12 hidden">
                                      <div class="panel panel-default">
                                        <div class="panel-heading">
                                          <h3 class="panel-title">Thông tin sản phẩm đặt hàng</h3>
                                          <div class="pull-right">
                                            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                          
                                            </span>
                                          </div>
                                        </div>
                                        <div class="panel-body">
                                              <table class="table table-hover" id="dev-table">
                                                <thead>
                                                  <tr>
                                                    <th>STT</th>
                                                    <th>Ảnh sản phẩm</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Giá sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>Tổng thanh toán</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                if (isset($this->data['data_info_order']['product']) && !empty($this->data['data_info_order']['product'])) {
                                                  $stt = 1;
                                                   foreach ($this->data['data_info_order']['product'] as $key => $value) { ?>
                                                           <tr>
                                                              <td><?php echo $stt++;?></td>
                                                              <td>
                                                                  <img src="<?php echo (isset($value['image']) && $value['image']!='') ? base_url_cloud().'timthumb.php?src='.base_url_cloud().'cdn/'.$value['image'].'&h=80&w=100&zc=2' : base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url().'tmp/public/images/img.png&h=80&w=100&zc=2'; ?>" width="100" height="80" class="img-thumbnail"/>
                                                              </td>
                                                              <td><strong><?php echo $value['name'];?></strong>
                                                                  <?php 
                                                                  echo isset($value['size']) ? "<p>Size: <strong>".$value['size']."</strong>.</p>" : '';
                                                                  echo isset($value['color']) ? "<p>Color: <strong>".$value['color']."</strong>.</p>" : '';
                                                                  ?>
                                                              </td>
                                                              <td><?php echo covertMoney($value['price']) .' '.$this->data['data_info_order']['currency_code']; ?></td>
                                                              <td><?php echo $value['quantity']; ?></td>
                                                              <td><?php echo covertMoney($value['total']) .' '.$this->data['data_info_order']['currency_code']; ?></td>
                                                            </tr>
                                                            
                                                    <?php 
                                                   }
                                                }
                                                ?>
                                                </tbody>
                                              </table>
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
</div>
</form>