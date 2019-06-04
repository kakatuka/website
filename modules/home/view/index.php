<?php require_once DIR_TMP.'themes/slider.php'; ?> 
<div class="midd-menus">
        <div class="container">
            <div id="owlmenus" class="owl-carousel">
                <div class="item">
                    <a href="" title="TOUR CHÂU ÂU 5*" class="" target="_blank" rel="nofollow">TOUR CHÂU ÂU 5*</a>
                </div>
                <div class="item">
                     <a href="" title="TOUR ĐÊM TRẮNG NƯỚC NGA" class="" target="_blank" rel="">TOUR ĐÊM TRẮNG NƯỚC NGA</a>
                 </div>
                <div class="item">
                    <a href="" title="Tour giá tốt" target="_blank" rel=""><img src="<?php echo base_url().'tmp/public/'?>Upload/images/icon/discount.png" alt="Tour giá tốt" />Tour giá tốt</a>
                </div>
                <div class="item">
                    <a href="" title="Lịch khởi hành theo tháng" target="" rel="canonical"><img src="<?php echo base_url().'tmp/public/'?>Upload/images/icon/LichKhoiHanh1.gif" alt="Lịch khởi hành" />Lịch khởi hành</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container hottourdiv">
        <div class="hot-caption">
            <div class="linebg"></div>
            <div class="caption-bg">
                <span>Đi du lịch chất với</span>
                <span>Hot Tour</span>
            </div>
        </div>
        <div class="hotpanelitem" id="tabs">
            <div class="tour-paging">
                <a data-toggle='tab' href='#home' class='active'>1</a><a data-toggle='tab' href='#menu1'> 2 </a>
            </div>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <?php
                        if ($this->data['product_hot']) {
                            foreach ($this->data['product_hot'] as $key => $value) {
                                 if ($key < 5) {  
                               ?>
                                <div class="hotitem fadeInLeft">
                                    <div class="item-child" title="<?php echo $value['name'] ?>" data-toggle="tooltip">
                                        <div>
                                            <a href="<?php echo base_url() .  $value['alias'] . "-" .  $value['id'] . ".htm"; ?>">
                                                <img src="<?php echo getImage($value['image'],220,160,1);?>" alt=" <?php echo $value['name'] ?>" />
                                                <span class="hover-bg"></span>
                                            </a>
                                            <span class='distext'>

                                                <?php
                                                if (!empty($value['price_market'])) {
                                                    $sale =  $value['price'] - $value['price_market'];
                                                    echo  number_format($sale);
                                                }      
                                                ?> 
                                            đ</span>
                                        </div>
                                        <div>
                                            <a href="<?php echo base_url() .  $value['alias'] . "-" .  $value['id'] . ".htm"; ?>" class="tit">
                                                <?php echo $value['name'] ?>
                                            </a>
                                            <div class="schedule">
                                                <span>Khởi hành</span>
                                                <span class="depdate pt_maybay"><?php echo date('d/m/Y',strtotime($value['start_date'])) ?></span>
                                                <span class="days"><?php echo $value['day'] ?></span>
                                            </div>
                                            <div class="hot-bott">
                                                <div>
                                                    <span class='oldprice'><?php echo number_format($value['price'] )?> đ</span>
                                                    <span class="newprice"><?php echo number_format($value['price_market'] )?> đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <?php
                                }
                            }
                        }

                    ?>
                   
                </div>
                <div id="menu1" class="tab-pane fade">
                    <?php
                        if ($this->data['product_hot']) {
                            foreach ($this->data['product_hot'] as $key => $value) {
                                if ($key >4) {  
                            ?>
                            <div class="hotitem fadeInLeft">
                                <div class="item-child" title="<?php echo $value['name'] ?>" data-toggle="tooltip">
                                    <div>
                                        <a href="<?php echo base_url() .  $value['alias'] . "-" .  $value['id'] . ".htm"; ?>">
                                            <img src="<?php echo getImage($value['image'],220,160,1);?>" alt="<?php echo $value['name'] ?>" />
                                            <span class="hover-bg"></span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="<?php echo base_url() .  $value['alias'] . "-" .  $value['id'] . ".htm"; ?>" class="tit">
                                           <?php echo $value['name'] ?>
                                        </a>
                                        <div class="schedule">
                                            <span>Khởi hành</span>
                                            <span class="depdate {css_pt}"><?php echo date('d/m/Y',strtotime($value['start_date'])) ?></span>
                                            <span class="days"><?php echo $value['day'] ?></span>
                                        </div>
                                        <div class="hot-bott">
                                            <div>
                                                <span class="newprice"><?php echo number_format($value['price'] )?> đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <?php
                             }
                            }
                        }

                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).on('click', '.tour-paging a', function() {
        $(".tour-paging a").removeClass('active');
        $(this).addClass('active');
    });
    </script>
    <script>
    $(document).ready(function() {
        var i = 0;
        $('#home').find('.item-child').each(function() {
            var strtxt = $(this).find('a.tit').html();
            strtxt = strtxt.trim();
            var lengthtext = strtxt.split(' ');
            var strfull = "";
            if (lengthtext.length > 12) {
                for (i = 0; i < 12; i++) {
                    strfull += lengthtext[i] + " ";
                }
                $(this).find('a.tit').html(strfull + "...");
            }
        });
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
        <!--3 CHUM TOUR TAI TRANG CHU-->
    <div class="container chumtour">
        <div class="col-xs-12 col-sm-12 col-md-4 domtour">
            <div class="tour-container">
                <div class="caption">
                    <div class="captext">
                        <h3><a href="<?php echo base_url().'du-lich-trong-nuoc-p1.htm'?>">Tour trong nước</a></h3>
                    </div>
                </div>
                <?php
                    if ($this->data['Trongnuoc']) {
                        foreach ($this->data['Trongnuoc'] as $key => $value) {
                          ?>
                           <div class="col-xs-12 col-sm-6 col-md-12 tour-item-fix">
                                <div class="tour-imgdiv">
                                    <a href="<?php echo base_url() .  $value['alias'] . "-" .  $value['id'] . ".htm"; ?>" title="<?php echo $value['name'] ?>">
                                        <img src="<?php echo getImage($value['image'],220,160,1);?>" alt="<?php echo $value['name'] ?>" />
                                    </a>
                                </div>
                                <div class="tour-cont">
                                    <a href="<?php echo base_url() .  $value['alias'] . "-" .  $value['id'] . ".htm"; ?>" class="tour-tit"><?php echo $value['name'] ?></a>
                                    <div class="schedule">
                                        <span>Khởi hành</span>
                                        <span class="depdate pt_maybay"><?php echo date('d/m/Y',strtotime($value['start_date'])) ?></span>
                                        <span class="days"><?php echo $value['day'] ?></span>
                                    </div>
                                    <div class="tour-price">
                                        <span class="prtext">Giá: <span class='oldprice'><?php echo number_format($value['price'] )?> đ</span></span>
                                        <?php
                                           if (!empty($value['price_market'])) {
                                                $sale =  $value['price'] - $value['price_market'];
                                              ?>
                                                <span class='prdis'><span></span><span>- <?php echo  number_format($sale);?> đ</span></span>
                                              <?php

                                           }
                                        ?> 
                                    </div>
                                    <div class='payoline'><span>Thanh toán online chỉ: </span><span><?php echo number_format($value['price_market'] )?> đ</span></div>
                                </div>
                            </div>
                          <?php
                        }
                    }
                ?>
                    
                <div class="col-xs-12 col-sm-6 col-md-12 moreitemdiv">
                    <a href="<?php echo base_url().'du-lich-trong-nuoc-p1.htm'?>">Xem nhiều tour hơn...</a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 outtour">
            <div class="tour-container">
                <div class="caption">
                    <div class="captext">
                        <h3><a href="<?php echo base_url().'du-lich-nuoc-ngoai-p2.htm'?>">Tour nước ngoài</a></h3>
                    </div>
                </div>  
               <?php
                    if ($this->data['Nuocngoai']) {
                        foreach ($this->data['Nuocngoai'] as $key => $value) {
                          ?>
                           <div class="col-xs-12 col-sm-6 col-md-12 tour-item-fix">
                                <div class="tour-imgdiv">
                                    <a href="<?php echo base_url() .  $value['alias'] . "-" .  $value['id'] . ".htm"; ?>" title="<?php echo $value['name'] ?>">
                                        <img src="<?php echo getImage($value['image'],220,160,1);?>" alt="<?php echo $value['name'] ?>" />
                                    </a>
                                </div>
                                <div class="tour-cont">
                                    <a href="<?php echo base_url() .  $value['alias'] . "-" .  $value['id'] . ".htm"; ?>" class="tour-tit"><?php echo $value['name'] ?></a>
                                    <div class="schedule">
                                        <span>Khởi hành</span>
                                        <span class="depdate pt_maybay"><?php echo date('d/m/Y',strtotime($value['start_date'])) ?></span>
                                        <span class="days"><?php echo $value['day'] ?></span>
                                    </div>
                                    <div class="tour-price">
                                        <span class="prtext">Giá: <span class='oldprice'><?php echo number_format($value['price'] )?> đ</span></span>
                                        <?php
                                           if (!empty($value['price_market'])) {
                                                $sale =  $value['price'] - $value['price_market'];
                                              ?>
                                                <span class='prdis'><span></span><span>- <?php echo  number_format($sale);?> đ</span></span>
                                              <?php

                                           }
                                        ?> 
                                    </div>
                                    <div class='payoline'><span>Thanh toán online chỉ: </span><span><?php echo number_format($value['price_market'] )?> đ</span></div>
                                </div>
                            </div>
                          <?php
                        }
                    }
                ?>
                <div class="col-xs-12 col-sm-6 col-md-12 moreitemdiv">
                    <a href="<?php echo base_url().'du-lich-nuoc-ngoai-p2.htm'?>">Xem nhiều tour hơn...</a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 fetour">
            <div class="tour-container">
                <div class="caption">
                    <div class="captext">
                        <h3><a href="<?php echo base_url().'tour-free-easy-p22.htm'?>">Tour free & easy</a></h3>
                    </div>
                </div>
                    <?php 
                        if ($this->data['free'] ) {
                           foreach ($this->data['free'] as $key => $value) {
                              ?>
                                <div class="col-xs-12 col-sm-6 col-md-12 tour-item-fix">
                                    <div class="tour-imgdiv">
                                        <a href="<?php echo base_url() .  $value['alias'] . "-" .  $value['id'] . ".htm"; ?>" title="<?php echo $value['name'] ?>"><img src="<?php echo getImage($value['image'],220,160,1);?>" alt="<?php echo $value['name'] ?>" /></a>
                                    </div>
                                    <div class="tour-cont">
                                        <a href="<?php echo base_url() .  $value['alias'] . "-" .  $value['id'] . ".htm"; ?>" class="tour-tit"><?php echo $value['name'] ?></a>
                                        <div class="schedule">
                                            <span>Khởi hành</span>
                                            <span class="depdate pt_maybay">Liên hệ</span>
                                            <span class="days"><?php echo $value['day'] ?></span>
                                        </div>
                                        <div class="tour-price">
                                            <span class="prtext">Giá: <?php echo  number_format($sale);?>  đ</span>
                                        </div>
                                    </div>
                                </div>
                              <?php
                           }
                        }

                    ?>
                <div class="col-xs-12 col-sm-6 col-md-12 moreitemdiv">
                    <a href="<?php echo base_url().'tour-free-easy-p22.htm'?>">Xem nhiều tour hơn...</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container ban-panel">
        <!-- <div class="col-xs-4 col-sm-4 col-md-4">
            <img data-src="https://www.fiditour.com/Upload/images/2019/advs/fidiair-ve-may-bay.jpg" alt="fidiair" data-link="http://fidiair.com" class="img-responsive lazy linkout">
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <img data-src="https://www.fiditour.com/Upload/images/2019/advs/dat-phong-khach-san.jpg" alt="fidibooking" data-link="http://fidibooking.com" class="img-responsive lazy linkout">
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <img data-src="https://www.fiditour.com/Upload/images/2019/advs/thue-xe-gia-tot.jpg" alt="thuexegiatot" data-link="http://thuexegiatot.com" class="img-responsive lazy linkout">
        </div> -->
    </div>
    <div class="container tintucsukien">
        <div class="col-xs-12 col-sm-12 col-md-6 tintuc">
            <div class="tinpl">
                <div class="caption">
                    <div>
                        <h5><a href="<?php echo base_url().'tin-tuc-su-kien-c1.htm'?>" title="Tin tức; sự kiện">Tin tức & sự kiện</a></h5>
                        <span class="cbg"></span>
                    </div>
                    <div class="rclink">
                        <a href="#" title="Tuyển dụng">Tuyển dụng</a>
                    </div>
                </div>
                <?php
                    if (!empty($this->data['new_hot'])) {
                        foreach ($this->data['new_hot'] as $key => $value) {
                            if ($key==0) {
                               ?>
                                <div class="artop-item">
                                    <div>
                                        <a href="<?php echo base_url() .  $value['alias'] . "-n" .  $value['id'] . ".htm"; ?>">
                                            <img data-src="<?php echo getImage($value['thumbnail'],555,370,1);?>" alt="<?php echo $value['title']; ?>" class="lazy" />
                                            <span>
                                               <?php echo $value['title']; ?>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="artop-brief">
                                        <span class="duptext">
                                             <?php echo date('d/m/Y',$value['create_time']);?>
                                        </span>
                                        <p> <?php echo $value['description']; ?></p>
                                    </div>
                                </div>
                               <?php
                            }
                        }
                    }
                ?>
                
                <div class="other-items">
                 <?php
                    if (!empty($this->data['new_hot'])) {
                        foreach ($this->data['new_hot'] as $key => $value) {
                            if ($key>0) {
                               ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <a href="<?php echo base_url() .  $value['alias'] . "-n" .  $value['id'] . ".htm"; ?>" title=" <?php echo $value['title']; ?>">
                                        <img data-src="<?php echo getImage($value['thumbnail'],81,60,1);?>" alt=" <?php echo $value['title']; ?>" class="lazy" />
                                        <span> <?php echo $value['title']; ?></span>
                                    </a>
                                </div>
                                <?php
                            }
                        }
                    }
                ?>            
                </div>
            </div>
            <a href="<?php echo base_url().'tin-tuc-su-kien-c1.htm'?>" title="Xem thêm" class="viewmore">Xem thêm...</a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 gocfiditourdiv">
            <div class="tinpl">
                <div class="caption">
                    <div>
                        <h5><a href="<?php echo base_url().'video-c6.htm'?>">Góc Fiditour</a></h5>
                        <span class="cbg"></span>
                    </div>
                    <div class="rclink">
                        <a href="" class="lphoto">Qua ảnh</a>
                        <a href="<?php echo base_url().'video-c6.htm'?>" class="lvideo">Video clips</a>
                        <a href="" class="lsong">Bài hát Fiditour</a>
                    </div>
                </div>
                <div class="artshow">
                    <?php
                        if (!empty($this->data['video'])) {
                            foreach ($this->data['video'] as $key => $value) {
                               if ($key == 0) {
                                 ?>
                                  <div class="artshowitem">
                                         <div class="dtboard">
                                            <iframe width="100%" src="https://www.youtube.com/embed/Z-W76R1e5aw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><a href="<?php echo base_url() .  $value['alias'] . "-n" .  $value['id'] . ".htm"; ?>" title="<?php echo $value['title']?>"><?php echo $value['title']?></a>
                                        </div>
                                        <span class="duptext">
                                           <?php echo date('d/m/Y',$value['create_time']);?>
                                        </span>
                                    </div>
                                 <?php
                                               
                                }                      
                           }  
                        }                
                    ?>            
                    
                   
                </div>
                <div class="other-items">
                   <?php
                    if (!empty($this->data['video'])) {
                        foreach ($this->data['video'] as $key => $value) {
                            if ($key>0) {
                               ?> 
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <a href="<?php echo base_url() .  $value['alias'] . "-n" .  $value['id'] . ".htm"; ?>" title="<?php echo $value['title']?>">
                                    <img data-src="<?php echo getImage($value['thumbnail'],81,60,1);?>" alt="<?php echo $value['title']?>" class="lazy" />
                                    <span><?php echo $value['title']?></span>
                                    </a>
                                </div>
                              <?php
                            }
                        }
                    }
                ?>            
                </div>
            </div>
            <a href="<?php echo base_url().'video-c6.htm'?>" title="Xem thêm" class="viewmore">Xem thêm...</a>
        </div>
    </div>
    <div class="clients-comment">
        <div class="container comments">
            <div class="comment-head">
                <div class="centerhead">
                    <span class="smalltext">Khách hàng nói gì về Fiditour?</span>
                    <h5 class="largetext">
                        Cảm nhận của khách hàng
                    </h5>
                    <span class="cbg"></span>
                </div>
                <div class="rclink">
                    <a href="an-tuong-fiditour.html" class="at">Ấn tượng Fiditour</a>
                    <a href="y-kien-khach-hang.html" class="dk">Du khách viết</a>
                    <a href="thu-gop-y.html" class="gy">Góp ý</a>
                </div>
                <div class="comment-line"></div>
            </div>
            <div class="comment-dt">
                <script>
                $(document).ready(function() {
                    $("#owlcomment").owlCarousel({
                        autoPlay: 3000,
                        items: 3,
                        itemsDesktop: [1199, 3],
                        itemsDesktopSmall: [979, 3]
                    });
                    var dot = $('.owl-pagination .owl-page');
                    dot.each(function() {
                        var index = $(this).index() + 1;
                        $(this).html(index);
                    });
                    var dot = $('.owl-pagination').append("<div class='xemthemcm'><a href='y-kien-khach-hang.html'>Xem thêm...</div>");
                });
                </script>
                <div id="owlcomment" class="owl-carousel">
                    <div class="item">
                        <a href="" class="cmimg" title="Cảm ơn Lữ Hành Fiditour"><img data-src="https://www.fiditour.com/Upload/images/YKienKhachHang/GreenFamilyDevelopment03Thumnail.JPG" alt="Cảm ơn Lữ Hành Fiditour" class="lazy" /><span>Cảm ơn Lữ Hành Fiditour</span>
                        </a><br>"T&ocirc;i xin cảm ơn tất cả, cảm ơn Lữ h&agrave;nh Fiditour đ&atilde; cho Green Family Development c&oacute; một chương tr&igrave;nh vinh danh &amp; nghỉ dưỡng thật đ&aacute;ng nhớ tại Tp. Đ&agrave; Nẵng.
                        "
                    </div>
                    <div class="item">
                        <a href="" class="cmimg" title="Chúng tôi luôn yên tâm về chất lượng dịch vụ của Lữ Hành Fiditour">
                            <img data-src="https://www.fiditour.com/Upload/images/YKienKhachHang/Japfa02Thumnail.jpg" alt="Chúng tôi luôn yên tâm về chất lượng dịch vụ của Lữ Hành Fiditour" class="lazy" />
                            <span>Chúng tôi luôn yên tâm về chất lượng dịch vụ của Lữ Hành Fiditour</span>
                        </a><br>"Đại diện c&ocirc;ng ty gửi lời c&aacute;m ơn đến tất cả anh/em team Lữ h&agrave;nh Fiditour đ&atilde; tổ chức rất chuy&ecirc;n nghiệp trong teambuiding v&agrave; Gala Dinner. "
                    </div>
                    <div class="item">
                        <a href="" class="cmimg" title="Một chuyến đi ý nghĩa và thành công">
                            <img data-src="https://www.fiditour.com/Upload/images/demo/TheKhenCuaBelleMaison2.jpg" alt="Một chuyến đi ý nghĩa và thành công" class="lazy" />
                            <span>Một chuyến đi ý nghĩa và thành công</span>
                        </a><br>"Vừa qua, kh&aacute;ch sạn Belle Maison Hadana Hoi An Resort &amp; Spa đ&atilde; hợp t&aacute;c với c&ocirc;ng ty Fiditour để thực hiện 02 đợt du lịch cho to&agrave;n thể nh&acirc;n vi&ecirc;n...."
                    </div>
                    <div class="item">
                        <a href="" class="cmimg" title="HÀNH TRÌNH TUYỆT VỜI">
                            <img data-src="https://www.fiditour.com/Upload/images2016/files/Minh%20hoa.jpg" alt="HÀNH TRÌNH TUYỆT VỜI" class="lazy" /><span>HÀNH TRÌNH TUYỆT VỜI</span>
                        </a>
                        <br>"Đêm gala cũng ấn tượng vô cùng và còn đặc biệt hơn chị là 1 trong 5 người bất ngờ được nhận sinh nhật trong đêm gala hôm đó. Xúc động và cám ơn các em đã chu đáo tới từng khách hàng."
                    </div>
                    <div class="item">
                        <a href="" class="cmimg" title="THƯ CÁM ƠN CỦA VIETSOVPETRO">
                            <img data-src="https://www.fiditour.com/Upload/images2016/files/Hinh%20bia.jpg" alt="THƯ CÁM ƠN CỦA VIETSOVPETRO" class="lazy" /><span>THƯ CÁM ƠN CỦA VIETSOVPETRO</span>
                        </a>
                        <br>"Trong khoảng thời gian từ 23/7-26/7/2018, Tôi và gia đình được cơ quan (Công đoàn Xí nghiệp Dịch vụ Cảng & cung ứng vật tư thiết bị - LD Việt Nga Vietsovpetro) phối hợp với Fiditour tổ chức chuyến du lịch Cát Bà - Hạ Long- Yên Tử - Ba Vàng - Bái Đính - Tràng An."
                    </div>
                    <div class="item">
                        <a href="" class="cmimg" title="HDV NHIỆT TÌNH, TẬN TÂM">
                            <img data-src="https://www.fiditour.com/Upload/images/demo/ThuKhenHDVQuyAnh01Thumnail.jpg" alt="HDV NHIỆT TÌNH, TẬN TÂM" class="lazy" /><span>HDV NHIỆT TÌNH, TẬN TÂM</span>
                        </a><br>"Thực sự chị cũng đi tour rất nhiều của nhiều c&ocirc;ng ty lớn nhỏ trong cả nước nhưng đ&acirc;y l&agrave; lần đầu ti&ecirc;n chị ấn tượng về 1 HDV. Nhiệt t&igrave;nh, hiểu biết, tận t&acirc;m - đ&oacute; l&agrave; những g&igrave; chị muốn n&oacute;i về em đ&oacute; Qu&yacute; Anh."
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lens-bg">
        <div class="container dimonspl">
            <div class="lens-tit">
                <span>Góc</span>
                <span>ảnh</span>
                <span>lữ</span>
                <span>hành</span>
            </div>
            <?php
                if (!empty($this->data['imgNew'] )) {
                    $i = 0;
                    foreach ($this->data['imgNew'] as $key => $value) {
                        if ($key==0) {
                            ?>
                            <div class="dimonbig">
                                <a href="<?php echo base_url() .  $value['alias'] . "-n" .  $value['id'] . ".htm"; ?>">
                                    <img data-src="<?php echo getImage($value['thumbnail'],550,550,1);?>" alt="<?php echo $value['title']?>" class="lazy" /><span><?php echo $value['title']?></span></a>
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="diamond dimon<?php echo $i?>">
                                <a href="<?php echo base_url() .  $value['alias'] . "-n" .  $value['id'] . ".htm"; ?>">
                                    <img data-src="<?php echo getImage($value['thumbnail'],260,260,1);?>" alt="<?php echo $value['title']?>" class="lazy" />
                                    <span><?php echo $value['title']?></span>
                                </a>
                            </div>
                            <?php
                        }
                        $i++;
                    }
                }
            ?>
            
        </div>
    </div>
    <div class="container" style="padding-left: 0px; padding-right: 0px;">
        <div class="col-md-6 col-sm-6 col-xs-12 khampha">
            <div class="caption">
                <div>
                    <h5><a href="<?php echo base_url().'kham-pha-c7.htm'?>" title="Khám phá">Khám phá</a></h5>
                    <span class="cbg"></span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 latestitem">
                <?php
                    if (!empty($this->data['khampha'])) {
                       foreach ($this->data['khampha'] as $key => $value) {
                        if ($key==0) {
                            ?>
                             <div class="latestart">
                            <a href="<?php echo base_url() .  $value['alias'] . "-n" .  $value['id'] . ".htm"; ?>" title="<?php echo $value['title']?>">
                                <img data-src="<?php echo getImage($value['thumbnail'],265,180,1);?>" alt="<?php echo $value['title']?>" class="lazy" />
                                <span><?php echo $value['title']?></span>
                            </a>
                            <span class="duptext"><?php echo date('d/m/Y',$value['create_time']);?></span>
                            <p style="text-align:justify"><em><?php echo $value['description']?></em></p>
                        </div>
                          <?php
                        }
                         
                       }
                    }
                ?>
                
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 itemdiv">
                <?php
                    if (!empty($this->data['khampha'])) {
                       foreach ($this->data['khampha'] as $key => $value) {
                        if ($key>0) {
                            ?>
                            <div class="artbott-item">
                                <a href="<?php echo base_url() .  $value['alias'] . "-n" .  $value['id'] . ".htm"; ?>" title="<?php echo $value['title']?>">
                                    <img data-src="<?php echo getImage($value['thumbnail'],76,65,1);?>" alt="<?php echo $value['title']?>" class="lazy" />
                                    <span><?php echo $value['title']?></span>
                                </a>
                                <br />
                                <span class="duptext"><?php echo date('d/m/Y',$value['create_time']);?></span>
                            </div>
                           <?php
                        }
                         
                       }
                    }
                ?>
                <a href="<?php echo base_url().'kham-pha-c7.htm'?>" class="moreitem" title="Click để xem nhiều tin hơn">Xem thêm...</a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 camnang">
            <div class="caption">
                <div>
                    <h5><a href="<?php echo base_url().'cam-nang-du-lich-c4.htm'?>" title="Cẩm nang du lịch">Cẩm nang du lịch</a></h5>
                    <span class="cbg"></span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 latestitem">
                 <?php
                    if (!empty($this->data['camnang'])) {
                       foreach ($this->data['camnang'] as $key => $value) {
                        if ($key==0) {
                            ?>
                             <div class="latestart">
                            <a href="<?php echo base_url() .  $value['alias'] . "-n" .  $value['id'] . ".htm"; ?>" title="<?php echo $value['title']?>">
                                <img data-src="<?php echo getImage($value['thumbnail'],265,180,1);?>" alt="<?php echo $value['title']?>" class="lazy" />
                                <span><?php echo $value['title']?></span>
                            </a>
                            <span class="duptext"><?php echo date('d/m/Y',$value['create_time']);?></span>
                            <p style="text-align:justify"><em><?php echo $value['description']?></em></p>
                        </div>
                          <?php
                        }
                         
                       }
                    }
                ?>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 itemdiv">
                 <?php
                    if (!empty($this->data['camnang'])) {
                       foreach ($this->data['camnang'] as $key => $value) {
                        if ($key>0) {
                            ?>
                            <div class="artbott-item">
                                <a href="<?php echo base_url() .  $value['alias'] . "-n" .  $value['id'] . ".htm"; ?>" title="<?php echo $value['title']?>">
                                    <img data-src="<?php echo getImage($value['thumbnail'],76,65,1);?>" alt="<?php echo $value['title']?>" class="lazy" />
                                    <span><?php echo $value['title']?></span>
                                </a>
                                <br />
                                <span class="duptext"><?php echo date('d/m/Y',$value['create_time']);?></span>
                            </div>
                           <?php
                        }
                         
                       }
                    }
                ?>
                <a href="<?php echo base_url().'cam-nang-du-lich-c4.htm'?>" class="moreitem" title="Click để xem nhiều tin hơn">Xem thêm...</a>
            </div>
        </div>
    </div>
    <div class="container newcheckin">
        <div class="checkin-head">
            <h5>Điểm đến mới</h5>
            <span class="cbg"></span>
        </div>
        <div class="checkinlist">
            <?php
                if (!empty($this->data['diemden'])) {
                   foreach ($this->data['diemden'] as $key => $value) {
                        if ($key < 3) {
                          ?>
                            <div class="col-md-4 col-sm-6 grayitem">
                                <a href="<?php echo base_url() .  $value['alias'] . "-n" .  $value['id'] . ".htm"; ?>" title="<?php echo $value['title']?>">
                                    <img data-src="<?php echo getImage($value['thumbnail'],195,180,1);?>" alt="<?php echo $value['title']?>" class="lazy" />
                                    <span><?php echo $value['title']?></span>
                                </a>
                                <span class='brief'><?php echo $value['description']?></span>
                            </div>
                          <?php
                        }else{
                            ?>
                            <div class="col-md-4 col-sm-6 facitem">
                                <a href="<?php echo base_url() .  $value['alias'] . "-n" .  $value['id'] . ".htm"; ?>" title="<?php echo $value['title']?>">
                                    <img data-src="<?php echo getImage($value['thumbnail'],195,180,1);?>" alt="<?php echo $value['title']?>" class="lazy" />
                                    <span><?php echo $value['title']?></span>
                                </a>
                                <span class='brief'><?php echo $value['description']?></span>
                            </div>
                            <?php
                        }
                   }
                }
            ?>
            <a href="<?php echo base_url().'diem-den-moi-c5.htm'?>" title="Xem thêm" class="viewmore">Xem thêm...</a>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        var imagesArray = $(".checkinlist .col-md-4").find(".brief").each(function(index) {
            var strHtml = $(this).html();
            var array = strHtml.split(' ');
            var i;
            if (array.length > 25) {
                var strHtmlCut = "";
                for (i = 0; i <= 25; i++) {
                    strHtmlCut += array[i] + ' ';
                }
                $(this).html(strHtmlCut + '...');
            }
        });
    });
    </script>
<?php
   if (!empty($this->data['popup'] )) {
       ?>
        <div id="bkgOverlay" class="backgroundOverlay">
        </div>
        <div id="delayedPopup" class="delayedPopupWindow">
            <a href="#" id="btnClose" title="Đóng lại"><span class="glyphicon glyphicon-remove"></span></a>
            <div>
                <a href="" >
                    <img class="img-responsive" src="<?php echo getImage($this->data['popup']['images'],800,400,1);?>" alt="<?php echo $this->data['popup']['title']?>">
                </a>
            </div>
        </div>
       <?php
   }
?>
    