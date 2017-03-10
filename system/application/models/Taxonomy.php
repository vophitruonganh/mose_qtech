<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TaxonomyMeta;
use DB;

class Taxonomy extends Model
{
    protected $table = 'qm_taxonomy';
    public $timestamps = false;

    public function Insert_taxonomy( $taxonomy_arr= array()){
        // $data= [];
        // $data['taxonomy_name'] = $taxonomy_arr['name'];
        // $data['taxonomy_slug'] = $taxonomy_arr['slug'];
        // $data['taxonomy_type'] = $taxonomy_arr['taxonomy_type'];
        if(isset($taxonomy_arr['taxonomy_id'])){
            return Taxonomy::where('taxonomy_id', $taxonomy_arr['taxonomy_id'])->update($taxonomy_arr);
        }
        return Taxonomy::insertGetId($taxonomy_arr);
    }

    public function Insert_taxonomy2($query,$taxonomy_id = 0,$taxonomy_type) {
    	if(!is_int($post_id) && !$taxonomy_type)
        	return false;
        return $query->where('taxonomy_type',$taxonomy_type)->where('taxonomy_id',$taxonomy_id);
    }

    // public function Insert_taxonomy1($query,$taxonomy_id = 0,$taxonomy_type) {

    // }
    public function Get_taxonomy($taxonomy_type= ''){
        return Taxonomy::where('taxonomy_type', $taxonomy_type)->get();
    }

    public function Get_taxonomy_id($taxonomy_type = '',$taxonomy_id = 0) {
        return Taxonomy::where('taxonomy_type',$taxonomy_type)->where('taxonomy_id',$taxonomy_id)->first();
    }

    public function Get_taxonomy_name($taxonomy_type= '',$taxonomy_name = ''){
        return Taxonomy::where('taxonomy_type', $taxonomy_type)->where('taxonomy_name', $taxonomy_name);
    }

    public function Get_taxonomy_type($taxonomy_type='') {
        return Taxonomy::where('taxonomy_type',$taxonomy_type)->get();
    }
    public function Get_taxonomy_type_with_id($taxonomy_type='',$array=array()) {
        return Taxonomy::where('taxonomy_type',$taxonomy_type)->whereIn('taxonomy_id', $array)->get();
    }
    public function Get_taxonomy_type_with_not_id($taxonomy_type='',$array=array()) {
        return Taxonomy::where('taxonomy_type',$taxonomy_type)->whereNotIn('taxonomy_id', $array)->get();
    }

    public function Get_taxonomy_parent($taxonomy_type = '',$taxonomy_id = 0) {
        return Taxonomy::where('taxonomy_type',$taxonomy_type)->where('taxonomy_parent',$taxonomy_id);
    }

    public function Check_taxonomy_parent($taxonomy_type = '',$taxonomy_id = 0,$taxonomy_parent=0) {
        return Taxonomy::where('taxonomy_id','<>',$taxonomy_id)->where('taxonomy_id',$taxonomy_parent)->where('taxonomy_type',$taxonomy_type)->get();
    }

    public function Search_taxonomy_title($taxonomy_type='',$search='') {
        return Taxonomy::where('taxonomy_type',$taxonomy_type)->where('taxonomy_name','like','%'.$search.'%')->get();
    }

    public function Search_taxonomy_title_limit($taxonomy_type='',$search='',$limit=10) {
        return Taxonomy::where('taxonomy_type',$taxonomy_type)->where('taxonomy_name','like','%'.$search.'%')->limit($limit)->get();
    }

    public function Update_taxonomy_parent($taxonomy_id = 0, $taxonomy_type = '',$parent_id = 0) {
        if((int)$taxonomy_id !== $taxonomy_id && !$taxonomy_type && (int)$parent_id !== $parent_id)
            return false;
        return Taxonomy::where('taxonomy_parent',$taxonomy_id)->where('taxonomy_type',$taxonomy_type)->update(['taxonomy_parent'=>$parent_id]);
    }

    
    public function Update_taxonomy_count($taxonomy_id = 0,$count = 0) {
        Taxonomy::where('taxonomy_id',$taxonomy_id)->update(['taxonomy_count'=>$count]);
    }

    //Xóa vĩnh viễn
    public function Delete_taxonomy($taxonomy_id = 0, $taxonomy_type = '') {
        $taxonomy = Taxonomy::where('taxonomy_id',$taxonomy_id)->where('taxonomy_type',$taxonomy_type)->first();
        if(!$taxonomy){
            return false;
        }
        Taxonomy::where('taxonomy_id',$taxonomy_id)->delete();
        $taxonomy_meta = new TaxonomyMeta;
        $taxonomy_meta->Delete_taxonomy_meta($taxonomy_id);
      

        return true;
    }

    /*----front_end----*/

    public function Get_taxonomy_slug_type ( $taxonomy_type = '', $taxonomy_slug ='')
    {
        return Taxonomy::where('taxonomy_type', $taxonomy_type )->where('taxonomy_slug',$taxonomy_slug )->where('taxonomy_count','>','0')->first();
    }

    public function Get_taxonomy_name_slug ( $taxonomy_type = '', $taxonomy_slug ='')
    {
        return Taxonomy::where('taxonomy_type',$taxonomy_type)->where('taxonomy_slug', $taxonomy_slug)->value('taxonomy_name');
    }


    //Lấy slug like cho bài viết
    public function Get_taxonomy_post_slug_like ( $taxonomy_slug = '')
    {
        $query = Taxonomy::where('taxonomy_type','post_category')->where('taxonomy_slug','like',$taxonomy_slug.'%' )->where('taxonomy_count','>','0')->first();
        if($query){
            return $query;
        }
        $query = Taxonomy::where('taxonomy_type','post_tag')->where('taxonomy_slug','like',$taxonomy_slug.'%' )->where('taxonomy_count','>','0')->first();
        if($query){
            return $query;
        }
        return false;
    }
    
    //Lấy slug like cho sản phẩm
    public function Get_taxonomy_product_slug_like( $taxonomy_slug = '')
    {
        //Danh mục sản phẩm
        $query = Taxonomy::where('taxonomy_type', 'product_category')->where('taxonomy_slug', 'like', $taxonomy_slug.'%')->where('taxonomy_count','>','0')->first();
        if($query){
            return $query;
        }

        //Nhãn sản phẩm
        $query = Taxonomy::where('taxonomy_type', 'product_tag')->where('taxonomy_slug', 'like', $taxonomy_slug.'%')->where('taxonomy_count','>','0')->first();
        if($query){
            return $query;
        }

        //Nhà cung cấp
        $query = Taxonomy::where('taxonomy_type', 'product_vendor')->where('taxonomy_slug', 'like', $taxonomy_slug.'%')->where('taxonomy_count','>','0')->first();
        if($query){
            return $query;
        }

        //Nhãn nhóm sản phẩm
        $query = Taxonomy::where('taxonomy_type', 'product_group')->where('taxonomy_slug', 'like', $taxonomy_slug.'%')->where('taxonomy_count','>','0')->first();
        if($query){
            return $query;
        }
        return false;
    }


}