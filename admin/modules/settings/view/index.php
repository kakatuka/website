ive<!-- col_right -->
<form action="" method="post">
  <div class="col_right">

    <!-- banner_top -->
    <div class="banner_top">
      <div class="page-heading page-heading-md dashboard-header">
        <h2 class="header__main">
          <span class="breadcrumb hidden-xs">
            <i class="fa fa-cog fa-spin"></i>
          </span>
          <span>Cài đặt</span>
          <!-- <span class="title">Thêm mới danh mục</span> -->
        </h2>
        <div class="header-right">
          <button class="btn btn-default" name="ok" type="submit" value="Submit" style="background: #FF9632;color: white"><?php echo lang('save'); ?></button>
        </div>
      </div>
    </div>
    <!-- end banner_top -->
    <!-- col_main -->

    <div class="content_col_right">
      <div class="container-fluid-md" style="margin-bottom:20px;margin-top: 50px;">
        <!-- info_website -->
        <div class="row">
          <div class="col-md-4 col-lg-3 margin-md-bottom">
          </div>
          <div class="col-md-8 col-lg-9">
            <div class="panel panel-default panel-light table-users">
              <div class="panel-body">

                <div class="form-group">
                  <label class="control-label strong" for="seo_title">Tên website</label>
                  <div class="controls">
                    <input class="form-control" placeholder="Nhập tên website" id="seo_title" data-counter="120" name="seo_title" type="text" value="<?php echo (isset($this->data['info']['seo_title'])) ? $this->data['info']['seo_title'] : ''; ?>">
                    <div class="has-error">
                      <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                    </div>
                  </div>
                </div>

                <div class="form-group" id="settings-title">
                  <label class="control-label strong" for="slogan">Tiêu đề trang chủ</label>
                  <div class="controls">
                    <input class="form-control" placeholder="Nhập tiêu đề trang chủ" id="slogan" data-counter="120" name="slogan" type="text" value="<?php echo (isset($this->data['info']['slogan'])) ? $this->data['info']['slogan'] : ''; ?>">
                    <div class="has-error">
                      <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                    </div>
                  </div>
                </div>

                <div class="form-group" id="settings-description">
                  <label class="control-label strong" for="seo_description">Mô tả trang chủ</label>
                  <div class="controls">
                    <input class="form-control" placeholder="Nhập một mô tả để nâng cao xếp hạng trên công cụ tìm kiếm như Google" id="seo_description" data-counter="120" name="seo_description" type="text" value="<?php echo (isset($this->data['info']['seo_description'])) ? $this->data['info']['seo_description'] : ''; ?>"></input>
                    <div class="has-error">
                      <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                    </div>
                  </div>
                </div>

                <div class="form-group" id="settings-title">
                  <label class="control-label strong" for="seo_keywords">Từ khóa SEO</label>
                  <div class="controls">
                   <input class="form-control" id="seo_title" placeholder="SEO Keywords (maximum 60 characters, separate by &quot;,&quot; character)" data-counter="60" name="seo_keywords" type="text" value="<?php echo (isset($this->data['info']['seo_keywords'])) ? $this->data['info']['seo_keywords'] : ''; ?>">
                   <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6">
                  <div class="form-group hide">
                    <label class="control-label strong" for="contact_email">Email quản trị</label>
                    <div class="controls">
                      <input class="form-control" placeholder="Nhập email quản trị" id="contact_email" name="contact_email" type="text" value="<?php echo (isset($this->data['info']['email'])) ? $this->data['info']['email'] : ''; ?>">
                      <div class="has-error">
                        <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                      </div>
                      
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 hide">
                  <div class="form-group">
                    <label class="control-label strong" for="email_support">Email gửi thông báo</label>
                    <div class="controls">
                      <input class="form-control" placeholder="Nhập email gửi thông báo" id="email_support" name="email_support" type="text" value="<?php echo (isset($this->data['info']['email_support'])) ? $this->data['info']['email_support'] : ''; ?>">
                      <div class="has-error">
                        <span class="help-block"><span class="field-validation-valid help-block"></span></span>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end info_website -->
      <!-- info_contact -->
      <div class="row">
        <div class="col-md-4 col-lg-3 margin-md-bottom">
        </div>
        <div class="col-md-8 col-lg-9">
          <div class="panel panel-default panel-light table-users">
            <div class="panel-body">
              <div class="form-group">
                <!-- <div class="controls">
                  <input class="form-control" placeholder="Nhập tên kinh doanh" id="name" name="name" type="text" value="<?php echo (isset($this->data['info']['name'])) ? $this->data['info']['name'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div> -->
              </div>

              <div class="form-group hide">
                <label class="control-label strong" for="name">Mô tả ngắn</label>
                <div class="controls">
                  <input class="form-control" placeholder=" giới thiệu công ty" id="name" name="content" type="text" value="<?php echo (isset($this->data['info']['conten'])) ? $this->data['info']['conten'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <!--  <div class="form-group" id="settings-contact">
                <label class="control-label strong" for="contact_address">Địa chỉ</label>
                <div class="controls">
                  <input class="form-control" id="contact_address1" placeholder="Nhập địa chỉ trụ sở " name="contact_address" type="text" value="<?php echo (isset($this->data['info']['address'])) ? $this->data['info']['address'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div> -->
              <div class="form-group hidden">
                <label class="control-label strong" for="contact_phone">Website</label>
                <textarea class="form-control" rows="4" id="domain" data-counter="300" name="domain" cols="50"><?php if (isset($this->data['info']['domain'])) {echo  $this->data['info']['domain'];}?>
                </textarea>
              </div>
              
            <!--   <div class="form-group">
                <label class="control-label strong" for="contact_phone">Hotline2</label>
                <div class="controls">
                  <input class="form-control" placeholder="Nhập số hotline" id="contact_phone" name="contact_phone" type="text" value="<?php echo (isset($this->data['info']['hotline2'])) ? $this->data['info']['hotline2'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div> -->
              <div class="form-group">
                <label class="control-label strong" for="contact_phone">Email</label>
                <div class="controls">
                  <input class="form-control" placeholder="Nhập điện thoại liên hệ" id="contact_phone" name="email_footer" type="text" value="<?php echo (isset($this->data['info']['email'])) ? $this->data['info']['email'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label strong" for="contact_hotline">Hotline</label>
                <div class="controls">
                  <input class="form-control" placeholder="Nhập số hotline" id="seo_title" name="contact_hotline" type="text" value="<?php echo (isset($this->data['info']['hotline'])) ? $this->data['info']['hotline'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
               <div class="form-group" id="settings-contact">
                <label class="control-label strong" for="contact_address">Địa chỉ</label>
                <div class="controls">
                  <input class="form-control" id="contact_address" placeholder="Nhập địa chỉ trụ sở " name="contact_address" type="text" value="<?php echo (isset($this->data['info']['address'])) ? $this->data['info']['address'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group" id="settings-contact">
                <label class="control-label strong" for="contact_address">Mã số thuế</label>
                <div class="controls">
                  <input class="form-control" id="contact_address" placeholder="Nhập mã số thuế " name="mst" type="text" value="<?php echo (isset($this->data['info']['mst'])) ? $this->data['info']['mst'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group" id="settings-contact">
                <label class="control-label strong" for="contact_address">Điện thoại </label>
                <div class="controls">
                  <input class="form-control" id="contact_address" placeholder="Điện thoại " name="phone_hn" type="text" value="<?php echo (isset($this->data['info']['phone_hn'])) ? $this->data['info']['phone_hn'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group" id="settings-contact">
                <label class="control-label strong" for="contact_address">Fax </label>
                <div class="controls">
                  <input class="form-control" id="contact_address" placeholder="Fax " name="fax_hn" type="text" value="<?php echo (isset($this->data['info']['fax_hn'])) ? $this->data['info']['fax_hn'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group" id="settings-contact">
                <label class="control-label strong" for="address2">Link Facebook</label>
                <div class="controls">
                  <input class="form-control" id="facebook" placeholder="link facebook " name="link_fabook" type="text" value="<?php echo (isset($this->data['info']['link_facebook'])) ? $this->data['info']['link_facebook'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group" id="settings-contact">
                <label class="control-label strong" for="address2">Link youtube</label>
                <div class="controls">
                  <input class="form-control" id="youtube" placeholder="Link youtube" name="link_yt" type="text" value="<?php echo (isset($this->data['info']['link_youtube'])) ? $this->data['info']['link_youtube'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group" id="settings-contact">
                <label class="control-label strong" for="address2">Link Google</label>
                <div class="controls">
                  <input class="form-control" id="youtube" placeholder="Link google" name="link_gg" type="text" value="<?php echo (isset($this->data['info']['link_google'])) ? $this->data['info']['link_google'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
               <div class="form-group" id="settings-contact">
                <label class="control-label strong" for="address2">Link Twitter</label>
                <div class="controls">
                  <input class="form-control" id="youtube" placeholder="Link Twitter" name="link_tt" type="text" value="<?php echo (isset($this->data['info']['link_tt'])) ? $this->data['info']['link_tt'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
               <div class="form-group hidden" id="settings-contact">
                <label class="control-label strong" for="contact_address">Số hộ chiếu</label>
                  <div class="controls">
                    <input class="form-control" id="contact_address" placeholder="Nhập fax " name="fax" type="text" value="<?php echo (isset($this->data['info']['fax'])) ? $this->data['info']['fax'] : ''; ?>">
                    <div class="has-error">
                      <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                    </div>
                  </div>
              </div>
              <div class="form-group">
                <label for="description" class="control-label required">Các địa chỉ liên kế với Tour </label>
                    <textarea class="form-control" rows="4" id="content_address" data-counter="300" name="content_address" cols="50"><?php if (isset($this->data['info']['conten'])) {
                 echo  $this->data['info']['conten'];
                }
                ?></textarea>
                <script type="text/javascript">CKEDITOR.replace('content_address');</script>
              </div>
              <h4 style="padding: 15px; border-top: 1px solid #ccc;display: none"> Văn phòng Hà Nội</h4>
              <div class="form-group hidden" id="settings-contact">
                <label class="control-label strong" for="contact_address">Địa chỉ trụ sở </label>
                <div class="controls">
                  <input class="form-control" id="contact_address" placeholder="Địa chỉ " name="address_hn" type="text" value="<?php echo (isset($this->data['info']['address_hn'])) ? $this->data['info']['address_hn'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group hidden" id="settings-contact">
                <label class="control-label strong" for="contact_address">Hotline </label>
                <div class="controls">
                  <input class="form-control" id="contact_address" placeholder="Hotline Hà Nội " name="hotline_hn" type="text" value="<?php echo (isset($this->data['info']['hotline_hn'])) ? $this->data['info']['hotline_hn'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group hidden" id="settings-contact">
                <label class="control-label strong" for="contact_address">Email </label>
                <div class="controls">
                  <input class="form-control" id="contact_address" placeholder="Email Hà Nội " name="email_hn" type="text" value="<?php echo (isset($this->data['info']['email_hn'])) ? $this->data['info']['email_hn'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <h4 style="padding: 15px; border-top: 1px solid #ccc; display: none"> Văn Phòng Hồ Chí Minh</h4>
              <div class="form-group hidden" id="settings-contact">
                <label class="control-label strong" for="contact_address">Địa chỉ trụ sở </label>
                <div class="controls">
                  <input class="form-control" id="contact_address" placeholder="Địa chỉ " name="address_hcm" type="text" value="<?php echo (isset($this->data['info']['address_hcm'])) ? $this->data['info']['address_hcm'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group hidden" id="settings-contact">
                <label class="control-label strong" for="contact_address">Điện thoại </label>
                <div class="controls">
                  <input class="form-control" id="contact_address" placeholder="Điện thoại " name="phone_hcm" type="text" value="<?php echo (isset($this->data['info']['phone_hcm'])) ? $this->data['info']['phone_hcm'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group hidden" id="settings-contact">
                <label class="control-label strong" for="contact_address">Fax </label>
                <div class="controls">
                  <input class="form-control" id="contact_address" placeholder="Fax " name="fax_hcm" type="text" value="<?php echo (isset($this->data['info']['fax_hcm'])) ? $this->data['info']['fax_hcm'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group hidden" id="settings-contact">
                <label class="control-label strong" for="contact_address">Hotline </label>
                <div class="controls">
                  <input class="form-control" id="contact_address" placeholder="Hotline Hồ Chí Minh " name="hotline_hcm" type="text" value="<?php echo (isset($this->data['info']['hotline_hcm'])) ? $this->data['info']['hotline_hcm'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group hidden" id="settings-contact">
                <label class="control-label strong" for="contact_address">Email </label>
                <div class="controls">
                  <input class="form-control" id="contact_address" placeholder="Email Hồ Chí Minh " name="email_hcm" type="text" value="<?php echo (isset($this->data['info']['email_hcm'])) ? $this->data['info']['email_hcm'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>    
              <div class="form-group hidden" id="settings-contact">
                <label class="control-label strong" for="contact_address">Tài khoản 2</label>
                <div class="controls">
                  <input class="form-control" id="contact_address" placeholder="Tài khoản 1" name="tk2" type="text" value="<?php echo (isset($this->data['info']['id_bank2'])) ? $this->data['info']['id_bank2'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group hidden">
                <label class="control-label strong" for="contact_phone">Bản đồ</label>
                <div class="controls">
                  <input class="form-control" placeholder="Nhập link googlemap" id="map" name="map" type="text" value="<?php echo (isset($this->data['info']['map'])) ? $this->data['info']['map'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group hidden">
                    <label for="description" class="control-label required">Mã nhúng live chat</label>
                    <textarea class="form-control" rows="4" id="description" placeholder=" Mã nhúng live chat" data-counter="300" name="livechat" cols="50"><?php if (isset($this->data['info']['livechat'])) {
                 echo base64_decode($this->data['info']['livechat']);
                }
                ?></textarea>
              </div>
              </div>
              
              
              
             
               
               
              <!-- <div class="form-group" id="settings-contact">
                <label class="control-label strong" for="contact_address">Địa chỉ3</label>
                <div class="controls">
                  <input class="form-control" id="contact_address" placeholder="Nhập địa chỉ trụ sở " name="contact_address2" type="text" value="<?php echo (isset($this->data['info']['address2'])) ? $this->data['info']['address2'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div> -->
              <!-- <div class="form-group" id="settings-contact">
                <label class="control-label strong" for="contact_address">Địa chỉ4</label>
                <div class="controls">
                  <input class="form-control" id="contact_address" placeholder="Nhập địa chỉ trụ sở " name="contact_address3" type="text" value="<?php echo (isset($this->data['info']['address3'])) ? $this->data['info']['address3'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div> -->
              
              
              
             <!--  <div class="form-group" id="settings-contact" style=" border-top: 1px solid #ccc">
                <label class="control-label strong" for="contact_address">TRỤ SỞ</label>
              </div> -->
                   <!-- <div class="form-group">
                <label class="control-label strong" for="contact_hotline">Hotline</label>
                <div class="controls">
                  <input class="form-control" placeholder="Nhập số hotline" id="seo_title" name="hotline1" type="text" value="<?php echo (isset($this->data['info']['phone1'])) ? $this->data['info']['phone1'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div> -->
             <!--  <div class="form-group">
                <label class="control-label strong" for="contact_phone">CD/Fax</label>
                <div class="controls">
                  <input class="form-control" placeholder="Nhập CD/Fax" id="fax" name="fax" type="text" value="<?php echo (isset($this->data['info']['fax'])) ? $this->data['info']['fax'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div> -->
              <!-- <div class="form-group">
                <label class="control-label strong" for="contact_phone">Email</label>
                <div class="controls">
                  <input class="form-control" placeholder="Nhập điện thoại liên hệ" id="contact_phone" name="email1" type="text" value="<?php echo (isset($this->data['info']['email1'])) ? $this->data['info']['email1'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>
              <div class="form-group" id="settings-contact">
                <label class="control-label strong" for="address2">Địa chỉ</label>
                <div class="controls">
                  <input class="form-control" id="address2" placeholder="Địa chỉ văn phòng đại diện" name="address2" type="text" value="<?php echo (isset($this->data['info']['address2'])) ? $this->data['info']['address2'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div> -->
              <!-- <div class="form-group">
                <label class="control-label strong" for="contact_phone">Link video</label>
                <div class="controls">
                  <input class="form-control" placeholder="Nhập link video" id="contact_phone" name="link_video" type="text" value="<?php echo (isset($this->data['info']['link_video'])) ? $this->data['info']['link_video'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div> -->
              <!-- <div class="form-group">
                <label class="control-label strong" for="contact_phone">Tin Nổi Bật</label>
                <div class="controls">
                  <input class="form-control" placeholder="Nhập tiêu đề " id="contact_phone" name="tintuc" type="text" value="<?php echo (isset($this->data['info']['tintuc'])) ? $this->data['info']['tintuc'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div> -->
