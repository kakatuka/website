<?php
use voku\Cart\Cart;
use voku\Cart\Identifier\Cookie;
use voku\Cart\Storage\Session;

class Controller {
	public $view, $input, $mod, $controller, $action, $id, $loadPages, $modelGlobals, $menu, $cart;
	public function __construct() {
		global $_web;
		$this->mod = $_web['uri']['mod'];
		$this->controller = $_web['uri']['controller'];
		$this->action = $_web['uri']['action'];
		$this->id = $_web['uri']['id'];
	

		$this->input = new Input();
		$this->view = new View();
		$this->loadLibrary('paging');
		$this->modelGlobals = $this->loadModelGlobals('GlobalsModel');
		
		$_web['menu'] = $this->getMenuGlobals();
		$_web['footer_1']   = $this->getMenuFoot1();
		
		$_web['footer_2']   = $this->getMenuFooter();
		$_web['footer_3']   = $this->getMenuFoot4();
		$_web['footer_4']   = $this->getMenuFoot5();
		$_web['footer_5']   = $this->getMenuFoot6();
		$_web['footer_6']   = $this->getMenuFoot7();
		$_web['footer_7']   = $this->getMenuFoot8();
		$_web['footer_8']   = $this->getMenuFoot9();
		 // dd($_web['menu_footer_1']);
		$_web['banner']        = $this->getBannerGlobals();
		$_web['settings']      = $this->getSettingsGlobals();
		$_web['options']       = $this->getOptionsGlobals();
		$_web['widgets']       = $this->getWidgetsGlobals();
		$_web['partner_hot']   = $this->getPartNerHot();
		// $_web['livechat'] = $this->getLiveChat();
		

		// dd($_web['banner']);
		$_web['advertisement'] = $this->getAdvertisementGlobals();
		$_web['pages'] = $this->getPagesGlobals();

		$_web['post']     = $this->modelGlobals->getPost();
		$_web['post_new'] = $this->modelGlobals->getPostNew(0,5);
		$_web['post_hot'] = $this->modelGlobals->getPostHot(0,5);
		// dd($_web['post']);
		$_web['category_post'] = $this->modelGlobals->getCategoriPosts();
		$_web['AllBranch'] = $this->modelGlobals->getAllBranch(0, 6);

		$this->cart = new Cart(new Session, new Cookie);
		$_web['cart'] = & $this->cart->contents();
		$_web['total_cart']   = $this->cart->total();
		$_web['total_item']   = $this->cart->totalItems();
		$_web['total_unique'] = $this->cart->totalUniqueItems();
		// $_web['cate'] = $this->getCate11();

		// dd($_web['AllBranch']);
	}
	public function loadModel($file, $mod = null) {
		if ($mod === null) {
			$path = DIR_MODULES . $this->mod . '/model/' . lcfirst($file) . '.php';
			if (file_exists($path)) {
				include_once $path;
				$obj = new $file();
				return $obj;
			} else {
				die('Không tồn tại file này' . lcfirst($path));
			}
		} else {
			$path = DIR_MODULES . $mod . '/model/' . lcfirst($file) . '.php';
			if (file_exists($path)) {
				include_once $path;
				$obj = new $file();
				return $obj;
			} else {
				die('Không tồn tại file này' . lcfirst($path));
			}
		}
	}
	public function loadLibrary($file) {
		$path = DIR_APP . 'libraries/' . lcfirst($file) . '.php';
		if (file_exists($path)) {
			include_once $path;
		} else {
			die('Không tồn tại file này' . lcfirst($path));
		}
	}
	public function isPost($key) {
		if (isset($_POST[$key])) {
			return true;
		} else {
			return false;
		}
	}
	public function loadModelGlobals($file) {
		$path = DIR_MODULES . lcfirst($file) . '.php';
		if (file_exists($path)) {
			include_once $path;
			$obj = new $file();
			return $obj;
		} else {
			die('Không tồn tại file này' . lcfirst($path));
		}
	}
	public function getMenuGlobals() {
		$data = $this->modelGlobals->getMenu(1);
		return $data;
	}
	public function getMenuFoot1(){
		$data = $this->modelGlobals->getMenu(2);
		return $data;
	}
	public function getMenuFooter() {
		$data = $this->modelGlobals->getMenu(3);
		return $data;
	}
	public function getMenuFoot4() {
		$data = $this->modelGlobals->getMenu(4);
		return $data;
	}
	public function getMenuFoot5() {
		$data = $this->modelGlobals->getMenu(5);
		return $data;
	}
	
	public function getMenuFoot6() {
		$data = $this->modelGlobals->getMenu(6);
		return $data;
	}
	public function getMenuFoot7() {
		$data = $this->modelGlobals->getMenu(7);
		return $data;
	}
	public function getMenuFoot8() {
		$data = $this->modelGlobals->getMenu(8);
		return $data;
	}
	public function getMenuFoot9() {
		$data = $this->modelGlobals->getMenu(9);
		return $data;
	}
	public function getSettingsGlobals() {
		$data = $this->modelGlobals->getSettings();
		return $data;
	}
	public function getPagesGlobals() {
		$data = $this->modelGlobals->getPages();
		return $data;
	}
	public function getOptionsGlobals() {
		$data = $this->modelGlobals->getOptions();
		return $data;
	}
	public function getWidgetsGlobals() {
		$data = $this->modelGlobals->getWidgets();
		return $data;
	}

	public function getBannerGlobals() {
		$data = $this->modelGlobals->getBanner();
		return $data;
	}
	public function getAdvertisementGlobals() {
		$data = $this->modelGlobals->getAdvertisement();
		return $data;
	}
	public function getPartNerHot() {
		$data = $this->modelGlobals->getPartNer();
		return $data;
	}
	// public function getLiveChat()
	// {
	// 	$data = $this->modelGlobals->getLiveChats();
	// 	return $data;
	// }
	// set Messager flash
	public function flashMessager($key = 'flash_success', $mess = 'Messager Demo Success.') {
		$mess = array(
			$key => $mess,
			//'flash_success' => lang('update_page_success'),
		);
		//Session::create($mess);

		if (isset($mess) && !empty($mess)) {
			foreach ($mess as $key => $value) {
				$_SESSION[$key] = $value;
			}
		}
	}
	public function getFlashMessager($key = 'flash_success') {
		if (isset($_SESSION[$key])) {
			$this->view->flash[$key] = $_SESSION[$key];
			unset($_SESSION[$key]);
		}
	}

}