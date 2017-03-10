<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests;
//use App\Http\Controllers\BackendController;
use App\Http\Controllers\backend\BackendController;
/*-- Call Other Controller --*/
use App\Http\Controllers\backend\attachment\AttachmentController;
/*-- End Call Other Controller --*/
/*
 * Use Library of Laravel
 */
use App\Models\Post;
use App\Models\Postmeta;
use App\Models\Option;
use Validator;
use Session;
use DB;

class PageController extends BackendController
{
    public function index(Request $request)
    {
        $data = $request->all();
        $post = new Post;
        $search = isset($data['search']) ? $data['search'] : '';
        $select_action = isset($data['select_action']) ? $data['select_action'] : '';
        $check = isset($data['check']) ? $data['check'] : [];
        $type = isset($data['type']) ? $data['type'] : '';
        $post_status = isset($data['post_status']) ? $data['post_status'] : 'all';
        $arr_post_status = ['all','public','pending','draft','trash'];
        $arr_select_action = ['trash','edit','restore','delete'];
        $type_request = '';
        
        if( $request->isMethod('post') && $request->ajax()){
            $type_request = 'ajax';
        }

        $arr_post = [];
        $arr_post['post_type'] = 'page';
        $arr_post['user_id'] = 0;
        $arr_post['post_status'] = $post_status;
        $arr_post['sortBy'] = 'DESC';
        if($type_request == 'ajax'){
            #
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
                }else if($select_action == 'trash' && $count){
                    $post->Action_post($check,'trash','page');
                }else if($select_action == 'restore' && $count){
                    $post->Action_post($check, 'restore', 'page');
                }else if($select_action == 'delete' && $count){
                    $post->Action_post($check, 'delete', 'page');
                }
            }

        }
         
        $count = [];
        $count['all']= $post->Count_post_status('all', 'page');
        $count['public'] = $post->Count_post_status('public', 'page');
        $count['pending'] = $post->Count_post_status('pending', 'page');
        $count['trash'] = $post->Count_post_status('trash', 'page');
        $count['draft'] = $post->Count_post_status('draft', 'page');
        /*--End--*/
        if(!in_array($post_status, $arr_post_status))
        {
            return redirect('admin/page');
        }

        $pages = $post->Search_post($search, $arr_post);
        
        return view('backend.pages.page.list',[
            'pages' => $pages,
            'count' => $count,
            'post_status' => $post_status,
            'search' => $search,
        ]);
    }

    public function create()
    {
        /*-- Featured Image --*/
        $attachment = new AttachmentController;
        $listFeaturedImage = $attachment->getDataImage();
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

        return view('backend.pages.page.create',
            [
            'listFeaturedImage' => $listFeaturedImage,
            'seoData' => $seoData,
            ]);
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        $post=new Post;
      
       
        $data['title'] = strip_tags(trim($data['title']));
        
        /*-- Check Slug --*/
        if( $data['slug'] == null )
        {
            if(strlen($data['slug'])==0){
                $data['slug'] = 'no title';
            }else{
                $data['slug'] = $data['title'];
            }
            
        }
        $data['slug'] = str_slug($data['slug']);
        
        $_slug = $data['slug'];
        $_slugUndercore = $_slug.'-';
        $_posts=Post::where('post_slug',$_slug)->where('post_type','page')->get();
        $i=1;
        while( count($_posts) >= 1 )
        {
            $_slug = $_slugUndercore.$i;
            $_posts = Post::where('post_slug',$_slug)->where('post_type','page')->get();
            $i++;
        }
        $data['slug']=$_slug;
        /*-- End Check Slug --*/
        
        $post->post_slug = $data['slug'];
        $post->user_id =  Session::get('user_id');
        
        //xử lý thời gian
        $time=time();
        $post->post_date=$time;
        $post->post_modified=$time;
        
        //xử lý input
        $post->post_title= $data['title'];
        $post->post_content= preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "",$data['content']);
        $post->post_excerpt=strip_tags($data['excerpt']);
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
        $post->post_status=$data['post_status'];
        $post->post_parent='0';
        //check comment
        $check_post_comment = ['yes','no'];
        if(!in_array($data['post_comment'], $check_post_comment)){
            $data['post_comment'] = 'no';
        }
        $post->comment_status = $data['post_comment'];
        
        $post->post_type='page';
        
        $post->save();
        
        //$post_id = $post->id;
        $post_id = $post->max('post_id');
        
        $post_meta = new Postmeta;
        $add_metakey = array();
        $add_metakey['seo_title'] = trim($data['seo_title']);
        $add_metakey['seo_description'] = trim($data['seo_description']);
        $add_metakey['seo_keyword'] = trim($data['seo_keyword']);
        $add_metakey['post_featured_image'] = 1;
        $post_meta->post_id = $post_id;
        $post_meta->meta_key = 'page_data';
        $post_meta->meta_value = encode_serialize($add_metakey);
        $post_meta->save();
		
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'page', __FUNCTION__, "$post_id,0,0");
        /* END SAVE DATABASE LOG */
		
        return redirect('admin/page');
    }
    
    public function edit($post_id)
    {
        $post = Post::where('post_id',$post_id)->first();
        if( count($post) == 0 )
        {
            return redirect('admin/page');
        }
        $data = array();
        $post_meta = Postmeta::where('post_id',$post_id)->first();
        $seo = decode_serialize($post_meta->meta_value);
        $data['post'] = $post;
        $data['seo'] = $seo;
        /*-- Featured Image --*/
        $attachment = new AttachmentController;
        $listFeaturedImage = $attachment->getDataImage();
        /*-- End Featured Image --*/
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
        $data['listFeaturedImage'] = $listFeaturedImage;
        $data['seoData'] = $seoData;
        return view('backend.pages.page.edit',$data);
    }
    
    public function update($post_id,Request $request)
    {   
        $dataUpdate = array();
        $data = $request->all();
        $post = Post::where('post_id',$post_id)->first();
        if( count($post) == 0 )
        {
            return redirect('admin/page');
        }
        
        /*-- Validator --*/
        // $validator = Validator::make($data,[
        //     'title'=>'required',
        // ],[
        //     'title.required'=>'Title chưa được nhập',
        // ]);
        // if( $validator->fails() )
        // {
        //     return redirect('admin/page/edit/'.$post_id.'.html')->withErrors($validator)->withInput();
        // }
        /*-- End Validator --*/
        
        $data['title'] = strip_tags(trim($data['title']));
        
        if( $data['slug'] == null )
        {
            if( strlen($data['title']) ==0 ){
                $data['slug'] = 'no title';
            }else{
                $data['slug'] = trim($data['title']);
            }
        }
        $data['slug'] = str_slug($data['slug']);
        $_slug = $data['slug'];
        $_slugUndercore = $_slug.'-';
        $_posts = Post::where('post_slug',$_slug)->where('post_type','page')->whereNotIn('post_id',[$post_id])->get();
        $i=1;
        while( count($_posts) >=1 )
        {
            //
            $_slug = $_slugUndercore.$i;
            $_posts = Post::where('post_slug',$_slug)->where('post_type','page')->whereNotIn('post_id',[$post_id])->get();
            $i++;
        }

        $data['slug'] = $_slug;   
        $dataUpdate['user_id'] = Session::get('user_id');
        //xử lý thời gian
        $time = time();
        $dataUpdate['post_modified'] = $time;
        //xử lý input
        $dataUpdate['post_title'] = trim($data['title']);
        $dataUpdate['post_slug'] = $data['slug'];
        $dataUpdate['post_content'] =  preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "",$data['content']);
        $dataUpdate['post_excerpt'] = strip_tags($data['excerpt']);
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
        $dataUpdate['post_type'] = 'page';
        DB::table('qm_post')->where('post_id',$post_id)->update($dataUpdate);
        
        //Thêm  post meta
        $meta_value = array();
        $meta_value['seo_title'] = trim($data['seo_title']);
        $meta_value['seo_description'] = trim($data['seo_description']);
        $meta_value['seo_keyword'] = trim($data['seo_keyword']);
        $meta_value['post_featured_image'] = 1;
        $value = encode_serialize($meta_value);
        DB::table('qm_postmeta')->where('post_id',$post_id)->update(['meta_value'=>$value]);
        
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'page', __FUNCTION__, "$post_id,0,0");
        /* END SAVE DATABASE LOG */
		
        return redirect('admin/page');
    }
    
  //   public function destroy($post_id)
  //   {   
  //       $post = Post::where('post_id',$post_id)->where('post_type','page')->first();
  //       if( count($post) == 0 )
  //       {
  //           return redirect('admin/page');
  //       }
  //       DB::table('qm_post')->where('post_id',$post_id)->delete();
  //       DB::table('qm_postmeta')->where('post_id',$post_id)->delete();
		
		// /*
  //        * ADD DATABASE LOG
  //        */
  //       addTableLog("App\Models\Logs", Session::get('user_id'), 'page', __FUNCTION__, "$post_id,0,0");
  //       /* END SAVE DATABASE LOG */
		
  //       return redirect('admin/page');
  //   }
    
  //    public function trash($post_id)
  //   {
  //       $check_post = DB::table('qm_post')->where('post_type','page')->where('post_id',$post_id)->first();
  //       if(!$check_post)
  //       {
  //           return redirect('admin/post/edit/'.$post_id);
  //       }
  //       DB::table('qm_post')->where('post_type','page')->where('post_id',$post_id)->update(['post_status'=>'trash']);
  //       return redirect('admin/page');
  //   }

}
