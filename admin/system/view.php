<?php 
class View{
	public $_fileView;
	public $_appendCss;
	public $appendCss;
	public $_appendJs;
	public $appendJs;
	public function render($file,$fullFile = true, $template = "teamplate"){
		global $_web;
		
		$path = DIR_MODULES . $_web['uri']['mod']."/view/".$file.".php";
		if ($fullFile == true) {
			$this->_fileView = $file;

			

			// append file js in folder Modules/resource/js
			$pathJs = DIR_MODULES . $_web['uri']['mod'] .'/resource/js';
			if (file_exists($pathJs)) {
				$filesJs = array_diff(scandir($pathJs), array('.', '..'));
			}
			if (!empty($filesJs)) {
				$htmlJs = '<!--START LOAD JS MODULES '.strtoupper($_web['uri']['mod']).'-->';
				foreach ($filesJs as $value) {
					$info = pathinfo($value);
					if ($info["extension"] == "js") { 
						$htmlJs .= '<script type="text/javascript" src="'.base_url().'modules/'.$_web['uri']['mod'] .'/resource/js/'.$value.'"></script>';
					}
				}
				$htmlJs .= '<!--END LOAD CSS MODULES '.strtoupper($_web['uri']['mod']).'-->';
				$this->_appendJs = $htmlJs;
			}

			// append file css in folder Modules/resource/css
			$pathCss = DIR_MODULES . $_web['uri']['mod'] .'/resource/css';
			if (file_exists($pathCss)) {
				$filesCss = array_diff(scandir($pathCss), array('.', '..'));
			}
			if (!empty($filesCss)) {
				$htmlCss = '<!--START LOAD CSS MODULES '.strtoupper($_web['uri']['mod']).'-->';
				foreach ($filesCss as $value) {
					$info = pathinfo($value);
					if (@$info["extension"] == "css") { 
						$htmlCss .= '<link rel="stylesheet" href="'.base_url().'modules/'.$_web['uri']['mod'] .'/resource/css/'.$value.'">';
					}
				}
				$htmlCss .= '<!--END LOAD CSS MODULES '.strtoupper($_web['uri']['mod']).'-->';
				$this->_appendCss = $htmlCss;
			}

			$this->setTeamplate($template);
		}else{
			if (file_exists($path)) {
				require_once $path;
			}else{
				echo "Error: khong tim thay file view trong module. ";
			}
		}
	}
	public function setTeamplate($tem = "teamplate"){
		global $_web;
		$path = DIR_TMP . "themes/".$tem.".php";
		require_once $path;
			//$this->teamplate = 
	}
}