<?php

namespace App\Http\Controllers\backend\website\taxonomy;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\backend\taxonomy\TaxonomyController;

/*
 * Use Library of Laravel
 */

class PostTagController extends BackendController
{
    private $data_arr = array(
        'section_title'=>'Nhãn bài viết',
        'tax_name'=>'nhãn',
        'tax_slug' => 'post-tag',
        'tax_url' => '',
        'tax_type' => 'post_tag',
        'tax_level' => '0',
        'list_view'=> array('title'=>'Tên nhãn','slug'=>'Đường dẫn','count'=>'Bài viết','excerpt'=>'Mô tả'),
        'create_view'=> array('title'=>'Tên nhãn','slug'=>'Đường dẫn','excerpt'=>'Mô tả','seo'=>true),
        'edit_view'=> array('title'=>'Tên nhãn','slug'=>'Đường dẫn','excerpt'=>'Mô tả','seo'=>true),
    );

    private function request_type(Request $request){
        $request_type = '';
        if(!$request){
            return $request_type;
        }
        if( $request->isMethod('post') && $request->ajax())
        {
            $request_type = 'ajax';
        }
        return $request_type;
    }

    public function index(Request $request)
    {
        /*Get type submut*/
        $data = $request->all();
        $this->data_arr['page_number'] = $request->input('page',1);
        $taxonomy = new TaxonomyController;
        return $taxonomy->index($data,$this->data_arr,$this->request_type($request));
    }
    
    public function create()
    {
        $taxonomy = new TaxonomyController;
        return $taxonomy->create($this->data_arr);
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        $taxonomy = new TaxonomyController;
        return $taxonomy->store($data,$this->data_arr,$this->request_type($request));
    }
    
    public function edit($taxonomy_id)
    {
        $taxonomy = new TaxonomyController;
        return $taxonomy->edit($taxonomy_id,$this->data_arr);
    }
    
    public function update($taxonomy_id,Request $request)
    {
        $data = $request->all();
        $taxonomy = new TaxonomyController;
        return $taxonomy->update($taxonomy_id,$data,$this->data_arr,$this->request_type($request));

    }
    
    public function destroy($taxonomy_id)
    {
        $taxonomy = new TaxonomyController;
        return $taxonomy->destroy($taxonomy_id,$this->data_arr);
    }  
}