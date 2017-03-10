<?php
/**
 * Plugin Name: Group Products
 * Version: 1
 */

class group_products
{
	function widget_form($data)
	{
        /*-- Default Value --*/
        $id_group = isset($data['id_group']) ? $data['id_group'] : '';
        /*-- End Default Value --*/

		$html = '';
        /*
        $html .= '<form action="'.Request::fullUrl().'" method="post">';
        $html .= '<input type="hidden" name="_token" value="'.csrf_token().'" />';
        $html .= 'Id Nhom: <input type="text" name="id_group" value="'.$id_group.'"><br>';
        $html .= '</form>';
        */

		return $html;
	}

	function widget_data($data)
	{
		$widgetData = [];

		return $widgetData;
	}

	function run($data)
    {
    	$html = '';

        $today = time();
        $slug = 'san-pham-noi-bat';
        //Lấy mã group 
        $group_slug = DB::table('qm_term')->where('slug',$slug)->where('term_type','product_group')->first();
        
        //khuyến mãi
        $terms = DB::table('qm_term')->join('qm_termmeta','qm_term.term_id','=','qm_termmeta.term_id')
                                    ->where('term_type','product_promotion')
                                    ->where('qm_termmeta.meta_key','product_discount')
                                    ->get();
        //nhóm sản phẩm
        $groupProducts = DB::table('qm_term')->join('qm_term_relationships','qm_term_relationships.term_id','=','qm_term.term_id')
                                    ->where('term_type','product_group')->get();
        
        $products = DB::table('qm_product')
            ->join('qm_product_relationships','qm_product.product_id','=','qm_product_relationships.product_id')
            ->join('qm_productmeta','qm_product.product_id','=','qm_productmeta.product_id')
            ->where('qm_product_relationships.taxonomy_id',$group_slug->term_id)
            ->where('qm_product.product_status','public')
            ->where('meta_key','product_data')->take(8)->orderBy('qm_product.product_date','desc')->get();
        

        $arrPosts = [];
        /*Lấy giá khuyễn mãi*/
        foreach($products as $product)
        {
            $percent_discount=0;
            $percent_temp=0;
            $vnd_discount=0;
            $price=0;
            $value = decode_serialize($product->meta_value);
            foreach($terms as $term){
                $termmeta=decode_serialize($term->meta_value);
                //check discount
                if($termmeta["discount_promotion"]==2 && $termmeta["dv_count"]==1 && $termmeta["discount_active"]==1){
                     if(($termmeta["date_limit"]=="true") || ($termmeta["date_limit"]=="false" && $termmeta["date_end"]>=$today)){
                        if($termmeta["discount_offer"]==3 ){
                            foreach ($groupProducts as $groupProduct) {
                                if($product->post_id==$groupProduct->post_id){
                            
                                    if($termmeta['dv_value']==$groupProduct->term_id){
                                        if($termmeta['discount_type']==1){
                                            $vnd_discount = $termmeta["discount_take"];
                                            if($vnd_discount > $price){
                                                $price = $value['price_new'] - $termmeta["discount_take"];
                                            }
                                        }
                                        if($termmeta['discount_type']==2){
                                            $percent_temp=$termmeta["discount_take"];
                                            if($percent_temp > $percent_discount){
                                                $price=$value['price_new'] * (1 - $percent_temp/100);
                                                $percent_discount=$percent_temp;
                                            }
                                            
                                        }

                                    }
                                }
                            }    
                        }
                        if($termmeta["discount_offer"]==4 ){
                            if($termmeta['dv_value']==$product->product_id){
                                if($termmeta['discount_type']==1){
                                    $vnd_discount = $termmeta["discount_take"];
                                    if($vnd_discount > $price){
                                        $price = $value['price_new'] - $termmeta["discount_take"];
                                    }
                                }
                                if($termmeta['discount_type']==2){
                                    $percent_temp=$termmeta["discount_take"];
                                    if($percent_temp > $percent_discount){
                                        $price=$value['price_new'] * (1 - $percent_temp/100);
                                        $percent_discount=$percent_temp;
                                    }
                                    
                                }

                            }
                                
                        }
                        
                    }
                }
                //end check discount
            }
                            if($percent_discount!=0 || $vnd_discount!=0)
                            {
                                $vnd_discount = round(($vnd_discount/$value['price_new'])*100);
                                if($percent_discount < $vnd_discount){
                                    $percent_discount = $vnd_discount;
                                }
                            }
                        
                        $price_old = $value['price_old'];
                        $price_new = $value['price_new'];
                        //giá cũ gáng thành giá khuyễn mãi nếu có khuyến mãi
                        if( $price>0 )
                        {
                            $price_old = $value['price_new'];
                            $price_new = $price;
                        }
                        $arr = array(
                            'product_id' => $product->product_id,
                            'product_title' => $product->product_title,
                            'product_excerpt' => $product->product_excerpt,
                            'product_slug' => $product->product_slug,
                            'product_date' => $product->product_date,
                            'product_code' => $value['product_code'],
                            'percent_discount' =>$percent_discount,
                            'price_old' => $price_old,
                            'price_new' => $price_new,
                            'price_discount' =>$price,
                            'product_featured_image' => $value['post_featured_image'],
                        );
                        array_push($arrPosts,$arr);
        }

        if( count($arrPosts) > 0 )
        {
            $html .= '<div class="widget widget_group_products">';
            $html .= '<div class="heading">';
            $html .= '<h2>Nhom san pham</h2>';
            $html .= '</div>';
            $html .= '<div class="content">';
            $html .= '<ul>';

            foreach( $arrPosts as $post)
            {
                $html .= '<li>';
                $html .= '<form id="form_order_'.$post['product_id'].'" action="'.url('cart/order/'.$post['product_slug']).'" method="post">';
                $html .= '<input type="hidden" name="_token" value="'.csrf_token().'" />';
                $html .= '<input type="hidden" name="quantity" value="1" />';
                $html .= '<div class="title">';
                $html .= '<a title="'.$post['product_title'].'" href="'.url('collections/'.$post['product_slug']).'">'.$post['product_title'].'</a>';
                $html .= '</div>';
                $html .= '<div class="image">';
                $html .= '<a title="'.$post['product_title'].'" href="'.url('collections/'.$post['product_slug']).'">';
                $html .= '<img alt="'.$post['product_title'].'" src="'.loadFeatureImage($post['product_featured_image']).'" />';
                $html .= '</a>';
                $html .= '</div>';
                if( $post['percent_discount'] > 0 )
                {
                    $html .= '<div class="percent">'.$post['percent_discount'].'%</div>';
                }
                $html .= '<div class="price_new">'.number_format($post['price_new'],0,'.','.').'</div>';
                if( $post['price_old'] > 0 )
                {
                    $html .= '<div class="price_old">'.number_format($post['price_old'],0,'.','.').'</div>';
                }
                $html .='</form>';
                $html .= '</li>';
            }


            /*
            $html .= '<section id="wrap-content-center" class="wow bounceInLeft">
                        <div class="container">
                            <div class="clearfix">
                                <h3 class="title-box-home col-md-2">Sản phẩm nổi bật</h3>
                                <div class="line-title col-md-9"></div>
                            </div>
                            <div class="wrap-box-center col-sm-12">';
            foreach( $arrPosts as $post){       
                $html .= '<form id="form_order_'.$post['product_id'].'" action="'.url('cart/order/'.$post['product_slug']).'" method="post" class="variants"  enctype="multipart/form-data">
                            <input id="page_token" type="hidden" name="_token" value="'.csrf_token().'" />
                            <input type="hidden" name="quantity" value="1" />';

                $html .=            '<div class="wrap-box-padding">
                                        <a href="'.url('collections/'.$post['product_slug']).'">
                                            <div class="wrap-border-content-center">
                                                <div class="list-content-center">
                                                    <div class="img-product-home">
                                                        <img alt="'.$post['product_title'].'" title="'.$post['product_title'].'" 
                                                            src="'.loadFeatureImage($post['product_featured_image']).'" class="img-responsive" />';
                if($post['percent_discount']>0){
                    $html .=                                '<div class="sales">                    
                                                                <span>- '.$post['percent_discount'].'%</span>                   
                                                            </div>';
                }                       
                $html .=                            '</div>
                                                </div>
                                                <!--end list-content-center-->
                                                <div class="price-content-center">';
                $html .=                            '<div class="wrap-price">';
                $html .=                                '<span>'.number_format($post['price_new'],0,'.','.').'₫</span>';
                if($post['price_old']>0){
                    $html .=                                '<span><del>'.number_format($post['price_old'],0,'.','.').'₫</del></span>';
                }
                $html .=                            '</div>
                                                    <!--end .wrap-price-->
                                                    <div class="wrap-addcard">
                                                        <h4>
                                        <a href="'.url('collections/'.$post['product_slug']).'">'.$post['product_title'].'</a></h4>
                                        <span class="buy-home"><a onclick ="order('.$post['product_id'].')">Mua ngay</a></span>
                                        </div>                 
                                        </div>
                                        </div>
                                        </a>
                                    </div>';
                $html .= '</form>'; 
            }                   
            $html .=        '</div>
                        </div>
                        
                    </section>';
            */

            $html .= '</ul>';
            $html .= '</div>';
            $html .= '</div>';
        }
        return $html;
    }
}