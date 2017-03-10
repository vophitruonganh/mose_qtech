<?php

//Lấy sản phẩm theo taxonomy
if( !function_exists('get_product_tax_limit') )
{
    function get_product_tax_limit( $taxonomy_type = '', $taxonomy_slug ='',$limit = '' )
    { 
        $query = DB::table('qm_product')->join('qm_variant','qm_variant.product_id','=','qm_product.product_id')
                ->select('qm_product.product_id','qm_product.product_title','qm_product.product_excerpt','qm_product.product_slug');
        if($taxonomy_slug){
            $query->join('qm_product_relationships','qm_product_relationships.product_id','=','qm_product.product_id')
                  ->join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_product_relationships.taxonomy_id')
                  ->where('qm_taxonomy.taxonomy_slug', $taxonomy_slug)->where('qm_taxonomy.taxonomy_type', $taxonomy_type);
        }
        if($limit){
            $query->take($limit);
        }
        $products = $query->where('qm_product.product_status','public')->groupBy('qm_product.product_id')->orderBY('qm_product.product_date','desc')->get();
        $product_arr = [];
        if($products){
        	foreach($products as $product){
                $variant_first = Get_first_variant_id_product( 'product_slug',  $product->product_slug);
        		
                $arr = [];
                $get_discount = promotionFace( $product->product_id, $variant_first['variant_id'] );
                $arr['product_id'] = $product->product_id;
                $arr['product_title'] = $product->product_title;
                $arr['product_excerpt'] = $product->product_excerpt;
                $arr['product_slug'] = $product->product_slug;
                //$arr['product_date'] = $product->product_date;
                $arr['product_image_id'] = $variant_first['variant_image'];
                /*dùng để kiểm tra cho đặt hàng khi hết hàng*/
                $arr['out_of_stock'] = $variant_first['out_of_stock'];
                $arr['quantity'] = $variant_first['quantity'];
                /* end */
                $arr['price_new'] = $get_discount['price_new'];
                $arr['percentage'] = $get_discount['percentage'];
                $arr['price_old'] = $get_discount['price_old'];
                $arr['price_new'] = $get_discount['price_new'];
                $arr['check_discount'] = $get_discount['check_discount'];

             	array_push($product_arr,$arr);
        	}
        }
        return $product_arr;
    }
}

//Lấy danh mục, nhãn sản phẩm
if( !function_exists('get_taxonomy_product') )
{
    function get_taxonomy_product( $taxonomy_type = 'product_category', $limit = '' )
    {
        $query = DB::table('qm_product_relationships')->join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_product_relationships.taxonomy_id')
                                                   ->join('qm_product','qm_product.product_id','=','qm_product_relationships.product_id')
                                                   ->select('qm_taxonomy.taxonomy_slug','qm_taxonomy.taxonomy_name')
                                                   ->where('qm_product.product_status','public')->where('qm_taxonomy.taxonomy_type', $taxonomy_type);
        if($limit){
            $query->take($limit);
        } 
        return $query->groupBy('qm_taxonomy.taxonomy_id')->orderBY('qm_taxonomy.taxonomy_id', 'desc')->get();
    }
}

