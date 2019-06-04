<div class="content-wrapper">
  <div class="page-heading page-heading-md">
    <h2 class="header__main">
      <span class="breadcrumb hidden-xs"><i class="fa fa-cog fa-spin"></i> </span><span class="title">Hiển thị sản phẩm trang chủ</span>
    </h2>
    <div class="header-right">
    </div>
  </div>
  <!-- Main content -->
  <div class="col_right">
    <div class="content_col_right">
      <div class="container-fluid-md" style="margin-bottom:20px;margin-top: 50px;">
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <div class="tab-content no-padding">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative;min-height: 700px;">
                   <div class="col-xs-12" style="margin-bottom: 15px;">
                    <?php 
                    if (isset($this->data['flash_success'])) {
                      echo '<div class="alert alert-success">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>'.lang('success').'</strong> '.$this->data['flash_success'].'
                    </div>';
                  }
                  ?>
                  <div id="datatables_filter" class="dataTables_filter">
                    <div class="row">
                      <div class="col-lg-4">
                        <!-- <div class="input-group">
                          <input type="text" class="form-control search_product" placeholder="Search for..." value="<?php if(isset($this->data['s'])) echo $this->data['s'];?>">
                          <span class="input-group-btn">
                            <button class="btn btn-primary search_button_product" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                          </span>
                        </div> -->
                      </div>
                      <div class="col-lg-4"></div>    
                      <div class="col-lg-4" style="text-align: right;">
                        <a class="btn btn-success" data-toggle="modal" data-target="#modelAdd" data-href="<?php echo base_url().'product/manager/add';?>"><i class="fa fa-plus-circle"></i> Thêm danh mục hiển thị</a>
                        <!-- Single button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo lang('action');?> <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)" id="del_list_manager"><i class="fa fa-trash-o" aria-hidden="true"></i> &nbsp;<?php echo lang('delete');?></a></li>
                          </ul>
                        </div>
                      </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->                                        
                  </div>
                  <!-- Modal -->
                  <div id="modelAdd" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Thêm danh mục hiển thị</h4>
                        </div>
                        <div class="modal-body">
                         <div class="form-group ">
                           <label for="description" class="control-label required"><?php echo lang('title');?></label>
                           <input type="text" class="form-control" name="title_manager" id="title_manager" />
                         </div>
                       </div>
                       <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo lang('cancel');?></button>
                        <a href="javascript:void(0)" id="submit_manager" class="btn btn-success"><?php echo lang('add');?></a>
                      </div>
                    </div>

                  </div>
                </div>
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
                        <a href="" id="agree_del_all_manager" class="btn btn-success"><?php echo lang('agree');?></a>
                      </div>
                    </div>

                  </div>
                </div>


              </div>
              <!-- END TOP-->
              <br>
              <div class="clearfix"></div>

              <div class="col-xs-5">
               <div class="flip_title">
                <select name="" id="cate_product_left" class="form-control">
                 <?php 
                 $i=0;
                 if (!empty($this->data['cate'])) {
                  foreach ($this->data['cate'] as $key => $value) {
                   if ($i==0) {
                    $selected = "selected";
                  }else{
                    $selected = "";
                  }
                  echo "<option value='".$value['id']."' ".$selected.">".$value['title']."</option>";
                  $i++;
                }
              }
              ?>
            </select>
          </div>
          <div class="list-all-product-manager" id="list-all-product-manager">
           <div class="row">
            <?php 
            echo "<h6 class='text-center'>".lang('loading')."</h6>";
            ?>

          </div>
        </div>
        <div class="flip"><span class="btn btn-xs grey-cascade load-more-all-data" data-flag="true" id="load-more-all-data-product" data-start="2"><i class="glyphicon glyphicon-refresh fa-spin"></i> <?php echo lang('loading_data');?></span></div>
        <input type="hidden" id="hidden_not_id" value="" />
      </div>
      <div class="col-xs-2">
       <div class="form-group">
        <select name="" id="choose_cate_home" class="form-control">
         <option value="0"><?php echo lang('select_cate');?></option>
         <?php 
         if (!empty($this->data['view_home'])) {
          foreach ($this->data['view_home'] as $key => $value) {
           echo '<option value="'.$value['id'].'">'.$value['title'].'</option>';
         }
       }
       ?>
     </select>
   </div>
   <div class="col-md-12 col-manager-center"></div>
   <div class="form-group text-center">
     <button class="btn btn-success" id="add_product_home">Thêm sản phẩm</button>
   </div>

 </div>
 <div class="col-xs-5">
   <ul id="list-feature-home" class="ui-sortable-home" data-title-warning="<?php echo lang('title_warning_dbl');?>">
    <?php 
    if (!empty($this->data['view_home'])) {
                            			//dd($this->data['view_home']);
     foreach ($this->data['view_home'] as $key => $value) { ?>
     <li id="listItem_<?php echo $value['id'];?>" class="item" data-id="<?php echo $value['id'];?>"><img src="<?php echo base_url();?>modules/product/resource/images/arrow.png" alt="move" width="16" class="handle"><input type="hidden" class="form-control title title_<?php echo $value['id'];?>" value="<?php echo $value['title'];?>" /><strong data-toggle="tooltip" data-placement="top" title="<?php echo lang('title_warning_dbl');?>"><?php echo $value['title'];?> </strong>
      <div class="checker del_manager_home"><span>
        <input type="checkbox" name="name_id[]" class="checkboxes" value="<?php echo $value['id'];?>">
      </span></div>
      <div class="list_item_product <?php if(empty($value['content'])) echo 'margin_top_none';?>" id="list_item_product_<?php echo $value['id'];?>" data-id="<?php echo $value['id'];?>">
       <div class="row <?php if(empty($value['content'])) echo 'height_none';?>">
        <?php 
        if(!empty($value['content'])){
         foreach ($value['content'] as $k => $v) { ?>
         <div class="col-md-3" data-id="<?php echo $v['id'];?>" data-key="<?php echo $k;?>">
           <div class="imgs">
             <img src="<?php echo base_url_cloud().'timthumb.php?src='.base_url_cloud().'cdn/'.$v['image'].'&h=220&w=170&zc=2';?>" alt="<?php echo $v['name'];?>" class="img-thumbnail">
             <h5 class="text-center"><?php echo $v['name'];?></h5>
           </div>
         </div>
         <?php 
       }
     }
     ?>
   </div>
 </div>
</li>

<?php
}
}
?>

</ul>
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

<div class="loading"></div>
<div class="fade_loading"></div>