<?php 
class Product{
    private $product;
    private $productDetail;
    private $productImage;
    private $cate;
    private $productRate;
	public function __construct(){
		global $_web;
		$this->lang                   = $_web['lang'];
        $this->cate                   = new system\Model($this->lang.'_category');
		$this->product                = new system\Model($this->lang.'_product_basic');
        $this->productDetail          = new system\Model($this->lang.'_product_detail');
        $this->productImage           = new system\Model($this->lang.'_product_image');
		$this->productRate            = new system\Model($this->lang.'_product_rate');
        $this->contact                = new system\Model('web_contacts');
        $this->tour_date              = new system\Model($this->lang.'_price_tour');
	}


    public function getListpr($id){
        $this->product->where('status',1);
        $this->product->where('category','%'.$id.'%', 'like');
        $this->product->orderBy('id',"DESC");
        $data = $this->product->get();
        return  $data;
    }

   public function getStyleRoom(){
        $this->product->where('status',1);
        $this->product->orderBy('id',"DESC");
        $data = $this->product->get();
        return  $data;
    }    
    public function insertDatPhong($data){
    $this->contact->insert($data);
    }
	public function getBreadcrumbsCategory($idCate, $data = array()) {
        $this->cate->where("id",$idCate);
        $this->cate->where("status",1);
        $category = $this->cate->getOne();

        $category['link'] = base_url().alias($category['title']).'-c'.$category['id'].'.htm';
        $data[]           = array(
            'name' => (isset($category['title']) ? $category['title'] : ''),
            'href'  => $category['link'],
        );
        if (isset($category['parent_id']) && $category['parent_id'] > 0) {
            $data = $this->getBreadcrumbsCategory($category['parent_id'], $data);
        }
        return $data;
    }
    public function findSearch($search){
        $select = $this->lang."_product_basic.*, user.id as id_user, user.username";
        $this->product->where($this->lang.'_product_basic.name', '%'.$search.'%', 'like');
        $this->product->join('user', 'user.id = '.$this->lang.'_product_basic.create_author', 'LEFT');
        $result  = $this->product->get(null,null,$select);
        return $result;
    }
    public function getproduct(){
    	$this->product->where('status',1);
		$result  = $this->product->num_rows();
		return $result;
	}
    public function getAllOtherProducts($start = null, $limit = null){
        $select = $this->lang."_product_basic.*,user.id as id_user, user.username";
        $this->product->where( $this->lang."_product_basic.status",1);
        $this->product->join('user', 'user.id = '.$this->lang.'_product_basic.create_author', 'LEFT');
        $this->product->orderBy('rand()');
        if ($start == null && $limit == null) {
            $result = $this->product->get(null, null, $select);
        } else {
            $result = $this->product->get(null, array($start, $limit), $select);
        }
        // dd($result);
        return $result;
    }
    public function getAllProduct($start,$limit){
    	$select = $this->lang."_product_basic.id,".$this->lang."_product_basic.name,".$this->lang."_product_basic.alias,".$this->lang."_product_basic.image,".$this->lang."_product_basic.create_time, user.id as id_user, user.username";
    	$this->product->where( $this->lang."_product_basic.status",1);
    	$this->product->join('user', 'user.id = '.$this->lang.'_product_basic.create_author', 'LEFT');
    	$result = $this->product->get(null,array($start,$limit),$select);
    	return $result;
    }
    public function getAllProduct1($start = null, $limit = null){
        $select = $this->lang."_product_basic.*,user.id as id_user, user.username";
        $this->product->where( $this->lang."_product_basic.status",1);
        $this->product->join('user', 'user.id = '.$this->lang.'_product_basic.create_author', 'LEFT');
        $this->product->orderBy('create_time', 'DESC');
        if ($start == null && $limit == null) {
            $result = $this->product->get(null, null, $select);
        } else {
            $result = $this->product->get(null, array($start, $limit), $select);
        }
        // dd($result);
        return $result;
    }
    public function getCateHienTai($id){
        $this->cate->where("id",$id);
        $category = $this->cate->getOne();
        return $category;
    }
    public function getCateHienTai1($id){
        $this->cate->where("parent_id",$id);
        $category = $this->cate->get();
        return $category;
    }
    public function getAllCate(){
        $this->cate->where("status",1);
        $category = $this->cate->get();
        return $category;
    }
    public function getAllCateRelate($parent_id,$id){
        $this->cate->where("status",1);
        $this->cate->where("parent_id",$id);
        $category = $this->cate->get();
        return $category;
    }
   public function getDetail($id){
        $select = $this->lang."_product_basic.*, user.id as id_user, user.username, ";
        $select.= $this->lang."_product_image.image as images,";
        $select .= $this->lang."_product_detail.full_info,".$this->lang."_product_detail.tags,".$this->lang."_product_detail.meta_title,".$this->lang."_product_detail.meta_keyword,".$this->lang."_product_detail.meta_description,".$this->lang."_product_detail.related_product,".$this->lang."_product_detail.dichvu,".$this->lang."_product_detail.dieukhoan,".$this->lang."_product_detail.ghichu";
        $this->product->where( $this->lang."_product_basic.status",1);
        $this->product->where( $this->lang."_product_basic.id",$id);
        $this->product->join('user', 'user.id = '.$this->lang.'_product_basic.create_author', 'LEFT');
        $this->product->join($this->lang.'_product_detail', $this->lang.'_product_detail.id_product = '.$this->lang.'_product_basic.id', 'LEFT');
        $this->product->join($this->lang.'_product_image', $this->lang.'_product_image.id_product = '.$this->lang.'_product_basic.id', 'LEFT');
        // $this->product->join($this->lang.'_category', $this->lang.'_category.id = '.$this->lang.'_product_basic.category', 'LEFT');
        $result = $this->product->getOne(null,$select);
        return $result;
    }
    public function insertRate($data){
        $this->productRate->insert($data);
    }
    public function getRateProductById($id){
        $this->productRate->where("status",1);
        $this->productRate->where("id_product",$id);
        return $this->productRate->get(null,null,"*");
    }
    public function getCountMediumRateById($id){
        $this->productRate->where("status",1);
        $this->productRate->where("id_product",$id);
        return $this->productRate->get(null,null,"*");
    }
    public function getThumbnailAddCart($id){
        $select = $this->lang."_product_basic.id,".$this->lang."_product_basic.image";
        $this->product->where($this->lang."_product_basic.id",$id);
        return $this->product->getOne(null,$select);
    }
   public function getProductLienQuan($id,$category){
        $sql = "SELECT ".$this->lang."_product_basic.*, ".$this->lang."_product_detail.full_info FROM ".$this->lang."_product_basic LEFT JOIN ".$this->lang."_product_detail on ".$this->lang."_product_detail.id_product = ".$this->lang."_product_basic.id  "
        ."WHERE ".$this->lang."_product_basic.category like '%".$category."%' AND ".$this->lang."_product_basic.id != '".$id."' ORDER BY rand() LIMIT 0,4";
        $result = $this->product->rawQuery($sql);
        return $result;
    }
    public function getProductByCate($category){
        $sql = "SELECT * FROM "
        .$this->lang."_product_basic WHERE ".$this->lang."_product_basic.category like '%".$category."%' ORDER BY ".$this->lang."_product_basic.id DESC";
        $result = $this->product->rawQuery($sql);
        // dd($sql);
        return $result;
    }
    public function getProductHot()
    {
        $this->product->where('status',1);
        $this->product->where('hot',1);
        $this->product->orderBy('id', 'DESC');
        $result = $this->product->get();

    }
     public function getTags($tag){
        $select = $this->product->where($this->lang.'_product_basic.tags', '%'.$tag.'%', 'like');
        $result  = $this->product->get(null,$select);
        return $result;
    }
     public function getCateProuct($id){
        $this->cate->where("id",$id);
        $category = $this->cate->getOne();
        return $category;
    }
    public function getProductNew(){
        $select = $this->lang."_product_basic.*";
        $this->product->where('status',1);
        $this->product->orderBy('id','DESC');      
        $result = $this->product->get(null,array(0,4),$select);
        return $result;
    }
    public function getGroupTour($start,$limit,$group_tour,$cate_id){
        $sql = "SELECT * FROM vi_product_basic WHERE category LIKE '%".$cate_id."%' AND group_tour = $group_tour  ORDER BY create_time DESC LIMIT $start, $limit ";
        $result = $this->product->rawQuery($sql);
        return $result;
    }
    public function getCountle(){
        $this->product->where('group_tour',1);
        $result = $this->product->get();
        return $result;
    }
     public function getCountdoan(){
        $this->product->where('group_tour',2);
        $result = $this->product->get();
        return $result;
    }
    public function getTourdate(){
        $result = $this->tour_date ->get();
        return $result;
    }
    public function getTour($id){
        $this->tour_date->where('product_id',$id);
        $result = $this->tour_date->get();
        return $result;
    }
    public function getNamecate($id){
        $this->cate->where("status",1);
        $this->cate->where("parent_id",$id);
        $category = $this->cate->get();
        return $category;
    }
}