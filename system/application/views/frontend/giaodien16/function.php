<?php
/**
 * Template Name: GiaoDien16
 * Version: 1
 */
 
function resgisterWidget()
{
    return [
        'widget11111111',
        'widget22222222',
        'widget33333333',
        'widget44444444',
        'widget55555555',
        'widget66666666',
        'widget77777777',
        'widget88888888',
        'widget99999999',
    ];
}
function registerOption()
{
    return [
        'image_sidebar',
        'first_banner',
        'second_banner',
        'payment',
        'support',
        'information',
        'contact',
        'policy' ,
        'facebook',
        'branch',
        'map',
    ];
}

function themeOption($data)
{
    $dataOption = [];
    // Image_sidebar
    foreach( $data['image_sidebar'] as $key => $value )
    {
        $data['image_sidebar'][$key]['image'] = isset($data['image_sidebar'][$key]['image']) ? $data['image_sidebar'][$key]['image'] : '';
    }
    $dataOption['image_sidebar'] = $data['image_sidebar'];

    // first_banner
    foreach( $data['first_banner'] as $key => $value )
    {
        $data['first_banner'][$key]['image'] = isset($data['first_banner'][$key]['image']) ? $data['first_banner'][$key]['image'] : '';
    }
    $dataOption['first_banner'] = $data['first_banner'];

    // second_banner
    foreach( $data['second_banner'] as $key => $value )
    {
        $data['second_banner'][$key]['image'] = isset($data['second_banner'][$key]['image']) ? $data['second_banner'][$key]['image'] : '';
    }
    $dataOption['second_banner'] = $data['second_banner'];



    // payment
    $data['payment']['heading'] = isset($data['payment']['heading']) ? $data['payment']['heading'] : '';
    foreach( $data['payment'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['payment'][$key]['image'] = isset($data['payment'][$key]['image']) ? $data['payment'][$key]['image'] : '';
    }
    $dataOption['payment'] = $data['payment'];
    
    // support
    $data['support']['heading'] = isset($data['support']['heading']) ? $data['support']['heading'] : '';
    $data['support']['image'] = isset($data['support']['image']) ? $data['support']['image'] : '';
    foreach( $data['support'] as $key => $value )
    {
        if( $key === 'heading' || $key == 'image' ) continue;
        $data['support'][$key]['text'] = isset($data['support'][$key]['text']) ? $data['support'][$key]['text'] : '';
        $data['support'][$key]['phone'] = isset($data['support'][$key]['phone']) ? $data['support'][$key]['phone'] : '';
    }
    $dataOption['support'] = $data['support'];

    // information
    $data['information']['heading'] = isset($data['information']['heading']) ? $data['information']['heading'] : '';
    foreach( $data['information'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['information'][$key]['text'] = isset($data['information'][$key]['text']) ? $data['information'][$key]['text'] : '';
        $data['information'][$key]['url'] = isset($data['information'][$key]['url']) ? $data['information'][$key]['url'] : '';
    }
    $dataOption['information'] = $data['information'];

    // contact
    $data['contact']['heading'] = isset($data['contact']['heading']) ? $data['contact']['heading'] : '';
    foreach( $data['contact'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['contact'][$key]['text'] = isset($data['contact'][$key]['text']) ? $data['contact'][$key]['text'] : '';
        $data['contact'][$key]['url'] = isset($data['contact'][$key]['url']) ? $data['contact'][$key]['url'] : '';
    }
    $dataOption['contact'] = $data['contact'];

    // policy
    $data['policy']['heading'] = isset($data['policy']['heading']) ? $data['policy']['heading'] : '';
    foreach( $data['policy'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['policy'][$key]['text'] = isset($data['policy'][$key]['text']) ? $data['policy'][$key]['text'] : '';
        $data['policy'][$key]['url'] = isset($data['policy'][$key]['url']) ? $data['policy'][$key]['url'] : '';
    }
    $dataOption['policy'] = $data['policy'];

     // facebook
    foreach( $data['facebook'] as $key => $value )
    {
        $data['facebook'][$key]['url'] = isset($data['facebook'][$key]['url']) ? $data['facebook'][$key]['url'] : '';
    }
    $dataOption['facebook'] = $data['facebook'];

    // branch
    $data['branch']['heading'] = isset($data['branch']['heading']) ? $data['branch']['heading'] : '';
    foreach( $data['branch'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['branch'][$key]['address'] = isset($data['branch'][$key]['address']) ? $data['branch'][$key]['address'] : '';
        $data['branch'][$key]['phone'] = isset($data['branch'][$key]['phone']) ? $data['branch'][$key]['phone'] : '';
    }
    $dataOption['branch'] = $data['branch'];

    // map
    foreach( $data['map'] as $key => $value )
    {
        $data['map'][$key]['src'] = isset($data['map'][$key]['src']) ? $data['map'][$key]['src'] : '';
    }
    $dataOption['map'] = $data['map'];
    
    return $dataOption;
}
