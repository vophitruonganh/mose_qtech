<?php
/**
 * Template Name: GiaoDien6
 * Version: 1
 */
 
function resgisterWidget()
{
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
        'logo_main',
        'phone',
        'slider',
        'facebook',
        'firstBanner',
        'secondBanner',
        'thirdBanner',
        'fourthBanner',
        'service',
        'hotline',
        'information',
        'customer_link',
        'support',
        'social',
        'fifthBanner',
        'sixthBanner',
        'logo_footer',
        'copyright',
        'google_map',
        'information_more',
    ];

    $numBegin = 1;
    $numEnd = 3;
    for( $i=$numBegin; $i<=$numEnd; $i++ )
    {
        $array[] = 'product_slug_'.$i;
        $array[] = 'product_type_'.$i;
    }

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

    // Logo_main
    $data['logo_main'] = isset($data['logo_main']) ? $data['logo_main'] : '';
    $dataOption['logo_main'] = $data['logo_main'];

    // Phone
    $data['phone'] = isset($data['phone']) ? $data['phone'] : '';
    $dataOption['phone'] = $data['phone'];

    // Slider
    $data['slider'] = isset($data['slider']) ? $data['slider'] : [];
    foreach( $data['slider'] as $key => $value )
    {
        $data['slider'][$key]['big_image'] = isset($data['slider'][$key]['big_image']) ? $data['slider'][$key]['big_image'] : '';
        $data['slider'][$key]['url'] = isset($data['slider'][$key]['url']) ? $data['slider'][$key]['url'] : '';
        $data['slider'][$key]['thumb_image'] = isset($data['slider'][$key]['thumb_image']) ? $data['slider'][$key]['thumb_image'] : '';
        $data['slider'][$key]['title'] = isset($data['slider'][$key]['title']) ? $data['slider'][$key]['title'] : '';
        $data['slider'][$key]['description'] = isset($data['slider'][$key]['description']) ? $data['slider'][$key]['description'] : '';
    }
    $dataOption['slider'] = $data['slider'];

    // Facebook
    $data['facebook']['url'] = isset($data['facebook']['url']) ? $data['facebook']['url'] : '';
    $dataOption['facebook'] = $data['facebook'];

    // First Banner
    $data['firstBanner']['url'] = isset($data['firstBanner']['url']) ? $data['firstBanner']['url'] : '';
    $data['firstBanner']['image'] = isset($data['firstBanner']['image']) ? $data['firstBanner']['image'] : '';
    $dataOption['firstBanner'] = $data['firstBanner'];

    // Second Banner
    $data['secondBanner']['url'] = isset($data['secondBanner']['url']) ? $data['secondBanner']['url'] : '';
    $data['secondBanner']['image'] = isset($data['secondBanner']['image']) ? $data['secondBanner']['image'] : '';
    $dataOption['secondBanner'] = $data['secondBanner'];

    // Third Banner
    $data['thirdBanner']['url'] = isset($data['thirdBanner']['url']) ? $data['thirdBanner']['url'] : '';
    $data['thirdBanner']['image'] = isset($data['thirdBanner']['image']) ? $data['thirdBanner']['image'] : '';
    $dataOption['thirdBanner'] = $data['thirdBanner'];

    // Fourth Banner
    $data['fourthBanner']['url'] = isset($data['fourthBanner']['url']) ? $data['fourthBanner']['url'] : '';
    $data['fourthBanner']['image'] = isset($data['fourthBanner']['image']) ? $data['fourthBanner']['image'] : '';
    $dataOption['fourthBanner'] = $data['fourthBanner'];

    // Service
    foreach( $data['service'] as $key => $value )
    {
        $data['service'][$key]['class'] = isset($data['service'][$key]['class']) ? $data['service'][$key]['class'] : '';
        $data['service'][$key]['heading'] = isset($data['service'][$key]['heading']) ? $data['service'][$key]['heading'] : '';
        $data['service'][$key]['content'] = isset($data['service'][$key]['content']) ? $data['service'][$key]['content'] : '';
    }
    $dataOption['service'] = $data['service'];

    // Hotline
    $data['hotline']['text1'] = isset($data['hotline']['text1']) ? $data['hotline']['text1'] : '';
    $data['hotline']['text2'] = isset($data['hotline']['text2']) ? $data['hotline']['text2'] : '';
    $data['hotline']['text3'] = isset($data['hotline']['text3']) ? $data['hotline']['text3'] : '';
    $dataOption['hotline'] = $data['hotline'];

    // Information
    $data['information']['heading'] = isset($data['information']['heading']) ? $data['information']['heading'] : '';
    foreach( $data['information'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['information'][$key]['text'] = isset($data['information'][$key]['text']) ? $data['information'][$key]['text'] : '';
        $data['information'][$key]['url'] = isset($data['information'][$key]['url']) ? $data['information'][$key]['url'] : '';
    }
    $dataOption['information'] = $data['information'];

    // Customer Link
    $data['customer_link']['heading'] = isset($data['customer_link']['heading']) ? $data['customer_link']['heading'] : '';
    foreach( $data['customer_link'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['customer_link'][$key]['text'] = isset($data['customer_link'][$key]['text']) ? $data['customer_link'][$key]['text'] : '';
        $data['customer_link'][$key]['url'] = isset($data['customer_link'][$key]['url']) ? $data['customer_link'][$key]['url'] : '';
    }
    $dataOption['customer_link'] = $data['customer_link'];

    // Support
    $data['support']['heading'] = isset($data['support']['heading']) ? $data['support']['heading'] : '';
    foreach( $data['support'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['support'][$key]['text'] = isset($data['support'][$key]['text']) ? $data['support'][$key]['text'] : '';
        $data['support'][$key]['url'] = isset($data['support'][$key]['url']) ? $data['support'][$key]['url'] : '';
    }
    $dataOption['support'] = $data['support'];

    // Social
    foreach( $data['social'] as $key => $value )
    {
        $data['social'][$key]['class'] = isset($data['social'][$key]['class']) ? $data['social'][$key]['class'] : '';
        $data['social'][$key]['url'] = isset($data['social'][$key]['url']) ? $data['social'][$key]['url'] : '';
    }
    $dataOption['social'] = $data['social'];

    // Fifth Banner
    $data['fifthBanner']['url'] = isset($data['fifthBanner']['url']) ? $data['fifthBanner']['url'] : '';
    $data['fifthBanner']['image'] = isset($data['fifthBanner']['image']) ? $data['fifthBanner']['image'] : '';
    $dataOption['fifthBanner'] = $data['fifthBanner'];

    // Sixth Banner
    $data['sixthBanner']['url'] = isset($data['sixthBanner']['url']) ? $data['sixthBanner']['url'] : '';
    $data['sixthBanner']['image'] = isset($data['sixthBanner']['image']) ? $data['sixthBanner']['image'] : '';
    $dataOption['sixthBanner'] = $data['sixthBanner'];

    // Product Select Container
    $numBegin = 1;
    $numEnd = 3;
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

    // Logo Footer
    $data['logo_footer'] = isset($data['logo_footer']) ? $data['logo_footer'] : '';
    $dataOption['logo_footer'] = $data['logo_footer'];

    // Copyright
    $data['copyright']['text'] = isset($data['copyright']['text']) ? $data['copyright']['text'] : '';
    $dataOption['copyright'] = $data['copyright'];

    // Google Map
    $data['google_map']['url'] = isset($data['google_map']['url']) ? $data['google_map']['url'] : '';
    $dataOption['google_map'] = $data['google_map'];

    // Information More
    $data['information_more']['heading'] = isset($data['information_more']['heading']) ? $data['information_more']['heading'] : '';
    foreach( $data['information_more'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['information_more'][$key]['text'] = isset($data['information_more'][$key]['text']) ? $data['information_more'][$key]['text'] : '';
        $data['information_more'][$key]['url'] = isset($data['information_more'][$key]['url']) ? $data['information_more'][$key]['url'] : '';
    }
    $dataOption['information_more'] = $data['information_more'];

    return $dataOption;
}