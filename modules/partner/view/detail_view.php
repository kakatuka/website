
<style type="text/css">
  li{
    list-style-type: none !important;
  }
  img{
    max-width: 100%;
  }
</style>
  
  <!--nội dung của trang -->
  <section>
    <div class="container-fluid tin-chi-tiet">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-xs-12 side-left" style="padding:0% 1.5% 0 1.5%;">
            <div class="col-sm-12 col-xs-12 tieu-de-tin" style="padding: 0">
              <h2><?php echo $this->data['data_partner']['title']?></h2>
            </div>
            <div class="col-sm-12 col-xs-12 ngay-dang" style="padding:1.5% 0 0.5% 0">
              <div class="col-sm-6 col-xs-6" style="padding:0">
              </div>
             
            </div>
            <div class="col-sm-12 col-xs-12 col-sm-pull-0 ht-tin"></div>
            <div class="col-sm-12 col-xs-12 bai-viet" style="padding:0">
            <p><?php echo html_entity_decode($this->data['data_partner']['content'])?></p>
            </div>
          </div>
         <?php require_once DIR_TMP.'themes/right_posts.php'; ?>
        </div>
      </div>
    </div>
  </section>
  <!-- end nội dung -->