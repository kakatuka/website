<div class="container body-content">
    <div class="col-md-12 col-sm-12 col-xs-12 left-col">
    </div>
</div>
<div class="body-footer">
    <div id="hotline">
        <div class="i_hotline activehotline">
            HOTLINE <span class="phoneicon"><span class="ping"></span></span>
        </div>
        <div class="c_hotline">
            <ul class="hotline_fir">
                <li>HOTLINE 24/7</li>
                <li>Tour nước ngoài<ul class="hotline_last">
                        <li>Tour đoàn: Mr Văn Tùng <span data-link="tel:0919599709" class="linkout">0919599709</span></li>
                        <li>Tour lẻ: Ms Phương Uyên <span data-link="tel:0983646329" class="linkout">0983646329</span></li>
                    </ul>
                </li>
                <li>Tour trong nước<ul class="hotline_last">
                        <li>Tour đoàn: Ms Tuyết Loan <span data-link="tel:0984203877" class="linkout">0984203877</span></li>
                        <li>Tour lẻ: Ms Hồng Ngân <span data-link="tel:0907832656" class="linkout">0907 832 656</span></li>
                    </ul>
                </li>
                <li>Vé máy bay<ul class="hotline_last">
                        <li>Ms. Hồng yến <span data-link="tel:0989504163" class="linkout">0989 504 163</span></li>
                        <li>Ms. Thúy Hằng <span data-link="tel:0983551991" class="linkout">0983 551 991</span></li>
                    </ul>
                </li>
                <li>Đặt phòng khách sạn<ul class="hotline_last">
                        <li>Ms Phương Uyên <span data-link="tel:0983646329" class="linkout">0983646329</span></li>
                    </ul>
                </li>
                <li>Tư vấn tổ chức sự kiện<ul class="hotline_last">
                        <li> Mr. Quang Long <span data-link="tel:0904953959" class="linkout">0904 953 959</span></li>
                    </ul>
                </li>
                <li>English speaking consultant<ul class="hotline_last">
                        <li>English support <span data-link="tel:0792730015" class="linkout">0792 730 015</span></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="bottomdiv">
        <div class="quicklinkbg">
            <div class="container">
                <div class="fmenu fmnu0"><span class="ftit">Thông tin hữu ích</span><span class="cbg"></span>
                    <div>
                        <?php
                            if (!empty($_web['footer_1'])) {
                                foreach ($_web['footer_1'] as $key => $value) {
                                    ?>
                                       <a href="<?php echo $value['link']?>"><?php echo $value['title']?></a>
                                    <?php
                                }
                            }
                        ?>  
                    </div>
                </div>
                <div class="fmenu fmnu1">
                    <a href="" title="Tour du lịch trong nước" class="ftit">Du lịch trong nước</a><span class="cbg"></span>
                    <div>
                         <?php
                            if (!empty($_web['footer_2'])) {
                                foreach ($_web['footer_2'] as $key => $value) {
                                    ?>
                                       <a href="<?php echo $value['link']?>"><?php echo $value['title']?></a>
                                    <?php
                                }
                            }
                        ?>  
                    </div>
                    <div>
                        <?php
                            if (!empty($_web['footer_3'])) {
                                foreach ($_web['footer_3'] as $key => $value) {
                                    ?>
                                       <a href="<?php echo $value['link']?>"><?php echo $value['title']?></a>
                                    <?php
                                }
                            }
                        ?>  
                    </div>
                    <div>
                        <?php
                            if (!empty($_web['footer_4'])) {
                                foreach ($_web['footer_4'] as $key => $value) {
                                    ?>
                                       <a href="<?php echo $value['link']?>"><?php echo $value['title']?></a>
                                    <?php
                                }
                            }
                        ?>  
                    </div>
                </div>
                <div class="fmenu fmnu2">
                    <a href="du-lich-nuoc-ngoai.html" title="Du lịch nước ngoài" class="ftit">Du lịch nước ngoài</a><span class="cbg"></span>
                    <div>
                        <?php
                            if (!empty($_web['footer_5'])) {
                                foreach ($_web['footer_5'] as $key => $value) {
                                    ?>
                                       <a href="<?php echo $value['link']?>"><?php echo $value['title']?></a>
                                    <?php
                                }
                            }
                        ?>  
                    </div>
                    <div>
                        <?php
                            if (!empty($_web['footer_6'])) {
                                foreach ($_web['footer_6'] as $key => $value) {
                                    ?>
                                       <a href="<?php echo $value['link']?>"><?php echo $value['title']?></a>
                                    <?php
                                }
                            }
                        ?>  
                    </div>
                    <div>
                        <?php
                            if (!empty($_web['footer_7'])) {
                                foreach ($_web['footer_7'] as $key => $value) {
                                    ?>
                                       <a href="<?php echo $value['link']?>"><?php echo $value['title']?></a>
                                    <?php
                                }
                            }
                        ?>  
                    </div>
                    <div>
                       <?php
                            if (!empty($_web['footer_8'])) {
                                foreach ($_web['footer_8'] as $key => $value) {
                                    ?>
                                       <a href="<?php echo $value['link']?>"><?php echo $value['title']?></a>
                                    <?php
                                }
                            }
                        ?>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container bottom-info">
        <div class="col-md-4 col-sm-6 cont-info">
            <div class="caption">
                <span class="text">Liên hệ</span>
                <span class="cbg"></span>
            </div>
            <div class="address">
                <span><?php echo $_web['settings']['address'] ?></span>
                <span>Điện thoại: <span data-link="tel:<?php echo $_web['settings']['phone_hn'] ?>" class="linkout"><?php echo $_web['settings']['phone_hn'] ?></span>
                <span>Fax: <?php echo $_web['settings']['fax_hn'] ?></span>
                <span>Email:  <?php echo $_web['settings']['email'] ?><span data-link="mailto: <?php echo $_web['settings']['email'] ?>" class="f-email linkout"></span></span>
            </div>
            <div class="caption">
                <span class="text">Chấp nhận thanh toán</span>
                <span class="cbg"></span>
            </div>
            <div class="card-payment">
                <span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 logo-info">
            <a href="#" title="Fiditour">
                <img src="<?php echo getImage($_web['settings']['logo'],236,100,2);?>" alt="Công ty du lịch Fiditour" />
            </a>
            <div class="social-connect">
                <span class="title">Kết nối cùng Fiditour qua</span>
                <span class="socialLink facebook" data-link="<?php echo $_web['settings']['link_facebook'] ?>">
                </span>
                <span class="socialLink youtube" data-link="<?php echo $_web['settings']['link_youtube'] ?>">
                </span>
                <span class="socialLink twitter" data-link="<?php echo $_web['settings']['link_tt'] ?>">
                </span>
                <span class="socialLink rssfeed" data-link="https://www.fiditour.com/rss.html">
                </span>
            </div>
        </div>
        <div class="col-md-5 col-sm-12 bottomintro">
            <div class="bott-introtext">
                <b>Thương hiệu du lịch lữ hành uy tín hàng đầu tại Việt Nam</b>
                <p><b>Công Ty Cổ Phần Lữ Hành Fiditour là công ty du lịch</b> luôn đi tiên phong trong việc đưa ra những chương trình khám phá tour tuyến mới lạ, độc đáo, cũng như những bước đột phá trong tổ chức dịch vụ du lịch.</p>
            </div>
            <div class="bottom-awards">
                <span><b>Với rất nhiều giải thưởng trong nước và quốc Tế.</b></span>
            </div>
            <div class="awards">
                <script>
                $(document).ready(function() {
                    $("#owlawards").owlCarousel({
                        autoPlay: 3000,
                        items: 2,
                        itemsDesktop: [1199, 2],
                        itemsDesktopSmall: [979, 2],
                        navigation: false,
                        pagination: false
                    });
                    $(document).delegate("div.social-connect .socialLink", "click", function(e) {
                        var datalink = $(this).attr("data-link");
                        window.location.assign(datalink);
                    });
                });
                </script>
                <div id="owlawards" class="owl-carousel">
                    <div class="item"><img src="<?php echo base_url().'tmp/public/'?>images/award2.png" alt=" Doanh nghiệp Lữ hành NỘI ĐỊA hàng đầu (8 năm liên tiếp)"> Doanh nghiệp Lữ hành NỘI ĐỊA hàng đầu (8 năm liên tiếp)</div>
                    <div class="item"><img src="<?php echo base_url().'tmp/public/'?>images/award1.png" alt=" 18 năm liên tiếp TOPTEN Lữ hành Quốc tế hàng đầu đưa khách đi du lịch nước ngoài"> 18 năm liên tiếp TOPTEN Lữ hành Quốc tế hàng đầu đưa khách đi du lịch nước ngoài</div>
                </div>
            </div>
        </div>
    </div>
    <div class="topline"></div>
    <div class="bottomline"></div>
    <div class="footer-info">
        Bản quyền thuộc Lữ Hành Fiditour ® 2019. Bảo lưu mọi quyền. Ghi rõ nguồn "www.fiditour.com" ® khi sử dụng lại thông tin từ website này<br />
        Số đăng ký kinh doanh: 0315532382 do Sở kế hoạch và đầu tư TPHCM cấp.
        <img src="<?php echo base_url().'tmp/public/'?>/images/dathongbao.jpg" alt="đã thông báo" /></div>
</div>