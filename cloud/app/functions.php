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

if (!function_exists('callMenu')){
        function callMenu($data,$parent=0,$text="-",$select=0){
            foreach($data as $k=>$value){
                if($value['parent_id'] == $parent){
                    $id=$value['id'];
                    if($select != 0 && $id == $select){
                        echo "<option value='$value[id]' selected='selected'>".$text." ".$value['title']."</option>";
                    }else{
                        echo "<option value='$value[id]'>".$text." ".$value['title']."</option>";
                    }
                    unset($data[$k]);
                    callMenu($data,$id,$text."--",$select);
                }
            }
        }
}

if (!function_exists('listCategories')){
        function listCategories($data,$parent=0,$text="-",$select=0){
            if ($parent==0) {
               echo '<ul class="list-item" data-type="'.lang('categories').'">';
            }else{
                echo '<ul>';
            }
            
            foreach($data as $k=>$value){
                if($value['parent_id'] == $parent){
                    $id=$value['id'];
                    echo "<li><a data-title='".$value['title']."' data-alias='".$value['alias']."' data-id='".$value['id']."' href='#' data-link='".replaceAdmin(base_url().$value['alias'].'-c'.$value['id'].'.htm')."'>".$value['title']."</a></li>";
                    unset($data[$k]);
                    listCategories($data,$id,$text."--",$select);
                }
            }
            echo '</ul>';
        }
}


if (!function_exists('dequy')){
        function dequy($data,$parent=0,$text=0,$cate=array()){
            foreach($data as $k=>$value){
                if($value['parent_id'] == $parent){
                    $id = $value['id'];
                    if (isset($value['sort']) && $value['sort']!='') {
                           $sort = $value['sort'];
                    }else{
                        $sort=0;
                    }
                    if (!empty($cate)) {
                       $x = (in_array($id, $cate)) ? 'checked' : '';
                       echo '<li style="margin-left:'.$text.'px;" class="dd-item post-item closed" data-type="'.$value['type'].'" data-relatedid="6" data-title="'.$value['title'].'" data-sort="'.$sort.'" data-id="'.$id.'" data-url="'.$value['link'].'" data-iconfont="'.$value['icon_font'].'" data-class="'.$value['css_class'].'" data-parent="'.$value['parent_id'].'">
                                                                    <div class="dd-handle"></div>
                                                                    <div class="dd-content">
                                                                        <span class="text pull-left" data-update="title">'.'&nbsp;'.$value['title'].'</span>
                                                                        <span class="text pull-right">'.$value['type'].'</span>
                                                                        <a href="#" title="" class="show-item-details"><i class="fa fa-angle-down"></i></a>
                                                                        <div class="clearfix"></div>
                                                                    </div>

                                                                    <div class="item-details">

                                                                        <label class="pad-bot-5">
                                                                            <span class="text pad-top-5 dis-inline-block">'.lang('title').'</span>
                                                                            <input type="text" id="title" name="title" value="'.$value['title'].'" data-old="'.$value['title'].'" class="form-control"/>
                                                                        </label>

                                                                        <label class="pad-bot-5">
                                                                            <span class="text pad-top-5 dis-inline-block">'.lang('link').'</span>
                                                                            <input type="text" id="link" name="link" value="'.$value['link'].'" data-old="'.$value['link'].'" placeholder="http://" class="form-control"/>
                                                                        </label>

                                                                        <label class="pad-bot-5">
                                                                            <span class="text pad-top-5 dis-inline-block">'.lang('sort').'</span>
                                                                            <input type="number" id="sort" name="sort" value="'.$value['sort'].'" data-old="" class="form-control"/>
                                                                        </label>

                                                                        <label class="pad-bot-5">
                                                                            <span class="text pad-top-5 dis-inline-block">CSS class</span>
                                                                            <input type="text" id="css_class" name="class" value="" data-old="" class="form-control"/>
                                                                        </label>
                                                                        
                                                                        <div class="text-right button_update_menu">
                                                                            <a href="#" class="btn btn-info btn-sm">
                                                                                <i class="fa fa-retweet" aria-hidden="true"></i>&nbsp;
                                                                                '.lang('update').'</a>

                                                                            <a href="#" class="btn btn-danger btn-sm">
                                                                                <i class="fa fa-times" aria-hidden="true"></i>&nbsp;
                                                                                '.lang('remove').'</a>

                                                                            <a href="#" class="btn btn-success btn-sm">'.lang('cancel').'</a>
                                                                        </div>

                                                                    </div>




                                                                    
                                                                    <div class="clearfix"></div>
                                                                </li>';

                    }else{
                        echo '<li style="margin-left:'.$text.'px;" class="dd-item post-item closed" data-type="'.$value['type'].'" data-relatedid="6" data-title="'.$value['title'].'" data-sort="'.$sort.'" data-id="'.$id.'" data-url="'.$value['link'].'" data-iconfont="'.$value['icon_font'].'" data-class="'.$value['css_class'].'" data-parent="'.$value['parent_id'].'">
                                                                    <div class="dd-handle"></div>
                                                                    <div class="dd-content">
                                                                        <span class="text pull-left" data-update="title">'.'&nbsp;'.$value['title'].'</span>
                                                                        <span class="text pull-right">'.$value['type'].'</span>
                                                                        <a href="#" title="" class="show-item-details"><i class="fa fa-angle-down"></i></a>
                                                                        <div class="clearfix"></div>
                                                                    </div>

                                                                    <div class="item-details">

                                                                        <label class="pad-bot-5">
                                                                            <span class="text pad-top-5 dis-inline-block">'.lang('title').'</span>
                                                                            <input type="text" id="title" name="title" value="'.$value['title'].'" data-old="'.$value['title'].'" class="form-control"/>
                                                                        </label>

                                                                        <label class="pad-bot-5">
                                                                            <span class="text pad-top-5 dis-inline-block">'.lang('link').'</span>
                                                                            <input type="text" id="link" name="link" value="'.$value['link'].'" data-old="'.$value['link'].'" placeholder="http://" class="form-control"/>
                                                                        </label>

                                                                        <label class="pad-bot-5">
                                                                            <span class="text pad-top-5 dis-inline-block">'.lang('sort').'</span>
                                                                            <input type="number" id="sort" name="sort" value="'.$value['sort'].'" data-old="" class="form-control"/>
                                                                        </label>

                                                                        <label class="pad-bot-5">
                                                                            <span class="text pad-top-5 dis-inline-block">CSS class</span>
                                                                            <input type="text" id="css_class" name="class" value="" data-old="" class="form-control"/>
                                                                        </label>
                                                                        
                                                                        <div class="text-right button_update_menu">
                                                                            <a href="#" class="btn btn-info btn-sm update_menu">
                                                                                <i class="fa fa-retweet" aria-hidden="true"></i>&nbsp;
                                                                                '.lang('update').'</a>

                                                                            <a href="#" class="btn btn-danger btn-sm remove_menu">
                                                                                <i class="fa fa-times" aria-hidden="true"></i>&nbsp;
                                                                                '.lang('remove').'</a>

                                                                            <a href="#" class="btn btn-success btn-sm cancel_menu">'.lang('cancel').'</a>
                                                                        </div>

                                                                    </div>




                                                                    
                                                                    <div class="clearfix"></div>
                                                                </li>';
                    }
                    
                    unset($data[$k]);
                    dequy($data,$id,$text+20,$cate);
                }
            }
        }
}

