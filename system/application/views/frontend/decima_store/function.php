<?php
/**
 * Template Name: Decimashop
 * Version: 1
 */
function resgister_navigation()
{
    return [
        'top_menu' => 'Top Menu',
    ];
}

function registerOption()
{
    $array = [
        'favicon',
        'slider',
        'features',
        'highlights',
        'featured_brands'
    ];
    for( $i=1; $i<=2; $i++ )
    {
        $array[] = 'product_slug_'.$i;
        $array[] = 'product_type_'.$i;
    }
    
    return $array;
}

function themeOption($data)
{
	$dataOption = [];

    // Slider
    $data['slider'] = isset($data['slider']) ? $data['slider'] : [];
    foreach( $data['slider'] as $key => $value )
    {
        $data['slider'][$key]['image'] = isset($data['slider'][$key]['image']) ? $data['slider'][$key]['image'] : '';
        $data['slider'][$key]['url'] = isset($data['slider'][$key]['url']) ? $data['slider'][$key]['url'] : '';
        $data['slider'][$key]['header'] = isset($data['slider'][$key]['header']) ? $data['slider'][$key]['header'] : '';
        $data['slider'][$key]['content'] = isset($data['slider'][$key]['content']) ? $data['slider'][$key]['content'] : '';
    }
    $dataOption['slider'] = $data['slider'];

    // Features
    $data['features'] = isset($data['features']) ? $data['features'] : [];
    foreach( $data['features'] as $key => $value )
    {
        $data['features'][$key]['class'] = isset($data['features'][$key]['class']) ? $data['features'][$key]['class'] : '';
        $data['features'][$key]['header'] = isset($data['features'][$key]['header']) ? $data['features'][$key]['header'] : '';
        $data['features'][$key]['content'] = isset($data['features'][$key]['content']) ? $data['features'][$key]['content'] : '';
    }
    $dataOption['features'] = $data['features'];

    //highlights
    $data['highlights'] = isset($data['highlights']) ? $data['highlights'] : [];
    foreach( $data['highlights'] as $key => $value )
    {
        $data['highlights'][$key]['image'] = isset($data['highlights'][$key]['image']) ? $data['highlights'][$key]['image'] : '';
        $data['highlights'][$key]['url'] = isset($data['highlights'][$key]['url']) ? $data['highlights'][$key]['url'] : '';
        $data['highlights'][$key]['header'] = isset($data['highlights'][$key]['header']) ? $data['highlights'][$key]['header'] : '';
        $data['highlights'][$key]['content'] = isset($data['highlights'][$key]['content']) ? $data['highlights'][$key]['content'] : '';
    }
    $dataOption['highlights'] = $data['highlights'];

    // Featured brands
    $data['featured_brands'] = isset($data['featured_brands']) ? $data['featured_brands'] : [];
    $data['featured_brands']['heading'] = isset($data['featured_brands']['heading']) ? $data['featured_brands']['heading'] : '';
    foreach( $data['featured_brands'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['featured_brands'][$key]['image'] = isset($data['featured_brands'][$key]['image']) ? $data['featured_brands'][$key]['image'] : '';
    }
    $dataOption['featured_brands'] = $data['featured_brands'];

	// Product Select Container
    $numBegin = 1;
    $numEnd = 1;
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