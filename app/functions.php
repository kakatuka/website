<?php 


if (!function_exists('dd')){
    function dd($a){
        echo "<pre>";
        print_r($a);
        echo "</pre>";
        die(" Die !!!");
    }
}

if (!function_exists('de')){
    function de($a){
        echo "<pre>";
        print_r($a);
        echo "</pre>";
    }
}

if (!function_exists('getRandomWord')){
    function getRandomWord($len = 5) {
        $word = array_merge(range('0', '9'), range('a', 'z'));
        shuffle($word);
        return substr(implode($word), 0, $len);
    }
}

if (!function_exists('cutString')){
    function cutString($chuoi,$max){
        $length_chuoi = strlen($chuoi);
        if($length_chuoi <= $max){
            return $chuoi;
        }else{
            return mb_substr($chuoi,0,$max,'UTF-8').'...';
        }
    }
}

if (!function_exists('getPostOfManager')){
    function getPostOfManager($ManagerHome, $allPost) {
        $list = $ManagerHome;
        foreach ($ManagerHome as $key => $value) {
            $arr = json_decode($value['content']);
            foreach ($arr as $key1 => $value1) {
                foreach ($allPost as $key2 => $value2) {
                    if($value1->id == $value2['id']){
                        $list[$key]['post'][$key1] = $allPost[$key2];
                    }
                }
            }
        }
        return $list;
    }
}
//Echo đường dẫn ảnh với 3 thông số url, chiều rộng, chiều cao, ('zc=2' or 'zc=1') 2 căn theo chiều ngang 1 căn theo chiều cao
if (!function_exists('getImage')){
    function getImage($url = "",$width,$height,$bien,$q=null){
        if ($url != null) {
            $url = $url;
            if($q==null){
             return base_url_cloud()."timthumb.php?src=". base_url_cdn().$url."&amp;h=".$height."&amp;w=".$width."&amp;zc=".$bien;
            }else{
                return base_url_cloud()."timthumb.php?src=". base_url_cdn().$url."&amp;h=".$height."&amp;w=".$width."&amp;zc=".$bien."&amp;q=".$q;
            }
        } else {
            $url = 'logo_03_1.png';
            if($q==null){
             return base_url_cloud()."timthumb.php?src=". base_url_cdn().$url."&amp;h=".$height."&amp;w=".$width."&amp;zc=2&amp;q=50";
            }else{
                return base_url_cloud()."timthumb.php?src=". base_url_cdn().$url."&amp;h=".$height."&amp;w=".$width."&amp;zc=2&amp;q=".$q;
            }
        }
        
    }
}
if (!function_exists('getImage1')){
    function getImage1($url = "",$width,$height,$bien,$q=null){
        if ($url != null) {
            $url = $url;
            if($q==null){
             return base_url_cloud()."timthumb.php?src=". base_url_cdn().$url."&amp;h=".$height."&amp;w=".$width."&amp;zc=".$bien."&amp;q=50";
            }else{
                return base_url_cloud()."timthumb.php?src=". base_url_cdn().$url."&amp;h=".$height."&amp;w=".$width."&amp;zc=".$bien."&amp;q=".$q;
            }
        } else {
            $url = 'logo_03_1.png';
            if($q==null){
             return base_url_cloud()."timthumb.php?src=". base_url_cdn().$url."&amp;h=".$height."&amp;w=".$width."&amp;zc=2&amp;q=50";
            }else{
                return base_url_cloud()."timthumb.php?src=". base_url_cdn().$url."&amp;h=".$height."&amp;w=".$width."&amp;zc=2&amp;q=".$q;
            }
        }
        
        
    }
}
// if (!function_exists('cutString')){
//     function cutString($chuoi,$max){
//         $length_chuoi = strlen($chuoi);
//         if($length_chuoi <= $max){
//             return $chuoi;
//         }else{
//             return mb_substr($chuoi,0,$max,'UTF-8').'...';
//         }
//     }
// }

