<?php

namespace App\Http\Controllers\backend\website\post;

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
use App\Models\Postmeta;
use App\Models\Term;
use App\Models\Termmeta;
use App\Models\Option;
use App\Models\Attachment;
use Validator;
use DB;
use Session;

class PostController extends BackendController
{
    
    public function index(Request $request)
    {
        $data = $request->all();

        $search = isset($data['search']) ? $data['search'] : '';
        $select_action = isset($data['select_action']) ? $data['select_action'] : '';
        $check = isset($data['check']) ? $data['check'] : [];
        $type = isset($data['type']) ? $data['type'] : '';
        $post_status = isset($data['post_status']) ? $data['post_status'] : 'all';
        $sortBy = isset($data['sortBy']) ? $data['sortBy'] : 'created-desc';
        $user_id = isset($data['user_id']) ? $data['user_id'] : '';
        //Check sortBy
        $arr_sortBy = ['created-asc','created-desc'];
        if(!in_array($sortBy, $arr_sortBy)){
            $sortBy = 'created-desc';
        }
        //$check post_status
        $arr_post_status = ['all','public','pending','draft','trash'];
        $type_request = '';
        if( $request->isMethod('post') && $request->ajax()){
            $type_request = 'ajax';
        }

        /*--Đếm số bài mỗi loại-*/
        $post_count = [];
        $post_count['all']= Post::Count_post_status('all');
        $post_count['public'] = Post::Count_post_status('public');
        $post_count['pending'] = Post::Count_post_status('pending');
        $post_count['trash'] = Post::Count_post_status('trash');
        $post_count['draft'] = Post::Count_post_status('draft');
        /*--End--*/

        if($type_request == 'ajax')
        {
            if(!in_array($post_status, $arr_post_status))
                return '{"Response":"False","Redirect":"'.url('admin/post').'"}';
            if($type == 'action'){
                $count = count($check);
                if($select_action == 'edit' && $count){
                    $output = Array('Response'=>'True','Redirect'=>url('admin/post/edit/'.$check[0]));
                    return $output;
                }else if($select_action == 'trash' && $count){
                    foreach ($check as $c) 
                    {
                         $this->trash($c,$type_request);
                    }
                }
            }
            $posts = $this->postActionSearch($search, $post_status,$sortBy,$user_id);
            $data_view = array();
            $data_view['select_action'] = $select_action;
            $data_view['search']    = $search;
            $data_view['post_status'] = $post_status;
            $data_view['count']     = $count;
            $data_view['user_id']   = $user_id;
            $data_view['sortBy']    =   $sortBy;
            return $this->postView($posts,$data_view);
        }else
        {
            if(!in_array($post_status, $arr_post_status))
                return redirect('admin/post');
            if($select_action)
            {
                $count = count($check);
                if($select_action == 'edit' && $count){
                    return redirect('admin/post/edit/'.$check[0]);
                }else if($select_action == 'trash' && $count){
                    $this->postAction($check,'trash',$request);
                }else if($select_action == 'restore' && $count){
                    $this->postAction($check, 'restore', $request);
                }else if($select_action == 'delete' && $count){
                    $this->postAction($check, 'delete', $request);
                }

        //         if($post_action =='trash'){
        //     foreach ($checks as $check) 
        //     {
        //          DB::table('qm_post')->where('post_type','post')->where('post_id',$check)->update(['post_status' => $post_action]);
        //     }
        //      //return redirect('admin/post');
        // }else if($post_action == 'edit'){
        //     return redirect('admin/post/edit/'.$checks[0]);
        // }

                if(($select_action == 'edit' || $select_action == 'trash' ) && $count){
                    return  $this->postAction($check,$select_action, $request);
                }
                
            }
            $posts = $this->postActionSearch($search, $post_status,$sortBy,$user_id);
           
            return view('backend.pages.website.post.listPost',[
                'posts' => $posts,
                'post_count' => $post_count,
                'post_status' => $post_status,
                'search' => $search,
                'sortBy' => $sortBy,
                'user_id' => $user_id
            ]);
        }

    }

