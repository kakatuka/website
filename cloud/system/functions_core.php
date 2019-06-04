<?php 

if (!function_exists('db_connect')){
        function db_connect($_mod=null){
        	global $_LNC,$_web;
        	if($_mod == null){
        		$_web['db'] = new MysqliDb ($_LNC['db_host'], $_LNC['db_user'], $_LNC['db_password'], $_LNC['db_name'],$_LNC['db_charset'],$_LNC['db_port']) ;
        	}
        }
}

if (!function_exists('lang')){
        function lang($key) {
        	global $_L; 
        	if(isset($_L[$key])) {
        		$result = $_L[$key];
        	}else {
        		$result = "Chưa tồn tại ngôn ngữ để hiển thị.";
        	}
        	return $result;
        }
}

if (!function_exists('base_url')){
        function base_url(){
        	global $_web;
        	return $_web['base_url'];
        }
}

if (!function_exists('redirect')){
        function redirect($url){
            if ($url=='current') {
                header("Refresh: 0");
                exit;
            }else{
                header("location: $url");
                exit;
            }
        	
        }
}

if (!function_exists('replaceAdmin')){
        function replaceAdmin($link=null){
            if ($link!=null) {
                return str_replace("/cadmin/", "/", $link);
            }
        }
}

if (!function_exists('covertMoney')){
        function covertMoney($number){
            if ($number!=null) {
                return number_format($number,0,'','.');
            }
        }
}

if (!function_exists('Image')){
        function Image($url_root,$url,$width,$height,$action){
            return $url_root.'tmp/public/plugins/image_tools/timthumb.php?src='.$url.'&h='.$height.'&w='.$width.'&zc='.$action;
        }
}




/**
 * getIp()
 * @return $ip
 */
if (!function_exists('getIp')){
        function getIp() {
            $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
            foreach ($ip_keys as $key) {
                if (array_key_exists($key, $_SERVER) === true) {
                    foreach (explode(',', $_SERVER[$key]) as $ip) {
                        // trim for safety measures
                        $ip = trim($ip);
                        // attempt to validate IP
                        if (validateIp($ip)) {
                            return $ip;
                        }
                    }
                }
            }
         
            return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
        }
}

if (!function_exists('validateIp')){
        function validateIp($ip){
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
                return false;
            }
            return true;
        }
}

if (!function_exists('base64url_encode')){
        function base64url_encode($data) { 
          return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
        } 
}

if (!function_exists('base64url_decode')){
        function base64url_decode($data) { 
          return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
        }
}



/**
 * @return chuỗi tiếng việt không dấu
 */
if (!function_exists('strU')){
        function strU($str){
            $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
            $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
            $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
            $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
            $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
            $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
            $str = preg_replace("/(đ)/", 'd', $str);
            $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
            $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
            $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
            $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
            $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
            $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
            $str = preg_replace("/(Đ)/", 'D', $str);
            $str = preg_replace("/[^A-Za-z0-9 ]/", ' ', $str);
            $str = preg_replace("/\s+/", ' ', $str);
            $str = trim($str);
            return $str;
        }
}
/**
 * @return link SEO
 */

if (!function_exists('alias')){
        function alias($str){
            $str = strU($str);
            $str = strtolower($str);    
            $str = str_replace(' ', '-', $str);
            $str = str_replace('~', '', $str);
            $str = str_replace('{', '', $str);
            $str = str_replace('}', '', $str);
            $str = str_replace('[', '', $str);
            $str = str_replace(']', '', $str);
            $str = str_replace(':', '', $str);
            $str = str_replace('\'', '', $str);
            $str = str_replace('\\', '', $str);
            $str = str_replace('(', '', $str);
            $str = str_replace(')', '', $str);
            $str = str_replace('*', '', $str);
            $str = str_replace('&', '', $str);
            $str = str_replace('^', '', $str);
            $str = str_replace('%', '', $str);
            $str = str_replace('$', '', $str);
            $str = str_replace('#', '', $str);
            $str = str_replace('@', '', $str);
            $str = str_replace('!', '', $str);
            $str = str_replace('`', '', $str);
            $str = str_replace('.', '', $str);
            $str = str_replace(' ', '-', $str);
            return $str;
        }
}

