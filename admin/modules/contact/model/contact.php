<?php 
class Contact{
	private $contact;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->contact     = new system\Model('web_contacts');
	}
	public function getContact(){
		$this->contact->orderBy('create_time','DESC');
		$result  = $this->contact->get();
		return $result;
	}
	public function getPagiContact(){
		$this->contact->orderBy('create_time','DESC');
		$result  = $this->contact->get(null, null,$select);
		return $result;
	}
	public function update($data,$id){
		$this->contact->where('id',$id);
		$this->contact->update($data);
	}
	public function delete($id){
		$this->contact->where('id',$id);
		$this->contact->delete();
	}
	public function insertData($data_insert){
		$this->contact->insert($data_insert);
	}



	public function checkId($id){
		$this->contact->where('id',$id);
		$result  = $this->contact->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function getContactById($id){
		$this->contact->where('id',$id);
		$result  = $this->contact->getOne();
		return $result;
	}
	public function findSearch($search){
		$this->contact->where('name', '%'.$search.'%', 'like');
		$result  = $this->contact->get();
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM web_contacts WHERE id IN (".$name.")";
		$this->contact->rawQuery($sql);
	}
}