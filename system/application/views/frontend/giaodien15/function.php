<?php
/**
 * Template Name: GiaoDien15
 * Version: 1
 */
 
function resgisterWidget()
{
    return [
        'widgetaaaaaaaa',
        'widgetbbbbbbbb',
        'widgetcccccccc',
        'widgetdddddddd',
        'widgeteeeeeeee',
        'widgetffffffff',
        'widgetgggggggg',
        'widgethhhhhhhh',
    ];
}

function registerOption()
{
    return [
      
        'doitac',
        'social',
        'opendoor',
        'new',
       
        
    ];
}

function themeOption($data)
{
    $dataOption = [];

   
    
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
    
    // opendoor
    $data['opendoor']['heading'] = isset($data['opendoor']['heading']) ? $data['opendoor']['heading'] : '';
    $data['opendoor']['url'] = isset($data['opendoor']['url']) ? $data['opendoor']['url'] : '';
    $data['opendoor']['image'] = isset($data['opendoor']['image']) ? $data['opendoor']['image'] : '';
    $data['opendoor']['textArea'] = isset($data['opendoor']['textArea']) ? $data['opendoor']['textArea'] : '';
    $dataOption['opendoor'] = $data['opendoor'];
    
    // New
    foreach( $data['new'] as $key => $value )
    {
       
        $data['new'][$key]['url'] = isset($data['new'][$key]['url']) ? $data['new'][$key]['url'] : '';
        $data['new'][$key]['image'] = isset($data['new'][$key]['image']) ? $data['new'][$key]['image'] : '';
    }
    $dataOption['new'] = $data['new'];
    
    

    return $dataOption;
}