if (!function_exists('recursiveMenu')){
        function recursiveMenu($data,$parent=0){
            if (isset($data[$parent])) {
                if ($parent==0) {
                    echo "<ul class='nav navbar-nav navbar-right'>";
                }else{
                    echo "<ul class='dropdown-menu'>";
                }
                foreach ($data[$parent] as $k=>$value) {
                        $id=$value['id'];
                        if (isset($data[$id])) {
                            echo "<li class='dropdown'>";
                        }else{
                            echo "<li>";
                        }
                        if (isset($data[$id])) {
                            echo "<a href='".$value['link']."' class='dropdown-toggle' data-toggle='dropdown'>".$value['title']."&nbsp;<b class='caret'></b></a>";
                        }else{
                            echo "<a href='".$value['link']."'>".$value['title']."</a>";
                        }
                        unset($data[$k]);
                        recursiveMenu($data,$id);
                    echo "</li>";
                }
                echo "</ul>";
            }
            
        }
}

if (!function_exists('createCaptcha')){
        function createCaptcha(){
            $ranStr = getRandomWord();
            $_SESSION["captcha"] = strtolower($ranStr);


            $height = 35; //CAPTCHA image height
            $width = 150; //CAPTCHA image width
            $font_size = 24; 

            $image_p   = imagecreate($width, $height);
            $graybg    = imagecolorallocate($image_p, 245, 245, 245);
            $textcolor = imagecolorallocate($image_p, 34, 34, 34);
            header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            ob_start("callback"); 
            // $debugLog = ob_get_contents(); 
            ob_end_clean();
            //send image to browser
            header ("Content-type: image/gif");
            imagefttext($image_p, $font_size, -2, 15, 26, $textcolor, DIR_PUBLIC.'root/fonts/mono.ttf', $ranStr);
            //imagestring($image_p, $font_size, 5, 3, $ranStr, $white);
            imagepng($image_p);
            

        }
}

if (!function_exists('checkCaptcha')){
        function checkCaptcha($cap){
            if ($_SESSION['captcha'] == strtolower($cap)) {
                return true;
            }else {
                return false;
            }

        }
}

// Upload File Image
if (!function_exists('getImagesToFolder')){
        function getImagesToFolder($dir){
            $ImagesArray = [];
            $file_display = [ 'jpg', 'jpeg', 'png', 'gif','ico'];

            if (file_exists($dir) == false) {
                return ["Directory \'', $dir, '\' not found!"];
            } 
            else {
                $dir_contents = scandir($dir);
                foreach ($dir_contents as $file) {
                    $file_type = pathinfo($file, PATHINFO_EXTENSION);
                    if (in_array($file_type, $file_display) == true) {
                        $ImagesArray[] = $file;
                    }
                }
                return $ImagesArray;
            }
        }
}

if (!function_exists('listAllFolder')){
        function listAllFolder($dir){
            $root          = DIR_CDN;
            $html='';
            $results_folder = scandir($dir);
            $arrDir = array();
            foreach ($results_folder as $value) {
                if($value=='.' || $value=='..' ){
                    //
                }else{
                    if (is_dir($dir.$value)) {
                        $arrDir[] = $value;
                    }
                }
            }
            //dd($dir);
            $ImagesA = getImagesToFolder($dir);
            $folder_recursive = array_merge_recursive($arrDir,$ImagesA);
                        $html .= "<input type='hidden' id='directory' name='directory' value='".$dir."' />";
                        if ($dir!=$root) {
                            $html .= "<div class='media-back' id='back_folder' data-folder='false'>";
                            $html .= "<img class='img-folder-media' src='".base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url()."tmp/public/images/backfolder.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            $html .= "</div>";
                        }
            if (!empty($folder_recursive)) {
                        
                foreach ($folder_recursive as $key => $value) {
                    $current = "";
                    if ($dir!=$root) {
                        $current = str_replace($root,"",$dir);
                        
                    }
                      if (is_dir($dir.$value)) {
                            $html .= "<div class='media-col' data-folder='".$value."'>";
                            $html .= "<img class='img-folder-media' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/folder2.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            $html .= "<div class='text-center'>".$value."</div>";
                            $html .= "<div class='text-center overcontrol'>
                                    <a href='javascript:void(0)' class='rename' data-title='".$value."'><i class='fa fa-font' aria-hidden='true'></i></a>
                                    <a href='javascript:void(0)' class='delete' data-title='".$value."'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                                    </div>";
                            $html .= "</div>";
                        }else{
                            $html .= "<div class='media-col' data-folder='false'>";
                            $html .= "<div class='overflow'><a class='fancybox' href='".base_url()."cdn/".$current.$value."'><i class='demo-icon icon-eye'>&#xe801;</i></a></div>";
                            

                            $tmp = explode('.', $value);
                            $ext = end($tmp);
                            if ($ext=='ico') {
                                $html .= "<img class='img-folder-media' src='".base_url()."cdn/".$current.$value."' width='150' height='100'/>";
                            }else{
                                $html .= "<img class='img-folder-media' src='".base_url().'timthumb.php?src='.base_url()."cdn/".$current.$value."&h=100&w=150&zc=2' width='150' height='100'/>";
                            }
                            
                            $html .= "<div class='text-center'>".$value."</div>";
                            $html .= "<div class='text-center overcontrol'>
                                    <a href='javascript:void(0)' class='rename' data-title='".$value."'><i class='fa fa-font' aria-hidden='true'></i></a>
                                    <a href='javascript:void(0)' class='delete' data-title='".$value."'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                                    </div>";
                            $html .= "</div>";
                        }
                 }
            }else{
                $html .= '<br/><br/><p class="text-center">Empty Folder</p>';
            }
            return $html;
        }
}

