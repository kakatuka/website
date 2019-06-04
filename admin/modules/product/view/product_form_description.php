<div class="form-group" id="ht-cre-product-name">
	<label class="control-label strong" for="name">Số ngày</label> 
	<div class="controls">
		<input class="form-control" placeholder="Số ngày tour đi" id="title" value="<?php if(isset($this->data['data']['day'])) echo stripcslashes($this->data['data']['day']); ?>" name="day" type="text">
		<span class="help-block"><span class="field-validation-valid help-block" ></span></span>
	</div>
</div>
<div class="form-group" id="ht-cre-product-name">
	<label class="control-label strong" for="name">Phương tiện</label> 
	<div class="controls">
		<input class="form-control" placeholder="Phương tiện đi tour" id="title" value="<?php if(isset($this->data['data']['tour_car'])) echo stripcslashes($this->data['data']['tour_car']); ?>" name="tour_car" type="text">
		<span class="help-block"><span class="field-validation-valid help-block" ></span></span>
	</div>
</div>
<div class="form-group hidden">
    <label for="sel1">Loại khách sạn</label>
    <select class="form-control" id="sel1" name="star">
        <option value ="1" <?php if ($this->data['data']['star']==1){echo "selected";}?>> 1 sao</option>
        <option value="2" <?php if ($this->data['data']['star']==2){echo "selected";}?>>  2 sao</option>
        <option value="3" <?php if ($this->data['data']['star']==3){echo "selected";}?>> 3 sao</option>
        <option value="4" <?php if ($this->data['data']['star']==4){echo "selected";}?>> 4 sao</option>
        <option value="5" <?php if ($this->data['data']['star']==5){echo "selected";}?>> 5 sao</option>
    </select>
 </div>
<div class="form-group">
    <label for="exampleSelect1">Điểm xuất phát</label>
    <select class="form-control" id="exampleSelect1" name="tour_start" >
      <option value="Hà Nội" <?php if ($this->data['data']['tour_start']=="Hà Nội"){echo "selected";}?>>Hà Nội</option>
      <option value="Hồ Chí Minh" <?php if ($this->data['data']['tour_start']=="Hồ Chí Minh"){echo "selected";}?>>TP.Hồ Chí Minh</option>
    </select>
</div>
<!-- <div class="form-group" id="ht-cre-product-name">
	<label class="control-label strong" for="name"></label> 
	<div class="controls">
		
		<input class="form-control" placeholder="Hà Nội" id="title" value="<?php if(isset($this->data['data']['tour_start'])) echo stripcslashes($this->data['data']['tour_start']); ?>" name="tour_start" type="text">
		<span class="help-block"><span class="field-validation-valid help-block" ></span></span>
	</div>
</div> -->

<div class="form-group" id="ht-cre-product-name">
	<label class="control-label strong" for="name">Điểm đến</label> <br>
	<select class="selectpicker" multiple data-live-search="true" name="tour_end[]">
		<?php 
		 $diemden = json_decode($this->data['data']['tour_end'],true);  
		foreach ($this->data['data_category'] as $key => $value) {
			if ($value['parent_id'] =! 0) {
				?>
			 	  <option value="<?php echo $value['title'] ?>" <?php if (!empty($diemden)) {
			 	  	foreach ($diemden as $key => $value2) {
			 	  		if ($value2 == $value['title']) {
			 	  			echo "selected";
			 	  		}
			 	  	}
			 	  } ?>><?php echo $value['title'] ?></option>
				<?php
			}
		}
		?>
    </select>
</div>
 <div class="form-group" id="ht-cre-product-name">
	<label class="control-label strong" for="name">Ngày khởi hành</label> 
	<div class="controls" style="width: 50%">
		<input type="text" class="form-control pull-right datepicker" data-inputmask="'alias': 'yyyy\mm\dd'" data-mask="" name="start_date" id="datepicker1" value="<?php if(isset($this->data['data']['start_date'])) echo $this->data['data']['start_date']; ?>">
		<span class="help-block"><span class="field-validation-valid help-block" ></span></span>
	</div>
</div>
<div class="form-group" id="ht-cre-product-name">
	<label class="control-label strong" for="name">Ngày về</label> 
	<div class="controls" style="width: 50%">
		<input type="text" class="form-control pull-right datepicker" data-inputmask="'alias': 'yyyy\mm\dd'" data-mask="" name="end_date" id="datepicker2" value="<?php if(isset($this->data['data']['end_date'])) echo $this->data['data']['end_date']; ?>">
		<span class="help-block"><span class="field-validation-valid help-block" ></span></span>
	</div>
</div>
<div class="form-group hidden" id="ht-cre-product-name">
	<label class="control-label strong" for="name">Quà tặng</label> 
	<div class="controls">
		<input class="form-control" placeholder="Nhập quà tặng kèm theo tour" id="title" value="<?php if(isset($this->data['data']['event'])) echo stripcslashes($this->data['data']['event']); ?>" name="event" type="text">
		<span class="help-block"><span class="field-validation-valid help-block" ></span></span>
	</div>
</div>
<div class="form-group hide_description_short required" id="div-summary">
	<label class="control-label strong" for="Summary">Mô tả ngắn</label>
	<textarea class="form-control" rows="4" id="description" placeholder="Mô tả ngắn" data-counter="300" name="description" cols="50"><?php if(isset($this->data['data']['short_info'])) echo stripcslashes($this->data['data']['short_info']); ?></textarea>
</div>

		