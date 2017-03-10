<?php
require_once(__DIR__.'/backend/config.php');
require_once(__DIR__.'/backend/general.php');
require_once(__DIR__.'/backend/taxonomy.php');
require_once(__DIR__.'/frontend/post.php');
require_once(__DIR__.'/frontend/product.php');
require_once(__DIR__.'/backend/product.php');
require_once(__DIR__.'/backend/attachment.php');


if( !function_exists('navigation_load') )
{   
    function navigation_load($menu_data = array()){
        $html = '';
        if(count($menu_data)){
            $i = 3600;
            foreach ($menu_data as $val)
            {   
                $menu_id = time()-$i;
                //$menu_id = mt_rand(1,9999);
                $url = '';
                $sub_menu = ( isset($val['sub_menu']) ) ? $val['sub_menu'] : '';
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$val['url'])) {

                }else {
                    $url = '<div class="form-group"><input type="text" class="form-control" data-type="url" value="'.$val['url'].'" /></div>';
                }
                $html .= '<li id="menu-item-'.$menu_id.'" data-url="'.$val['url'].'" data-title="'.$val['title'].'" class="menu-edit-inactive menu-item"><div class="menu-item-bar"><div class="menu-item-handle"><span class="item-title"><span class="menu-item-title">'.$val['title'].'</span></span><span class="item-controls"><i data-id="'.$menu_id.'" class="btn-edit font-icon material-icons">arrow_drop_down</i></span><div id="menu-item-settings-'.$menu_id.'" class="menu-item-settings" style="display: none;"><div class="form-group"><input type="text" class="form-control" data-type="title" value="'.$val['title'].'" /></div>'.$url.'<button type="button" class="btn btn-link btn-remove text-danger p-a-0" data-id="'.$menu_id.'">Xóa mục</button></div></div></div>';
                if($sub_menu){
                    $html .= '<ol>';
                    $html .= navigation_load($sub_menu);
                    $html .= '</ol>';
                }
                $html .= '</li>';
                $i--;
            }
        }
        return $html;
    }
}


/*-- Add Product Category --*/
// if( !function_exists('taxonomy_list') )
// {    
//     function taxonomy_list($data,$parent_id=0,$str="",$select=0)
//     {
//         foreach ($data as $val)
//         {
//             $id = $val["taxonomy_id"];
//             $name = $val["taxonomy_name"];
//             if ($val["parent_id"] == $parent_id)
//             {
//                 if ($select != 0 && $id == $select)
//                 {
//                     echo '<option value="'.$id.'" selected>'.$str." ".$name.'</option>';
//                 }
//                 else
//                 {
//                     echo '<option value="'.$id.'">'.$str." ".$name.'</option>';
//                 }
//                 menuMulti($data,$id,$str."-- ",$select);
//             }
//         }
//     }
// }
/*-- End Add Product Category --*/

/*-- Add Product Category --*/
// if( !function_exists('menuMulti') )
// {    
//     function menuMulti($data,$parent_id=0,$str="",$select=0)
//     {
//     	foreach ($data as $val)
//         {
//     		$id = $val["term_id"];
//     		$name = $val["name"];
//     		if ($val["parent_id"] == $parent_id)
//             {
//     			if ($select != 0 && $id == $select)
//                 {
//     				echo '<option value="'.$id.'" selected>'.$str." ".$name.'</option>';
//     			}
//                 else
//                 {
//     				echo '<option value="'.$id.'">'.$str." ".$name.'</option>';
//     			}
//     			menuMulti($data,$id,$str."-- ",$select);
//     		}
//     	}
//     }
// }
/*-- End Add Product Category --*/

/*-- Taxonomy Data --*/
// if( !function_exists('taxonomy_data') )
// {
//     function taxonomy_data($data,$parent = 0,$str="",$level = false){
//         $arr_data = array();
//         $data_list = array();
//         $arr = array();

//         foreach ($data as $val)
//         {
//             $id = $val["taxonomy_id"];
//             $name = $val["taxonomy_name"];
//             $slug = $val["taxonomy_slug"];
//             $count = $val["taxonomy_count"];
//             if ($val["taxonomy_parent"] == $parent)
//             {
//                 if($str){
//                     $name = $str.$name;
//                 }
//                 $arr = array(
//                     'taxonomy_id' => $id,
//                     'taxonomy_name' => $name,
//                     'taxonomy_slug' => $slug,
//                     'taxonomy_count' => $count,
//                     'taxonomy_parent' => $val["parent_id"],
//                 );
//                 array_push($arr_data,$arr);
//                 if($level){
//                     $data_list = taxonomy_data($data,$id,$str."--- ",$level);
//                     if($data_list){
//                         $arr_data = array_merge($arr_data,$data_list);
//                     }
//                 }
//             }
//         }
//         return $arr_data;
//     }
// }
/*-- End Taxonomy Data --*/

/*-- Taxonomy Data 2 --*/
// if( !function_exists('taxonomy_data_2') )
// {
//     function taxonomy_data_2($data){
//         $arr_data = array();

//         foreach ($data as $val)
//         {
//             $id = $val["term_id"];
//             $name = $val["name"];
//             $slug = $val["slug"];
//             $count = $val["count"];
//             $parent_id = $val["parent_id"];

