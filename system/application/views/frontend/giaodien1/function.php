<?php
/**
 * Template Name: GiaoDien1
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
        'left_menu' => 'Left Menu',
        'right_menu' => 'Right Menu',
        'bottom_menu' => 'Bottom Menu',
    ];
}

function registerOption()
{
    $array = [
        'favicon',
        'background_page',
        'feature',
        'testimonial',
        'photo',
        'about',
        'slide_main',
        'logo_main',
        'footer',
        //'header_info',
    ];

    $numBegin = 1;
    $numEnd = 4;
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

    /*
    //Header_info
    $data['header_info']['text'] = isset($data['header_info']['text']) ? $data['header_info']['text'] : '';
    $dataOption['header_info'] = $data['header_info'];
    */

    // Logo
    /*
    if(count($data['logo_main'])>0)
    {
        foreach ($data['logo_main'] as $key => $value){
            $data['logo_main'][$key]['image'] = isset($data['logo_main'][$key]['image']) ? $data['logo_main'][$key]['image'] : '';
            $data['logo_main'][$key]['url'] = isset($data['logo_main'][$key]['url']) ? $data['logo_main'][$key]['url'] : '';
        }
    }
    $dataOption['logo_main'] = $data['logo_main'];
    */

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

    // Logo Main
    $data['logo_main']['image'] = isset($data['logo_main']['image']) ? $data['logo_main']['image'] : '';
    //$data['logo_main']['url'] = isset($data['logo_main']['url']) ? $data['logo_main']['url'] : '';
    $dataOption['logo_main'] = $data['logo_main'];
    
    // Slide
    if(count($data['slide_main'] )>0)
    {
        foreach( $data['slide_main'] as $key => $value )
        {
            $data['slide_main'][$key]['image'] = isset($data['slide_main'][$key]['image']) ? $data['slide_main'][$key]['image'] : '';
            $data['slide_main'][$key]['url'] = isset($data['slide_main'][$key]['url']) ? $data['slide_main'][$key]['url'] : '';
        }
    }
    $dataOption['slide_main'] = $data['slide_main'];

    // Feature
    foreach( $data['feature'] as $key => $value )
    {
        $data['feature'][$key]['image'] = isset($data['feature'][$key]['image']) ? $data['feature'][$key]['image'] : '';
        $data['feature'][$key]['title'] = isset($data['feature'][$key]['title']) ? $data['feature'][$key]['title'] : '';
        $data['feature'][$key]['description'] = isset($data['feature'][$key]['description']) ? $data['feature'][$key]['description'] : '';
    }
    $dataOption['feature'] = $data['feature'];

    // Testimonial
    $data['testimonial']['heading'] = isset($data['testimonial']['heading']) ? $data['testimonial']['heading'] : '';
    foreach( $data['testimonial'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['testimonial'][$key]['content'] = isset($data['testimonial'][$key]['content']) ? $data['testimonial'][$key]['content'] : '';
        $data['testimonial'][$key]['image'] = isset($data['testimonial'][$key]['image']) ? $data['testimonial'][$key]['image'] : '';
        $data['testimonial'][$key]['name'] = isset($data['testimonial'][$key]['name']) ? $data['testimonial'][$key]['name'] : '';
        $data['testimonial'][$key]['description'] = isset($data['testimonial'][$key]['description']) ? $data['testimonial'][$key]['description'] : '';
    }
    $dataOption['testimonial'] = $data['testimonial'];

    // Photo
    $data['photo']['heading'] = isset($data['photo']['heading']) ? $data['photo']['heading'] : '';
    $data['photo']['url'] = isset($data['photo']['url']) ? $data['photo']['url'] : '';
    $data['photo']['image'] = isset($data['photo']['image']) ? $data['photo']['image'] : '';
    $dataOption['photo'] = $data['photo'];

    // About
    $data['about']['heading'] = isset($data['about']['heading']) ? $data['about']['heading'] : '';
    $data['about']['url'] = isset($data['about']['url']) ? $data['about']['url'] : '';
    $data['about']['image'] = isset($data['about']['image']) ? $data['about']['image'] : '';
    $data['about']['content'] = isset($data['about']['content']) ? $data['about']['content'] : '';
    $dataOption['about'] = $data['about'];

    //Footer
    $data['footer']['company'] = isset($data['footer']['company']) ? $data['footer']['company'] : '';
    //$data['footer']['address'] = isset($data['footer']['address']) ? $data['footer']['address'] : '';
    //$data['footer']['contact'] = isset($data['footer']['contact']) ? $data['footer']['contact'] : '';
    $data['footer']['copyright'] = isset($data['footer']['copyright']) ? $data['footer']['copyright'] : '';
    $dataOption['footer'] = $data['footer'];

    // Post Select Container
    $numBegin = 1;
    $numEnd = 4;
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