<?php 
class Brand{
	private $brand;
	public function __construct(){
		global $_web;
		$this->lang        				= $_web['lang'];
		$this->brand     			= new system\Model($this->lang.'_brand');
	}
	public function getBrand(){
		$select = $this->lang."_brand.*, user.id as id_user, user.username";
		$this->brand->join('user', 'user.id = '.$this->lang.'_brand.create_author', 'LEFT');
		$result  = $this->brand->get(null, null,$select);
		return $result;
	}
	public function update($data,$id){
		$this->brand->where('id',$id);
		$this->brand->update($data);
	}
	public function delete($id){
		$this->brand->where('id',$id);
		$this->brand->delete();
	}
	public function insertData($data_insert){
		return $this->brand->insert($data_insert);
	}
	public function getDataById($id){
		$this->brand->where('id',$id);
		$result  = $this->brand->getOne();
		return $result;
	}
	public function checkId($id){
		$this->brand->where('id',$id);
		$result  = $this->brand->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_brand WHERE id IN (".$name.")";
		$this->brand->rawQuery($sql);
	}
}