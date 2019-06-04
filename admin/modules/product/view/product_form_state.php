
<div class="form-group ">
    <label for="name" class="control-label required"><?php echo lang('status');?></label>
	<div class="checkbox-list form-control height-auto">
		<?php 
		$state = array('state_hot', 'state_arrival', 'state_new', 'state_old', 'state_no_sold','state_sale');
		$i=1;
		foreach ($state as $key => $value) { ?>
			<label><div class="checker"><span class="<?php if (strpos($this->data['data']['state'], '|'.$i.'|') !== false) echo 'after_opacity';?>"><input type="checkbox" name="state[]" value="<?php echo $i;?>" <?php if (strpos($this->data['data']['state'], '|'.$i.'|') !== false) echo 'checked';?>></span></div> <?php echo lang($value);?></label>

		<?php 
		$i++;
		}
		 ?>
	</div>
</div>

