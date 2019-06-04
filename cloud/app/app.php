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
