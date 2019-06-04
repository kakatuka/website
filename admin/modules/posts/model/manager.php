<?php 
class Manager{
	private $manager;
	private $posts;
	private $categories;
	public function __construct(){
		global $_web;
		$this->lang        				= $_web['lang'];
		$this->manager     			= new system\Model($this->lang.'_manager_view_home_post');
		$this->posts     			= new system\Model($this->lang.'_posts');
		$this->categories     = new system\Model($this->lang.'_categories_posts');
	}
	public function getCategories(){
		$result  = $this->categories->get();
		return $result;
	}
	public function getManagerView(){
		$select = $this->lang."_manager_view_home_post.*, user.id as id_user, user.username";
		$this->manager->join('user', 'user.id = '.$this->lang.'_manager_view_home_post.create_author', 'LEFT');
		$this->manager->orderBy($this->lang.'_manager_view_home_post.position','asc');
		$this->manager->where($this->lang.'_manager_view_home_post.status','1');
		$result  = $this->manager->get(null, null,$select);
		return $result;
	}
	public function update($data,$id){
		$this->manager->where('id',$id);
		$this->manager->update($data);
	}
	public function delete($id){
		$this->manager->where('id',$id);
		$this->manager->delete();
	}
	public function insertData($data_insert){
		return $this->manager->insert($data_insert);
	}
	public function getDataById($id){
		$this->manager->where('id',$id);
		$result  = $this->manager->getOne();
		return $result;
	}
	public function checkId($id){
		$this->manager->where('id',$id);
		$result  = $this->manager->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_manager_view_home_post WHERE id IN (".$name.")";
		$this->manager->rawQuery($sql);
	}


	// Manager posts
	public function getPostByCateModel($start, $limit,$cat_id = null,$id_arr = null,$where_search = null) {
		$select = 'id, cate_id, title, alias, thumbnail';
		if ($cat_id != null) {
				$this->posts->where("cate_id", "%,".$cat_id.",%", "like");
		}
		
		if ($where_search != null) {
			$this->posts->where('title', '%' . $where_search . '%', 'like');
		}
		$this->posts->orderBy('create_time', 'DESC');
		$data = $this->posts->get(null, array($start, $limit), $select);
		return $data;

	}
	public function check_load_more_postByCate($number = null, $ajax = false, $id = null,$id_arr = null) {
		if ($id != null) {
				$this->posts->where("cate_id", "%,".$id.",%", "LIKE");
		}
		$total = $this->posts->num_rows();
		if ($number != null && $total > $number) {
			$data['flag'] = true;
		} else {
			$data['flag'] = false;
		}
		$data['start'] = $number;
		$data['ajax']  = $ajax;
		return $data;
	}
	public function getDataByIdpost($id){
		$this->posts->where('id',$id);
		$result  = $this->posts->getOne();
		return $result;
	}
}