<?php

namespace App\Http\Controllers\backend\website;

use Illuminate\Http\Request;
//use Request;
use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;
use Illuminate\Database\Query\Builder;

/*-- Call Other Controller --*/
use App\Http\Controllers\backend\attachment\AttachmentController;
/*-- End Call Other Controller --*/

/*
 * Use Library of Laravel
 */
use App\Models\Post;
use App\Models\PostMeta;
use App\Models\Term;
use App\Models\Termmeta;
use App\Models\Option;
use App\Models\Attachment;
use App\Models\Taxonomy;
use App\Models\TaxonomyRelationships;
use App\Models\TaxonomyMeta;
use Validator;
use DB;
use Session;

class PostController extends BackendController
{
    //Load danh sách bài viết
    public function index(Request $request)
    {   
        $data = $request->all();
        $post = new Post;
        $taxonomy_relationships = new TaxonomyRelationships;
        $search = isset($data['search']) ? $data['search'] : '';
        $select_action = isset($data['select_action']) ? $data['select_action'] : '';
        $check = isset($data['check']) ? $data['check'] : [];
        $type = isset($data['type']) ? $data['type'] : '';
        $post_status = isset($data['post_status']) ? $data['post_status'] : 'all';
        $sort = isset($data['sort']) ? $data['sort'] : 'created-desc';
        $user_id = isset($data['user_id']) ? $data['user_id'] : 0;
        $category = isset($data['category']) ? $data['category'] : '';

        //Check sort

        $arr_sort = ['created-asc','created-desc'];
        if(!in_array($sort, $arr_sort)){
            $sort = 'created-desc';
        }
        /*Kiếm tra dữ liệu cho postSearch*/
        $arr_post = [];
        $arr_post['sort'] = 'DESC';
        if($sort=='created-asc'){
            $arr_post['sort'] = 'ASC';
        }
        $arr_post['post_status'] = $post_status;
        $arr_post['user_id'] = $user_id;
        $arr_post['post_type'] = 'post';
        $arr_post['category'] = $category;
        /*End kiểm tra*/
        
        /*check post_status */
        $arr_post_status = ['all','public','pending','draft','trash'];
        $arr_select_action = ['trash','edit','restore','delete'];
        $type_request = '';
        if( $request->isMethod('post') && $request->ajax()){
            $type_request = 'ajax';
        }
        /* End check */

        /*--Đếm số bài mỗi loại-*/
        $post_count = [];
        
        //Lấy bài viết từ DB;
        
        /*--End--*/
        if($type_request == 'ajax')
        {
            if(!in_array($post_status, $arr_post_status))
                return '{"Response":"False","Redirect":"'.url('admin/post').'"}';
            if(!in_array($select_action, $arr_select_action) && $select_action)
                return '{"Response":"False","Redirect":"'.url('admin/post').'"}';
            if($type == 'action'){
                $count = count($check);
                if($select_action == 'edit' && $count){
                    $output = Array('Response'=>'True','Redirect'=>url('admin/post/edit/'.$check[0]));
                    return $output;
                }else if($select_action == 'delete' && $count){
                    foreach($check as $v){
                        $this->delete_post($v);
                    }
                }else{
                    $post->Action_post($check, $select_action, 'post');
                }
            }

            $post_count = $this->getPostCount();

            $data_view = array();
            $data_view['select_action'] = $select_action;
            $data_view['search']    = $search;
            $data_view['post_status'] = $post_status;
            $data_view['post_count']     = $post_count;
            $data_view['user_id']   = $user_id;
            $data_view['sort']    =   $sort;

            //$posts = $post->Search_post($search,$arr_post);
            $posts = $taxonomy_relationships ->  Get_post_search($search,$arr_post);
            return $this->postView($posts,$data_view);
        }else
        {
            $post_count = $this->getPostCount();
            if(!in_array($post_status, $arr_post_status))
                return redirect('admin/post');
            if(!in_array($select_action, $arr_select_action) && $select_action)
                return redirect('admin/post');
            if($select_action)
            {
                $count = count($check);
                if($select_action == 'edit' && $count){
                    return redirect('admin/post/edit/'.$check[0]);
                }else if($select_action == 'delete' && $count){
                    $this->delete_post($v);
                }else{
                    $post->Action_post($check, $select_action, 'post');
                }

            }
            $posts_page = [];
            if($search){
                $post_page['search'] = $search;
            }
            if($user_id){
                $post_page['user_id'] = $user_id;
            }
            //return $search;
            if($sort){
                $post_page['sort'] = $sort;
            }
            if($category){
                $post_page['category'] = $category;
            }
            $post_page['post_status'] = $post_status;

           // $posts = $post->Search_post($search,$arr_post);
            $posts = $taxonomy_relationships ->  Get_post_search($search,$arr_post);
            return view('backend.pages.website.post.listPost',[
                'posts' => $posts,
                'post_count' => $post_count,
                'post_status' => $post_status,
                'search' => $search,
                'sort' => $sort,
                'user_id' => $user_id,
                'pagination' => $post_page
            ]);
        }
    }

