<form method="post" action="<?php echo base_url().'menu/position/save';?>">
    <div class="col_right">
        <div class="banner_top">
          <div class="page-heading page-heading-md dashboard-header">
            <h2 class="header__main">
              <span class="breadcrumb hidden-xs">
                <i class="fa fa-credit-card"></i>
                <a href="<?php echo base_url().'menu/position/index'; ?>">Điều hướng</a> /
            </span>
            <span class="title">Thêm mới thanh điều hướng</span>
        </h2>
        <div class="header-right">
          <button class="btn btn-default" name="ok" type="submit" value="Submit" style="background: #FF9632;color: white">Lưu thay đổi</button>
      </div>
  </div>
</div>

<div class="content_col_right">
    <div class="container-fluid-md" style="margin-bottom:20px;margin-top: 50px;">
        <div class="row">
            <div class="col-md-3">
            <h4>Tạo mới một kết cấu điều hướng</h4>
                <p class="text-muted">Thêm một vị trí hiển thị cho thanh điều hướng</p>
            </div>

            <div class="col-md-9">
                <!-- Main content -->
                <section class="content">
                  <!-- Small boxes (Stat box) -->
                  <div class="row widget-menu">
                    <div class="col-md-12">
                        <div class="widget">
                        <!-- <div class="widget-title">
                            <h4>
                                <i class="fa fa-question-circle"></i>
                                <span><?php echo lang('create_menu_link');?></span>
                            </h4>
                        </div> -->
                        <div class="widget-body">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo lang('name_menu')?></label>
                                    <input type="text" name="title_menu" id="name" class="form-control" value="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vị trí</label>
                                    <select name="position" id="" class="form-control">
                                        <option value="0">Không chọn</option>
                                        <option value="1">Main</option>
                                        <option value="2">Footer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-transparent btn-success btn-circle btn-sm" name="submit" type="submit">
                                    <i class="fa fa-check"></i> <?php echo lang('create');?>
                                </button>
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
</div>


<div class="loading"></div>
<div class="fade_loading"></div>
</div>
</form>