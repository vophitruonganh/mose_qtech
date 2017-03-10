<?php

namespace App\Http\Controllers\backend\website;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

/*-- Call Other Controller --*/
use App\Http\Controllers\backend\attachment\AttachmentController;
/*-- End Call Other Controller --*/
/*
 * Use Library of Laravel
 */
use App\Models\Post;
use App\Models\PostMeta;
use App\Models\Option;
use App\Models\Attachment;
use Validator;
use Session;
use DB;

class PageController extends BackendController
{
    //Load danh sách page
    public function index(Request $request)
    {
        $data = $request->all();
        $post = new Post;
        $search = isset($data['search']) ? $data['search'] : '';
        $select_action = isset($data['select_action']) ? $data['select_action'] : '';
        $check = isset($data['check']) ? $data['check'] : [];
        $type = isset($data['type']) ? $data['type'] : '';
        $post_status = isset($data['post_status']) ? $data['post_status'] : 'all';
        $sort = isset($data['sort']) ? $data['sort'] : 'created-desc';
        $user_id = isset($data['user_id']) ? $data['user_id'] : 0;
        $arr_post_status = ['all','public','pending','draft','trash'];
        $arr_select_action = ['trash','edit','restore','delete'];
        $type_request = '';
        
        if( $request->isMethod('post') && $request->ajax()){
            $type_request = 'ajax';
        }
      
        $arr_sort = ['created-asc','created-desc'];
        if(!in_array($sort, $arr_sort)){
            $sort = 'created-desc';
        }

        /*Dữ liệu submit sang page*/
        $arr_post = [];
        $arr_post['sort'] = 'DESC';
        if($sort=='created-asc'){
            $arr_post['sort'] = 'ASC';
        }
        $arr_post['post_type'] = 'page';
        $arr_post['user_id'] = 0;
        $arr_post['post_status'] = $post_status;
        
        /*end dữ liệu*/

        $post_count = [];
        $post_count['all']= $post->Count_post_status('all', 'page');
        $post_count['public'] = $post->Count_post_status('public', 'page');
        $post_count['pending'] = $post->Count_post_status('pending', 'page');
        $post_count['trash'] = $post->Count_post_status('trash', 'page');
        $post_count['draft'] = $post->Count_post_status('draft', 'page');

        if($type_request == 'ajax'){
            if(!in_array($post_status, $arr_post_status))
                return '{"Response":"False","Redirect":"'.url('admin/page').'"}';
            if(!in_array($select_action, $arr_select_action) && $select_action)
                return '{"Response":"False","Redirect":"'.url('admin/page').'"}';
            if($type == 'action'){
                $count = count($check);
                if($select_action == 'edit' && $count){
                    $output = Array('Response'=>'True','Redirect'=>url('admin/page/edit/'.$check[0]));
                    return $output;
                }else if($select_action == 'delete' && $count){
                    foreach($check as $v){
                        $this->delete_post($v);
                    }
                }else{
                    $post->Action_post($check,$select_action,'page');
                } 
            }
            $posts = $post->Search_post($search, $arr_post);
            $data_view = array();
            $data_view['select_action'] = $select_action;
            $data_view['search']    = $search;
            $data_view['post_status'] = $post_status;
            $data_view['post_count']     = $post_count;
            $data_view['user_id']   = $user_id;
            $data_view['sort']    =   $sort;

            return $this->postView($posts,$data_view);

        }else{
            if(!in_array($post_status, $arr_post_status)){
                 return redirect('admin/post');
            }
            if(!in_array($select_action, $arr_select_action) && $select_action)
                return redirect('admin/post');
            if($select_action){
                $count = count($check);
                if($select_action == 'edit' && $count){
                    return redirect('admin/page/edit/'.$check[0]);
                }else if($select_action == 'delete' && $count){
                    foreach($check as $v){
                        $this->delete_post($v);
                    }
                }else {
                    $post->Action_post($check,$select_action,'page');
                }
            }

        }
         
        /*--End--*/
        if(!in_array($post_status, $arr_post_status))
        {
            return redirect('admin/page');
        }
        $posts_page = [];
        if($search){
            $post_page['search'] = $search;
        }
        if($sort){
            $post_page['sort'] = $sort;
        }
        if($user_id){
                $post_page['user_id'] = $user_id;
            }
        $post_page['post_status'] = $post_status;
        $posts = $post->Search_post($search, $arr_post);
        return view('backend.pages.website.page.listPage',[
            'posts' => $posts,
            'post_count' => $post_count,
            'post_status' => $post_status,
            'search' => $search,
            'sort' => $sort,
            'user_id' => $user_id,
            'pagination' => $post_page,
        ]);
    }

