<?php 
class Address{
    private $district;
    private $province;
	public function __construct(){
		global $_web;
		$this->lang                   = $_web['lang'];
        $this->district       = new system\Model('address_district');
        $this->province       = new system\Model('address_province');
	}
	
    public function getProvince(){
        $result = $this->province->get(null,null,'*');
        return $result;
    }
    public function getDistrictByProvinceId($id){
        $this->district->where('provinceid',$id);
        $result = $this->district->get(null,null,'*');
        return $result;
    }
}