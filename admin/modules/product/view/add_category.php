        	<form action="<?php echo base_url() . 'product/category/save' ?>" method="post">

        		<div class="col_right">
        			<div class="page-heading page-heading-md">
        				<!-- <h2 class="header__main">
                                        <span class="breadcrumb hidden-xs"><i class="fa fa-truck"></i> </span><span class="title">Thêm mới danh mục</span></h2>
                                    -->
                                    <h2 class="header__main">
                                        <span class="breadcrumb hidden-xs">
                                            <i class="fa fa-credit-card"></i>
                                            <a href="<?php echo base_url() . 'product/category/index'; ?>">Danh sách danh mục và Địa điểm</a> /
                                        </span>
                                        <span class="title">Thêm danh mục mới</span>
                                    </h2>
                                    <div class="header-right">
                                        <button type="submit" name="submit" value="save" class="btn btn-default"><i class="fa fa-save"></i> <?php echo lang('save_one'); ?></button>
                                        <button type="submit" name="submit" value="apply" class="btn background_orange"><i class="fa fa-check-circle"></i> <?php echo lang('save_one'); ?> &amp; <?php echo lang('add_one'); ?></button>
                                    </div>
                                </div>
                                <div class="page-content clearfix">
                                    <div class="page-body">
                                       <div class="page-body-render" id="content">
                                          <div class="content-wrapper">
                                             <!-- Main content -->
                                             <div class="content_col_right">
                                                <div class="container-fluid-md" style="margin-bottom:20px;margin-top: 5px;">
                                                   <section class="content">
                                                      <!-- Small boxes (Stat box) -->
                                                      <div class="row">
                                                  
                                                        <input type="hidden" name="id_category" value="<?php if (isset($this->data['data']['id'])) {
                                                          	echo $this->data['data']['id'];
                                                          }
                                                          ?>">
                                                        <div class="col-md-12">
                                                            <div class="tabbable-custom ">
                                                              <?php
                                                                if (isset($this->data['flash_success'])) {
                                                                	echo '<div class="alert alert-success">
                                                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                  <strong>' . lang('success') . '</strong> ' . $this->data['flash_success'] . '
                                                              </div>';
                                                              }
                                                              ?>
                                                          <ul class="nav nav-tabs ">
                                                           <li class="active">
                                                              <a href="#tab_detail" data-toggle="tab" aria-expanded="true"><?php echo lang('detail'); ?></a>
                                                          </li>
                                                          <li class="">
                                                              <a href="#tab_note" data-toggle="tab" aria-expanded="false"><?php echo lang('record_note'); ?></a>
                                                          </li>
                                                      </ul>
                                                      <div class="tab-content">
                                                       <div class="tab-pane active" id="tab_detail">
                                                          <div class="form-body">
                                                             <div class="form-group ">
                                                                <label for="name" class="control-label required">Tên danh mục</label>
                                                                <input class="form-control" id="title" placeholder="<?php echo lang('maximum_categories'); ?>" value="<?php if (isset($this->data['data']['title'])) {
                                                                	echo $this->data['data']['title'];
                                                                }
                                                                ?>" name="title" type="text" required>
                                                            </div>
                                                             <!-- <div class="form-group ">
                                                                <label for="name" class="control-label required">Tiêu đề</label>
                                                                <input class="form-control" id="title" placeholder="Tiêu đề cho danh mục" value="<?php if (isset($this->data['data']['name'])) {
                                                                  echo $this->data['data']['name'];
                                                                }
                                                                ?>" name="name" type="text">
                                                            </div> -->
                                                            <div class="form-group hidden">
                                                                <label for="name" class="control-label required">Sắp xếp danh mục</label>
                                                                <input class="form-control" id="title" placeholder="Sắp xếp tăng dần(1->100)" value="<?php if (isset($this->data['data']['sort'])) {
                                                                  echo $this->data['data']['sort'];
                                                                }
                                                                ?>" name="sort" type="text">
                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label required">Địa điểm tour</label>
                                                                <select class="form-control" name="parent_id" id="categories">
                                                                   <option value="0">- Danh mục gốc</option>
                                                                   <?php
                                                                    if (isset($this->data['data']['id'])) {
                                                                    	callMenu($this->data['menu'], 0, "-", $this->data['data']['parent_id']);
                                                                    } else {
                                                                    	callMenu($this->data['menu']);
                                                                    }

                                                                    ?>
                                                              </select>
                                                          </div>
                                                          <div class="form-group ">
                                                            <label for="description" class="control-label required"><?php echo lang('description'); ?></label>
                                                            <textarea class="form-control" rows="4" id="description" placeholder="<?php echo lang('description_required'); ?>" data-counter="300" name="description" cols="50"><?php if (isset($this->data['data']['description'])) {
	echo $this->data['data']['description'];
}
?></textarea>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="description" class="control-label required"><?php echo lang('meta_keyword'); ?></label>
                                                            <textarea class="form-control" rows="4" id="meta_keyword" placeholder="<?php echo lang('meta_keyword_required'); ?>" data-counter="300" name="meta_keyword" cols="50"><?php if (isset($this->data['data']['meta_keyword'])) {
	echo $this->data['data']['meta_keyword'];
}
?></textarea>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="description" class="control-label required"><?php echo lang('meta_description'); ?></label>
                                                            <textarea class="form-control" rows="4" id="meta_description" placeholder="<?php echo lang('meta_description_required'); ?>" data-counter="300" name="meta_description" cols="50"><?php if (isset($this->data['data']['meta_description'])) {
	echo $this->data['data']['meta_description'];
}
?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                              <!--   <div class="tab-pane" id="tab_note">
                                                  <div class="form-group">
                                                     <label class="col-sm-2 control-label text-right"><?php echo lang('note_content'); ?></label>
                                                     <div class="col-sm-10">
                                                        <textarea class="form-control" name="note" cols="50" rows="10">
                                                           <?php if (isset($this->data['data']['note'])) {
	echo $this->data['data']['note'];
}
?>
                                                       </textarea>
                                                   </div>
                                               </div>
                                               <div class="clearfix"></div>
                                           </div> -->
                                       </div>
                                   </div>
                               </div>

                           </div>
                           <!-- /.row -->
                           <div class="row">
                            <div class="col-md-12" style="padding: 15px">
                                <!-- solid sales graph -->
                                <div class="box box-solid bg-teal-gradient bg-header-left box-left" style="padding: 0">
                                    <div class="box-header">
                                        <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                        <h3 class="box-title" style="    font-size: 18px;display: inline-block;margin: 0"><?php echo lang('image'); ?></h3>
                                    </div>
                                    <!-- Custom tabs (Charts with tabs)-->
                                    <div class="nav-tabs-custom">
                                        <div class="tab-content no-padding">
                                            <div>
                                                <br>
                                                <div class="modal-image-choose" style="width: 50%;float: left;">
                                                   <h4 class="text-center"><?php echo lang('avatar'); ?></h4>
                                                   <div class="text-center">
                                                    <a class="text-center" data-toggle="modal" data-target="#myModalPages">
                                                        <img src="<?php echo (isset($this->data['data']['avatar']) && $this->data['data']['avatar'] != '') ? base_url_cloud() . 'timthumb.php?src=' . base_url_cloud() . 'cdn/' . $this->data['data']['avatar'] . '&h=150&w=210&zc=2' : base_url() . 'tmp/public/images/img.png'; ?>" class="logo-website pages-website load-img" alt=""  style="width: 50%"/>
                                                        <input type="hidden" class="hidden_thumb_pages" name="hidden_thumb_pages" value="<?php if (isset($this->data['data']['avatar'])) {echo $this->data['data']['avatar'];}?>"/>
                                                    </a>
                                                    <h5 class="text-center"><a href="" class="del-image-choose-pages" style="color: #FF5722;font-weight:bold;"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo lang('delete'); ?> </a></h5>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModalPages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="label-model-folder-img">
                                                                    <?php echo lang('choose_logo'); ?>
                                                                </h4>
                                                            </div>
                                                            <div class="modal-body" data-mess-one="<?php echo lang('warning_choose_img'); ?>" data-mess-two="<?php echo lang('warning_choose_img_one'); ?>" data-title="thumbnail_pages">

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close'); ?></button>
                                                                <button type="button" class="btn btn-primary choose_img"><?php echo lang('choose'); ?></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--END MODAL-->
                                            </div>
                                           <!--  <div class="modal-image-choose" style="width: 50%;float: left">
                                               <h4 class="text-center"><?php echo lang('cover_image'); ?></h4>
                                               <div class="text-center">
                                                <a class="text-center" data-toggle="modal" data-target="#myModalCover">
                                                    <img src="<?php echo (isset($this->data['data']['background']) && $this->data['data']['background'] != '') ? base_url_cloud() . 'timthumb.php?src=' . base_url_cloud() . 'cdn/' . $this->data['data']['background'] . '&h=150&w=210&zc=2' : base_url() . 'tmp/public/images/img.png'; ?>" class="logo-favicon load-img" alt="" style="width: 50%">
                                                    <input type="hidden" class="background" name="background" value="<?php if (isset($this->data['data']['background'])) {echo $this->data['data']['background'];}?>"/>
                                                </a>
                                                <h5 class="text-center"><a href="" class="del-image-choose-background" style="color: #FF5722;font-weight:bold;"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo lang('delete'); ?> </a></h5>
                                            </div> -->
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModalCover" tabindex="-1" role="dialog" aria-labelledby="myModalCover">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="label-model-folder-img">
                                                                <?php echo lang('choose_background'); ?>
                                                            </h4>
                                                        </div>
                                                        <div class="modal-body" data-mess-one="<?php echo lang('warning_choose_img'); ?>" data-mess-two="<?php echo lang('warning_choose_img_one'); ?>" data-title="background">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close'); ?></button>
                                                            <button type="button" class="btn btn-primary choose_img_background"><?php echo lang('choose'); ?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--END MODAL-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
                <!-- Main row -->
            </section>
        </div>
    </div>
    <!-- /.content -->
</div>
</div>
</div>
</div>
</div>
</form>