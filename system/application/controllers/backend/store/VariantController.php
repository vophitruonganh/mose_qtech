<?php

namespace App\Http\Controllers\backend\store;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Controllers\BackendController;
use App\Http\Controllers\Controller;
/*-- Call Other Controller --*/
use App\Http\Controllers\backend\attachment\AttachmentController;
/*-- End Call Other Controller --*/
/*
 * Use Library of Laravel
 */
use App\Models\Product;
use App\Models\ProductMeta;
use App\Models\Variant;
use App\Models\VariantMeta;
use App\Models\Term;
use App\Models\Termmeta;
use App\Models\ProductRelationships;
use App\Models\Option;
use App\Models\Attachment;
use App\Models\Taxonomy;
use App\Models\TaxonomyMeta;
use Validator;
use Session;
use DB;
use App\Libraries\FacebookLibrary\Facebook;
use App\Libraries\FacebookLibrary\FacebookApiException;

class VariantController extends Controller
{

    
    //Thêm phiên bản
    public function create($product_id,Request $request){
        $variant = new Variant;
        if($request->ajax()){
            return $variant->Get_variant_meta_list($product_id);
        }
    }
    //Thêm phiên bản (post)
    public function store($product_id,Request $request){
        $data=$request->all();
        $variant=new Variant;
        $variant_meta=new VariantMeta;
        $validator = Validator::make($data,[
            'sku'=>'unique:qm_variant,sku'
        ],[
           'sku.unique' => 'Mã sản phẩm đã tồn tại',
            
        ]);
        $barcode = isset($data['barcode'])? $data['barcode'] : '';
        $price_new = isset($data['price_new'])? str_replace( ',', '', $data['price_new']) : '';
        $price_old = isset($data['price_old'])? str_replace( ',', '', $data['price_old']) : '';
        $product_quantity = isset($data['product_quantity'])? $data['product_quantity'] : '';
        $product_ship = isset($data['product_ship'])? 1 : 0;
        $product_weight = isset($data['product_weight'])? str_replace( ',', '', $data['product_weight'] ) : '';
        $sku = isset($data['sku'])? $data['sku'] : '';
        $tracking = isset($data['tracking'])? $data['tracking'] : '';
        $variant_option_name = isset($data['variant_option_name'])? $data['variant_option_name'] : [];
        $quantity_limit = isset($data['quantity_limit'])? 1 : 0;
        $arraytracking = ['notracking' => 0,'tracking' => 1];
        $variant_option = [];
        //các thuộc tính của variant
        $variant_option_lists=$variant->Get_variant_meta_list($product_id);
        $variants = $variant->Get_variant_product_id($product_id);
        //Đếm variant hiện có
        $count_variant = count($variants);

        if( $validator->fails() )
        {
            if($request->ajax()){
                return '{"Response":"False","Message":"'.urlencode($validator->errors()).'"}';
            }
        }
        foreach ($variant_option_lists as $variant_option_list) {
            array_push($variant_option, $variant_option_list->variant_name);
        }
        
        if( !array_key_exists($data['tracking'], $arraytracking)){
            $tracking = 0;
        }
        else{
           $tracking = $arraytracking[$data['tracking']];
        }
        foreach($variant_option_name as $name){
            if(!$name){
                if($request->ajax()){
                    return '{"Response":"False","Message":"Giá trị thuộc tính không được rỗng"}';
                }
            }
        }
        //check variant insert
        $check_variant=$variant->check_variant($product_id,$variant_option,$variant_option_name);

        
        /*-- Check variant meta --*/
        if(count($check_variant)>0)
        {
            if($request->ajax()){
                return '{"Response":"False","Message":"Đã có sản phẩm cùng loại"}';
            }
           
        }
        
        $datavariant= [];
        $datavariant['barcode'] = $barcode;
        $datavariant['price_new'] = str_replace( ',', '', $price_new);
        $datavariant['price_old'] = str_replace( ',', '', $price_old);
        $datavariant['quantity'] = $tracking == 1 ? $product_quantity : 0;
        $datavariant['inventory'] = $product_quantity;
        $datavariant['ship'] = $product_ship;
        $datavariant['weight']= $product_weight;
        $datavariant['sku'] = $sku;
        $datavariant['tracking_policy'] = $tracking;
        $datavariant['out_of_stock'] = $tracking == 1 ? $quantity_limit : 0;
        $datavariant['product_id']=$product_id;
        $variant_id = $variant->Insert_variant($datavariant);
        if($variant_id){
            $i=0;
            foreach ($variant_option as $name) {
                $variant_meta->Insert_variant_meta($variant_id,$name,$variant_option_name[$i],$i+1);
                $i++;
            }
            $variant_meta->Insert_variant_meta($variant_id,'option_order',$count_variant+1,0);
        }
        
        $view = $this->loadlistVariant($product_id);
        return $view;
    }
    /*
        sắp xếp variant
    */
    public function VariantSort($product_id){
        return $this->getVariantItemOrder($product_id);
    }
    public function VariantSortSubmit($product_id,Request $request){
        $data = $request->all();
        $variant=new Variant;
        $variant_meta=new VariantMeta;
        $variant_option = isset($data['variant_option'])? $data['variant_option'] : [];
        $variant_option_name = isset($data['variant_option_name'])? $data['variant_option_name'] : [];
        $array_option = [];
        $array_option_name = [];
        $variant_id = [];
        
        foreach ($variant_option as $value) {
            array_push($array_option,$value);
        }
        foreach ($variant_option_name as $value) {
            array_push($array_option_name,$value);
        }

        //Cập nhật order của variant option và variant order
        $this->updateVariantOption($product_id,$array_option,$array_option_name);

        
        $view = $this->loadlistVariant($product_id);
        return $view;

    }

