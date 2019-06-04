<div class="container Breadcrumbs">
    <ol vocab="https://schema.org/" typeof="BreadcrumbList">
        <li property="itemListElement" typeof="ListItem">
            <a property="item" typeof="WebPage" href="<?php echo base_url()?>" title="Trang chủ du lịch Fiditour"><span property="name">Du lịch</span></a>
            <meta property="position" content="1" />
        </li>
        ›<li property="itemListElement" typeof="ListItem">
            <a property="item" typeof="WebPage" href="" title="Du lịch nước ngoài"><span property="name">Du lịch nước ngoài</span></a>
            <meta itemprop="position" content="1" />
        </li>›<li property="itemListElement" typeof="ListItem">
            <a property="item" typeof="WebPage" href="" title="tour du lịch nước ngoài tháng 7 từ công ty du lịch Fiditour - Xem theo dạng lưới"><span property="name">tour du lịch nước ngoài tháng 7 từ công ty du lịch Fiditour - Xem theo dạng lưới</span></a>
            <meta itemprop="position" content="2" />
        </li>
    </ol>
</div>
<div class="container body-content">
    <div class="col-md-9 col-sm-9 col-xs-12 left-col">
        <div class="tour-entry">
            <div class="page-title" id="page-title">
                <h1><?php echo $this->data['infoCate']['title'] ?></h1><span class="cbg"></span>
            </div>
            <div class="content_listour" id="content_listour">
                <script src="https://sp.zalo.me/plugins/sdk.js" defer async></script>
                <div class="" id="bg_panel">
                    <p><?php echo $this->data['infoCate']['description'] ?></p>
                    <div class="rating">
                        <div class="sharebtn">
                            <span class="facebook linkout" data-link="https://www.facebook.com/sharer/sharer.php?u=https://www.fiditour.com/du-lich-nuoc-ngoai/tour-thang-t7-2019.html?view=grid"></span>
                            <span class="twitter linkout" data-link="https://twitter.com/intent/tweet?url=https://www.fiditour.com/du-lich-nuoc-ngoai/tour-thang-t7-2019.html?view=grid"></span>
                            <span class="linkedin linkout" data-link="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://www.fiditour.com/du-lich-nuoc-ngoai/tour-thang-t7-2019.html?view=grid"></span>
                            <div class="zalo-share-button" data-href="https://www.fiditour.com/du-lich-nuoc-ngoai/tour-thang-t7-2019.html?view=grid" data-oaid="579745863508352884" data-layout="3" data-color="white" data-customize=false></div>
                            <span class="pinterest linkout" data-link="https://www.pinterest.com/pin/find/?url=https://www.fiditour.com/du-lich-nuoc-ngoai/tour-thang-t7-2019.html?view=grid"></span>
                            <a href="mailto:?subject=tour du lịch nước ngoài tháng 7 từ công ty du lịch Fiditour&amp;body=https://www.fiditour.com/du-lich-nuoc-ngoai/tour-thang-t7-2019.html?view=grid" title="Share by Email" class="svg_mail" rel="nofollow"></a>
                        </div>
                        <span class="s_rating" id="">
                            Đánh giá: <span id="jRate"></span> 0/5 (trong <span class='tongdg'>0</span>)
                        </span>
                        <script>
                        $(document).ready(function() {
                            var that = this;
                            var toolitup = $("#jRate").jRate({
                                rating: 0,
                                startColor: "orange",
                                endColor: "red",
                                strokeColor: 'black',
                                precision: 1,
                                minSelected: 1,
                                onChange: function(rating) {
                                    //console.log("OnChange: Rating: "+rating);
                                },
                                onSet: function(rating) {
                                    //console.log("OnSet: Rating: " + rating);
                                    var mydata = JSON.stringify({
                                        star: rating,
                                        url: "/du-lich-nuoc-ngoai/tour-thang-t7-2019.html"
                                    });
                                    $.ajax({
                                        type: "post",
                                        url: "/Getrating",
                                        data: mydata,
                                        datatype: "json",
                                        contentType: "application/json; charset=utf-8",
                                        ajaxasync: true,
                                        success: function(result) {
                                            // alert(result);
                                            if (result == "0") {
                                                alert("Bạn đã đánh giá rồi.")
                                            }
                                            if (result == "1") {
                                                alert("Cám ơn bạn đã đánh giá.")
                                                var tongdg = $(".tongdg").text();
                                                $(".tongdg").text(parseInt(tongdg) + 1);
                                            }
                                        },
                                        error: function(result) {
                                            alert("Có lỗi xảy ra. Hãy thử lại.")
                                        }
                                    });
                                }
                            });

                            $('#btn-click').on('click', function() {
                                toolitup.setRating(0);
                            });

                        });
                        </script>
                    </div>
                </div>
                <div id='mylist'>
                   <?php
                    if ( !empty($this->data['data']) ) {

                      foreach ($this->data['data'] as $key => $value) {
                        ?>
                            <div class="col-md-4 col-sm-4 col-xs-12 bg_grid_tour">
                                <div class="bg_grid_tour_child">
                                    <div class="gridtourimg">
                                         <a href="<?php echo base_url() .  $value['alias'] . "-" .  $value['id'] . ".htm"; ?>" title="<?php echo $value['name'] ?>">
                                            <img src="<?php echo getImage($value['image'],259,165,1);?>" class="tourphoto" alt=" <?php echo $value['name'] ?>" >
                                            <span>
                                                <?php if ( $value['hot']==1): ?>
                                                      <img src="<?php echo base_url().'tmp/public/' ?>/images/hotimg.gif" class="img-hot" alt="tour hot"> 
                                                <?php endif ?>
                                                <?php echo $value['name'] ?>
                                            </span>
                                        </a>
                                        <div class="notetourname"></div>
                                        <span style="display:none;"></span>
                                    </div>
                                    <div class="gridcode">
                                        Mã tour: NNA18886-02072019-SD
                                    </div>
                                    <div class="griddep">
                                        Khởi hành: <span class="pt_maybay"></span><?php echo $value['day'] ?><br />
                                        Thời gian đi: <?php echo $value['tour_car'] ?>
                                    </div>
                                    <div class="gridprice">
                                        <div class="giathuc"><?php echo number_format($value['price'] )?> đ</div>
                                        <?php if ($value['price_market'] >0): ?>
                                             <div class='giadagiam'><?php echo number_format($value['price_market'] )?> đ</div>
                                        <?php endif ?>
                                       
                                    </div>
                                </div>
                            </div>
                        <?php
                      }
                    }
                  ?>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 col-content-tour">
                <div class="navbar-right">
                 <?php if(!empty($this->data['pagination'])){
                        echo $this->data['pagination'];
                      } ?>
                </div>
            </div>
        </div>
        <!--scriptfilter-->
        <script>
        $(document).ready(function() {
            'use strict';
            var filter = $('input#filterinput'),
                clearfilter = $('input#clearfilter');
            $('#mylist').listfilter({
                'filter': filter,
                'clearlink': clearfilter
            });
            $("#filterinput").keydown(function() {
                var kq = $("ul#mylist li.nd_list[style*='display: inline-block']").length;
                var kq2 = $("#mylist .bg_grid_tour[style*='display: block']").length;
                if (kq == "0") {
                    $(".left_ul li:first-child").text("Có tổng cộng " + kq2 + " tour");
                }
                if (kq2 == "0") {
                    $(".left_ul li:first-child").text("Có tổng cộng " + kq + " tour");
                }
            });
        });
        </script>
        <script type="application/ld+json">
        {
            "@context": "http://schema.org/",
            "@type": "Review",
            "itemReviewed": {
                "@type": "Thing",
                "name": "tour du lịch nước ngoài tháng 7 từ công ty du lịch Fiditour"
            },
            "author": {
                "@type": "Person",
                "name": "0 đánh giá"
            },
            "reviewRating": {
                "@type": "Rating",
                "ratingValue": 0,
                "bestRating": 5
            },
            "publisher": {
                "@type": "Organization",
                "name": "du lịch Fiditour"
            }
        }
        </script>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12 right-col">
        <div class="right-menu">
            <div class="flat-menutitle">
                <span>TOUR NƯỚC NGOÀI</span>
            </div>
            <ul class="flat-menus">
                <li class="singleli"><a href="https://www.fiditour.com/du-lich-nuoc-ngoai/tour-thang-t5-2019.html" title="" class="" target="" rel=""><span class="triangle-left"></span>Tour tháng 5/2019</a></li>
                <li class="singleli"><a href="https://www.fiditour.com/du-lich-nuoc-ngoai/tour-thang-t6-2019.html" title="" class="" target="" rel=""><span class="triangle-left"></span>Tour tháng 6/2019</a></li>
                <li class="singleli"><a href="https://www.fiditour.com/du-lich-nuoc-ngoai/tour-thang-t7-2019.html" title="" class="" target="" rel=""><span class="triangle-left"></span>Tour tháng 7/2019</a></li>
                <li class="singleli"><a href="/du-lich-nuoc-ngoai/free-easy-bt11.html" title="Tour Free &amp; Easy" class="" target="" rel=""><span class="triangle-left"></span>Tour Free &amp; Easy</a></li>
                <li class="singleli"><a href="/du-lich-nuoc-ngoai/hanh-huong-ve-dat-phat-bt114.html" title="Hành hương về đất phật" class="" target="" rel=""><span class="triangle-left"></span>Hành hương về đất phật</a></li>
                <li class="singleli"><a href="/du-lich-nuoc-ngoai/hoi-cho-dang-to-chuc-bt54.html" title="Hội chợ đang tổ chức" class="" target="" rel=""><span class="triangle-left"></span>Hội chợ đang tổ chức</a></li>
                <li class="singleli"><a href="/du-lich-nuoc-ngoai/tour-du-thuyen-bt79.html" title="Tour du thuyền" class="" target="" rel=""><span class="triangle-left"></span>Tour du thuyền</a></li>
                <li class="singleli"><a href="/du-lich-nuoc-ngoai/du-lich-chau-a.html" title="Du lịch Châu Á" class="" target="" rel=""><span class="triangle-left"></span>Tour du lịch Châu Á</a></li>
                <li class="singleli"><a href="/du-lich-nuoc-ngoai/du-lich-chau-my.html" title="Tour châu Mỹ" class="" target="" rel=""><span class="triangle-left"></span>Tour châu Mỹ</a></li>
                <li class="singleli"><a href="/du-lich-nuoc-ngoai/du-lich-chau-au.html" title="Tour du lịch Châu Âu" class="" target="" rel=""><span class="triangle-left"></span>Tour du lịch Châu Âu</a></li>
                <li class="singleli"><a href="/du-lich-nuoc-ngoai/du-lich-chau-uc.html" title="Tour Châu Úc" class="" target="" rel=""><span class="triangle-left"></span>Tour Châu Úc</a></li>
                <li class="singleli"><a href="/du-lich-nuoc-ngoai/du-lich-chau-phi.html" title="Tour Châu Phi" class="" target="" rel=""><span class="triangle-left"></span>Tour Châu Phi</a></li>
                <li class="singleli"><a href="http://www.fiditourhanoi.com/" title="Tour xuất phát từ Hà Nội" class="" target="_blank" rel="nofollow"><span class="triangle-left"></span>Tour xuất phát từ Hà Nội</a></li>
                <li class="singleli"><a href="http://www.fiditourdanang.com/" title="Tour xuất phát từ Đà Nẵng" class="" target="_blank" rel="nofollow"><span class="triangle-left"></span>Tour xuất phát từ Đà Nẵng</a></li>
                <li class="singleli"><a href="http://www.fiditourcantho.com" title="Tour xuất phát từ Cần Thơ" class="" target="_blank" rel="nofollow"><span class="triangle-left"></span>Tour xuất phát từ Cần Thơ</a></li>
            </ul>
        </div>
    </div>
</div>