//Lấy sản phẩm liên quan 
if( !function_exists('get_product_related') )
{
    function get_product_related( $taxonomy_type = 'product_tag', $product_slug = '', $limit = ''  )
    {
        //Lấy danh sách tag, cat của bài viết
        $taxonomy_id = DB::table('qm_product')->join('qm_product_relationships','qm_product_relationships.product_id','=','qm_product.product_id')
                                              ->join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_product_relationships.taxonomy_id')
                                              ->where('qm_product.product_slug',$product_slug)->where('qm_taxonomy.taxonomy_type',$taxonomy_type)
                                              ->pluck('qm_taxonomy.taxonomy_id');
        $query = DB::table('qm_product')->join('qm_product_relationships','qm_product_relationships.product_id','=','qm_product.product_id')
                                        ->select('qm_product.product_id','qm_product.product_title','qm_product.product_excerpt','qm_product.product_slug','qm_product_relationships.taxonomy_id')
                                        ->where('qm_product.product_status','public')->where('qm_product.product_slug','<>',$product_slug)
                                        ->whereIN('qm_product_relationships.taxonomy_id',$taxonomy_id)
                                        ->groupBy('qm_product.product_id');
        if($limit){
            $query-> take($limit);
        }
        $products =  $query->orderBy('product_date','DESC')->get();
        $product_arr = [];
        if($products){
            foreach($products as $product){
                $variant_first = Get_first_variant_id_product( 'product_slug',  $product->product_slug);
                $get_discount = promotionFace( $product->product_id, $variant_first['variant_id'] );
                $arr['product_id'] = $product->product_id;
                $arr['product_title'] = $product->product_title;
                $arr['product_excerpt'] = $product->product_excerpt;
                $arr['product_slug'] = $product->product_slug;
                //$arr['product_date'] = $product->product_date;
                $arr['product_image_id'] = $variant_first['variant_image'];
                /*dùng để kiểm tra cho đặt hàng khi hết hàng*/
                $arr['out_of_stock'] = $variant_first['out_of_stock'];
                $arr['quantity'] = $variant_first['quantity'];
                /* end */
                $arr['price_new'] = $get_discount['price_new'];
                $arr['percentage'] = $get_discount['percentage'];
                $arr['price_old'] = $get_discount['price_old'];
                $arr['price_new'] = $get_discount['price_new'];
                $arr['check_discount'] = $get_discount['check_discount'];

                array_push($product_arr,$arr);
            }
        }
        return $product_arr;
    }
}

//Lấy tag của sản phẩm chi tiết
if( !function_exists('get_taxonomy_product_detail') )
{
    function get_taxonomy_product_detail( $taxonomy_type = 'product_category', $product_slug = '', $limit = '' )
    {
        $query = DB::table('qm_product_relationships')->join('qm_product','qm_product.product_id','=','qm_product_relationships.product_id')
                                                      ->join('qm_taxonomy','qm_taxonomy.taxonomy_id','=','qm_product_relationships.taxonomy_id')
                                                      ->select('qm_taxonomy.taxonomy_name','qm_taxonomy.taxonomy_slug')
                                                      ->where('qm_product.product_slug', $product_slug);
        if($taxonomy_type){
            $query->where('qm_taxonomy.taxonomy_type',$taxonomy_type);
        }
        if($limit){
            $query->take($limit);
        }                        
        return $query->get();                      
    }
}

if( !function_exists('get_variant_meta_product_detail') )
{
    function get_variant_meta_product_detail( $variant_name = '', $product_id ='' /*$variant_id = array()*/ )
    {
        //return DB::table('qm_variant_meta')->where('variant_name',$variant_name)->whereIN('variant_id',$variant_id )->get();
        return DB::table('qm_product')->join('qm_variant','qm_variant.product_id','=','qm_product.product_id')
                 ->join('qm_variant_meta','qm_variant_meta.variant_id','=','qm_variant.variant_id')->where('qm_product.product_id',$product_id)
                 ->where('qm_variant_meta.variant_name',$variant_name)->groupBY('qm_variant_meta.variant_value')->get();
    }
}

if( !function_exists('Get_first_variant_id_product') )
{
    function Get_first_variant_id_product( $type = 'product_id', $value ='')
    {
        $variants = DB::table('qm_variant')->join('qm_variant_meta','qm_variant_meta.variant_id','=','qm_variant.variant_id')
                           ->join('qm_product','qm_product.product_id','=','qm_variant.product_id')
                           ->where('qm_product.'.$type, $value)->where('qm_variant_meta.variant_name','option_order')->get();
        $min = 9999;
        $arr = [];
        $arr['variant_id'] = '';
        $arr['variant_image'] = '';
        foreach($variants as $v){
            $variant_value = isset($v->variant_value) ? $v->variant_value: 9999;
            if($variant_value < $min){
                $min = $v->variant_value;
                $arr['variant_id'] = $v->variant_id;
                $arr['variant_image'] = $v->image;
                $arr['product_id'] = $v->product_id;
                $arr['out_of_stock'] = $v->out_of_stock;
                $arr['quantity'] = $v->quantity;
                $arr['sku'] = $v->sku;
            }
        }
        return $arr;
    }
}



?>