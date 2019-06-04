<?php 
class Category{
	private $category;
	private $user;
	private $settings;
	public function __construct(){
		global $_web;
		$this->lang        				= $_web['lang'];
		$this->category     			= new system\Model($this->lang.'_category');
		$this->user     				= new system\Model('user');
		$this->settings     			= new system\Model('web_settings');
	}
	public function getCategories(){
		$this->category->orderBy('create_time', 'DESC');
		$result  = $this->category->get();
		return $result;
	}
	public function getSetting(){
		// $this->settings->orderBy('create_time', 'DESC');
		$result  = $this->settings->get();
		return $result;
	}
	public function getPagiCategory(){
		$select = $this->lang."_category.*, user.id as id_user, user.username";
		$this->category->orderBy($this->lang.'_category.create_time', 'DESC');
		$this->category->join('user', 'user.id = '.$this->lang.'_category.create_author', 'LEFT');
		$result  = $this->category->get(null,null,$select);
		//$result  = $this->categories->rawQuery($sql);
		return $result;
	}
	public function update($data,$id){
		$this->category->where('id',$id);
		$this->category->update($data);
	}
	public function delete($id){
		$this->category->where('id',$id);
		$this->category->delete();
	}
	public function insertData($data_insert){
		$this->category->insert($data_insert);
	}
	public function getDataById($id){
		$this->category->where('id',$id);
		$result  = $this->category->getOne();
		return $result;
	}
	public function getDelete($id){
		$this->category->where('parent_id',$id);
		$result  = $this->category->num_rows();
		return $result;
	}
	public function checkId($id){
		$this->category->where('id',$id);
		$result  = $this->category->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function findSearch($search){
		$select = $this->lang."_category.*, user.id as id_user, user.username";
		$this->category->where($this->lang.'_category.title', '%'.$search.'%', 'like');
		$this->category->join('user', 'user.id = '.$this->lang.'_category.create_author', 'LEFT');
		$result  = $this->category->get(null,null,$select);
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_category WHERE id IN (".$name.")";
		$this->category->rawQuery($sql);
	}
	public function statusCate($id,$data){
		$this->category->where('id',$id);
		$this->category->update($data);
	}
}