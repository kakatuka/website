<div class="container Breadcrumbs">
        <ol vocab="" typeof="BreadcrumbList">
            <li property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" href="<?php echo base_url()?>" title="Trang chủ du lịch Fiditour"><span property="name">Du lịch</span></a>
                <meta property="position" content="1" />
            </li>
            ›<li property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" href="lien-he.htm" title="Thông tin liên hệ Công Ty Cổ Phần Lữ Hành Fiditour"><span property="name">giới thiệu</span></a>
                <meta itemprop="position" content="1" />
            </li>
        </ol>
    </div>
    <div class="container body-content">
        <div class="col-md-9 col-sm-9 col-xs-12 left-col">
            <div class="container" style="padding-right:0px;padding-left:0px;">
                <div class="article-panel">
                    <div class="cate-caption">
                        <span>Giới thiệu</span>
                        <span></span>
                    </div>
                    <article class="post">
                        <div class="entry-content">
                            <div class="col-md-1 share-blog">
                                <div id="fb-root"></div>
                                <script async>
                                (function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = '../connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2';
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));
                                </script>
                                <div class="fb-like" data-href="" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                <a href="" onclick="javascript:window.open(this.href,menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600);return false;" rel="nofollow" target="_blank" title="Share this on Google+" class="shareplus"></a>
                                <a href="" rel="nofollow" target="_blank" title="Tweet This!" class="sharetwitter"></a>
                                <a href="" rel="nofollow" target="_blank" title="Share this on Linkedin" class="sharelinked"></a>
                                <a href="" rel="nofollow" target="_blank" title="Share on Pinterest" class="sharepinter"></a>
                                <a href="" class="sharemailto"></a>
                            </div>
                            <div class="col-md-11 entry-main">
                                <div id="articlebody" class="col-md-12 article-body">
                                 <?php echo html_entity_decode($this->data['intro']['content'])?>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>  