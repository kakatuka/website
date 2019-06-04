<?php 
class App{
	protected $_modules;
	protected $_paramUrl;
	protected $_dir;
	public function __construct(){
		global $_web;
		$this->_paramUrl = $this->parseUrl();
		$_web['uri']['mod'] 			= 	isset($this->_paramUrl['mod']) ? $this->_paramUrl['mod'] :  'home';
		$_web['uri']['controller'] 		=	isset($this->_paramUrl['controller']) ? $this->_paramUrl['controller'] : 	'home';
		$_web['uri']['action'] 			= 	isset($this->_paramUrl['action']) ? $this->_paramUrl['action']  : 'index';
		$_web['uri']['id'] 			= 	isset($this->_paramUrl['id']) ? $this->_paramUrl['id']  : 0;
	}
	public function get_modules() {
		$this->_dir     = DIR_MODULES;
		$this->_modules = parse_ini_file($this->_dir.'ini.modules.php');
		return $this->_modules;
	}
	/*public function get_uri(){
		global $_web;

			$_web['uri']['mod'] = isset($_GET['mod']) ? trim(addslashes(strtolower($_GET['mod']))) : 'home';
			$_web['uri']['controller'] = isset($_GET['controller']) ? trim(addslashes(strtolower($_GET['controller']))) : 'home';
			$_web['uri']['action'] = isset($_GET['action']) ? trim(addslashes(strtolower($_GET['action']))) : 'index';
			$_web['uri']['id'] = isset($_GET['id']) ? trim(addslashes(strtolower($_GET['id']))) : null;
	}*/
	public function parseUrl(){
		if (isset($_GET)) {
			return $_GET;
		}elseif (isset($_POST)) {
			return $_POST;
		}elseif (isset($_GET) && isset($_POST)) {
			return array_merge_recursive($_GET,$_POST);
		}else{
			return array(
						'home',
						'home',
						'index'
					);
		}

		/*if (isset($_GET['url'])) {
			$url = filter_var(rtrim(trim(addslashes(strtolower($_GET['url']))),'/'),FILTER_SANITIZE_URL);
			return $url = explode("/", $url);
		}else if (isset($_POST['url'])) {
			$url = filter_var(rtrim(trim(addslashes(strtolower($_POST['url']))),'/'),FILTER_SANITIZE_URL);
			return $url = explode("/", $url);
		}else{
			return array(
				'home',
				'home',
				'index'
			);
		}*/
	}
	public function uri_segment($id){
		$uri = $this->parseUrl();
		if (isset($id)) {
			
			return $uri[$id];
		}else{
			return $uri;
		}
	}
}
