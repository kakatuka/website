<?php 
class Menu{
	private $menu;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->menu     = new system\Model($this->lang.'_menu');
		$this->categories     = new system\Model($this->lang.'_categories_posts');
		$this->categories_product     = new system\Model($this->lang.'_category');
		$this->pages     = new system\Model($this->lang.'_pages');
		$this->position     = new system\Model($this->lang.'_position_menu');
	}
	public function getMenu($position){
		$this->menu->where('position',$position);
		$this->menu->orderBy('sort','ASC');
		$result  = $this->menu->get();
		return $result;
	}
	public function getPagiMenu($start,$limit){
		$select = $this->lang."_pages.*, user.id as id_user, user.username";
		$this->menu->join('user', 'user.id = '.$this->lang.'_menu.author_create', 'LEFT');
		$result  = $this->menu->get(null, array($start,$limit),$select);
		//$result  = $this->menu->rawQuery($sql);
		return $result;
	}
	public function update($data,$id,$position){
		$this->menu->where('position',$position);
		$this->menu->where('id',$id);
		$this->menu->update($data);
	}
	public function delete($id,$position){
		$this->menu->where('position',$position);
		$this->menu->where('id',$id);
		$this->menu->delete();
	}
	public function insertData($data_insert){
		$this->menu->insert($data_insert);
	}
	public function insertMultiRow($data){
		$sql = "INSERT INTO ".$this->lang."_menu (title,link,parent_id,status,sort,type,position,avatar,name,content,type_cate,id_cate) VALUES ".$data;
		$this->menu->rawQuery($sql);
	}
	public function getAllCategories(){
		return $this->categories->get();
	}
	public function getPages(){
		$result  = $this->pages->get();
		return $result;
	}
	public function lastIdTable(){
		$sql ="SELECT LAST(id) FROM ".$this->lang."_menu";
		return $this->menu->rawQuery($sql);
	}
	public function getAllCategoriesProduct(){
		$result =  $this->categories_product->get();
		return $result;
	}
	public function checkId($id){
		$this->menu->where('id',$id);
		$result  = $this->menu->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function getUserById($id){
		$this->menu->where('id',$id);
		$result  = $this->menu->getOne();
		return $result;
	}
	public function checkIdPosition($id){
		$this->position->where('id',$id);
		$result  = $this->position->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function getPositionById($id){
		$this->position->where('id',$id);
		$result  = $this->position->getOne();
		return $result;
	}
	public function updatePosition($data,$id){
		$this->position->where('id',$id);
		$this->position->update($data);
	}
	
	public function findSearch($search){
		$select = $this->lang."_menu.*, user.id as id_user, user.username";
		$this->menu->where($this->lang.'_menu.title', '%'.$search.'%', 'like');
		$this->menu->join('user', 'user.id = '.$this->lang.'_menu.author_create', 'LEFT');
		$result  = $this->menu->get(null,null,$select);
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_menu WHERE id IN (".$name.")";
		$this->menu->rawQuery($sql);
	}

}