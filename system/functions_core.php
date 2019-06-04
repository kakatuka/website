<?php
/*
 * author: Thiên Việt JSC
 * mail: info@thienvietjsc.net
 */
if (!function_exists('db_connect')) {
	function db_connect($_mod = null) {
		global $_LNC, $_web;
		if ($_mod == null) {
			$_web['db'] = new MysqliDb($_LNC['db_host'], $_LNC['db_user'], $_LNC['db_password'], $_LNC['db_name'], $_LNC['db_charset'], $_LNC['db_port']);
		}
	}
}
if (!function_exists('lang')) {
	function lang($key) {
		global $_L;
		if (isset($_L[$key])) {
			$result = $_L[$key];
		} else {
			$result = "Chưa tồn tại ngôn ngữ để hiển thị.";
		}
		return $result;
	}
}
if (!function_exists('base_url')) {
	function base_url() {
		global $_web;
		return $_web['base_url'];
	}
}
if (!function_exists('base_url_admin')) {
	function base_url_admin() {
		global $_web;
		return $_web['base_url_admin'];
	}
}
if (!function_exists('base_url_cloud')) {
	function base_url_cloud() {
		global $_web;
		return $_web['base_url_cloud'];
	}
}
if (!function_exists('base_url_cdn')) {
	function base_url_cdn() {
		global $_web;
		return $_web['base_url_cdn'];
	}
}
if (!function_exists('base_url_files')) {
	function base_url_files() {
		global $_web;
		return $_web['base_url_files'];
	}
}
if (!function_exists('redirect')) {
	function redirect($url) {
		if ($url == 'current') {
			header("Refresh: 0");
			exit;
		} else {
			header("location: $url");
			exit;
		}

	}
}
if (!function_exists('replaceAdmin')) {
	function replaceAdmin($link = null) {
		if ($link != null) {
			return str_replace("/cadmin/", "/", $link);
		}
	}
}

if (!function_exists('covertMoney')) {
	function covertMoney($number) {
		if ($number != null) {
			return number_format($number, 0, '', '.');
		}
	}
}

/**
 * getIp()
 * @return $ip
 */
if (!function_exists('getIp')) {
	function getIp() {
		$ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
		foreach ($ip_keys as $key) {
			if (array_key_exists($key, $_SERVER) === true) {
				foreach (explode(',', $_SERVER[$key]) as $ip) {
					// trim for safety measures
					$ip = trim($ip);
					// attempt to validate IP
					if (validateIp($ip)) {
						return $ip;
					}
				}
			}
		}

		return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
	}
}

if (!function_exists('validateIp')) {
	function validateIp($ip) {
		if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
			return false;
		}
		return true;
	}
}

if (!function_exists('getImagesToFolder')) {
	function getImagesToFolder($dir) {
		$ImagesArray = [];
		$file_display = ['jpg', 'jpeg', 'png', 'gif'];

		if (file_exists($dir) == false) {
			return ["Directory \'', $dir, '\' not found!"];
		} else {
			$dir_contents = scandir($dir);
			foreach ($dir_contents as $file) {
				$file_type = pathinfo($file, PATHINFO_EXTENSION);
				if (in_array($file_type, $file_display) == true) {
					$ImagesArray[] = $file;
				}
			}
			return $ImagesArray;
		}
	}
}

if (!function_exists('base64url_encode')) {
	function base64url_encode($data) {
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}
}

if (!function_exists('base64url_decode')) {
	function base64url_decode($data) {
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
	}
}

/**
 * @return chuỗi tiếng việt không dấu
 */
if (!function_exists('strU')) {
	function strU($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		$str = preg_replace("/(Đ)/", 'D', $str);
		$str = preg_replace("/[^A-Za-z0-9 ]/", ' ', $str);
		$str = preg_replace("/\s+/", ' ', $str);
		$str = trim($str);
		return $str;
	}
}
/**
 * @return link SEO
 */

