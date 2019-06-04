<?php 

$_web = array();
$_mod = null;
$_web['lang'] = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'vi';
require_once "app/config.php";
require_once "app/database.php";
require_once "system/mysqliDB.php";
require_once "system/model.php";
require_once "system/functions_core.php";
require_once "view.php";
require_once "input.php";
//require_once "system/template.php";
require_once "app/app.php";
require_once "controller.php";
require_once "app/bootstraps.php";
require_once "app/functions.php";
require_once "app/session.php";
require_once "app/class.upload.php";
db_connect(); 
$App = new App();
$_web['modules'] = $App->get_modules();

if (!in_array($_web['uri']['mod'], $_web['modules']) && !isset($_web['uri']['mod'])) {
	$_web['uri']['mod'] = "home";
}




// goi ngon ngu chung
if (isset($_web['lang'])) {
	$file_lang = DIR_APP.'lang/'.$_web['lang'].'/main.php';
	if (file_exists($file_lang)) {
		include($file_lang);	
	}
}

// goi ngon ngu module
if (isset($_web['lang'])) {
	$file_lang_mod = DIR_MODULES.$_web['uri']['mod'].'/lang/'.$_web['lang'].'/main.php';
	if (file_exists($file_lang_mod)) {
		include($file_lang_mod);	
	}
}
$controller = new controller();
$bootstraps = new bootstraps();


