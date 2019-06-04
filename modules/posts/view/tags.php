    <link rel="stylesheet" href="<?php echo base_url() . "tmp/public/";?>lib/css/style.css">
    <section>
        <div class="container-fluid tin-tuc">
            <div class="container">
                <div class="row">
                    <h4 class="h4tinmoi" style="color: #fff;">Tags: <span style="color: red; text-transform: capitalize;"><?php echo ($_GET['tag'])?></span></h4>
                    <div class="col-sm-8">
                        <div class="col-sm-12 col-xs-12 tong-sp-tin" style="padding:0">
                           <?php    if (!empty($this->data['tag'])) {?>
                            <?php foreach ($this->data['tag'] as $key => $value){
                                ?>
                                  <div class="col-sm-4 col-xs-12 san-pham-tin-tuc" style="padding:0">
                                <div class="col-sm-12 col-xs-12" style="padding:0">
                                    <a href="<?php echo base_url() .  $value['alias'] . "-k" .  $value['id'] . ".htm"; ?>"><img src="<?php echo getImage($value['thumbnail'],390,230,1);?>" style="width: 100%"></a>
                                </div>
                                 <div class="col-sm-12 col-xs-12 thongtin-them" style="padding:0;
                                    height: 150px;">
                                   <a href="<?php echo base_url() .  $value['alias'] . "-k" .  $value['id'] . ".htm"; ?>"> <h3 class="max-lines3"><?php echo cutString($value['title'],56)?></h3></a>
                                    <p class="max-lines3"><?php echo cutString($value['description'],60)?></p>
                                    </div>
                                </div>
                                <?php
                                }} 
                                ?>
                        </div>
                        <div class="col-sm-12 col-xs-12 text-center" style="padding:0">

                                    <ul class="pagination">
                                        <?php
                                            if ($this->data['pagination']) {
                                                echo $this->data['pagination'];
                                            }
                                        ?>
                                    </ul>
                        </div>
                    </div>
                         <?php require_once DIR_TMP.'themes/tag_right.php'; ?> 
            </div>
        </div>
    </section>
