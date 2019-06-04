<div class="container Breadcrumbs">
        <ol vocab="" typeof="BreadcrumbList">
            <li property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" href="<?php echo base_url()?>"><span property="name">Du lịch</span></a>
                <meta property="position" content="1" />
            </li>
            ›<li property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="<?php echo $this->data['cate_name']['title'] ?>"><span property="name"><?php echo $this->data['cate_name']['title'] ?></span></a>
                <meta itemprop="position" content="1" />
            </li>
        </ol>
    </div>
    <div class="container body-content">
        <div class="col-md-9 col-sm-9 col-xs-12 left-col">
            <div class="article-panel">
                <div class="cate-caption">
                    <h1><?php echo $this->data['cate_name']['title'] ?></h1>
                    <span></span>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 latest-article">
                    <?php if (!empty($this->data['posts_hot'])): ?>
                        <?php foreach ($this->data['posts_hot'] as $key => $value): ?>
                                <?php if ($key==0): ?>
                                    <article>
                                        <header>
                                            <a href="<?php echo base_url() .  $value['alias'] . "-n" .  $value['id'] . ".htm"; ?>" title="<?php echo $value['title'] ?>">
                                                <img src="<?php echo getImage($value['thumbnail'],416,285,1);?>" alt="<?php echo $value['title'] ?>" /><?php echo $value['title'] ?></a>
                                        </header>
                                        <span class="datepost"><?php echo date('d/m/Y',$value['create_time']) ?></span>
                                        <p><?php echo $value['description'] ?></p>
                                    </article>
                                <?php endif ?>
                        <?php endforeach ?>
                    <?php endif ?>
                   
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 latest-relate">
                    <?php if (!empty($this->data['posts_hot'])): ?>
                        <?php foreach ($this->data['posts_hot'] as $key => $value): ?>
                                <?php if ($key>0): ?>
                                    <article>
                                        <article>
                                            <a href="<?php echo base_url() .  $value['alias'] . "-n" .  $value['id'] . ".htm"; ?>">
                                                <img src="<?php echo getImage($value['thumbnail'],143,120,1);?>" alt="<?php echo $value['title'] ?>" /><?php echo $value['title'] ?>
                                            </a>
                                            <span class="datepost"><?php echo date('d/m/Y',$value['create_time']) ?></span>
                                            <p><?php echo $value['description'] ?></p>
                                        </article>
                                    </article>
                                <?php endif ?>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
                <div class="postlist">
            <?php
            if (!empty($this->data['data'])) {
               foreach ($this->data['data'] as $key => $value) { 
                  ?>
                    <div class="col-md-4 col-sm-4 col-xs-12 post-item first-post">
                        <article>
                            <header>
                                <a href="<?php echo base_url() .  $value['alias'] . "-n" .  $value['id'] . ".htm"; ?>" title="<?php echo $value['title'] ?>"><img src="<?php echo getImage($value['thumbnail'],272,157,1);?>" alt="<?php echo $value['title'] ?>" /><?php echo $value['title'] ?></a>
                            </header>
                            <span class="datepost"><?php echo date('d/m/Y',$value['create_time']) ?></span>
                            <p>
                                <p><?php echo $value['description']?></p>
                            </p>
                        </article>
                    </div>
                  <?php

                }
            }
            ?> 
                </div>
                <div class="pagerdiv">
                <?php if(!empty($this->data['pagination'])){
                    echo $this->data['pagination'];
                  } ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 right-col">
            <div class="right-menu">
                <div class="flat-menutitle">
                    <span>Chuyên đề</span>
                </div>
                <ul class="flat-menus">
                    <li class="singleli">
                        <a href="du-lich-trong-nuoc.html" title="Tour du lịch trong nước" class="menur-item" target="" rel=""><span class="triangle-left"></span>Tour trong nước</a>
                    </li>
                    <li class="singleli">
                        <a href="du-lich-nuoc-ngoai.html" title="Tour du lịch nước ngoài" class="menur-item" target="" rel=""><span class="triangle-left"></span>Tour nước ngoài</a>
                    </li>
                    <li class="singleli"><a href="clip-du-lich.html" title="Fiditour qua clip" class="menur-item" target="" rel=""><span class="triangle-left"></span>Fiditour qua clip</a>
                    </li>
                    <li class="singleli"><a href="fiditour-qua-anh.html" title="Fiditour qua ảnh" class="menur-item" target="" rel=""><span class="triangle-left"></span>Fiditour qua ảnh</a>
                    </li>
                    <li class="singleli"><a href="cam-nang-du-lich.html" title="Cẩm nang du lịch" class="menur-item" target="" rel=""><span class="triangle-left"></span>Cẩm nang du lịch</a>
                    </li>
                    <li class="singleli">
                        <a href="goc-anh-lu-hanh.html" title="Góc ảnh lữ hành" class="menur-item" target="" rel=""><span class="triangle-left"></span>Góc ảnh lữ hành</a>
                    </li>
                    <li class="singleli">
                        <a href="tour-moi.html" title="Điểm đến mới" class="menur-item" target="" rel=""><span class="triangle-left"></span>Điểm đến mới</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>