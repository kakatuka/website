<?php 
class View{
	public $_fileView;
	public $_title;
	public $_description;
	public $_keywords;
	public $_author;
	public $_thumbnail;
	public $_appendCss;
	public $appendCss;
	public $_appendJs;
	public $appendJs;
	public $_appendPluginsModCss;
	public $_appendPluginsModJs;
	public function render($file,$fullFile = true){
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
						$htmlJs .= '<script type="text/javascript" src="'.base_url().'modules/'.$_web['uri']['mod'] .'/resource/js/'.$value.'?v=1"></script>';
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




			$pathPlugins = DIR_MODULES . $_web['uri']['mod'] .'/resource/plugins/';
			if (file_exists($pathPlugins)) {
				$folderPlugins = array_diff(scandir($pathPlugins), array('.', '..'));
			}

			// Append Plugins all css in folder Modules/resource/NAME_PLUGINS/css
			
			if (!empty($folderPlugins)) {
				foreach ($folderPlugins as $item) {
					$pathPluginsCss = DIR_MODULES . $_web['uri']['mod'] .'/resource/plugins/'.$item.'/css/';
					if (file_exists($pathPluginsCss)) {
						$filesPluginsCss = array_diff(scandir($pathPluginsCss), array('.', '..'));
					}
					if (!empty($filesPluginsCss)) {
						$htmlCssPlugins = '<!--START LOAD PLUGINS CSS MODULES '.strtoupper($_web['uri']['mod']).'-->';
						foreach ($filesPluginsCss as $value) {
							$info = pathinfo($value);
							if ($info["extension"] == "css") { 
								$htmlCssPlugins .= '<link rel="stylesheet" href="'.base_url().'modules/'.$_web['uri']['mod'] .'/resource/plugins/'.$item.'/css/'.$value.'">';
							}
						}
						$htmlCssPlugins .= '<!--END LOAD PLUGINS CSS MODULES '.strtoupper($_web['uri']['mod']).'-->';
						$this->_appendPluginsModCss = $htmlCssPlugins;
					}


					// Append Plugins all js in folder Modules/resource/NAME_PLUGINS/js
					$pathPluginsJs = DIR_MODULES . $_web['uri']['mod'] .'/resource/plugins/'.$item.'/js/';
					if (file_exists($pathPluginsJs)) {
						$filesPluginsJs = array_diff(scandir($pathPluginsJs), array('.', '..'));
					}
					if (!empty($filesPluginsJs)) {
						$htmlJsPlugins = '<!--START LOAD PLUGINS JS MODULES '.strtoupper($_web['uri']['mod']).'-->';
						foreach ($filesPluginsJs as $value) {
							$info = pathinfo($value);
							if ($info["extension"] == "js") { 
								$htmlJsPlugins .= '<script type="text/javascript" src="'.base_url().'modules/'.$_web['uri']['mod'] .'/resource/plugins/'.$item.'/js/'.$value.'?v=1"></script>';
							}
						}
						$htmlJsPlugins .= '<!--END LOAD PLUGINS CSS MODULES '.strtoupper($_web['uri']['mod']).'-->';
						$this->_appendPluginsModJs = $htmlJsPlugins;
					}


				}
			}

			$this->setMeta();

			$this->setTeamplate();
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
	public function setMeta(){
		if (isset($this->title)) {
			$this->_title = "<title>".$this->title."</title>\n";
			unset($this->title);
		}
		if (isset($this->description)) {
			$this->_description = "<meta name='description' content='".$this->description."'/>\n";
			unset($this->description);
		}
		if (isset($this->keywords)) {
			$this->_keywords = "<meta name='keywords' content='".$this->keywords."'/>\n";
			unset($this->keywords);
		}
		if (isset($this->author)) {
			$this->_author = "<meta name='author' content='".$this->author."'/>\n";
			unset($this->author);
		}
		if (isset($this->thumbnail)) {
			$this->_thumbnail = "<meta property='og:image' content='".$this->thumbnail."'/>\n";
			unset($this->thumbnail);
		}
	}
}