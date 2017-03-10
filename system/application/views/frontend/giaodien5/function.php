<?php
/**
 * Template Name: GiaoDien5
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
    return [
        'favicon',
        'logo_main',
        'slider',
        'service',
        'personnel',
        'about',
        'testimonial',
        'doitac',
        'policy',
        'facebook',
        'google_map',
    ];
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

    // Service
    $data['service']['heading'] = isset($data['service']['heading']) ? $data['service']['heading'] : '';
    $data['service']['description'] = isset($data['service']['description']) ? $data['service']['description'] : '';
    foreach( $data['service'] as $key => $value )
    {
        if( $key === 'heading' || $key === 'description' ) continue;
        $data['service'][$key]['image'] = isset($data['service'][$key]['image']) ? $data['service'][$key]['image'] : '';
        $data['service'][$key]['text'] = isset($data['service'][$key]['text']) ? $data['service'][$key]['text'] : '';
        $data['service'][$key]['content'] = isset($data['service'][$key]['content']) ? $data['service'][$key]['content'] : '';
    }
    $dataOption['service'] = $data['service'];

    // Personnel
    $data['personnel']['heading'] = isset($data['personnel']['heading']) ? $data['personnel']['heading'] : '';
    $data['personnel']['text'] = isset($data['personnel']['text']) ? $data['personnel']['text'] : '';
    foreach( $data['personnel'] as $key => $value )
    {
        if( $key === 'heading' || $key === 'text' ) continue;
        $data['personnel'][$key]['image'] = isset($data['personnel'][$key]['image']) ? $data['personnel'][$key]['image'] : '';
        $data['personnel'][$key]['name'] = isset($data['personnel'][$key]['name']) ? $data['personnel'][$key]['name'] : '';
        $data['personnel'][$key]['job'] = isset($data['personnel'][$key]['job']) ? $data['personnel'][$key]['job'] : '';
        $data['personnel'][$key]['facebook'] = isset($data['personnel'][$key]['facebook']) ? $data['personnel'][$key]['facebook'] : '';
        $data['personnel'][$key]['twitter'] = isset($data['personnel'][$key]['twitter']) ? $data['personnel'][$key]['twitter'] : '';
    }
    $dataOption['personnel'] = $data['personnel'];

    // About
    $data['about']['heading'] = isset($data['about']['heading']) ? $data['about']['heading'] : '';
    $data['about']['text'] = isset($data['about']['text']) ? $data['about']['text'] : '';
    $dataOption['about'] = $data['about'];

    // Testimonial
    $data['testimonial']['heading'] = isset($data['testimonial']['heading']) ? $data['testimonial']['heading'] : '';
    foreach( $data['testimonial'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['testimonial'][$key]['content'] = isset($data['testimonial'][$key]['content']) ? $data['testimonial'][$key]['content'] : '';
        $data['testimonial'][$key]['image'] = isset($data['testimonial'][$key]['image']) ? $data['testimonial'][$key]['image'] : '';
        $data['testimonial'][$key]['name'] = isset($data['testimonial'][$key]['name']) ? $data['testimonial'][$key]['name'] : '';
    }
    $dataOption['testimonial'] = $data['testimonial'];

    // Đối tác
    $data['doitac']['heading'] = isset($data['doitac']['heading']) ? $data['doitac']['heading'] : '';
    foreach( $data['doitac'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['doitac'][$key]['image'] = isset($data['doitac'][$key]['image']) ? $data['doitac'][$key]['image'] : '';
        $data['doitac'][$key]['url'] = isset($data['doitac'][$key]['url']) ? $data['doitac'][$key]['url'] : '';
    }
    $dataOption['doitac'] = $data['doitac'];

    // Policy
    $data['policy']['heading'] = isset($data['policy']['heading']) ? $data['policy']['heading'] : '';
    foreach( $data['policy'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['policy'][$key]['title'] = isset($data['policy'][$key]['title']) ? $data['policy'][$key]['title'] : '';
        $data['policy'][$key]['url'] = isset($data['policy'][$key]['url']) ? $data['policy'][$key]['url'] : '';
    }
    $dataOption['policy'] = $data['policy'];

    // Facebook
    $data['facebook']['url'] = isset($data['facebook']['url']) ? $data['facebook']['url'] : '';
    $dataOption['facebook'] = $data['facebook'];

    // Google Map
    $data['google_map']['url'] = isset($data['google_map']['url']) ? $data['google_map']['url'] : '';
    $dataOption['google_map'] = $data['google_map'];

    return $dataOption;
}