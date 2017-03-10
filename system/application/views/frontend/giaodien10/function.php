<?php
/**
 * Template Name: GiaoDien10
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
        'slider',
        'facebook',
        'logo_main',
        'about',
        'mini_slider',
        'url_website',
        'copyright',
        'phone1',
        'phone2',
        'google_map',
    ];

    $numBegin = 1;
    $numEnd = 3;
    for( $i=$numBegin; $i<=$numEnd; $i++ )
    {
        $array[] = 'product_slug_'.$i;
        $array[] = 'product_type_'.$i;
    }

    return $array;
}

function themeOption($data)
{
    $dataOption = [];

    // Favicon
    $data['favicon']['image'] = isset($data['favicon']['image']) ? $data['favicon']['image'] : '';
    $dataOption['favicon'] = $data['favicon'];

    // Slider
    $data['slider'] = isset($data['slider']) ? $data['slider'] : [];
    foreach( $data['slider'] as $key => $value )
    {
        $data['slider'][$key]['image'] = isset($data['slider'][$key]['image']) ? $data['slider'][$key]['image'] : '';
        $data['slider'][$key]['url'] = isset($data['slider'][$key]['url']) ? $data['slider'][$key]['url'] : '';
    }
    $dataOption['slider'] = $data['slider'];

    // Logo Main
    $data['logo_main']['image'] = isset($data['logo_main']['image']) ? $data['logo_main']['image'] : '';
    //$data['logo_main']['url'] = isset($data['logo_main']['url']) ? $data['logo_main']['url'] : '';
    $dataOption['logo_main'] = $data['logo_main'];

    // Facebook
    $data['facebook']['url'] = isset($data['facebook']['url']) ? $data['facebook']['url'] : '';
    $dataOption['facebook'] = $data['facebook'];

    // About
    $data['about']['title'] = isset($data['about']['title']) ? $data['about']['title'] : '';
    $data['about']['text'] = isset($data['about']['text']) ? $data['about']['text'] : '';
    $dataOption['about'] = $data['about'];

    // Mini Slider
    foreach( $data['mini_slider'] as $key => $value )
    {
        $data['mini_slider'][$key]['image'] = isset($data['mini_slider'][$key]['image']) ? $data['mini_slider'][$key]['image'] : '';
        $data['mini_slider'][$key]['url'] = isset($data['mini_slider'][$key]['url']) ? $data['mini_slider'][$key]['url'] : '';
    }
    $dataOption['mini_slider'] = $data['mini_slider'];

    // Url Website
    $data['url_website']['url'] = isset($data['url_website']['url']) ? $data['url_website']['url'] : '';
    $dataOption['url_website'] = $data['url_website'];

    // Copyright
    $data['copyright']['text'] = isset($data['copyright']['text']) ? $data['copyright']['text'] : '';
    $dataOption['copyright'] = $data['copyright'];

    // Phone1
    $data['phone1']['text'] = isset($data['phone1']['text']) ? $data['phone1']['text'] : '';
    $dataOption['phone1'] = $data['phone1'];

    // Phone2
    $data['phone2']['text'] = isset($data['phone2']['text']) ? $data['phone2']['text'] : '';
    $dataOption['phone2'] = $data['phone2'];

    // Google Map
    $data['google_map']['url'] = isset($data['google_map']['url']) ? $data['google_map']['url'] : '';
    $dataOption['google_map'] = $data['google_map'];

    // Product Select Container
    $numBegin = 1;
    $numEnd = 3;
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