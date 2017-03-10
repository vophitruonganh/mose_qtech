<?php

namespace App\Http\Controllers\backend\setting;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */
use App\Models\Option;
use Validator;
use Session;

class DomainSettingController extends BackendController
{
    /*
    *    store: tạo domain 
    *    setPrimaryDomain: thiết lập domain chính
    *    validDomain: kiểm tra domain
    */

    public function index()
    {

    	$option = new Option;
		$_option = $option->Get_option('list_domain');
		$primary_domain = $option->Get_option('primary_domain')->option_value;
		$list_domain = decode_serialize($_option->option_value);

        return view('backend.pages.setting.domain.listDomainSetting',[
        	'list_domain' => $list_domain,
        	'primary_domain' => $primary_domain
        ]);
    }
    public function create()
    {
    	return view('backend.pages.setting.domain.CreateDomainSetting',[
        ]);
    }
    public function store(Request $request)
    {
    	$option = new Option;
    	$data = $request->all();
    	$domain_name = isset($data['domain_name'])? $data['domain_name'] : '';
    	$validator = Validator::make($data,[
            'domain_name'=>'required|regex:/^((?:(?:(?:\w[\.\-\+]?)*)\w)+)((?:(?:(?:\w[\.\-\+]?){0,62})\w)+)\.(\w{2,6})$/',
        ],[
            'domain_name.required'=>'Chưa nhập tên miền',
            'domain_name.regex' => 'Tên miền không hợp lệ',
        ]);
        if( $validator->fails()){
            if($request->ajax()){
                return '{"Response":"False","Message":"'.urlencode($validator->errors()).'"}';
            }else{
                return redirect('admin/setting/domain/create')->withErrors($validator)->withInput();
            }
        }

        $_option = $option->Get_option('list_domain');
        if(!$_option){
        	
        }
        else{
        	$domain_name = strtolower($domain_name);
        	$domain_list_current = decode_serialize($_option->option_value);
        	foreach($domain_list_current as $domain){
        		if($domain==$domain_name){
        			$validator->getMessageBag()->add('','Tên miền này đã có');
        			if($request->ajax()){
        				return '{"Response":"False","Message":"Tên miền này đã có"}';
        			}
        			return redirect('admin/setting/domain/create')->withErrors($validator)->withInput();
        		}
        	}
        	array_push($domain_list_current, $domain_name);
        	$option->Update_option('list_domain',encode_serialize($domain_list_current));
        	
        }
        return redirect('admin/setting/domain/create');
    }
    /* 
        thiết lập domain chính 
    */
    public function setPrimaryDomain($domain_name)
    {
    	$option = new Option;
    	$_option = $option->Get_option('list_domain');
    	$list_domain = decode_serialize($_option->option_value);
    	$is_domain = 0;
    	foreach($list_domain as $domain){
    		if($domain==$domain_name){
    			$is_domain = 1;
    		}
    	}
    	if($is_domain==0){
    		return '{"Response":"False","Message":"Không có domain này"}';
    	}
    	$option = new Option;
    	$option->Update_option('primary_domain',$domain_name);
    }
    /*
        Xóa domain
    */
    public function destroyDomain($domain_name){
    	$option = new Option;
    	$_option = $option->Get_option('list_domain');
    	$primary_domain = $option->Get_option('primary_domain')->option_value;
    	$list_domain = decode_serialize($_option->option_value);
    	$is_domain = 0;
    	foreach($list_domain as $domain){
    		if($domain==$domain_name){
    			$is_domain = 1;
    		}
    	}
    	/* kiểm tra domain tồn tại */
    	if($is_domain==0){
    		return '{"Response":"False","Message":"Không có domain này"}';
    	}
    	/* END */
    	/* kiểm tra domain ban đầu và domain chính */
    	if($domain_name==$primary_domain || $domain_name==$list_domain[0]){
    		return '{"Response":"False","Message":"Không thể xóa domain này"}';	
    	}
    	/* END */
    	/* Xóa domain khỏi mảng */
    	foreach (array_keys($list_domain, $domain_name, true) as $key) {
		    unset($list_domain[$key]);
		}
		/* END */
		$option->Update_option('list_domain',encode_serialize($list_domain));
    }
    /* 
        kiểm tra domain (cấu hình)
    */
    public function validDomain(Request $request){
    	$data = $request->all();
    	$option = new Option;
		$_option = $option->Get_option('list_domain');
		$list_domain = decode_serialize($_option->option_value);
		$ip_address_main = gethostbyname($list_domain[0]);
	
    	$domain = isset($data['domain']) ? explode(',', $data['domain']) : [];
    	$array = [];
    	foreach ($domain as $key => $value) {
    		$ip_address = gethostbyname($value);
    		if($ip_address==$ip_address_main){
    			array_push($array, 1);
    		}
    		else{
    			if($ip_address==$value){
    				array_push($array, 2);
    			}
    			else
    			{
    				array_push($array, 3);	
    			}
    		}

    	}
    	return $array;
    }
}
