<?php 
class Album{
	private $album;
	public function __construct(){
		global $_web;
		$this->lang         = $_web['lang'];
		$this->album        = new system\Model($this->lang.'_album');
		$this->categories   = new system\Model($this->lang.'_categories_album');
	}
	public function getALLalbum(){
		$select = $this->lang."_album.*, user.id as id_user, user.username";
		$this->album->orderBy($this->lang."_album.create_time", "DESC");
		$this->album->join('user', 'user.id = '.$this->lang.'_album.author_create', 'LEFT');
		$result  = $this->album->get(null, null,$select);
		return $result;
	}
	public function getalbumOfId($id){
		$select = $this->lang."_album.*, user.id as id_user, user.username";
		$this->album->orderBy($this->lang."_album.create_time", "DESC");
		$this->album->where($this->lang.'_album.author_create',$id);
		$this->album->join('user', 'user.id = '.$this->lang.'_album.author_create', 'LEFT');
		$result  = $this->album->get(null, null,$select);
		return $result;
	}
	public function getPagialbum($start,$limit){
		$select = $this->lang."_album.*, user.id as id_user, user.username";
		$this->album->orderBy($this->lang."_album.create_time", "DESC");
		$this->album->join('user', 'user.id = '.$this->lang.'_album.author_create', 'LEFT');
		$result  = $this->album->get(null, array($start,$limit),$select);
		//$result  = $this->album->rawQuery($sql);
		return $result;
	}
	public function update($data,$id){
		$this->album->where('id',$id);
		$this->album->update($data);
	}
	public function delete($id){
		$this->album->where('id',$id);
		$this->album->delete();
	}
	public function insertData($data_insert){
		$this->album->insert($data_insert);
	}



	public function checkId($id){
		$this->album->where('id',$id);
		$result  = $this->album->num_rows();
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
		$select = $this->lang."_album.*, user.id as id_user, user.username";
		$this->album->where($this->lang.'_album.id',$id);
		$this->album->join('user', 'user.id = '.$this->lang.'_album.author_create', 'LEFT');
		$result  = $this->album->getOne(null,$select);
		return $result;
	}
	
	
	public function findSearch($search){
		$select = $this->lang."_album.*, user.id as id_user, user.username";
		$this->album->where($this->lang.'_album.title', '%'.$search.'%', 'like');
		$this->album->join('user', 'user.id = '.$this->lang.'_album.author_create', 'LEFT');
		$result  = $this->album->get(null,null,$select);
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_album WHERE id IN (".$name.")";
		$this->album->rawQuery($sql);
	}
	public function statusNew($id,$data){
		$this->album->where('id',$id);
		$this->album->update($data);
	}

}