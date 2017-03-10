<?php
/**
 * Template Name: GiaoDien9
 * Version: 1
 */

function resgisterWidget(){
    return [
        [
            'name' => 'Block left top content',
            'id' => 'block-after-content',
            'description' => 'Khu vực sidebar hiển thị dưới mỗi bài viết',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        ],
        [
            'name' => 'Block left bottom content',
            'id' => 'block-before-content',
            'description' => 'Khu vực sidebar hiển thị trên mỗi bài viết',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        ],
        [
            'name' => 'Block right content',
            'id' => 'block-before-content',
            'description' => 'Khu vực sidebar hiển thị trên mỗi bài viết',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        ],
    ];
}


// menu site
function resgister_navigation()
{
    return [
        'top_menu' => 'Top Menu',
    ];
}

// dang ky bien
function registerOption()
{
    $array = [
        'favicon',
        'logo_main',
        'service',
        'slider',
        'about',
        'productText',
        'comment',
        'partner',
        'facebook',
        'social',
        'background_page',
    ];


    // product page
    $numBegin = 1;
    $numEnd = 1;
    for( $i=$numBegin; $i<=$numEnd; $i++ )
    {
        $array[] = 'product_slug_'.$i;
        $array[] = 'product_type_'.$i;
    }
    /* post page  */
    $numBegin = 1;
    $numEnd = 2;
    for( $i=$numBegin; $i<=$numEnd; $i++ )
    {
        $array[] = 'post_slug_'.$i;
        $array[] = 'post_type_'.$i;
    }


    return $array;
}