    private function postActionSearch($search = '', $post_status = 'all', $sortBy = 'created-desc',$user_id = '')
    {

        $arr_post_status = ['public', 'pending' ,'trash' , 'draft'] ;
        $arr_sortBy = [ 'created-asc','created-desc' ];
        $check_user = DB::table('qm_user')->where('user_id',$user_id)->get();
        if($sortBy == 'created-asc'){
            $sortBy = 'ASC';
        }else{
            $sortBy = 'DESC';
        }
        if(count($check_user)==1)
        {
            $posts = DB::Table('qm_post')
                      ->join('qm_user','qm_post.user_id','=','qm_user.user_id')
                      ->where('qm_post.post_type','post')
                      ->where('qm_post.user_id',$user_id)
                      ->where('qm_post.post_title','like','%'.$search.'%')
                      ->orderBy('qm_post.post_id',$sortBy)
                      ->paginate(10);
            return $posts;
        }
        if(in_array($post_status,$arr_post_status))
        {
            $posts = DB::Table('qm_post')
                  ->join('qm_user','qm_post.user_id','=','qm_user.user_id')
                  ->where('qm_post.post_type','post')
                  ->where('qm_post.post_status',$post_status)
                  ->where('qm_post.post_title','like','%'.$search.'%')
                  ->orderBy('qm_post.post_date',$sortBy)
                  ->paginate(10);
            return $posts;
           
        }
        $posts = DB::Table('qm_post')
                      ->join('qm_user','qm_post.user_id','=','qm_user.user_id')
                      ->where('qm_post.post_type','post')
                      ->where('qm_post.post_status','<>','trash')
                      ->where('qm_post.post_title','like','%'.$search.'%')
                      ->orderBy('qm_post.post_id',$sortBy)
                      ->paginate(10);
        return $posts;

    }

    private function postAction($checks,$post_action, $type_request)
    {

        /*--Action--*/
        $check_error = 0;
        if(count($checks)==0)
        {
             //return redirect('admin/post');
            return $check_error = 1;
        }
         
        $count = DB::table('qm_post')->where('post_type','post')->whereIn('post_id',$checks)->count();
        if( $count != count($checks))
        {
             //return redirect('admin/post');
            return $check_error = 1;
        }
        $arr_action = ['trash','edit','delete','restore'];
        if(!in_array($post_action, $arr_action))
        {
            return redirect('admin/post');
        }
        if($post_action =='trash'){
            foreach ($checks as $check) 
            {
                 DB::table('qm_post')->where('post_type','post')->where('post_id',$check)->update(['post_status' => 'trash']);
            }
             //return redirect('admin/post');
        }else if($post_action == 'restore'){
            foreach($checks as $check){
                DB::table('qm_post')->where('post_type','post')->where('post_id',$check)->update(['post_status' => 'public']);
            }
        }else if($post_action == 'delete'){
            foreach( $checks as $check ){
                $this->destroy($check);
            }
        }else if($post_action == 'edit'){
            return redirect('admin/post/edit/'.$checks[0]);
        }

        /*--End action--*/
        //  //Trả kết quả
        // if($request->ajax()){
        //     if($check_error ==1 )
        //     {
        //         return respones_redirect($type_request,'admin/post','{"Response":"False","Message":"Xóa bài viết thất bại"}');
        //     }
        //     else
        //     {
        //         return respones_redirect($type_request,'admin/post','{"Response":"True","Message":"Xóa bài viết thành công."}');
        //     }
        // }
        return redirect('admin/post');
    }

    private function postView($posts,$data_view = array())
    {
        $objdata = Array('Response'=>'False','Page'=>'','List'=>'');
        $view = view('backend.pages.website.post.listPost',[
                'posts'         => $posts,
                'count'         => $data_view['count'],
                'search'        => $data_view['search'],
                'post_status'   => $data_view['post_status'],
                'user_id'       => $data_view['user_id'],
                'sortBy'        => $data_view['sortBy']
            ]);
        $objdata['Page'] = urlencode($posts->render());
        
        if($data_view['search']){
            $objdata['Page'] = urlencode($attachments->appends(array('search' => $data_view['search'],'post_status' => $data_view['post_status']))->render());
        }else {
            $objdata['Page'] = urlencode($attachments->appends(array('post_status' => $data_view['post_status']))->render());
        }
        $objdata['List'] = urlencode($view);
        if($objdata['List']){
            $objdata['Response'] = 'True';
        }
        if($data_view['select_action'] == 'trash'){
            $objdata['Message'] = 'Xóa bài viết thành công!';
        }
        return $objdata;
    }
    
