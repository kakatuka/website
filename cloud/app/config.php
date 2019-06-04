<?php

$_web['base_url'] = 'http://localhost/fidi/cloud/';
// $_SESSION['base_admin'] 	= 'http://admin.ngokhong.com/';
// $_web['base_url'] 			= 'http://localhost/cloud/';
// Config key opendir
$_web['security_key'] = 'aHR0cDovL2xvY2FsaG9zdC9jbG91ZC8xODAzMjAxNw==';

$_SESSION['base_url_admin'] = $_SESSION['base_url'];
$_SESSION['base_url_cdn'] = $_web['base_url'] . 'cdn/';
$_SESSION['base_url_files'] = $_web['base_url'] . 'files/';