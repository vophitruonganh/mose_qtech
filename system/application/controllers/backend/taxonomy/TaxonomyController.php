<?php

namespace App\Http\Controllers\backend\taxonomy;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */

use App\Models\Taxonomy;
use App\Models\TaxonomyMeta;
use App\Models\TaxonomyRelationships;
use App\Libraries\Functions;
use App\Models\Option;
use App\Models\Discount;
use Validator;
use DB;
use Session;

class TaxonomyController extends BackendController
{
    /**
     * Class Constructor
     */
    function __construct(){
        parent::__construct();
    }

    public function index($data = array(),$data_arr = array(),$request_type = ''){
        $tax_type = isset($data_arr['tax_type']) ? $data_arr['tax_type'] : '';

        if(!$tax_type)
            return redirect('admin');
        $title = isset($data_arr['title']) ? $data_arr['title'] : '';
        $name = isset($data_arr['name']) ? $data_arr['name'] : '';
        $tax_slug = isset($data_arr['tax_slug']) ? $data_arr['tax_slug'] : '';
        $level = isset($data_arr['level']) ? $data_arr['level'] : '1';
        $page_number = isset($data_arr['page_number']) ? $data_arr['page_number'] : '1';
        $check = isset($data['check']) ? $data['check'] : [];
        $select_action = isset($data['select_action']) ? $data['select_action'] : '';
        $type = isset($data['type']) ? $data['type'] : '';
        $search = isset($data['search']) ? urldecode($data['search']) : '';

        if($request_type == 'ajax'){
            if($type == 'action'){
                $count = count($check);
                if( $select_action == 'edit' && $count){
                    $output = Array('Response'=>'True','Redirect'=>url('admin/taxonomy/'.$tax_slug.'/edit/'.$check[0]),'Page'=>'','List'=>'');
                    return $output;
                }else if($select_action == 'trash' && $count){
                    foreach( $check as $c )
                    {
                        $this->destroy($c,$data_arr,$request_type);
                    }
                }
            }
            $taxonomy = $this->taxonomyActionSearch($tax_type,$search);
            $data_arr['check'] = $check;
            $data_arr['select_action'] = $select_action;
            $data_arr['search'] = $search;
            return $this->listView($taxonomy,$data_arr,$level);
        }else {
            if($select_action){
                $count = count($check);
                if( $select_action == 'edit' && $count){
                    return redirect('admin/taxonomy/'.$tax_slug.'/edit/'.$check[0]);
                }
                if( $select_action == 'trash' && $count){
                    foreach( $check as $v ){
                        $this->destroy($v,$data_arr,$request_type);
                    }
                }
                return redirect('admin/taxonomy/'.$tax_slug);
            }

            $page_query = array();
            if($search)
            {
                $page_query['search'] = $search;
            }
            $tax_data = $this->taxonomyActionSearch($tax_type,$search);
            $data_list = array();
            $data_list = taxonomy_data($tax_data,0,'',true);
            if($search)
            {
                $data_list = taxonomy_data_search($tax_data);
            }
            $data_list = $this->paginate($data_list, 10,$page_number);

            return view('backend.pages.taxonomy.listTaxonomy',[
                'taxonomy' => $data_list,
                'pagination' => $page_query,
                'search' => $search,
                'data_arr' => $data_arr,
            ]);
        }
    }

    private function taxonomyActionSearch($taxonomy_type='',$search=''){
        if($search){
            $get_taxonomy = $this->m_taxonomy->Search_taxonomy_title($taxonomy_type,$search);
        }else {
            $get_taxonomy = $this->m_taxonomy->Get_taxonomy($taxonomy_type);
        }
        return $get_taxonomy;
    }

    public function listView($taxonomy,$data_arr = array()){
        $objdata = Array('Response'=>'False','Page'=>'','List'=>'');
        $data_list = $this->taxonomyActionSearch($data_arr['tax_type'],$data_arr['search']);
        $data_list = array();
        $data_list = taxonomy_data($taxonomy,0,'',true);
        if($data_arr['search'])
        {
           $data_list = taxonomy_data_search($taxonomy);
        }

        $data_list = $this->paginate($data_list, 10,$data_arr['page_number']);
        $listview = view('backend.pages.taxonomy.listViewTaxonomy',[
            'taxonomy' => $data_list,
            'data_arr' => $data_arr
        ]);

        $objdata['Page'] = urlencode($data_list->render());
        if($data_arr['search']){
            $objdata['Page'] = urlencode($data_list->appends(array('search' => $data_arr['search']))->render());
        }

        $objdata['List'] = urlencode($listview);
        if($objdata['List']){
            $objdata['Response'] = 'True';
        }
        if($data_arr['select_action'] == 'trash' && $data_arr['check']){
            $objdata['Message'] = 'Xóa '.$data_arr['tax_name'].' thành công!';
        }
        return $objdata;
    }