if (!function_exists('alias')) {
	function alias($str) {
		$str = strU($str);
		$str = strtolower($str);
		$str = str_replace(' ', '-', $str);
		$str = str_replace('~', '', $str);
		$str = str_replace('{', '', $str);
		$str = str_replace('}', '', $str);
		$str = str_replace('[', '', $str);
		$str = str_replace(']', '', $str);
		$str = str_replace(':', '', $str);
		$str = str_replace('\'', '', $str);
		$str = str_replace('\\', '', $str);
		$str = str_replace('(', '', $str);
		$str = str_replace(')', '', $str);
		$str = str_replace('*', '', $str);
		$str = str_replace('&', '', $str);
		$str = str_replace('^', '', $str);
		$str = str_replace('%', '', $str);
		$str = str_replace('$', '', $str);
		$str = str_replace('#', '', $str);
		$str = str_replace('@', '', $str);
		$str = str_replace('!', '', $str);
		$str = str_replace('`', '', $str);
		$str = str_replace('.', '', $str);
		$str = str_replace(' ', '-', $str);
		return $str;
	}
}

if (!function_exists('recursiveMenu')) {
	function recursiveMenu($data, $parent = 0, $count = 0) {
		global $_web;
		if (isset($data[$parent])) {
			if ($parent == 0) {
				echo "<ul class='nav navbar-nav'>
					 <li><a href='/'class='home-item'></a></li>
				"; // edit menu 
			} else {
				echo "<ul class='dropdown-menu'>";
			}
			foreach ($data[$parent] as $k => $value) {
				$id = $value['id'];
				if (isset($data[$id])) {
					if ($count > 0) {
						$class = 'class=""';
					} else {
						$class = 'class=""';
					}
					echo '<li class="dropdown fix_'.$value['id'].'">';
				} else{	
					echo "<li id='".$value['id']."'>";
				}
				if (isset($data[$id])) {
					if ($parent > 0) {
					} else {
						$right = '';
					}
					echo "<a href='" . $value['link'] . "' class=''>" . $value['title']. "</a>";
				} else {
					// dd($_web['uri']['id']);
					echo "<a  href='" . $value['link'] . "'>" . $value['title'] . "</a>";
				}
				unset($data[$k]);
				recursiveMenu($data, $id, $count + 1);
				echo "</li>";
			}
			echo "</ul>";
		}
	}
}
if (!function_exists('menuMobile')) {
	function menuMobile($data, $parent = 0, $count = 0) {
		global $_web;
		if (isset($data[$parent])) {
			if ($parent == 0) {
				echo "<ul >";
			} else {
				echo "<ul class='sub_mobile'>";
			}
			foreach ($data[$parent] as $k => $value) {
				$id = $value['id'];
				// dd($id);
				if (isset($data[$id])) {
					if ($count > 0) {
						$class = 'class';
					} else {
						$class = 'class="dropMenu"';
					}
					echo "<li $class>";
				} else {
					echo "<li >";
				}
				if (isset($data[$id])) {
					if ($parent > 0) {
						$right = "<i class='fa fa-angle-down'></i>";
					} else {
						$right = '';
					}
					echo "<a href='javascript:void(0)' class='dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>" . $value['title']. "</a><i class='fa fa-angle-down'></i>";
				} else {
					echo "<a class='nav-link' href='" . $value['link'] . "'>" . $value['title'] . "</a>";
				}
				unset($data[$k]);
				menuMobile($data, $id, $count + 1);
				echo "</li>";
			}
			echo "</ul>";
		}
	}
}
if (!function_exists('recursiveMenuFooter')) {
	function recursiveMenuFooter($data, $parent = 0, $count = 0) {
		global $_web;
		if (isset($data[$parent])) {
			if ($parent == 0) {
				echo "<ul class='navbar-nav'>";
			} else {
				echo "<ul class='dropdown-menu'>";
			}
			foreach ($data[$parent] as $k => $value) {
				$id = $value['id'];
				// dd($id);
				if (isset($data[$id])) {
					if ($count > 0) {
						$class = 'class="dropdown-submenu"';
					} else {
						$class = 'class="dropdown"';
					}
					echo "<li $class>";
				} else {
					echo "<li class='nav-item'>";
				}
				if (isset($data[$id])) {
					if ($parent > 0) {
						$right = "<i class='fa fa-angle-right'></i>";
					} else {
						$right = '';
					}
					echo "<a href='" . $value['link'] . "' class='dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>" . $value['title'] . $right . "<span class='caret'></span></a>";
				} else {
					echo "<a class='nav-link' href='" . $value['link'] . "'>" . $value['title'] . "</a>";
				}
				unset($data[$k]);
				recursiveMenuBlog($data, $id, $count + 1);
				echo "</li>";
			}
			echo "</ul>";
		}
	}
}
if (!function_exists('recursiveMenuContent')) {
	function recursiveMenuContent($data, $parent = 0, $count = 0) {
		global $_web;
		if (isset($data[$parent])) {
			if ($parent == 0) {
				echo "<ul class='template-menu-ul'>";
			} else {
				echo "<ul class='sub-menu'>";
			}
			// dd($data[$parent]);
			foreach ($data[$parent] as $k => $value) {
				$id = $value['id'];
				// dd($id);
				if (isset($data[$id])) {
					if ($count > 0) {
						$class = 'class="menu-item"';
					} else {
						$class = 'class="menu-item"';
					}
					echo "<li $class>";
				} else {
					echo "<li class='cate' data-id='".$value['id']."'>";
				}
				if (isset($data)) {
					if ($parent > 0) {
						$right = "";
					} else {
						$right = '';
					}
					echo  "<span  > ". $value['title']."</span>";
				} else {
					echo "<span> " . $value['title'] . "</span>";
				}
				unset($data[$k]);
				recursiveMenuContent($data, $id, $count + 1);
				echo "</li>";
			}
			echo "</ul>";
		}
	}
}

