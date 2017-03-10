<?php

//Lấy bài post theo taxonomy
/*
*  Constructor
*
*  This function get list post with taxonomy (category, cat)
*
*  @type    function
*  @date    25/10/2016
*  @since   1.0.0
*
*  @param   string, sting
*  @return  array
*/

if( !function_exists('get_post_cat_limit') )
{
    function get_post_cat_limit( $taxonomy_slug ='',$limit = '' )
    { 
        $query = DB::table('qm_post')->join('qm_user','qm_user.user_id','=','qm_post.user_id')
                ->select('qm_post.post_title','qm_post.post_slug','qm_post.post_date','qm_post.comment_status','qm_post.post_excerpt','qm_user.user_email','qm_user.user_fullname','qm_post.post_image','qm_post.post_content');
        if($taxonomy_slug){
            $query->join('qm_post_relationships','qm_post_relationships.post_id','=','qm_post.post_id')
                  ->join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_post_relationships.taxonomy_id')
                  ->where('qm_taxonomy.taxonomy_slug', $taxonomy_slug);
        }
        if($limit){
            $query->take($limit);
        }
        return $query->where('qm_post.post_status','public')->where('qm_post.post_type','post')->groupBy('qm_post.post_id')->orderBY('qm_post.post_date','desc')->get();
    }
}

//Lấy danh mục, nhãn bài viết

/*
*  Constructor
*
*  This function get list taxonomy of post
*
*  @type    function
*  @date    25/10/2016
*  @since   1.0.0
*
*  @param   string, sting
*  @return  array
*/
if( !function_exists('get_taxonomy_post') )
{
    function get_taxonomy_post( $taxonomy_type = 'post_category', $limit = '' )
    {
        $query = DB::table('qm_post_relationships')->join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_post_relationships.taxonomy_id')
                                                   ->join('qm_post','qm_post.post_id','=','qm_post_relationships.post_id')
                                                   ->select('qm_taxonomy.taxonomy_slug','qm_taxonomy.taxonomy_name')
                                                   ->where('qm_post.post_status','public')->where('qm_taxonomy.taxonomy_type', $taxonomy_type);
        if($limit){
            $query->take($limit);
        } 
        return $query->groupBy('qm_taxonomy.taxonomy_id')->orderBY('qm_taxonomy.taxonomy_id', 'desc')->get();
    }
}

//Lấy bài viết liên quan 

/*
*  Constructor
*
*  This function get post related post_plug
*
*  @type    function
*  @date    25/10/2016
*  @since   1.0.0
*
*  @param   string, sting, string
*  @return  array
*/

if( !function_exists('get_post_related') )
{
    function get_post_related( $taxonomy_type = 'post_tag', $post_slug = '', $limit = ''  )
    {
        //Lấy danh sách tag, cat của bài viết
        $taxonomy_id = DB::table('qm_post')->join('qm_post_relationships','qm_post_relationships.post_id','=','qm_post.post_id')
                                           ->join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_post_relationships.taxonomy_id')
                                           ->where('qm_post.post_slug', $post_slug)->where('qm_taxonomy.taxonomy_type',$taxonomy_type)->pluck('qm_taxonomy.taxonomy_id');
        $query = DB::table('qm_post')->join('qm_post_relationships','qm_post_relationships.post_id','=','qm_post.post_id')
                                     ->select('qm_post.post_title','qm_post.post_slug','qm_post.post_date','qm_post.post_excerpt','qm_post.post_image','qm_post.post_content')
                                     ->where('qm_post.post_status', 'public')->whereIN('qm_post_relationships.taxonomy_id', $taxonomy_id)
                                     ->where('qm_post.post_slug','<>',$post_slug)->where('post_type','post');
        if($limit){
            $query-> take($limit);
        }
        return  $query->get();
    }
}

//Lấy tag của sản phẩm chi tiết

/*
*  Constructor
*
*  This function get taxonomy with post_slug
*
*  @type    function
*  @date    25/10/2016
*  @since   1.0.0
*
*  @param   string, sting, string
*  @return  array
*/
if( !function_exists('get_taxonomy_post_detail') )
{
    function get_taxonomy_post_detail( $taxonomy_type = 'post_tag', $post_slug = '', $limit = '' )
    {
        $query = DB::table('qm_post_relationships')->join('qm_post','qm_post.post_id','=','qm_post_relationships.post_id')
                                                      ->join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_post_relationships.taxonomy_id')
                                                      ->select('qm_taxonomy.taxonomy_name','qm_taxonomy.taxonomy_slug')
                                                      ->where('qm_post.post_slug', $post_slug)->where('qm_taxonomy.taxonomy_type',$taxonomy_type);
        if($limit){
            $query->take($limit);
        }                        
        return $query->get();                      
    }
}

?>