//

if (!function_exists('listAllFolderChooseImage')){
        function listAllFolderChooseImage($dir){
            $root          = DIR_CDN;
            $html='';
            $results_folder = scandir($dir);
            $arrDir = array();
            foreach ($results_folder as $value) {
                if($value=='.' || $value=='..' ){
                    //
                }else{
                    if (is_dir($dir.$value)) {
                        $arrDir[] = $value;
                    }
                }
            }
            //dd($dir);
            $ImagesA = getImagesToFolder($dir);
            $folder_recursive = array_merge_recursive($arrDir,$ImagesA);
                        $html .= "<input type='hidden' id='directory' name='directory' value='".$dir."' />";
                        if ($dir!=$root) {
                            $html .= "<div class='media-back' id='back_folder' data-folder='false'>";
                            $html .= "<img class='img-folder-media' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/backfolder.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            $html .= "</div>";
                        }
            if (!empty($folder_recursive)) {
                        
                foreach ($folder_recursive as $key => $value) {
                        $current = "";
                        if ($dir!=$root) {
                            $current = str_replace($root,"",$dir);
                        
                        }
                      if (is_dir($dir.$value)) {
                            $html .= "<div class='media-col' data-folder='".$value."'>";
                            $html .= "<img class='img-folder-media' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/folder2.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            $html .= "<div class='text-center'>".$value."</div>";
                            $html .= "<div class='text-center overcontrol'>
                                    </div>";
                            $html .= "</div>";
                        }else{
                            

                            $html .= "<div class='media-col' data-folder='false'>";

                            $tmp = explode('.', $value);
                            $ext = end($tmp);
                            if ($ext=='ico') {
                                $html .="<img class='img-load-folder' data-src='".$current.$value."' src='".base_url().'cdn/'.$current.$value."' width='150' height='100' data-folder='false'/>";
                            }else{
                                $html .="<img class='img-load-folder' data-src='".$current.$value."' src='".base_url().'timthumb.php?src='.base_url().'cdn/'.$current.$value."&h=100&w=150&zc=2' width='150' height='100' data-folder='false'/>";
                            }


                            
                            $html .= "<div class='text-center'>".$value."</div>";
                            $html .= "</div>";
                        }
                 }
            }else{
                $html .= '<br/><br/><p class="text-center">Empty Folder</p>';
            }
            return $html;
        }
}

if (!function_exists('copy_directory')){
        function copy_directory($src,$dst) {
                $dir = opendir($src);
                @mkdir($dst);
                while(false !== ( $file = readdir($dir)) ) {
                    if (( $file != '.' ) && ( $file != '..' )) {
                        if ( is_dir($src . '/' . $file) ) {
                            copy_directory($src . '/' . $file,$dst . '/' . $file);
                        }
                        else {
                            copy($src . '/' . $file,$dst . '/' . $file);
                        }
                    }
                }
                closedir($dir);
        }
}

