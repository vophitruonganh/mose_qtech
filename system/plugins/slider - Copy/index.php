<?php
/**
 * Plugin Name: Slider CarouFredSel
 * Version: 1
 */

class slider
{
    function widget_form($data)
    {
        /*-- Default Value --*/
        $images = isset($data['images']) ? $data['images'] : [];
        /*-- End Default Value --*/

        $html = '';
        $html .= '<form id="sliderCarouFredSel" action="'.Request::fullUrl().'" method="post">';
        $html .= '<input type="hidden" name="_token" value="'.csrf_token().'" />';
        $html .= '<a class="addImage" href="javascript:;">them</a>';
        $html .= '<div class="images">';
        if( count($images) > 0 )
        {
            $i = 0;
            foreach( $images as $image )
            {
                $html .= '<div class="row" data-id="'.$i.'">';
                $html .= 'Id Image: <input type="text" name="images['.$i.']" value="'.$image.'"><br>';
                if( $i > 0 )
                {
                    $html .= '<a class="remove" href="javascript:;">remove</a><br>';
                }
                $html .= '</div>';
                $i++;
            }
        }
        else
        {
            $html .= '<div class="row" data-id="0">';
            $html .= 'Id Image: <input type="text" name="images[0]" value=""><br>';
            $html .= '</div>';
        }
        $html .= '</div>';
        $html .= '<button type="submit">Save</button>';
        $html .= '</form>';
        
        $html .= '<script type="text/javascript">';
        $html .= '$(document).ready(function(){';
        $html .= '$(\'#sliderCarouFredSel\').on(\'click\',\'.addImage\',function(){';
        $html .= 'var numberMaxElement = parseInt($(\'.images .row\').last().attr(\'data-id\')) + 1;';
        $html .= 'var row = \'\';';
        $html .= 'row += \'<div class="row" data-id="\'+numberMaxElement+\'">\';';
        $html .= 'row += \'Id Image: <input type="text" name="images[\'+numberMaxElement+\']" value=""><br>\';';
        $html .= 'row += \'<a class="remove" href="javascript:;">remove</a><br>\';';
        $html .= 'row += \'</div>\';';
        $html .= '$(\'.images\').append(row);';
        $html .= '});';
        $html .= 'return false;';
        $html .= '});';
        $html .= '$(\'#sliderCarouFredSel\').on(\'click\',\'.remove\',function(){';
        $html .= '$(this).parent().remove();';
        $html .= '});';
        $html .= '</script>';

        return $html;
    }

    function widget_data($data)
    {
        $widgetData = [];

        // Images
        $images = isset($data['images']) ? $data['images'] : [];
        foreach( $images as $image )
        {
            $attachment = DB::table('qm_attachment')->where('attachment_id',$image)->where('attachment_type','image')->first();
            if( count($attachment) > 0 )
            {
                $widgetData['images'] = $images;
            }
        }
        // End

        return $widgetData;
    }

	function run($data)
    {
        // Images
        $images = isset($data['images']) ? $data['images'] : [];
        // End

        $html = '';

        $html .= '<div class="slider_box">';
        $html .= '<ul id="main_slider">';
        foreach( $images as $idImage )
        {
            $image = loadFeatureImage($idImage);

            $html .= '<li>';
            $html .= '<a href="#">';
            $html .= '<img src="'.$image.'" alt="" />';
            $html .= '</a>';
            $html .= '</li>';
        }

        $html .= '</ul>';

        $html .= '</div>';

        $html .= '<script>';
        $html .= '$(function(){ $(\'#main_slider\').carouFredSel({
            responsive: true,
            auto: {
                pauseOnHover: \'resume\'
            },
            height: 400
        }); });';
        $html .= '</script>';

        return $html;
    }
}