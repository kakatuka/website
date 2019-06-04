    <div class="container-fluid tin-tuc">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-xs-12 tong-sp-tin" style="padding:0">
            <?php if(!empty($this->data['part_ner'])){
              foreach ($this->data['part_ner'] as $key => $list_partner) {
            
                ?>
                 <div class="col-sm-4 col-xs-12 san-pham-tin-tuc" style="padding:0">
              <div class="col-sm-12 col-xs-12" style="padding:0">
                <a href="<?php echo base_url() .  $list_partner['alias'] . "-k" .  $list_partner['id'] . ".htm"; ?>"><img src="<?php echo getImage($list_partner['thumbnail'],390,230,1);?>" alt="<?php echo $list_partner['title'];?>" style="width: 100%"></a>
              </div>
              <div class="col-sm-12 col-xs-12 thongtin-them" style="padding:0;height: 150px">
                <h3 class="max-lines3"><?php echo cutString($list_partner['title'],65)?></h3>
                <p class="max-lines3"><?php echo $list_partner['description']?></p>
              </div>
            </div>
                <?php
              }
              }
            ?>
          </div>
          <div class="col-sm-12 col-xs-12 text-center" style="padding:0">
            <div class="container">
              <div class="row">
                <!-- <ul class="pagination">
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                </ul> -->
                 <?php if(!empty($this->data['pagination'])){
                  echo $this->data['pagination'];
                } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- end nội dung