<?php
/**
 * Template Name: GiaoDien13
 * Version: 1
 */
 
function resgisterWidget()
{
    return [
        //'widgetaaaaaaa',
        //'widgetbbbbbbb',
        'widgetccccccc',
        //'widgetddddddd',
        //'widgeteeeeeee',
        'widgetfffffff',
        'widgetggggggg',
    ];
}

function registerOption()
{
	return [
		'viTri',
        'duAn',
        'comments',
        'tienIch',
        'tuyChonCanHo',
	];
}

function themeOption($data)
{
    $dataOption = [];

    // Vị Trí
    $data['viTri']['title'] = isset($data['viTri']['title']) ? $data['viTri']['title'] : '';
    $data['viTri']['image'] = isset($data['viTri']['image']) ? $data['viTri']['image'] : '';
    $data['viTri']['text'] = isset($data['viTri']['text']) ? $data['viTri']['text'] : '';
    $dataOption['viTri'] = $data['viTri'];

    // Dự Án
    $data['duAn']['title'] = isset($data['duAn']['title']) ? $data['duAn']['title'] : '';
    foreach( $data['duAn'] as $key => $value )
    {
        if( $key === 'title' ) continue;
        $data['duAn'][$key]['image'] = isset($data['duAn'][$key]['image']) ? $data['duAn'][$key]['image'] : '';
        $data['duAn'][$key]['text-1'] = isset($data['duAn'][$key]['text-1']) ? $data['duAn'][$key]['text-1'] : '';
        $data['duAn'][$key]['text-2'] = isset($data['duAn'][$key]['text-2']) ? $data['duAn'][$key]['text-2'] : '';
        $data['duAn'][$key]['active'] = isset($data['duAn'][$key]['active']) ? $data['duAn'][$key]['active'] : ( $key == 0 ) ? true : false;
    }
    $dataOption['duAn'] = $data['duAn'];

    // Comments
    foreach( $data['comments'] as $key => $value )
    {
        $data['comments'][$key]['name'] = isset($data['comments'][$key]['name']) ? $data['comments'][$key]['name'] : '';
        $data['comments'][$key]['description'] = isset($data['comments'][$key]['description']) ? $data['comments'][$key]['description'] : '';
        $data['comments'][$key]['content'] = isset($data['comments'][$key]['content']) ? $data['comments'][$key]['content'] : '';
    }
    $dataOption['comments'] = $data['comments'];

    // Tiện Ích
    $data['tienIch']['title'] = isset($data['tienIch']['title']) ? $data['tienIch']['title'] : '';
    $data['tienIch']['mainImageLarger'] = isset($data['tienIch']['mainImageLarger']) ? $data['tienIch']['mainImageLarger'] : '';
    $data['tienIch']['mainImageThumb'] = isset($data['tienIch']['mainImageThumb']) ? $data['tienIch']['mainImageThumb'] : '';
    $data['tienIch']['description'] = isset($data['tienIch']['description']) ? $data['tienIch']['description'] : [];
    foreach( $data['tienIch']['description'] as $key => $value )
    {
        $data['tienIch']['description'][$key]['image'] = isset($data['tienIch']['description'][$key]['image']) ? $data['tienIch']['description'][$key]['image'] : '';
        $data['tienIch']['description'][$key]['text'] = isset($data['tienIch']['description'][$key]['text']) ? $data['tienIch']['description'][$key]['text'] : '';
    }
    foreach( $data['tienIch']['listImage'] as $key => $value )
    {
        $data['tienIch']['listImage'][$key]['thumb'] = isset($data['tienIch']['listImage'][$key]['thumb']) ? $data['tienIch']['listImage'][$key]['thumb'] : '';
        $data['tienIch']['listImage'][$key]['larger'] = isset($data['tienIch']['listImage'][$key]['larger']) ? $data['tienIch']['listImage'][$key]['larger'] : '';
        $data['tienIch']['listImage'][$key]['text'] = isset($data['tienIch']['listImage'][$key]['text']) ? $data['tienIch']['listImage'][$key]['text'] : '';
    }
    $dataOption['tienIch'] = $data['tienIch'];

    // Tùy Chọn Căn Hộ
    $data['tuyChonCanHo']['title'] = isset($data['tuyChonCanHo']['title']) ? $data['tuyChonCanHo']['title'] : '';
    $data['tuyChonCanHo']['titleUrl'] = isset($data['tuyChonCanHo']['titleUrl']) ? $data['tuyChonCanHo']['titleUrl'] : '';
    $data['tuyChonCanHo']['url'] = isset($data['tuyChonCanHo']['url']) ? $data['tuyChonCanHo']['url'] : '';
    $dataOption['tuyChonCanHo'] = $data['tuyChonCanHo'];
    
    return $dataOption;
}