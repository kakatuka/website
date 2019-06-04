 <div class="container Breadcrumbs">
        <ol vocab="" typeof="BreadcrumbList">
            <li property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" href="<?php echo base_url()?>" title="Trang chủ du lịch Fiditour"><span property="name">Du lịch</span></a>
                <meta property="position" content="1" />
            </li>
            ›<li property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" href="<?php echo base_url() . $this->data['cate_name']['alias'] . "-c" .  $this->data['cate_name']['id'] . ".htm"; ?>" title="<?php echo $this->data['cate_name']['title'] ?>"><span property="name"><?php echo $this->data['cate_name']['title'] ?></span></a>
                <meta itemprop="position" content="1" />
            </li>›<li property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" href=""><span property="name"><?php echo $this->data['data_posts']['title']?></span></a>
                <meta itemprop="position" content="2" />
            </li>
        </ol>
    </div>
    <div class="container body-content">
        <div class="col-md-9 col-sm-9 col-xs-12 left-col">
            <div class="article-panel">
                <div class="cate-caption">
                    <span><?php echo $this->data['cate_name']['title'] ?></span>
                    <span></span>
                </div>
                <article class="post">
                    <header>
                        <h1><b><?php echo $this->data['data_posts']['title']?></b></h1>
                        <div class="update-time">
                            <span class="updtext"><?php echo date('d/m/Y',$this->data['data_posts']['create_time']) ?></span>
                        </div>
                    </header>
                    <div class="entry-content">
                        <div class="col-md-1 col-sm-12 col-xs-12 share-blog">
                            <div id="fb-root"></div>
                            <script async>
                            (function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = '../../connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2';
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                            </script>
                            <div class="fb-like" data-href="" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                            <a href="" onclick="javascript:window.open(this.href,menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600);return false;" rel="nofollow" target="_blank" title="Share this on Google+" class="shareplus"></a>
                            <a href="" rel="nofollow" target="_blank" title="Tweet This!" class="sharetwitter"></a>
                            <a href="" rel="nofollow" target="_blank" title="Share this on Linkedin" class="sharelinked"></a>
                            <a href="" rel="nofollow" target="_blank" title="Share on Pinterest" class="sharepinter"></a>
                            <a href=""></a>
                        </div>
                        <div class="col-md-11 col-sm-12 col-xs-12 entry-main">
                            <div class="content-brief">
                                <div class="col-md-4 col-sm-3 col-xs-12">
                                    <img src="<?php echo getImage($this->data['data_posts']['thumbnail'],225,150,1);?>" alt="<?php echo $this->data['data_posts']['title']?>" class="img-responsive" />
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-12 article-brief">
                                    <?php echo $this->data['data_posts']['description']?>
                                </div>
                            </div>
                            <div id="articlebody" class="col-md-12 article-body">
                                <br />
                                <div align="justify">
                                    <div align="justify">
                                          <?php echo html_entity_decode($this->data['data_posts']['content'])?>
                                    </div>
                                </div>
                                <br />
                            </div>
                        </div>
                    </div>
                </article>
                <script type="text/javascript">
                $(document).ready(function() {
                    var artbodywidth = $(".article-body").width();
                    var i = 0;
                    var imagesArray = $(".article-body").find("img").each(function(index) {
                        var imgw = $(this).width();
                        if (imgw >= artbodywidth) {
                            $(this).attr('style', 'width: 95%');
                        }
                    });
                });
                </script>
                <div class="relat-article">
                    <div class="cate-caption">
                        <span>Tin cùng chuyên đề</span>
                        <span></span>
                    </div>
                    <div class="col-md-12">
                        <?php 
                             if (!empty($this->data['post_related'])) {
                              foreach ($this->data['post_related'] as $key => $value) {
                                ?>
                                <div class="col-md-4 col-sm-6 col-xs-12 relat-item">
                                    <a href="<?php echo base_url() .  $value['alias'] . "-n" .  $value['id'] . ".htm"; ?>" title=" <?php echo  $value['title']?>">
                                        <img src="<?php echo getImage($value['thumbnail'],79,65,1);?>" alt=" <?php echo  $value['title']?>" class="img-responsive" />
                                       <?php echo  $value['title']?>
                                    </a><br /><span class="datepost"><?php echo date('d/m/Y',$this->data['data_posts']['create_time']) ?></span>
                                </div>
                            <?php
                          }
                        }
                       ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 right-col">
            <div class="right-menu">
                <div class="flat-menutitle">
                    <span>Chuyên đề</span>
                </div>
                <ul class="flat-menus">
                    <li class="singleli"><a href="../du-lich-trong-nuoc.html" title="Tour du lịch trong nước" class="menur-item" target="" rel=""><span class="triangle-left"></span>Tour trong nước</a></li>
                    <li class="singleli"><a href="../du-lich-nuoc-ngoai.html" title="Tour du lịch nước ngoài" class="menur-item" target="" rel=""><span class="triangle-left"></span>Tour nước ngoài</a></li>
                    <li class="singleli"><a href="../clip-du-lich.html" title="Fiditour qua clip" class="menur-item" target="" rel=""><span class="triangle-left"></span>Fiditour qua clip</a></li>
                    <li class="singleli"><a href="../fiditour-qua-anh.html" title="Fiditour qua ảnh" class="menur-item" target="" rel=""><span class="triangle-left"></span>Fiditour qua ảnh</a></li>
                    <li class="singleli"><a href="../cam-nang-du-lich.html" title="Cẩm nang du lịch" class="menur-item" target="" rel=""><span class="triangle-left"></span>Cẩm nang du lịch</a></li>
                    <li class="singleli"><a href="../goc-anh-lu-hanh.html" title="Góc ảnh lữ hành" class="menur-item" target="" rel=""><span class="triangle-left"></span>Góc ảnh lữ hành</a></li>
                    <li class="singleli"><a href="../tour-moi.html" title="Điểm đến mới" class="menur-item" target="" rel=""><span class="triangle-left"></span>Điểm đến mới</a></li>
                </ul>
            </div>
        </div>
    </div>