if (!function_exists('recursiveMenuProduct')) {
	function recursiveMenuProduct($data, $parent = 0, $count = 0) {
		global $_web;
		if (isset($data[$parent])) {
			if ($parent == 0) {
				echo "<ul class='menuleft' style='float: left;width: 260px;position: relative;box-sizing: border-box;'>";
			} else {
				echo "<ul class='sub-menu'>";
			}
			foreach ($data[$parent] as $k => $value) {
				$id = $value['id'];
				if (isset($data[$id])) {
					if ($count > 0) {
						$class = 'class="menu-item"';
					} else {
						$class = 'class="menu-item"';
					}
					echo "<li $class>";
				} else {
					echo "<li $class>";
				}
				if (isset($data)) {
					if ($parent > 0) {
						$right = "<div><img src='" . getImage($value['css_class'], '350', '350', 'zc=2') . "'></div>";
					} else {
						$right = '';
					}
					echo "<a href='" . $value['link'] . "'>" . $right . "<span>" . $value['title'] . "</span>" . "</a>";
				} else {
					echo "<a href='" . $value['link'] . "'>" . $value['title'] . $right . "</a>";
				}
				unset($data[$k]);
				recursiveMenuProduct($data, $id, $count + 1);
				echo "</li>";
			}
			echo "</ul>";
		}
	}
}
if (!function_exists('recursiveMenuProduct2')) {
	function recursiveMenuProduct2($data, $parent = 0, $count = 0) {
		global $_web;
		if (isset($data[$parent])) {
			if ($parent == 0) {
				echo "<ul class='menuleft' style='display: none;'>";
			} else {
				echo "<ul class='sub-menu'>";
			}
			foreach ($data[$parent] as $k => $value) {
				$id = $value['id'];
				if (isset($data[$id])) {
					if ($count > 0) {
						$class = 'class="menu-item"';
					} else {
						$class = 'class="menu-item"';
					}
					echo "<li $class>";
				} else {
					echo "<li $class>";
				}
				if (isset($data)) {
					// dd($data);
					if ($parent > 0) {
						// dd($parent);
						$right = "<div><img src='" . getImage($value['css_class'], '350', '350', 'zc=2') . "'></div>";
					} else {
						$right = '';
					}
					echo "<a href='" . $value['link'] . "'>" . $right . "<span>" . $value['title'] . "</span>" . "</a>";
				} else {
					echo "<a href='" . $value['link'] . "'>" . $value['title'] . $right . "</a>";
				}
				unset($data[$k]);
				recursiveMenuProduct2($data, $id, $count + 1);
				echo "</li>";
			}
			echo "</ul>";
		}
	}
}