function themeOption($data)
{
    $dataOption = [];

    // Favicon
    $data['favicon']['image'] = isset($data['favicon']['image']) ? $data['favicon']['image'] : '';
    $dataOption['favicon'] = $data['favicon'];


    // Background Page
    foreach( $data['background_page'] as $key => $value )
    {
        $data['background_page'][$key]['url'] = isset($data['background_page'][$key]['url']) ? $data['background_page'][$key]['url'] : '';
        $data['background_page'][$key]['image'] = isset($data['background_page'][$key]['image']) ? $data['background_page'][$key]['image'] : '';
    }
    $dataOption['background_page'] = $data['background_page'];


    // Logo_main
    $data['logo_main'] = isset($data['logo_main']) ? $data['logo_main'] : '';
    $dataOption['logo_main'] = $data['logo_main'];

    // Service
    $data['service']['heading'] = isset($data['service']['heading']) ? $data['service']['heading'] : '';
    $data['service']['text'] = isset($data['service']['text']) ? $data['service']['text'] : '';
    foreach( $data['service'] as $key => $value )
    {
        if( $key === 'heading' || $key === 'text' ) continue;
        $data['service'][$key]['image'] = isset($data['service'][$key]['image']) ? $data['service'][$key]['image'] : '';
        $data['service'][$key]['title'] = isset($data['service'][$key]['title']) ? $data['service'][$key]['title'] : '';
        $data['service'][$key]['url'] = isset($data['service'][$key]['url']) ? $data['service'][$key]['url'] : '';
        $data['service'][$key]['text'] = isset($data['service'][$key]['text']) ? $data['service'][$key]['text'] : '';
    }
    $dataOption['service'] = $data['service'];

    // Slider
    $data['slider'] = isset($data['slider']) ? $data['slider'] : [];
    foreach( $data['slider'] as $key => $value )
    {
        $data['slider'][$key]['big_image'] = isset($data['slider'][$key]['big_image']) ? $data['slider'][$key]['big_image'] : '';
        $data['slider'][$key]['url'] = isset($data['slider'][$key]['url']) ? $data['slider'][$key]['url'] : '';

    }
    $dataOption['slider'] = $data['slider'];

    // About
    $data['about']['image'] = isset($data['about']['image']) ? $data['about']['image'] : '';
    $data['about']['heading'] = isset($data['about']['heading']) ? $data['about']['heading'] : '';
    $data['about']['text'] = isset($data['about']['text']) ? $data['about']['text'] : '';
    $dataOption['about'] = $data['about'];

    // Product Text

    $dataOption['productText'] = $data['productText'];

    // Comment
    $data['comment']['heading'] = isset($data['comment']['heading']) ? $data['comment']['heading'] : '';
    foreach( $data['comment'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['comment'][$key]['image'] = isset($data['comment'][$key]['image']) ? $data['comment'][$key]['image'] : '';
        $data['comment'][$key]['content'] = isset($data['comment'][$key]['content']) ? $data['comment'][$key]['content'] : '';
    }
    $dataOption['comment'] = $data['comment'];

    // Partner
    $data['partner']['heading'] = isset($data['partner']['heading']) ? $data['partner']['heading'] : '';
    foreach( $data['partner'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['partner'][$key]['image'] = isset($data['partner'][$key]['image']) ? $data['partner'][$key]['image'] : '';
        $data['partner'][$key]['url'] = isset($data['partner'][$key]['url']) ? $data['partner'][$key]['url'] : '';
    }
    $dataOption['partner'] = $data['partner'];

    // Facebook
    $data['facebook']['url'] = isset($data['facebook']['url']) ? $data['facebook']['url'] : '';
    $dataOption['facebook'] = $data['facebook'];

    // Customer Link
    $data['customer_link']['heading'] = isset($data['customer_link']['heading']) ? $data['customer_link']['heading'] : '';
    foreach( $data['customer_link'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['customer_link'][$key]['text'] = isset($data['customer_link'][$key]['text']) ? $data['customer_link'][$key]['text'] : '';
        $data['customer_link'][$key]['url'] = isset($data['customer_link'][$key]['url']) ? $data['customer_link'][$key]['url'] : '';
    }
    $dataOption['customer_link'] = $data['customer_link'];
    // Social
    foreach( $data['social'] as $key => $value )
    {
        $data['social'][$key]['class'] = isset($data['social'][$key]['class']) ? $data['social'][$key]['class'] : '';
        $data['social'][$key]['url'] = isset($data['social'][$key]['url']) ? $data['social'][$key]['url'] : '';
    }
    $dataOption['social'] = $data['social'];

    // Product Select Container
    $numBegin = 1;
    $numEnd = 1;
    $allowMainSelect = [0,1,2];
    for( $i=$numBegin; $i<=$numEnd; $i++ )
    {
        $mainSelect = 'main_select_'.$i;
        $productSlug = 'product_slug_'.$i;
        $productType = 'product_type_'.$i;
        $$mainSelect = isset($data['main_select_'.$i]) ? $data['main_select_'.$i] : 0;
        if( !in_array($$mainSelect,$allowMainSelect) ) $$mainSelect = 0;
        if( $$mainSelect == 0 )
        {
            $$productSlug = '';
            $$productType = '';
        }
        elseif( $$mainSelect == 1 )
        {
            $slug = isset($data['product_category_'.$i]) ? $data['product_category_'.$i] : '';
            $$productSlug = $slug;
            $$productType = 'product_category';
        }
        else // $$mainSelect == 2
        {
            $slug = isset($data['product_group_'.$i]) ? $data['product_group_'.$i] : '';
            $$productSlug = $slug;
            $$productType = 'product_group';
        }

        $dataOption[$productSlug] = $$productSlug;
        $dataOption[$productType] = $$productType;
    }

    // Post Select Container
    $numBegin = 1;
    $numEnd = 2;
    $allowMainSelect = [0,1];

    for( $i=$numBegin; $i<=$numEnd; $i++ )
    {
        $mainSelect = 'main_select_'.$i;
        $postSlug = 'post_slug_'.$i;
        $postType = 'post_type_'.$i;
        $$mainSelect = isset($data['post_main_select_'.$i]) ? $data['post_main_select_'.$i] : 0;
        if( !in_array($$mainSelect,$allowMainSelect) ) $$mainSelect = 0;
        if( $$mainSelect == 0 )
        {
            $$postSlug = '';
            $$postType = '';
        }
        else // $$mainSelect == 1
        {
            $slug = isset($data['post_category_'.$i]) ? $data['post_category_'.$i] : '';
            $$postSlug = $slug;
            $$postType = 'post_category';
        }

        $dataOption[$postSlug] = $$postSlug;
        $dataOption[$postType] = $$postType;
    }
    // End Post Select Container

    return $dataOption;
}