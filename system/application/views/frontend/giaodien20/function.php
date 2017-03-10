<?php
/**
 * Template Name: GiaoDien20
 * Version: 1
 */

function resgisterWidget(){
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


function registerOption()
{
    return [
       'firstAdvertise',
        'doitac',
        'social',
        'cms',

    ];

    $numBegin = 1;
    $numEnd = 3;
    for( $i=$numBegin; $i<=$numEnd; $i++ )
    {
        $array[] = 'product_slug_'.$i;
        $array[] = 'product_type_'.$i;
    }


}

function themeOption($data)
{
    $dataOption = [];

    // First Advertise
    foreach( $data['firstAdvertise'] as $key => $value )
    {
        $data['firstAdvertise'][$key]['image'] = isset($data['firstAdvertise'][$key]['image']) ? $data['firstAdvertise'][$key]['image'] : '';
        $data['firstAdvertise'][$key]['url'] = isset($data['firstAdvertise'][$key]['url']) ? $data['firstAdvertise'][$key]['url'] : '';
    }
    $dataOption['firstAdvertise'] = $data['firstAdvertise'];

    // Đối tác
    $data['doitac']['heading'] = isset($data['doitac']['heading']) ? $data['doitac']['heading'] : '';
    foreach( $data['doitac'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['doitac'][$key]['image'] = isset($data['doitac'][$key]['image']) ? $data['doitac'][$key]['image'] : '';
        $data['doitac'][$key]['url'] = isset($data['doitac'][$key]['url']) ? $data['doitac'][$key]['url'] : '';
    }
    $dataOption['doitac'] = $data['doitac'];

    // Social
    foreach( $data['social'] as $key => $value )
    {
        $data['social'][$key]['class'] = isset($data['social'][$key]['class']) ? $data['social'][$key]['class'] : '';
        $data['social'][$key]['url'] = isset($data['social'][$key]['url']) ? $data['social'][$key]['url'] : '';
    }
    $dataOption['social'] = $data['social'];

     // cms
    $data['cms']['text'] = isset($data['cms']['text']) ? $data['cms']['text'] : '';
    $data['cms']['url'] = isset($data['cms']['url']) ? $data['cms']['url'] : '';
    $data['cms']['image'] = isset($data['cms']['image']) ? $data['cms']['image'] : '';
    $data['cms']['textArea'] = isset($data['cms']['textArea']) ? $data['cms']['textArea'] : '';
    $dataOption['cms'] = $data['cms'];

    return $dataOption;
}