if (!function_exists('getPostOfManager')){
    function getPostOfManager($ManagerHome, $allPost) {
        $list = $ManagerHome;
        foreach ($ManagerHome as $key => $value) {
            $arr = json_decode($value['content']);
            foreach ($arr as $key1 => $value1) {
                foreach ($allPost as $key2 => $value2) {
                    if($value1->id == $value2['id']){
                        $list[$key]['post'][$key1] = $allPost[$key2];
                    }
                }
            }
        }
        //dd($list);
        return $list;
    }
}
//Lấy ra bài viết liên quan theo category
if (!function_exists('getPostLienQuan')){
    function getPostLienQuan($id, $homepost, $max = null) {
        $z = 0;
        foreach ($homepost as $key1 => $value1) {
            if (isset($max)) {
                if ($z < $max) {
                    if (preg_match("/," . $id. ",/", $value1['cate_id'], $matches)) {
                        $list[$z] = $homepost[$key1];
                        $z = $z + 1;
                    }
                }
            } else {
                if (preg_match("/," . $id. ",/", $value1['cate_id'], $matches)) {
                    $list[$z] = $homepost[$key1];
                    $z = $z + 1;
                }
            }
        }
        //dd($list);
        return $list;
    }
}
if (!function_exists('getManagerHome')){
    function getManagerHome($manager, $homepost) {
        $list = $manager;
        foreach ($manager as $key => $value) {
            $z = 0;
            foreach ($homepost as $key1 => $value1) {
                if (isset($value['number'])) {
                    if ($z < $value['number']) {
                        if (preg_match("/," . $value['id_cate']. ",/", $value1['cate_id'], $matches)) {
                            $list[$key]['post'][$z] = $homepost[$key1];
                            $z = $z + 1;
                        }
                    }
                } else {
                    if (preg_match("/," . $value['id_cate']. ",/", $value1['cate_id'], $matches)) {
                        $list[$key]['post'][$z] = $homepost[$key1];
                        $z = $z + 1;
                    }
                }
            }
        }
        return $list;
    }
}
//Lấy ra san pham liên quan thepo category
if (!function_exists('getRelatedPosts')){
    function getRelatedPosts($id, $arraypost, $max = null) {
        $z = 0;
        foreach ($arraypost as $key => $value) {
            if (isset($max)) {
                if ($z < $max) {
                    if (preg_match("/," . $id. ",/", $value['category'], $matches)) {
                        $list[$z] = $arraypost[$key];
                        $z = $z + 1;
                    }
                }
            } else {
                if (preg_match("/," . $id. ",/", $value['category'], $matches)) {
                    $list[$z] = $arraypost[$key];
                    $z = $z + 1;
                }
            }
        }
    // dd($list);
    return $list;
    }
}
//Get list post theo start và limit
if (!function_exists('getLimitPosts')){
    function getLimitPosts($arraypost,$start,$max = null) {
        $z = 0;$list;
         for ($i = $start; $i < count($arraypost); $i++) {
            if (isset($max)) {
                if ($z < $max) {
                    $list[$z] = $arraypost[$i];
                    $z++;
                }
            } else {
                $list[$z] = $arraypost[$i];
                $z++;
            }
        }
        return $list;
    }
}

// Lấy random tin tức trong mảng

