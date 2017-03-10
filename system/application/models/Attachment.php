<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public $table = 'qm_attachment';
    public $timestamps = false;

    // public function Get_attachment($attachment_id= 0){
    // 	return 'a';
    // 	if(int($attachment_id) !== $attachment_id && !$attachment_id)
    // 		return false;
    // 	return $this->where('attachment_id',$attachment_id);
    // }

    // public function Delete_attachment(){
    // 	Attachment::Get_attachment()->first();
    // }

    public function search_attachment($attrOrder, $dataOrder, $attrSearch, $dataSearch)
    {
        $query = Attachment::orderBy($attrOrder,$dataOrder);

        if( $attrSearch != null && $dataSearch != null )
        {
            $query = $query->where($attrSearch,'like','%'.$dataSearch.'%');
        }

        $query = $query->join('qm_user','qm_attachment.user_id','=','qm_user.user_id')->paginate(24);

        return $query;
    }

    public function insert_attachment($data)
    {
        if( isset($data['attachment_id']) )
        {
            return Attachment::where('attachment_id',$data['attachment_id'])->update($data);
        }
        else
        {
            return Attachment::insert($data);
        }
    }

    public function update_attachment($data)
    {
        return Attachment::insert_attachment($data);
    }

    public function delete_attachment($idAttachment)
    {
        return Attachment::where('attachment_id',$idAttachment)->delete();
    }

    public function getAndJoinUser_attachment($idAttachment)
    {
        return Attachment::where('attachment_id',$idAttachment)->join('qm_user','qm_attachment.user_id','=','qm_user.user_id');
    }

    public function get_attachment($idAttachment)
    {
        return Attachment::where('attachment_id',$idAttachment);
    }

    public function get_attachment_image($search='')
    {
        if(!$search){
            return Attachment::select('attachment_id','attachment_title','attachment_url')->where('attachment_type','image')->orderBy('attachment_id','DESC')->paginate(24);
        }else {
            return Attachment::select('attachment_id','attachment_title','attachment_url')->where('attachment_type','image')->where('attachment_title','like', '%'.$search.'%')->orderBy('attachment_id','DESC')->paginate(24);
        }
        
    }
    //Lấy ảnh cho bài post
    public function get_attachment_post( $attachment_id = 0 ){
        return Attachment::where('attachment_id',$attachment_id)->where('attachment_type','image')->first();
    }

    // public function delete_attachment( $attachment_id = 0 ){
    //     return Attachment::where('attachment_id',$idAttachment)->delete();
    // }
}