    /*
        Change Variant Option
    */
    public function VariantOption($product_id){
        return $this->getVariantItemOrder($product_id);
    }
    public function VariantOptionSubmit($product_id,Request $request){
        $data = $request->all();
        $variant = new Variant;
        $variant_meta=new VariantMeta;
        $variant_option = isset($data['variant_option'])? $data['variant_option'] : [];
        $variant_option_name = isset($data['variant_option_name'])? $data['variant_option_name'] : [];
        foreach ($variant_option_name as $name) {
            if($name==''){
                return '{"Response":"False","Message":"Giá trị không được để trống"}';
            }
        }

        $variants = $variant->Get_variant_product_id($product_id);

        $count = [];
        $variant_option_old = [];
        $variant_option_new = [];
        $i=0;

        
        //Cập nhật tên thuộc tính
        $variant_option_lists=$this->updateVariantNameProduct($product_id,$variant_option);
        //đếm số thuộc tính hiện có
        $countVariantCurrent = count($variant_option_lists);
        foreach ($variant_option_lists as $value) {
            array_push($variant_option_old, $value->variant_name);
        }

        //tìm thuộc tính mới thêm
        foreach ($variant_option as $option) {
            if(!in_array($option, $variant_option_old)){
                array_push($variant_option_new, $option);
            }
        }
        //END

        //Đếm variant hiện có
        $count_variant = count($variants);

        //Nếu có nhiều phiên bản
        if($count_variant>1){
            if(count($variant_option)<$countVariantCurrent){
                return '{"Response":"False","Message":"Không được xóa thuộc tính"}';
            
            }
            else{
                //insert
                foreach ($variants as $value) {
                    $variant_id = $value->variant_id;
                    $i=0;
                    $order_variant=$countVariantCurrent;
                    foreach ($variant_option_new as $option_new) {
                        $variant_meta->Insert_variant_meta($variant_id, $option_new, $variant_option_name[$i], $order_variant+1);
                        $i++;
                        $order_variant++;
                    }

                }
            }
        }
        else{
            //Xóa thuộc tính khi chỉ có 1 phiên bản
            if($countVariantCurrent>count($variant_option) && count($variant_option)>0){
                //delete
                $option_delete = [];
                foreach ($variant_option as $key => $option) {
                    if(in_array($option, $variant_option_old)){
                        unset($variant_option_old[$key]);
                    }
                }
                $option_delete = $variant_option_old;
                foreach ($option_delete as $value) {
                    if($value!=''){
                        $variant_meta->Delete_variant_meta_name_by_product($product_id,$value);
                    }
                }
            }
            else{
                //insert
                foreach ($variants as $value) {
                    $variant_id = $value->variant_id;
                    $i=0;
                    $order_variant=$countVariantCurrent;
                    foreach ($variant_option_new as $option_new) {
                        $variant_meta->Insert_variant_meta($variant_id, $option_new, $variant_option_name[$i], $order_variant+1);
                        $i++;
                        $order_variant++;
                    }

                }
            }
        }
        
        $view = $this->loadlistVariant($product_id);
        return $view;

        
        
    }
    /* 
        cập nhật tên cho option name
    */
    private function updateVariantNameProduct($product_id = '',$variant_option = ''){
        $variant = new Variant;
        $variant_meta = new VariantMeta;
        $variant_option_lists = $variant->Get_variant_meta_list($product_id);
        $i=1;
        foreach ($variant_option_lists as $key => $value) {
            if(isset($variant_option[$key])){
                $variant_meta->Update_variant_meta_name_by_product($product_id,$variant_option[$key],$i);
                $i++;
            }
        }
        
        return $variant->Get_variant_meta_list($product_id);
    }
    
