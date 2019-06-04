<?php 
class Audio{
	private $audio;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->audio     = new system\Model($this->lang.'_audio');
	}
	public function getPages(){
		$result  = $this->audio->get();
		return $result;
	}
	public function getPagiPages($start,$limit){
		$select = $this->lang."_audio.*, user.id as id_user, user.username";
		$this->audio->join('user', 'user.id = '.$this->lang.'_audio.author_create', 'LEFT');
		$this->audio->orderBy('create_time', 'DESC');
		$result  = $this->audio->get(null, array($start,$limit),$select);
		//$result  = $this->audio->rawQuery($sql);
		return $result;
	}
	public function update($data,$id){
		$this->audio->where('id',$id);
		$this->audio->update($data);
	}
	public function delete($id){
		$this->audio->where('id',$id);
		$this->audio->delete();
	}
	public function insertData($data_insert){
		$this->audio->insert($data_insert);
	}
	public function checkId($id){
		$this->audio->where('id',$id);
		$result  = $this->audio->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function getUserById($id){
		$this->audio->where('id',$id);
		$result  = $this->audio->getOne();
		return $result;
	}
	public function findSearch($search){
		$select = $this->lang."_audio.*, user.id as id_user, user.username";
		$this->audio->where($this->lang.'_audio.title', '%'.$search.'%', 'like');
		$this->audio->join('user', 'user.id = '.$this->lang.'_audio.author_create', 'LEFT');
		$result  = $this->audio->get(null,null,$select);
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_audio WHERE id IN (".$name.")";
		$this->audio->rawQuery($sql);
	}

}