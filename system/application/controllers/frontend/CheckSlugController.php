<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\frontend\FrontendController;
use Session;

class CheckSlugController extends FrontendController
{
    /**
     * Class Constructor
     * @param    $post
     */
    function __construct(){
        parent::__construct();
        $this->c_post = new PostController;
    }

    public function index($slug = '')
    {
        /* danh mục bài viết */
        $check_slug = $this->m_taxonomy->Get_taxonomy_slug_type ('post_category', $slug);
        if(count($check_slug)>0)
        {
            return $this->c_post->post_slug($slug,'post_category');
        }
        /* end danh mục*/

        /* nhãn bài viết */
        $check_slug = $this->m_taxonomy->Get_taxonomy_slug_type ('post_tag', $slug);
        if(count($check_slug)>0)
        {
            return $this->c_post->post_slug($slug,'post_tag');
        }
        /* end nhãn*/

        /*Chi tiết bài viết*/

        $check_slug = $this->m_post->Get_post_slug('post', $slug);
        if(count($check_slug)>0)
        {
            return $this->c_post->post_detail($slug);
        }
        /*End bài viết*/

        /*Lấy slug theo like*/
        $check_slug = $this->m_taxonomy->Get_taxonomy_post_slug_like ($slug);
        if($check_slug){
            $slug = $check_slug->taxonomy_slug;
            return redirect($slug);
        }

        $check_slug = $this->m_post->Get_post_slug_like('post', $slug);
        if($check_slug){
            $slug = $check_slug->post_slug;
            return redirect($slug);
        }
        /*End slug*/
        //return view('frontend/'.Session::get('template').'/pages/home/home');
        return redirect('/');
    }

    public function post_search()
    {
        $search  = isset($_GET['search']) ? $_GET['search']: '';
        $view   = isset($_GET['view']) ? $_GET['view']: '';
        return $this->c_post->post_search($search,$view);
    }
}
