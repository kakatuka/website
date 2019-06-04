<div class="col_right">
    <div class="banner_top">
      <div class="page-heading page-heading-md dashboard-header">
        <h2 class="header__main">
          <span class="breadcrumb hidden-xs">
            <i class="fa fa-credit-card"></i>
            <a href="<?php echo base_url() . 'menu/position/index'; ?>">Điều hướng</a> /
        </span>
        <span class="title">Thêm mới thanh điều hướng</span>
    </h2>
    <div class="header-right">
        <div class="form-group text-center">
          <button class="btn btn-default" id="submit_update_name" type="button" style="background: #FF9632;color: white"><i class="fa fa-check"></i> Lưu thay đổi</button>
      </div>
  </div>
</div>
</div>



<div class="content_col_right">
  <div class="container-fluid-md" style="margin-bottom:20px;margin-top: 50px;">
    <!-- info_website -->
    <div class="row">
        <div class="col-md-4 col-lg-3 margin-md-bottom">
            <h4>Chỉnh sửa</h4>
            <p class="text-muted">Tại đây bạn có thể thêm các <a href="<?php echo base_url() . 'product/category/index'; ?>" target="_blank"><span style="font-weight: bold;color: #777;">Danh mục</span></a> hoặc <a href="<?php echo base_url() . 'product/product/index'; ?>" target="_blank"><span style="font-weight: bold;color: #777;">Sản phẩm...</span></a> đã tạo trước đó vào thanh Menu của website</p>
        </div>
        <!-- Main content -->
        <div class="col-md-8 col-lg-9">
            <div class="panel panel-default panel-light table-users">
              <div class="panel-body">
                <section class="content">
                  <!-- Small boxes (Stat box) -->
                  <div class="row widget-menu">
                    <div class="col-md-12">
                        <?php
                        if (isset($this->data['flash_success'])) {
                        	echo '<div class="alert alert-success">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>' . lang('success') . '</strong> ' . $this->data['flash_success'] . '
                                                </div>';
                        }
                        ?>
                    <div class="widget" style="padding: 10px;">
                        <div class="widget-title">
                            <h4 style="display: inline-block;">
                                <!-- <i class="fa fa-question-circle"></i> -->
                                <span><?php echo lang('edit_menu_link'); ?></span>
                            </h4>
                        </div>
                        <div class="widget-body">
                            <div class="form-group">
                                <label><?php echo lang('name_menu') ?></label>
                                <input type="text" name="title_menu" id="title_menu" class="form-control" value="<?php if (isset($this->data['position_data']['title'])) {
                                	echo $this->data['position_data']['title'];
                                }
                                ?>" autocomplete="off">
                                                                <input type="hidden" name="position" id="position" class="form-control" value="<?php if (isset($this->data['position'])) {
                                	echo $this->data['position'];
                                }
                                ?>" autocomplete="off">
                            </div>

                            <!-- <div class="form-group text-center">
                                <button class="btn btn-transparent btn-success btn-circle btn-sm" id="submit_update_name" type="button"><i class="fa fa-check"></i> <?php echo lang('save'); ?></button>
                            </div> -->
                        </div>
                    </div>
                </div>



                <div class="col-md-6">


                    <div class="widget" style="padding: 10px;">
                        <div class="widget-title closed">
                            <h4 style="display: inline-block;">
                                <i class="fa fa-link" aria-hidden="true"></i>
                                <span><?php echo lang('add_link'); ?></span>
                            </h4>
                            <div class="tools">
                                <a href="#" class="expand"></a>
                            </div>
                        </div>
                        <div class="widget-body" style="display: none;">
                            <div class="box-links-for-menu" data-type="<?php echo lang('custom_link'); ?>">

                                <div class="form-group">
                                    <label for="node-title"><?php echo lang('title'); ?></label>
                                    <input type="text" class="form-control" id="node-title" autocomplete="false">
                                </div>
                                <div class="form-group">
                                    <label for="node-url">Url</label>
                                    <input type="text" class="form-control" id="node-url" placeholder="http://" autocomplete="false">
                                </div>
                                <div class="form-group">
                                    <label for="node-css">CSS class</label>
                                    <input type="text" class="form-control" id="node-css" autocomplete="false">
                                </div>
                                <div class="text-right">
                                    <div class="btn-group btn-group-devided">
                                        <a href="#" class="btn-add-to-menu-custom-link btn btn-success btn-sm btn-circle btn-transparent active"><span class="text"><i class="fa fa-plus"></i> <?php echo lang('add_to_menu'); ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget" style="padding: 10px;">
                        <div class="widget-title closed">
                            <h4  style="display: inline-block;">
                                <i class="fa fa-link" aria-hidden="true"></i>
                                <span><?php echo lang('categories'); ?></span>
                            </h4>
                            <div class="tools">
                                <a href="#" class="expand"></a>
                            </div>
                        </div>
                        <div class="widget-body" style="display: none;">
                            <div class="box-links-for-menu">

                                <?php
                                listCategories($this->data['categories']);
                                ?>
                                <div class="text-right">
                                    <div class="btn-group btn-group-devided">
                                        <a href="#" class="btn-add-to-menu-cate btn btn-success btn-sm btn-circle btn-transparent active"><span class="text"><i class="fa fa-plus"></i> <?php echo lang('add_to_menu'); ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget" style="padding: 10px;">
                        <div class="widget-title closed">
                            <h4  style="display: inline-block;">
                                <i class="fa fa-link" aria-hidden="true"></i>
                                <span>Danh mục Tour</span>
                            </h4>
                            <div class="tools">
                                <a href="#" class="expand"></a>
                            </div>
                        </div>
                        <div class="widget-body" style="display: none;">
                            <div class="box-links-for-menu">
                                <?php
                                listCategoriesProduct($this->data['categories_product']);
                                ?>
                                <div class="text-right">
                                    <div class="btn-group btn-group-devided">
                                        <a href="#" class="btn-add-to-menu-cate btn btn-success btn-sm btn-circle btn-transparent active"><span class="text"><i class="fa fa-plus"></i> <?php echo lang('add_to_menu'); ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="widget" style="padding: 10px;">
                       <!--  <div class="widget-title closed">
                            <h4 style="display: inline-block;">
                                <i class="fa fa-link" aria-hidden="true"></i>
                                <span><?php echo lang('pages'); ?></span>
                            </h4>
                            <div class="tools">
                                <a href="#" class="expand"></a>
                            </div>
                        </div> -->
                        <div class="widget-body" style="display: none;">
                            <div class="box-links-for-menu">
                                <?php
                                    echo '<ul class="list-item" data-type="' . lang('pages') . '">';
                                    if (!empty($this->data['pages'])) {
                                    	foreach ($this->data['pages'] as $value) {
                                    		if (isset($value['old_url']) && $value['old_url']) {
                                    			$old_link = base_url_fontend() . $value['old_url'] . '.htm';
                                    		} else {
                                    			$old_link = base_url_fontend() . 'pages/' . $value['alias'] . '-p' . $value['id'] . '.htm';
                                    		}
                                    		echo "<li><a data-title='" . $value['title'] . "' data-id='" . $value['id'] . "' data-link='" . $old_link . "' href='#'>" . $value['title'] . "</a></li>";
                                    	}
                                    }
                                    echo '</ul>';

                                    ?>
                            <div class="text-right">
                                <div class="btn-group btn-group-devided">
                                    <a href="#" class="btn-add-to-menu btn btn-success btn-sm btn-circle btn-transparent active"><span class="text"><i class="fa fa-plus"></i> <?php echo lang('add_to_menu'); ?></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">

                <div class="widget" style="padding: 10px;">
                    <div class="widget-title opened">
                        <h4>
                            <i class="fa fa-bars font-dark"></i>
                            <span><?php echo lang('menu_structure'); ?></span>
                        </h4>
                    </div>
                    <div class="widget-body" style="display: block;min-height: 280px;height: auto;">
                        <div class="nestable-menu" id="nestable">
                            <ol class="dd-list">

                                <?php
// dd($this->data['menu']);
dequy($this->data['menu'], $parent = 0, $text = 0);
?>

                            </ol>

                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- Modal Confirm Menu -->
        <div id="myModalConfirmMenu" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo lang('notification'); ?></h4>
            </div>
            <div class="modal-body">
                <p><?php echo lang('delete_messager'); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo lang('cancel'); ?></button>
                <a href="javascript:void(0)" class="btn btn-success accept_del_menu"><?php echo lang('agree'); ?></a>

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
</div>
</div>
</div>
<!-- /.content -->
</div>



<div class="loading"></div>
<div class="fade_loading"></div>