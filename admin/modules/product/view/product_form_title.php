<div class="form-group" id="ht-cre-product-name">
	<label class="control-label strong" for="name">Tên tour</label> <span class="asterisk">*</span>
	<div class="controls">
		<input class="form-control" placeholder="Nhập tên tour" id="title" value="<?php if(isset($this->data['data']['name'])) echo stripcslashes($this->data['data']['name']); ?>" name="title" type="text" required>
		<span class="help-block"><span class="field-validation-valid help-block" ></span></span>
	</div>
</div>
<!-- <div class="form-group" id="ht-cre-product-name">
	<label class="control-label strong" for="name">Link sản phẩm</label> <span class="asterisk">*</span>
	<div class="controls">
		<input class="form-control" placeholder="Nhập đường dẫn" id="link" value="<?php if(isset($this->data['data']['link'])) echo stripcslashes($this->data['data']['link']); ?>" name="link" type="text" required>
		<span class="help-block"><span class="field-validation-valid help-block" ></span></span>
	</div>
</div> -->
