<?php
/*-- Encode & Decode Serialized --*/


if( !function_exists('maybe_unserialize') )
{    
    function maybe_unserialize($original)
    {
        if (is_serialized($original))
            return @unserialize($original);
        return $original;
    }
}

if( !function_exists('decode_serialize') )
{    
    function decode_serialize ($original='')
    {
    	$arr = array();
    	$arr = maybe_unserialize($original);
    	if(!is_array($arr)) return false;
    	$out_array = array();
        foreach($arr as $key => $value){
            if(is_serialized($value)){
                $out_array[$key] = decode_serialize($value);
            }else {
                $out_array[$key] = urldecode($value);
            }
    	}
    	if(!is_array($out_array)) return false;
    	return $out_array;
    }
}

if( !function_exists('encode_serialize') )
{    
    function encode_serialize ($arr = array())
    {
    	if(!is_array($arr)) return false;
    	$out_array = array();
        foreach($arr as $key => $value){
            if(is_array($value)){
                $out_array[$key] = encode_serialize($value);
            }else {
                $out_array[$key] = urlencode($value);
            }
    	}
    	if(!is_array($out_array)) return false;
    	return serialize($out_array);
    }
}
/*-- End Encode & Decode Serialized --*/

/*-- Word Limiter --*/
if( !function_exists('word_limiter') )
{
	function word_limiter($str, $limit = 100, $end_char = '&#8230;')
	{
		if (trim($str) === '')
		{
			return $str;
		}

		preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);

		if (strlen($str) === strlen($matches[0]))
		{
			$end_char = '';
		}

		return rtrim($matches[0]).$end_char;
	}
}
/*-- End Word Limiter --*/

/*-- Section Title --*/
if( !function_exists('section_title') )
{  
    function section_title($title='',$create = '',$url = ''){
        $hc = '';
        if($create){
            $url = '<a href="'.$url.'" class="btn btn-primary">'.$create.'</a>';
            $hc = ' add-btn';
        }
        $html = '<div class="section-header'.$hc.'"><h1><span>'.$title.'</span>'.$url.'</h1></div>';
        return $html;
    }
}
/*-- End Section Title --*/

/*-- Add Product Category --*/
if( !function_exists('menuMulti') )
{    
    function menuMulti($data,$parent_id = 0,$str="---|",$select=0)
    {
    	foreach ($data as $val)
        {
    		$id = $val["term_id"];
    		$name = $val["name"];
    		if ($val["parent_id"] == $parent_id)
            {
    			if ($select != 0 && $id == $select)
                {
    				echo '<option value="'.$id.'" selected>'.$str." ".$name.'</option>';
    			}
                else
                {
    				echo '<option value="'.$id.'">'.$str." ".$name.'</option>';
    			}
    			menuMulti($data,$id,$str." ---|",$select);
    		}
    	}
    }
}
/*-- End Add Product Category --*/

/*-- Taxonomy Data --*/
if( !function_exists('taxonomy_data') )
{
    function taxonomy_data($data,$parent = 0,$str="",$level = false){
        $arr_data = array();
        $data_list = array();
        $arr = array();
        foreach ($data as $val)
        {
            $id = $val["term_id"];
            $name = $val["name"];
            $slug = $val["slug"];
            $count = $val["count"];
            if ($val["parent_id"] == $parent)
            {
                if($str){
                    $name = $str.$name;
                }
                $arr = array(
                    'term_id' => $id,
                    'name' => $name,
                    'slug' => $slug,
                    'count' => $count,
                    'parent_id' => $val["parent_id"],
                );
                array_push($arr_data,$arr);
                if($level){
                    $data_list = taxonomy_data($data,$id,$str."--- ",$level);
                    if($data_list){
                        $arr_data = array_merge($arr_data,$data_list);
                    }
                }
            }
        }
        return $arr_data;
    }
}
/*-- End Taxonomy Data --*/

/*-- Check Array Value --*/
if( !function_exists('arr_item') )
{
    function arr_item( &$var){
        if(isset($var))
            return $var;
        return '';
    }
}
/*-- End Check Array Value --*/

