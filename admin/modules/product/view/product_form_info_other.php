<style type="text/css" media="screen">
	.delete_btn {
		position: relative;
		margin-top: 25px; 
		background-color: #ff3223;
		padding: 10px; 
		border-radius: 5px;
		color:#fff;
		top:31px;
		cursor: pointer;
	}
	.bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
       width: 50%;
     }
    .khoihanh{
     	padding: 20px;
     	background: #fff
    }
    .check_in{
     	color:red;
     	font-size: 18px;
     	font-weight: 800;
     }
    div#add_info {
	    height: 500px;
	    overflow: scroll;
	    overflow-x: hidden;
	}
</style>
<div class="col-xs-12" style="background: #fff;margin-bottom: 15px; display: none">
	<div class="khoihanh">
		<label style="padding-bottom: 15px;color:#03a9f4">Thêm Ngày Khởi Hành Tour</label>
		<div class="form-group">
			<label>Chọn những ngày khỏi hành</label><br>
			<?php 
				$date_tomorow = date('d-m-Y', strtotime("+3 days"));
			 ?>
			<select class="selectpicker array_date" multiple data-live-search="true" name="array_date">
				<?php 
					for ($i = 2; $i <= 365 ; $i++) {
						?>
						 	<option value="<?php echo date('m/d/Y', strtotime("+".$i." days"))?>"><?php echo date('d/m/Y', strtotime("+".$i." days"))?></option>
						<?php
					}
				 ?>
	        </select>
		</div>
		<div class="form-group" style="width: 15%">
		    <label for="exampleFormControlInput1">Giá người lớn <span class="check_in">*</span></label>
		    <input type="number" id="price_1" class="form-control" placeholder="Nhập giá người lớn">
		</div>
		<div class="form-group" style="width: 15%">
		    <label for="exampleFormControlInput1">Giá Trẻ em </label>
		    <input type="number" id="price_2" class="form-control" value="0" placeholder="Nhập giá trẻ em">
		</div>
		<div class="form-group" style="width: 15%">
		    <label for="exampleFormControlInput1">Giá em bé </label>
		    <input type="number" id="price_3" min="0" class="form-control" value="0" placeholder="Nhập giá em bé ">
		</div>
		<div class="btn_add">
			<label style="font-weight: normal;color:red; font-style: italic;"> Chú ý: Vui Lòng chọn ngày khởi hành trước khi bấm nút Add</label><br>
			<button type="button" class="btn btn-success add_date" style="margin-bottom: 15px;">Add</button>
			<button type="button" class="btn btn-success add_7day" style="margin-bottom: 15px;" data-day="9">Thêm 7 ngày khởi hành</button>
			<button type="button" class="btn btn-success add_7day" style="margin-bottom: 15px;" data-day="32">Thêm 30 ngày khởi hành</button>
		</div>
		<label style="color:red;font-weight: 600">Ngày Khởi Hành Tour</label>
		<div id="add_info" style="margin-top: 15px;">
	    	<?php 
	    		if (!empty($this->data['data_other_info'])) {
	    			foreach ($this->data['data_other_info'] as $key => $value) {
	    				?>
							<div class="col-xs-12 add_tt" style="padding: 10px 0;">
								<div class="col-md-2">
									<label class="control-label required">Ngày khởi hành</label>
									 <input type="text" class="form-control maxlength-handler" name="info_day[]" maxlength="60" value="<?php echo $value['date_tour'];?>">
								</div>
								<div class="col-md-2">
									<label class="control-label required">Mã tour</label>
									 <input type="text" class="form-control maxlength-handler" name="info_code[]" maxlength="60" placeholder="STN084-2018-03586" value="<?php echo $value['code'];?>" disabled>
								</div>
								<div class="col-md-2">
									<label class="control-label required">Giá người lớn</label>
									 <input type="text" class="form-control maxlength-handler" name="price_men[]" maxlength="60" placeholder="1000000" value="<?php echo $value['price'];?>">
								</div>
								<div class="col-md-2">
									<label class="control-label required">Giá trẻ em</label>
									 <input type="text" class="form-control maxlength-handler" name="price_child[]" maxlength="60" placeholder="500000" value="<?php echo $value['price_e'];?>">
								</div>
								<div class="col-md-2">
									<label class="control-label required">Giá em bé</label>
									 <input type="text" class="form-control maxlength-handler" name="price_baby[]" maxlength="60" placeholder="1000000" value="<?php echo $value['price_b'];?>">
								</div>
								<div class="col-md-2">
									 <span class="delete_btn">Xóa</span>
								</div>
							</div>
	    				<?php
	    			}
	    		}
	    	?>
	    </div>	
	</div>
</div>
<!-- <div class="form-group">
    <label class="control-label required">Ngày khởi hành tour</label><br>
    <a id="addtienich"><span class="glyphicon glyphicon-plus-sign"> Thêm ngày khởi hành</span></a>
</div> -->