<?php
/**
 * Template Name: GiaoDien19
 * Version: 1
 */
 
function resgisterWidget()
{
    return [
        'widgetaaaaaaaaaa',
        'widgetbbbbbbbbbb',
        'widgetcccccccccc',
        'widgetdddddddddd',
        'widgeteeeeeeeeee',
        'widgetffffffffff',
        'widgetgggggggggg',
        'widgethhhhhhhhhh',
        'widgetiiiiiiiiii',
        'widgetjjjjjjjjjj',
        'widgetkkkkkkkkkk',
    ];
}

function registerOption()
{
    return [
       'firstAdvertise',
       'firstBanner',
       'secondBanner',
       'thirdBanner',
       'facebook',
    ];
}

function themeOption($data)
{
    $dataOption = [];

    // First Advertise
    foreach( $data['firstAdvertise'] as $key => $value )
    {
        $data['firstAdvertise'][$key]['class'] = isset($data['firstAdvertise'][$key]['image']) ? $data['firstAdvertise'][$key]['image'] : '';
        $data['firstAdvertise'][$key]['url'] = isset($data['firstAdvertise'][$key]['url']) ? $data['firstAdvertise'][$key]['url'] : '';
    }
    $dataOption['firstAdvertise'] = $data['firstAdvertise'];
    
     // First Banner
    $data['firstBanner']['text'] = isset($data['firstBanner']['text']) ? $data['firstBanner']['text'] : '';
    $data['firstBanner']['url'] = isset($data['firstBanner']['url']) ? $data['firstBanner']['url'] : '';
    $data['firstBanner']['image'] = isset($data['firstBanner']['image']) ? $data['firstBanner']['image'] : '';
    $dataOption['firstBanner'] = $data['firstBanner'];
    
    // Second Banner
     $data['secondBanner']['text'] = isset($data['secondBanner']['text']) ? $data['secondBanner']['text'] : '';
    $data['secondBanner']['url'] = isset($data['secondBanner']['url']) ? $data['secondBanner']['url'] : '';
    $data['secondBanner']['image'] = isset($data['secondBanner']['image']) ? $data['secondBanner']['image'] : '';
    $dataOption['secondBanner'] = $data['secondBanner'];

    // Third Banner
    $data['thirdBanner']['text'] = isset($data['thirdBanner']['text']) ? $data['thirdBanner']['text'] : '';
    $data['thirdBanner']['url'] = isset($data['thirdBanner']['url']) ? $data['thirdBanner']['url'] : '';
    $data['thirdBanner']['urlShopping'] = isset($data['thirdBanner']['urlShopping']) ? $data['thirdBanner']['urlShopping'] : '';
    $data['thirdBanner']['image'] = isset($data['thirdBanner']['image']) ? $data['thirdBanner']['image'] : '';
    $dataOption['thirdBanner'] = $data['thirdBanner'];
    
    // Facebook
    $data['facebook']['url'] = isset($data['facebook']['url']) ? $data['facebook']['url'] : '';
    $dataOption['facebook'] = $data['facebook'];

    return $dataOption;
}