//             $arr = array(
//                 'term_id' => $id,
//                 'name' => $name,
//                 'slug' => $slug,
//                 'count' => $count,
//                 'parent_id' => $val["parent_id"],
//             );
//             array_push($arr_data,$arr);
//         }
//         return $arr_data;
//     }
// }
/*-- End Taxonomy Data 2 --*/

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
/*
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
*/

/*-- End Edit Product Category --*/

if( !function_exists('respones_redirect') )
{
    function respones_redirect($type= '', $url='',$message = ''){
        if($type == 'ajax' && $message){
            return $message;
        }else if($url){
            return redirect($url);
        }
    }
}
/*-- End Pagination --*/

/*-- End Edit Product Category --*/



/*-- Create Slug --*/
// if(!function_exists('slug_create'))
//  {
//     function slug_create($term_type, $slug)
//     {
//        $_slug = str_slug($slug);
//        $_slugUndercore = $_slug.'-';
//        $check = DB::table('qm_taxonomy')->where('taxonomy_type',$term_type)->where('taxonomy_slug',$_slug)->get();
//        $i=1;
//        while(count($check) > 0)
//        {
//            $_slug = $_slugUndercore.$i;
//            $check = DB::table('qm_taxonomy')->where('taxonomy_slug',$_slug)->where('taxonomy_type',$term_type)->get();
//            $i++;
//        }
//        return $_slug;

//     }
// }
/*-- End Create Slug --*/

/*-- Update Slug --*/
// if(!function_exists('slug_update'))
//  {
//     function slug_update($term_type,$ID,$slug)
//     {
//         $_slug = str_slug($slug);
//         $_slugUndercore = $_slug.'-';
//         $check = DB::table('qm_taxonomy')->where('taxonomy_slug',$_slug)->where('taxonomy_type',$term_type)->where('taxonomy_id','<>',$ID)->get();
//         $i=1;
//         while(count($check) > 0){
//            $_slug=$_slugUndercore.$i;
//            $check=DB::table('qm_taxonomy')->where('taxonomy_slug',$_slug)->where('taxonomy_type',$term_type)->where('taxonomy_id','<>',$ID)->get();
//            $i++;
//         }
//         return $_slug;
//     }
// }
/*-- End Update Slug --*/

/*-- Get Children Id --*/
// if( !function_exists('get_children_id') )
// {    
//     function get_children_id($term_type,$term_id)
//      {
//          $terms=DB::table('qm_taxonomy')->where('taxonomy_type',$term_type)->where('taxonomy_parent',$term_id)->get();
        
//          if($terms)
//          {
//             $data=array();
//             $array=array();
//             foreach ($terms as $term)
//             {
//                 $data[].=$term->taxonomy_id;
//                 $array = get_children_id($term_type,$term->taxonomy_id);  
//                 if($array)
//                 {
//                     $data = array_merge($array,$data);
//                 }
//                 else
//                 {
//                     $data = $data;
//                 } 
//             }
//             return $data;
//          }
//     }
// }
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
        $active_template = DB::table('qm_option')->where('option_name', 'active_template')->first()->option_value;
        
        $return = '';
        require_once('system/application/views/frontend/'.$active_template.'/function.php');
        $resgisterWidget = resgisterWidget();
        $widgets = [];
        foreach( $resgisterWidget as $widget )
        {
            $widgets[] = $widget['name'];
        }
        //echo $widgetName;
        if( isset($sidebarsWidget[$widgetName]) && count($sidebarsWidget[$widgetName]) > 0 && in_array($widgetName,$widgets) )
        {
            foreach( $sidebarsWidget[$widgetName] as $order => $plugin )
            {
                $data = [];
                $pluginOption = DB::table('qm_option')->where('option_name','widget_'.$plugin)->first();

                if( $pluginOption != null )
                {
                    $optionValue = decode_serialize(DB::table('qm_option')->where('option_name','widget_'.$plugin)->first()->option_value);

                    if( isset($optionValue[$widgetName][$order]) )
                    {
                        $data = $optionValue[$widgetName][$order];
                    }
                    
                }

                // require_once('system/plugins/'.$plugin.'/'.$plugin.'.php');
                // $class = new $plugin;
                // $return .= $class->run($data);

                $folderPlugin = $plugin;
                $fileNamePlugin = '';
                $filesPlugin = list_files('system/plugins/'.$folderPlugin,1);
                foreach( $filesPlugin as $directoryFile  )
                {
                    
                    $file = str_replace('system/plugins/'.$folderPlugin.'/','',$directoryFile);
                    $info = get_info('system/plugins/'.$folderPlugin.'/','Plugin Name',$file);
                    if( $info !== null && strlen($info) > 0 )
                    {
                        $fileNamePlugin = str_replace('.php','',$file);
                        break;
                    }
                }
                require_once('system/plugins/'.$folderPlugin.'/'.$fileNamePlugin.'.php');
                $class = new $folderPlugin;
                $return .= $class->run($data);
            }
        }
        return $return;
    }
}
/*-- End Show Widget --*/

