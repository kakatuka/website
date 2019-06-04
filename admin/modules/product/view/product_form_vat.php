<div class="form-group " style="display:none;">
    <label for="name" class="control-label required">VAT</label>
    <select name="vat" class="form-control" id="">
    	<option value="0" <?php if($this->data['data']['status_vat']==0) echo "selected"; ?>>Đã có VAT</option>
    	<option value="1" <?php if($this->data['data']['status_vat']==1) echo "selected"; ?>>Chưa có VAT</option>
    	<option value="2" <?php if($this->data['data']['status_vat']==2) echo "selected"; ?>>Không hiển thị</option>
    </select>
</div>