    //Đếm số bài viết theo trạng thái
    private function getPostCount()
    {
        $post = new Post;
        $post_count = [];
        $post_count['all']= $post->Count_post_status('all','post');
        $post_count['public'] = $post->Count_post_status('public','post');
        $post_count['pending'] = $post->Count_post_status('pending','post');
        $post_count['trash'] = $post->Count_post_status('trash','post');
        $post_count['draft'] = $post->Count_post_status('draft','post');
        return $post_count;
    }

    //Load danh sách bài viết theo ajax
    private function postView($posts,$data_view = array())
    {
        $objdata = Array('Response'=>'False','Page'=>'','List'=>'');
        $view = view('backend.pages.website.post.listViewPost',[
                'posts'         => $posts,
                // 'post_count'    => $data_view['post_count'],
                'search'        => $data_view['search'],
                'post_status'   => $data_view['post_status'],
                'user_id'       => $data_view['user_id'],
                'sort'        => $data_view['sort']
            ]);
        $objdata['Page'] = urlencode($posts->render());
        
        if($data_view['search']){
            $objdata['Page'] = urlencode($posts->appends(array('search' => $data_view['search'],'post_status' => $data_view['post_status'], 'user_id' => $data_view['user_id'],   ))->render());
        }else {
            $objdata['Page'] = urlencode($posts->appends(array('post_status' => $data_view['post_status'], 'user_id' => $data_view['user_id'],))->render());
        }
        if($data_view['post_count']){
            $objdata['ActionStatus'] = $data_view['post_count'];
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
            $objdata['Message'] = 'Bài viết đã được khôi phục!';
        }
        return $objdata;
    }
    
    //Load view tạo bài viết
    public function create()
    {
		/*-- Featured Image --*/
        /*-- End Featured Image --*/
        $option = new Option;
        $taxonomy = new Taxonomy;
        /*-- Data Seo --*/
        $seoData = [];
        
            /*-- Seo Title --*/
        $seoData['title'] = $option->getOptionValue_option('site_title');
            /*-- End Seo Title --*/
            
            /*-- Seo Url --*/
        $seoData['url'] = $option->getOptionValue_option('site_url');
            /*-- End Seo Url --*/
        /*-- End Data Seo --*/

        $prefixSlug = $seoData['url'];


		$term_categorys = $taxonomy->Get_taxonomy_type('post_category');
        $cat_default = $option->getOptionValue_option('default_post_category');
        $optionComment = $option->getOptionValue_option('comment_open');



        return view('backend.pages.website.post.createPost',
            [
                'term_categorys'=>$term_categorys,
                'cat_default'=>$cat_default,
				//'listFeaturedImage' => $listFeaturedImage,
                'seoData' => $seoData,
                'optionComment' => $optionComment,
                'prefixSlug' => $prefixSlug,
            ]);
    }

    //Lưu bài viết
    public function store(Request $request)
    {
        $data = $request->all();
        // $validator = Validator::make($data,[
        //     'title'=>'required',
           
        // ],[
        //     'title.required'=>'Chưa nhập tiêu đề',
           
        // ]);
        // if( $validator->fails() )
        // {
        //     return redirect('admin/post/create')->withErrors($validator)->withInput();
        // }
        
        $post = new Post;
        $post_meta = new PostMeta;
        $taxonomy = new Taxonomy;
        $taxonomy_meta = new TaxonomyMeta;
        $taxonomy_relationships = new TaxonomyRelationships;
        $_attachment = new Attachment;
        $option = new Option;


        $arr_post = [];
        $post_title = strip_tags(trim( isset($data['title']) ? $data['title']: ''));
        $slug       = strip_tags(trim(isset($data['slug'])? $data['slug']: ''));
        $post_date   = isset($data['post_date']) ? $data['post_date'] : time() ;
        $post_content = isset($data['content']) ? preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "",$data['content']) : '';
        $excerpt = isset($data['excerpt']) ? get_excerpt($data['excerpt']) : '';
        //xử lý thời gian
        $arr_post_date = explode(" ", $post_date);
        //return $arr_post_date;
        $arr_day = explode("/", $arr_post_date[1]);
        $post_date = strtotime(date("$arr_day[2]/$arr_day[1]/$arr_day[0] $arr_post_date[0]"));
        //End xử lý thời gian

