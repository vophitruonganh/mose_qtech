<?php
/**
 * Template Name: GiaoDien4
 * Version: 1
 */
 
function resgisterWidget()
{
    return 
    [
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
        'slider',
        'slider_menu',
        'welcome',
        'channel',
        'firstBanner',
        'secondBanner',
        'thirdBanner',
        'fourthBanner',
        'fifthBanner',
        'sixthBanner',
        'service',
        'facebook',
        'seventhBanner',
        'policy',
        'social',
        'eighthBanner',
        'ninthBanner',
        'links',
        'support',
        'service_menu',
    ];

    $numBegin = 1;
    $numEnd = 7;
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
    
    // Slider
    $data['slider'] = isset($data['slider']) ? $data['slider'] : [];
    foreach( $data['slider'] as $key => $value )
    {
        $data['slider'][$key]['image'] = isset($data['slider'][$key]['image']) ? $data['slider'][$key]['image'] : '';
        $data['slider'][$key]['url'] = isset($data['slider'][$key]['url']) ? $data['slider'][$key]['url'] : '';
    }
    $dataOption['slider'] = $data['slider'];

    // Slider Menu
    foreach( $data['slider_menu'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['slider_menu'][$key]['title'] = isset($data['slider_menu'][$key]['title']) ? $data['slider_menu'][$key]['title'] : '';
        $data['slider_menu'][$key]['url'] = isset($data['slider_menu'][$key]['url']) ? $data['slider_menu'][$key]['url'] : '';
    }
    $dataOption['slider_menu'] = $data['slider_menu'];

    // Welcome
    $data['welcome'] = isset($data['welcome']) ? $data['welcome'] : '';
    $dataOption['welcome'] = $data['welcome'];

    // Channel
    foreach( $data['channel'] as $key => $value )
    {
        $data['channel'][$key]['image'] = isset($data['channel'][$key]['image']) ? $data['channel'][$key]['image'] : '';
        $data['channel'][$key]['title'] = isset($data['channel'][$key]['title']) ? $data['channel'][$key]['title'] : '';
        $data['channel'][$key]['url'] = isset($data['channel'][$key]['url']) ? $data['channel'][$key]['url'] : '';
    }
    $dataOption['channel'] = $data['channel'];

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

    // Fifth Banner
    $data['fifthBanner']['url'] = isset($data['fifthBanner']['url']) ? $data['fifthBanner']['url'] : '';
    $data['fifthBanner']['image'] = isset($data['fifthBanner']['image']) ? $data['fifthBanner']['image'] : '';
    $dataOption['fifthBanner'] = $data['fifthBanner'];

    // Sixth Banner
    $data['sixthBanner']['url'] = isset($data['sixthBanner']['url']) ? $data['sixthBanner']['url'] : '';
    $data['sixthBanner']['image'] = isset($data['sixthBanner']['image']) ? $data['sixthBanner']['image'] : '';
    $dataOption['sixthBanner'] = $data['sixthBanner'];

    // Service
    foreach( $data['service'] as $key => $value )
    {
        $data['service'][$key]['class'] = isset($data['service'][$key]['class']) ? $data['service'][$key]['class'] : '';
        $data['service'][$key]['heading'] = isset($data['service'][$key]['heading']) ? $data['service'][$key]['heading'] : '';
        $data['service'][$key]['content'] = isset($data['service'][$key]['content']) ? $data['service'][$key]['content'] : '';
    }
    $dataOption['service'] = $data['service'];

    // Facebook
    $data['facebook']['url'] = isset($data['facebook']['url']) ? $data['facebook']['url'] : '';
    $dataOption['facebook'] = $data['facebook'];

    // Seventh Banner
    $data['seventhBanner']['url'] = isset($data['seventhBanner']['url']) ? $data['seventhBanner']['url'] : '';
    $data['seventhBanner']['image'] = isset($data['seventhBanner']['image']) ? $data['seventhBanner']['image'] : '';
    $dataOption['seventhBanner'] = $data['seventhBanner'];

    // Policy
    $data['policy']['heading'] = isset($data['policy']['heading']) ? $data['policy']['heading'] : '';
    foreach( $data['policy'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['policy'][$key]['class'] = isset($data['policy'][$key]['class']) ? $data['policy'][$key]['class'] : '';
        $data['policy'][$key]['text'] = isset($data['policy'][$key]['text']) ? $data['policy'][$key]['text'] : '';
    }
    $dataOption['policy'] = $data['policy'];

    // Social
    foreach( $data['social'] as $key => $value )
    {
        $data['social'][$key]['class'] = isset($data['social'][$key]['class']) ? $data['social'][$key]['class'] : '';
        $data['social'][$key]['url'] = isset($data['social'][$key]['url']) ? $data['social'][$key]['url'] : '';
    }
    $dataOption['social'] = $data['social'];

    // Eighth Banner
    $data['eighthBanner']['url'] = isset($data['eighthBanner']['url']) ? $data['eighthBanner']['url'] : '';
    $data['eighthBanner']['image'] = isset($data['eighthBanner']['image']) ? $data['eighthBanner']['image'] : '';
    $dataOption['eighthBanner'] = $data['eighthBanner'];

    // Ninth Banner
    $data['ninthBanner']['url'] = isset($data['ninthBanner']['url']) ? $data['ninthBanner']['url'] : '';
    $data['ninthBanner']['image'] = isset($data['ninthBanner']['image']) ? $data['ninthBanner']['image'] : '';
    $dataOption['ninthBanner'] = $data['ninthBanner'];

    // Product Select Container
    $numBegin = 1;
    $numEnd = 7;
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

    // Links
    $data['links']['heading'] = isset($data['links']['heading']) ? $data['links']['heading'] : '';
    foreach( $data['links'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['links'][$key]['title'] = isset($data['links'][$key]['title']) ? $data['links'][$key]['title'] : '';
        $data['links'][$key]['url'] = isset($data['links'][$key]['url']) ? $data['links'][$key]['url'] : '';
    }
    $dataOption['links'] = $data['links'];

    // Support
    $data['support']['heading'] = isset($data['support']['heading']) ? $data['support']['heading'] : '';
    foreach( $data['support'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['support'][$key]['title'] = isset($data['support'][$key]['title']) ? $data['support'][$key]['title'] : '';
        $data['support'][$key]['url'] = isset($data['support'][$key]['url']) ? $data['support'][$key]['url'] : '';
    }
    $dataOption['support'] = $data['support'];

    // Service Menu
    $data['service_menu']['heading'] = isset($data['service_menu']['heading']) ? $data['service_menu']['heading'] : '';
    foreach( $data['service_menu'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['service_menu'][$key]['title'] = isset($data['service_menu'][$key]['title']) ? $data['service_menu'][$key]['title'] : '';
        $data['service_menu'][$key]['url'] = isset($data['service_menu'][$key]['url']) ? $data['service_menu'][$key]['url'] : '';
    }
    $dataOption['service_menu'] = $data['service_menu'];

    return $dataOption;
}