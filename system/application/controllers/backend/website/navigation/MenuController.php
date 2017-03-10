<?php

namespace App\Http\Controllers\backend\website\navigation;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Controllers\BackendController;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */
use App\Models\Option;
use App\Models\Term;
use App\Models\Post;
use Session;
use Validator;
use DB;

class MenuController extends BackendController
{
    public function index(Request $request)
    {
        $optionObject = new Option;

        $navigation_data = decode_serialize($optionObject->getOptionValue_option('navigation_data'));
        $navigation_load = decode_serialize($optionObject->getOptionValue_option('navigation_load'));

        /*-- Get Menu Data From Template --*/
        $active_template = $optionObject->getOptionValue_option('active_template');
        require_once('system/application/views/frontend/'.$active_template.'/function.php');
        if( function_exists('resgister_navigation') )
        {
            $registerNavigation = resgister_navigation();
        }
        else
        {
            return redirect('admin');
        }
        /*-- End Get Menu Data From Template --*/
        
        /*-- Menu Top --*/
        $data = $request->all();
        
        $select_action = isset($data['select_action']) ? $data['select_action'] : '';
        
        // Edit Menu
        if( $select_action == 'edit' )
        {
            $check = isset($data['check']) ? $data['check'] : [];
            if( count($check) == 0 )
            {
                return redirect('admin/navigation');
            }
            else
            {
                return redirect('admin/navigation/edit/'.$check[0]);
            }
        }
        
        // Delete User
        if( $select_action == 'trash' )
        {
            $check = isset($data['check']) ? $data['check'] : [];
            if( count($check) == 0 )
            {
                return redirect('admin/navigation');
            }
            else
            {
                foreach( $check as $v )
                {
                    $this->destroy($v);
                }
                return redirect('admin/navigation');
            }
        }
        
        // Search
        $search = isset($data['search']) ? $data['search'] : '';
        
        if( $search )
        {
            foreach( $navigation_data as $slugMenuName => $arries )
            {
                if( stripos($arries['menu_name'],$search) === false )
                {
                    unset($navigation_data[$slugMenuName]);
                }
            }
        }
        /*-- End Menu Top --*/
        
    	return view('backend.pages.website.navigation.listNavigation',[
            'navigation_data' => $navigation_data,
            'navigation_load' => $navigation_load,
            'registerNavigation' => $registerNavigation,
            'search' => $search,
        ]);
    }
    public function create()
    {
        $termObject = new Term;
        $postObject = new Post;
        $optionObject = new Option;

        $categoryPosts = $termObject->Get_category_post_term();
        $categoryProducts = $termObject->Get_category_product_term();
        $pages = $postObject->Get_posts_public_post();
        
        /*-- Get Menu Data From Template --*/
        $active_template = $optionObject->getOptionValue_option('active_template');
        require_once('system/application/views/frontend/'.$active_template.'/function.php');
        if( function_exists('resgister_navigation') )
        {
            $registerNavigation = resgister_navigation();
        }
        else
        {
            return redirect('admin');
        }
        /*-- End Get Menu Data From Template --*/
        
        return view('backend.pages.website.navigation.createNavigation',[
            'categoryPosts' => $categoryPosts,
            'categoryProducts' => $categoryProducts,
            'pages' => $pages,
            'registerNavigation' => $registerNavigation,
        ]);
    }
    
