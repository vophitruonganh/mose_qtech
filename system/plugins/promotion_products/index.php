<?php
/**
 * Plugin Name: Promotion Products
 * Version: 1
 */

class promotion_products
{
	function widget_form($data)
	{
		/*-- Default Value --*/
        $headingPlugin = isset($data['headingPlugin']) ? $data['headingPlugin'] : 'Sản Phẩm Khuyến Mãi';
        $classCss = isset($data['classCss']) ? $data['classCss'] : '';
		$numberPost = isset($data['numberPost']) ? $data['numberPost'] : 4;
        $useImage = isset($data['useImage']) ? $data['useImage'] : 1;
        $widthImage = isset($data['widthImage']) ? $data['widthImage'] : 50;
        $heightImage = isset($data['heightImage']) ? $data['heightImage'] : 50;
        $showPriceOld = isset($data['showPriceOld']) ? $data['showPriceOld'] : 1;
		/*-- End Default Value --*/

		$html = '';
		$html .= '<form id="promotionProduct" action="'.Request::fullUrl().'" method="post">';
		$html .= '<input type="hidden" name="_token" value="'.csrf_token().'" />';
        $html .= 'Heading Plugin: <input type="text" name="headingPlugin" value="'.$headingPlugin.'"><br>';
        $html .= 'Class Css: <input type="text" name="classCss" value="'.$classCss.'"><br>';

        $html .= '<input id="useImage" type="checkbox" name="useImage"';
        if( $useImage )
        {
            $html .= ' checked="checked"';
        }
        $html .= ' /><label for="useImage">Use Image</label><br>';

        $html .= 'Width Image: <input type="text" name="widthImage" value="'.$widthImage.'"><br>';
        $html .= 'Height Image: <input type="text" name="heightImage" value="'.$heightImage.'"><br>';

        $html .= '<input id="showPriceOld" type="checkbox" name="showPriceOld"';
        if( $showPriceOld )
        {
            $html .= ' checked="checked"';
        }
        $html .= ' /><label for="showPriceOld">Show Price Old</label><br>';

		$html .= 'Number Product: <input type="text" name="numberPost" value="'.$numberPost.'"><br>';
		$html .= '<button type="submit">Save</button>';
		$html .= '</form>';

        $html .= '<script type="text/javascript">';
        $html .= '$(document).ready(function(){';
        $html .= 'if(!$("#useImage").is(\':checked\')) {';
        $html .= '$("#promotionProduct input[name=\'widthImage\'], #promotionProduct input[name=\'heightImage\']").attr(\'disabled\', \'disabled\');';
        $html .= '}';
        $html .= '$("#useImage").on(\'click\',function(){';
        $html .= 'if($(this).is(\':checked\')) {';
        $html .= '$("#promotionProduct input[name=\'widthImage\'], #promotionProduct input[name=\'heightImage\']").removeAttr(\'disabled\');';
        $html .= '} else {';
        $html .= '$("#promotionProduct input[name=\'widthImage\'], #promotionProduct input[name=\'heightImage\']").attr(\'disabled\', \'disabled\');';
        $html .= '}';
        $html .= '});';
        $html .= '});';
        $html .= '</script>';

		return $html;
	}

	function widget_data($data)
	{
		$widgetData = [];

        // Heading Plugin
        $headingPlugin = isset($data['headingPlugin']) ? $data['headingPlugin'] : 'Sản Phẩm Khuyến Mãi';
        $widgetData['headingPlugin'] = $headingPlugin;
        // End

        // Use Image
        $useImage = isset($data['useImage']) ? 1 : 0;
        $widgetData['useImage'] = $useImage;
        // End

        // Width Image
        $defaultWidthImage = 50;
        $widthImage = isset($data['widthImage']) ? $data['widthImage'] : $defaultWidthImage;
        $widthImage = intval($widthImage);
        $widthImage = $widthImage > 0 ? $widthImage : $defaultWidthImage;
        $widgetData['widthImage'] = $widthImage;
        // End

        // Height Image
        $defaultHeightImage = 50;
        $heightImage = isset($data['heightImage']) ? $data['heightImage'] : $defaultHeightImage;
        $heightImage = intval($heightImage);
        $heightImage = $heightImage > 0 ? $heightImage : $defaultHeightImage;
        $widgetData['heightImage'] = $heightImage;
        // End

        // Show Price Old
        $showPriceOld = isset($data['showPriceOld']) ? 1 : 0;
        $widgetData['showPriceOld'] = $showPriceOld;
        // End

        // Class Css
        $classCss = isset($data['classCss']) ? $data['classCss'] : '';
        $widgetData['classCss'] = $classCss;
        // End

        // Number Post
		$defaultNumberPost = 4;
		$numberPost = isset($data['numberPost']) ? $data['numberPost'] : $defaultNumberPost;
		$numberPost = intval($numberPost);
		$numberPost = $numberPost > 0 ? $numberPost : $defaultNumberPost;
		$widgetData['numberPost'] = $numberPost;
        // End

		return $widgetData;
	}

