<?php 
class Comments_posts{
	private $comments;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->comments     = new system\Model($this->lang.'_comments_posts');
	}
	public function getComments(){
		$result  = $this->comments->get();
		return $result;
	}
	public function getPagiComments(){
		$select = $this->lang."_posts.id as id_posts,".$this->lang."_posts.alias, ".$this->lang."_posts.title, ".$this->lang."_comments_posts.*";
		$this->comments->join($this->lang.'_posts', $this->lang.'_posts.id = '.$this->lang.'_comments_posts.post_id', 'LEFT');
		$result  = $this->comments->get(null, null,$select);
		return $result;
	}
	public function update($data,$id){
		$this->comments->where('id',$id);
		$this->comments->update($data);
	}
	public function delete($id){
		$this->comments->where('id',$id);
		$this->comments->delete();
	}
	public function insertData($data_insert){
		$this->comments->insert($data_insert);
	}



	public function checkId($id){
		$this->comments->where('id',$id);
		$result  = $this->comments->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function getCommentsByIdPost($id){
		$this->comments->where('id',$id);
		$result  = $this->comments->getOne();
		return $result;
	}
	public function findSearch($search){
		$this->comments->where('username', '%'.$search.'%', 'like');
		$result  = $this->comments->get();
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_comments_posts WHERE id IN (".$name.")";
		$this->comments->rawQuery($sql);
	}
}