<?php
if( !function_exists('taxonomy_children_id') )
{    
    function taxonomy_children_id($tax_type='',$tax_id=0){
        $taxonomy = DB::table('qm_taxonomy')->where('taxonomy_type',$tax_type)->where('taxonomy_parent',$tax_id)->get();
        if($taxonomy){
            $data_children = array();
            $children_in = array();
            foreach ($taxonomy as $tax)
            {
                $data_children[] .= $tax->taxonomy_id;
                $children_in = taxonomy_children_id($tax_type,$tax->taxonomy_id);  
                if($children_in){
                    $data_children = array_merge($children_in,$data_children);
                }else{
                    $data_children = $data_children;
                } 
            }
            return $data_children;
        }
    }
}
if( !function_exists('taxonomy_list_parent') )
{    
    function taxonomy_list_parent($tax_type='',$tax_id=0){
        // $children_list = taxonomy_children_id($data_arr['tax_type'],$taxonomy_id);
        // if(!$children_list){
        //     $children_list = [];
        // }
        // $terms = Taxonomy::where('taxonomy_type',$data_arr['tax_type'])->where('taxonomy_id','<>',$get_taxonomy_id)->whereNotIn('taxonomy_id',$children_list)->get();
        $children_list = taxonomy_children_id($tax_type,$tax_id);
        if(!$children_list){
            $children_list = [];
        }
        $parent_list = DB::table('qm_taxonomy')->where('taxonomy_type',$tax_type)->where('taxonomy_id','<>',$tax_id)->whereNotIn('taxonomy_id',$children_list)->get();
        return $parent_list;
    }
}
if( !function_exists('taxonomy_list') )
{    
    function taxonomy_list($data,$parent_id=0,$str="",$select=0){
        if(!is_array($data)){
            $data = json_decode($data, true);
        }
        foreach ($data as $val){
            $id = $val["taxonomy_id"];
            $name = $val["taxonomy_name"];
            if ($val["taxonomy_parent"] == $parent_id)
            {
                if ($select != 0 && $val["taxonomy_id"] == $select)
                {
                    echo '<option value="'.$id.'" selected>'.$str." ".$name.'</option>';
                }
                else
                {
                    echo '<option value="'.$id.'">'.$str." ".$name.'</option>';
                }
                taxonomy_list($data,$id,$str."-- ",$select);
            }
        }
    }
}
if( !function_exists('taxonomy_data') )
{
    function taxonomy_data($data,$parent = 0,$str="",$level = false){
        $arr_data = array();
        $data_list = array();
        $arr = array();

        foreach ($data as $val){
            $id = $val["taxonomy_id"];
            $name = $val["taxonomy_name"];
            $slug = $val["taxonomy_slug"];
            $count = $val["taxonomy_count"];
            $excerpt = $val["taxonomy_excerpt"];
            if ($val["taxonomy_parent"] == $parent)
            {
                if($str){
                    $name = $str.$name;
                }
                $arr = array(
                    'taxonomy_id' => $id,
                    'taxonomy_name' => $name,
                    'taxonomy_slug' => $slug,
                    'taxonomy_count' => $count,
                    'taxonomy_parent' => $val["taxonomy_parent"],
                    'taxonomy_excerpt' => $excerpt,
                );
                array_push($arr_data,$arr);
                if($level){
                    $data_list = taxonomy_data($data,$id,$str."-- ",$level);
                    if($data_list){
                        $arr_data = array_merge($arr_data,$data_list);
                    }
                }
            }
        }
        return $arr_data;
    }
}
if( !function_exists('taxonomy_data_search') )
{
    function taxonomy_data_search($data){
        $arr_data = array();

        foreach ($data as $val)
        {
            $id = $val["taxonomy_id"];
            $name = $val["taxonomy_name"];
            $slug = $val["taxonomy_slug"];
            $count = $val["taxonomy_count"];
            $parent_id = $val["taxonomy_parent"];
            $excerpt = $val["taxonomy_excerpt"];
            $arr = array(
                'taxonomy_id' => $id,
                'taxonomy_name' => $name,
                'taxonomy_slug' => $slug,
                'taxonomy_count' => $count,
                'taxonomy_parent' => $parent_id,
                'taxonomy_excerpt' => $excerpt,
            );
            array_push($arr_data,$arr);
        }
        return $arr_data;
    }
}
/*-- Create Slug --*/
if(!function_exists('taxonomy_slug_create'))
 {
    function taxonomy_slug_create($tax_type, $slug)
    {
       $_slug = str_slug($slug);
       $_slug_undercore = $_slug.'-';
       $check = DB::table('qm_taxonomy')->where('taxonomy_type',$tax_type)->where('taxonomy_slug',$_slug)->get();
       $i=1;
       while(count($check) > 0)
       {
           $_slug = $_slug_undercore.$i;
           $check = DB::table('qm_taxonomy')->where('taxonomy_slug',$_slug)->where('taxonomy_type',$tax_type)->get();
           $i++;
       }
       return $_slug;

    }
}
/*-- End Create Slug --*/

/*-- Update Slug --*/
if(!function_exists('taxonomy_slug_update'))
 {
    function taxonomy_slug_update($tax_type,$tax_id,$tax_slug)
    {
        $_slug = str_slug($tax_slug);
        $_slug_undercore = $_slug.'-';
        $check = DB::table('qm_taxonomy')->where('taxonomy_slug',$_slug)->where('taxonomy_type',$tax_type)->where('taxonomy_id','<>',$tax_id)->get();
        $i=1;
        while(count($check) > 0){
           $_slug=$_slug_undercore.$i;
           $check=DB::table('qm_taxonomy')->where('taxonomy_slug',$_slug)->where('taxonomy_type',$tax_type)->where('taxonomy_id','<>',$tax_id)->get();
           $i++;
        }
        return $_slug;
    }
}
?>