<?php 
class Video{
	private $video;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->video     = new system\Model($this->lang.'_video');
	}
	public function getPages(){
		$result  = $this->video->get();
		return $result;
	}
	public function getPagiPages($start,$limit){
		$select = $this->lang."_video.*, user.id as id_user, user.username";
		$this->video->join('user', 'user.id = '.$this->lang.'_video.author_create', 'LEFT');
		$this->video->orderBy('create_time', 'DESC');
		$result  = $this->video->get(null, array($start,$limit),$select);
		//$result  = $this->video->rawQuery($sql);
		return $result;
	}
	public function update($data,$id){
		$this->video->where('id',$id);
		$this->video->update($data);
	}
	public function delete($id){
		$this->video->where('id',$id);
		$this->video->delete();
	}
	public function insertData($data_insert){
		$this->video->insert($data_insert);
	}



	public function checkId($id){
		$this->video->where('id',$id);
		$result  = $this->video->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function getUserById($id){
		$this->video->where('id',$id);
		$result  = $this->video->getOne();
		return $result;
	}
	
	public function findSearch($search){
		$select = $this->lang."_video.*, user.id as id_user, user.username";
		$this->video->where($this->lang.'_video.title', '%'.$search.'%', 'like');
		$this->video->join('user', 'user.id = '.$this->lang.'_video.author_create', 'LEFT');
		$result  = $this->video->get(null,null,$select);
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_video WHERE id IN (".$name.")";
		$this->video->rawQuery($sql);
	}
	public function statusNew($id,$data){
		$this->video->where('id',$id);
		$this->video->update($data);
	}

}