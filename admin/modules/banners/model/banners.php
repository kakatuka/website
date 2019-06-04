<?php 
class Banners{
	private $banner;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->banner     = new system\Model($this->lang.'_banner_images');
	}
	public function getPages(){
		$result  = $this->banner->get();
		return $result;
	}
	public function getPagiPages($start,$limit){
		$select = $this->lang."_banner_images.*, user.id as id_user, user.username";
		$this->banner->join('user', 'user.id = '.$this->lang.'_banner_images.author_create', 'LEFT');
		$this->banner->orderBy('create_time', 'DESC');
		$result  = $this->banner->get(null, array($start,$limit),$select);
		//$result  = $this->banner->rawQuery($sql);
		return $result;
	}
	public function update($data,$id){
		$this->banner->where('id',$id);
		$this->banner->update($data);
	}
	public function delete($id){
		$this->banner->where('id',$id);
		$this->banner->delete();
	}
	public function insertData($data_insert){
		$this->banner->insert($data_insert);
	}



	public function checkId($id){
		$this->banner->where('id',$id);
		$result  = $this->banner->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function getUserById($id){
		$this->banner->where('id',$id);
		$result  = $this->banner->getOne();
		return $result;
	}
	
	public function findSearch($search){
		$select = $this->lang."_banner_images.*, user.id as id_user, user.username";
		$this->banner->where($this->lang.'_banner_images.title', '%'.$search.'%', 'like');
		$this->banner->join('user', 'user.id = '.$this->lang.'_banner_images.author_create', 'LEFT');
		$result  = $this->banner->get(null,null,$select);
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_banner_images WHERE id IN (".$name.")";
		$this->banner->rawQuery($sql);
	}
	public function statusNew($id,$data){
		$this->banner->where('id',$id);
		$this->banner->update($data);
	}

}