        /*-- Check Id Post Featured Image --*/
        $featured_image = isset($data['post_image_id']) ? $data['post_image_id'] : null;
        if( $featured_image != null )
        {
            $featured_image = '';
        }
        /*-- End Check Id Post Featured Image --*/

        
        //Slug
        if($slug){
            $slug = str_slug_post('create','post',$slug);
        }else {
            if(strlen($post_title)==0){
                $slug = str_slug_post('create','post','no title');
            }else{
               $slug = str_slug_post('create','post',$post_title);
            }
        }

        $arr_post['post_slug'] = $slug;
        //End slug
        $arr_post['user_id'] = Session::get('user_id');
              
        $arr_post['post_date'] = $post_date;
        $arr_post['post_modified'] = $post_date;
        //xử lý input
        $arr_post['post_title'] = $post_title;
        $arr_post['post_content'] = $post_content;
        $arr_post['post_excerpt'] = $excerpt;
        //check post status 
        
        $check_post_status = ['public','pending','draft'];
        if(!in_array($data['post_status'],$check_post_status))
        {
            $data['post_status'] = 'public';
        }
        
        $arr_post['post_status'] = $data['post_status'];
        $arr_post['post_parent']  = '0';
        //check comment
        $check_post_comment = ['yes','no'];
        if(!in_array($data['post_comment'], $check_post_comment)){
            $data['post_comment'] = 'no';
        }
        //$post->comment_status = $data['post_comment'];

        $arr_post['comment_status'] = $data['post_comment'];
        $arr_post['post_image'] = $featured_image;
        $arr_post['post_type'] = 'post';
        $post_id = $post->Insert_post($arr_post);
        
        //Category
        if(isset($data['post_category']))
        {
             foreach ($data['post_category'] as $category)
             {
                //kiểm tra xem ID tồn tại ko (có thì insert vào relationship)
                $check_category = $taxonomy->Get_taxonomy_id('post_category', $category );
                if($check_category)
                {
                    $taxonomy_relationships -> Insert_taxonomy_relationships($category, $post_id);
                    //cập nhật số bài.
                    $count = $taxonomy_relationships -> Count_taxonomy_relationships($category);
                    $taxonomy -> Update_taxonomy_count($category, $count);
                }
            }
        }else{
            //Nếu ko chọn category nào thì sẽ cho vào category mặc định

            $category_default = $option->getOptionValue_option('default_post_category');
            $taxonomy_relationships -> Insert_taxonomy_relationships($category_default, $post_id);
            $count = $taxonomy_relationships -> Count_taxonomy_relationships($category_default);
            $taxonomy -> Update_taxonomy_count($category_default, $count);
        }
 
