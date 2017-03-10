<?php
/**
 * Template Name: GiaoDien18
 * Version: 1
 */

function resgisterWidget()
{
    return [
        'widget111111111',
        'widget222222222',
        'widget333333333',
        'widget444444444',
        'widget555555555',
        'widget666666666',
    ];
}

function registerOption()
{
    return [
        'advertise',
        'firstBanner',
        'facebook',
        'social',
    ];
}

function themeOption($data)
{
    $dataOption = [];

    // Advertise
    foreach( $data['advertise'] as $key => $value )
    {
        $data['advertise'][$key]['class'] = isset($data['advertise'][$key]['image']) ? $data['advertise'][$key]['image'] : '';
        $data['advertise'][$key]['url'] = isset($data['advertise'][$key]['url']) ? $data['advertise'][$key]['url'] : '';
    }
    $dataOption['advertise'] = $data['advertise'];
    
    // First Banner
    $data['firstBanner']['url'] = isset($data['firstBanner']['url']) ? $data['firstBanner']['url'] : '';
    $data['firstBanner']['image'] = isset($data['firstBanner']['image']) ? $data['firstBanner']['image'] : '';
    $dataOption['firstBanner'] = $data['firstBanner'];
    
    // Facebook
    $data['facebook']['url'] = isset($data['facebook']['url']) ? $data['facebook']['url'] : '';
    $dataOption['facebook'] = $data['facebook'];
    
    // Social
    foreach( $data['social'] as $key => $value )
    {
        $data['social'][$key]['class'] = isset($data['social'][$key]['class']) ? $data['social'][$key]['class'] : '';
        $data['social'][$key]['url'] = isset($data['social'][$key]['url']) ? $data['social'][$key]['url'] : '';
    }
    $dataOption['social'] = $data['social'];

    return $dataOption;
}