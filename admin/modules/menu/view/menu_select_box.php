<label class="pad-bot-5 check_sort_menu">
    <span class="text pad-top-5 dis-inline-block"><?php echo lang('decentralize');?></span>
	<select name="parent_menu" id="parent_menu" class="form-control">
		<option value="0">--&nbsp;Root</option>
		<?php 
		callMenu($this->data['data'],$parent=0,$text="--",$select=0)
		 ?>
	</select>
</label>