    public function create()
    {
		/*-- Featured Image --*/
        //$attachment = new AttachmentController;
        //$listFeaturedImage = $attachment->getDataImage();
        //$listFeaturedImage = $attachment->getImage();
        /*-- End Featured Image --*/
        
        /*-- Data Seo --*/
        $seoData = [];
        
            /*-- Seo Title --*/
        $seoData['title'] = Option::where([
            'option_name' => 'site_title',
        ])->first()->option_value;
            /*-- End Seo Title --*/
            
            /*-- Seo Url --*/
        $seoData['url'] = Option::where([
            'option_name' => 'site_url',
        ])->first()->option_value;
            /*-- End Seo Url --*/
            
        /*-- End Data Seo --*/
		
        $term_categorys = Term::where('term_type','post_category')->get();
        $option=DB::table('qm_option')->where('option_name','default_post_category')->first();
        $cat_default = $option->option_value;
        return view('backend.pages.website.post.createPost',
            [
                'term_categorys'=>$term_categorys,
                'cat_default'=>$cat_default,
				//'listFeaturedImage' => $listFeaturedImage,
                'seoData' => $seoData,
            ]);
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        $post = new Post;
        $post_meta = new Postmeta;
        $arr_post = [];
         /*-- Validator --*/

        // $validator = Validator::make($data,[
        //     'title'=>'required',
        // ],[
            
        //     'title.required'=>'Tiêu đề không được để trống',
        // ]);
        // if( $validator->fails() )
        // {
        //     return redirect('admin/post/create')->withErrors($validator)->withInput();
        // }
        
        /*-- End Validator --*/
        $title = strip_tags(trim( isset($data['title']) ? $data['title']: ''));
       
        /*-- Check Id Post Featured Image --*/
        $post_featured_image = isset($data['post_featured_image']) ? $data['post_featured_image'] : null;
        if( $post_featured_image !== null )
        {
            $attachment = Attachment::where('attachment_id',$post_featured_image)->where('attachment_type','image')->first();
            if( count($attachment) == 0 )
            {
                return redirect('admin/post');
            }
        }
        /*-- End Check Id Post Featured Image --*/

        //Kiểm tra dữ liệu đầu vào category
        if(isset($data['post_category']))
        {
            foreach($data['post_category'] as $category)
            {
                $check = DB::table('qm_term')->where('term_type','post_category')->where('term_id',$category)->first();
                if(!$check)
                {
                    return redirect('admin/post');
                }
            }
        }
        //End kiểm tra

        //Kiểm tra nút submit
        if( $data['submit'] != 0 && $data['submit']!= 1 ){
            return redirect('admin/post');
        }
        //End submit
        $data['title'] = strip_tags(trim($data['title']));
        if( $data['slug'] == null )
        {
            if(strlen($data['title'])==0){
                $data['slug'] = 'no title';
            }else{
                $data['slug'] = $data['title'];
            }
        }
        $data['slug'] = str_slug($data['slug']);
        $_slug = $data['slug'];
        $_slugUndercore = $_slug.'-';
        $_posts = Post::where('post_slug',$_slug)->get();
        $i = 1;
        while( count($_posts) >=1 )
        {
            //
            $_slug = $_slugUndercore.$i;
            $_posts = Post::where('post_slug',$_slug)->get();
            $i++;
        }
		$data['slug'] = $_slug;
        $post->post_slug = $data['slug'];
      
        //End slug
        $post->user_id = Session::get('user_id');
      
        //xử lý thời gian
        $post_date   = isset($data['post_date']) ? $data['post_date'] : time() ;
        $arr_post_date = explode(" ", $post_date);
        //return $arr_post_date;
        $arr_day = explode("/", $arr_post_date[1]);
        $post_date = strtotime(date("$arr_day[2]/$arr_day[1]/$arr_day[0] $arr_post_date[0]"));
        //End xử lý thời gian
      
        $post->post_date = $post_date;
        $post->post_modified = $post_date;
     
        //xử lý input
        $post->post_title = strip_tags(trim($data['title']));
        $arr_post['post_title'] = strip_tags(trim($data['title']));
        $post->post_content =  preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "",$data['content']); 
        $arr_post['post_content'] = $post_content;
        //Giao diện chưa có gáng tạm
        $excerpt = isset($data['excerpt']) ? $data['excerpt'] : ''; 
        if( strlen($excerpt)==0 )
        {
            $excerpt = word_limiter($data['content'],30);
        }else{
            $excerpt = strip_tags($excerpt);
        }
        $post->post_excerpt = $excerpt;
        $arr_post['excerpt'] = $excerpt;
        //check post status 
        if( $data['submit'] == 0)
        {
            $data['post_status'] = 'draft';
        }else
        {
            $check_post_status = ['public','pending','draft'];
            if(!in_array($data['post_status'],$check_post_status))
            {
                $data['post_status'] = 'public';
            }
        }
        $post->post_status = $data['post_status'];
     
