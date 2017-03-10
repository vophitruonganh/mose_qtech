<?php

namespace App\Http\Controllers\backend\website\themes;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Controllers\BackendController;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */
use App\Models\Option;
use DB;
use Session;

class ThemesController extends BackendController
{
    public function index()
    {
        $optionObject = new Option;
        $themeOption = false;
        $data = [];
        
        $activeTemplate = $optionObject->getOptionValue_option('active_template');

        require_once('system/application/views/frontend/'.$activeTemplate.'/function.php');
        if( function_exists('themeOption') && function_exists('registerOption') )
        {
            $themeOption = true;
        }
        
        $templates = (list_files('system/application/views/frontend',1));
        foreach( $templates as $template )
        {
            $_substr = substr($template,0,-1);
            $_explode = explode('/',$_substr);
            $templateName = array_pop($_explode);
            $data[$templateName] = [
                'screenshot' => 'system/application/views/frontend/'.$templateName.'/screenshot.jpg',
                'infoTemplateName' => get_info($template,'Template Name'),
                'infoTemplateVersion' => get_info($template,'Version'),
            ];
        }
        
        return view('backend.pages.website.themes.listThemes',[
            'data' => $data,
            'activeTemplate' => $activeTemplate,
            'themeOption' => $themeOption,
        ]);
    }

    public function install(){
        return view('backend.pages.website.themes.installThemes',[

        ]);
    }

    public function active($name)
    {
        
        $inListTemplate = false;
        $templates = (list_files('system/application/views/frontend',1));
        foreach( $templates as $template ){
            $_substr = substr($template,0,-1);
            $_explode = explode('/',$_substr);
            $templateName = array_pop($_explode);
            if( $templateName == $name ){
                $inListTemplate = true;
                break;
            }
        }
        if( !$inListTemplate ){
            return redirect('admin/themes');
        }
        
        $option = new Option;
        $option->Update_option('active_template',$name);
        
        /*-- Update Routes --*/
        copy('system/application/views/frontend/'.$name.'/routes.frontend.php','system/application/routes/frontend.php');
        /*-- End Update Routes --*/

        /*-- Create New Option Name If It Don't Exist --*/
        $theme_option = $option->Get_option($name.'_theme_option');

        if(!$theme_option){
            $option_arr = array(
                'option_name' => $name.'_theme_option',
                'option_value' => ''
            );
            $option->Insert_option($option_arr);
        }
        /*-- End Create New Option Name If It Don't Exist --*/
        
        //Session::put('template',$name);
        
        return redirect('admin/themes');
    }
}
