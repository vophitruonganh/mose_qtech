<?php
/**
 * Template Name: GiaoDien14
 * Version: 1
 */
 
function resgisterWidget()
{
    return [
        'widget1111111',
        'widget2222222',
        'widget3333333',
        'widget4444444',
    ];
}

function registerOption()
{
	return [
		'rightMenu',
		'descriptionWeb',
		'viTri',
		'matBangCanHo',
		'tienIch',
		'gallery',
		'mapContact',
        'social',
	];
}

function themeOption($data)
{
    $dataOption = [];

    // Right Menu
    $data['rightMenu']['telephone'] = isset($data['rightMenu']['telephone']) ? $data['rightMenu']['telephone'] : '';
    $data['rightMenu']['link']['text'] = isset($data['rightMenu']['link']['text']) ? $data['rightMenu']['link']['text'] : '';
    $data['rightMenu']['link']['url'] = isset($data['rightMenu']['link']['url']) ? $data['rightMenu']['link']['url'] : '';
    $data['rightMenu']['video']['text'] = isset($data['rightMenu']['video']['text']) ? $data['rightMenu']['video']['text'] : '';
    $data['rightMenu']['video']['youtube'] = isset($data['rightMenu']['video']['youtube']) ? $data['rightMenu']['video']['youtube'] : '';
    $data['rightMenu']['openDoor']['text'] = isset($data['rightMenu']['openDoor']['text']) ? $data['rightMenu']['openDoor']['text'] : '';
    $data['rightMenu']['openDoor']['image'] = isset($data['rightMenu']['openDoor']['image']) ? $data['rightMenu']['openDoor']['image'] : '';
    $data['rightMenu']['openDoor']['text1'] = isset($data['rightMenu']['openDoor']['text1']) ? $data['rightMenu']['openDoor']['text1'] : '';
    $data['rightMenu']['openDoor']['text2'] = isset($data['rightMenu']['openDoor']['text2']) ? $data['rightMenu']['openDoor']['text2'] : '';
    $dataOption['rightMenu'] = $data['rightMenu'];

    // Description Web
    $data['descriptionWeb']['title'] = isset($data['descriptionWeb']['title']) ? $data['descriptionWeb']['title'] : '';
    $data['descriptionWeb']['content'] = isset($data['descriptionWeb']['content']) ? $data['descriptionWeb']['content'] : '';
    $data['descriptionWeb']['image'] = isset($data['descriptionWeb']['image']) ? $data['descriptionWeb']['image'] : '';
    $dataOption['descriptionWeb'] = $data['descriptionWeb'];

    // Vị Trí
    $data['viTri']['textViewGoogleMap'] = isset($data['viTri']['textViewGoogleMap']) ? $data['viTri']['textViewGoogleMap'] : '';
    $data['viTri']['linkGoogleMap'] = isset($data['viTri']['linkGoogleMap']) ? $data['viTri']['linkGoogleMap'] : '';
    $data['viTri']['description'] = isset($data['viTri']['description']) ? $data['viTri']['description'] : '';
    $data['viTri']['image'] = isset($data['viTri']['image']) ? $data['viTri']['image'] : '';
    $dataOption['viTri'] = $data['viTri'];

    // Mặt Bằng Căn Hộ
    $data['matBangCanHo']['text'] = isset($data['matBangCanHo']['text']) ? $data['matBangCanHo']['text'] : '';
    foreach( $data['matBangCanHo']['slider'] as $key => $value )
    {
        $data['matBangCanHo']['slider'][$key]['image'] = isset($data['matBangCanHo']['slider'][$key]['image']) ? $data['matBangCanHo']['slider'][$key]['image'] : '';
    }
    foreach( $data['matBangCanHo']['item'] as $key => $value )
    {
        $data['matBangCanHo']['item'][$key]['title'] = isset($data['matBangCanHo']['item'][$key]['title']) ? $data['matBangCanHo']['item'][$key]['title'] : '';
        $data['matBangCanHo']['item'][$key]['url'] = isset($data['matBangCanHo']['item'][$key]['url']) ? $data['matBangCanHo']['item'][$key]['url'] : '';
        $data['matBangCanHo']['item'][$key]['image'] = isset($data['matBangCanHo']['item'][$key]['image']) ? $data['matBangCanHo']['item'][$key]['image'] : '';
    }
    $dataOption['matBangCanHo'] = $data['matBangCanHo'];

    // Tiện Ích
    $data['tienIch']['heading'] = isset($data['tienIch']['heading']) ? $data['tienIch']['heading'] : '';
    foreach( $data['tienIch']['linkMore'] as $key => $value )
    {
        $data['tienIch']['linkMore'][$key]['title'] = isset($data['tienIch']['linkMore'][$key]['title']) ? $data['tienIch']['linkMore'][$key]['title'] : '';
        $data['tienIch']['linkMore'][$key]['url'] = isset($data['tienIch']['linkMore'][$key]['url']) ? $data['tienIch']['linkMore'][$key]['url'] : '';
    }
    foreach( $data['tienIch']['list'] as $key => $value )
    {
    	$data['tienIch']['list'][$key]['imageHold'] = isset($data['tienIch']['list'][$key]['imageHold']) ? $data['tienIch']['list'][$key]['imageHold'] : '';
        $data['tienIch']['list'][$key]['title'] = isset($data['tienIch']['list'][$key]['title']) ? $data['tienIch']['list'][$key]['title'] : '';
        $data['tienIch']['list'][$key]['imageMain'] = isset($data['tienIch']['list'][$key]['imageMain']) ? $data['tienIch']['list'][$key]['imageMain'] : '';
        $data['tienIch']['list'][$key]['description'] = isset($data['tienIch']['list'][$key]['description']) ? $data['tienIch']['list'][$key]['description'] : '';
        $data['tienIch']['list'][$key]['content'] = isset($data['tienIch']['list'][$key]['content']) ? $data['tienIch']['list'][$key]['content'] : '';
    }
    $dataOption['tienIch'] = $data['tienIch'];

    // Gallery
    $data['gallery']['heading'] = isset($data['gallery']['heading']) ? $data['gallery']['heading'] : '';
    foreach( $data['gallery'] as $key => $value )
    {
        if( $key === 'heading' ) continue;
        $data['gallery'][$key]['text'] = isset($data['gallery'][$key]['text']) ? $data['gallery'][$key]['text'] : '';
        $data['gallery'][$key]['imageTitle'] = isset($data['gallery'][$key]['imageTitle']) ? $data['gallery'][$key]['imageTitle'] : '';
        $data['gallery'][$key]['titleUrl'] = isset($data['gallery'][$key]['titleUrl']) ? $data['gallery'][$key]['titleUrl'] : '';
        $data['gallery'][$key]['url'] = isset($data['gallery'][$key]['url']) ? $data['gallery'][$key]['url'] : '';
        $data['gallery'][$key]['image1'] = isset($data['gallery'][$key]['image1']) ? $data['gallery'][$key]['image1'] : '';
        $data['gallery'][$key]['image2'] = isset($data['gallery'][$key]['image2']) ? $data['gallery'][$key]['image2'] : '';
        $data['gallery'][$key]['image3'] = isset($data['gallery'][$key]['image3']) ? $data['gallery'][$key]['image3'] : '';
        $data['gallery'][$key]['image4'] = isset($data['gallery'][$key]['image4']) ? $data['gallery'][$key]['image4'] : '';
        $data['gallery'][$key]['image5'] = isset($data['gallery'][$key]['image5']) ? $data['gallery'][$key]['image5'] : '';
        $data['gallery'][$key]['image6'] = isset($data['gallery'][$key]['image6']) ? $data['gallery'][$key]['image6'] : '';
    }
    $dataOption['gallery'] = $data['gallery'];

    // Map Contact
    $data['mapContact'] = isset($data['mapContact']) ? $data['mapContact'] : '';
    $dataOption['mapContact'] = $data['mapContact'];

    // Social
    foreach( $data['social'] as $key => $value )
    {
        $data['social'][$key]['class'] = isset($data['social'][$key]['class']) ? $data['social'][$key]['class'] : '';
        $data['social'][$key]['url'] = isset($data['social'][$key]['url']) ? $data['social'][$key]['url'] : '';
    }
    $dataOption['social'] = $data['social'];
    
    return $dataOption;
}