    public function store(Request $request)
    {
        $optionObject = new Option;
        $data = $request->all();
         
        $data['title'] = ( isset($data['title']) ) ? $data['title'] : '';
        $data['menu'] = ( isset($data['menu']) ) ? $data['menu'] : '0';
        $data['menu_data'] = ( isset($data['menu_data']) ) ? $data['menu_data'] : [];
        
        /*-- Validator --*/
        $validator = Validator::make($data,[
            'title' => 'required',
        ],[
            'title.required' => 'Vui lòng nhập tên menu',
        ]);
        
        if( $validator->fails() )
        {
            $messages = $validator->errors();
            if( $request->ajax() )
            {
                return '{"Response":"False","Message":"'.$messages->first('title').'"}';
            }                
        }
        /*-- End Validator --*/
        
        $slugMenuName = str_slug($data['title'],'_');
        $menu_data = json_decode($data['menu_data'],true);
        
        $navigation_data = [
            $slugMenuName => [
                'menu_name' => $data['title'],
                'menu_data' => $menu_data,
            ],
        ];
        
        $navigationDataFromDatabase = decode_serialize($optionObject->getOptionValue_option('navigation_data'));
        if( is_array($navigationDataFromDatabase) && count($navigationDataFromDatabase) > 0 )
        {
            if( isset($navigationDataFromDatabase[$slugMenuName]) )
            {
                $_slugMenuNameUndercore = $slugMenuName.'_';
                $_undercoreDataTitle = $data['title'].'_';
                $i=1;
                while(isset($navigationDataFromDatabase[$slugMenuName]))
                {
                   $slugMenuName = $_slugMenuNameUndercore.$i;
                   $dataTitle = $_undercoreDataTitle.$i;
                   $i++;
                }
                
                $navigation_data = [
                    $slugMenuName => [
                        'menu_name' => $dataTitle,
                        'menu_data' => $menu_data,
                    ],
                ];
            }
            
            $navigation_data = array_merge($navigation_data,$navigationDataFromDatabase);
        }
        
        /*-- Update To Database --*/
        $optionObject->update_option('navigation_data',encode_serialize($navigation_data));
        /*-- End Update To Database --*/
        
        $menu = $data['menu'];
        if( $menu != '0' )
        {
            $active_template = $optionObject->getOptionValue_option('active_template');
            require_once('system/application/views/frontend/'.$active_template.'/function.php');
            if( function_exists('resgister_navigation') )
            {
                $registerNavigation = resgister_navigation();
                if( !array_key_exists($menu,$registerNavigation) )
                {
                    return redirect('admin');
                }
                
                $navigation_load = [
                    $menu => $slugMenuName,
                ];
                
                $navigationLoadFromDatabase = decode_serialize($optionObject->getOptionValue_option('navigation_load'));
                if( is_array($navigationLoadFromDatabase) && count($navigationLoadFromDatabase) > 0 )
                {
                    if( isset($navigationLoadFromDatabase[$menu]) )
                    {
                        $navigationLoadFromDatabase[$menu] = $slugMenuName;
                        
                        /*-- Update To Database --*/
                        $optionObject->update_option('navigation_load',encode_serialize($navigationLoadFromDatabase));
                        /*-- End Update To Database --*/
                    }
                    else
                    {
                        $navigation_load = array_merge($navigation_load,$navigationLoadFromDatabase);
                        
                        /*-- Update To Database --*/
                        $optionObject->update_option('navigation_load',encode_serialize($navigation_load));
                        /*-- End Update To Database --*/
                    }
                }
                else
                {
                    $optionObject->update_option('navigation_load',encode_serialize($navigation_load));
                    /*-- End Update To Database --*/
                }
                
            }
            else
            {
                return redirect('admin');
            }
        }
        else
        {
            $optionObject->update_option('navigation_load',encode_serialize([]));
            /*-- End Update To Database --*/
        }
        
        return '{"Response":"True","Redirect":"'.url('admin/navigation/edit/'.$slugMenuName).'"}';
    }
    
