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
  // dd($_GET['page']);
  return (!isset($_GET['page'])) ? 0 :  ($_GET['page']-1) * $limit;
}
function rowStart1($limit){
  return (!isset($_GET['p'])) ? 0 :  ($_GET['p']-1) * $limit;
}

public function pagesList($curpage){
  $total = $this->_total;
  $pages = $this->_pages;
  if($pages <=1){return '';}
  $page_list="";
  $page_list .= '<ul class="pagination">';

  // Tạo liên kết tới trang đầu và trang trang trước
  if($curpage!=1){
   $page_list .= '<li><a href="'.$this->_link.'&p1&t'.$total.'" title="trang đầu">Trang đầu </a></li>';
  }
  if($curpage  > 1){
   $page_list .= '<li><a href="'.$this->_link .'&p'.($curpage-1).'&t'.$total.'" title="trang trước"><span aria-hidden="true">&laquo;</span> </a></li>';
  }

  // Tạo liên kết tới các trang
  for($i=1; $i<=$pages; $i++){
   if($i == $curpage){
    $page_list .= '<li class="active"><a href="#">'.$i.' <span class="sr-only">(current)</span></a></li>';
   }
   else{
    $page_list .= '<li><a href="'.$this->_link.'&p'.$i.'&t'.$total.'" title="Trang '.$i.'">'.$i.'</a></li>';
   }
   $page_list .= " ";
  }

  // Tạo liên kết tới trang sau và trang cuối
  if(($curpage+1)<=$pages){
   $page_list .= '<li><a href="'.$this->_link.'&p'.($curpage+1).'&t'.$total.'" title="Đến trang sau"> <span aria-hidden="true">&raquo;</span> </a></li>';
  }
  if(($curpage != $pages) && ($pages != 0)){
   $page_list .= '<li><a href="'.$this->_link.'&p'.$pages.'&t'.$total.'" title="trang cuối"> Trang cuối</a></li>';
  }

  $page_list .= '</ul>';
  return $page_list;
}// end pagesList
public function pagesList1($id,$curpage){
  $total = $this->_total;
  $pages = $this->_pages;
  if($pages <=1){return '';}
  $page_list="";
  $page_list .= '<ul class="pagination">';

  // Tạo liên kết tới trang đầu và trang trang trước
  if($curpage!=1){
   $page_list .= '<li><a class="page larger" href="'.$this->_link.'&i'.$id.'&p1&t'.$total.'" title="trang đầu">Trang đầu </a></li>';
  }
  if($curpage  > 1){
   $page_list .= '<li><a class="page larger" href="'.$this->_link .'&i'.$id.'&p'.($curpage-1).'&t'.$total.'" title="trang trước">&laquo;</a></li>';
  }

  // Tạo liên kết tới các trang
  for($i=1; $i<=$pages; $i++){
   if($i == $curpage){
    $page_list .= '<li class="active"><a class="current">'.$i.'</a></li>';
   }
   else{
    $page_list .= '<li><a class="page larger" href="'.$this->_link.'&i'.$id.'&p'.$i.'&t'.$total.'" title="Trang '.$i.'">'.$i.'</a></li>';
   }
   $page_list .= " ";
  }

  // Tạo liên kết tới trang sau và trang cuối
  if(($curpage+1)<=$pages){
   $page_list .= '<li><a class="page larger" href="'.$this->_link.'&i'.$id.'&p'.($curpage+1).'&t'.$total.'" title="Đến trang sau">&raquo;</a></li>';
  }
  if(($curpage != $pages) && ($pages != 0)){
   $page_list .= '<li><a class="page larger" href="'.$this->_link.'&i'.$id.'&p'.$pages.'&t'.$total.'" title="trang cuối"> Trang cuối</a></li>';
  }

  $page_list .= '</ul>';
  return $page_list;
}
public function pagesList2($id,$curpage){
  // dd($id);
  $total = $this->_total;
  $pages = $this->_pages;
  if($pages <=1){return '';}
  $page_list="";
  $page_list .= '<ul class="pagination">';

  // Tạo liên kết tới trang đầu và trang trang trước
  if($curpage!=1){
   $page_list .= '<li><a class="page larger" href="'.$this->_link.'-f'.$id.'&p1&t'.$total.'" title="trang đầu">Trang đầu </a></li>';
  }
  if($curpage  > 1){
   $page_list .= '<li><a class="page larger" href="'.$this->_link .'-f'.$id.'&p'.($curpage-1).'&t'.$total.'" title="trang trước">&laquo;</a></li>';
  }

  // Tạo liên kết tới các trang
  for($i=1; $i<=$pages; $i++){
   if($i == $curpage){
    $page_list .= '<li class="active"><a class="current">'.$i.'</a></li>';
   }
   else{
    $page_list .= '<li><a class="page larger" href="'.$this->_link.'-f'.$id.'&p'.$i.'&t'.$total.'" title="Trang '.$i.'">'.$i.'</a></li>';
   }
   $page_list .= " ";
  }

  // Tạo liên kết tới trang sau và trang cuối
  if(($curpage+1)<=$pages){
   $page_list .= '<li><a class="page larger" href="'.$this->_link.'-f'.$id.'&p'.($curpage+1).'&t'.$total.'" title="Đến trang sau">&raquo;</a></li>';
  }
  if(($curpage != $pages) && ($pages != 0)){
   $page_list .= '<li><a class="page larger" href="'.$this->_link.'-f'.$id.'&p'.$pages.'&t'.$total.'" title="trang cuối"> Trang cuối</a></li>';
  }

  $page_list .= '</ul>';
  return $page_list;
}
public function pagesPartner($curpage) {
    $total = $this->_total;
    $pages = $this->_pages;
    if ($pages <= 1) {return '';}
    $page_list = "";
    $page_list .= '<ul class="pagination">';

    // Tạo liên kết tới trang đầu và trang trang trước
    if ($curpage != 1) {
      $page_list .= '<li><a class="page larger" href="' . $this->_link . '&p=1&t=' . $total . '" title="trang đầu">Trang đầu </a></li>';
    }
    if ($curpage > 1) {
      $page_list .= '<li><a class="page larger" href="' . $this->_link . '&p=' . ($curpage - 1) . '&t=' . $total . '" title="trang trước">&laquo;</a></li>';
    }

    // Tạo liên kết tới các trang
    for ($i = 1; $i <= $pages; $i++) {
      if ($i == $curpage) {
        $page_list .= '<li class="active"><a class="current">' . $i . '</a></li>';
      } else {
        $page_list .= '<li><a class="page larger" href="' . $this->_link . '&p=' . $i . '&t=' . $total . '" title="Trang ' . $i . '">' . $i . '</a></li>';
      }
      $page_list .= " ";
    }

    // Tạo liên kết tới trang sau và trang cuối
    if (($curpage + 1) <= $pages) {
      $page_list .= '<li><a class="page larger" href="' . $this->_link . '&p=' . ($curpage + 1) . '&t=' . $total . '" title="Đến trang sau">&raquo;</a></li>';
    }
    if (($curpage != $pages) && ($pages != 0)) {
      $page_list .= '<li><a class="page larger" href="' . $this->_link . '&p=' . $pages . '&t=' . $total . '" title="trang cuối"> Trang cuối</a></li>';
    }

    $page_list .= '</ul>';
    return $page_list;
  }
