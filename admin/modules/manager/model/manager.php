<?php 
class Manager{
	private $manager_home;
	private $categories;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->manager_home     = new system\Model($this->lang.'_manager_home');
		$this->categories     = new system\Model($this->lang.'_categories_posts');
	}
	public function getCategories(){
		$result  = $this->categories->get();
		return $result;
	}
	public function getWidgets(){
		$this->manager_home->orderBy('sort','ASC');
		$result  = $this->manager_home->get();
		return $result;
	}
	public function update($data,$id){
		$this->manager_home->where('id',$id);
		$this->manager_home->update($data);
	}
	public function delete($id){
		$this->manager_home->where('id',$id);
		$this->manager_home->delete();
	}
	public function insertData($data_insert){
		$id = $this->manager_home->insert($data_insert);
		return $id;
	}
	public function count(){
		$result  = $this->manager_home->num_rows();
		return $result;
	}


	public function checkId($id){
		$this->manager_home->where('id',$id);
		$result  = $this->manager_home->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}

}