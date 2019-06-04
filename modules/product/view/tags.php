 <style>
     img{
        max-width: 100% !important;
     }
     .content-list{
        margin-top: 10px;
     }
 </style>
 <div class="container">
    <p style="margin: 20px 0 0 30px; font-size: 18px; ">Trang Chủ <span style="color: red;">|</span> TAGS</p>
    <div class="col-sm-8">
        <div class="col-sm-12">
           <!--  <?php 
                if (!empty($this->data['list_hot'])) {
                    ?>
                    <a href="<?php echo base_url().$this->data['posts_hot']['alias']."-n".$this->data['posts_hot']['id'].".htm";?>"><img src="<?php echo getImage($this->data['posts_hot']['thumbnail'], '634', '409', 'zc=1') ?>" alt="" style="max-width: 100%; margin-top: 14px;"></a>
                    <?php
                }
             ?> -->
        </div>
        <div class="col-sm-12 newbaiviet">
            <h4 class="h4tinmoi">Tags: <span style="color: red; text-transform: capitalize;"><?php echo ($_GET['tag'])?></span></h4>
            <?php 
                if (!empty($this->data['tag'])) {
                    foreach ($this->data['tag'] as $key => $product) {
                        ?>
                            <div class="col-sm-12 demochinh">
                                <div class="col-sm-4" style="padding: 0px !important">
                                    <a href="<?php echo base_url().$product['alias']."-".$product['id'].".htm";?>"><img style="padding-bottom: 10px;" src="<?php echo getImage($product['image'], '307', '172', 'zc=1') ?>" alt="<?php echo $product['name'] ?>" ></a>
                                </div>
                                <div class="col-sm-8 demo max-line">
                                    <h5><a href="<?php echo base_url().$product['alias']."-".$product['id'].".htm";?>"><?php echo $product['name'] ?></a></h5>
                                    <p><?php echo cutString(stripslashes($product['short_info']),200)?></p>
                                    <!-- <b><i class=" glyphicon glyphicon-time"> <?php echo date('d/m/Y',$product['create_time']);?></i></b> -->
                                </div>
                            </div>
                        <?php
                    }
                } 
             ?>
            <div class="col-sm-12">
                <div class="pagination  pagination-sm">
                    <ul class="pagination justify-content-center">
                      <?php
                        if ($this->data['pagination']) {
                            echo $this->data['pagination'];
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
     <?php require_once DIR_TMP.'themes/right_posts.php'; ?>
</div>