	function run($data)
    {
        // Heading Plugin
		$headingPlugin = isset($data['headingPlugin']) ? $data['headingPlugin'] : 'Sản Phẩm Khuyến Mãi';
        // End

        // Class Css
        $classCss = isset($data['classCss']) ? $data['classCss'] : '';
        // End

        // Use Image
        $useImage = isset($data['useImage']) ? $data['useImage'] : 1;
        // End

        // Width Image
        $widthImage = isset($data['widthImage']) ? $data['widthImage'] : 50;
        // End

        // Height Image
        $heightImage = isset($data['heightImage']) ? $data['heightImage'] : 50;
        // End

        // Show Price Old
        $showPriceOld = isset($data['showPriceOld']) ? $data['showPriceOld'] : 1;
        // End

        // Number Post
        $defaultNumberPost = 4;
        $numberPost = isset($data['numberPost']) ? $data['numberPost'] : $defaultNumberPost;
        // End

    	$html = '';

    	$today = time();

    	//Lấy nhóm sản phẩm
	    $groupProducts = DB::table('qm_term')->join('qm_term_relationships','qm_term_relationships.term_id','=','qm_term.term_id')->where('term_type','product_group')->get();

	    //Lấy khuyến mãi
    	$terms = DB::table('qm_term')->join('qm_termmeta','qm_term.term_id','=','qm_termmeta.term_id')
                                    ->where('term_type','product_promotion')
                                    ->where('qm_termmeta.meta_key','product_discount')
                                    ->get();

        //Lấy sản phẩm mới 
	    $products=DB::table('qm_product')->join('qm_productmeta','qm_product.product_id','=','qm_productmeta.product_id')
                                ->where('qm_product.product_status','public')
                                ->where('meta_key','product_data')->orderBy('qm_product.product_date','desc')->get();

        $arrPosts=[];
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
                                if($product->post_id==$groupProduct->product_id){
                            
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
                'post_featured_image' => $value['post_featured_image'],
            );
            array_push($arrPosts,$arr);
    	}

    	
        $html .= '<div class="widget widget_promotion_products '.$classCss.'">';
        $html .= '<div class="heading">';
		$html .= '<h2>'.$headingPlugin.'</h2>';
        $html .= '</div>';
        $html .= '<div class="content">';
		$html .= '<ul>';
        if(count($arrPosts)>0)
        {
            $i = 0 ;
            foreach($arrPosts as $post)
            {
                if($post['percent_discount']>0 && $i<$numberPost)
                {
                    $i++;
                    $html .= '<li>';
                    if( $useImage )
                    {
                        $html .= '<img class="image" width="'.$widthImage.'" height="'.$heightImage.'" src="'.loadFeatureImage($post['post_featured_image']).'" alt="'.$post['product_title'].'" />';
                    }
                    $html .= '<a class="link" href="'.url('collections/'.$post['product_slug']).'" title="'.$post['product_title'].'">'.$post['product_title'].'</a>';
                    $html .= '<span class="price_new">'.number_format($post['price_new'],0,'.','.').'₫</span>';
                    if( $showPriceOld )
                    {
                        $html .= '<p class="price_old">'.number_format($post['price_old'],0,'.','.').'₫</p>';
                    }
                    $html .= '</li>';
                }
            }
        }
		
		$html .= '</ul>';
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }
}