/*-- Edit Product Category --*/
if( !function_exists('listCate') )
{
    function listCate ($data,$parent = 0,$str="",$term_type = "product-category")
    {
        $objdata = array();
        $datalist = array();
        $arr = array();
        foreach ($data as $val)
        {
            $id = $val["term_id"];
            $name = $val["name"];
            $slug = $val["slug"];
            $count = $val["count"];
            if ($val["parent_id"] == $parent)
            {
                // echo '<tr>';
                // echo '<th class="table-check"><input type="checkbox" class="pcb" name="check[]" id="check[]" value="'.$id.'" /></th>';
                if($str){
                    $name = $str.$name;
                }
                // echo '<td class="table-title"><a href="'.url('admin/'.$term_type.'/edit/'.$id).'">'.$name.'</a></td>';
                // echo '<td>'.$slug.'</td>';
                // echo '<td><a href="">'.$count.'</a></td>';
                // echo '</tr>';
                $arr = array(
                    'term_id' => $id,
                    'name' => $name,
                    'slug' => $slug,
                    'count' => $count,
                    'parent_id' => $val["parent_id"]
                );
                array_push($objdata,$arr);
                $datalist = listCate($data,$id,$str."--- ",$term_type);
                if($datalist){
                    $objdata = array_merge($objdata,$datalist);
                }
            }
        }
        return $objdata;
    }
}
/*-- End Edit Product Category --*/

if( !function_exists('pagination') )
{
    function pagination($data=''){
        $data = $data->render();
        if($data)
            return '<div id="pagination">'.$data.'</div>';
    }
}
/*-- End Pagination --*/

/*-- Create Slug --*/
if(!function_exists('slug_create'))
 {
    function slug_create($term_type, $slug)
    {
       //$slug = str_slug($slug);
       $_slug=str_slug($slug);
       $_slugUndercore = $_slug.'-';
       $check=DB::table('qm_term')->where('term_type',$term_type)->where('slug',$_slug)->get();
       $i=1;
       while($check)
       {
           $_slug = $_slugUndercore.$i;
           $check=DB::table('qm_term')->where('slug',$_slug)->where('term_type',$term_type)->get();
           $i++;
       }
       return $_slug;

    }
}
/*-- End Create Slug --*/

/*-- Update Slug --*/
if(!function_exists('slug_update'))
 {
    function slug_update($term_type,$ID,$slug){
        $_slug=str_slug($slug);
        $_slugUndercore=$_slug.'-';
        $check=DB::table('qm_term')->where('slug',$_slug)->where('term_type',$term_type)->where('term_id','<>',$ID)->get();
        $i=1;
        while($check){
           $_slug=$_slugUndercore.$i;
           $check=DB::table('qm_term')->where('slug',$_slug)->where('term_type',$term_type)->where('term_id','<>',$ID)->get();
           $i++;
        }
        return $_slug;
    }
}
/*-- End Update Slug --*/

/*-- Get Children Id --*/
if( !function_exists('get_children_id') )
{    
    function get_children_id($term_type,$term_id)
     {
         $terms=DB::table('qm_term')->where('term_type',$term_type)->where('parent_id',$term_id)->get();
        
         if($terms)
         {
            $data=array();
            $array=array();
            foreach ($terms as $term)
            {
                $data[].=$term->term_id;
                $array = get_children_id($term_type,$term->term_id);  
                if($array)
                {
                    $data = array_merge($array,$data);
                }
                else
                {
                    $data = $data;
                } 
            }
            return $data;
         }
    }
}
/*-- End Get Children Id --*/

/*-- List Files --*/
if( !function_exists('list_files') )
{ 
    function list_files( $folder = '', $levels = 100 ) {
    	if ( empty($folder) )
    		return false;
    
    	if ( ! $levels )
    		return false;
    
    	$files = array();
    	if ( $dir = @opendir( $folder ) ) {
    	        while (($file = readdir( $dir ) ) !== false ) {
    	            if ( in_array($file, array('.', '..') ) )	                                
    	            	continue;
    	            if ( is_dir( $folder . '/' . $file ) ) {
    	                        $files2 = list_files( $folder . '/' . $file, $levels - 1);
    	                        if ( $files2 )
    	                                $files = array_merge($files, $files2 );
    	                    else
    	                           $files[] = $folder . '/' . $file . '/';
    	                } else {
    	                        $files[] = $folder . '/' . $file;
    	                }
    	        }
    	}
    	@closedir($dir);
    	return $files;
    }
}
/*-- End List Files --*/

/*-- Get Info --*/
if( !function_exists('get_info') )
{ 
    function get_info($path='',$tagName,$file='function.php')
    {
		$content = htmlentities(file_get_contents($path.$file));
        
		if(strpos($content, $tagName.':') !== false)
        {
			$content = explode($tagName.':',$content);
			$content = explode(PHP_EOL, $content[1]);
			$content = explode('*', $content[0]);
			$content = trim($content[0]);
            return $content;
		}
    }
}
/*-- End Get Info --*/