    public function edit($slugMenuName)
    {
        $termObject = new Term;
        $postObject = new Post;
        $optionObject = new Option;

        $categoryPosts = $termObject->Get_category_post_term();
        $categoryProducts = $termObject->Get_category_product_term();
        $pages = $postObject->Get_posts_public_post();
        $navigation_data = decode_serialize($optionObject->getOptionValue_option('navigation_data'));
        if( !isset($navigation_data[$slugMenuName]) )
        {
            return redirect('admin');
        }
        $navigation_load = decode_serialize($optionObject->getOptionValue_option('navigation_load'));
        
        /*-- Get Menu Name --*/
        $menuName = $navigation_data[$slugMenuName]['menu_name'];
        /*-- End Get Menu Name --*/
        
        /*-- Get Menu Data --*/
        $menuData = $navigation_data[$slugMenuName]['menu_data'];
        /*-- End Get Menu Data --*/
        
        /*-- Get Position Menu --*/
        if( !is_array($navigation_load) )
        {
            $navigation_load = [];
        }
        $position = array_search($slugMenuName,$navigation_load);
        /*-- End Get Position Menu --*/
        
        /*-- Get Menu Data From Template --*/
        $active_template = $optionObject->getOptionValue_option('active_template');
        require_once('system/application/views/frontend/'.$active_template.'/function.php');
        if( function_exists('resgister_navigation') )
        {
            $registerNavigation = resgister_navigation();
        }
        else
        {
            return redirect('admin');
        }
        /*-- End Get Menu Data From Template --*/
        
        /*-- Get Keys Selected Category Post & Category Product & Page --*/
        //$keysSelectCategoryPost = [];
//        $keysSelectCategoryProduct = [];
//        
//        if( count($menuData) > 0 )
//        {
//            foreach( $menuData as $array )
//            {
//                if( strpos($array['url'],'post') !== false )
//                {
//                    $keysSelectCategoryPost[] = str_replace('post-','',$array['url']);
//                }
//                
//                if( strpos($array['url'],'product') !== false )
//                {
//                    $keysSelectCategoryProduct[] = str_replace('product-','',$array['url']);
//                }
//            }            
//        }
        /*-- End Get Keys Selected Category Post & Category Product --*/
        
        return view('backend.pages.website.navigation.editNavigation',[
            'slugMenuName' => $slugMenuName,
            'categoryPosts' => $categoryPosts,
            'categoryProducts' => $categoryProducts,
            'pages' => $pages,
            'registerNavigation' => $registerNavigation,
            'menuName' => $menuName,
            'menuData' => $menuData,
            'position' => $position,
            //'keysSelectCategoryPost' => $keysSelectCategoryPost,
//            'keysSelectCategoryProduct' => $keysSelectCategoryProduct,
        ]);
    }
    
