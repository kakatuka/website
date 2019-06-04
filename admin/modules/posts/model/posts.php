<?php 
class Posts{
	private $posts;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->posts     = new system\Model($this->lang.'_posts');
		$this->categories     = new system\Model($this->lang.'_categories_posts');
	}
	public function getALLposts(){
		$select = $this->lang."_posts.*, user.id as id_user, user.username";
		$this->posts->orderBy($this->lang."_posts.create_time", "DESC");
		$this->posts->join('user', 'user.id = '.$this->lang.'_posts.author_create', 'LEFT');
		$result  = $this->posts->get(null, null,$select);
		return $result;
	}
	public function getPostsOfId($id){
		$select = $this->lang."_posts.*, user.id as id_user, user.username";
		$this->posts->orderBy($this->lang."_posts.create_time", "DESC");
		$this->posts->where($this->lang.'_posts.author_create',$id);
		$this->posts->join('user', 'user.id = '.$this->lang.'_posts.author_create', 'LEFT');
		$result  = $this->posts->get(null, null,$select);
		return $result;
	}
	public function getPagiposts($start,$limit){
		$select = $this->lang."_posts.*, user.id as id_user, user.username";
		$this->posts->orderBy($this->lang."_posts.create_time", "DESC");
		$this->posts->join('user', 'user.id = '.$this->lang.'_posts.author_create', 'LEFT');
		$result  = $this->posts->get(null, array($start,$limit),$select);
		//$result  = $this->posts->rawQuery($sql);
		return $result;
	}
	public function update($data,$id){
		$this->posts->where('id',$id);
		$this->posts->update($data);
	}
	public function delete($id){
		$this->posts->where('id',$id);
		$this->posts->delete();
	}
	public function insertData($data_insert){
		$this->posts->insert($data_insert);
	}



	public function checkId($id){
		$this->posts->where('id',$id);
		$result  = $this->posts->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function getAllCategories(){
		return $this->categories->get();
	}
	public function getUserById($id){
		$select = $this->lang."_posts.*, user.id as id_user, user.username";
		$this->posts->where($this->lang.'_posts.id',$id);
		$this->posts->join('user', 'user.id = '.$this->lang.'_posts.author_create', 'LEFT');
		$result  = $this->posts->getOne(null,$select);
		return $result;
	}
	
	
	public function findSearch($search){
		$select = $this->lang."_posts.*, user.id as id_user, user.username";
		$this->posts->where($this->lang.'_posts.title', '%'.$search.'%', 'like');
		$this->posts->join('user', 'user.id = '.$this->lang.'_posts.author_create', 'LEFT');
		$result  = $this->posts->get(null,null,$select);
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_posts WHERE id IN (".$name.")";
		$this->posts->rawQuery($sql);
	}
	public function statusNew($id,$data){
		$this->posts->where('id',$id);
		$this->posts->update($data);
	}

}