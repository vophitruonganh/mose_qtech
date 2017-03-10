<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Requests;


use App\Http\Controllers\frontend\ContactController;
/*
 * Use Library of Laravel
 */
use DB;
use Session;
use App\Http\Controllers\frontend\FrontendController;
use App\Models\Post;
class PagesController extends FrontendController
{
    /**
     * Class Constructor
     */
    function __construct(){
        parent::__construct();
    }
    public function index($slug = '')
    {

        //CHECK PAGE BY SLUG
        $m_post = new Post;
        $check_slug = $m_post-> Get_post_slug('page', $slug);
        if($check_slug){
            return $this->page_detail( $slug );
        }

        $check_slug = $m_post->Get_post_slug_like('page', $slug);
        if($check_slug){
            $slug = $check_slug->post_slug;
            return redirect('pages/'.$slug);
        }

        return redirect('/');
    }

    private function page_detail( $slug = '')
    {
        $m_post = new Post;
        $page = $m_post ->Get_post_detail ('page',$slug);

        return view('frontend/'.$this->active_template.'/pages/page/detail',[
            'page' => $page,
        ]);
    }
    public function contact()
    {
        $page = new ContactController;
        return $page -> index();
    }

    public function sendmail( Request $request)
    {
        $page = new ContactController;
        return $page -> sendmail($request);
    }

    public function success()
    {
        $page = new ContactController;
        return $page -> success();
    }
}
