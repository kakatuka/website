<?php 
class Product{
	private $category;
	private $product;
	private $productDescription;
	private $productDetail;
	private $productImage;
	private $tour;
	public function __construct(){
		global $_web;
		$this->lang        				= $_web['lang'];
		$this->category     			= new system\Model($this->lang.'_category');
		$this->product     				= new system\Model($this->lang.'_product_basic');
		$this->productDetail     		= new system\Model($this->lang.'_product_detail');
		$this->productImage     		= new system\Model($this->lang.'_product_image');
		$this->tour     		        = new system\Model($this->lang.'_price_tour');
	}
	public function getProduct(){
		$this->product->orderBy('create_time', 'DESC');
		$result  = $this->product->get();
		return $result;
	}
	public function getAllCategory(){
		$select = $this->lang."_category.id,".$this->lang."_category.title";
		if ($start== null && $limit==null) {
            $result = $this->category->get(null,null,$select);
        }else{
            $result = $this->category->get(null,array($start,$limit),$select);
        }
        return $result;
	}
	public function getPagiProduct(){
		$select = $this->lang."_product_basic.*, user.id as id_user, user.username";
		$this->product->orderBy('create_time', 'DESC');
		$this->product->join('user', 'user.id = '.$this->lang.'_product_basic.create_author', 'LEFT');
		$result  = $this->product->get(null,null,$select);
		//$result  = $this->categories->rawQuery($sql);
		return $result;
	}
	public function getPagiProductById($id){
		$select = $this->lang."_product_basic.*, user.id as id_user, user.username";
		$this->product->where($this->lang.'_product_basic.create_author',$id);
		$this->product->join('user', 'user.id = '.$this->lang.'_product_basic.create_author', 'LEFT');
		$result  = $this->product->get(null,null,$select);
		//$result  = $this->categories->rawQuery($sql);
		return $result;
	}
	public function update($data,$id){
		$this->product->where('id',$id);
		$this->product->update($data);
	}
	public function delete($id){
		$this->product->where('id',$id);
		$this->product->delete();
	}
	public function deleteDetail($id){
		$this->productDetail->where('id_product',$id);
		$this->productDetail->delete();
	}
	public function deleteImage($id){
		$this->productImage->where('id_product',$id);
		$this->productImage->delete();
	}
	public function insertData($data_insert){
		return $this->product->insert($data_insert);
	}
	public function insertDataImage($data_insert){
		$this->productImage->insert($data_insert);
	}
	public function insertDataDetail($data_insert){
		$this->productDetail->insert($data_insert);
	}
	public function updateDataImage($data,$id){
		$this->productImage->where('id_product',$id);
		$this->productImage->update($data);
	}
	public function updateDataDetail($data,$id){
		$this->productDetail->where('id_product',$id);
		$this->productDetail->update($data);
	}
	public function getDataById($id){
		$this->product->where('id',$id);
		$result  = $this->product->getOne();
		return $result;
	}
	public function getDataDetailById($id){
		$this->productDetail->where('id_product',$id);
		$result  = $this->productDetail->getOne();
		return $result;
	}
	public function getDataImageById($id){
		$this->productImage->where('id_product',$id);
		$result  = $this->productImage->getOne();
		return $result;
	}
	public function checkId($id){
		$this->product->where('id',$id);
		$result  = $this->product->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function findSearch($search){
		$select = $this->lang."_product_basic.*, user.id as id_user, user.username";
		$this->product->where($this->lang.'_product_basic.name', '%'.$search.'%', 'like');
		$this->product->join('user', 'user.id = '.$this->lang.'_product_basic.create_author', 'LEFT');
		$result  = $this->product->get(null,null,$select);
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_product_basic WHERE id IN (".$name.")";
		$this->product->rawQuery($sql);
	}
	public function dellWhereInArrayDetail($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_product_detail WHERE id_product IN (".$name.")";
		$this->productDetail->rawQuery($sql);
	}
	public function dellWhereInArrayImage($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_product_image WHERE id_product IN (".$name.")";
		$this->productImage->rawQuery($sql);
	}
	public function deleteTourArray($names_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_price_tour WHERE product_id IN (".$name.")";
		$this->tour->rawQuery($sql);
	}
	public function list_product_selected($id){
		$select = 'id,category, name,image';
		$this->product->where('id',$id);
		$result  = $this->product->getOne();
		return $result;
	}
	public function list_product($start, $limit,$id = null,$where_search = null) {
		$select = 'id,category, name, alias, code, price, saleoff, time_start, time_end, sort, status_vat, status, state, image';
		if ($id != null) {
			// case product selected
			if (!is_array($id)) {
				$this->product->where("id", $id, '!=');
			} else {
				$this->product->where("id", $id, 'not in');
			}
		}
		if ($where_search != null) {
			$this->product->where('name', '%' . $where_search . '%', 'like');
		}
		$this->product->orderBy('create_time', 'DESC');
		$data = $this->product->get(null, array($start, $limit), $select);
		return $data;
	}
	public function check_load_more_product($number = null, $ajax = false, $id = null) {
		if ($id != null) {
			// case product selected
			if (!is_array($id)) {
				$this->product->where('id', $id, '!=');
			} else {
				$this->product->where('id', $id, 'not in');
			}
		}
		$total = $this->product->num_rows();
		if ($number != null && $total > $number) {
			$data['flag'] = true;
		} else {
			$data['flag'] = false;
		}
		$data['start'] = $number;
		$data['ajax']  = $ajax;
		return $data;
	}
	public function search_product($name = null, $id = null) {
		$select = 'id, name, image';
		if ($id != null) {
			// case product selected
			if (!is_array($id)) {
				$this->product->where('id', $id, '!=');
			} else {
				$this->product->where('id', $id, 'not in');
			}
		}
		$this->product->where('name', '%' . $name . '%', 'like');
		$this->product->orderBy('create_time', 'DESC');
		$data = $this->product->get(null, null, $select);
		return $data;
	}
	public function getProductByCateModel($start, $limit,$cat_id = null,$id_arr = null,$where_search = null) {
		$select = 'id,category, name, alias, code, price, saleoff, time_start, time_end, sort, status_vat, status, state, image';
		if ($cat_id != null) {
				$this->product->where("category", "%,".$cat_id.",%", "like");
		}
		
		/*if ($id_arr != null) {
			// case product selected
			if (!is_array($id_arr)) {
				$this->product->where('id', $id_arr, '!=');
			} else {
				$this->product->where('id', $id_arr, 'not in');
			}
		}*/
		if ($where_search != null) {
			$this->product->where('name', '%' . $where_search . '%', 'like');
		}
		$this->product->orderBy('create_time', 'DESC');
		$data = $this->product->get(null, array($start, $limit), $select);
		return $data;

	}
	public function check_load_more_productByCate($number = null, $ajax = false, $id = null,$id_arr = null) {
		if ($id != null) {
				$this->product->where("category", "%,".$id.",%", "LIKE");
		}
		/*if ($id_arr != null) {
			// case product selected
			if (!is_array($id_arr)) {
				$this->product->where('id', $id_arr, '!=');
			} else {
				$this->product->where('id', $id_arr, 'not in');
			}
		}*/
		$total = $this->product->num_rows();
		if ($number != null && $total > $number) {
			$data['flag'] = true;
		} else {
			$data['flag'] = false;
		}
		$data['start'] = $number;
		$data['ajax']  = $ajax;
		return $data;
	}
	public function updateStatus($id,$data){
		$this->product->where('id',$id);
		$this->product->update($data);
	}
	public function insertTour($data){
     $this->tour->insert($data);
	}
	public function getTour($id){
     $this->tour->where('product_id',$id);
     $result  = $this->tour->get();
     return $result;
	}
	public function deleteIdproduct($id){
		$this->tour->where('product_id',$id);
		$this->tour->delete();
	}
	public function deleteTour($id){
		$this->tour->where('product_id',$id);
		$this->tour->delete();
	}
}