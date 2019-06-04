<?php
class GlobalsModel {
	private $menu;
	private $settings;
	private $options;
	private $widgets;
	private $banner;
	private $advertisement;
	private $pages;
	private $branch;

	public function __construct() {
		global $_web;
		$this->lang = $_web['lang'];
		$this->menu = new system\Model($this->lang . '_menu');
		$this->settings = new system\Model('web_settings');
		$this->options = new system\Model('web_options');
		$this->widgets = new system\Model($this->lang . '_widgets');
		$this->banner = new system\Model($this->lang . '_banner_images');
		$this->advertisement = new system\Model($this->lang . '_advertisement');
		$this->post = new system\Model($this->lang . '_posts');
		$this->pages = new system\Model($this->lang . '_pages');
		$this->branch = new system\Model($this->lang . '_branch');
		$this->category_posts = new system\Model($this->lang . '_categories_posts');
		$this->vi_album = new system\Model($this->lang . '_album');
		$this->vi_category = new system\Model($this->lang . '_category');
	}

	public function getPostNew($start,$limit)
	{
		$select = "*";
		$this->post->where('status',1);
		$this->post->orderBy('id', 'DESC');
		return $this->post->get(null, array($start, $limit), $select);
	}
	public function getPostHot($start,$limit)
	{
		$select = "*";
		$this->post->where('status',1);
		$this->post->where('hot',1);
		$this->post->orderBy('id', 'DESC');
		return $this->post->get(null, array($start, $limit), $select);
	}
	public function getMenu($position) {
		$this->menu->where('position', $position);
		$this->menu->orderBy('sort', 'asc');
		$result = $this->menu->get();
		return $result;
	}
	public function getAllBranch($start = null, $limit = null) {
		$select = $this->lang . "_branch.*";
		$this->branch->where($this->lang . "_branch.status", 1);
		$this->branch->orderBy('create_time', 'asc');
		if ($start == null && $limit == null) {
			$result = $this->branch->get(null, null, $select);
		} else {
			$result = $this->branch->get(null, array($start, $limit), $select);
		}
		// dd($result);
		return $result;
	}

	public function getSettings() {
		$this->settings->where('id', 2);
		$result = $this->settings->getOne();
		return $result;
	}
	public function getOptions() {
		$this->options->where('id', 1);
		$result = $this->options->getOne();
		return $result;
	}
	public function getWidgets() {
		$result = $this->widgets->get();
		return $result;
	}
	public function getBanner() {
		$this->banner->where('status', 1);
		// $this->banner->orderBy('sort','asc');
		$result = $this->banner->get();
		return $result;
	}
	public function getAdvertisement() {
		$this->advertisement->where('status', 1);
		$this->advertisement->orderBy('sort', 'asc');
		$result = $this->advertisement->get();
		return $result;
	}
	public function getPost() {
		$select = $this->post->orderBy('create_time', 'desc');
		$result = $this->post->get();
		return $result;
	}
	public function getCategoriPosts() {
		$result = $this->category_posts->get();
		return $result;
	}

	public function getPages() {
		$this->pages->where("id", 11);
		$result = $this->pages->get();
		return $result;
	}
	public function getPartNer() {
		$this->vi_album->where("hot", 1);
		$result = $this->vi_album->get();
		return $result;
	}
	// public function getLiveChats()
	// {
	// 	$this->settings->where("id", 2);
	// 	$result = $this->settings->get();
	// 	return $result;
	// }

}