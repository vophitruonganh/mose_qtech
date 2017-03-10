<?php
/**
 * Template Name: GiaoDien11
 * Version: 1
 */

// function resgisterWidget()
// {
//     return
//     [
//         [
//             'name' => 'Block left top content',
//             'id' => 'block-after-content',
//             'description' => 'Khu vực sidebar hiển thị dưới mỗi bài viết',
//             'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//             'after_widget' => '</aside>',
//             'before_title' => '<h1 class="widget-title">',
//             'after_title' => '</h1>',
//         ],
//         [
//             'name' => 'Block left bottom content',
//             'id' => 'block-before-content',
//             'description' => 'Khu vực sidebar hiển thị trên mỗi bài viết',
//             'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//             'after_widget' => '</aside>',
//             'before_title' => '<h1 class="widget-title">',
//             'after_title' => '</h1>',
//         ],
//         [
//             'name' => 'Block right content',
//             'id' => 'block-before-content',
//             'description' => 'Khu vực sidebar hiển thị trên mỗi bài viết',
//             'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//             'after_widget' => '</aside>',
//             'before_title' => '<h1 class="widget-title">',
//             'after_title' => '</h1>',
//         ],
//     ];
// }

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
        'site_name',
        'logo_main',
        'slider',
        'firstBanner',
        'about',
        'bottom_menu',
        'service',
        'social',
        'copyright',
        'google_map',
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

    // Site Name
    $data['site_name'] = isset($data['site_name']) ? $data['site_name'] : '';
    $dataOption['site_name'] = $data['site_name'];

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

    // Bottom Menu
    $data['bottom_menu']['heading'] = isset($data['bottom_menu']['heading']) ? $data['bottom_menu']['heading'] : '';
    foreach( $data['bottom_menu'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['bottom_menu'][$key]['title'] = isset($data['bottom_menu'][$key]['title']) ? $data['bottom_menu'][$key]['title'] : '';
        $data['bottom_menu'][$key]['url'] = isset($data['bottom_menu'][$key]['url']) ? $data['bottom_menu'][$key]['url'] : '';
    }
    $dataOption['bottom_menu'] = $data['bottom_menu'];

     // About
    $data['about']['title'] = isset($data['about']['title']) ? $data['about']['title'] : '';
    $data['about']['logo'] = isset($data['about']['logo']) ? $data['about']['logo'] : '';
    $data['about']['text'] = isset($data['about']['text']) ? $data['about']['text'] : '';
    $dataOption['about'] = $data['about'];

    // Service
    $data['service']['heading'] = isset($data['service']['heading']) ? $data['service']['heading'] : '';
    foreach( $data['service'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['service'][$key]['title'] = isset($data['service'][$key]['title']) ? $data['service'][$key]['title'] : '';
        $data['service'][$key]['url'] = isset($data['service'][$key]['url']) ? $data['service'][$key]['url'] : '';
    }
    $dataOption['service'] = $data['service'];

    // Social
    foreach( $data['social'] as $key => $value )
    {
        $data['social'][$key]['image'] = isset($data['social'][$key]['image']) ? $data['social'][$key]['image'] : '';
        $data['social'][$key]['url'] = isset($data['social'][$key]['url']) ? $data['social'][$key]['url'] : '';
    }
    $dataOption['social'] = $data['social'];
    // End Social

    // Copyright
    $data['copyright']['text'] = isset($data['copyright']['text']) ? $data['copyright']['text'] : '';
    $dataOption['copyright'] = $data['copyright'];
    // End Copyright
    // Google Map
    $data['google_map']['url'] = isset($data['google_map']['url']) ? $data['google_map']['url'] : '';
    $dataOption['google_map'] = $data['google_map'];

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

    return $dataOption;
}