/*-- navMenuRecursive && showMenuRecursive --*/
//if( !function_exists('navMenuRecursive') )
//{
//    
//    function navMenuRecursive($menu,&$strRec)
//    {
//        if(count($menu) > 0){
//            $strRec .= "<ul>";
//            foreach ($menu as $key => $value){
//                 $value['title'] = '<a href="'.$value["url"].'">----|'.$value['title'].'</a>';
//                 $strRec .= '<li>'.$value["title"];
//                     if(!empty($value['sub_menu'])){
//                         navMenuRecursive($value['sub_menu'],$strRec);
//                     }
//                 $strRec .= '</li>';
//            }
//            $strRec .= "</ul>";
//        }
//    }
//}

//if( !function_exists('showMenuRecursive') )
//{
//    function showMenuRecursive($menu)
//    {
//        $dataOptionsValue = DB::table('qm_option')->select('option_value')->where('option_name', 'nav_menu')->first();
//        $arrayValue       = decode_serialize($dataOptionsValue->option_value);
//        if(isset($arrayValue[$menu])){
//            navMenuRecursive($arrayValue[$menu],$strRec);
//            $strRec = str_replace("<ul></ul>", "", $strRec);
//            echo $strRec;
//        }
//    }
//}
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
    function categoryInMenu($datas,$nameCheckbox="post_category",$parent=0,$str="",$idCheck=[],$i=0)
    {
        foreach($datas as $data)
        {
            $id = $data->taxonomy_id;
            $name = $data->taxonomy_name;
            if ($data->parent_id == $parent)
            {
                $original_name = $name;
                if( $str ) $name = $str.$name;
                $checked = '';
                if( count($idCheck) > 0 && in_array($id,$idCheck) )
                {
                    $checked = ' checked ';
                }
                if( old($nameCheckbox.'.'.$i) == $id )
                {
                    $checked = ' checked ';
                }

                echo '<li data-id="'.$id.'" data-text="'.$original_name.'" data-order="'.$i.'"><input id="cat-'.$id.'" class="filled-in" type="checkbox" name="'.$nameCheckbox.'['.$i.']" value="'.$id.'"'.$checked.'><label for="cat-'.$id.'">'.$name.'</label></li>';
                categoryInMenu($datas,$nameCheckbox,$id,$str."--- ",$idCheck);
            }
            $i++;
        }
    }
}
/*-- End Edit Product Category --*/

/*-- ImageRepresent --*/
if( !function_exists('imageRepresent') )
{
    function imageRepresent($attachmentType, $attachmentUrl)
    {
        $cdn_domain_image = 'http://mosecdn.com/0';
        if( $attachmentType == 'word' )
        {
            $image = $cdn_domain_image.'/1/attachment/document.png';
        }
        elseif( $attachmentType == 'excel' )
        {
            $image = $cdn_domain_image.'/1/attachment/spreadsheet.png';
        }
        else
        {
            $image = $attachmentUrl;
        }
        return $image;
    }
}
/*-- End ImageRepresent --*/

/*-- PopupCart --*/
if( !function_exists('popupCart') )
{
    function popupCart()
    {
         //CHECK ISSET SESSION CART

        $orderCart   = 0;
        if(Session::has('quantity') && Session::has('price')){
            $data       = Session::all();
            $quantity   = $data['quantity'];
            $price      = $data['price'];
            $orderCart  = DB::table('qm_product')
                            ->join('qm_product_meta','qm_product_meta.product_id','=','qm_product.product_id')
                            ->select('qm_product.product_id','qm_product.product_title','qm_product.product_slug','qm_product_meta.meta_value')
                            ->whereIn('qm_product.product_id',array_keys($data['quantity']))
                             ->where('qm_product_meta.meta_key','product_data')
                            ->get()->all();

            view()->share('orderCart',$orderCart);
            view()->share('quantity',$quantity);
            view()->share('priceHeader',$price);
        }else{
            view()->share('orderCart',$orderCart);
        }

        //END CHECK ISSET SESSION CART
    }
}
/*-- End PopupCart --*/

if( !function_exists('str_slug_post') )
{
    function str_slug_post($action_type = '',$post_type='', $slug, $id = '')
    {
        $arr_action_type = array('create','update');
        $arr_post_type = array('page','post');
        if(!in_array($action_type, $arr_action_type))
            return false;
        $slug = str_slug($slug);
        $slug_dashes = $slug.'-';
        if($action_type == 'create'){
            $check = DB::table('qm_post')->where('post_slug',$slug)->where('post_type',$post_type)->get();
        }else if($action_type == 'update'){
            $check = DB::table('qm_post')->where('post_slug',$slug)->where('post_type',$post_type)->where('post_id','<>',$id)->get();
        }
        $i = 1;
        while(count($check)>0)
        {
            $slug = $slug_dashes.$i;
            if($action_type == 'create'){
                $check = DB::table('qm_post')->where('post_slug',$slug)->where('post_type',$post_type)->get();
            }else if($action_type == 'update'){
                $check = DB::table('qm_post')->where('post_slug',$slug)->where('post_type',$post_type)->where('post_id','<>',$id)->get();
            }
            $i++;
        }
        return $slug;
    }
}