if (!function_exists('recursiveMenuHeader')) {
	function recursiveMenuHeader($data, $parent = 0, $count = 0) {
		global $_web;
		if (isset($data[$parent])) {
			if ($parent == 0) {
				echo "<div class='menu-head'>";
			} else {
				echo "<ul class=''>";
			}
			foreach ($data[$parent] as $k => $value) {
				$id = $value['id'];
				if (isset($data[$id])) {
					if ($count > 0) {
						$class = 'class="menu-item"';
					} else {
						$class = 'class=""';
					}
					echo "<li $class>";
				} else {
					echo "<li $class>";
				}
				if (isset($data)) {
					// dd($data);
					if ($parent > 0) {
						// dd($parent);
						$right = "";
					} else {
						$right = '';
					}
					echo "<a href='" . $value['link'] . "'>" . $right . "<span>" . $value['title'] . "</span>" . "</a>";
				} else {
					echo "<a href='" . $value['link'] . "'>" . $value['title'] . $right . "</a>";
				}
				unset($data[$k]);
				recursiveMenuHeader($data, $id, $count + 1);
				echo "</li>";
			}
			echo "</ul>";
		}
	}
}
//menu footer blog
if (!function_exists('recursiveMenuFooter')) {
	function recursiveMenuFooter($data, $parent = 0, $count = 0) {
		global $_web;
		if (isset($data[$parent])) {
			if ($parent == 0) {
				echo "<div class='main-items'>";
			} else {
				echo "<ul class='dropdown-menu'>";
			}
			foreach ($data[$parent] as $k => $value) {
				$id = $value['id'];
				if (isset($data[$id])) {
					if ($count > 0) {
						$class = 'class="dropdown-submenu"';
					} else {
						$class = 'class="dropdown"';
					}
					echo "<li $class>";
				} else {
					echo "<li>";
				}
				if (isset($data[$id])) {
					if ($parent > 0) {
						$right = "<i class='fa fa-angle-right'></i>";
					} else {
						$right = '';
					}
					echo "<a href='" . $value['link'] . "' class='dropdown-toggle' data-toggle='dropdown' data-target='#'>" . $value['title'] . $right . "</a>";
				} else {
					echo "<a href='" . $value['link'] . "'>" . $value['title'] . "</a>";
				}
				unset($data[$k]);
				recursiveMenuFooter($data, $id, $count + 1);
				echo "</li>";
			}
			echo "</ul>";
		}
	}
}

if (!function_exists('createCaptcha')) {
	function createCaptcha() {
		$ranStr = getRandomWord();
		$_SESSION["captcha"] = strtolower($ranStr);

		$height = 35; //CAPTCHA image height
		$width = 150; //CAPTCHA image width
		$font_size = 24;

		$image_p = imagecreate($width, $height);
		$graybg = imagecolorallocate($image_p, 245, 245, 245);
		$textcolor = imagecolorallocate($image_p, 34, 34, 34);
		header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		ob_start("callback");
		// $debugLog = ob_get_contents();
		ob_end_clean();
		//send image to browser
		header("Content-type: image/gif");
		imagefttext($image_p, $font_size, -2, 15, 26, $textcolor, DIR_PUBLIC . 'root/fonts/mono.ttf', $ranStr);
		//imagestring($image_p, $font_size, 5, 3, $ranStr, $white);
		imagepng($image_p);

	}
}

if (!function_exists('checkCaptcha')) {
	function checkCaptcha($cap) {
		if ($_SESSION['captcha'] == strtolower($cap)) {
			return true;
		} else {
			return false;
		}

	}
}