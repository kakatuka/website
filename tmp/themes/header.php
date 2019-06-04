<div class="topbar">
    <div class="container">
        <div class="col-md-6 col-sm-5 col-xs-12 ltbar">
            <h1><b>Công ty du lịch uy tín nhất tại Việt Nam</b></h1>
        </div>
        <div class="col-md-6 col-sm-7 col-xs-12 rtbar">
            <div class="tbrmenus">
                <a href="<?php base_url().'gioi-thieu.htm'?>">Giới thiệu</a>
                <a href="#">Quan hệ cổ đông</a>
                <a href="#">Điều khoản</a>
            </div>
            <div class="langmenus">
                <span class="vi">Tiếng Việt</span>
                <ul class="hidden">
                    <li class="en">
                        <span class="linkout" data-link="">English</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container header">
    <div class="col-md-3 col-sm-3 col-xs-12 hlogo">
        <a href="index.html" title="Công Ty Cổ Phần Lữ Hành Fiditour">
            <img src="<?php echo getImage($_web['settings']['logo'],230,90,2);?>" alt="Công Ty Cổ Phần Lữ Hành Fiditour" class="img-responsive">
        </a>
    </div>
    <div class="col-md-6 col-sm-9 col-xs-12 hban">
        <img src="<?php echo base_url().'tmp/public/' ?>images/ve-may-bay-con-dao.gif" alt="Vé máy bay Côn Đảo" data-link="http://fidiair.com/gia-ve-may-bay-di-con-dao" class="img-responsive linkout" />
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12 hright">
        <div class="stextdiv">
            <input type="text" class="form-control txtsearch" maxlength="255" placeholder="Nhập từ khóa cần tìm">
            <button type="button" class="btnsearch"><span class="search-ico"></span></button>
        </div>
        <div class="hrlinkdiv">
            <a href="#" title="Đăng ký đại lý" rel="nofollow">Đăng ký đại lý</a>
            <a href="#" title="Thư góp ý" rel="nofollow">Thư góp ý</a>
        </div>
    </div>
</div>
<div id="stickymenu">
    <div class="mainmenubar">
        <div class="container" style="height: 50px;">
           <?php require_once "menu.php";?>
        </div>
    </div>
    <div class="toursearchbar">
        <div class="search-caption">
            <span></span>
        </div>
        <div class="triangle-right">
        </div>
        <div class="search-frm">
            <label>
                <input type="radio" name="radiotour" id="trongnuoc" value="1" checked /> Trong nước
            </label>
            <label>
                <input type="radio" name="radiotour" id="nuocngoai" value="2" /> Nước ngoài
            </label>
            <div class="dropdown" id="">
                <select class="form-control select_f_search" id="select_f_search_diemden">
                    <option value='0'>Lựa chọn điểm đến</option>
                    <option value='du-lich-buon-ma-thuot-tm24'>Buôn Ma Thuột</option>
                    <option value='ca-mau'>Cà Mau</option>
                    <option value='can-tho'>Cần thơ</option>
                    <option value='du-lich-con-dao-tm11'>Côn Đảo</option>
                    <option value='du-lich-da-lat-tm9'>Đà Lạt</option>
                    <option value='du-lich-da-nang-tm13'>Đà Nẵng</option>
                    <option value='du-lich-ha-long-tm20'>Hạ Long</option>
                    <option value='du-lich-ha-noi-tm19'>Hà Nội</option>
                    <option value='du-lich-hai-phong'>Hải Phòng</option>
                    <option value='du-lich-hoi-an-tm31'>Hội An</option>
                    <option value='du-lich-hue-tm32'>Huế</option>
                    <option value='du-lich-lao-cai-sapa-tm21'>Lào Cai - Sapa</option>
                    <option value='du-lich-nha-trang-tm8'>Nha Trang</option>
                    <option value='du-lich-ninh-binh-tm18'>Ninh Bình</option>
                    <option value='du-lich-phan-thiet-tm7'>Phan Thiết</option>
                    <option value='du-lich-phu-quoc-tm10'>Phú Quốc</option>
                    <option value='du-lich-phu-yen-tm16'>Phú Yên</option>
                    <option value='du-lich-quang-ngai-tm33'>Quảng Ngãi</option>
                    <option value='du-lich-quy-nhon-tm15'>Quy Nhơn</option>
                    <option value='soc-trang'>Sóc Trăng</option>
                    <option value='du-lich-tp-ho-chi-minh-tm1'>Tp Hồ Chí Minh</option>
                    <option value='du-lich-vung-tau-tm23'>Vũng Tàu</option>
                </select>
            </div>
            <div class="dropdown">
                <select class="form-control select_f_search" id="select_f_search_km">
                    <option value="0">Tất cả</option>
                    <option value="1">Khuyến mãi</option>
                </select>
            </div>
            <button type="button" class="btnsearchtour">
                <span class="triangle-left01">
                </span>
                <span class="btntext"></span>
                <span class="triangle-right01"></span>
            </button>
        </div>
    </div>
  <!--   <script>
    $('#select_f_search_diemden').fSelect({
        placeholder: 'Lựa chọn?',
        numDisplayed: 5,
        overflowText: '{n} Điểm đến',
        searchText: 'Lọc nhanh',
        showSearch: true
    });
    </script> -->
</div>
