<?php 
namespace system;
class Template {
	private $dir_theme;
	private $dir_file;
	private $mod  = false;
	private $temp;
	private $lang;

	/**
	 * Contructor
	 */
	public function __construct() {
		global $_web;
		$this->temp   = $_web['temp'];
		$this->lang   = $_web['lang'];
		$this->mod    = $_web['mod'];

		$this->dir_theme = DIR_THEME . $this->temp . '/view';
		$this->dir_file  = DIR_TMP . 'themes/' . $this->temp . '/';

		if (!is_dir($this->dir_file)) {
			mkdir($this->dir_file);
			chmod($this->dir_file, 0775);
		}
		
	}

	/**
	 * Load teamplete
	 * @param string $name duong dan cua file template htm;
	 * @return string $objfile duong dan file xu ly php tuong ung voi file htm
	 */
	public function load() {
		$files = array_diff(scandir($this->dir_theme), array('.', '..'));

		echo "<pre>";
		print_r($files);die;

		foreach ($files as $file) {
			# code...
		}

		/*$names   = explode('/', $name);
		$dir_new = $this->dir_file;
		if (count($names) > 1) {
			for ($i = 0; $i < count($names) - 1; $i++) {
				$dir_new .= $names[$i] . '/';
				if (!is_dir($dir_new)) {
					mkdir($dir_new);
					chmod($dir_new, 0775);
				}

			}
		}
		//echo $this->dir_theme.$name.'.htm';

		if (!file_exists($this->dir_theme . $name . '.htm')) {
			$this->dir_theme = DIR_MODULES . $this->mod . '/themes/';
			$name            = str_replace($this->mod . '/', '', $name);
		}

		$objfile = $this->dir_file . $name . '.php';

		//if(!file_exists($objfile)) {
		$this->parse_template($name);
		//}
		return $objfile;*/
	}
	/**
	 * Load teamplete  ajax
	 * @param string $name duong dan cua file template htm;
	 * @return string $objfile duong dan file xu ly php tuong ung voi file htm
	 */
	public function loadajax($name) {
		global $_B;

		$this->dir_theme = DIR_THEME . $this->temp . '/';

		$names   = explode('/', $name);
		$dir_new = $this->dir_file;
		if (count($names) > 1) {
			for ($i = 0; $i < count($names) - 1; $i++) {
				$dir_new .= $names[$i] . '/';
				if (!is_dir($dir_new)) {
					mkdir($dir_new);
					chmod($dir_new, 0775);
				}

			}
		}

		if (file_exists($this->dir_theme . $this->mod . '/' . $name . '.htm')) {
			$this->dir_theme = $this->dir_theme . $this->mod . '/';
			//$name = str_replace($this->mod.'/', '', $name);
		} elseif (!file_exists($this->dir_theme . $name . '.htm')) {
			$this->dir_theme = DIR_MODULES . $this->mod . '/themes/';
			$name            = str_replace($this->mod . '/', '', $name);
		}

		$objfile = $this->dir_file . $name . '.php';

		//if(!file_exists($objfile)) {
		$this->parse_template($name, null, true);
		//}
		return $objfile;
	}
	public function load_block($name, $module) {
		global $_B;

		$this->dir_theme = DIR_THEME . $this->temp . '/' . $module . '/';

		$names   = explode('/', $name);
		$dir_new = $this->dir_file;
		if (count($names) > 1) {
			for ($i = 0; $i < count($names) - 1; $i++) {
				$dir_new .= $names[$i] . '/';
				if (!is_dir($dir_new)) {
					mkdir($dir_new);
					chmod($dir_new, 0775);
				}

			}
		}

		if (!file_exists($this->dir_theme . $name . '.htm')) {
			$this->dir_theme = DIR_MODULES . $module . '/themes/';
			$name            = str_replace($module . '/', '', $name);
		}

		$objfile = $this->dir_file . $name . '.php';

		//if(!file_exists($objfile)) {
		$this->parse_template($name, $module);
		//}
		return $objfile;
	}
	public function load_home($name, $module) {
		global $_B;

		$this->dir_theme = DIR_THEME . $this->temp . '/' . $module . '/';

		$names   = explode('/', $name);
		$dir_new = $this->dir_file;
		if (count($names) > 1) {
			for ($i = 0; $i < count($names) - 1; $i++) {
				$dir_new .= $names[$i] . '/';
				if (!is_dir($dir_new)) {
					mkdir($dir_new);
					chmod($dir_new, 0775);
				}

			}
		}

		//echo $this->dir_theme.$name.'.htm';
		//die;

		if (!file_exists($this->dir_theme . $name . '.htm')) {
			$this->dir_theme = DIR_MODULES . $module . '/themes/';
			$name            = str_replace($module . '/', '', $name);
		}

		$objfile = $this->dir_file . $name . '.php';

		//if(!file_exists($objfile)) {
		$this->parse_template($name, $module);
		//}
		return $objfile;
	}
	/**
	 * Xy ly template dinh nghia cac the tai file html
	 * @param string $tpl ten cua file templete
	 */
	private function parse_template($tpl, $module = null, $ajax = false) {
		global $web, $_B;
		$tplfile = $this->dir_theme . $tpl . '.htm';
		
		// if ($ajax == true) {
		// 	$tplfile = $this->dir_theme.$this->mod.'/'.$tpl.'.htm';
		// }

		$objfile = $this->dir_file . $tpl . '.php';

		$template = $this->sreadfile($tplfile);
		if (empty($template)) {
			exit("Template file : $tplfile Not found or have no access!");
		}


		$template = str_replace('{{!', '<?php ', $template);
		$template = str_replace('!}}', '?> ', $template);

		if (!$this->swritefile($objfile, $template)) {
			exit("File: $objfile can not be write!");
		}
	}