if (!function_exists('getNewpost')){
    function getNewpost($port,$max) {
        $z = 1;
        // dd($max);
        foreach ($port as $key => $value) {
            if($z <= $max){
                echo '<div class="product-list clearfix">
        <a class="image-list-product" 
        href="'.base_url().$value['alias'].'-n'.$value['id'].'.htm'.'"><img alt="" 
        src="'.getImage($value['thumbnail'],'263','184','zc=1').'">
        </a>
        <a href="'.base_url().$value['alias'].'-n'.$value['id'].'.htm'.'" class=" title-product-list"="">'.stripslashes($value['title']).'</a>
    </div>';
                $z = $z +1;
            }
        }
    }
}
if (!function_exists('getOldpost')){
    function getOldpost($port,$max) {
        $z = 1;
        foreach ($port as $key => $value) {
            if($z <= $max){
                     echo '<div class="product-list clearfix">
        <a class="image-list-product" 
        href="'.base_url().$value['alias'].'-n'.$value['id'].'.htm'.'"><img alt="" 
        src="'.getImage($value['thumbnail'],'263','184','zc=1').'">
        </a>
        <a href="'.base_url().$value['alias'].'-n'.$value['id'].'.htm'.'" class=" title-product-list"="">'.stripslashes($value['title']).'</a>
    </div>';
                $z = $z +1;
            }
        }
    }
}
if (!function_exists('category')){
    function category($data,$parent=0,$count=0){
        if (isset($data[$parent])) {
            if ($parent==0) {
                echo "<ul class='list-group margin-bottom-25 sidebar-menu slibar_left'>";
            }else{
                echo "<ul class='dropdown-menu'>";
            }
            foreach ($data[$parent] as $k=>$value) {
                $id=$value['id'];
                if (isset($data[$id])) {
                    if ($count>0) {
                        $class = 'class="list-group-item dropdown clearfix"';
                    }else{
                        $class='class="list-group-item clearfix dropdown"';
                    }
                    echo "<li $class>";
                }else{
                    echo '<li class="list-group-item dropdown clearfix">';
                }
                if (isset($data[$id])) { 
                    if ($parent> 0) {
                        $right= "<i class='fa fa-angle-right'></i>";
                    }else{
                        $right = "<i class='fa fa-angle-right'></i>";
                    }
                    echo "<a href='".base_url().$value['alias']."-p".$value['id'].".htm"."' class='dropdown-toggle' data-target='javascript:void(0)'>"
                    .$right.stripslashes($value['title'])."</a>";
                }else{
                    echo "<a href='".base_url().$value['alias']."-p".$value['id'].".htm"."'>".stripslashes($value['title'])."</a>";
                }
                unset($data[$k]);
                category($data,$id,$count+1);
                echo "</li>";
            }
            echo "</ul>";
        }
    }
}
if (!function_exists('categoryindexpost')){
    function categoryindexpost($data,$parent=20,$count=0){
        if (isset($data[$parent])) {
            if ($parent!=0) {
                echo "<ul class='list-group margin-bottom-25 sidebar-menu slibar_left'>";
            }else{
                echo "<ul class='dropdown-menu'>";
            }
            foreach ($data[$parent] as $k=>$value) {
                $id=$value['id'];
                if (isset($data[$id])) {
                    if ($count>0) {
                        $class = 'class="list-group-item dropdown clearfix"';
                    }else{
                        $class='class="list-group-item clearfix dropdown"';
                    }
                    echo "<li $class>";
                }else{
                    echo '<li class="list-group-item dropdown clearfix">';
                }
                if (isset($data[$id])) { 
                    if ($parent>0) {
                        $right= "<i class='fa fa-angle-right'></i>";
                    }else{
                        $right = "<i class='fa fa-angle-right'></i>";
                    }
                    echo "<a href='".base_url().$value['alias']."-c".$value['id'].".htm"."' class='dropdown-toggle' data-target='javascript:void(0)'>"
                    .$right.stripslashes($value['title'])."</a>";
                }else{
                    echo "<a href='".base_url().$value['alias']."-c".$value['id'].".htm"."'>".stripslashes($value['title'])."</a>";
                }
                unset($data[$k]);
                categoryindexpost($data,$id,$count+1);
                echo "</li>";
            }
            echo "</ul>";
        }
    }
}
if (!function_exists('convertAlias')){
    function convertAlias($cs){
    $vietnamese=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
    "è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
    "ì","í","ị","ỉ","ĩ"," ",
    "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
    "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
    "ỳ","ý","ỵ","ỷ","ỹ"," ",
    "đ",
    "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
    "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
    "Ì","Í","Ị","Ỉ","Ĩ",
    "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
    "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
    "Ỳ","Ý","Ỵ","Ỷ","Ỹ"," ",
    "Đ");
    $latin=array("a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a",
    "e","e","e","e","e","e","e","e","e","e","e",
    "i","i","i","i","i","-",
    "o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o",
    "u","u","u","u","u","u","u","u","u","u","u",
    "y","y","y","y","y","-",
    "d",
    "A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A",
    "E","E","E","E","E","E","E","E","E","E","E",
    "I","I","I","I","I","-",
    "O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
    "U","U","U","U","U","U","U","U","U","U","U",
    "Y","Y","Y","Y","Y","-",
    "D");
    $csLatin= str_replace($vietnamese,$latin,$cs);
    return $csLatin;
    }
}

if (!function_exists('convertEnglish')){
    function convertEnglish($cs){
    $vietnamese=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
    "è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
    "ì","í","ị","ỉ","ĩ","-",
    "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
    "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
    "ỳ","ý","ỵ","ỷ","ỹ","-",
    "đ",
    "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
    "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
    "Ì","Í","Ị","Ỉ","Ĩ",
    "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
    "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
    "Ỳ","Ý","Ỵ","Ỷ","Ỹ","-",
    "Đ");
    $latin=array("a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a",
    "e","e","e","e","e","e","e","e","e","e","e",
    "i","i","i","i","i"," ",
    "o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o",
    "u","u","u","u","u","u","u","u","u","u","u",
    "y","y","y","y","y"," ",
    "d",
    "A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A",
    "E","E","E","E","E","E","E","E","E","E","E",
    "I","I","I","I","I"," ",
    "O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
    "U","U","U","U","U","U","U","U","U","U","U",
    "Y","Y","Y","Y","Y"," ",
    "D");
    $csLatin= str_replace($vietnamese,$latin,$cs);
    return $csLatin;
    }
}
if (!function_exists('xss_clean')){
    function xss_clean($data)
{
// Fix &entity\n;
$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

// Remove any attribute starting with "on" or xmlns
$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

// Remove javascript: and vbscript: protocols
$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

// Remove namespaced elements (we do not need them)
$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

do
{
    // Remove really unwanted tags
    $old_data = $data;
    $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
}
while ($old_data !== $data);

// we are done...
return $data;
}
}
if (!function_exists('abc')){
    function abc($data){
        return $data;
    }
}