    /*
        lấy các thuộc tính ban của phiên bản
    */
    public function getVariantItemOrder($product_id){
        $variant = new Variant;
        $variant_meta = new VariantMeta;
        //các thuộc tính của variaant
        $variant_options = $variant->Get_variant_meta_list($product_id);
        //thứ tự variant
        $variant_orders = $variant->Get_variant_id_order_by($product_id);
        $data=[];
        $array_list = [];

        foreach ($variant_options as $variant_option) {
            $data[$variant_option->variant_name] = [];
            foreach ($variant_orders as $variant_order) {
                $variant_id=$variant_order->variant_id;
                $variant_name=$variant_option->variant_name;
                $variant_mt = $variant_meta->Get_variant_meta_name($variant_id,$variant_name);
                if(!in_array($variant_mt->variant_value,$data[$variant_option->variant_name])){
                    array_push($data[$variant_option->variant_name],$variant_mt->variant_value);
                }
                
                

            }
        }

        foreach ($data as $key => $value) {
            array_push($array_list, ['variant_option' => $key, 'variant_option_name' => $value]);
        }

        return $array_list;
    }
    /* 
        cập nhật order variant (thứ tự các phiên bản)
    */
    private function updateVariantOption($product_id = 0,$option_name = array(),$option_item = array()){
        $variant = new Variant;
        $variant_meta = new VariantMeta;
        $option1 = isset($option_item[0])? $option_item[0] : [];
        $option2 = isset($option_item[1])? $option_item[1] : [];
        $option3 = isset($option_item[2])? $option_item[2] : [];
        // return count($option3);
        

        $option_arr=[];
        
        if(count($option3) && !count($option2)&& !count($option1)){
            foreach ($option3 as $value3) {
                array_push($option_arr, [$value3]);
            }
        }elseif(count($option3) && count($option2) && !count($option1)){
            foreach ($option2 as $value2) {
                foreach ($option3 as $value3) {
                    array_push($option_arr, [$value2,$value3]);
                }
            }
        }elseif(count($option3) && count($option2) && count($option1)){
            foreach ($option1 as $value1) {
                foreach ($option2 as $value2) {
                    foreach ($option3 as $value3) {
                        array_push($option_arr, [$value1,$value2,$value3]);
                    }
                }
            }
        }elseif(count($option3) && !count($option2) && count($option1)){
            foreach ($option1 as $value1) {
                foreach ($option3 as $value3) {
                    array_push($option_arr, [$value1,$value3]);
                }
            }
        }elseif(!count($option3) && count($option2) && !count($option1)){
            foreach ($option2 as $value2) {
                array_push($option_arr, [$value2]);
            }  
        }elseif(!count($option3) && count($option2) && count($option1)){
            foreach ($option1 as $value1) {
                foreach ($option2 as $value2) {
                    array_push($option_arr, [$value1,$value2]);
                }
            }
        }elseif(!count($option3) && !count($option2) && count($option1)){
            foreach ($option1 as $value1) {
                array_push($option_arr, [$value1]);
            }
        }

        /* Update option order */
        $i=1;
        foreach ($option_arr as $array_value) {
            $update_order_variant = $variant_meta->Update_variant_option_order($product_id,$option_name,$array_value,$i);
            if($update_order_variant){
                $i++;
            }
        }
        /* END */
        /* Update variant order */
        $order=1;
        foreach($option_name as $name){
            $variant_meta->Update_variant_meta_order_by_product($product_id,$name,$order);
            $order++;
        }
        /* END */
        return $option_name;
    }
    /*
        Get image of Product
    */
    public function getVariantImageProduct($product_id){
        $_product = new Product;
        $attachment = new Attachment;
        $product = $_product->Get_product_id($product_id);
        $objdata = Array('Response'=>'False','Data'=>'');
        $productImage = [];
        $productImage = decode_serialize($product->product_image);
        $data_product_image=[];
        foreach($productImage as $key => $value){
            if( strlen($value) > 0 )
            {
                if( !filter_var($value, FILTER_VALIDATE_URL) )
                {
                    $query = get_image($value);
                    if( $query != null )
                    {

                        array_push($data_product_image, ['id' => $value,'url' => get_image($value,'thumb')]);
                    }
                }
                else
                {

                }
            }
        }
        $objdata["Data"] = $data_product_image;
        if($objdata["Data"]){
            $objdata["Response"] = 'True';
        }
        return $objdata;
    }
    /* 
        cập nhật hình ảnh cho phiên bản
    */
    public function UpdateVariantImageProduct($product_id,Request $request){
        $data = $request->all();
        $variant = new Variant;
        $attachment_id = isset($data['attachment_id'])? $data['attachment_id'] : '';
        $variant_id = isset($data['variant_id'])? $data['variant_id'] : '';
        $data = $request->all();
        $variant_update = $variant->Update_variant_image($product_id,$variant_id,$attachment_id);
        if($variant_update){
            return '{"Response":"True"}';
        }

        return '{"Response":"False"}';
    }
    /*
        Xóa variant
    */
    public function destroy($product_id,Request $request){
        $data = $request->all();
        $variant = new Variant();
        $variant_id = isset($data['variant_id'])? $data['variant_id'] : '';
        $delete_variant = $variant->Delete_variant($product_id,$variant_id);
        if($delete_variant){
            return '{"Response":"True"}';
        }

        return '{"Response":"False"}';
    }