    public function create($data_arr=array())
    {
       $get_taxonomy = $this->m_taxonomy->Get_taxonomy($data_arr['tax_type']);
        $seo_data = array(
            'seo_url'=>$data_arr['tax_url']
        );
        return view('backend.pages.taxonomy.createTaxonomy',[
            'taxonomy'=>$get_taxonomy,
            'data_arr'=>$data_arr,
            'seo_data'=>$seo_data
        ]);
    }

    public function store($data = array(),$data_arr = array(),$request_type='')
    {
        $submit_type = trim(isset($data['submit_type']) ? $data['submit_type'] : '');

        $validator = Validator::make($data,[
            'name'=>'required',
        ],[
            'name.required'=>'Chưa nhập tên '.$data_arr['tax_name'],
        ]);

        if( $validator->fails()){
            $messages = $validator->errors();
            if($request_type == 'ajax'){
                return '{"Response":"False","Message":"'.$messages->first('name').'"}';
            }else {
                return redirect('admin/taxonomy/'.$data_arr['tax_slug'].'/create')->withErrors($validator)->withInput();
            }
        }

        $taxonomy_name = strip_tags(trim(isset($data['name']) ? $data['name'] : ''));
        $taxonomy_slug = trim(isset($data['slug']) ? $data['slug'] : '');
        $taxonomy_parent = isset($data['parent']) ? $data['parent'] : '0';
        $taxonomy_excerpt = isset($data['excerpt']) ? $data['excerpt'] : '';

        //Nếu là tag kiểm tra ko cho trùng tên
        if($data_arr['tax_level'] == 0){
            //kiểm tra tồn tại name
            $get_taxonomy_name = $this->m_taxonomy->Get_taxonomy_name($data_arr['tax_type'],$taxonomy_name)->first();
            if($get_taxonomy_name){
                $validator->getMessageBag()->add('name','Tên '.$data_arr['tax_name'].' đã tồn tại');
                $messages = $validator->errors();
                if($request_type == 'ajax'){
                    return '{"Response":"False","Message":"'.$messages->first('name').'"}';
                }else {
                    return redirect('admin/taxonomy/'.$data_arr['tax_slug'].'/create')->withErrors($validator)->withInput();
                }
            }
        }

        $get_taxonomy = $this->m_taxonomy->Get_taxonomy_id($data_arr['tax_type'],$taxonomy_parent);
        if(!$get_taxonomy){
            $taxonomy_parent ='0';
        }

        if($taxonomy_slug==''){
            $taxonomy_slug = $taxonomy_name;
        }

        $taxonomy_slug = taxonomy_slug_create($data_arr['tax_type'],$taxonomy_slug);
        $taxonomy_data = array(
            'taxonomy_name' => $taxonomy_name,
            'taxonomy_slug' => $taxonomy_slug,
            'taxonomy_parent' => $taxonomy_parent,
            'taxonomy_excerpt' => $taxonomy_excerpt,
            'taxonomy_type' => $data_arr['tax_type']
        );

        $taxonomy_id = $this->m_taxonomy->Insert_taxonomy($taxonomy_data);
        $meta_data = array(
            'seo_title' => isset($data['sp_seo_title']) ? $data['sp_seo_title'] : '',
            'seo_description' => isset($data['sp_seo_desc']) ? $data['sp_seo_desc'] : '',
            'seo_keyword' => isset($data['sp_seo_keyword']) ? $data['sp_seo_keyword'] : ''
        );

        $this->m_taxonomy_meta->Insert_tax_meta($taxonomy_id,'seo_data',encode_serialize($meta_data));
        if($request_type == 'ajax'){
            if($submit_type == 'quick_create'){
                return '{"Response":"True","taxonomy_id":"'.$taxonomy_id.'","taxonomy_name":"'. $taxonomy_name.'"}';
            }else{
                return '{"Response":"True","Redirect":"'.url('admin/taxonomy/'.$data_arr['tax_slug'].'/edit/'.$taxonomy_id).'"}';
            }
        }else {
            return redirect('admin/taxonomy/'.$data_arr['tax_slug'].'/edit/'.$taxonomy_id);
        }
    }