/*-- addTableLog --*/
if( !function_exists('addTableLog') )
{
    function addTableLog($model,$userID,$logType,$logAction,$dataID)
    {
        if($logAction == 'store'){
            $action = 'new';
            $status = 'publish';
        }
        else if($logAction == 'update'){
            $action = 'update';
            $status = 'publish';
        }else if($logAction == 'destroy'){
            $action = 'delete';
            $status = 'trash';
        }else{
            $action = 'login';
            $status = 'publish';
        }
        
        $arrDataID = explode(',',$dataID);
        
        $log = new $model();
        $log->user_id           = $userID;
        $log->post_id           = $arrDataID[0];
        $log->attachment_id     = $arrDataID[1];
        $log->order_code        = $arrDataID[2];
        $log->log_date          = time();
        $log->log_content       = null;
        $log->log_description   = null;
        $log->log_type          = 'log_'.$logType;
        $log->log_action        = $action;
        $log->log_status        = $status; 
        $log->save();
    }
}
/*-- End addTableLog --*/

/*-- Show Widget --*/
if( !function_exists('showWidget') )
{
    function showWidget($widgetName)
    {
        /*-- Sidebars Widget --*/
        $sidebarsWidget = decode_serialize(DB::table('qm_option')->where('option_name', 'sidebars_widget')->first()->option_value);
        /*-- End Sidebars Widget --*/
        
        $return = '';
        if( isset($sidebarsWidget[$widgetName]) && count($sidebarsWidget[$widgetName]) > 0 )
        {
            foreach( $sidebarsWidget[$widgetName] as $plugin )
            {
                require_once('system/plugins/'.$plugin.'/'.$plugin.'.php');
                $class = new $plugin;
                $return .= $class->run();
            }
        }
        return $return;
    }
}
/*-- End Show Widget --*/

/*-- navMenuRecursive && showMenuRecursive --*/
if( !function_exists('navMenuRecursive') )
{
    
    function navMenuRecursive($menu,&$strRec)
    {
        if(count($menu) > 0){
            $strRec .= "<ul>";
            foreach ($menu as $key => $value){
                 $value['title'] = '<a href="'.$value["url"].'">----|'.$value['title'].'</a>';
                 $strRec .= '<li>'.$value["title"];
                     if(!empty($value['sub_menu'])){
                         navMenuRecursive($value['sub_menu'],$strRec);
                     }
                 $strRec .= '</li>';
            }
            $strRec .= "</ul>";
        }
    }
}

if( !function_exists('showMenuRecursive') )
{
    function showMenuRecursive($menu)
    {
        $dataOptionsValue = DB::table('qm_option')->select('option_value')->where('option_name', 'nav_menu')->first();
        $arrayValue       = decode_serialize($dataOptionsValue->option_value);
        if(isset($arrayValue[$menu])){
            navMenuRecursive($arrayValue[$menu],$strRec);
            $strRec = str_replace("<ul></ul>", "", $strRec);
            echo $strRec;
        }
    }
}
/*-- End navMenuRecursive && showMenuRecursive --*/

/*-- Function timeAgo --*/
if( !function_exists('timeAgo') )
{
    function timeAgo($time_ago)
    {
        //$time_ago = strtotime($time_ago);
        $cur_time   = time();
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
        // Seconds
        if($seconds <= 60){
            return "$seconds giây trước";
        }
        //Minutes
        else if($minutes <=60){
             return "$minutes phút trước";
        }
        //Hours
        else if($hours <=24){
            return "$hours giờ trước";
        }
        //Days
        else if($days <= 7){
            return "$days ngày trước";
        }
        //Weeks
        else if($weeks <= 4.3){
            return "$weeks tuần trước";
        }
        //Months
        else if($months <=12){
            return "$months tháng trước";
        }
        //Years
        else{
            return "$years năm trước";
        }
    }
}
/*-- End Function timeAgo --*/

/*-- Category In Menu --*/
if( !function_exists('categoryInMenu') )
{
    function categoryInMenu($datas,$nameCheckbox="post_category",$parent=0,$str="")
    {
        foreach($datas as $data)
        {
            $id = $data->term_id;
            $name = $data->name;
            if ($data->parent_id == $parent)
            {
                if( $str ) $name = $str.$name;
                echo '<li><label><input type="checkbox" name="'.$nameCheckbox.'[]" value="'.$id.'">'.$name.'</label></li>';
                categoryInMenu($datas,$nameCheckbox,$id,$str."--- ");
            }
        }
    }
}
/*-- End Edit Product Category --*/
?>