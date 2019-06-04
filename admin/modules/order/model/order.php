<?php 
class Order{
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->order     = new system\Model($this->lang.'_product_cart');
		$this->statusOrder     = new system\Model('vi_order_status');
		$this->district       = new system\Model('address_district');
        $this->province       = new system\Model('address_province');
        $this->order_product     = new system\Model($this->lang.'_product_order_product');
	}
	
	public function getAllOrder(){
		$select ='*';
		$this->order->orderBy('id','DESC');
		$result  = $this->order->get(null,null,$select);
		return $result;
	}

	public function getStatusOrder(){
		$select ='*';
		$result  = $this->statusOrder->get(null,null,$select);
		return $result;
	}
	public function getInfoOrderById($id){
		$this->order->where('id',$id);
		$result  = $this->order->getOne();
		return $result;
	}
	public function getProvinceById($id){
		$this->province->where('provinceid',$id);
		$result  = $this->province->getOne();
		return $result;
	}
	
	public function getDistrictById($id){
		$this->district->where('districtid',$id);
		$result  = $this->district->getOne();
		return $result;
	}

	public function getProductOrderById($id){
		$this->order_product->where('order_id',$id);
		$result  = $this->order_product->get(null,null,'*');
		return $result;
	}
	public function updateOrderCart($data,$id){
		$this->order->where('id',$id);
		$this->order->update($data);
	}
	public function delete_Order($id){
		$this->order->where('id',$id);
		$this->order->delete();
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_product_cart WHERE id IN (".$name.")";
		$this->order->rawQuery($sql);
	}
}