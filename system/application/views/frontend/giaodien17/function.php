<?php
/**
 * Template Name: GiaoDien17
 * Version: 1
 */
 
function resgisterWidget()
{
    return [
        'widgetaaaaaaaaa',
        'widgetbbbbbbbbb',
        'widgetccccccccc',
        'widgetddddddddd',
        'widgeteeeeeeeee',
        'widgetfffffffff',
        'widgetggggggggg',
        'widgethhhhhhhhh',
        'widgetiiiiiiiii',
    ];
}

function registerOption()
{
    return [
        'feature',
        'about',
        'comment',
        'partner',
        'policy',
        'provision',
        'guide',
        'map',
    ];
}

function themeOption($data)
{
    $dataOption = [];

    // Feature
    foreach( $data['feature'] as $key => $value )
    {
        $data['feature'][$key]['image'] = isset($data['feature'][$key]['image']) ? $data['feature'][$key]['image'] : '';
        $data['feature'][$key]['url'] = isset($data['feature'][$key]['url']) ? $data['feature'][$key]['url'] : '';
    }
    $dataOption['feature'] = $data['feature'];
    
    // About
    foreach( $data['about'] as $key => $value )
    {
        $data['about'][$key]['image'] = isset($data['about'][$key]['image']) ? $data['about'][$key]['image'] : '';
        $data['about'][$key]['url'] = isset($data['about'][$key]['url']) ? $data['about'][$key]['url'] : '';
        $data['about'][$key]['header'] = isset($data['about'][$key]['header']) ? $data['about'][$key]['header'] : '';
        $data['about'][$key]['text'] = isset($data['about'][$key]['text']) ? $data['about'][$key]['text'] : '';
    }
    $dataOption['about'] = $data['about'];
    
    // Comment
    foreach( $data['comment'] as $key => $value )
    {
        $data['comment'][$key]['image'] = isset($data['comment'][$key]['image']) ? $data['comment'][$key]['image'] : '';
        $data['comment'][$key]['content'] = isset($data['comment'][$key]['content']) ? $data['comment'][$key]['content'] : '';
        $data['comment'][$key]['name'] = isset($data['comment'][$key]['name']) ? $data['comment'][$key]['name'] : '';
        $data['comment'][$key]['job'] = isset($data['comment'][$key]['job']) ? $data['comment'][$key]['job'] : '';
    }
    $dataOption['comment'] = $data['comment'];

    // partner
    foreach( $data['partner'] as $key => $value )
    {
        $data['partner'][$key]['image'] = isset($data['partner'][$key]['image']) ? $data['partner'][$key]['image'] : '';
        $data['partner'][$key]['url'] = isset($data['partner'][$key]['url']) ? $data['partner'][$key]['url'] : '';
    }
    $dataOption['partner'] = $data['partner'];

    // Policy
    $data['policy']['heading'] = isset($data['policy']['heading']) ? $data['policy']['heading'] : '';
    foreach( $data['policy'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['policy'][$key]['text'] = isset($data['policy'][$key]['text']) ? $data['policy'][$key]['text'] : '';
        $data['policy'][$key]['url'] = isset($data['policy'][$key]['url']) ? $data['policy'][$key]['url'] : '';
    }
    $dataOption['policy'] = $data['policy'];

    // Provision
    $data['provision']['heading'] = isset($data['provision']['heading']) ? $data['provision']['heading'] : '';
    foreach( $data['provision'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['provision'][$key]['text'] = isset($data['provision'][$key]['text']) ? $data['provision'][$key]['text'] : '';
        $data['provision'][$key]['url'] = isset($data['provision'][$key]['url']) ? $data['provision'][$key]['url'] : '';
    }
    $dataOption['provision'] = $data['provision'];

    // Guide
    $data['guide']['heading'] = isset($data['guide']['heading']) ? $data['guide']['heading'] : '';
    foreach( $data['guide'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['guide'][$key]['text'] = isset($data['guide'][$key]['text']) ? $data['guide'][$key]['text'] : '';
        $data['guide'][$key]['url'] = isset($data['guide'][$key]['url']) ? $data['guide'][$key]['url'] : '';
    }
    $dataOption['guide'] = $data['guide'];

    // map
    foreach( $data['map'] as $key => $value )
    {
        $data['map'][$key]['src'] = isset($data['map'][$key]['src']) ? $data['map'][$key]['src'] : '';
    }
    $dataOption['map'] = $data['map'];
    
    
    return $dataOption;
}