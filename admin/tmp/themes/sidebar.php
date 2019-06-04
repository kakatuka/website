<aside class="sidebar sidebar-default">
    <!-- header -->
    <div class="header-logo" style="background: #1d3e58;">
         <ul style="display: none">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php 
            if ($_web['lang']=='vi') { ?>
              <img src="<?php echo base_url();?>tmp/public/images/vi.png" alt="">
              Vietnames
            <?php 
            }else{ ?>
              <img src="<?php echo base_url();?>tmp/public/images/us.png" alt="">
              English
            <?php 
            }
            ?> 
            <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="javascript:;" class="lang_hd" data-lang="en">
                      <div class="pull-left" style="height: 30px;">
                        <img src="<?php echo base_url();?>tmp/public/images/us.png" alt="">
                        English
                      </div>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="javascript:;" class="lang_hd" data-lang="vi">
                      <div class="pull-left" style="height: 30px;">
                        <img src="<?php echo base_url();?>tmp/public/images/vi.png" alt="">
                        Vietnames
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
    </div>
    <!-- end header -->
    <!-- slidebar menu-->
    <div class="next-nav">
        <div class="next-nav__panel next-nav__panel--primary next-nav__panel--has-scrollbars" id="sidebar--nav" style="height: 351px; background-color: #051019;">
            <nav style="background-color: #051019;">
                <ul class="nav nav-pills nav-stacked next-nav__list next-nav__list--primary sidebar-menu " >
                    <li class="treeview">
                        <a href="<?php echo base_url() . 'home/home/index'; ?>">
                            <i class="text-muted-mod fa fa-lg fa-fw fa-home"></i>
                            <span class="menu-name">Trang chủ</span>
                        </a>
                    </li>
                    <li class=" active menu-is-selected">
                        <a href="javascript:void(0);" class="menu-parent" style="background:#2a6395">
                            <i class="text-muted-mod fa fa-lg fa-fw fa-credit-card"></i>
                            <span class="menu-name">Danh mục</span>
                            <i style="float: right" class="fa fa-sort-desc" aria-hidden="true"></i>
                        </a>
                        <ul class="treeview-menu" style="display: block;">
                            <?php if (($_SESSION['group_id'] == '20') || $_SESSION['group_id'] == '22') {?>
                            <li>
                                <a href="<?php echo base_url() . 'settings/settings/index'; ?>">
                                    <div>Cài đặt</div>
                                </a>
                            </li>
                            <?php if ($_SESSION['group_id'] == '20') {?>
                            <li>
                                <a href="<?php echo base_url() . 'product/category/index'; ?>">
                                    <div>Danh mục tour</div>
                                </a>
                            </li>
                            <?php }?>

                            <li>
                                <a href="<?php echo base_url() . 'product/product/index'; ?>">
                                    <div>Quuản lý tour</div>
                                </a>
                            </li>

                           <!--  <?php if ($_SESSION['group_id'] == '20') {?>
                            <li>
                                <a href="<?php echo base_url() . 'product/manager/index'; ?>">
                                    <div>Hiển thị Tour trang chủ</div>
                                </a>
                            </li>
                            <?php }?> -->
                            <li>
                                <a href="<?php echo base_url() . 'posts/posts/index'; ?>">
                                    <div>Bài viết</div>
                                </a>
                            </li>

                             <li>
                                <a href="<?php echo base_url() . 'posts/categories/index'; ?>">
                                    <div>Danh mục bài viết</div>
                                </a>
                            </li>
                            <?php }?>
                            <?php if (($_SESSION['group_id'] == '20') || $_SESSION['group_id'] == '22') {?>
                            <li>
                                <a href="<?php echo base_url() . 'menu/position/index'; ?>">
                                    <div>Điều hướng menu</div>
                                </a>
                            </li>
                            <?php }?>
                            <!-- <li>
                                <a href="<?php echo base_url() . 'info/info/index'; ?>">
                                    <div>Giới thiệu</div>
                                </a>
                            </li> -->
                            <!-- <?php if (($_SESSION['group_id'] == '20') || $_SESSION['group_id'] == '22') {?>
                            <li>
                                <a href="<?php echo base_url() . 'options/options/index'; ?>">
                                    <div>Tùy chỉnh phân trang</div>
                                </a>
                            </li>
                            <?php }?> -->
                            <?php if (($_SESSION['group_id'] == '20') || $_SESSION['group_id'] == '22') {?>
                            <li>
                                <a href="<?php echo base_url() . 'banners/banners/index'; ?>">
                                    <div>Ảnh slider</div>
                                </a>
                            </li>
                            <?php }?>
                           <!--  <?php if (($_SESSION['group_id'] == '20') || $_SESSION['group_id'] == '22') {?>
                            <li>
                                <a href="<?php echo base_url() . 'add/add/index'; ?>">
                                    <div>Danh sách khách hàng</div>
                                </a>
                            </li>
                            <?php }?> -->
                            <?php if (($_SESSION['group_id'] == '20') || $_SESSION['group_id'] == '22') {?>
                            <li>
                                <a href="<?php echo base_url() . 'add/add/index'; ?>">
                                    <div>Ảnh banner quảng cáo</div>
                                </a>
                            </li>
                            <?php }?>
                           <!--  <li>
                                <a href="<?php echo base_url() . 'service/service/index'; ?>">
                                    <div>Dịch vụ</div>
                                </a>
                            </li> -->
                            <!-- <li>
                                <a href="<?php echo base_url() . 'album/album/index'; ?>">
                                    <div>Dự án-Khách hàng</div>
                                </a>
                            </li> -->
                            <!-- <li>
                                <a href="<?php echo base_url() . 'order/order/index'; ?>">
                                    <div>Danh sách khách hàng đăt tour</div>
                                </a>
                            </li> -->
                            <li>
                                <a href="<?php echo base_url() . 'media/media/index'; ?>">
                                    <div>Quản lý file</div>
                                </a>
                            </li>
                            <?php if ($_SESSION['group_id'] == '20') {?>
                            <li>
                                <a href="<?php echo base_url() . 'users/manager/index'; ?>">
                                    <div>Quản lý người dùng</div>
                                </a>
                            </li>
                            <?php }?>
                            <?php if ($_SESSION['group_id'] == '20') {?>
                            <li>
                                <a href="<?php echo base_url() . 'users/grouppermission/index'; ?>">
                                    <div>Nhóm người dùng</div>
                                </a>
                            </li>
                            <?php }?>
                            <?php if ($_SESSION['group_id'] == '20') {?>
                            <li>
                                <a href="<?php echo base_url() . 'users/permission/index'; ?>">
                                    <div>Vai trò và quyền hạn</div>
                                </a>
                            </li>
                            <?php }?>
                            <?php if ($_SESSION['group_id'] == '20') {?>
                            <li>
                                <a href="<?php echo base_url() . 'pages/pages/index'; ?>">
                                    <div>Giới thiệu website</div>
                                </a>
                            </li>
                            <?php }?>
                           <!--  <li>
                                <a href="<?php echo base_url() . 'contact/contact/index'; ?>">
                                    <div>Khách hàng liên hệ</div>
                                </a>
                            </li> -->
                            <!--  <li>
                                <a href="<?php echo base_url() . 'contac/contac/index'; ?>">
                                    <div>Khách hàng liên hệ</div>
                                </a>
                            </li> -->
                             <!-- <li>
                                <a href="<?php echo base_url() . 'conment/conment/index'; ?>">
                                    <div>Đánh giá khách hàng</div>
                                </a>
                            </li> -->
                           <!--   <li>
                                <a href="<?php echo base_url() . 'chungtoi/conment/index'; ?>">
                                    <div>Tại sao chọn chúng tôi</div>
                                </a>
                            </li> -->
                            <!-- <?php if (($_SESSION['group_id'] == '20') || $_SESSION['group_id'] == '22') {?>
                            <li>
                                <a href="<?php echo base_url() . 'audio/audio/index'; ?>">
                                    <div>File Audio</div>
                                </a>
                            </li>
                            <?php }?>
                            <?php if (($_SESSION['group_id'] == '20') || $_SESSION['group_id'] == '22') {?>
                            <li>
                                <a href="<?php echo base_url() . 'video/video/index'; ?>">
                                    <div>Video</div>
                                </a>
                            </li>
                            <?php }?>
                             <li>
                                <a href="https://live.thienvietjsc.vn/lhc_web/index.php/site_admin/user/login" target="_blank">
                                    <div>Chat suppot</div>
                                </a>
                            </li> -->

                           <!--  <li>
                                <a href="chart.html">
                                    <div>Đồ thị thống kê</div>
                                </a>
                            </li>

                            <li>
                                <a href="facebook.html">
                                    <div>Faceboook</div>
                                </a>
                            </li>

                            <li>
                                <a href="khachhang.html">
                                    <div>Khách hàng</div>
                                </a>
                            </li>

                            <li>
                                <a href="khachhangthemmoi.html">
                                    <div>Khách hàng thêm mới</div>
                                </a>
                            </li>

                            <li>
                                <a href="khuyenmai.html">
                                    <div>Khuyễn mãi</div>
                                </a>
                            </li>

                            <li>
                                <a href="quanlykhachhang.html">
                                    <div>Quản lý khách hàng </div>
                                </a>
                            </li>

                            <li>
                                <a href="quanlykhuyenmai.html">
                                    <div>Quản lý khuyến mãi </div>
                                </a>
                            </li>

                            <li>
                                <a href="quanlyphieugiaohang.html">
                                    <div>Quản lý phiếu giao hàng  </div>
                                </a>
                            </li>

                            <li>
                                <a href="quanlysanpham.html">
                                    <div>Quản lý phiếu sản phẩm  </div>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="">
                                            <a href="" class="menu-parent">
                                        <i class="text-muted-mod fa fa-lg fa-fw fa-tag"></i>
                                        <span class="menu-name">Sản phẩm</span>
                                        <i style="float: right" class="fa fa-sort-desc" aria-hidden="true"></i>
                                    </a>
                                            <ul class="treeview-menu" style="display: none;">
                                                <li class="">
                                                    <a href="">
                                                        <div>Số lần đặt tối đa trong 1 khung giờ</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <div>Danh sách địa chỉ salon</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                       <collapse menu user -->
                        <div class="nav-user">
                            <div class="account-info">
                                <a href="javascript:void(0)" id="user_click" title="Cấu hình" style="padding: 10px 10px 10px 20px;background: #2a6395" data-toggle="collapse" data-target="#list-action-user" id="show-action-user" class="collapsed">
                                    <img class="profile-pic img-circle"  style="height: 28px;width: 28px;" src="<?php echo (Session::get('avatar') && Session::get('avatar') != '') ? base_url_cloud() . 'cdn/' . Session::get('avatar') : base_url_cloud() . 'tmp/public/images/logo.png'; ?>">
                                    <span style="margin-left:5px"><?php echo Session::get('username'); ?></span>
                                    <span id="caret-menu-user"><i class="fa fa-angle-up caret-menu-icon" aria-hidden="true"></i></span>
                                </a>
                                <div id="list-action-user" class="collapse" style="height: 0px;">
                                    <ul class="nav-user-sub">
                                        <li>
                                            <a onclick="your_account()" href="<?php echo base_url() . 'users/manager/view/' . Session::get('id'); ?>">
                                                <i class="fa fa-lg fa-fw fa-user" aria-hidden="true"></i>
                                                <span><?php echo lang('profile'); ?></span>
                                            </a>
                                        </li>
                                       <!--  <li>
                                            <a onclick="change_password()" href="<?php echo base_url() . 'users/manager/edit/' . Session::get('id'); ?>">
                                                <i class="fa fa-lg fa-fw fa-pencil-square" aria-hidden="true"></i>
                                                <span>Đổi mật khẩu và thông tin</span>
                                            </a>
                                        </li> -->
                                        <li>
                                            <a target="_blank" href="">
                                                <i class="fa fa-lg fa-fw fa-clone" aria-hidden="true"></i>
                                                <span>Điều khoản dịch vụ</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="">
                                                <i class="fa fa-lg fa-fw fa-clone" aria-hidden="true"></i>
                                                <span>Chính sách bảo mật</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a onclick="logout()" href="<?php echo base_url() . 'login/login/logout'; ?>">
                                                <i class="fa fa-lg fa-fw fa-sign-out" aria-hidden="true"></i>
                                                <span><?php echo lang('signout'); ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end collapse menu user -->
                    </aside>