    //Load danh sách kiểu ajax
    private function postView($posts,$data_view = array())
    {
        $objdata = Array('Response'=>'False','Page'=>'','List'=>'');
        $view = view('backend.pages.website.page.listViewPage',[
                'posts'         => $posts,
                'post_count'         => $data_view['post_count'],
                'search'        => $data_view['search'],
                'post_status'   => $data_view['post_status'],
                'user_id'       => $data_view['user_id'],
                'sort'        => $data_view['sort']
            ]);
        $objdata['Page'] = urlencode($posts->render());
        
        if($data_view['search']){
            $objdata['Page'] = urlencode($posts->appends(array('search' => $data_view['search'],'post_status' => $data_view['post_status']))->render());
        }else {
            $objdata['Page'] = urlencode($posts->appends(array('post_status' => $data_view['post_status']))->render());
        }
        $objdata['List'] = urlencode($view);
        if($objdata['List']){
            $objdata['Response'] = 'True';
        }
        if($data_view['select_action'] == 'trash'){
            $objdata['Message'] = 'Xóa bài viết thành công!';
        }
        if($data_view['select_action'] == 'delete'){
            $objdata['Message'] = 'Bài viết đã được xóa vĩnh viễn!';
        }
        if($data_view['select_action'] == 'restore'){
            $objdata['Message'] = 'Khôi phục bài viết thành công!';
        }
        return $objdata;
    }

    //Load view tạo mới trang
    public function create()
    {
        $option = new Option;


        $seo_data = array(
            'seo_url' => 'pages/'
        );   
        /*-- End Seo Url --*/
        $optionComment = $option->getOptionValue_option('comment_open');
        return view('backend.pages.website.page.createPage',
            [
            'seo_data' => $seo_data,
            'optionComment' => $optionComment
            ]);
    }
    
    //Lưu tạo mới
    public function store(Request $request)
    {
        $data = $request->all();
        $post = new Post;
        $post_meta = new PostMeta;
        $_attachment = new Attachment;
        $arr_page = [];
        $post_date   = isset($data['post_date']) ? $data['post_date'] : time() ;
        $title = strip_tags(trim(isset($data['title']) ? $data['title'] : ''));
        $slug = strip_tags(trim(isset($data['slug']) ? $data['slug'] : ''));
        $content = isset($data['content']) ? preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "",$data['content']) : '';
        $excerpt = isset($data['excerpt']) ? get_excerpt($data['excerpt']) : ''; 

        //xử lý thời gian
        $arr_post_date = explode(" ", $post_date);
        $arr_day = explode("/", $arr_post_date[1]);
        $post_date = strtotime(date("$arr_day[1]/$arr_day[0]/$arr_day[2] $arr_post_date[0]"));
        //End xử lý thời gian
        
        /*-- Check Id Post Featured Image --*/
        $featured_image = isset($data['post_image_id']) ? $data['post_image_id'] : null;
        if( $featured_image != null )
        {
            $attachment = $_attachment -> get_attachment_post( $featured_image  );
            if( count($attachment) == 0 )
            {
                $featured_image = '';
            }
        }

        if($slug){
            $slug = str_slug_post('create','page',$slug);
        }else {
            if(strlen($title)==0){
                $slug = str_slug_post('create','page','no title');
            }else{
               $slug = str_slug_post('create','page',$title);
            }
        }
         /*-- End Check Slug --*/
        
        $post->post_slug = $slug;
        $arr_page['post_slug'] = $slug;
        $post->user_id =  Session::get('user_id');
        $arr_page['user_id'] = Session::get('user_id');
        //xử lý thời gian
        $arr_page['post_date'] = $post_date;
        $arr_page['post_modified'] = $post_date;
        