public function pagesListSearch($curpage) {
    $total = $this->_total;
    $pages = $this->_pages;
    if ($pages <= 1) {return '';}
    $page_list = "";
    $page_list .= '<ul class="pagination">';

    // Tạo liên kết tới trang đầu và trang trang trước
    if ($curpage != 1) {
      $page_list .= '<li><a class="page larger" href="' . $this->_link . '&p1&t' . $total . '" title="trang đầu">Trang đầu </a></li>';
    }
    if ($curpage > 1) {
      $page_list .= '<li><a class="page larger" href="' . $this->_link . '&p=' . ($curpage - 1) . '&t' . $total . '" title="trang trước">&laquo;</a></li>';
    }

    // Tạo liên kết tới các trang
    for ($i = 1; $i <= $pages; $i++) {
      if ($i == $curpage) {
        $page_list .= '<li class="active"><a class="current">' . $i . '</a></li>';
      } else {
        $page_list .= '<li><a class="page larger" href="' . $this->_link . '&p=' . $i . '&t' . $total . '" title="Trang ' . $i . '">' . $i . '</a></li>';
      }
      $page_list .= " ";
    }

    // Tạo liên kết tới trang sau và trang cuối
    if (($curpage + 1) <= $pages) {
      $page_list .= '<li><a class="page larger" href="' . $this->_link . '&p=' . ($curpage + 1) . '&t' . $total . '" title="Đến trang sau">&raquo;</a></li>';
    }
    if (($curpage != $pages) && ($pages != 0)) {
      $page_list .= '<li><a class="page larger" href="' . $this->_link . '&p=' . $pages . '&t' . $total . '" title="trang cuối"> Trang cuối</a></li>';
    }

    $page_list .= '</ul>';
    return $page_list;
  }
public function pagesListCatalog($id,$curpage){
  $total = $this->_total;
  $pages = $this->_pages;
  if($pages <=1){return '';}
  $page_list="";
  $page_list .= '<div class="pagination">';

  // Tạo liên kết tới trang đầu và trang trang trước
  if($curpage!=1){
   $page_list .= '<li><a class="page larger" href="'.$this->_link.'&i'.$id.'&p1&t'.$total.'" title="trang đầu">Trang đầu </a></li>';
  }
  if($curpage  > 1){
   $page_list .= '<li><a class="page larger" href="'.$this->_link .'&i'.$id.'&p'.($curpage-1).'&t'.$total.'" title="trang trước">&laquo;</a></li>';
  }

  // Tạo liên kết tới các trang
  for($i=1; $i<=$pages; $i++){
   if($i == $curpage){
    $page_list .= '<li class="active"><a class="current">'.$i.'</a></li>';
   }
   else{
    $page_list .= '<li><a class="page larger" href="'.$this->_link.'&i'.$id.'&p'.$i.'&t'.$total.'" title="Trang '.$i.'">'.$i.'</a></li>';
   }
   $page_list .= " ";
  }

  // Tạo liên kết tới trang sau và trang cuối
  if(($curpage+1)<=$pages){
   $page_list .= '<li><a class="page larger" href="'.$this->_link.'&i'.$id.'&p'.($curpage+1).'&t'.$total.'" title="Đến trang sau">&raquo;</a></li>';
  }
  if(($curpage != $pages) && ($pages != 0)){
   $page_list .= '<li><a class="page larger" href="'.$this->_link.'&i'.$id.'&p'.$pages.'&t'.$total.'" title="trang cuối"> Trang cuối</a></li>';
  }

  $page_list .= '</div>';
  return $page_list;
}
}// end class

