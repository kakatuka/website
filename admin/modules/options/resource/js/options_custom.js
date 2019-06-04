if ($('#switch-size').attr('data-check')=='false') {
	$("#switch-size").bootstrapSwitch(
		'state',false
	);
}else{
	$("#switch-size").bootstrapSwitch(
		'state',true
	);
}
