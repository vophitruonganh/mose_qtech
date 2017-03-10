<?php
/**
 * Template Name: GiaoDien12
 * Version: 1
 */
 
function resgisterWidget()
{
    return [
        'widget111111',
        'widget222222',
        'widget333333',
        'widget444444',
        'widget555555',
        'widget666666',
        'widget777777',
        'widget888888',
    ];
}

function registerOption()
{
    return [
        'youtube',
        'policy',
        'rules',
        'guide',
        'service',
    ];
}

function themeOption($data)
{
    $dataOption = [];

    // Youtube
    $data['youtube']['heading'] = isset($data['youtube']['heading']) ? $data['youtube']['heading'] : '';
    $data['youtube']['url'] = isset($data['youtube']['url']) ? $data['youtube']['url'] : '';
    $dataOption['youtube'] = $data['youtube'];

    // Policy
    foreach( $data['policy'] as $key => $value )
    {
        $data['policy'][$key]['text'] = isset($data['policy'][$key]['text']) ? $data['policy'][$key]['text'] : '';
    }
    $dataOption['policy'] = $data['policy'];

    // Rules
    $data['rules']['heading'] = isset($data['rules']['heading']) ? $data['rules']['heading'] : '';
    foreach( $data['rules'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['rules'][$key]['image'] = isset($data['rules'][$key]['image']) ? $data['rules'][$key]['image'] : '';
        $data['rules'][$key]['url'] = isset($data['rules'][$key]['url']) ? $data['rules'][$key]['url'] : '';
    }
    $dataOption['rules'] = $data['rules'];

    // Guide
    $data['guide']['heading'] = isset($data['guide']['heading']) ? $data['guide']['heading'] : '';
    foreach( $data['guide'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['guide'][$key]['image'] = isset($data['guide'][$key]['image']) ? $data['guide'][$key]['image'] : '';
        $data['guide'][$key]['url'] = isset($data['guide'][$key]['url']) ? $data['guide'][$key]['url'] : '';
    }
    $dataOption['guide'] = $data['guide'];

    // Service
    $data['service']['heading'] = isset($data['service']['heading']) ? $data['service']['heading'] : '';
    foreach( $data['service'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['service'][$key]['image'] = isset($data['service'][$key]['image']) ? $data['service'][$key]['image'] : '';
        $data['service'][$key]['url'] = isset($data['service'][$key]['url']) ? $data['service'][$key]['url'] : '';
    }
    $dataOption['service'] = $data['service'];

    return $dataOption;
}