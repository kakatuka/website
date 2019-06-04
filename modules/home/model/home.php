<?php
class Home {
	private $posts;
	private $cate;
	public function __construct() {
		global $_web;
		$this->lang = $_web['lang'];
		$this->posts                = new system\Model($this->lang .'_posts');
		$this->product              = new system\Model($this->lang .'_product_basic');
		$this->category             = new system\Model($this->lang.'_category');
		$this->product_home         = new system\Model($this->lang .'_manager_view_home');
		$this->vi_advertisement     = new system\Model($this->lang .'_advertisement');
		$this->vi_categories_posts  = new system\Model($this->lang .'_categories_posts');
		$this->slider               = new system\Model($this->lang .'_banner_images');
		$this->tour                 = new system\Model($this->lang .'_price_tour');
	}
	public function getSearch($search) {
		$sql = "SELECT * FROM ".$this->lang."_product_basic WHERE ".$this->lang."_product_basic.name LIKE '%$search%' ORDER BY id DESC ";
		$result = $this->posts->rawQuery($sql);
		return $result;
	}
	public function getCount($search) {
		$sql = "SELECT * FROM ".$this->lang."_product_basic WHERE ".$this->lang."_product_basic.name LIKE '%$search%'";
		$result = $this->posts->rawQuery($sql);
		return $result;
	}

	public function getProdcutHot(){
		$this->product->where('hot',1);
		$this->product->where('status',1);
		$this->product->orderBy('id',"DESC");
		$result = $this->product->get(null,array(0,10),null);
		return  $result;
	}
	public function getTourhome($cate)
	{
		$sql = "SELECT * FROM ".$this->lang."_product_basic WHERE ".$this->lang."_product_basic.hot_1 = 1 AND ".$this->lang."_product_basic.category LIKE '%$cate%' ORDER BY ".$this->lang."_product_basic.order_by DESC LIMIT 0,4";
		return $result = $this->product->rawQuery($sql);
	}
	public function getCateproduct(){
		$data =  $this->category->get();
		return  $data;
	}
	public function getCountp($cate_id){
		$sql = "SELECT * FROM ".$this->lang."_product_basic WHERE ".$this->lang."_product_basic.category LIKE '%$cate_id%'";
		$result = $this->posts->rawQuery($sql);
		return $result;
	}
	public function getTourNgoai($start,$limit)
	{
		$sql = "SELECT * FROM vi_product_basic WHERE hot_1 = 1 ORDER BY id DESC LIMIT $start,$limit";
		return $result = $this->product->rawQuery($sql);
	}	
	public function getPoduct_cate($start,$limit,$category)
	{
		$sql = "SELECT * FROM vi_product_basic WHERE category = '$category' LIMIT $start,$limit";
		return $result = $this->product->rawQuery($sql);
	}
    public function getNewhot($cate,$start,$limit){
    	$sql = "SELECT * FROM vi_posts WHERE hot1 = 1 AND status = 1 AND cate_id LIKE '%$cate%' ORDER BY order_by DESC LIMIT $start,$limit";
    	$result = $this->posts->rawQuery($sql);
		return $result;
    }
	public function searchGroup($title,$cate,$date_tour){
	    if($title!="" or cate!="" or $date_tour!="" ){
	       $group = 'GROUP BY '.$this->lang.'_product_basic.id';
	    }else{
	         $group = "";
	    }
       $sql = "SELECT ".$this->lang."_product_basic.status as active, ".$this->lang."_product_basic.id as id_product, ".$this->lang."_product_basic.name as title,".$this->lang."_product_basic.alias as alias,".$this->lang."_product_basic.category as cate_id, ".$this->lang."_product_basic.short_info as descripton,".$this->lang."_product_basic.image as image,".$this->lang."_product_basic.day as thoigian,".$this->lang."_product_basic.tour_car as phuong_tien,".$this->lang."_product_basic.tour_end as diadiem,".$this->lang."_price_tour.price as prices,".$this->lang."_price_tour.code as macode, ".$this->lang."_price_tour.date_tour as date   
		  FROM ".$this->lang."_product_basic  INNER JOIN ".$this->lang."_price_tour ON ".$this->lang."_product_basic.id = ".$this->lang."_price_tour.product_id 
		  WHERE ".$this->lang."_product_basic.status =1 AND str_to_date(".$this->lang."_price_tour.date_tour,'%d/%m/%Y') > NOW()  ".$title." ". $cate ."".$date_tour." ".$group." ORDER BY ".$this->lang."_product_basic.id DESC";
		  //dd($sql);
        return $result = $this->tour->rawQuery($sql);
	}
	public function getTourdate($id){
		$this->tour->where('product_id',$id);
		$data = $this->tour->get();
		return  $data;
	}
	public function getBanner(){
		$this->vi_advertisement->where('status',1);
		$result = $this->vi_advertisement->get(null,array(0,3));
		return  $result;
	}
	public function getPopup(){
		$this->vi_advertisement->where('status',1);
		$this->vi_advertisement->where('popup',1);
		$data = $this->vi_advertisement->getOne();
		return  $data;
	}
	public function getCatenew(){
		$data =  $this->vi_categories_posts->get();
		return  $data;
	}
}
