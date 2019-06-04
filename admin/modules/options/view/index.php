<form action="" method="post">
  <div class="col_right">
  <div class="banner_top">
          <div class="page-heading page-heading-md dashboard-header">
            <h2 class="header__main">
              <span class="breadcrumb hidden-xs">
                <i class="fa fa-credit-card"></i>
              </span>
              <span>Tùy chỉnh</span>
        </h2>
        <div class="header-right">
          <button class="btn btn-default" name="ok" type="submit" value="Submit" style="background: #FF9632;color: white">Lưu thay đổi</button>
      </div>
  </div>
</div>

<div class="content_col_right">
    <div class="container-fluid-md" style="margin-bottom:20px;margin-top: 50px;">
        <div class="row">
  <section class="content-header">
    <?php 
    if (isset($this->data['flash_success'])) {
      echo '<div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>'.lang('success').'</strong> '.$this->data['flash_success'].'
    </div>';
  }
  ?>
  <?php 
  if (isset($this->data['flash_warning'])) {
    echo '<div class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>'.lang('warning').'</strong> '.$this->data['flash_warning'].'
  </div>';
}
?>
</section>
<!-- Main content -->
<section class="content">

  <!-- Main row -->
  <div class="row">
    <!-- left col -->

  <div class="col-md-3">
            <h4>Tùy chỉnh các tính năng phụ</h4>
                <p class="text-muted">- Tại đây bạn có thể điều chỉnh số bài viết trên một trang, sử dụng cho tính năng phân trang</p>
                <p class="text-muted">- Bạn có thể bật/tắt tính năng bình luận trên sản phẩm và bài viết</p>
            </div>

  <section class="col-lg-9">
    <!-- solid sales graph -->
    <div class="box box-solid bg-teal-gradient">
      <!-- <div class="box-header" style="background:#3b5998;">
        <h3 class="box-title" style="margin-top: 0px;margin-bottom: 0px;"><i class="fa fa-cog fa-spin" aria-hidden="true"></i> <?php echo lang('options'); ?></h3>
      </div> -->
      <!-- Custom tabs (Charts with tabs)-->
      <div class="nav-tabs-custom">
        <div class="tab-content no-padding">
          <br>
          <div class="box-setting-info tab-pane active" id="revenue-chart" style="position: relative;min-height: 323px;">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="box box-danger">
                <div class="box-header with-border" style="padding: 5px;background: #c8cad0bf;">
                  
                  <h3 style="margin-top: 0px;margin-bottom: 0px;"><i class="fa fa-comment-o" aria-hidden="true"></i> Bình luận</h3>
                </div>
                <div class="box-body">

                  <div class="form-group ">
                    <label for="seo_title" class="control-label"><?php echo lang('options_pagi_post');?></label>
                    <input class="form-control" id="pagination_number" placeholder="" name="pagination_number" type="number" value="<?php echo (isset($this->data['options']['pagination_number'])) ? $this->data['options']['pagination_number'] : '';?>">
                  </div>

                  <div class="form-group ">
                    <label for="seo_title" class="control-label">Số sản phẩm trên một trang</label>
                    <input class="form-control" id="pagination_number_product" placeholder="" name="pagination_number_product" type="number" value="<?php echo (isset($this->data['options']['pagination_number_product'])) ? $this->data['options']['pagination_number_product'] : '';?>">
                  </div>

                  <div class="form-group">
                    <label for=""><?php echo lang('comments');?></label><br />
                    <input id="switch-size" type="checkbox" checked data-size="mini" name="comment" data-check="<?php echo ($this->data['options']['comment']==0) ? 'false' : 'true';?>"/>
                  </div>

                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>