<?php
$_web['base_url'] = 'http://localhost/fidi/admin/';
$_web['base_url_fontend'] = 'http://localhost/fidi';
$_SESSION['base_url_cloud'] = 'http://localhost/fidi/cloud/';
// $_SESSION['base_url_cloud']	= 'https://cloud.com/';
// $_SESSION['base_url_cloud']	= 'http://ngokhong.com/';
// $_web['base_url'] 				= 'http://localhost/admin/';
// $_web['base_url_fontend'] 		= 'http://localhost/fontend/';
// $_SESSION['base_url_cloud']		= 'http://localhost/cloud/';
$_web['security_key'] = 'aHR0cDovL2xvY2FsaG9zdC9jbG91ZC8xODAzMjAxNw==';

$_SESSION['base_url_admin'] = $_web['base_url'];
$_SESSION['base_url_cdn'] = $_SESSION['base_url_cloud'] . 'cdn/';
$_SESSION['base_url_files'] = $_SESSION['base_url_cloud'] . 'files/';