    /* 
        Cập nhật variant
    */
    public function edit($product_id,Request $request){
        $data = $request->all();
        $array = [];
        $variant = new Variant;
        $variant_meta=new VariantMeta;
        $variant_id = isset($data['variant_id'])? $data['variant_id'] : '';
        $check_variant=$variant->check_variant_by_product($product_id,$variant_id);
        
        $option = [];
        //các thuộc tính của variaant
        $variant_options = $variant->Get_variant_meta_list($product_id);
       
        if(!$check_variant){
            return '{"Response":"False"}';
        }
        $get_variant=$variant->Get_variant_id($variant_id);
        $get_variant_meta_list=$variant_meta->Get_variant_meta_id($variant_id);
        foreach ($variant_options as $key => $variant_option) {
            $variant_option = $variant_option->variant_name;
            $variant_option_name = $get_variant_meta_list[$key]->variant_value;
            array_push($option, ['variant_option'=>$variant_option,'variant_option_name'=>$variant_option_name]);
        }

        $array_data =[
            'sku' => $get_variant->sku,
            'price_old' => $get_variant->price_old,
            'price_new' => $get_variant->price_new,
            'weight' => $get_variant->weight,
            'barcode' => $get_variant->barcode,
            'tracking_policy' => $get_variant->tracking_policy,
            'out_of_stock' => $get_variant->out_of_stock,
            'quantity' => $get_variant->quantity,
            'inventory' => $get_variant->inventory,
            'ship' => $get_variant->ship,
            'image' => $get_variant->image,
            'option' => $option
            ];
        return $array_data;
    }
    /* 
        Cập nhật variant (post)
    */
    public function update($product_id,Request $request){
        $data = $request->all();
        $variant_id = isset($data['variant_id'])? $data['variant_id'] : '';
        $validator = Validator::make($data,[
            'sku'=>'unique:qm_variant,sku,'.$variant_id.',variant_id'
        ],[
           'sku.unique' => 'Mã sản phẩm đã tồn tại',
            
        ]);

        $variant = new Variant;
        $variant_meta = new VariantMeta;
        $variant_options = $variant->Get_variant_meta_list($product_id);
        $price_new = isset($data['price_new'])? str_replace( ',', '', $data['price_new'] ): 0;
        $price_old = isset($data['price_old'])? str_replace( ',', '', $data['price_old'] ) : 0;
        $sku = isset($data['sku'])? $data['sku'] : '';
        $barcode = isset($data['barcode'])? $data['barcode'] : '';
        $product_weight = isset($data['product_weight'])? str_replace( ',', '', $data['product_weight'] ) : 0;
        $product_ship = isset($data['product_ship'])? 1 : 0;
        $tracking = isset($data['tracking'])? $data['tracking'] : 0;
        $product_quantity = isset($data['product_quantity'])? $data['product_quantity'] : 0;
        $variant_option_name = isset($data['variant_option_name'])? $data['variant_option_name'] : [];
        $quantity_limit = isset($data['quantity_limit'])? 1 : 0;
        $variant_option = [];
        foreach ($variant_options as $key => $value) {
            array_push($variant_option, $value->variant_name);
        }

        if( $validator->fails() )
        {
            if($request->ajax()){
                return '{"Response":"False","Message":"'.urlencode($validator->errors()).'"}';
            }
        }
        foreach($variant_option_name as $name){
            if(!$name){
                if($request->ajax()){
                    return '{"Response":"False","Message":"Giá trị thuộc tính không được rỗng"}';
                }
            }
        }
        $variant=$variant->Get_variant_id($variant_id);
        if(!$variant){
            return redirect('admin/product');
        }
        $arraytracking = ['notracking' => 0,'tracking' => 1];
        if( !array_key_exists($tracking, $arraytracking)){
            $tracking = 0;
            
        }
        else{
           $tracking = $arraytracking[$tracking];
        }

        $product_quantity = $tracking == 1 ? $product_quantity : 0;
        
        $data_variant_update=[];
        $data_variant_update['sku'] = $sku;
        $data_variant_update['price_old'] = $price_old;
        $data_variant_update['price_new'] = $price_new;
        $data_variant_update['barcode'] = $barcode;
        $data_variant_update['weight'] = $product_weight;
        $data_variant_update['ship'] = $product_ship;
        $data_variant_update['tracking_policy'] = $tracking;
        $data_variant_update['quantity'] = $product_quantity;
        $data_variant_update['inventory'] = $product_quantity;
        $data_variant_update['out_of_stock'] = $tracking == 1 ? $quantity_limit : 0;

        $check_variant=$variant->check_variant($product_id,$variant_option,$variant_option_name,$variant_id);

        if(count($check_variant)>0)
        {
            if($request->ajax()){
                return '{"Response":"False","Message":"Đã có sản phẩm cùng loại"}';
            }
        }

        $variant->Update_variant($variant_id,$data_variant_update);

        foreach ($variant_option as $key => $option) {

             $variant_meta->Update_variant_meta($variant_id,$option,$variant_option_name[$key]);
        }
        $view = $this->loadlistVariant($product_id);
        return $view;
        
    }
    /* 
        load danh sách phiên bản
    */
    private function loadlistVariant($product_id = 0){
        $variant = new Variant;
        $variant_meta = new VariantMeta;
        $variant_array = $this -> list_variant($product_id);
        $array_title_table = [];
        $variants = $variant-> Get_variant_id_order_by( $product_id );
        //các thuộc tính của variaant
        $variant_option_lists = $variant->Get_variant_meta_list($product_id);
        foreach ($variant_option_lists as $variant_option_list) {
            array_push($array_title_table, $variant_option_list->variant_name);
        }
        
        $objdata = Array('Response'=>'False','Data'=>'');
        $view = view('backend.pages.store.product.listVariant',[
            'variant_array'         => $variant_array,
            'array_title_table'        => $array_title_table,
        ]);
        $objdata['Data'] = urlencode($view);
        if($objdata['Data']){
            $objdata['Response'] = 'True';
        }
        return $objdata;
    }
    /*
        List variant of product
    */
    private function list_variant($product_id = 0){
        $variant = new Variant;
        $variant_meta = new VariantMeta;
        $variant_array = [];
        $variants = $variant-> Get_variant_id_order_by( $product_id );
        foreach ($variants as $variant) {
            $variant_item=$variant_meta-> Get_variant_meta_id($variant->variant_id);
            $option1 = isset($variant_item[0])? $variant_item[0] : [];
            $option2 = isset($variant_item[1])? $variant_item[1] : [];
            $option3 = isset($variant_item[2])? $variant_item[2] : [];
            array_push($variant_array,[
                'variant_id'=>$variant->variant_id,
                'variant_sku'=>$variant->sku,
                'variant_price_old'=>$variant->price_old,
                'variant_price'=>$variant->price_new,
                'weight'=>$variant->weight,
                'barcode'=>$variant->barcode,
                'tracking_policy'=>$variant->tracking_policy,
                'out_of_stock'=>$variant->out_of_stock,
                'variant_quantity'=>$variant->quantity,
                'inventory'=>$variant->inventory,
                'ship'=>$variant->ship,
                'image'=>$variant->image,             
                'option1'=>$option1,
                'option2'=>$option2,
                'option3'=>$option3
            ]);
        }
        return $variant_array;

    }
    
}