	/**
	 * Doc noi dung file
	 * @param string $filename file can doc
	 * @return string $content noi dung cua file
	 */
	private function sreadfile($filename) {
		$content = '';
		if (function_exists('file_get_contents')) {
			@$content = file_get_contents($filename);
		} else {
			if (@$fp = fopen($filename, 'r')) {
				@$content = fread($fp, filesize($filename));
				@fclose($fp);
			}
		}
		return $content;
	}
	/**
	 *
	 */
	private function readConfigJson($dir) {
		$json = json_decode(file_get_contents($dir), 1);
		return $json['config'];
	}

	/**
	 * Doc noi dung file template
	 * @param string $name ten cua file html
	 * @return string $content noi dung cua file html
	 */
	private function readtemplate($name) {
		global $_B;
		$tplfile = $this->dir_theme . $name . '.htm';
		$content = $this->sreadfile($tplfile);
		return $content;
	}

	/**
	 * Ghi file
	 * @param string $filename ten file can ghi
	 * @param string $writetext du lieu su dung ghi
	 * @param string $openmod che do thao tac voi file (mac dinh la 'w')
	 * @return bool : true neu ghi thanh cong : false neu ghi that bai
	 */
	private function swritefile($filename, $writetext, $openmod = 'w') {
		if (@$fp = fopen($filename, $openmod)) {
			flock($fp, 2);
			fwrite($fp, $writetext);
			fclose($fp);
			chmod($filename, 0664);
			return true;
		} else {
			return false;
		}
	}

	/**
	 * addquote
	 * @param string $var chuoi ki tu
	 * @return string chuoi ki tu da addqoute
	 */
	private function addquote($var) {
		return str_replace("\\\"", "\"", preg_replace("/\[([a-zA-Z0-9_\-\.\x7f-\xff]+)\]/s", "['\\1']", $var));
	}

	/**
	 * stripvtags
	 * @param string $expr
	 * @param string $statement
	 * @return string chuoi ky tu da strip
	 */
	private function stripvtags($expr, $statement = '') {
		$expr      = str_replace("\\\"", "\"", preg_replace("/\<\?\=(\\\$.+?)\?\>/s", "\\1", $expr));
		$statement = str_replace("\\\"", "\"", $statement);
		return $expr . $statement;
	}

