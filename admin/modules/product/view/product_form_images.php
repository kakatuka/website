<div class="col-md-12" style="width: 100%">
  <div class="panel panel-default panel-light">
    <div class="panel-body list-collection">
      <div class="no-colection-found form-group">
        <a href="javascript:void(0)" class="btn  background_orange" id="select_file" data-toggle="modal" data-target="#myModalPages"><i class="fa fa-plus"></i> Chọn file ảnh</a>
  <a href="javascript:void(0)" class="btn blue hidden" id="copy_info_image"><i class="fa fa-copy"></i> Sao chép tất cả ảnh vào mô tả</a>
  <a href="javascript:void(0)" class="btn red hidden" id="save_info_image" data-lang="vi" data-message="Bạn chưa chọn ảnh đại diện sản phẩm" data-success="Thông tin hình ảnh sản phẩm đã được lưu lại thành công" data-title="Thông báo" data-close="Đóng"><i class="fa fa-save"></i> Lưu thông tin hình ảnh</a>
  <input type="hidden" name="avatar" id="avatar" data-error="Bạn chưa chọn ảnh đại diện" value="<?php if(isset($this->data['data_images']['avatar'])) echo $this->data['data_images']['avatar']; ?>">
  <input type="hidden" name="image" id="image" value="">
  <ul class="list-image ui-sortable" id="sortable">
   <?php 
   if (!empty($this->data['data_images']['image'])) {
    foreach ($this->data['data_images']['image'] as $key => $value) {
     $url = base_url_cloud().'cdn/'.$value->name;
     if ($value->name==$this->data['data_images']['avatar']) {
      $checked_avatar = "checked_avatar";
      $html = '<i class="fa fa-chevron-down" aria-hidden="true"></i> '.lang('selected');
    }else{
      $checked_avatar = "select_avatar";
      $html = lang('choose_avatar');
    }
    echo '<li>
    <div class="imgs">
     <img src="'.$url.'" class="handle">
     <a href="javascript:void(0)" class="btn btn-xs green '.$checked_avatar.'" data-img="'.$value->name.'" data-choose-avatar="'.lang('choose_avatar').'" data-message="'.lang('selected').'">'.$html.'</a>
     <a href="javascript:void(0)" class="btn btn-xs red delete_image" data-title="'.lang('notification').'" data-message="'.lang('mess_remove_image').'" data-agree="'.lang('agree').'" data-cancel="'.lang('cancel').'" data-lang="vi">'.lang('delete_image').'</a>
   </div>
   <input type="hidden" name="images_js[]" value="'.$value->name.'" />
   <input type="text" name="att_title[]" class="form-control" maxlength="100" placeholder="'.lang('title_image').'" value="'.$value->att_title.'">
   <textarea name="att_alt[]" class="form-control" maxlength="150" placeholder="'.lang('descript_image').'">
     '.$value->att_alt.'</textarea>
   </li>';
 }
}
?>
</ul>











<!-- <form method="post" action="add" enctype="multipart/form-data">
        <input type="file" name="avatar"/>
        <input type="submit" name="uploadclick" value="Upload"/>
    </form> -->

      </div>
    </div>
  </div>
</div>
</div>

<div class="modal-image-choose">

  <div class="modal fade" id="myModalPages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="label-model-folder-img">
           <?php echo lang('choose_logo'); ?>
         </h4>
       </div>
       <div class="modal-body" data-mess-one="<?php echo lang('warning_choose_img');?>" data-mess-two="<?php echo lang('warning_choose_img_one');?>" data-title="list-images-product">

       </div>
       <div class="modal-footer">
        <div class="fileUpload btn btn-primary">
          <span><i class="fa fa-cloud-upload" aria-hidden="true"></i> <?php echo lang('uploadmedia');?></span>
          <input  type="file" id="media" class="media upload" name="media" />
          <input type="hidden" id="uploadImage" value="<?php echo time(); ?>" class=""  name="media"/>
        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close');?></button>
        <button type="button" class="btn btn-primary choose_img_list"><?php echo lang('choose');?></button>
      </div>
    </div>
  </div>
</div>
<div class="loading"></div>
<div class="fade_loading"></div>