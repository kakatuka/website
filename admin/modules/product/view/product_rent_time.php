<div class="form-group" id="ht-cre-product-name">
	<label class="control-label strong" for="name">Thời gian thuê</label> <span class="asterisk">*</span>
	<div class="controls">
		<input class="form-control" placeholder="Nhập tên sản phẩm" id="rent_time" value="<?php if(isset($this->data['data']['name'])) echo stripcslashes($this->data['data']['rent_time']); ?>" name="rent_time" type="text" required>
		<span class="help-block"><span class="field-validation-valid help-block" ></span></span>
	</div>
</div>
<div class="form-group" id="ht-cre-product-name">
	<label class="control-label strong" for="name">Điểm đến</label> <span class="asterisk">*</span>
	<div class="controls">
		<input class="form-control" placeholder="Nhập đường dẫn" id="destination" value="<?php if(isset($this->data['data']['destination'])) echo stripcslashes($this->data['data']['destination']); ?>" name="destination" type="text" required>
		<span class="help-block"><span class="field-validation-valid help-block" ></span></span>
	</div>
</div>
