<?php 

/**
* 
*/
class Session{
	static public function create($data=null){
		if (isset($data) && !empty($data)) {
			foreach ($data as $key => $value) {
				$_SESSION[$key] = $value;
			}
		}
	}
	static public function get($key=null){
		if ($key!=null) {
			return $_SESSION[$key];
		}else{
			return $_SESSION;
		}
	}
	public static function destroy($data=null){
		if (!empty($data)) {
			foreach ($data as $value) {
				unset($_SESSION[$value]);
			}
		}
	}
}