<?php 
class Bootstraps{
	public function __construct(){
		global $_web;
		$controllerName = ucfirst($_web['uri']['controller'])."Controller";
		$action = $_web['uri']['action'];
		$path_controller = DIR_MODULES.$_web['uri']['mod']."/"."controller"."/".$controllerName.".php";
		if (file_exists($path_controller)) {
			require_once $path_controller;
			$controller = new $controllerName;
			if (isset($action)) {
				$controller->$action();
			}
		}
	}
}