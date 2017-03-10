<?php

namespace App\Http\Controllers\backend\account\taxonomy;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\backend\taxonomy\TaxonomyController;

/*
 * Use Library of Laravel
 */


class CustomerGroupController extends BackendController
{
    private $data_arr = array(
            'section_title'=>'Nhóm khách hàng',
            'taxonomy_name' => 'nhóm khách hàng',
            'term_url' => '',
            'taxonomy_count_name' => 'Khách hàng',
            'taxonomy_url' => 'customer-group',
            'taxonomy_db' => 'customer_group',
            'level' => '0',

            'prefixSlug' => '',
    );
    public function index(Request $request)
    {
        /*Get type submut*/
        $data = $request->all();
        $type_request = '';
        if( $request->isMethod('post') && $request->ajax())
        {
            $type_request = 'ajax';
        }
        $this->data_arr['page_number'] = $request->input('page',1);
        $term = new TaxonomyController;
        return $term->index($data,$this->data_arr,$type_request);
    }
    
    public function create()
    {
        $term = new TaxonomyController;
        return $term->create($this->data_arr);
    }
    
    public function store(Request $request)
    {
        $type_request = '';
        if( $request->isMethod('post') && $request->ajax())
        {
            $type_request = 'ajax';
        }
        $data = $request->all();
        $term = new TaxonomyController;
        return $term->store($data,$this->data_arr,$type_request);
    }
    
    public function edit($term_id)
    {
        $term = new TaxonomyController;
        return $term->edit($term_id,$this->data_arr);
    }
    
    public function update($term_id,Request $request)
    {
         $type_request = '';
        if( $request->isMethod('post') && $request->ajax())
        {
            $type_request = 'ajax';
        }
        $data=$request->all();
        $term = new TaxonomyController;
        return $term->update($term_id,$data,$this->data_arr,$type_request);
    }
    
    public function destroy($term_id)
    {
        $term = new TaxonomyController;
        return $term->destroy($term_id,$this->data_arr);
    }
}