    public function update($slugMenuName,Request $request)
    {
        $optionObject = new Option;
        $data = $request->all();
        $data['title'] = ( isset($data['title']) ) ? $data['title'] : '';
        $data['menu'] = ( isset($data['menu']) ) ? $data['menu'] : '0';
        $data['menu_data'] = ( isset($data['menu_data']) ) ? $data['menu_data'] : [];
        
        $navigation_data = decode_serialize($optionObject->getOptionValue_option('navigation_data'));
        if( !isset($navigation_data[$slugMenuName]) )
        {
            return redirect('admin');
        }
        $navigation_load = decode_serialize($optionObject->getOptionValue_option('navigation_load'));
        /*-- Get Menu Data From Template --*/
        $active_template = $optionObject->getOptionValue_option('active_template');
        require_once('system/application/views/frontend/'.$active_template.'/function.php');
        if( function_exists('resgister_navigation') )
        {
            $registerNavigation = resgister_navigation();
        }
        else
        {
            return redirect('admin');
        }
        /*-- End Get Menu Data From Template --*/
        
        /*-- Validator --*/
        $validator = Validator::make($data,[
            'title' => 'required',
        ],[
            'title.required' => 'Vui lòng nhập tên menu',
        ]);
        
        if( $validator->fails() )
        {
            $messages = $validator->errors();
            if( $request->ajax() )
            {
                return '{"Response":"False","Message":"'.$messages->first('title').'"}';
            }                
        }
        /*-- End Validator --*/
        
        // First Delete Menu Then Add Menu
        // Delete
        unset($navigation_data[$slugMenuName]);
        if( !is_array($navigation_load) )
        {
            $navigation_load = [];
        }
        $keyPosition = array_search($slugMenuName,$navigation_load);
        if( $keyPosition !== false )
        {
            unset($navigation_load[$keyPosition]);
        }
        // Add
        $slugNewMenuName = str_slug($data['title'],'_');
        $menu_data = json_decode($data['menu_data'],true);
        
        $navigationDataNew = [
            $slugNewMenuName => [
                'menu_name' => $data['title'],
                'menu_data' => $menu_data,
            ],
        ];
        
        if( is_array($navigation_data) && count($navigation_data) > 0 )
        {
            if( isset($navigation_data[$slugNewMenuName]) )
            {
                $_slugMenuNameUndercore = $slugNewMenuName.'_';
                $_undercoreDataTitle = $data['title'].'_';
                $i=1;
                while(isset($navigation_data[$slugNewMenuName]))
                {
                   $slugNewMenuName = $_slugMenuNameUndercore.$i;
                   $dataTitle = $_undercoreDataTitle.$i;
                   $i++;
                }
                
                $navigationDataNew = [
                    $slugNewMenuName => [
                        'menu_name' => $dataTitle,
                        'menu_data' => $menu_data,
                    ],
                ];
            }
            
            $navigationDataNew = array_merge($navigationDataNew,$navigation_data);
        }
        
        /*-- Update To Database --*/
        $optionObject->update_option('navigation_data',encode_serialize($navigationDataNew));
        /*-- End Update To Database --*/
        
        $menu = $data['menu'];
        if( $menu != '0' )
        {
            if( !array_key_exists($menu,$registerNavigation) )
            {
                return redirect('admin');
            }
            
            $navigationLoadNew = [
                $menu => $slugNewMenuName,
            ];
            
            if( is_array($navigation_load) && count($navigation_load) > 0 )
            {
                if( isset($navigation_load[$menu]) )
                {
                    $navigation_load[$menu] = $slugNewMenuName;
                    
                    /*-- Update To Database --*/
                    $optionObject->update_option('navigation_load',encode_serialize($navigation_load));
                    /*-- End Update To Database --*/
                }
                else
                {
                    $navigationLoadNew = array_merge($navigationLoadNew,$navigation_load);
                    
                    /*-- Update To Database --*/
                    $optionObject->update_option('navigation_load',encode_serialize($navigationLoadNew));
                    /*-- End Update To Database --*/
                }
            }
            else
            {
                /*-- Update To Database --*/
                $optionObject->update_option('navigation_load',encode_serialize($navigationLoadNew));
                /*-- End Update To Database --*/
            }
        }
        else
        {
            /*-- Update To Database --*/
            $optionObject->update_option('navigation_load',encode_serialize($navigation_load));
            /*-- End Update To Database --*/
        }
        
        return '{"Response":"True","Redirect":"'.url('admin/navigation/edit/'.$slugNewMenuName).'"}';
    }
    
    public function destroy($slugMenuName)
    {
        $optionObject = new Option;

        $navigation_data = decode_serialize($optionObject->getOptionValue_option('navigation_data'));
        if( !isset($navigation_data[$slugMenuName]) )
        {
            return redirect('admin');
        }
        $navigation_load = decode_serialize($optionObject->getOptionValue_option('navigation_load'));
        
        unset($navigation_data[$slugMenuName]);
        
        /*-- Update To Database --*/
        $optionObject->update_option('navigation_data',encode_serialize($navigation_data));
        /*-- End Update To Database --*/
        if( !is_array($navigation_load) )
        {
            $navigation_load = [];
        }
        $keyPosition = array_search($slugMenuName,$navigation_load);
        if( $keyPosition !== false )
        {
            unset($navigation_load[$keyPosition]);
        }
        
        /*-- Update To Database --*/
        $optionObject->update_option('navigation_load',encode_serialize($navigation_load));
        /*-- End Update To Database --*/
        
        return redirect('admin/navigation');
    }
}
