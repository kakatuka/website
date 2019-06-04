<?php 
class Controller{
	public $view,$input,$mod,$controller,$action,$id,$loadPages;
	
	public function __construct(){
		global $_web;
		$this->mod          = $_web['uri']['mod'];
		$this->controller         = $_web['uri']['controller'];
		$this->action          = $_web['uri']['action'];
		$this->id           = $_web['uri']['id'];

		$this->input = new Input();
		$this->view = new View(); 
		$this->loadLibrary('paging');
		
	}
	public function loadModel($file, $mod = null) {
		if ($mod === null) {
			$path = DIR_MODULES . $this->mod . '/model/' . lcfirst($file) . '.php';
			if (file_exists($path)) {
				include_once $path;
				$obj = new $file();
				return $obj;
			} else {
				die('Không tồn tại file này' . $path);
			}
		} else {
			$path = DIR_MODULES . $mod . '/model/' . lcfirst($file) . '.php';
			if (file_exists($path)) {
				include_once $path;
				$obj = new $file();
				return $obj;
			} else {
				die('Không tồn tại file này' . lcfirst($path));
			}
		}
	}
	public function loadLibrary($file) {
			$path = DIR_APP . 'libraries/' . lcfirst($file) . '.php';
			if (file_exists($path)) {
				require_once $path;
			} else {
				die('Không tồn tại file này' . lcfirst($path));
			}
		
	}
	public function returnFiles($file) {
			$path = DIR_TMP . 'files/' . lcfirst($file);
			if (file_exists($path)) {
				return $path;
			} else {
				return false;
				//die('Không tồn tại file này' . lcfirst($path));
			}
		
	}
	public function isPost($key){
		if (isset($_POST[$key])) {
			return true;
		}else{
			return false;
		}
	}
	

	
}