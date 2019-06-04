<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
                        <li><a href=""><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
                        <li class="active"><?php echo lang('menu'); ?></li>
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
                    

                

                                <div class="row widget-menu">
                                    <div class="col-md-12">
                                        <?php 
                                        if (isset($this->data['flash_success'])) {
                                            echo '<div class="alert alert-success">
                                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                      <strong>'.lang('success').'</strong> '.$this->data['flash_success'].'
                                                    </div>';
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="widget">
                                            <div class="widget-title closed">
                                                <h4>
                                                    <i class="fa fa-link" aria-hidden="true"></i>
                                                    <span><?php echo lang('search');?></span>
                                                </h4>
                                                <div class="tools">
                                                    <a href="#" class="expand"></a>
                                                </div>
                                            </div>
                                            <div class="widget-body" style="display: none;">
                                                <div class="box-links-for-widget" data-type="3">
                                                            <div class="text-right">
                                                                <div class="btn-group btn-group-devided">
                                                                    <a href="#" class="btn-add-widget btn btn-success btn-sm btn-circle btn-transparent active"><span class="text"><i class="fa fa-plus"></i> <?php echo lang('add_to_sidebar');?></span></a>
                                                                </div>
                                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget">
                                            <div class="widget-title closed">
                                                <h4>
                                                    <i class="fa fa-link" aria-hidden="true"></i>
                                                    <span><?php echo lang('social');?></span>
                                                </h4>
                                                <div class="tools">
                                                    <a href="#" class="expand"></a>
                                                </div>
                                            </div>
                                            <div class="widget-body" style="display: none;">
                                                <div class="box-links-for-widget" data-type="1">

                                                            <div class="form-group">
                                                                <label for="node-url">Name</label>
                                                                <select name="social_fb" id="social_fb"  class="form-control">
                                                                    <option value="facebook">Facebook</option>
                                                                    <option value="google">Google</option>
                                                                    <option value="youtube">Youtube</option>
                                                                    <option value="all">All in One</option>
                                                                </select>
                                                            </div>
                                                            <div class="text-right">
                                                                <div class="btn-group btn-group-devided">
                                                                    <a href="#" class="btn-add-widget btn btn-success btn-sm btn-circle btn-transparent active"><span class="text"><i class="fa fa-plus"></i> <?php echo lang('add_to_sidebar');?></span></a>
                                                                </div>
                                                            </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="widget">
                                            <div class="widget-title closed">
                                                <h4>
                                                    <i class="fa fa-link" aria-hidden="true"></i>
                                                    <span><?php echo lang('recent_posts');?></span>
                                                </h4>
                                                <div class="tools">
                                                    <a href="#" class="expand"></a>
                                                </div>
                                            </div>
                                            <div class="widget-body" style="display: none;">
                                                <div class="box-links-for-widget" data-type="2">
                                                            <div class="form-group">
                                                                <label for="node-url">Posts</label>
                                                                <select name="recent" id="recent"  class="form-control">
                                                                    <option value="new">Bài viết mới</option>
                                                                    <option value="old">Bài viết xem nhiều</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="node-url">Number post</label>
                                                                <select name="number" id="number" class="form-control">
                                                                    <option value="5">5</option>
                                                                    <option value="10">10</option>
                                                                    <option value="15">15</option>
                                                                </select>
                                                            </div>
                                                            <div class="text-right">
                                                                <div class="btn-group btn-group-devided">
                                                                    <a href="#" class="btn-add-widget btn btn-success btn-sm btn-circle btn-transparent active"><span class="text"><i class="fa fa-plus"></i> <?php echo lang('add_to_sidebar');?></span></a>
                                                                </div>
                                                            </div>
                                                </div>
                                            </div>
                                        </div>

                                        

                                        


                                        <div class="widget">
                                            <div class="widget-title closed">
                                                <h4>
                                                    <i class="fa fa-link" aria-hidden="true"></i>
                                                    <span><?php echo lang('categories');?></span>
                                                </h4>
                                                <div class="tools">
                                                    <a href="#" class="expand"></a>
                                                </div>
                                            </div>
                                            <div class="widget-body" style="display: none;">
                                                <div class="box-links-for-widget" data-type="4">
                                                            
                                                            <div class="form-group">
                                                                <label for="node-url">Name</label>
                                                                <select name="" id=""  class="form-control">
                                                                    <option value="cate_post">Categories posts</option>
                                                                </select>
                                                            </div>
                                                            <div class="text-right">
                                                                <div class="btn-group btn-group-devided">
                                                                    <a href="#" class="btn-add-widget btn btn-success btn-sm btn-circle btn-transparent active"><span class="text"><i class="fa fa-plus"></i> <?php echo lang('add_to_sidebar');?></span></a>
                                                                </div>
                                                            </div>
                                                </div>
                                            </div>
                                        </div>





                                    </div>
                                    <div class="col-md-4">
                                        
                                        <div class="widget">
                                            <div class="widget-title opened">
                                                <h4>
                                                    <i class="fa fa-bars font-dark"></i>
                                                    <span> Primary sidebar</span>
                                                </h4>
                                            </div>
                                            <div class="widget-body" style="display: block;min-height: 280px;height: auto;">
                                                <div class="nestable-menu" id="nestable">
                                                    <ol class="dd-list dd-list-widgets">
                                                        <?php 
                                                        if (!empty($this->data['data'])) {
                                                            foreach ($this->data['data'] as $key => $value) { ?>
                                                                    <li style="margin-left:20px;" class="dd-item post-item closed" id="listId_<?php echo $value['id'];?>" data-id="<?php echo $value['id'];?>">
                                                                        <div class="dd-handle"></div>
                                                                        <div class="dd-content">
                                                                            <span class="text pull-left">&nbsp;<?php echo $value['title'];?></span>
                                                                            <span class="text pull-right">Primary sidebar</span>
                                                                            <a href="#" title="" class="show-item-details"><i class="fa fa-angle-down"></i></a>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                        <div class="item-details">

                                                                                    <label class="pad-bot-5">
                                                                                        <span class="text pad-top-5 dis-inline-block"><?php echo lang('title');?></span>
                                                                                        <input type="text" id="title" name="title" value="<?php echo $value['title'];?>" data-old="<?php echo $value['title'];?>" class="form-control"/>
                                                                                    </label>
                                                                                    <div class="text-right button_update_widgets">
                                                                                        <a href="#" class="btn btn-info btn-sm btn-update-widget">
                                                                                            <i class="fa fa-retweet" aria-hidden="true"></i>&nbsp;
                                                                                            <?php echo lang('update');?></a>

                                                                                        <a href="#" class="btn btn-danger btn-sm btn-remove-widget">
                                                                                            <i class="fa fa-times" aria-hidden="true"></i>&nbsp;
                                                                                            <?php echo lang('remove_widget');?></a>

                                                                                        <a href="#" class="btn btn-success btn-sm btn-cancel-widget"><?php echo lang('cancel');?></a>
                                                                                    </div>

                                                                        </div>
                                                                    </li>
                                                        <?php 
                                                            }
                                                        }
                                                        ?>
                                                        

                                                        


                                                    </ol>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <!-- Modal Confirm Menu -->
                                <div id="myModalConfirmWidgets" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><?php echo lang('notification');?></h4>
                                      </div>
                                      <div class="modal-body">
                                        <p><?php echo lang('delete_messager');?></p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo lang('cancel');?></button>
                                        <a href="javascript:void(0)" class="btn btn-success accept_del_widgets" data-id=""><?php echo lang('agree');?></a>
                                        
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