if( !function_exists('str_slug_product') )
{
    function str_slug_product($action_type = '', $slug, $id = '')
    {
        $arr_action_type = array('create','update');
        if(!in_array($action_type, $arr_action_type))
            return false;
        $slug = str_slug($slug);
        $slug_dashes = $slug.'-';
        if($action_type == 'create'){
            $check = DB::table('qm_product')->where('product_slug',$slug)->get();
        }else if($action_type == 'update'){
            $check = DB::table('qm_product')->where('product_slug',$slug)->where('product_id','<>',$id)->get();
        }
        $i = 1;
        while(count($check)>0)
        {
            $slug = $slug_dashes.$i;
            if($action_type == 'create'){
                $check = DB::table('qm_product')->where('product_slug',$slug)->get();
            }else if($action_type == 'update'){
                $check = DB::table('qm_product')->where('product_slug',$slug)->where('product_id','<>',$id)->get();
            }
            $i++;
        }
        return $slug;
    }
}

/*-- Navigation Data --*/
if( !function_exists('navigation_data') )
{
    function navigation_data($menuData,$primaryClass,$primaryId,$recursive=false,$i=1)
    {
        $id = '';
        if( strlen($primaryId) > 0 )
        {
            $id = ' id="'.$primaryId.'"';
        }
        $class = ' class="';
        $childClass = '';
        $domainUrl = substr(asset('/'), 0, -1);
        $urlCurrent = Request::url();
        $segmentCurrent = preg_replace('/\/+/','/',str_replace($domainUrl,'',$urlCurrent));
        
        if( !is_string($primaryClass) )
        {
            $primaryClass = '';
        }
        
        if( strlen($primaryClass) > 0 && $recursive == false )
        {
            $class .= $primaryClass;
        }
        
        if( $recursive )
        {
            $class .= 'menu-child child-lv-'.$i;
        }
        
        $class .= '"';
        
        $string = '<ul'.$id.$class.'>';
        
        foreach( $menuData as $data )
        {
            $subMenu = isset($data['sub_menu']) ? $data['sub_menu'] : null;
            $targetAttr = '';
            $url = $data['url'];
            $classActive = '';
            
            // Custom Menu
            if( preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$data['url']) || ( $data['url'] == '#' ) )
            {
                if( strpos($url,$domainUrl) === false )
                {
                    $targetAttr = 'target="_blank"';
                }
                
                if( $urlCurrent == $url )
                {
                    $classActive = ' class="active"';
                }
            }
            elseif( strpos($data['url'],'product-') !== false ) // Product Category
            {
                $id = str_replace('product-','',$data['url']);
                $productCatgory = DB::table('qm_taxonomy')->where('taxonomy_type','product_category')->where('taxonomy_id',$id)->first();
                if( $productCatgory )
                {
                    $url = '/collections/'.$productCatgory->slug;
                }
                else
                {
                    $url = '/collections/';
                }
                
                if( $segmentCurrent == $url )
                {
                    $classActive = ' class="active"';
                }
            }
            elseif( strpos($data['url'],'page-') !== false ) // Page
            {
                $id = str_replace('page-','',$data['url']);
                $page = DB::table('qm_post')->where('post_type','page')->where('post_id',$id)->first();
                if( $page )
                {
                    $url = '/pages/'.$page->post_slug;
                }
                else
                {
                    $url = '/pages/';
                }
                
                if( $segmentCurrent == $url )
                {
                    $classActive = ' class="active"';
                }
            }
            elseif( strpos($data['url'],'post-') !== false ) // Post Category
            {
                $id = str_replace('post-','',$data['url']);
                $postCategory = DB::table('qm_taxonomy')->where('taxonomy_type','post_category')->where('taxonomy_id',$id)->first();
                if( $postCategory )
                {
                    $url = '/'.$postCategory->taxonomy_slug;                    
                }
                else
                {
                    $url = '/';
                }
                
                if( $segmentCurrent == $url )
                {
                    $classActive = ' class="active"';
                }
            }
            
            $string .= '<li'.$classActive.'>';
            $string .= '<a href="'.$url.'" title="'.$data['title'].'" '.$targetAttr.'>'.$data['title'].'</a>';
            
            if( $subMenu !== null )
            {
                if( $recursive )
                {
                    $i++;
                }
                $string .= navigation_data($subMenu,'','',true,$i);
            }
            
            $string .= '</li>';
        }
        
        $string .= '</ul>';
        
        return $string;
    }
}
/*-- End Navigation Data --*/