	/**
	 * looptemp
	 * @param string $parameter
	 * @return string $search chuoi ky tu
	 */
	private function looptemp($parameter) {
		$this->g['i']++;
		$search                                  = "<!--TEMPWEB_TAG_{$this->g['i']}-->";
		$this->g['block_search'][$this->g['i']]  = $search;
		$this->g['block_replace'][$this->g['i']] = "<?php include \$_B['temp']->load('$parameter') ?>";
		return $search;
	}
	private function looptemphome($mod, $parameter) {
		$this->g['i']++;
		$search                                  = "<!--TEMPWEB_TAG_{$this->g['i']}-->";
		$this->g['block_search'][$this->g['i']]  = $search;
		$this->g['block_replace'][$this->g['i']] = "<?php include \$_B['temp']->load_block('$parameter','$mod') ?>";
		return $search;
	}
	private function looptempblock($mod, $parameter) {
		$this->g['i']++;
		$search                                  = "<!--TEMPWEB_TAG_{$this->g['i']}-->";
		$this->g['block_search'][$this->g['i']]  = $search;
		$this->g['block_replace'][$this->g['i']] = "<?php include \$_B['temp']->load_block('$parameter','$mod') ?>";
		return $search;
	}
	/**
	 * evaltags
	 * @param string $php
	 * @return string $search
	 */
	private function evaltags($php) {
		$this->g['i']++;
		$search                                  = "<!--EVAL_TAG_{$this->g['i']}-->";
		$this->g['block_search'][$this->g['i']]  = $search;
		$this->g['block_replace'][$this->g['i']] = "<?php " . $this->stripvtags($php) . " ?>";

		return $search;
	}