        $post->post_parent = '0';
        //check comment
        $check_post_comment = ['yes','no'];
        if(!in_array($data['post_comment'], $check_post_comment)){
            $data['post_comment'] = 'no';
        }
        $post->comment_status = $data['post_comment'];
        
        $post->post_type = 'post';
   
        $post->save();
        $post_id = $post->id;
      
       

        //Category
        $i = 0;
        if(isset($data['post_category']))
        {
             foreach ($data['post_category'] as $category)
             {
                //kiểm tra xem ID tồn tại ko (có thì insert vào relationship)
                $check_category=DB::table('qm_term')->where('term_type','post_category')->where('term_id',$category)->first();
                if($check_category)
                {
                    $i = $i+1;
                    DB::table('qm_term_relationships')->insert(['post_id'=>$post_id,'term_id'=>$category]);
                    //cập nhật số bài.
                    $count = DB::table('qm_term_relationships')->where('term_id',$category)->count();
                    DB::table('qm_term')->where('term_id',$category)->update(['count'=>$count]);  
                }
            }
        }
        //Nếu ko chọn category nào thì sẽ cho vào category mặc định
        if( $i == 0 && strlen(trim($data['newcategory'])) == 0)
        {
            $category_default = DB::table('qm_option')->where('option_name','default_post_category')->first();
            DB::table('qm_term_relationships')->insert(['post_id'=>$post_id,'term_id'=>$category_default->option_value]);
            $count = DB::table('qm_term_relationships')->where('term_id',$category_default->option_value)->count();
            DB::table('qm_term')->where('term_id',$category_default->option_value)->update(['count'=>$count]);
        }
        //thêm category
        $data['newcategory'] = strip_tags(trim($data['newcategory']));
        if(strlen($data['newcategory'])>0){
            $data['slug'] = slug_create('post_category', $data['newcategory']);
            //Kiểm tra parent được chọn tồn tại ko
            $newcategory_parent = DB::table('qm_term')->where('term_type','post_category')->where('term_id',$data['newcategory_parent'])->first();
            if(!$newcategory_parent)
            {
                $data['newcategory_parent'] = 0;
            }
            $term = new Term;
            $term->name = $data['newcategory'];
            $term->parent_id = $data['newcategory_parent'];
            $term->slug = $data['slug'];
            $term->term_type = 'post_category';
            $term->save();
            $term_id = $term->id;
            //Thêm vào term meta;
            $term_meta = new Termmeta;
            $meta_key = array();
            $meta_value['excerpt'] = '';
            $meta_value['seo_title'] = '';
            $meta_value['seo_description'] = '';
            $meta_value['seo_keyword'] = '';
            $term_meta->term_id = $term_id;
            $term_meta->meta_key = 'post_category_data';
            $term_meta->meta_value = encode_serialize($meta_value);
            $term_meta->save();
            //Thêm vào term_relationships
            DB::table('qm_term_relationships')->insert(['term_id'=>$term_id,'post_id'=>$post_id]);
            $count = DB::table('qm_term_relationships')->where('term_id',$term_id)->count();
            DB::table('qm_term')->where('term_id',$term_id)->where('term_type','post_category')->update(['count' => $count]);

        }
        //end category 

