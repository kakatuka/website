<div class="form-group" id="ht-cre-product-name">
	<label class="control-label strong" for="name">Giá tour </label> <span class="asterisk">*</span>
	<div class="controls">
		<input class="form-control" placeholder="Nhập giá tour" id="title" value="<?php if(isset($this->data['data']['price'])) echo stripcslashes($this->data['data']['price']); ?>" name="price" type="text">
		<span class="help-block"><span class="field-validation-valid help-block" ></span></span>
	</div>
</div>
<div class="form-group" id="ht-cre-product-name">
	<label class="control-label strong" for="name">Giá tour mới </label> 
	<div class="controls">
		<input class="form-control" placeholder="Nhập khuyến mãi cho tour" id="title" value="<?php if(isset($this->data['data']['price_market'])) echo stripcslashes($this->data['data']['price_market']); ?>" name="price_market" type="text">
		<span class="help-block"><span class="field-validation-valid help-block" ></span></span>
	</div>
</div>