<!--
              <div class="form-group row" define="{country_code: 'VN'}">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label class="control-label strong" for="Province">Tỉnh / Thành phố</label>
                    <div class="controls hide" >
                      <input bind="province" class="form-control"  id="Province" name="" placeholder="Nhập tên thành phố" type="text" value="Cao Bằng">
                      <div class="has-error">
                        <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                      </div>
                    </div>
                    <div class="controls" >
                      <select  class="form-control" id="ProvinceCode" name="" placeholder="Nhập tên thành phố">
                        <option value="04">Hà Nội</option>
                        <option value="08">TP Hồ Chí Minh</option>

                      </select> -->
                  <!--     <label for="country-dd"><?php echo lang('province'); ?> <span class="require">*</span></label>
                      <select class="form-control input-sm" id="country-dd" name="left_province" style="padding: 0px 8px;">
                      <option value=""> --- Vui lòng chọn --- </option>
                        <?php
                        foreach ($this->data['province'] as $key => $value) {
                        	echo '<option value="' . $value['provinceid'] . '">' . $value['name'] . '</option>';
                        }
                        ?>
                      </select>
                      <div class="has-error">
                        <span class="help-block"><span class="field-validation-valid help-block" data-valmsg-for="ProvinceCode" data-valmsg-replace="true"></span></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label strong" for="CountryCode">Quốc gia</label>
                    <div class="controls">
                      <select  class="form-control"  id="CountryCode" name="CountryCode" style="width: 100%;">
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>

                      </select>
                      <div class="has-error">
                        <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  -->

            </div>
          </div>
        </div>
        <!-- standard -->
     <!--  <div class="row">
        <div class="col-md-4 col-lg-3 margin-md-bottom">
          <h4>Tiêu chuẩn &amp; định dạng</h4>
          <p class="text-muted">Cấu hình múi giờ, loại tiền tệ và định dạng mã đơn hàng được sử dụng trên website.</p>
        </div>
        <div class="col-md-8 col-lg-9">
          <div class="panel panel-default panel-light table-users">
            <div class="panel-body">
              <div class="form-group row">
                <div class="col-sm-6">
                  <label class="control-label strong" for="Timezone">Múi giờ</label>
                  <div class="controls">
                    <select class="form-control"  id="Timezone" name="Timezone" style="width: 100%;">
                      <option selected="selected" value="Dateline Standard Time">(UTC-12:00) International Date Line West</option>
                      <option value="UTC-11">(UTC-11:00) Coordinated Universal Time -11</option>

                    </select>
                    <div class="has-error">
                      <span class="help-block"><span class="field-validation-valid help-block" data-valmsg-for="Timezone" data-valmsg-replace="true"></span></span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <label class="control-label strong" for="Currency">Tiền tệ</label> <a href="javascript:void(0)" class="onchange_money1">thay đổi định dạng </a>
                  <div class="controls">
                    <select class="form-control"  id="Currency" name="" style="width: 100%;">
                      <option selected="selected" value="VND">Việt Nam đồng (VND)</option>
                      <option value="USD">United States Dollars (USD)</option>

                    </select>
                    <div class="has-error">
                      <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                    </div>
                    <div class="content-currency1 " style="display: none;">
                      <label class="control-label strong">Định dạng tiền tệ</label>
                      <p>Bạn có thể thay đổi định dạng của các giá trị tiền tệ và chúng sẽ được hiển thị trong cửa hàng của bạn. Định dạng {{amount_no_decimals_with_comma_separator}} và {{amount}} và {{amount_no_decimals}}được thay thế bằng giá trị tiền tương ứng.</p>
                      <label class="note">Định dạng có tiền tệ</label>
                      <div class="form-group ">
                        <input type="text" value="{{amount_no_decimals_with_comma_separator}} VN" name="MoneyWithCurrencyFormat" class="form-control">
                      </div>
                      <label class="note">Định dạng không có tiền tệ</label>
                      <div class="form-group ">
                        <input type="text" value="{{amount_no_decimals_with_comma_separator}}" name="MoneyFormat" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-9">
                  <label class="control-label strong">Định dạng mã đơn hàng</label>
                  <br>
                  <span class="text-muted">Đơn hàng mặc định bắt đầu là #1001, bạn có thể thay đổi tiền tố hoặc hậu tố giống như "BN1001" hoặc "1001-AD"</span>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="control-label strong" for="OrderPrefix">Tiền tố</label>
                    <div class="controls">
                      <input class="form-control order-code-prefix"  id="OrderPrefix" name="" type="text" value="">
                      <div class="has-error">
                        <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="control-label strong" for="OrderSuffix">Hậu tố</label>
                    <div class="controls">
                      <input class="form-control order-code-suffix"  id="OrderSuffix" name="" type="text" value="">
                      <div class="has-error">
                        <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <span class="text-muted">Mã đơn hàng sẽ được áp dụng là: </span><span class="example-order-code1"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <!-- end standard -->
        <!-- Google Analytics -->
      <div class="row hide">
        <div class="col-md-4 col-lg-3 margin-md-bottom">
          <h4>Google Analytics</h4>
          <p class="text-muted">Nhập mã Google Analytics để bạn có thể theo dõi các thống kê về truy cập của website.</p>
        </div>

        <div class="col-md-8 col-lg-9">
          <div class="panel panel-default panel-light table-users">
            <div class="panel-body">

              <div class="form-group" id="settings-ga">
                <label class="control-label strong" for="google_analytics">Mã Google Analytics</label>
                <div class="controls">
                  <input class="form-control valid" id="google_analytics" placeholder="Nhập mã Google Analytics tại đây" name="google_analytics" type="text" value="<?php echo (isset($this->data['info']['google_analytics'])) ? $this->data['info']['google_analytics'] : ''; ?>">
                  <p><a href="https://analytics.google.com" target="_blank"><?php echo lang('path_analytics'); ?></a></p>
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>

              <div class="form-group" id="settings-ga">
                <label class="control-label strong" for="google_site_verification"><?php echo lang('google_verify'); ?></label>
                <div class="controls">
                  <input class="form-control" id="google_site_verification" placeholder="Google Site Verification" name="google_site_verification" type="text" value="<?php echo (isset($this->data['info']['google_site_verification'])) ? $this->data['info']['google_site_verification'] : ''; ?>">
                  <p><a target="_blank" href="https://ga-dev-tools.appspot.com/account-explorer/"><?php echo lang('view_id_analytics'); ?></a></p>
                  <div class="has-error">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                  </div>
                </div>
              </div>

              <label for="file_google" class="control-label"><?php echo lang('json_analytics'); ?></label> <a href="https://console.developers.google.com/?pli=1" target="_blank"><?php echo lang('link'); ?></a>
              <br>
              <div style="position:relative;">
                <a class='btn btn-default' href='javascript:;'>
                  Choose File...
                  <input type="file" name="file_source" id="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                </a>
                &nbsp;
                <span class='label label-info' id="upload-file-info" style="max-width: 350px; position: absolute; top: 41px; left: 0px;overflow: hidden;"><?php echo (isset($this->data['info']['google_file_json'])) ? $this->data['info']['google_file_json'] : ''; ?></span>
              </div><br>

            </div>
          </div>
        </div>
      </div>
      <!-- end Google Analytics -->
        <!-- Facebook Pixel -->
      <div class="row hide">
        <div class="col-md-4 col-lg-3 margin-md-bottom">
          <h4>Facebook Pixel</h4>
          <p class="text-muted">Facebook Pixel giúp bạn tạo chiến dịch quảng cáo để tìm khách hàng mới.</p>
        </div>
        <div class="col-md-8 col-lg-9">
          <div class="panel panel-default panel-light table-users">
            <div class="panel-body">

              <div class="form-group hide">
                <label class="control-label strong" for="id_app_fb">Facebook Pixel ID</label>
                <div class="controls">
                  <input class="form-control" id="id_app_fb" placeholder="Nhập Facebook Pixcel ID tại đây" name="id_app_fb" type="text" value="<?php echo (isset($this->data['info']['id_app_fb'])) ? $this->data['info']['id_app_fb'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="help-block field-validation-valid" ></span></span>
                  </div>
                </div>
              </div>

              <div class="form-group hide">
                <label class="control-label strong" for="link_fb">FanPage</label>
                <div class="controls">
                  <input class="form-control" id="link_fb" placeholder="Nhập đường dẫn Fanpage của bạn tại đây" name="link_fb" type="text" value="<?php echo (isset($this->data['info']['link_facebook'])) ? $this->data['info']['link_facebook'] : ''; ?>">
                  <div class="has-error">
                    <span class="help-block"><span class="help-block field-validation-valid" ></span></span>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- end Facebook Pixel -->
      <!-- choose logo -->
      <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-9">
          <section >

          <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient bg-header-left box-left">
             <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <div class="tab-content no-padding">
                  <div>
                      <br>
                        <div class="modal-image-choose " style="width: 50%;float: left;">
                          <p style="font-weight: bold;text-align: center;">Chọn Logo </p>
                            <div class="text-center">
                                  <a class="text-center" data-toggle="modal" data-target="#myModalLogo">
                                  <img src="<?php echo (isset($this->data['info']['logo']) && $this->data['info']['logo'] != '') ? base_url_cloud() . 'timthumb.php?src=' . base_url_cloud() . 'cdn/' . $this->data['info']['logo'] . '&h=150&w=210&zc=2' : base_url() . 'tmp/public/images/img.png'; ?>" class="logo-website load-img" alt="" style="width: 210px;height: 150px;">
                                  </a>
                                  <h5 class="text-center"><a href="" class="del-image-choose-logo" style="color: #FF5722;font-weight:bold;"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo lang('delete'); ?> </a></h5>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="myModalLogo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="label-model-folder-img">
                                       <?php echo lang('choose_logo'); ?>
                                    </h4>
                                  </div>
                                  <div id="loadMediaModel" class="modal-body" data-mess-one="<?php echo lang('warning_choose_img'); ?>" data-mess-two="<?php echo lang('warning_choose_img_one'); ?>" data-title="logo" >
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close'); ?></button>
                                    <button type="button" class="btn btn-primary choose_img"><?php echo lang('choose'); ?></button>
                                  </div>
                                </div>
                              </div>
                            </div><!--END MODAL-->
                        </div>


                        <div class="modal-image-choose " style="width: 50%;float: left;">
                          <p style="font-weight: bold;text-align: center;">Chọn Logo Favicon Website</p>
                            <div class="text-center">
                                  <a class="text-center" data-toggle="modal" data-target="#myModalFavicon">
                                  <!-- <img src="<?php echo (isset($this->data['info']['icon']) && $this->data['info']['icon'] != '') ? base_url_cloud() . 'cdn/' . $this->data['info']['icon'] : base_url() . 'tmp/public/images/img.png'; ?>" class="logo-favicon load-img" alt="" style="width: 210px;height: 150px;"> -->

                                  <img src="<?php echo (isset($this->data['info']['icon']) && $this->data['info']['icon'] != '') ? base_url_cloud() . 'timthumb.php?src=' . base_url_cloud() . 'cdn/' . $this->data['info']['icon'] . '&h=150&w=210&zc=2' : base_url() . 'tmp/public/images/img.png'; ?>" class="logo-favicon load-img" alt="" style="width: 210px;height: 150px;">
                                  </a>
                                  <h5 class="text-center"><a href="" class="del-image-choose-favicon" style="color: #FF5722;font-weight:bold;"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo lang('delete'); ?> </a></h5>
                            </div>
                            <!-- Modal -->
                              <div class="modal fade" id="myModalFavicon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="label-model-folder-img">
                                         <?php echo lang('choose_favicon'); ?>
                                      </h4>
                                    </div>
                                    <div id="loadMediaModelfavicon" class="modal-body" data-mess-one="<?php echo lang('warning_choose_img'); ?>" data-mess-two="<?php echo lang('warning_choose_img_one'); ?>" data-title="favicon" >
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close'); ?></button>
                                      <button type="button" class="btn btn-primary choose_img"><?php echo lang('choose'); ?></button>
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

        </section>
        <!-- left col -->
        </div>
      </div>
      <!-- end choose logo -->
      <hr class="bottom-section-hr">
  <div class="container-fluid-md">
    <div class="clear-fix" style="float:right">
      <button class="btn btn-default btn-submit pull-right" name="ok" type="submit" value="Submit"><span><?php echo lang('save'); ?></span></button>
    </div>
  </div>
      </div>
      <!-- end info_contact -->




    </div>
  </div>

<!-- end col_right -->
</form>