/*-- Navigation Menu --*/
if( !function_exists('navigation_menu') )
{
    function navigation_menu($position='',$primaryClass='',$primaryId='')
    {
        $active_template = DB::table('qm_option')->where([
            'option_name' => 'active_template',
        ])->first()->option_value;
        require_once('system/application/views/frontend/'.$active_template.'/function.php');
        if( function_exists('resgister_navigation') )
        {
            $registerNavigation = resgister_navigation();
            if( !isset($registerNavigation[$position]) )
            {
                return null;
            }
            else
            {
                $navigation_data = decode_serialize(DB::table('qm_option')->where('option_name','navigation_data')->first()->option_value);
                if( !is_array($navigation_data) )
                {
                    $navigation_data = [];
                }
                $navigation_load = decode_serialize(DB::table('qm_option')->where('option_name','navigation_load')->first()->option_value);
                if( !is_array($navigation_load) )
                {
                    $navigation_load = [];
                }
                
                if( !isset($navigation_load[$position]) || count($navigation_data) == 0 )
                {
                    return null;
                }
                
                $slugMenuName = $navigation_load[$position];
                $menuData = $navigation_data[$slugMenuName]['menu_data'];
                if( count($menuData) == 0 )
                {
                    return null;
                }
                
                return navigation_data($menuData,$primaryClass,$primaryId);
            }
        }
        else
        {
            return null;
        }
    }
}
/*-- End Navigation Menu --*/

/*-- Get User Data --*/
if( !function_exists('getUserData') )
{
    function getUserData()
	{
	    $userData = DB::table('qm_user')
	    ->join('qm_user_meta','qm_user_meta.user_id','=','qm_user.user_id')
	    ->where('qm_user.user_id',Session::get('user_id'))
	    ->first();

	    return $userData;
	}
}
/*-- End Get User Data --*/

/*-- Delete Directory --*/
if( !function_exists('deleteDir') )
{
    function deleteDir($dirPath)
    {
        if( !is_dir($dirPath) )
        {
            if( file_exists($dirPath) !== false )
            {
                unlink($dirPath);
            }
            return;
        }

        if( $dirPath[strlen($dirPath) - 1] != '/' )
        {
            $dirPath .= '/';
        }

        $files = glob($dirPath . '*', GLOB_MARK);
        foreach( $files as $file )
        {
            if( is_dir($file) )
            {
                deleteDir($file);
            }
            else
            {
                unlink($file);
            }
        }

        rmdir($dirPath);
    }
}
/*-- End Delete Directory --*/

if( !function_exists('tableSearchForm') )
{
    function tableSearchForm($search = '', $before = '', $after = '', $bind = '')
    {
        $html = '';
        $html .= $before;
        if($bind){$bind=' data-bind="'.$bind.'"';}
        $html .= '<div class="form-group"><div class="search-form"><div class="input-group"><input name="search" type="text" class="form-control na-search-input" value="'.$search.'" /><span class="input-group-btn"><button class="btn btn-search na-search-btn" type="submit"'.$bind.' data-model="na-search-btn"><i class="font-icon material-icons md-18">search</i></button></span></div></div></div>';
        $html .= $after;
        return $html;
    }
}

if( !function_exists('tableActionForm') )
{
    function tableActionForm($arr = '', $before = '', $after = '', $bind = '')
    {
        $html = ''; $option = '';
        $html .= $before;
        if(!$arr){
            $option = '<option selected="selected" value="0">Chọn hành động</option><option value="edit">Chỉnh sửa</option><option value="trash">Xóa</option>';
        }else {
            $option = '<option selected="selected" value="0">Chọn hành động</option>';
            foreach ($arr as $key => $value) {
                $option .= '<option value="'.$key.'">'.$value.'</option>';
            }
        }
        if($bind){$bind=' data-bind="'.$bind.'"';}
        $html .= '<div class="form-group"><select name="select_action" class="form-control na-select-action">'.$option.'</select></div> <div class="form-group"><button type="submit" class="btn btn-secondary na-select-btn"'.$bind.'>Áp dụng</button></div>';
        $html .= $after;
        return $html;
    }
}

if( !function_exists('media_modal') )
{
    function media_modal($type='')
    {
        $html = '';
        $html .= '<div id="modal-media" data-type="'.$type.'" class="modal fade" tabindex="-1" role="dialog"><div class="modal-dialog modal-lg"><div class="modal-content">';
        $html .= '<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Thư viện ảnh</h4></div>';
        $html .= '<div class="modal-body">';
        $html .= '<div class="form-group"><div class="input-group"><input type="text" class="form-control modal-search" value="" data-bind="keypress: modal-search" /><span class="input-group-btn"><button class="btn btn-secondary" type="button" data-bind="click: Modal.SearchImage" style="height: 35px !important;"><i class="font-icon material-icons md-18">search</i></button></span></div></div><div class="modal-list-data" data-bind="load: Modal.ChooseImage"></div>';
        $html .= '</div>';
        $html .= '<div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button> <button id="set-image-btn" type="button" class="btn btn-primary waves-effect" data-bind="click: Modal.SetImage">Chọn hình ảnh</button></div>';
        $html .= '</div></div></div>';
        return $html;
    }
}

if( !function_exists('get_cat_product') )
{
    function get_cat_product( $product_id = '')
    {
        $html = '';
        $cat = DB::table('qm_product_relationships')->join('qm_product','qm_product.product_id','=','qm_product_relationships.product_id')
                    ->join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_product_relationships.taxonomy_id')
                    ->select('qm_taxonomy.taxonomy_name', 'qm_taxonomy.taxonomy_slug')
                    ->where('qm_product.product_id',$product_id)->where('qm_taxonomy.taxonomy_type','product_category')
                    ->groupBy('qm_taxonomy.taxonomy_name')
                    ->get();
        if(count($cat)>0){
            foreach ($cat as $v){
                $html .= '<a href="'.url('admin/product?category='.$v->taxonomy_slug).'">'.$v->taxonomy_name.'</a>'.',';
            }
        }
        return substr($html,0, -1);
    }
}