        //Thêm tag
        $data['newtags'] = trim($data['newtags']);
        if(strlen($data['newtags'])>0)
        {
            $newtags = explode(",", $data['newtags']);
            foreach($newtags as $newtag)
            {
                $newtag = strip_tags(trim($newtag));
                $check_tag=DB::table('qm_term')->where('term_type','post_tag')->where('name',$newtag)->first();
                if($check_tag)
                {
                    DB::table('qm_term_relationships')->insert(['post_id'=>$post_id,'term_id'=>$check_tag->term_id]);
                    $count = DB::table('qm_term_relationships')->where('term_id',$check_tag->term_id)->count();
                    DB::table('qm_term')->where('term_id',$check_tag->term_id)->update(['count'=>$count]);
                }
                else
                {
                    $term = new Term;
                    $term->name = $newtag;
                    $data['slug'] = slug_create('post_tag', $newtag);
                    $term->slug = $data['slug'];
                    $term->term_type = 'post_tag';
                    $term->save();
                    $term_id = $term->id;

                    //thêm vào term_meta   
                    $term_meta = new Termmeta;
                    $meta_value['excerpt'] = '';
                    $value = encode_serialize($meta_value);   
                    $term_meta->term_id = $term_id;
                    $term_meta->meta_key = 'post_tag_data';
                    $term_meta->meta_value = $value;
                    $term_meta->save();

                    //thêm vào relationships
                    DB::table('qm_term_relationships')->insert(['term_id'=>$term_id,'post_id'=>$post_id]);
                    $count = DB::table('qm_term_relationships')->where('term_id',$term_id)->count();
                    DB::table('qm_term')->where('term_id',$term_id)->update(['count'=>$count]);
                }
            }
         }
        //end tag
        //featured
        $seo_title = trim (isset($data['seo_title']) ? $data['seo_title'] : '');
        $seo_description = trim (isset($data['seo_description']) ? $data['seo_description'] : '');
        $seo_keyword = trim (isset($data['seo_keyword']) ? $data['seo_keyword'] : '');

