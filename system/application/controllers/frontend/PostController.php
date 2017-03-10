<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\frontend\FrontendController;
/*
 * Use Library of Laravel
 */
use Session;
class PostController extends FrontendController
{
    function __construct(){
        parent::__construct();
    }
    public function post_slug($taxonomy_slug = '' ,$taxonomy_type = 'post_category')
    {

        //return $posts;
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        /* Lấy category name*/
        $slug_name = $this->m_taxonomy->Get_taxonomy_name_slug( $taxonomy_type, $taxonomy_slug );
        /* end */

        /*Lấy post thuộc category*/
        $dataNews = $this->m_taxonomy_relationships ->Get_list_post_taxonomy_slug ($taxonomy_type, $taxonomy_slug ,'post');
        /*end */

        if(count($dataNews)==0)
        {
            return redirect('/');
        }

        //return view('frontend/'.Session::get('template').'/pages/post_slug/index',[
        return view('frontend/'.$this->active_template.'/pages/post_slug/index',[
            'dataNews' => $dataNews,
            'slug_name' => $slug_name,
        ]);
    }

    public function post_detail($post_slug = ''){
         //CHECK POST BY SLUG
        $post =  $this->m_post->Get_post_detail ( 'post',$post_slug) ;
        //Get_post_detail ( $post_type = '',$post_slug = '')
        if( count($post) == 0 ){
            return redirect('/');
        }

        //END CHECK

        //return view('frontend.'.Session::get('template').'.pages.post_slug.detail',[
        return view('frontend.'.$this->active_template.'.pages.post_slug.detail',[
            'post' => $post,
        ]);
    }

    ///Chưa xử dụng
    public function post_search($search = '', $view = '')
    {
        $posts = $this->m_post->where('post_type','post')
                                     ->join('qm_post_meta','qm_post_meta.post_id','=','qm_post.post_id')
                                     ->join('qm_user', 'qm_post.user_id', '=', 'qm_user.user_id')
                                     ->where('post_status','public')
                                     ->where('qm_post.post_title','like','%'.$search.'%')
                                     ->orderBY('qm_post.post_date','desc')
                                     ->paginate(6);

        if(count($posts)==0)
        {
            return redirect('/');
        }

        if( $view == 'grid' )
        {
            //return view('frontend/'.Session::get('template').'/pages/search_post/grid',[
            return view('frontend/'.$this->active_template.'/pages/search_post/grid',[
                'posts' => $posts,
                'search' => $search,
                'view' => 'grid'
                ]);
        }

        if( $view == 'list')
        {
            //return view('frontend/'.Session::get('template').'/pages/search_post/list',[
            return view('frontend/'.$this->active_template.'/pages/search_post/list',[
                'posts' => $posts,
                'search' => $search,
                'view' => 'list'
                ]);
        }

        //return view('frontend/'.Session::get('template').'/pages/search_post/grid',[
        return view('frontend/'.$this->active_template.'/pages/search_post/grid',[
                'posts' => $posts,
                'search' => $search,
                'view' => 'grid'
            ]);



    }


}