	/**
	 * Load Positon Ad
	 */
	public function printposAd($pos) {
		global $_B, $mod, $web;

		db_connect('template');
		$adsObj = new Model($this->lang . '_adv_image');
		$adsObj->where('idw', $this->idw);
		$adsObj->where('position', $pos);
		$adsObj->where('status', 1);
		$adsObj->orderBy('sort', 'ASC');
		$images = $adsObj->get(null, null, 'id,title,description,img,width,height,position,sort,start_time,finish_time,link_GA,page');
		foreach ($images as $k => $v) {
			if (($v['start_time'] <= time() && time() <= $v['finish_time']) || $v['finish_time'] == 0) {
				$v['type'] = 'image';
				$adv[]     = $v;
			}
		}

		$adsObjFlash = new Model($this->lang . '_adv_flash');
		$adsObjFlash->where('idw', $this->idw);
		$adsObjFlash->where('position', $pos);
		$adsObjFlash->where('status', 1);
		$adsObjFlash->orderBy('sort', 'ASC');
		$flash = $adsObjFlash->get(null, null, 'id,title,description,flash,width,height,position,sort,start_time,finish_time,link_GA,page');
		foreach ($flash as $k => $v) {
			if (($v['start_time'] <= time() && time() <= $v['finish_time']) || $v['finish_time'] == 0) {
				$v['type']  = 'flash';
				$v['flash'] = loadFlash($v['flash'], $v['width'], $v['height']);
				$adv[]      = $v;
			}
		}
		$adsObjText = new Model($this->lang . '_adv_text');
		$adsObjText->where('idw', $this->idw);
		$adsObjText->where('position', $pos);
		$adsObjText->where('status', 1);
		$adsObjText->orderBy('sort', 'ASC');
		$texts = $adsObjText->get(null, null, 'id,title,short,description,content,position,sort,start_time,finish_time,link_GA,page');
		foreach ($texts as $k => $v) {
			if (($v['start_time'] <= time() && time() <= $v['finish_time']) || $v['finish_time'] == 0) {
				$v['type'] = 'text';
				$adv[]     = $v;
			}
		}

		$adsObjGG = new Model($this->lang . '_adv_ggadsense');
		$adsObjGG->where('idw', $this->idw);
		$adsObjGG->where('position', $pos);
		$adsObjGG->where('status', 1);
		$adsObjGG->orderBy('sort', 'ASC');
		$texts = $adsObjGG->get(null, null, 'id,title,code_adv,description,position,sort,start_time,finish_time,link_GA,page');
		foreach ($texts as $k => $v) {
			if (($v['start_time'] <= time() && time() <= $v['finish_time']) || $v['finish_time'] == 0) {
				$v['type'] = 'gg';
				$adv[]     = $v;
			}
		}
		if (is_array($adv)) {
			foreach ($adv as $row) {
				foreach ($row as $key => $value) {
					${$key}[] = $value;
				}
			}
			array_multisort($sort, SORT_ASC, $adv);
			$web['adv'][$pos] = $adv;
		}

		return $_B['temp']->load('common/bnc_position_adv_' . $pos);
	}
	/**
	 * Xuat blocks ra he thong
	 * @param vitri int;
	 * @return array
	 */
	private function readBlocks($module) {
		$dir     = DIR_MODULES . $module . "/blocks/";
		$fileArr = array();
		if (is_dir($dir)) {
			$files = scandir($dir);
			$re    = '/^([a-zA-Z0-9]+)\.php$/';
			foreach ($files as $file) {
				if (preg_match($re, $file)) {
					$fileArr[] = basename($file, '.php');
				}
			}
		}
		return $fileArr;
	}
	public function printpos($vitri) {
		global $mod;

		// if ($vitri == 1) {
		// 	$this->loadBlock('news/blockcategory');
		// 	$this->loadBlock('news/blockhot');
		// 	$this->loadBlock('template/blockadv');
		// }
		// if ($vitri == 4) {
		// 	$this->loadBlock('template/blockbottom');
		// }

		if($vitri == 10){
			$this->loadBlock('news/blocktest');
		}

		if($vitri == 1){
			$this->loadBlock('product/blocktopone');
		}
        if($vitri == 2){
			$this->loadBlock('product/blockv2tabhome');
		}
		if($vitri == 3){
			$this->loadBlock('product/blockv3tabhome');
		}
		if($vitri == 4){
			$this->loadBlock('product/blockv4tabhome');
		}
		if($vitri == 5){
			$this->loadBlock('product/blockv5tabhome');
		}
		if($vitri == 6){
			$this->loadBlock('news/blocknews');
		}
		if($vitri == 7){
			$this->loadBlock('product/blockHot');
		}
		if($vitri == 8){
			$this->loadBlock('news/blockhot');
		}

		if($vitri == 9){
			$this->loadBlock('template/blockSlideTop');
		}
		if($vitri == 13){
			$this->loadBlock('template/blockSlideLeft');
		}
		if($vitri == 14){
			$this->loadBlock('info/blockinformation');
		}
		if($vitri == 15){
			$this->loadBlock('info/blockinfologo');
		}
		if($vitri == 16){
			$this->loadBlock('product/blockPaymentHot');
		}
		if($vitri == 17){
			$this->loadBlock('news/blockplay');
		}
		if($vitri == 18){
			$this->loadBlock('news/blockeat');
		}
		if($vitri == 19){
			$this->loadBlock('news/blockalbum');
		}
		if($vitri == 20){
			$this->loadBlock('info/blocklienhe');
		}
		if($vitri == 21){
			$this->loadBlock('news/blockalbumhome');
		}
		if($vitri == 22){
			$this->loadBlock('news/blocknewshome');
		}
		if($vitri == 23){
			$this->loadBlock('product/blockSearch');
		}
		if($vitri == 24){
			$this->loadBlock('product/blockExchangeRate');
		}
		if($vitri == 24){
			$this->loadBlock('poll/blockPoll');
		}
		if($vitri == 24){
			$this->loadBlock('template/blockAnalytics');
		}
		if($vitri == 25){
			$this->loadBlock('info/blockfooter');
		}

		// mobile
		if($vitri == 39){
			$this->loadBlock('template/blockmSlideTop');
		}
		if($vitri == 40){
			$this->loadBlock('product/blockmtopone');
		}
		if($vitri == 41){
			$this->loadBlock('product/blockmv2tabhome');
		}
		if($vitri == 42){
			$this->loadBlock('news/blockmalbumhome');
		}
		if($vitri == 43){
			$this->loadBlock('news/blockmnewshome');
		}
		if($vitri == 44){
			$this->loadBlock('info/blockmfooter');
		}
		if($vitri == 55){
			$this->loadBlock('news/blockvideohone');
		}
		if($vitri == 56){
			$this->loadBlock('news/blockmvideohone');
		}
		if($vitri == 57){
			$this->loadBlock('info/blocktaxi');
		}

		/*if ($vitri == 1) {
			$this->loadBlock('template/blockSlideTop');
		}*/
		/*if ($vitri == 2) {
			$this->loadBlock('product/blockNew');
			$this->loadBlock('news/blocknew');
			$this->loadBlock('template/blockSlideRight');
		}*/
		/*if ($vitri == 3) {
			$this->loadBlock('template/blockSlideBottom');
		}	*/	
		/*if ($vitri == 4) {
			$this->loadBlock('product/blockCategory');
			$this->loadBlock('template/blockSlideLeft');

		}*/
		/*if ($vitri == 5) {
			$this->loadBlock('tour/blockcategory');
			$this->loadBlock('hotel/blockcategoryhotel');
			$this->loadBlock('template/blockAdvRight');
		}*/
		// if ($vitri == 6) {
		// 	$this->loadBlock('feedback/blockfeed');
		// 	$this->loadBlock('poll/blockpoll');
		// }
		// if ($vitri == 2) {
		// 	$this->loadBlock('template/blockadvtop');
		// }
		// if ($vitri == 8) {
		// 	$this->loadBlock('info/blockinfo');
		// }
		// $listBlocks = $this->readBlocks('product');
		// foreach ($listBlocks as $key => $value) {
		// 	$this->loadBlock($value, 'product');
		// }
	}
	private function loadBlock($file) {
		global $_B, $web, $mod;
		$f      = explode('/', $file);
		$module = $f[0];
		$file   = $f[1];
		$block  = array();
		include_once DIR_MODULES . $module . "/blocks/" . $file . ".php";
		$class          = 'module\\' . $module . '\\' . $file . '\\Block';
		$blockObj       = new $class;
		$temp           = 'blocks/' . $file;
		$data           = $blockObj->returnData;
		$block['title'] = lang($file);
		include_once $_B['temp']->load_block($temp, $module);
	}

