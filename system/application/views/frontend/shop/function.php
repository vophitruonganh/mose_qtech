<?php
/**
 * Template Name: Shop
 * Version: 1
 */

function registerOption($array = []){
    $array = [
        'favicon',
        'slider',
        'promotion_banner',
    ];
    for( $i=1; $i<=2; $i++ )
    {
        $array[] = 'product_slug_'.$i;
        $array[] = 'product_type_'.$i;
    }

    return $array;
}

function themeOption($data){
	$dataOption = [];
    // Slider
    $data['slider'] = isset($data['slider']) ? $data['slider'] : [];
    foreach( $data['slider'] as $key => $value )
    {
        $data['slider'][$key]['image'] = isset($data['slider'][$key]['image']) ? $data['slider'][$key]['image'] : '';
        $data['slider'][$key]['url'] = isset($data['slider'][$key]['url']) ? $data['slider'][$key]['url'] : '';
        $data['slider'][$key]['caption_1'] = isset($data['slider'][$key]['caption_1']) ? $data['slider'][$key]['caption_1'] : '';
        $data['slider'][$key]['caption_2'] = isset($data['slider'][$key]['caption_2']) ? $data['slider'][$key]['caption_2'] : '';
        $data['slider'][$key]['caption_3'] = isset($data['slider'][$key]['caption_3']) ? $data['slider'][$key]['caption_3'] : '';
    }
    $dataOption['slider'] = $data['slider'];

    // promotion_banner
    $data['promotion_banner'] = isset($data['promotion_banner']) ? $data['promotion_banner'] : [];
    foreach( $data['promotion_banner'] as $key => $value )
    {
        $data['promotion_banner'][$key]['image'] = isset($data['promotion_banner'][$key]['image']) ? $data['promotion_banner'][$key]['image'] : '';
        $data['promotion_banner'][$key]['url'] = isset($data['promotion_banner'][$key]['url']) ? $data['promotion_banner'][$key]['url'] : '';
    }
    $dataOption['promotion_banner'] = $data['promotion_banner'];


	// Product Select Container
    $numBegin = 1;
    $numEnd = 2;
    $allowMainSelect = [0,1,2];
    for( $i=$numBegin; $i<=$numEnd; $i++ )
    {
        $mainSelect = 'main_select_'.$i;
        $productSlug = 'product_slug_'.$i;
        $productType = 'product_type_'.$i;
        $_mainSelect = isset($data['main_select_'.$i]) ? $data['main_select_'.$i] : 0;
        if( !in_array($_mainSelect,$allowMainSelect) ) $_mainSelect = 0;
        if( $_mainSelect == 0 )
        {
            $_productSlug = '';
            $_productType = '';
        }
        elseif( $_mainSelect == 1 )
        {
            $slug = isset($data['product_category_'.$i]) ? $data['product_category_'.$i] : '';
            $_productSlug = $slug;
            $_productType = 'product_category';
        }
        else // $_mainSelect == 2
        {
            $slug = isset($data['product_group_'.$i]) ? $data['product_group_'.$i] : '';
            $_productSlug = $slug;
            $_productType = 'product_group';
        }

        $dataOption[$productSlug] = $_productSlug;
        $dataOption[$productType] = $_productType;
    }

    return $dataOption;
}

?>