        //xử lý input
        $arr_page['post_title'] = $title;
        $arr_page['post_content'] = $content;
        $arr_page['post_excerpt'] = $excerpt;
        $arrayPostStatus = [
            'public',
            'pending',
            'trash',
            'draft',
        ];
        if( !in_array($data['post_status'],$arrayPostStatus) )
        {
            $data['post_status'] = 'public';
        }
        $arr_page['post_status'] = $data['post_status'];
        $arr_page['post_parent'] = '0';
        $check_post_comment = ['yes','no'];
        if(!in_array($data['post_comment'], $check_post_comment)){
            $data['post_comment'] = 'no';
        }
        $arr_page['comment_status'] = $data['post_comment'];
        $arr_page['post_image'] = $featured_image;
        $arr_page['post_type'] = 'page';

        

        $post_id = $post->Insert_post($arr_page);
        
        $seo_title = trim (isset($data['seo_title']) ? $data['seo_title'] : '');
        $seo_description = trim (isset($data['seo_description']) ? $data['seo_description'] : '');
        $seo_keyword = trim (isset($data['seo_keyword']) ? $data['seo_keyword'] : '');

        $post_meta = new PostMeta;
        $add_metakey = array();
        $add_metakey['seo_title'] = $seo_title;
        $add_metakey['seo_description'] = $seo_description;
        $add_metakey['seo_keyword'] = $seo_keyword;
        $add_metakey['old_post_status'] = $data['post_status'];
        $meta_key = 'seo_data';
        $meta_value = encode_serialize($add_metakey);
        $post_meta -> Insert_postmeta($post_id, $meta_key, $meta_value);
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'page', __FUNCTION__, "$post_id,0,0");
        /* END SAVE DATABASE LOG */
		
        return redirect('admin/page/edit/'.$post_id);
    }
    
    //Load danh sách chỉnh sửa trang
    public function edit($post_id)
    {
        $post = new Post;
        $post_meta = new PostMeta;
        $option = new Option;
        $post = $post->Get_post_id($post_id,'page')->first();
        if( count($post) == 0 )
        {
            return redirect('admin/page');
        }
        
        $seo_data = array();
        $seo_data = $post_meta->Get_postmeta_id($post_id);
        $seo_data['seo_url'] = 'pages/';


        /*-- Data Seo --*/
        // $seoData = [];
        
        // $seoData['title'] = $post->post_title.' - '.$option->Get_option('site_title')->option_value;
        
        // $seoData['url'] = $option->Get_option('site_url')->option_value;    

        //     -- Seo Slug --
        // $seoData['slug'] = $post->post_slug;
        //     /*-- End Seo Slug --*/
            
        //     /*-- Seo Content --*/
        // $seoData['content'] = word_limiter(strip_tags($post->post_content),20);
            /*-- End Seo Content --*/
            
        /*-- End Data Seo --*/
        //$data['seoData'] = $seoData;
        return view('backend.pages.website.page.editPage',[
                'post' => $post,
                'seo_data' => $seo_data
            ]);
    }
    
    //Lưu cập nhật
    public function update($post_id,Request $request)
    {   
        $data = $request->all();
        $post = new Post;
        $post_meta = new PostMeta;
        $_attachment = new Attachment;
        $dataUpdate = array();
        $check_post = $post->Get_post_id($post_id,'page')->first();
        if( count($check_post) == 0 )
        {
            return redirect('admin/page');
        }

        /*-- Check Id Post Featured Image --*/
        $featured_image = isset($data['post_image_id']) ? $data['post_image_id'] : null;
        
        if( $featured_image != null )
        {
            $attachment = $_attachment->get_attachment_post( $featured_image  );

            if( count($attachment) == 0 )
            {
                $featured_image = '';
            }
        }
        /*-- End Check Id Post Featured Image --*/

        $get_slug = $post->Get_post_id($post_id,'page')->value('post_slug');
        $post_date   = isset($data['post_date']) ? $data['post_date'] : time() ;
        $title = strip_tags(trim(isset($data['title'])? $data['title'] : ''));
        $slug  = strip_tags(trim(isset($data['slug']) ? $data['slug']: $title)) ;
        $content = isset($data['content']) ? preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "",$data['content']) : '';
        $excerpt = isset($data['excerpt']) ? get_excerpt($data['excerpt']): '' ;
        if($slug != $get_slug){
            if($slug){
                $slug = str_slug_post('update','page',$slug,$post_id);
            }else {
                if(strlen($title)==0){
                    $slug = str_slug_post('update','page','no title',$post_id);
                }else{
                   $slug = str_slug_post('update','page',$title,$post_id);
                }
            }
        }else {
            $slug = $get_slug;
        }

        $dataUpdate['user_id'] = Session::get('user_id');
        //xử lý thời gian
        $time = time();
        
        $arr_post_date = explode(" ", $post_date);
        $arr_day = explode("/", $arr_post_date[1]);
        $post_date = strtotime(date("$arr_day[1]/$arr_day[0]/$arr_day[2] $arr_post_date[0]"));

        $dataUpdate['post_date'] = $post_date;
        $dataUpdate['post_modified'] = $post_date;
        //xử lý input
        $dataUpdate['post_title'] = $title;
        $dataUpdate['post_slug'] = $slug;
        $dataUpdate['post_content'] =  $content;
        $dataUpdate['post_excerpt'] = $excerpt;
        $arrayPostStatus = [
            'public',
            'pending',
            'trash',
            'draft',
        ];
        if( !in_array($data['post_status'],$arrayPostStatus) )
        {
            $data['post_status'] = 'public';
        }
        $dataUpdate['post_status'] = $data['post_status'];
        $dataUpdate['post_parent'] = '0';
        $arrayCommentStatus = [
            'yes',
            'no',
        ];
        $data['post_comment'] = isset($data['post_comment']) ? $data['post_comment'] : '';
        if( !in_array($data['post_comment'],$arrayCommentStatus) )
        {
            $data['post_comment'] = 'yes';
        }
        $dataUpdate['comment_status'] = $data['post_comment'];
        $dataUpdate['post_image'] = $featured_image;
        $dataUpdate['post_type'] = 'page';
        $dataUpdate['post_id'] = $post_id;
        $post->Update_post($dataUpdate);

        
        //Thêm  post meta
        $seo_title = trim (isset($data['seo_title']) ? $data['seo_title'] : '');
        $seo_description = trim (isset($data['seo_description']) ? $data['seo_description'] : '');
        $seo_keyword = trim (isset($data['seo_keyword']) ? $data['seo_keyword'] : '');

        $meta_value = array();
        $meta_value['seo_title'] = $seo_title;
        $meta_value['seo_description'] = $seo_description;
        $meta_value['seo_keyword'] = $seo_keyword;
        $meta_value['old_post_status'] = $data['post_status'];
        $meta_value = encode_serialize($meta_value);
        $post_meta -> Update_postmeta($post_id , 'seo_data', $meta_value);
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'page', __FUNCTION__, "$post_id,0,0");
        /* END SAVE DATABASE LOG */
		
        return redirect('admin/page/edit/'.$post_id);
    }

    //Xóa nháp trang
    public function trash($post_id, $type_request='')
    {
        $post = new Post;
        $post->Trash_post($post_id, 'page');
        if($type_request == 'ajax'){
            return '{"Response":"True","Message":"Xóa bài viết thành công"}';
        }else {
            return redirect('admin/page');
        }
    }

    //Bỏ xóa nháp trang
    public function restore($post_id,$type_request='')
    {
        $post = new Post;
        $post->Restore_post($post_id,'page');
        if($type_request == 'ajax'){
            return '{"Response":"True","Message":"Khôi phục bài viết thành công"}';
        }else {
            return redirect('admin/page');
        }
    }

    //Xóa trang
    public function delete_post($post_id = '')
    {
        $post = new Post;
        $post_meta = new PostMeta;
        $check = $post-> Get_post_id($post_id,'page');
        if(!$check){
            return false;
        }
        $post->Delete_post($post_id, 'page');
        $post_meta -> Delete_postmeta( $post_id);
    } 
}