if (!function_exists('delete_dir')){
        function delete_dir($src) { 
                $dir = opendir($src);
                while(false !== ( $file = readdir($dir)) ) { 
                    if (( $file != '.' ) && ( $file != '..' )) { 
                        if ( is_dir($src . '/' . $file) ) { 
                            delete_dir($src . '/' . $file); 
                        } 
                        else { 
                            unlink($src . '/' . $file); 
                        } 
                    } 
                } 
                closedir($dir); 
                rmdir($src);
        }
}
// End upload Image

//Upload File
if (!function_exists('getFilesToFolder')){
        function getFilesToFolder($dir){
            $FileArray = [];
            $file_display = ['pdf','txt','doc','docx','xlsx','xls','pptx','pot','zip','rar'];

            if (file_exists($dir) == false) {
                // dd($dir);
                return ["Directory \'', $dir, '\' not found!"];
            } 
            else {
                $dir_contents = scandir($dir);
                foreach ($dir_contents as $file) {
                    $file_type = pathinfo($file, PATHINFO_EXTENSION);
                    if (in_array($file_type, $file_display) == true) {
                        $FileArray[] = $file;
                    }
                }
                return $FileArray;
            }
        }
}

if (!function_exists('listAllFolderFile')){
        function listAllFolderFile($dir){
            $root          = DIR_FILES;
            $html='';
            $results_folder = scandir($dir);
            $arrDir = array();
            foreach ($results_folder as $value) {
                if($value=='.' || $value=='..' ){
                    //
                }else{
                    if (is_dir($dir.$value)) {
                        $arrDir[] = $value;
                    }
                }
            }
            //dd($dir);
            $FileA = getFilesToFolder($dir);
            $folder_recursive = array_merge_recursive($arrDir,$FileA);
                        $html .= "<input type='hidden' id='directory' name='directory' value='".$dir."' />";
                        if ($dir!=$root) {
                            $html .= "<div class='media-back' id='back_folder_file' data-folder='false'>";
                            $html .= "<img class='img-folder-media' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/backfolder.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            $html .= "</div>";
                        }
            if (!empty($folder_recursive)) {
                        
                foreach ($folder_recursive as $key => $value) {
                    $current = "";
                    if ($dir!=$root) {
                        $current = str_replace($root,"",$dir);
                        
                    }
                      if (is_dir($dir.$value)) {
                            $html .= "<div class='media-col' data-folder='".$value."'>";
                            $html .= "<img class='img-folder-media' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/folder2.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            $html .= "<div class='text-center'>".$value."</div>";
                            $html .= "<div class='text-center overcontrol'>
                                    <a href='javascript:void(0)' class='rename' data-title='".$value."'><i class='fa fa-font' aria-hidden='true'></i></a>
                                    <a href='javascript:void(0)' class='delete' data-title='".$value."'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                                    </div>";
                            $html .= "</div>";
                        }else{
                            $html .= "<div class='media-col' data-folder='false'>";
                            $html .= "<div class='overflow'><a class='fancybox' href='".base_url()."files/".$current.$value."'><i class='demo-icon icon-eye'>&#xe801;</i></a></div>";
                            

                            $tmp = explode('.', $value);
                            $ext = end($tmp);
                            if ($ext=='ico') {
                                $html .= "<img class='img-load-folder' alt='".$current.$value."' src='".base_url()."files/".$current.$value."' width='150' height='100'/>";
                            }else if($ext=='pdf'){
                                $html .= "<img class='img-load-folder' alt='".$current.$value."' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/img-pdf.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            }else if($ext=='docx' || $ext=='doc'){
                                $html .= "<img class='img-load-folder' alt='".$current.$value."' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/img-doc.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            }else if($ext=='exc' || $ext=='doc'){
                                $html .= "<img class='img-load-folder' alt='".$current.$value."' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/img-doc.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            }else if($ext=='xlsx' || $ext=='xls'){
                                $html .= "<img class='img-load-folder' alt='".$current.$value."' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/img-xls.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            }else if($ext=='pptx' || $ext=='pot'){
                                $html .= "<img class='img-load-folder' alt='".$current.$value."' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/img-ppt.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            }else if($ext=='zip'){
                                $html .= "<img class='img-load-folder' alt='".$current.$value."' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/zip.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            }else if($ext=='rar'){
                                $html .= "<img class='img-load-folder' alt='".$current.$value."' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/rar.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            }else{
                                $html .= "<img class='img-load-folder' alt='".$current.$value."' src='".base_url().'timthumb.php?src='.base_url()."tmp/files/".$current.$value."&h=100&w=150&zc=2' width='150' height='100'/>";
                            }




                            
                            $html .= "<div class='text-center'>".$value."</div>";
                            $html .= "<div class='text-center overcontrol'>
                                    <a href='javascript:void(0)' class='rename' data-title='".$value."'><i class='fa fa-font' aria-hidden='true'></i></a>
                                    <a href='javascript:void(0)' class='delete' data-title='".$value."'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                                    </div>";
                            $html .= "</div>";
                        }
                 }
            }else{
                $html .= '<br/><br/><p class="text-center">Thư mục trống</p>';
            }
            return $html;
        }
}

