<div class="form-group  hide">
	<h4>
		<label class="control-label strong">Kho hàng</label>
	</h4>
	<div class="row">
		<div class="col-sm-6" id="ht-cre-product-sku">
			<label class="control-label font_weight">Mã sản phẩm / SKU</label>
			<div class="controls">
				<input class="form-control" placeholder="<?php echo lang('product_code');?>" id="code" value="<?php if(isset($this->data['data']['code'])) echo $this->data['data']['code']; ?>" name="code" type="text">
			</div>
		</div>
		<div class="col-sm-6">
			<label class="control-label font_weight">Mã vạch / Barcode <span class="note">(ISBN, UPC, v.v...)</span></label>
			<div class="controls">
				<input class="form-control" id="Variant_Barcode" name="" type="text" value="">
			</div>
		</div>
	</div>
	<div class="row top15">
		<div class="col-sm-6" id="ht-cre-product-manager-quantity">
			<label class="control-label font_weight">Quản lý kho</label>
			<div class="controls">
				<select class="form-control inventory-management" id="Variant_InventoryManagement" name="">
					<option value="">Không quản lý kho hàng</option>
					<option value="bizweb" class="">Quản lý kho hàng</option>
				</select>
			</div>
		</div>
		<div class="quantity col-sm-3 hide">
			<label class="control-label">Số lượng</label>
			<div class="controls">
				<input class="form-control" id="Variant_InventoryQuantity" name="" type="number" value="1">
			</div>
		</div>
		<div class="col-sm-3"></div>
		<div class="controls col-sm-12 inventory-policy hide">
			<div class="checkbox">
				<label>
					<input type="checkbox" value="deny"> Cho phép tiếp tục đặt hàng khi hết hàng
					<input id="Variant_InventoryPolicy" name="" type="hidden" value="deny">
				</label>
			</div>
		</div>
	</div>
</div>



<div class="form-group hide">
	<h4>
		<label class="control-label strong">Vận chuyển</label>
	</h4>
	<div class="row">
		<div class="col-sm-6" id="ht-cre-product-weight">
			<label class="control-label font_weight">Cân nặng</label>
			<div class="controls">
				<div class="input-group">
					<input class="form-control" id="Variant_Weight" name="" type="text" value="0">
					<div class="input-group-btn">
						<button data-toggle="dropdown" class="btn btn-default dropdown-toggle " type="button"><span class="weight-unit">kg</span><span style="margin-left:5px;" class="caret"></span></button>
						<ul class="dropdown-menu weight-unit-select">
							<li><a href="javascript:void(0)">lb</a></li>
							<li><a href="javascript:void(0)">oz</a></li>
							<li><a href="javascript:void(0)">kg</a></li>
							<li><a href="javascript:void(0)">g</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6"></div>
		<div class="controls col-sm-12">
			<div class="checkbox">
				<label>
					<input b checked="checked" id="Variant_RequiresShipping" type="checkbox" value="true">
					<input name="" type="hidden" value="false"> Sản phẩm này yêu cầu vận chuyển
				</label>
			</div>
		</div>
	</div>
</div>



<div class="form-group hide">
	<h4>
		<label class="control-label font_weight">Tùy chọn</label>
	</h4>
	<div style="margin-bottom:20px;" class="row">
		<label style=" margin-bottom 0;padding-top 13px;" class="control-label col-sm-9 font_weight">Sản phẩm này có nhiều tùy chọn như kích thước, màu sắc?</label>
		<div class="col-sm-3 text-right show_detail_variants">
			<button class="btn btn-primary text-right show-option" type="button" id="ht-cre-product-variant">Thêm tùy chọn</button>
			<button class="btn btn-default text-right cancel-option" style="display: none" type="button">Hủy</button>
		</div>
	</div>
	<div class="row variants-option" style=" background:#f5f6f7;margin-left -20px;margin-right -20px;display: none;">
		<table class="table-option" width="100%">
			<colgroup>
			<col style="width:25%">
			<col style="width:65%">
			<col style="width:10%;">
		</colgroup>
		<thead>
			<tr>
				<div class="form-group">
					<label class="control-label required">Màu</label>
					<div class="info_other">
						<?php 
						if (!empty($this->data['data_other_info'])) {
							foreach ($this->data['data_other_info'] as $key => $value) { 
								// dd($value);
								?>
							<div class="element-info">
								<div class="col-md-2 noPadding">
									<input type="color" class="form-control maxlength-handler" name="info_color[]" value="<?php echo $value->title;?>">
								</div>
								<?php if (count($this->data['data_other_info']) == ($key+1)) {
									echo '<div class="col-md-2" style="padding:0px">
									<a href="javascript:void(0)" class="btn green add_info" style="border-radius:3px !important"><i class="fa fa-plus"></i></a>
									</div>';
								}else{
									echo '<div class="col-md-2" style="padding:0px">
									<a href="javascript:void(0)" class="btn green delete_info" style="border-radius:3px !important"><i class="fa fa-minus"></i></a>
									</div>';
								} ?>
								<div class="clearfix" style="margin:8px 0px;"></div>
							</div>
							<?php }}else{ ?>
							<div class="element-info">
								<div class="col-md-2 noPadding">
									<input type="color" class="form-control maxlength-handler" name="info_color[]">
								</div>
								<div class="col-md-2" style="padding:0px">
									<a href="javascript:void(0)" class="btn green add_info" style="border-radius:3px !important"><i class="fa fa-plus"></i></a>
								</div>
								<div class="clearfix" style="margin:8px 0px;"></div>
							</div>
						<?php } ?>
					</div>
				</div>

			</tr>
		</thead>
		<!-- Màu -->
		
	</table>
	<div style="margin-top:25px;" class="list-variant hide">
		<label class="control-label">
			Thay đổi những tùy chọn, bỏ tích để không tạo
		</label>
		<table width="100%" class="table-variant table">
			<colgroup>
			<col style="padding-left: 7px; padding-right: 7px; width: 12px;">
			<col>
			<col style="width:100px;">
			<col style="min-width:100px;">
			<col style="min-width:100px;">
		</colgroup>
		<thead>
			<tr>
				<th>
				</th>
				<th>
					Tùy chọn
				</th>
				<th>
					Giá
				</th>
				<th>
					Mã sản phẩm
				</th>
				<th>
					Mã barcode
				</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</div>
</div>
</div>