	private function readHome($module) {
		$dir     = DIR_MODULES . $module . "/homes/";
		$fileArr = array();
		$files   = scandir($dir);
		$re      = '/^([a-zA-Z0-9\_]+)\.php$/';
		foreach ($files as $file) {
			if (preg_match($re, $file)) {
				$fileArr[] = basename($file, '.php');
			}
		}
		return $fileArr;
	}
	public function printhome() {
		global $_B, $mod;
		db_connect('template');
		$blockObj = new Model($this->lang . '_home');
		$blockObj->where('idw', $this->idw);
		$blockObj->where('status', 1);
		$blockObj->orderBy('sort', 'ASC');
		$listBlocks = $blockObj->get();
		foreach ($listBlocks as $key => $value) {
			$this->loadHome($value['file'], $value['module_str']);
		}
	}
	private function loadHome($file, $mod) {
		global $_B, $_L, $web, $webObj;
		// $module = $block['module_str'];
		// $file = $block['file'];
		$module = $mod;
		$block  = array();
		include_once DIR_MODULES . $module . "/homes/" . $file . ".php";

		if (file_exists(DIR_MODULES . $module . "/lang/" . $_B['lang'] . "/home.php")) {
			include_once DIR_MODULES . $module . "/lang/" . $_B['lang'] . "/home.php";

		}

		$class                  = 'module\\' . $module . '\\' . $file . '\\BlockHome';
		$blockObj               = new $class;
		$temp                   = 'homes/' . $file;
		$data                   = $blockObj->returnData;
		$data['content']        = $data;
		$block['title']         = lang($file);
		$tmp                    = $web['static_temp_mod'];
		$web['static_temp_mod'] = $webObj->get_static_theme_mod($module);
		include $_B['temp']->load_home($temp, $module);
		$web['static_temp_mod'] = $tmp;
	}

}