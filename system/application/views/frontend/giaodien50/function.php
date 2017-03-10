<?php
/**
 * Template Name: GiaoDien3
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

function registerOption()
{
    $array = [
        'favicon',
        'openDoor',
        'logo_main',
        'slider',
        'firstBanner',
        'secondBanner',
        'thirdBanner',
        'about',
        'social',
        'bottom_menu',
        'support',
        'policy',
        'guide',
        'copyright',
        'about_contact',
    ];

    $numBegin = 1;
    $numEnd = 5;
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

    // OpenDoor
    $dataOption['openDoor'] = $data['openDoor'];

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

    // About
    $data['about']['image'] = isset($data['about']['image']) ? $data['about']['image'] : '';
    $data['about']['heading'] = isset($data['about']['heading']) ? $data['about']['heading'] : '';
    $data['about']['content'] = isset($data['about']['content']) ? $data['about']['content'] : '';
    $dataOption['about'] = $data['about'];

    // Social
    $data['social']['heading'] = isset($data['social']['heading']) ? $data['social']['heading'] : '';
    foreach( $data['social'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['social'][$key]['class1'] = isset($data['social'][$key]['class1']) ? $data['social'][$key]['class1'] : '';
        $data['social'][$key]['class2'] = isset($data['social'][$key]['class2']) ? $data['social'][$key]['class2'] : '';
        $data['social'][$key]['title'] = isset($data['social'][$key]['title']) ? $data['social'][$key]['title'] : '';
        $data['social'][$key]['url'] = isset($data['social'][$key]['url']) ? $data['social'][$key]['url'] : '';
    }
    $dataOption['social'] = $data['social'];

    // Bottom Menu
    $data['bottom_menu']['heading'] = isset($data['bottom_menu']['heading']) ? $data['bottom_menu']['heading'] : '';
    foreach( $data['bottom_menu'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['bottom_menu'][$key]['title'] = isset($data['bottom_menu'][$key]['title']) ? $data['bottom_menu'][$key]['title'] : '';
        $data['bottom_menu'][$key]['url'] = isset($data['bottom_menu'][$key]['url']) ? $data['bottom_menu'][$key]['url'] : '';
    }
    $dataOption['bottom_menu'] = $data['bottom_menu'];

    // Support
    $data['support']['heading'] = isset($data['support']['heading']) ? $data['support']['heading'] : '';
    foreach( $data['support'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['support'][$key]['title'] = isset($data['support'][$key]['title']) ? $data['support'][$key]['title'] : '';
        $data['support'][$key]['url'] = isset($data['support'][$key]['url']) ? $data['support'][$key]['url'] : '';
    }
    $dataOption['support'] = $data['support'];

    // Policy
    $data['policy']['heading'] = isset($data['policy']['heading']) ? $data['policy']['heading'] : '';
    foreach( $data['policy'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['policy'][$key]['title'] = isset($data['policy'][$key]['title']) ? $data['policy'][$key]['title'] : '';
        $data['policy'][$key]['url'] = isset($data['policy'][$key]['url']) ? $data['policy'][$key]['url'] : '';
    }
    $dataOption['policy'] = $data['policy'];

    // Guide
    $data['guide']['heading'] = isset($data['guide']['heading']) ? $data['guide']['heading'] : '';
    foreach( $data['guide'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['guide'][$key]['title'] = isset($data['guide'][$key]['title']) ? $data['guide'][$key]['title'] : '';
        $data['guide'][$key]['url'] = isset($data['guide'][$key]['url']) ? $data['guide'][$key]['url'] : '';
    }
    $dataOption['guide'] = $data['guide'];

    // Copyright
    $data['copyright']['text'] = isset($data['copyright']['text']) ? $data['copyright']['text'] : '';
    $dataOption['copyright'] = $data['copyright'];

    // About Contact
    $data['about_contact']['logo'] = isset($data['about_contact']['logo']) ? $data['about_contact']['logo'] : '';
    $data['about_contact']['text'] = isset($data['about_contact']['text']) ? $data['about_contact']['text'] : '';
    $dataOption['about_contact'] = $data['about_contact'];

    // Product Select Container
    $numBegin = 1;
    $numEnd = 5;
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

    return $dataOption;
}