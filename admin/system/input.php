<?php 
/**
* 
*/
class Input{
	public function post($name=null){
		if (isset($_POST[$name])) {
			return $_POST[$name];
		}else{
			if ($name==null) {
				echo 'Lỗi không có tham số trong biens $_POST';
			}
			return $_POST;
		}
	} 
	public function get($name){
		if (isset($_GET[$name])) {
			return $_GET[$name];
		}
	}
}