//

if (!function_exists('listAllFolderChooseFile')){
        function listAllFolderChooseFile($dir){
            $root          = DIR_FILES;
            $html='';
            $results_folder = scandir($dir);
            $arrDir = array();
            foreach ($results_folder as $value) {
                if($value=='.' || $value=='..' ){
                    //
                }else{
                    if (is_dir($dir.$value)) {
                        $arrDir[] = $value;
                    }
                }
            }
            //dd($dir);
            $FileA = getFilesToFolder($dir);
            $folder_recursive = array_merge_recursive($arrDir,$FileA);
                        $html .= "<input type='hidden' id='directory' name='directory' value='".$dir."' />";
                        if ($dir!=$root) {
                            $html .= "<div class='media-back' id='back_folder_file' data-folder='false'>";
                            $html .= "<img class='img-folder-media' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/backfolder.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            $html .= "</div>";
                        }
            if (!empty($folder_recursive)) {
                        
                foreach ($folder_recursive as $key => $value) {
                        $current = "";
                        if ($dir!=$root) {
                            $current = str_replace($root,"",$dir);
                        
                        }
                      if (is_dir($dir.$value)) {
                            $html .= "<div class='media-col' data-folder='".$value."'>";
                            $html .= "<img class='img-folder-media' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/folder2.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            $html .= "<div class='text-center'>".$value."</div>";
                            $html .= "<div class='text-center overcontrol'>
                                    </div>";
                            $html .= "</div>";
                        }else{
                            

                            $html .= "<div class='media-col' data-folder='false'>";

                            $tmp = explode('.', $value);
                            $ext = end($tmp);
                            if ($ext=='ico') {
                                $html .= "<img class='img-load-folder' data-src='".$current.$value."' src='".base_url()."files/".$current.$value."' width='150' height='100'/>";
                            }else if($ext=='pdf'){
                                $html .= "<img class='img-load-folder' data-src='".$current.$value."' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/img-pdf.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            }else if($ext=='docx' || $ext=='doc'){
                                $html .= "<img class='img-load-folder' data-src='".$current.$value."' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/img-doc.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            }else if($ext=='exc' || $ext=='doc'){
                                $html .= "<img class='img-load-folder' data-src='".$current.$value."' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/img-doc.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            }else if($ext=='xlsx' || $ext=='xls'){
                                $html .= "<img class='img-load-folder' data-src='".$current.$value."' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/img-xls.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            }else if($ext=='pptx' || $ext=='pot'){
                                $html .= "<img class='img-load-folder' data-src='".$current.$value."' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/img-ppt.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            }else if($ext=='zip'){
                                $html .= "<img class='img-load-folder' alt='".$current.$value."' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/zip.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            }else if($ext=='rar'){
                                $html .= "<img class='img-load-folder' alt='".$current.$value."' src='".base_url().'timthumb.php?src='.base_url()."tmp/public/images/rar.png&h=100&w=150&zc=2' width='150' height='100'/>";
                            }else{
                                $html .= "<img class='img-load-folder' data-src='".$current.$value."' alt='".$value."' src='".base_url().'timthumb.php?src='.base_url()."files/".$current.$value."&h=100&w=150&zc=2' width='150' height='100'/>";
                            }


                            
                            $html .= "<div class='text-center'>".$value."</div>";
                            $html .= "</div>";
                        }
                 }
            }else{
                $html .= '<br/><br/><p class="text-center">Thư mục trống</p>';
            }
            return $html;
        }
}
// End uploadfile


