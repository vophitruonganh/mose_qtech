<?php
/**
 * Template Name: GiaoDien7
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
        'openDoor',
        'service',
        'slider',
        'facebook',
        'firstBanner',
        'secondBanner',
        'thirdBanner',
        'information',
        'support',
        'policy',
        'channel',
        'companyName',
        'copyright',
        'social',
        'serviceInfo',
    ];

    $numBegin = 1;
    $numEnd = 4;
    for( $i=$numBegin; $i<=$numEnd; $i++ )
    {
        $array[] = 'product_slug_'.$i;
        $array[] = 'product_type_'.$i;
    }

    $numBegin = 1;
    $numEnd = 1;
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

    // OpenDoor
    $dataOption['openDoor'] = $data['openDoor'];

    // Service
    foreach( $data['service'] as $key => $value )
    {
        $data['service'][$key]['heading'] = isset($data['service'][$key]['heading']) ? $data['service'][$key]['heading'] : '';
        $data['service'][$key]['text'] = isset($data['service'][$key]['text']) ? $data['service'][$key]['text'] : '';
    }
    $dataOption['service'] = $data['service'];

    // Slider
    $data['slider'] = isset($data['slider']) ? $data['slider'] : [];
    foreach( $data['slider'] as $key => $value )
    {
        $data['slider'][$key]['image'] = isset($data['slider'][$key]['image']) ? $data['slider'][$key]['image'] : '';
        $data['slider'][$key]['url'] = isset($data['slider'][$key]['url']) ? $data['slider'][$key]['url'] : '';
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

    // Information
    $data['information']['heading'] = isset($data['information']['heading']) ? $data['information']['heading'] : '';
    foreach( $data['information'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['information'][$key]['text'] = isset($data['information'][$key]['text']) ? $data['information'][$key]['text'] : '';
        $data['information'][$key]['url'] = isset($data['information'][$key]['url']) ? $data['information'][$key]['url'] : '';
    }
    $dataOption['information'] = $data['information'];

    // Support
    $data['support']['heading'] = isset($data['support']['heading']) ? $data['support']['heading'] : '';
    foreach( $data['support'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['support'][$key]['text'] = isset($data['support'][$key]['text']) ? $data['support'][$key]['text'] : '';
        $data['support'][$key]['url'] = isset($data['support'][$key]['url']) ? $data['support'][$key]['url'] : '';
    }
    $dataOption['support'] = $data['support'];

    // Policy
    $data['policy']['heading'] = isset($data['policy']['heading']) ? $data['policy']['heading'] : '';
    foreach( $data['policy'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['policy'][$key]['text'] = isset($data['policy'][$key]['text']) ? $data['policy'][$key]['text'] : '';
        $data['policy'][$key]['url'] = isset($data['policy'][$key]['url']) ? $data['policy'][$key]['url'] : '';
    }
    $dataOption['policy'] = $data['policy'];

    // Channel
    $data['channel']['heading'] = isset($data['channel']['heading']) ? $data['channel']['heading'] : '';
    $data['channel']['text'] = isset($data['channel']['text']) ? $data['channel']['text'] : '';
    $dataOption['channel'] = $data['channel'];

    // Company Name
    $data['companyName'] = isset($data['companyName']) ? $data['companyName'] : '';
    $dataOption['companyName'] = $data['companyName'];

    // Copyright
    $data['copyright']['text'] = isset($data['copyright']['text']) ? $data['copyright']['text'] : '';
    $dataOption['copyright'] = $data['copyright'];

    // Social
    foreach( $data['social'] as $key => $value )
    {
        $data['social'][$key]['image'] = isset($data['social'][$key]['image']) ? $data['social'][$key]['image'] : '';
        $data['social'][$key]['url'] = isset($data['social'][$key]['url']) ? $data['social'][$key]['url'] : '';
        $data['social'][$key]['title'] = isset($data['social'][$key]['title']) ? $data['social'][$key]['title'] : '';
    }
    $dataOption['social'] = $data['social'];

    // Service Information
    foreach( $data['serviceInfo'] as $key => $value )
    {
        $data['serviceInfo'][$key]['image'] = isset($data['serviceInfo'][$key]['image']) ? $data['serviceInfo'][$key]['image'] : '';
        $data['serviceInfo'][$key]['heading'] = isset($data['serviceInfo'][$key]['heading']) ? $data['serviceInfo'][$key]['heading'] : '';
        $data['serviceInfo'][$key]['content'] = isset($data['serviceInfo'][$key]['content']) ? $data['serviceInfo'][$key]['content'] : '';
    }
    $dataOption['serviceInfo'] = $data['serviceInfo'];

    // Product Select Container
    $numBegin = 1;
    $numEnd = 4;
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
    $numEnd = 1;
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

    return $dataOption;
}