if( !function_exists('get_cat_post') )
{
    function get_cat_post( $post_id = '')
    {
        $html = '';
        $cat = DB::table('qm_post_relationships')->join('qm_post','qm_post.post_id','=','qm_post_relationships.post_id')
                    ->join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_post_relationships.taxonomy_id')
                    ->select('qm_taxonomy.taxonomy_name', 'qm_taxonomy.taxonomy_slug')
                    ->where('qm_post.post_id',$post_id)->where('qm_taxonomy.taxonomy_type','post_category')
                    ->groupBy('qm_taxonomy.taxonomy_name')
                    ->get();
        if(count($cat)>0){
            foreach ($cat as $v){
                $html .= '<a href="'.url('admin/post?category='.$v->taxonomy_slug).'">'.$v->taxonomy_name.'</a>'.',';
            }
        }
        return substr($html,0, -1);
    }
}

if( !function_exists('get_template_order_code') )
{
    function get_template_order_code( $order_code = '')
    {
        $html = '';
        $check = DB::table('qm_order')->where('order_code', $order_code)->first();
        if($check){
            $order_prefix = DB::table('qm_option')->where('option_name','order_prefix')->value('option_value');
            $order_suffix = DB::table('qm_option')->where('option_name','order_suffix')->value('option_value');
            $html .= $order_prefix.$order_code.$order_suffix;
        }
        return $html;
    }
}

