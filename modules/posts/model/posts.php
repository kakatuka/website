<?php 
class Posts{
    private $cate;
    private $posts;
    private $comments;
    private $options;
    private $manager_home;

    public function __construct(){
        global $_web;
        $this->lang         = $_web['lang'];
        $this->posts        = new system\Model($this->lang.'_posts');
        $this->image        = new system\Model($this->lang.'_album');
        $this->options      = new system\Model('web_options');
        $this->cate         = new system\Model($this->lang.'_categories_posts');
        $this->comments     = new system\Model($this->lang.'_comments_posts');
        $this->manager_home = new system\Model($this->lang.'_manager_home');
    }
    public function getOptions(){
       $category = $this->options->get();
       return $category;
   }
    public function getBreadcrumbsCategory($idCate, $data = array()) {
        $this->cate->where("id",$idCate);
        $this->cate->where("status",1);
        $category = $this->cate->getOne();

        $category['link'] = base_url().alias($category['title']).'-c'.$category['id'].'.htm';
        $data[]           = array(
            'name' => (isset($category['title']) ? $category['title'] : ''),
            'href'  => $category['link'],
        );
        if (isset($category['parent_id']) && $category['parent_id'] > 0) {
            $data = $this->getBreadcrumbsCategory($category['parent_id'], $data);
        }
        return $data;
    }
    public function getCatePost($id){
        $this->cate->where('id',$id);
        $this->cate->where('status','1');
        $result  = $this->cate->getOne();
         return $result;
    }
    public function getPosts(){
        $this->posts->where('status',1);
        $this->posts->orderBy("id", "DESC");
        $result = $this->posts->get();
        return $result;
    }
    public function getPostsHighlights($start=null,$limit=null){
        $select = $this->lang."_posts.id,".$this->lang."_posts.title,".$this->lang."_posts.alias,".$this->lang."_posts.description,".$this->lang."_posts.thumbnail,".$this->lang."_posts.create_time, user.id as id_user, user.username";
        $this->posts->where( $this->lang."_posts.hot1",1);
        $this->posts->orderBy("create_time", "DESC");
        $this->posts->join('user', 'user.id = '.$this->lang.'_posts.author_create', 'LEFT');
        if ($start== null && $limit==null) {
            $result = $this->posts->get(null,null,$select);
        }else{
            $result = $this->posts->get(null,array($start,$limit),$select);
        }
        return $result;
    }
    public function getcate($id){
        $this->cate->where('id',$id);
        $this->cate->where('status','1');
        $result  = $this->cate->getOne();
         return $result;
    }
    public function getPostRandom(){
        $this->posts->where('status',1);
        $this->posts->orderBy("RAND()");
        $result  = $this->posts->get();
        return $result;
    }
    public function getPostLienquanAction2($cateid,$id){
        $sql = "SELECT * FROM "
        .$this->lang."_posts WHERE ".
        $this->lang."_posts.cate_id like '%".$cateid."%' AND ".$this->lang."_posts.id != '".$id."' ORDER BY rand() LIMIT 0,24";
        $result = $this->posts->rawQuery($sql);
        return $result;
    }
    public function getAllPost($start,$limit){
        $select = $this->lang."_posts.id,".$this->lang."_posts.title,".$this->lang."_posts.alias,".$this->lang."_posts.thumbnail,".$this->lang."_posts.description,"
        .$this->lang."_posts.create_time, user.id as id_user, user.username";
        $this->posts->where( $this->lang."_posts.status",1);
        $this->posts->orderBy("create_time", "DESC");
        $this->posts->join('user', 'user.id = '.$this->lang.'_posts.author_create', 'LEFT');
        $result = $this->posts->get(null,array($start,$limit),$select);
        return $result;
    }
    public function getDetail($id){
        $select = $this->lang."_posts.*, user.id as id_user, user.username";
        $this->posts->where( $this->lang."_posts.status",1);
        $this->posts->where( $this->lang."_posts.id",$id);
        $this->posts->join('user', 'user.id = '.$this->lang.'_posts.author_create', 'LEFT');
        $result = $this->posts->getOne(null,$select);
        return $result;
    }
    public function insert_comt($data){
        $this->comments->insert($data);
    }
    public function getCommentsByPostId($id){
        $this->comments->where("status",1);
        $this->comments->where("post_id",$id);
        $this->comments->orderBy("id","ASC");
        $result = $this->comments->get();
        return $result;
    }
    public function countCommentsByPostId($id){
        $this->comments->where("status",1);
        $this->comments->where("post_id",$id);
        $result = $this->comments->num_rows();
        return $result;
    }
    public function getManager()
    {
        $data = $this->manager_home->get();
        return $data;
    }
    public function getAllNews($start=null,$limit=null){
        $select = $this->lang."_posts.id,".$this->lang."_posts.title,".$this->lang."_posts.alias,".$this->lang."_posts.cate_id,".$this->lang."_posts.description,".$this->lang."_posts.thumbnail,".$this->lang."_posts.create_time, user.id as id_user, user.username";
        $this->posts->where( $this->lang."_posts.status",1);
        $this->posts->join('user', 'user.id = '.$this->lang.'_posts.author_create', 'LEFT');
        $this->posts->orderBy("create_time", "DESC");
        if ($start== null && $limit==null) {
            $result = $this->posts->get(null,null,$select);
        }else{
            $result = $this->posts->get(null,array($start,$limit),$select);
        }
        return $result;
    }
    public function getPostHot($cate){
        $sql    = "SELECT * FROM vi_posts WHERE status = 1 AND hot1 = 1 AND cate_id like '%".$cate."%' ORDER BY id DESC LIMIT 0, 4";
        $result = $this->posts->rawQuery($sql);
        return $result;
    }
    public function getListHot(){
        $this->posts->where('status',1);
        $this->posts->where('hot1',3);
        $this->posts->orderBy('id',"DESC");
        $data = $this->posts->get();
        return $data;
    }
    public function getPostsCare($start,$limit){
        $select = "*";
        $this->posts->where( "status", 1);
        $this->posts->where( "hot1", 1);
        $this->posts->orderBy("id", "DESC");
        $result = $this->posts->get(null, array($start, $limit), $select);
        return $result;
    }
    public function getPostsCate($id){
        $sql    = "SELECT * FROM vi_posts WHERE status = 1 AND id != $id ORDER BY id DESC LIMIT 0, 5";
        $result = $this->posts->rawQuery($sql);
        return $result;
    }
    public function getViewPosts($id){
        $this->posts->where('id',$id);
        $result  = $this->posts->getOne();
        return $result;
    }
    public function updateView($data,$id){
        $this->posts->where('id',$id);
        $this->posts->update($data);
    }
    public function getPostsView(){
        $sql    = "SELECT * FROM vi_posts WHERE status = 1 ORDER BY view DESC LIMIT 0, 4";
        $result = $this->posts->rawQuery($sql);
        return $result;
    }
    public function getAlbumAnh(){
        $this->image->where('status',1);
        $this->image->orderBy('id','DESC');
        $result = $this->image->get();
        return $result;
    }
    public function getDetailImage($id){
        $this->image->where('id',$id);
        $result = $this->image->getOne();
        return $result;
    }
     public function getViewImage($id){
        $this->image->where('id',$id);
        $result  = $this->image->getOne();
        return $result;
    }
    public function updateViewImage($data,$id){
        $this->image->where('id',$id);
        $this->image->update($data);
    }
    public function getImageView(){
        $sql    = "SELECT * FROM vi_album WHERE status = 1 ORDER BY view DESC LIMIT 0, 3";
        $result = $this->image->rawQuery($sql);
        return $result;
    }
    public function getPostRelated($cateid,$id)
    {
         $sql = "SELECT * FROM "
        .$this->lang."_posts WHERE ".
        $this->lang."_posts.cate_id like '%".$cateid."%' AND ".$this->lang."_posts.id != '".$id."' ORDER BY rand() LIMIT 0,6";
        $result = $this->posts->rawQuery($sql);
        return $result;
    }
    public function getPostByCate($cateid)
    {
         $sql = "SELECT ".$this->lang."_posts.*, u.username
         FROM ".$this->lang."_posts 
         LEFT JOIN user as u on ".$this->lang."_posts.author_create = u.id 
         WHERE ".$this->lang."_posts.cate_id like '%".$cateid."%' AND ".$this->lang."_posts.status = 1  ORDER BY id DESC ";
        $result = $this->posts->rawQuery($sql);
        return $result;
    }
    public function getPostsNew(){
        $select = "*";
        $this->posts->where( "status", 1);
        $this->posts->orderBy("id", "DESC");
        $result = $this->posts->get(null, array(0, 5), $select);
        return $result;
    }
}