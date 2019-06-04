<?php 
class Pages{
	private $pages;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->pages     = new system\Model($this->lang.'_pages');
	}
	public function getPages(){
		$this->pages->orderBy($this->lang."_pages.create_time", "DESC");
		$result  = $this->pages->get();
		return $result;
	}
	public function getPagiPages($start,$limit){
		$select = $this->lang."_pages.*, user.id as id_user, user.username";
		$this->pages->join('user', 'user.id = '.$this->lang.'_pages.author_create', 'LEFT');
		$result  = $this->pages->get(null, array($start,$limit),$select);
		//$result  = $this->pages->rawQuery($sql);
		return $result;
	}
	public function update($data,$id){
		$this->pages->where('id',$id);
		$this->pages->update($data);
	}
	public function delete($id){
		$this->pages->where('id',$id);
		$this->pages->delete();
	}
	public function insertData($data_insert){
		$this->pages->insert($data_insert);
	}

	public function checkId($id){
		$this->pages->where('id',$id);
		$result  = $this->pages->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function getUserById($id){
		$this->pages->where('id',$id);
		$result  = $this->pages->getOne();
		return $result;
	}
	public function getUserByIdEng($id){
		$this->pages_en->where('id_lang',$id);
		$result  = $this->pages_en->getOne();
		return $result;
	}
	
	public function findSearch($search){
		$select = $this->lang."_pages.*, user.id as id_user, user.username";
		$this->pages->where($this->lang.'_pages.title', '%'.$search.'%', 'like');
		$this->pages->join('user', 'user.id = '.$this->lang.'_pages.author_create', 'LEFT');
		$result  = $this->pages->get(null,null,$select);
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_pages WHERE id IN (".$name.")";
		$this->pages->rawQuery($sql);
	}

}