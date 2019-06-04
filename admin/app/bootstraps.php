<?php 
class Bootstraps{
	public function __construct(){
		global $_web;
		$controllerName = ucfirst($_web['uri']['controller'])."Controller";
		$action = $_web['uri']['action'];
		$path_controller = DIR_MODULES.$_web['uri']['mod']."/"."controller"."/".$controllerName.".php";
		if (file_exists($path_controller)) {
			//if (isset($_SESSION['id']) && isset($_SESSION['group_id'])) {
				require_once $path_controller;
				$controller = new $controllerName;
				if (isset($action) && method_exists($controller,$action)) {
					$controller->$action();
				}else{
					redirect(base_url().'404.htm');
				}
			/*}else{
				if (isset($_GET['controller'])) {
					require_once DIR_MODULES.$_web['uri']['mod']."/"."controller"."/".$controllerName.".php";
					$controller = new $controllerName;
					if (isset($action)) {
						$controller->$action();
					}
				}else{
					$_web['uri']['mod'] = "login";
					$_web['uri']['controller'] = 'login';
					$controllerName = ucfirst($_web['uri']['controller'])."Controller";
					require_once DIR_MODULES.$_web['uri']['mod']."/"."controller"."/".$controllerName.".php";

					$controller = new $controllerName;
					$controller->index();

				}
				
			}*/
		}else{
			redirect(base_url().'404.htm');
		}
	}
}