    public function edit($taxonomy_id = 0,$data_arr=array()){
       $get_taxonomy = $this->m_taxonomy->Get_taxonomy_id($data_arr['tax_type'],$taxonomy_id);

        if(!$get_taxonomy){
            return redirect('admin/taxonomy/'.$data_arr['tax_slug']);
        }

        $parent = taxonomy_list_parent($data_arr['tax_type'],$taxonomy_id);

        $seo_data = array();
        $seo_data = $this->m_taxonomy_meta->Get_tax_meta_key($taxonomy_id,'seo_data');

        if($seo_data){
            $seo_data = decode_serialize($seo_data->meta_value);
        }

        $seo_data['seo_url'] = $data_arr['tax_url'].$get_taxonomy->taxonomy_slug;

        return view('backend.pages.taxonomy.editTaxonomy',[
            'tax'=>$get_taxonomy,
            'data_arr'=>$data_arr,
            'parent'=>$parent,
            'seo_data'=>$seo_data,
        ]);
    }

    public function update($taxonomy_id=0,$data= array(),$data_arr=array(),$request_type=''){
        $get_taxonomy = $this->m_taxonomy->Get_taxonomy_id($data_arr['tax_type'],$taxonomy_id);

        if(!$get_taxonomy){
            if($request_type == 'ajax'){
                return '{"Response":"False","Redirect":"'.url('admin/taxonomy/'.$data_arr['tax_slug']).'"}';
            }
            return redirect('admin/taxonomy/'.$data_arr['tax_slug']);
        }

        $taxonomy_name = strip_tags(trim(isset($data['name']) ? $data['name'] : ''));
        $taxonomy_slug = trim(isset($data['slug']) ? $data['slug'] : '');
        $taxonomy_parent = isset($data['parent']) ? $data['parent'] : '0';
        $taxonomy_excerpt = isset($data['excerpt']) ? $data['excerpt'] : '';

        if($data_arr['tax_level'] == 0)
        {
            $validator = Validator::make($data,[
                'name'=>'required|unique:qm_taxonomy,taxonomy_name,'.$taxonomy_id.',taxonomy_id,taxonomy_type,'.$data_arr['tax_type'],
            ],[
                'name.required'=>'Chưa nhập tên '.$data_arr['tax_name'],
                'name.unique' => 'Tên '.$data_arr['tax_name'].' đã tồn tại',
            ]);
        }else {
            $validator = Validator::make($data,[
                'name'=>'required',
            ],[
                'name.required'=>'Chưa nhập tên '.$data_arr['tax_name'],
            ]);
        }

        if($validator->fails()){
            $messages = $validator->errors();
            if($request_type == 'ajax'){
                return '{"Response":"False","Message":"'.$messages->first('name').'"}';
            }else {
                return redirect('admin/taxonomy/'.$data_arr['tax_slug'].'/edit/'.$taxonomy_id)->withErrors($validator)->withInput();
            }
        }


        if($data_arr['tax_level'] == 1){
            $check_parent = $this->m_taxonomy->Check_taxonomy_parent($data_arr['tax_type'],$taxonomy_id,$taxonomy_parent);
            if(!$check_parent){
                $taxonomy_parent = '0';
            }else {
                $children_id = taxonomy_children_id($data_arr['tax_type'],$taxonomy_id);
                if($children_id){
                    if(in_array($taxonomy_parent,$children_id)){
                        $taxonomy_parent = '0';
                    }
                }
            }
        }
        // if($data_arr['tax_level'] == 0)
        // {
        //     //kiểm tra tồn tại name
        //     $get_taxonomy_name = $this->m_taxonomy->Get_taxonomy_name($data_arr['tax_type'],$taxonomy_name)->first();
        //     if($get_taxonomy_name){
        //         $validator->getMessageBag()->add('name','Tên '.$data_arr['tax_name'].' đã tồn tại');
        //         $messages = $validator->errors();
        //         if($request_type == 'ajax'){
        //             return '{"Response":"False","Message":"'.$messages->first('name').'"}';
        //         }else {
        //             return redirect('admin/taxonomy/'.$data_arr['tax_slug'].'/create')->withErrors($validator)->withInput();
        //         }
        //     }
        // }

        if($taxonomy_slug=='')
        {
            $taxonomy_slug = $taxonomy_name;
        }
        $taxonomy_slug = taxonomy_slug_update($data_arr['tax_type'],$taxonomy_id,$taxonomy_slug);
        $taxonomy_data = array(
            'taxonomy_id' => $taxonomy_id,
            'taxonomy_name' => $taxonomy_name,
            'taxonomy_slug' => $taxonomy_slug,
            'taxonomy_parent' => $taxonomy_parent,
            'taxonomy_excerpt' => $taxonomy_excerpt
        );

        $this->m_taxonomy->Insert_taxonomy($taxonomy_data);

        $meta_data = array(
            'seo_title' => isset($data['sp_seo_title']) ? $data['sp_seo_title'] : '',
            'seo_description' => isset($data['sp_seo_desc']) ? $data['sp_seo_desc'] : '',
            'seo_keyword' => isset($data['sp_seo_keyword']) ? $data['sp_seo_keyword'] : ''
        );

        $this->m_taxonomy_meta->Update_tax_meta($taxonomy_id,'seo_data',encode_serialize($meta_data));

        if($request_type == 'ajax'){
            //return '{"Response":"True","Message":"Cập nhật dữ liệu thành công."}';
            return '{"Response":"True","Redirect":"'.url('admin/taxonomy/'.$data_arr['tax_slug'].'/edit/'.$taxonomy_id).'"}';
        }else {
            return redirect('admin/taxonomy/'.$data_arr['tax_slug'].'/edit/'.$taxonomy_id);
        }
    }

