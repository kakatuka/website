<?php
class Partner {
	private $posts;
	private $cate;

	public function __construct() {
		global $_web;
		$this->lang = $_web['lang'];
		$this->image        = new system\Model($this->lang.'_album');
	}

	public function getPartNer()
	{
		$this->image->where('status',1);
		$data = $this->image->get();
		return  $data;
	}
	 public function getPartByCate()
    {
         // $this->image->where('id',$id);
         $this->image->orderBy('id','DESC');

         // LEFT JOIN ".$this->lang."_comments_posts as c on ".$this->lang."_posts.id = c.post_id
        $result = $this->image->get();
        return $result;
    }

    public function getDetail($id){
        $select = $this->lang."_album.*, user.id as id_user, user.username";
        $this->image->where( $this->lang."_album.status",1);
        $this->image->where( $this->lang."_album.id",$id);
        $this->image->join('user', 'user.id = '.$this->lang.'_album.author_create', 'LEFT');
        $result = $this->image->getOne(null,$select);
        return $result;
    }

    //  public function getPartner($status){
    //     $select = $this->image->where($this->lang.'_posts.status', '%'.$status.'%', 'like');
    //     $result  = $this->image->get(null,$select);
    //     return $result;
    // }
}