if( !function_exists('promotionFace') )
{
	function promotionFace($productId,$variantId=null)
	{
		$time = time();
		$discountPercent = 0;
		$discountPriceNew = 0;
		$discountPriceOld = 0;
		$discountPrice = 0;
		$discountCheck = 0;

		if( $variantId == null )
		{
			$product = DB::table('qm_product')
				->join('qm_variant','qm_variant.product_id','=','qm_product.product_id')
				->where('qm_product.product_id',$productId)
				->where('qm_product.product_status','public')
				->first();
		}
		else
		{
			$product = DB::table('qm_product')
				->join('qm_variant','qm_variant.product_id','=','qm_product.product_id')
				->where('qm_product.product_id',$productId)
				->where('qm_product.product_status','public')
				->where('qm_variant.variant_id',$variantId)
				->first();
		}

		$groupProducts = DB::table('qm_product_relationships')
			->join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_product_relationships.taxonomy_id')
			->where('qm_product_relationships.product_id',$productId)
			->where('qm_taxonomy.taxonomy_type','product_group')
			->pluck('qm_taxonomy.taxonomy_id')
			->toArray(); // If product haven't group then $groupProducts is empty array

		// Discount Type == 2
		//- Discount Offer == 3 
		$discounts = DB::table('qm_discount')
			->where('discount_type',2)
			->where('discount_offer',3)
			->where('discount_status',1)
			->where('offer_option',1)
			->where('relationship_title','')
			->whereIn('relationship_id',$groupProducts)
			->where('discount_date_start','<=',$time)
			->where(function($query) use ($time){
				$query->where('discount_date_end','>=',$time)
				->orWhere('discount_date_end','<=',0);
			})
			->get();

		$discountPriceAmount = 0; // Largest Discount Price Amount
		$discountPricePercentage = 0; // Largest Discount Price Percentage

		foreach( $discounts as $discount )
		{
			if( $discount->discount_option == 'amount' && $discount->discount_take > $discountPriceAmount )
			{
				$discountPriceAmount = $discount->discount_take;
			}

			if( $discount->discount_option == 'percentage' && $discount->discount_take > $discountPricePercentage )
			{
				$discountPricePercentage = $discount->discount_take;
			}
		}
		//- End

		$discountPrice = $product->price_new * $discountPricePercentage / 100;
		if( $discountPrice < $discountPriceAmount ) $discountPrice = $discountPriceAmount;

		//- Discount Offer == 4 
		$discounts = DB::table('qm_discount')
			->where('discount_type',2)
			->where('discount_offer',4)
			->where('discount_status',1)
			->where('offer_option',1)
			->where('relationship_title','')
			->where('relationship_id',$productId)
			->where('discount_date_start','<=',$time)
			->where(function($query) use ($time){
				$query->where('discount_date_end','>=',$time)
				->orWhere('discount_date_end','<=',0);
			})
			->get();

		$discountPriceAmount = 0; // Largest Discount Price Amount
		$discountPricePercentage = 0; // Largest Discount Price Percentage

		foreach( $discounts as $discount )
		{
			if( $discount->discount_option == 'amount' && $discount->discount_take > $discountPriceAmount )
			{
				$discountPriceAmount = $discount->discount_take;
			}

			if( $discount->discount_option == 'percentage' && $discount->discount_take > $discountPricePercentage )
			{
				$discountPricePercentage = $discount->discount_take;
			}
		}
		//- End

		$_discountPrice = $product->price_new * $discountPricePercentage / 100;
		if( $discountPrice < $_discountPrice ) $discountPrice = $_discountPrice;
		if( $discountPrice < $discountPriceAmount ) $discountPrice = $discountPriceAmount;
		// End

		
		if( $discountPrice > 0 ) $discountCheck = 1;
		if( $discountPrice >= $product->price_new ) $discountPrice = $product->price_new;
		if( $product->price_new > 0 ) $discountPercent = floor($discountPrice * 100 / $product->price_new);
		$discountPriceNew = $product->price_new - $discountPrice;
		$discountPriceOld = $product->price_old;
		if( $discountPriceNew < $product->price_new ) $discountPriceOld = $product->price_new;
		
		return [
			'percentage' => $discountPercent,
			'price_new' => $discountPriceNew,
			'price_old' => $discountPriceOld,
			'check_discount' => $discountCheck,
		];
	}
}
if( !function_exists('promotionOrder') )
{
	function promotionOrder($variants,$discountCode=null,$idCustomer=null)
	{
		$time = time();
        $discountType = 0;
        $discountTitle = '';
		$totalMoneyInOrder = 0;
		$resultVariant = [];
		$resultMoney = 0;
        $result = [];

		foreach( $variants as $variant )
		{
			$product = DB::table('qm_product')
				->join('qm_variant','qm_variant.product_id','=','qm_product.product_id')
				->where('qm_product.product_status','public')
				->where('qm_variant.variant_id',$variant['variant_id'])
				->first();

			if( $product )
			{
				$resultVariant[$product->variant_id]['price'] = $product->price_new;
				$resultVariant[$product->variant_id]['quantity'] = $variant['quantity'];

				$totalMoneyInOrder += $product->price_new * $variant['quantity'];
			}
		}

		$discountPriceInOrder = 0;

		// Discount Type == 2 && Discount Offer == 1
		$discounts = DB::table('qm_discount')
			->where('discount_type',2)
			->where('discount_offer',1)
			->where('discount_status',1)
			->where('discount_date_start','<=',$time)
			->where(function($query) use ($time){
				$query->where('discount_date_end','>=',$time)
				->orWhere('discount_date_end','<=',0);
			})
			->get();

		$discountPriceAmount = 0; // Largest Discount Price Amount
		$discountPricePercentage = 0; // Largest Discount Price Percentage
        $discountTitleAmount = '';
        $discountTitlePercentage = '';

        if( count($discounts) > 0 )
        {
            $discountType = 2;
        }

		foreach( $discounts as $discount )
		{
			if( $discount->discount_option == 'amount' && $discount->discount_take > $discountPriceAmount )
            {
                $discountPriceAmount = $discount->discount_take;
                $discountTitleAmount = $discount->discount_title;
            }

			if( $discount->discount_option == 'percentage' && $discount->discount_take > $discountPricePercentage )
            {
                $discountPricePercentage = $discount->discount_take;
                $discountTitlePercentage = $discount->discount_title;
            }
		}

		$discountPriceInOrder = $totalMoneyInOrder * $discountPricePercentage / 100;
        $discountTitle = $discountTitlePercentage;
        
		if( $discountPriceInOrder < $discountPriceAmount )
        {
            $discountPriceInOrder = $discountPriceAmount;
            $discountTitle = $discountTitleAmount;
        }
		// End

		// Discount Type == 1 && Discount Offer == 1
		$discount = DB::table('qm_discount')
			->where('discount_type',1)
			->where('discount_title',$discountCode)
			->where('discount_offer',1)
			->where('discount_status',1)
			->where(function($query){
				$query->whereRaw('discount_limit_start > discount_limit_end')
				->orWhere('discount_limit_start',0);
			})
			->where('discount_date_start','<=',$time)
			->where(function($query) use ($time){
				$query->where('discount_date_end','>=',$time)
				->orWhere('discount_date_end','<=',0);
			})
			->first();
		
		$discountPriceAmount = 0; // Largest Discount Price Amount
		$discountPricePercentage = 0; // Largest Discount Price Percentage
		$__discountPriceInOrder = $discountPriceInOrder;
        $_discountTitle = '';

		if( $discount )
		{
            $_discountTitle = $discount->discount_title;

			if( $discount->discount_option == 'amount' ) $discountPriceAmount = $discount->discount_take;

			if( $discount->discount_option == 'percentage' ) $discountPricePercentage = $discount->discount_take;

			$_discountPriceInOrder = $totalMoneyInOrder * $discountPricePercentage / 100;

			if( $discount->promotion_allow == 0 )
			{
				if( $__discountPriceInOrder < $_discountPriceInOrder ) $__discountPriceInOrder = $_discountPriceInOrder;
				if( $__discountPriceInOrder < $discountPriceAmount ) $__discountPriceInOrder = $discountPriceAmount;
			}
			else // $discount->promotion_allow == 1
			{
				if( $_discountPriceInOrder < $discountPriceAmount ) $_discountPriceInOrder = $discountPriceAmount;
				$__discountPriceInOrder += $_discountPriceInOrder;
			}
		}

		if( $discountPriceInOrder < $__discountPriceInOrder )
        {
            $discountPriceInOrder = $__discountPriceInOrder;
            $discountTitle = $_discountTitle;
            $discountType = 1;
        }
		// End

		// Discount Type == 2 && Discount Offer == 2
		$discounts = DB::table('qm_discount')
			->where('discount_type',2)
			->where('discount_offer',2)
			->where('discount_status',1)
			->where('money_over','<=',$totalMoneyInOrder)
			->where('discount_date_start','<=',$time)
			->where(function($query) use ($time){
				$query->where('discount_date_end','>=',$time)
				->orWhere('discount_date_end','<=',0);
			})
			->get();

		$discountPriceAmount = 0; // Largest Discount Price Amount
		$discountPricePercentage = 0; // Largest Discount Price Percentage
        $discountTitleAmount = '';
        $discountTitlePercentage = '';

		foreach( $discounts as $discount )
		{
			if( $discount->discount_option == 'amount' && $discount->discount_take > $discountPriceAmount )
            {
                $discountPriceAmount = $discount->discount_take;
                $discountTitleAmount = $discount->discount_title;
            }

			if( $discount->discount_option == 'percentage' && $discount->discount_take > $discountPricePercentage )
            {
                $discountPricePercentage = $discount->discount_take;
                $discountTitlePercentage = $discount->discount_title;
            }
		}
		//- End

		$_discountPriceInOrder = $totalMoneyInOrder * $discountPricePercentage / 100;

		if( $discountPriceInOrder < $_discountPriceInOrder )
        {
            $discountPriceInOrder = $_discountPriceInOrder;
            $discountTitle = $discountTitlePercentage;
            $discountType = 2;
        }
		if( $discountPriceInOrder < $discountPriceAmount )
        {
            $discountPriceInOrder = $discountPriceAmount;
            $discountTitle = $discountTitleAmount;
            $discountType = 2;
        }
		// End

		// Discount Type == 1 && Discount Offer == 2
		$discount = DB::table('qm_discount')
			->where('discount_type',1)
			->where('discount_title',$discountCode)
			->where('discount_offer',2)
			->where('discount_status',1)
			->where('money_over','<=',$totalMoneyInOrder)
			->where(function($query){
				$query->whereRaw('discount_limit_start > discount_limit_end')
				->orWhere('discount_limit_start',0);
			})
			->where('discount_date_start','<=',$time)
			->where(function($query) use ($time){
				$query->where('discount_date_end','>=',$time)
				->orWhere('discount_date_end','<=',0);
			})
			->first();
		
		$discountPriceAmount = 0; // Largest Discount Price Amount
		$discountPricePercentage = 0; // Largest Discount Price Percentage
		$__discountPriceInOrder = $discountPriceInOrder;
        $_discountTitle = '';
        
		if( $discount )
		{
            $_discountTitle = $discount->discount_title;

			if( $discount->discount_option == 'amount' ) $discountPriceAmount = $discount->discount_take;

			if( $discount->discount_option == 'percentage' ) $discountPricePercentage = $discount->discount_take;

			$_discountPriceInOrder = $totalMoneyInOrder * $discountPricePercentage / 100;

			if( $discount->promotion_allow == 0 )
			{
				if( $__discountPriceInOrder < $_discountPriceInOrder ) $__discountPriceInOrder = $_discountPriceInOrder;
				if( $__discountPriceInOrder < $discountPriceAmount ) $__discountPriceInOrder = $discountPriceAmount;
			}
			else // $discount->promotion_allow == 1
			{
				if( $_discountPriceInOrder < $discountPriceAmount ) $_discountPriceInOrder = $discountPriceAmount;
				$__discountPriceInOrder += $_discountPriceInOrder;
			}
		}

		if( $discountPriceInOrder < $__discountPriceInOrder )
        {
            $discountPriceInOrder = $__discountPriceInOrder;
            $discountTitle = $_discountTitle;
            $discountType = 1;
        }
		// End

		$resultMoney = $totalMoneyInOrder - $discountPriceInOrder;
		if( $resultMoney < 0 ) $resultMoney = 0;

        $title = '';

        if( $discountType == 1 ) $title = 'Mã khuyến mãi: '.$discountTitle;
        if( $discountType == 2 ) $title = 'Chương trình khuyến mãi: '.$discountTitle;

        $result = [
            'title' => $title,
            'discount_price' => $discountPriceInOrder,
            'total' => $resultMoney,
        ];

		return $result;
	}
}

if( !function_exists('get_taxonomy_name') )
{
    function get_taxonomy_name( $taxonomy_type = '', $taxonomy_slug = '')
    {
        $query =  DB::Table('qm_taxonomy')->where('taxonomy_slug',$taxonomy_slug);
        if($taxonomy_type){
            $query->where('taxonomy_type',$taxonomy_type);
        }
        $query = $query->value('taxonomy_name');
        if($query){
            return $query;
        }
        return '';
    }
}

if( !function_exists('optionLoad') )
{
    function optionLoad()
    {
        $option_load = [];

        $options = DB::Table('qm_option')->where('autoload','yes')->get();

        foreach( $options as $option )
        {
            $option_load[$option->option_name] = $option->option_value;
        }
        
        return $option_load;
    }
}

?>