    public function destroy($taxonomy_id = '',$data_arr = array(), $request_type=''){
        $get_taxonomy = $this->m_taxonomy->Get_taxonomy_id($data_arr['tax_type'],$taxonomy_id);
        if(!$get_taxonomy){
            if($request_type == 'ajax'){
                return '{"Response":"False","Message":"Xóa '.$data_arr['tax_name'].' thất bại"}';
            }
            return redirect('admin/taxonomy/'.$data_arr['tax_slug']);
        }

        if($data_arr['tax_level'] == 1){
            $default_category = $this->m_option->Get_option_value('default_'.$data_arr['tax_type']);
            if($taxonomy_id == $default_category){
                if($request_type == 'ajax'){
                    return '{"Response":"False","Message":"Xóa '.$data_arr['tax_name'].' thất bại"}';
                }
                return redirect('admin/taxonomy/'.$data_arr['tax_slug']);
            }else {
                $get_relationships = $this->m_taxonomy_relationships->Get_taxonomy_relationships($taxonomy_id)->get();
                if(count($get_relationships)>0){
                    foreach($get_relationships as $get_relationship){
                        //đếm bài post thuộc category bị xóa có thuộc category khác ko
                        $count_relationships = $this->m_taxonomy_relationships->Count_taxonomy_relationships_post($get_relationship->post_id);
                        //Nếu nó thuộc 1 category thì cập nhật
                        if($count_relationships == 1){
                            $this->m_taxonomy_relationships->Update_taxonomy_relationships($taxonomy_id,$get_relationship->post_id,$default_category);
                        }
                    }
                    //cập nhật lại số bài post của category default
                    $count_item = $this->m_taxonomy_relationships->Count_taxonomy_relationships($default_category);
                    $this->m_taxonomy->Update_taxonomy_count($default_category,$count_item);
                }
                $get_taxonomy_parent = $this->m_taxonomy->Get_taxonomy_parent($taxonomy_id,$data_arr['tax_type'])->get();
                if($get_taxonomy_parent){
                    //Nếu có cha thì cập nhật cha của category con thành category của cha
                    $this->m_taxonomy->Update_taxonomy_parent($taxonomy_id,$data_arr['tax_type'],$get_taxonomy->taxonomy_parent);
                }
            }

        }
        //Kiểm tra xem là nhóm khách hàng hay nhóm sản phẩm
        if($data_arr['tax_type']=='customer_group' || $data_arr['tax_type']=='product_group'){
            $this->m_discount ->Update_relationship_title( $taxonomy_id, $data_arr['tax_type'], $get_taxonomy->taxonomy_name);
        }

        $this->m_m_taxonomy_meta->Delete_m_taxonomy_meta($taxonomy_id);
        $this->m_taxonomy_relationships->Delete_taxonomy_relationships($taxonomy_id);
        $this->m_taxonomy->Delete_taxonomy($taxonomy_id,$data_arr['tax_type']);
        if($request_type == 'ajax'){
            return '{"Response":"True","Message":"Xóa '.$data_arr['tax_name'].' thành công"}';
        }
        return redirect('admin/taxonomy/'.$data_arr['tax_slug']);
    }
}
?>