if (!function_exists('slowerDateAnalytics')){
        function slowerDateAnalytics($str){
            $strlen = strlen(trim($str));
            for( $i = 0; $i <= $strlen; $i++ ) {
                $array[] = substr($str,$i,1);
                // $char contains the current character, so do your processing here
            }
            $formatDay ="";
            $formatHour="";
            foreach ($array as $key => $value) {
                switch ($key) {
                    case 3:
                        $formatDay .= $value."-";
                        break;
                    case 5:
                        $formatDay .= $value."-";
                        break;
                    case 8:
                        $formatHour .= $value;
                        break;
                    case 9:
                        $formatHour .= $value;
                        break;
                    case 10:
                        $formatHour .= $value;
                        break;
                    default:
                        $formatDay .= $value;
                        break;
                }
            }
            return $formatHour. "h - " . date("d/m/Y", strtotime($formatDay));
        } 
}


if (!function_exists('remove_duplicate_values_array')){
    function remove_duplicate_values_array($arr_merge){
        $count_array = count($arr_merge);
        for ($i = 0; $i < $count_array; $i++) {
            if (isset($arr_merge[$i])) {
                for ($j = $i+1; $j < $count_array; $j++) {
                    if (isset($arr_merge[$j])) {
                        //this is where you do your comparison for dupes
                        if ($arr_merge[$i]['id'] == $arr_merge[$j]['id']) {
                            unset($arr_merge[$j]);
                        }
                    }
                }
            }
        }
        return $arr_merge;
    }
}




/*function __autoload($class){
		$paths = explode(PATH_SEPARATOR, get_include_path());
		$class = str_replace("_","/",$class);
		$file = strtolower(str_replace("\\", DIRECTORY_SEPARATOR, trim($class,"\\"))).".php";
		foreach ($paths as $key => $value) {
			$combited = $value.DIRECTORY_SEPARATOR.$file;
			if (file_exists($combited)) {
				echo $combited;die;
				include($combited);
			}else{
				throw new Exception("Not found $class."); 
			}
		}
}*/
