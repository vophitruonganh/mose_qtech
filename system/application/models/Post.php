<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Postmeta;
use App\Models\Term;
use Session;
class Post extends Model
{
  protected $table = 'qm_post';
  public $timestamps = false;

 
  //Thêm mới, update page, post
  public function Insert_post($data = array()) 
  {
  	if(!is_array($data))
  		return false;
  	
  	if(isset($data['post_id'])){
  		return Post::where('post_id', $data['post_id'])->update($data);
  	}
  	return Post::insertGetId($data);
	}

  //update page, post
	public function Update_post($postarr = array()) 
  {
	  return $this->Insert_post($postarr);
	}

  //Danh sách page, post
	public function Search_post($search = '', $data= array()) 
  {
      $query = Post::join('qm_user','qm_post.user_id','=','qm_user.user_id')
                   ->where('qm_post.post_title','like','%'.$search.'%')
                   ->where('qm_post.post_type',$data['post_type']);
      
      if($data['post_status'] == 'all'){
          $query->where('qm_post.post_status','<>','trash');
      }else{
          $query->where('qm_post.post_status',$data['post_status']);
      }

      if($data['user_id']){
           $query->where('qm_post.user_id',$data['user_id']);
      }

      return  $query->orderBy('qm_post.post_date',$data['sort'])->paginate(10);
	}

  //Trả page, post theo ID
	public function Get_post_id($post_id = 0,$post_type='post') 
  {
		return Post::where('post_type',$post_type)
    ->join('qm_user','qm_post.user_id','=','qm_user.user_id')
    ->where('post_id',$post_id);
	}

  // Trả về page ( ham nay chua thay su dung trong page ), post theo ID nhung join voi user
  public function Get_post_id_join_user($post_id = 0,$post_type='post') 
  {
    return Post::where('post_type',$post_type)
      ->join('qm_user','qm_post.user_id','=','qm_user.user_id')
      ->where('post_id',$post_id);
  }

  //Xóa nháp bài viết
	public function Trash_post($post_id = 0, $post_type = 'post') 
  {
  		$get_post = $this->Get_post_id($post_id, $post_type)->first();
  		if($get_post){
  			Post::where('post_type',$post_type)->where('post_id',$post_id)->update(['post_status'=>'trash']);
  		}
	}

  public function Restore_post($post_id = 0, $post_type = 'post')
  {
      $get_post = $this->Get_post_id($post_id, $post_type)->first();
      if($get_post){
        $post_meta = new PostMeta;  
        $value = $post_meta -> Get_postmeta_id($post_id);
        $old_post_status = isset($value['old_post_status']) ? $value['old_post_status'] : 'public' ;
        Post::where('post_type',$post_type)->where('post_id',$post_id)->update(['post_status'=>$old_post_status]);
      }
  }

  //Cập nhật post_status
  public function Action_post($checks = array(), $post_action, $post_type)
  {
      if( $post_action=='trash'){
          foreach( $checks as $check){
              Post::where('post_type',$post_type)->where('post_id',$check)->update(['post_status' => 'trash']);
          }
          return true;
      }
      if( $post_action=='restore'){
          $post_meta = new PostMeta;  
          foreach( $checks as $check){
              //Lấy trạng thái trước khi xóa
              $value = $post_meta -> Get_postmeta_id($check);
              $old_post_status = isset($value['old_post_status']) ? $value['old_post_status'] : 'public' ;
              Post::where('post_type',$post_type)->where('post_id',$check)->update(['post_status' => $old_post_status]);
          }
          return true;
      }
      return false;
  }

  //Xóa vĩnh viễn bài viết
	public function Delete_post($post_id = 0, $post_type='post') 
  {
		  $post = Post::where('post_id',$post_id)->where('post_type',$post_type)->first();
      if(!$post){
          return false;
      }
      Post::where('post_id',$post_id)->delete();
      return true;
	}

  //Đếm bài post theo trạng thái
	public function Count_post_status($post_status = '',$post_type = 'post') 
  {
		$allow_post_status = array('all','public','pending','trash','draft');
        if(!in_array($post_status, $allow_post_status))
            return '0';
        //Check user 
        if($post_status=='all'){
            return Post::where('post_type',$post_type)->where('post_status','<>','trash')->count();
        }else {
            return Post::where('post_status',$post_status)->where('post_type',$post_type)->count();
        }
	}
  
  //Lấy danh sách trang cho menu
  public function Get_posts_public_post()
  {
    return Post::where('post_type','page')->where('post_status','public')->get();
  }

  /*----front_end----*/

  //Kiểm tra slug có tồn tại bài viết, trang
  public function Get_post_slug( $post_type = '', $post_slug = '')
  {
      return Post::where('post_type', $post_type)->where('post_slug', $post_slug)->where('post_status','public')->first();
  }

  public function Get_post_slug_like( $post_type = '', $post_slug = '')
  {
      return Post::where('post_type', $post_type)->where('post_slug','like', $post_slug.'%')->where('post_status','public')->first();
  }

  public function Get_post_detail ( $post_type = '',$post_slug = '')
  {
      return Post::join('qm_user', 'qm_post.user_id', '=', 'qm_user.user_id')
                 ->select('qm_post.post_date','qm_post.post_title','qm_post.post_content','qm_post.post_excerpt','qm_post.post_slug','qm_user.user_email','qm_user.user_fullname','qm_post.comment_status','qm_post.post_image')
                 ->where('qm_post.post_slug',$post_slug)
                 ->where('qm_post.post_type',$post_type)->where('qm_post.post_status','public')->first();
  }

}