        //Thêm tag
        $data['newtags'] = trim($data['newtags']);
        if(strlen($data['newtags'])>0)
        {
            $newtags = explode(",", $data['newtags']);
            foreach($newtags as $newtag)
            {
                $newtag = strip_tags(trim($newtag));
                $check_tag = $taxonomy -> Get_taxonomy_name('post_tag',$newtag )->first();
                if($check_tag)
                {
                    $taxonomy_relationships -> Insert_taxonomy_relationships($check_tag->taxonomy_id, $post_id);
                    $count = $taxonomy_relationships -> Count_taxonomy_relationships($check_tag->taxonomy_id);
                    $taxonomy -> Update_taxonomy_count($check_tag->taxonomy_id, $count);
                }
                else
                {
                    $arr_taxonomy = [];
                    $arr_taxonomy['taxonomy_name'] = $newtag;
                    $arr_taxonomy['taxonomy_slug'] = taxonomy_slug_create('post_tag',$newtag);
                    $arr_taxonomy['taxonomy_type'] = 'post_tag';
                    $term_id = $taxonomy->Insert_taxonomy($arr_taxonomy);

                    $arr_taxonomy_meta = [];
                    $meta_value['excerpt'] = '';
                    $meta_value['seo_title'] = '';
                    $meta_value['seo_excerpt'] = '';
                    $meta_value['seo_keyword'] = '';
                    $value = encode_serialize($meta_value);   
                    $taxonomy_meta-> Insert_tax_meta($term_id, 'post_tag_data', $value);

                    //thêm vào relationships
                    $taxonomy_relationships -> Insert_taxonomy_relationships($term_id, $post_id);
                    $count = $taxonomy_relationships -> Count_taxonomy_relationships($term_id);
                    $taxonomy -> Update_taxonomy_count($term_id, $count);
                }
            }
         }
        //end tag
        //featured
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
        addTableLog("App\Models\Logs", Session::get('user_id'), 'post', __FUNCTION__, "$post_id,0,0");
        /* END SAVE DATABASE LOG */
		if($request->ajax()){
            $output = Array('Response'=>'True','Redirect'=>url('admin/post'));
            return $output;
        }
        return redirect('admin/post');
    }

    //Load view chỉnh sửa
    public function edit($post_id)
    {
        $post = new Post;
        $post_meta = new PostMeta;
        $taxonomy = new Taxonomy;
        $option = new Option;
        $tax_relationships = new TaxonomyRelationships;
        //$post = $post->Get_post_id($post_id,'post')->first();
        $post = $post->Get_post_id_join_user($post_id,'post')->first();
        if(!$post){
            return redirect('admin/post');
        }
        if($post->post_status == 'trash'){
            return redirect('admin/post');
        }
        $data = array();
        $term_categorys = $taxonomy->Get_taxonomy_type('post_category');
        $post_categorys = $tax_relationships -> Get_taxonomy_type_post( $post_id , 'post_category' );
        $post_cat = array();
        foreach ($post_categorys as $post_category) {
            $post_cat[] .= $post_category->taxonomy_id;
        }
        
        //Lấy tag
        $post_tags = $tax_relationships -> Get_taxonomy_type_post( $post_id , 'post_tag' );
        $data['tag_name'] = '';
        if($post_tags)
        {
            foreach($post_tags as $post_tag)
            {
                $data['tag_name'].=$post_tag->taxonomy_name.',';
            }
        }
        $tag_name = substr($data['tag_name'],0,-1);
        //End tag
        $data['post'] = $post;
        $data['term_categorys'] = $term_categorys;
        $data['post_cat'] = $post_cat;
        $seo_data = array();
        $seo_data = $post_meta->Get_postmeta_value($post_id,'seo_data');
        
        $seo_data['seo_url'] = $post->post_slug;
        return view('backend.pages.website.post.editPost',[
            'seo_data'=>$seo_data,
            'post' => $post,
            'term_categorys' => $term_categorys,
            'post_cat' => $post_cat,
            'tag_name' => $tag_name
        ]);
    }

    //Lưu cập nhật
    public function update($post_id,Request $request)
    {
        $data = $request->all();
        $post = new Post;
        $post_meta = new PostMeta;
        $taxonomy = new Taxonomy;
        $taxonomy_relationships = new TaxonomyRelationships;
        $taxonomy_meta = new TaxonomyMeta;
        $_attachment = new Attachment ;
        $option = new Option;

        /*Kiểm tra kiểu submit*/
    
        /*End kiểm tra*/

        $check_post = $post->Get_post_id($post_id,'post')->first() ;

        if(count($check_post)==0){
            if($request->ajax()){
                $output = Array('Response'=>'True','Redirect'=>url('admin/post'));
                return $output;
            }else{
                return redirect('admin/post');
            }
            
        }
        
        $category = isset($data['post_category']) ? $data['post_category'] : [];

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

        $get_slug = $post->Get_post_id($post_id,'post')->value('post_slug');
        $slug = strip_tags(trim(isset($data['slug']) ? $data['slug'] : ''));
        $title = strip_tags(trim(isset($data['title']) ? $data['title'] : ''));
        $content = isset($data['content']) ? $data['content'] : '';
        $excerpt = isset($data['excerpt']) ? get_excerpt($data['excerpt']) : '';
        $post_status = isset($data['post_status']) ? $data['post_status'] : '';
        $post_comment = isset($data['post_comment']) ? $data['post_comment'] : '';
        $post_category = isset($data['post_category']) ? $data['post_category'] : '';
        $post_date   = isset($data['post_date']) ? $data['post_date'] : time() ;
        $arr_post = [];
        //Xử lý date 
        $arr_post_date = explode(" ", $post_date);
        $arr_day = explode("/", $arr_post_date[1]);
        $post_date = strtotime(date("$arr_day[2]/$arr_day[1]/$arr_day[0] $arr_post_date[0]"));
        //End xử lý date
        
        if($slug != $get_slug){
            if($slug){
                $slug = str_slug_post('update','post',$slug,$post_id);
            }else {
                if( $data['slug'] == null )
                {
                    if(strlen($data['title'])==0){
                        $slug = str_slug_post('update','post','no title',$post_id);
                    }else{
                       $slug = str_slug_post('update','post',$title,$post_id);
                    }
                }
            }
        }else {
            $slug = $get_slug;
        }
        //End
        $arr_update = array();
        $arr_update['post_slug'] = $slug;
        $arr_update['user_id'] = '1';

        //xử lý thời gian
        $time = time();
        $arr_update['post_date'] = $post_date;
        $arr_update['post_modified'] = $time;
        //xử lý input
        $arr_update['post_title'] = trim($title);
        $arr_update['post_content'] = $content;
        $arr_update['post_excerpt'] = $excerpt;
        //check post status 

        $arr_post_status = ['public','pending','draft'];
        if(!in_array($post_status,$arr_post_status))
        {
            $post_status = 'public';
        }

        $arr_update['post_status'] = $post_status;
        $arr_update['post_parent'] = '0';
        //check comment
        $arr_comment_status = ['yes','no'];
        if(!in_array($post_comment, $arr_comment_status))
        {
            $post_comment = 'no';
        }

        $arr_update['comment_status'] = $post_comment;
        $arr_update['post_image'] = $featured_image;
        $arr_update['post_type'] = 'post';
        $arr_update['post_id'] = $post_id ;
        $post->Update_post($arr_update);

        //Xóa trước khi thêm
        //Lấy danh sách category,tag chứa post vừa update
        $lists = $taxonomy_relationships -> Get_taxonomy_type_post($post_id);
        //xóa list cũ
        $taxonomy_relationships->Delete_taxonomy_relationships_post($post_id);
        //Cập nhật lại số count tags,cate
        foreach($lists as $list){
            //$count = DB::table('qm_term_relationships')->where('term_id',$list->taxonomy_id)->count();
            $count = $taxonomy_relationships -> Count_taxonomy_relationships($list->taxonomy_id);
            //DB::table('qm_term')->where('term_id',$list->taxonomy_id)->update(['count'=>$count]);
            $taxonomy -> Update_taxonomy_count($list->taxonomy_id, $count);
        }
        //
        if(isset($data['post_category']))
        {
             foreach ($data['post_category'] as $category)
             {
                //kiểm tra xem ID tồn tại ko (có thì insert vào relationship)
                $check_category = $taxonomy->Get_taxonomy_id('post_category', $category);
                if($check_category)
                {
                    $taxonomy_relationships -> Insert_taxonomy_relationships($category, $post_id);
                    //cập nhật số bài.
                    $count = $taxonomy_relationships -> Count_taxonomy_relationships($category);
                    $taxonomy -> Update_taxonomy_count($category, $count);
                }
            }
        }else{
            //Nếu ko chọn category nào thì sẽ cho vào category mặc định
            $category_default = $option->getOptionValue_option('default_post_category');
            $taxonomy_relationships -> Insert_taxonomy_relationships($category_default, $post_id);
            $count = $taxonomy_relationships -> Count_taxonomy_relationships($category_default);
            $taxonomy -> Update_taxonomy_count($category_default, $count);
        }

        //Thêm tag
        //Trước khi thêm lại phải xóa tag, đã xử lý trên category
        $data['newtags'] = strip_tags(trim($data['newtags']));
        if(strlen($data['newtags'])>0)
        {   
            //Lấy tag thành mảng
            $newtags = explode(",", $data['newtags']);
            foreach ($newtags as $newtag) 
            {   
                $newtag = strip_tags(trim($newtag));
                    //Kiểm tra tồn tại chưa

                $check_tag = $taxonomy -> Get_taxonomy_name('post_tag', $newtag)->first();
                if($check_tag)
                {
                    //thêm vào relationships
                    $taxonomy_relationships -> Insert_taxonomy_relationships($check_tag->taxonomy_id, $post_id);
                    $count = $taxonomy_relationships -> Count_taxonomy_relationships($check_tag->taxonomy_id);
                    $taxonomy -> Update_taxonomy_count($check_tag->taxonomy_id, $count);
                }
                
                else
                {

                    $arr_taxonomy = [];
                    $arr_taxonomy['taxonomy_name'] = $newtag;
                    $arr_taxonomy['taxonomy_slug'] = taxonomy_slug_create('post_tag',$newtag);
                    $arr_taxonomy['taxonomy_type'] = 'post_tag';
                    $term_id = $taxonomy->Insert_taxonomy($arr_taxonomy);

                    $arr_taxonomy_meta = [];
                    $meta_value['excerpt'] = '';
                    $meta_value['seo_title'] = '';
                    $meta_value['seo_excerpt'] = '';
                    $meta_value['seo_keyword'] = '';
                    $value = encode_serialize($meta_value);   
                    $taxonomy_meta-> Insert_tax_meta($term_id, 'post_tag_data', $value);

                    //thêm vào relationships
                    $taxonomy_relationships -> Insert_taxonomy_relationships($term_id, $post_id);
                    $count = $taxonomy_relationships -> Count_taxonomy_relationships($term_id);
                    $taxonomy -> Update_taxonomy_count($term_id, $count);
                }
            }
        }
        //end tag

        //Postmeta
        $update_metakey = array();
        $seo_title = strip_tags(trim(isset($data['seo_title']) ? $data['seo_title'] : ''));
        $seo_description = strip_tags(trim(isset($data['seo_description']) ? $data['seo_description'] : ''));
        $seo_keyword = strip_tags(trim(isset($data['seo_keyword']) ? $data['seo_keyword'] : ''));
        $update_metakey['seo_title'] = $seo_title;
        $update_metakey['seo_description'] = $seo_description;
        $update_metakey['seo_keyword'] = $seo_keyword;
        $update_metakey['old_post_status'] = $data['post_status'];
        $meta_value = encode_serialize($update_metakey);
        $post_meta -> Update_postmeta($post_id, 'seo_data', $meta_value);
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'post', __FUNCTION__, "$post_id,0,0");
        /* END SAVE DATABASE LOG */
		if($request->ajax()){
            $output = Array('Response'=>'True','Redirect'=>url('admin/post/edit/'.$post_id));
            return $output;
        }else{
            return redirect('admin/post/edit/'.$post_id);
        }
    }

    //Xóa nháp bài viết
    public function trash($post_id, $type_request='')
    {
        $post = new Post;
        $post->Trash_post($post_id, 'post');
        if($type_request == 'ajax'){
            return '{"Response":"True","Message":"Xóa bài viết thành công"}';
        }else {
            return redirect('admin/post');
        }
    }
    
    //Xóa bài viết
    public function delete_post( $post_id = '')
    {
        $post = new Post;
        $post_meta = new PostMeta;
        $taxonomy = new Taxonomy;
        $taxonomy_relationships = new TaxonomyRelationships;
        $check = $post ->Get_post_id($post_id, 'post')->first();
        if(!$check){
            return false;
        }
        //xoa trong post
        $post->Delete_post($post_id, 'post');
        //Xóa trong post meta
        $post_meta->Delete_postmeta( $post_id);
        //Lấy danh sách category,tag chứa post vừa xóa
        $lists = $taxonomy_relationships -> Get_taxonomy_type_post($post_id);
        //xóa list cũ
        $taxonomy_relationships->Delete_taxonomy_relationships_post($post_id);
        //Cập nhật lại số count tags,cate
        foreach($lists as $list){
            //$count = DB::table('qm_term_relationships')->where('term_id',$list->taxonomy_id)->count();
            $count = $taxonomy_relationships -> Count_taxonomy_relationships($list->taxonomy_id);
            //DB::table('qm_term')->where('term_id',$list->taxonomy_id)->update(['count'=>$count]);
            $taxonomy -> Update_taxonomy_count($list->taxonomy_id, $count);
        }
        return true;
    }
    
    //Lấy bài viết theo user
}
