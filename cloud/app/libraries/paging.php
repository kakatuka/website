<?php 
class Paging{
protected $_total;
protected $_pages;
protected $_link;

  public function __construct($count,$link){
    //tổng số mẫu tin
    if(isset($_GET['total'])){
        $this->_total = $_GET['total'];
    }else{
        $this ->_total = $count;
    }
    $this->_link = $link;
    
  }
// Phương thức tìm tổng số mẫu tin
/*public function findTotal($db, $table){
  if(isset($_GET['total'])){
   $this->_total = $_GET['total'];
  }else{
   $sql= 'SELECT COUNT(*) FROM '.$table;
   $result = $db->query($sql);
   $row = $db->fetch_array($result);
   $this ->_total = $row[0];
  }
}*/

// Phương thức tính số trang
public function findPages($limit){
  $this->_pages = ceil($this->_total / $limit);
  return $this->_pages;
}

// Phương thức tính vị trí mẫu tin bắt đầu từ vị trí trang
function rowStart($limit){
  return (!isset($_GET['page'])) ? 0 :  ($_GET['page']-1) * $limit;
}

public function pagesList($curpage){
  $total = $this->_total;
  $pages = $this->_pages;
  if($pages <=1){return '';}
  $page_list="";
  $page_list .= '<ul class="pagination">';

  // Tạo liên kết tới trang đầu và trang trang trước
  if($curpage!=1){
   $page_list .= '<li><a href="'.$this->_link.'&page=1&total='.$total.'" title="trang đầu">First </a></li>';
  }
  if($curpage  > 1){
   $page_list .= '<li><a href="'.$this->_link .'&page='.($curpage-1).'&total='.$total.'" title="trang trước"><span aria-hidden="true">&laquo;</span> </a></li>';
  }

  // Tạo liên kết tới các trang
  for($i=1; $i<=$pages; $i++){
   if($i == $curpage){
    $page_list .= '<li class="active"><a href="#">'.$i.' <span class="sr-only">(current)</span></a></li>';
   }
   else{
    $page_list .= '<li><a href="'.$this->_link.'&page='.$i.'&total='.$total.'" title="Trang '.$i.'">'.$i.'</a></li>';
   }
   $page_list .= " ";
  }

  // Tạo liên kết tới trang sau và trang cuối
  if(($curpage+1)<=$pages){
   $page_list .= '<li><a href="'.$this->_link.'&page='.($curpage+1).'&total='.$total.'" title="Đến trang sau"> <span aria-hidden="true">&raquo;</span> </a></li>';
  }
  if(($curpage != $pages) && ($pages != 0)){
   $page_list .= '<li><a href="'.$this->_link.'&page='.$pages.'&total='.$total.'" title="trang cuối"> Last</a></li>';
  }

  $page_list .= '</ul>';
  return $page_list;
}// end pagesList
}// end class

