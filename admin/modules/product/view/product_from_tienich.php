<div class="form-group" style="margin-top: 100px">
	<div class="widget light bordered meta-boxes">
		<div class="widget-title">
			<h4 style="color: red;"><i class="fa fa-info-circle"></i>Lựa chọn tour hiển thị trên trang chủ</h4>
		</div>
		<div class="widget-body">
			<div class="meta-box check-box" data-slug="1_show_contact_form">
				<div class="scf-checkbox-wrap">
					<span class="dis-block">
					<label style="color: #449d44;">
					Tour hot &nbsp;
					<input type="checkbox" name="hot" id="show_contact_form" value="1" <?php if(isset($this->data['data']['hot']) && $this->data['data']['hot']!="" && $this->data['data']['hot'] == 1) echo " checked"; ?>> <?php echo lang('yes');?>
					</label>
					</span>
				</div>
				<div class="scf-checkbox-wra">
					<span class="dis-block">
					<label>
					Tour in Cate hot &nbsp;
					<input type="checkbox" name="hot_1" id="show_contact_form" value="1" <?php if(isset($this->data['data']['hot_1']) && $this->data['data']['hot_1']!="" && $this->data['data']['hot_1'] == 1) echo " checked"; ?>> <?php echo lang('yes');?>
					</label>
					</span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label strong" for="name">Sắp xếp hiển thị</label> <span class="asterisk">*</span>
				<div class="controls" style="width: 15%">
					<input class="form-control" placeholder="Nhập số" id="title" value="<?php if(isset($this->data['data']['order_by'])) echo stripcslashes($this->data['data']['order_by']); ?>" name="order" type="text">
					<span class="help-block"><span class="field-validation-valid help-block" ></span></span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="form-group hidden">
	<div class="widget light bordered meta-boxes">
		<div class="widget-title">
			<h4 style="color:#ff0600"><i class="fa fa-info-circle"></i>Lựa nhóm tour khách lẻ hoặc tour theo đoàn </h4>
		</div>
		<div class="widget-body">
			<div class="meta-box check-box" data-slug="1_show_contact_form">
				<div class="scf-checkbox-wrap">
					<span class="dis-block">
					<label style="color:#ff2500">
					Tour khách lẻ &nbsp;
					<input type="checkbox" name="group_tour" id="show_contact_form" value="1" <?php if(isset($this->data['data']['group_tour']) && $this->data['data']['hot']!="" && $this->data['data']['group_tour'] == 1) echo " checked"; ?>> <?php echo lang('yes');?>
					</label>
					</span>
				</div>
				<div class="scf-checkbox-wrap">
					<span class="dis-block">
					<label style="color:#337ab7">
					Tour khách đoàn &nbsp;
					<input type="checkbox" name="group_tour" id="show_contact_form" value="2" <?php if(isset($this->data['data']['group_tour']) && $this->data['data']['group_tour']!="" && $this->data['data']['group_tour'] == 2) echo " checked"; ?>> <?php echo lang('yes');?>
					</label>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>