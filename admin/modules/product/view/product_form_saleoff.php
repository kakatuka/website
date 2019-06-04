
<div class="form-group " style="display:none;">
    <div class="col-md-6 noPadding">
    	<label for="name" class="control-label required"><?php echo lang('sale_off');?></label>
    	<input class="form-control" id="price" placeholder="<?php echo lang('sale_off'); ?>" value="<?php if(isset($this->data['data']['saleoff']) && $this->data['data']['saleoff']!=0) echo $this->data['data']['saleoff']; ?>" name="saleoff" type="text" />
    </div>
    <div class="col-md-3">
    	<label for="name" class="control-label required"><?php echo lang('timestart_sale_off');?></label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="time_start" id="datepicker1" value="<?php if(isset($this->data['data']['time_start'])) echo $this->data['data']['time_start']; ?>">
        </div>
    </div>
	<div class="col-md-3">
    	<label for="name" class="control-label required"><?php echo lang('timeend_sale_off');?></label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="time_end" id="datepicker2" value="<?php if(isset($this->data['data']['time_end'])) echo $this->data['data']['time_end']; ?>">
        </div>
    </div>
</div>