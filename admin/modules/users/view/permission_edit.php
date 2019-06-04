<div class="content-wrapper">
    <div class="page-heading page-heading-md">
        <h2 class="header__main"><span class="breadcrumb hidden-xs"><i class="fa fa-file-image-o"></i> </span><span class="title">Thêm mới quyền hạn</span></h2>
    </div>
    <!-- Main content -->
    <div class="col_right">
       <div class="content_col_right">
            <div class="container-fluid-md" style="margin-bottom:20px;margin-top: 50px;">
                <section class="content">
                  <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="user-profile" style="min-height: 720px;">
                                                <div class="col-md-3 col-lg-3 margin-md-bottom">
                                <h4>Thông tin website</h4>
                                <p class="text-muted">Thông tin được sử dụng để Thiên Việt và khác hàng liên hệ đến bạn.</p>
                              </div>
                            <div class="col-lg-9">
                                <div class="profile-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="tabbable-line">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab" aria-expanded="true"><?php echo lang('personal_info');?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-content">
                                                <!-- PERSONAL INFO TAB -->
                                                <div class="tab-pane active" id="tab_1_1">
                                                    <form method="POST" action="<?php echo base_url().'users/permission/update';?>" accept-charset="UTF-8">
                                                        <input name="_token" type="hidden" value="<?php echo base64url_encode(time());?>">
                                                        <input name="id_user" type="hidden" value="<?php echo $this->data['data_user']['id'];?>">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group ">
                                                                    <label for="last_name" class="control-label"><?php echo lang('name_permission');?></label>
                                                                    <input class="form-control" id="last_name" placeholder="Author Hữu Hậu" data-counter="60" name="name" type="text" value="<?php echo $this->data['data_user']['name'];?>">
                                                                </div> 
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label><?php echo lang('name_permission');?>(*):</label>
                                                                <select class="form-control parent_id" name="parent_id" id="categories">
                                                                   <option value="0">- Danh mục gốc</option>
                                                                   <?php
                                                                   if (isset($this->data['data_user']['id'])) {

                                                                    CallPermission($this->data['data_user1'],0,"-",$this->data['data_user']['parent_id']);
                                                                    }else{
                                                                        CallPermission($this->data['data_user1']);
                                                                    }

                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="first_name" class="control-label"><?php echo lang('description');?></label>
                                                                    <input class="form-control" id="first_name" placeholder="Author Hữu Hậu" data-counter="60" name="description" type="text" value="<?php echo $this->data['data_user']['description'];?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-actions">
                                                                        <div class="btn-set pull-right">
                                                                            <button type="submit" name="submit" class="btn btn-success" ><i class="fa fa-check-circle"></i> <?php echo lang('update');?></button>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- END PERSONAL INFO TAB -->
                                                    <!-- CHANGE PASSWORD TAB -->
                                                    <!-- END CHANGE PASSWORD TAB -->
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                     <!-- END PROFILE CONTENT -->
                                </div>
                            <div class="clearfix"></div>
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