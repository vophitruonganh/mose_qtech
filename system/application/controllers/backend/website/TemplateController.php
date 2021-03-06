<?php

namespace App\Http\Controllers\backend\website;

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

class TemplateController extends BackendController
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
                'screenshot' => 'system/application/views/frontend/'.$templateName.'/screenshot.png',
                'infoTemplateName' => get_info($template,'Template Name'),
                'infoTemplateVersion' => get_info($template,'Version'),
            ];
        }
        
        return view('backend.pages.website.templates.listTemplate',[
            'data' => $data,
            'activeTemplate' => $activeTemplate,
            'themeOption' => $themeOption,
        ]);
    }
    
    public function activeTemplate(Request $request)
    {
        $data = $request->all();
        
        $inListTemplate = false;
        $templates = (list_files('system/application/views/frontend',1));
        foreach( $templates as $template )
        {
            $_substr = substr($template,0,-1);
            $_explode = explode('/',$_substr);
            $templateName = array_pop($_explode);
            if( $templateName == $data['template'] )
            {
                $inListTemplate = true;
                break;
            }
        }
        if( !$inListTemplate )
        {
            return redirect('admin/template');
        }
        
        /*-- Update Active Template --*/
        DB::table('qm_option')->where([
            'option_name' => 'active_template',
        ])->update([
            'option_value' => $data['template'],
        ]);
        /*-- End Update Active Template --*/
        
        /*-- Update Routes --*/
        copy('system/application/views/frontend/'.$data['template'].'/routes.frontend.php','system/application/routes/frontend.php');
        /*-- End Update Routes --*/

        /*-- Create New Option Name If It Don't Exist --*/
        $themeOption = Option::where([
            'option_name' => $data['template'].'_theme_option',
        ])->first();

        if( $themeOption == null )
        {
            $option = new Option;

            $option->option_name = $data['template'].'_theme_option';

            $option->save();
        }
        /*-- End Create New Option Name If It Don't Exist --*/
        
        Session::put('template',$data['template']);
        
        return redirect('admin/template');
    }
}