        $post_meta = new Postmeta;
        $add_metakey = array();
        $add_metakey['seo_title'] = $seo_title;
        $add_metakey['seo_description'] = $seo_description;
        $add_metakey['seo_keyword'] = $seo_keyword;
        $add_metakey['post_featured_image'] = $post_featured_image;
        $post_meta->post_id = $post_id;
        $post_meta->meta_key = 'post_data';
        $post_meta->meta_value = encode_serialize($add_metakey);
        $post_meta->save();
		
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'post', __FUNCTION__, "$post_id,0,0");
        /* END SAVE DATABASE LOG */
		
        return redirect('admin/post');
    }
    
    public function edit($post_id)
    {
        //$post = DB::table('qm_post')->where('post_type','post')->where('post_id',$post_id)->first();
        $post = Post::Get_post_id($post_id)->first();
        if(!$post){
            return redirect('admin/post');
        }
        // if( count($post) == 0 ){
        //     return redirect('admin/post');
        // }
        if($post->post_status == 'trash'){
            return redirect('admin/post');
        }
        $data = array();
        //$post_metas = Postmeta::where('post_id',$post_id)->get();
        $term_categorys = Term::where('term_type','post_category')->get();
        $post_categorys = DB::table('qm_term')->join('qm_term_relationships','qm_term.term_id','=','qm_term_relationships.term_id')->where('qm_term_relationships.post_id',$post_id)->get();
        $post_cat = array();
        foreach ($post_categorys as $post_category) {
            $post_cat[] .= $post_category->term_id;
        }
        
        //Lấy tag
        //$term_tags = Term::where('term_type','post_tag')->get(); Term tag đang được xây dựng cho nhiều tag
        $post_tags = DB::table('qm_term')->join('qm_term_relationships','qm_term.term_id','=','qm_term_relationships.term_id')
        ->where('qm_term_relationships.post_id',$post_id)->where('qm_term.term_type','post_tag')->get();
        $data['tag_name'] = '';
        if($post_tags)
        {
            foreach($post_tags as $post_tag)
            {
                $data['tag_name'].=$post_tag->name.',';
            }
        }
        $data['tag_name'] = substr($data['tag_name'],0,-1);
        //End tag
        $post_data = Postmeta::where('post_id',$post_id)->where('meta_key','post_data')->first();
        $seo = decode_serialize($post_data->meta_value);
        
        $data['post'] = $post;
        $data['term_categorys'] = $term_categorys;
        $data['post_cat'] = $post_cat;
        $data['seo'] = $seo;

        /*-- Get Image Feature --*/
        $data['imageFeature'] = '';
        if( strlen($data['seo']['post_featured_image']) > 0 )
        {
            $query = Attachment::where('attachment_id',$data['seo']['post_featured_image'])->where('attachment_type','image')->first();
            if( $query != null )
            {
                $data['imageFeature'] = $query->attachment_url;
            }
        }
        /*-- End Get Image Feature --*/
        
        /*-- Data Seo --*/
        $seoData = [];
        
            /*-- Seo Title --*/
        $seoData['title'] = $post->post_title.' - '.Option::where([
            'option_name' => 'site_title',
        ])->first()->option_value;
            /*-- End Seo Title --*/
            
            /*-- Seo Url --*/
        $seoData['url'] = Option::where([
            'option_name' => 'site_url',
        ])->first()->option_value;
            /*-- End Seo Url --*/
            
            /*-- Seo Slug --*/
        $seoData['slug'] = $post->post_slug;
            /*-- End Seo Slug --*/
            
            /*-- Seo Content --*/
        $seoData['content'] = word_limiter(strip_tags($post->post_content),20);
            /*-- End Seo Content --*/
            
        /*-- End Data Seo --*/
        
        $data['seoData'] = $seoData;

        return view('backend.pages.website.post.editPost',$data);
    }
    
    public function update($post_id,Request $request)
    {   
        $data = $request->all();
        // $validator = Validator::make($data,[
        //     'title' => 'required',
        // ],[
        //     'title.required' => 'Tiêu đề không được để trống',
        // ]);
        // if( $validator->fails() )
        // {
        //     return redirect('admin/post/edit/'.$post_id)->withErrors($validator)->withInput();
        // }

        $category = isset($data['post_category']) ? $data['post_category'] : [];
        //Kiểm tra dữ liệu đầu vào category
        if(count($category))
        {
            foreach($category as $cat)
            {
                $check = DB::table('qm_term')->where('term_type','post_category')->where('term_id',$cat)->first();
                if(!$check)
                {
                    if($type_request == 'ajax'){
                        return '{"Response":"True","Redirect":"'.url('admin/post/').'"}';
                    }else {
                        return redirect('admin/post/');
                    }
                }
            }
        }
        //End kiểm tra

        /*-- Check Id Post Featured Image --*/
        $post_featured_image = isset($data['post_featured_image']) ? $data['post_featured_image'] : null;
        if( $post_featured_image !== null )
        {
            $attachment = Attachment::where('attachment_id',$post_featured_image)->where('attachment_type','image')->first();
            if( count($attachment) == 0 )
            {
                return redirect('admin');
            }
        }
        /*-- End Check Id Post Featured Image --*/

        $get_slug = Post::where('post_id',$post_id)->value('post_slug');
        $slug = isset($data['slug']) ? $data['slug'] : '';
        $title = isset($data['title']) ? $data['title'] : '';
        $content = isset($data['content']) ? $data['content'] : '';
        $excerpt = isset($data['excerpt']) ? $data['excerpt'] : '';
        $post_status = isset($data['post_status']) ? $data['post_status'] : '';
        $post_comment = isset($data['post_comment']) ? $data['post_comment'] : '';
        $post_category = isset($data['post_category']) ? $data['post_category'] : '';
        $post_date   = isset($data['post_date']) ? $data['post_date'] : time() ;
        
        //Xử lý date 
        $arr_post_date = explode(" ", $post_date);
        //return $arr_post_date;
        $arr_day = explode("/", $arr_post_date[1]);
        $post_date = strtotime(date("$arr_day[2]/$arr_day[1]/$arr_day[0] $arr_post_date[0]"));
        //End xử lý date
        
       
        $title = strip_tags(trim($title));
        
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

        $arr_update = array();
        $arr_update['post_slug'] = $slug;
        $arr_update['user_id'] = '1';

        //xử lý thời gian
        $time = time();
        $arr_update['post_date'] = $post_date;
        $arr_update['post_modified'] = $time;
        //xử lý input
        $arr_update['post_title'] = trim($title);
        $arr_update['post_content'] =  preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "",$content);
        if($excerpt){
            $excerpt = word_limiter(strip_tags($content,160));
        }else{
            $excerpt = strip_tags($excerpt);
        }
        $arr_update['post_excerpt'] = $excerpt;
        //check post status 
        if( $data['submit'] == 0){
            $post_status = 'draft';
        }else{
            $arr_post_status = ['public','pending','draft'];
            if(!in_array($post_status,$arr_post_status))
            {
                $post_status = 'public';
            }
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
        $arr_update['post_type'] = 'post';
        DB::table('qm_post')->where('post_id',$post_id)->update($arr_update);
        
        //Thêm  Term
        //check category
        
        //Xóa trước khi thêm
        //Lấy danh sách category,tag chứa post vừa update
        $lists = DB::table('qm_term_relationships')->where('post_id',$post_id)->get();
        //xóa list cũ
        DB::table('qm_term_relationships')->where('post_id',$post_id)->delete();
        //Cập nhật lại số count tags,cate
        foreach($lists as $list){
            $count = DB::table('qm_term_relationships')->where('term_id',$list->term_id)->count();
            DB::table('qm_term')->where('term_id',$list->term_id)->update(['count'=>$count]);
        }
        //
        $i = 0;
        if(isset($data['post_category']))
        {
             foreach ($data['post_category'] as $category)
             {
                //kiểm tra xem ID tồn tại ko (có thì insert vào relationship)
                $check_category = DB::table('qm_term')->where('term_type','post_category')->where('term_id',$category)->first();
                if($check_category)
                {
                    $i = $i+1;
                    DB::table('qm_term_relationships')->insert(['post_id'=>$post_id,'term_id'=>$category]);
                    //cập nhật số bài.
                    $count = DB::table('qm_term_relationships')->where('term_id',$category)->count();
                    DB::table('qm_term')->where('term_id',$category)->update(['count'=>$count]);  
                }
            }
        }
        //Nếu ko chọn category nào thì sẽ cho vào category mặc định
        if( $i == 0 && strlen(trim($data['newcategory'])) == 0)
        {
            $category_default = DB::table('qm_option')->where('option_name','default_post_category')->first();
            DB::table('qm_term_relationships')->insert(['post_id'=>$post_id,'term_id'=>$category_default->option_value]);
            $count = DB::table('qm_term_relationships')->where('term_id',$category_default->option_value)->count();
            DB::table('qm_term')->where('term_id',$category_default->option_value)->update(['count'=>$count]);
        }
        //thêm category
        $data['newcategory'] = strip_tags(trim($data['newcategory']));
        if(strlen($data['newcategory'])>0){
            $data['slug'] = slug_create('post_category', $data['newcategory']);
            //Kiểm tra parent được chọn tồn tại ko
            $newcategory_parent = DB::table('qm_term')->where('term_type','post_category')->where('term_id',$data['newcategory_parent'])->first();
            if(!$newcategory_parent)
            {
                $data['newcategory_parent'] = 0;
            }
            $term = new Term;
            $term->name = $data['newcategory'];
            $term->parent_id = $data['newcategory_parent'];
            $term->slug = $data['slug'];
            $term->term_type = 'post_category';
            $term->save();
            $term_id = $term->id;
            //Thêm vào term meta;
            $term_meta = new Termmeta;
            $meta_key = array();
            $meta_value['excerpt'] = '';
            $meta_value['seo_title'] = '';
            $meta_value['seo_description'] = '';
            $meta_value['seo_keyword'] = '';
            $term_meta->term_id = $term_id;
            $term_meta->meta_key = 'post_category_data';
            $term_meta->meta_value = encode_serialize($meta_value);
            $term_meta->save();
            //Thêm vào term_relationships
            DB::table('qm_term_relationships')->insert(['term_id'=>$term_id,'post_id'=>$post_id]);
            $count = DB::table('qm_term_relationships')->where('term_id',$term_id)->count();
            DB::table('qm_term')->where('term_id',$term_id)->where('term_type','post_category')->update(['count' => $count]);

        }
        //End category

        //Thêm tag
        //Trước khi thêm lại phải xóa tag, đã xử lý trên category
        $data['newtags'] = strip_tags(trim($data['newtags']));
        if(strlen($data['newtags'])>0)
        {   
            //Lấy tag thành mảng
            $newtags = explode(",", $data['newtags']);
            foreach ($newtags as $newtag) 
            {
                    //Kiểm tra tồn tại chưa
                $check_tag = DB::table('qm_term')->where('term_type','post_tag')->where('name',$newtag)->first();
                if($check_tag)
                {
                    //thêm vào relationships
                    DB::table('qm_term_relationships')->insert(['term_id'=>$check_tag->term_id,'post_id'=>$post_id]);
                    $count = DB::table('qm_term_relationships')->where('term_id',$check_tag->term_id)->count();
                    DB::table('qm_term')->where('term_id',$check_tag->term_id)->update(['count'=>$count]);
                }
                else
                {
                    $term = new Term;
                    $term->name = $newtag;
                    $data['slug'] = slug_create('post_tag', $newtag);
                    $term->slug = $data['slug'];
                    $term->term_type = 'post_tag';
                    $term->save();
                    $term_id = $term->id;

                    //thêm vào term_meta   
                    $term_meta = new Termmeta;
                    $meta_value['excerpt'] = '';
                    $value = encode_serialize($meta_value);   
                    $term_meta->term_id = $term_id;
                    $term_meta->meta_key = 'post_tag_data';
                    $term_meta->meta_value = $value;
                    $term_meta->save();

                    //thêm vào relationships
                    DB::table('qm_term_relationships')->insert(['term_id'=>$term_id,'post_id'=>$post_id]);
                    $count = DB::table('qm_term_relationships')->where('term_id',$term_id)->count();
                    DB::table('qm_term')->where('term_id',$term_id)->update(['count'=>$count]);
                  
                }
            }
            
            
        }
        //end tag

        //Postmeta
        $update_metakey = array();
        
        $seo_title = trim (isset($data['seo_title']) ? $data['seo_title'] : '');
        $seo_description = trim (isset($data['seo_description']) ? $data['seo_description'] : '');
        $seo_keyword = trim (isset($data['seo_keyword']) ? $data['seo_keyword'] : '');

        $update_metakey['seo_title'] = strip_tags(trim($seo_title));
        $update_metakey['seo_description'] = strip_tags(trim($seo_description));
        $update_metakey['seo_keyword'] = strip_tags(trim($seo_keyword));
        $update_metakey['post_featured_image'] = $post_featured_image;
        $meta_value = encode_serialize($update_metakey);
        DB::table('qm_postmeta')->where('post_id',$post_id)->update(['meta_value'=>$meta_value]);

		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'post', __FUNCTION__, "$post_id,0,0");
        /* END SAVE DATABASE LOG */
		
        /*
        if($type_request == 'ajax'){
            return '{"Response":"True","Redirect":"'.url('admin/post/edit/'.$post_id).'"}';
        }else {
            return redirect('admin/post/edit/'.$post_id);
        }
        */
        return redirect('admin/post/edit/'.$post_id);
    }
    
    public function destroy($post_id, $type_request='')
    {
        $post = DB::table('qm_post')->where('post_id',$post_id)->first();
        if(!$post){
            return redirect('admin/post');
        }
        $post_meta = DB::table('qm_postmeta')->where('post_id',$post_id)->get();
        
        if($post){
            DB::table('qm_post')->where('post_id',$post_id)->delete();
        }
        if($post_meta){
            DB::table('qm_postmeta')->where('post_id',$post_id)->delete();
        }
        //Xóa các tag, category trong  $term_relationshops cập nhật lại số lượng
        $term = new Term;
        $term->taxonomy_relationships_delete($post_id,'post_category');
        $term->taxonomy_relationships_delete($post_id,'post_tag');
		
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'post', __FUNCTION__, "$post_id,0,0");
        /* END SAVE DATABASE LOG */
		
        if($type_request == 'ajax'){
            return '{"Response":"True","Redirect":"'.url('admin/post').'"}';
        }else {
            return redirect('admin/post');
        }
    }
    
    public function restore($post_id, $type_request='')
    {
        $check_post = DB::table('qm_post')->where('post_type','post')->where('post_id',$post_id)->get();
        if(!$check_post)
        {
            return redirect('admin/post');
        }
        DB::table('qm_post')->where('post_type','post')->where('post_id',$post_id)->update(['post_status'=>'restore']);
        if($type_request == 'ajax'){
            return '{"Response":"True","Message":"Khôi phục bài viết thành công"}';
        }else {
            return redirect('admin/post');
        }
    }

    public function trash($post_id, $type_request='')
    {
        Post::Trash_post($post_id);
        if($type_request == 'ajax'){
            return '{"Response":"True","Message":"Xóa bài viết thành công"}';
        }else {
            return redirect('admin/post');
        }
    }
    
    //Lấy bài viết theo user
}
