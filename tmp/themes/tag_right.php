 <div class="col-sm-4 col-xs-12 side-right2" style="padding:0 1.5% 0 0">
    <div class="col-sm-12 col-xs-12 tieu-de-side-right" style="padding:0">
      <h2>Dự án <b style="font-family: oswald">nổi bật</b></h2>
      <div class="ke-trai"></div>
    </div>
    <?php if(!empty($_web['partner_hot'])) {
      foreach ($_web['partner_hot'] as $key => $value) {
        ?>
         <div class="col-sm-12 col-xs-12 tin-du-an" style="padding:0">
      <div class="col-sm-4 col-xs-4" style="padding:0">
         <a href="<?php echo base_url() .  $value['alias'] . "-k" .  $value['id'] . ".htm"; ?>"><img src="<?php echo getImage($value['thumbnail'],'161','97','1','50'); ?>" alt="<?php echo $value['title']?>" style="max-width: 100%"></a>
      </div>
      <div class="col-sm-8 col-xs-8" style="padding:0 0 0 3%">
        <h3 class="max-lines2"><a href="<?php echo base_url() .  $value['alias'] . "-k" .  $value['id'] . ".htm"; ?>"><?php echo $value['title']?></a></h3>
        <p class="max-lines2"><?php echo $value['description']?></p>
      </div>
    </div>
        <?php
      }
      }
      ?>
</div>