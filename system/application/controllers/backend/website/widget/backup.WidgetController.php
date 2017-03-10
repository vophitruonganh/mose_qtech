<?php

namespace App\Http\Controllers\backend\website\widget;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */
use App\Models\Option;
use Session;
use Validator;
use DB;

class WidgetController extends BackendController
{
	public function index()
	{
		$optionObject = new Option;

		/*-- Get List Widget --*/
		$listWidget = $this->getListWidget();
		if( count($listWidget) == 0 )
		{
			return redirect('admin');
		}
		/*-- End Get List Widget --*/

		/*- Get List Plugin --*/
		$listPlugin = $this->getListPlugin();
		/*- End Get List Plugin --*/

		/*-- Get List Plugin In Widget --*/
		$listPluginInWidget = [];
		
		$sidebarsWidget = $optionObject->getOptionValue_option('sidebars_widget');
		$arraySidebarsWidget = decode_serialize($sidebarsWidget);

		foreach( $listWidget as $widget )
		{
			if( isset($arraySidebarsWidget[$widget]) && count($arraySidebarsWidget[$widget]) > 0 )
			{
				foreach( $arraySidebarsWidget[$widget] as $key => $value )
				{
					$listPluginInWidget[$widget][$key][$value] = get_info('system/plugins/'.$value.'/','Plugin Name',$value.'.php');
				}
			}
		}
		echo '<pre>';
		print_r($listPluginInWidget);
		exit();
		/*-- End Get List Plugin In Widget --*/

		return view('backend.pages.website.widget.listWidget',[
		   'listWidget' => $listWidget,
		   'listPlugin' => $listPlugin,
		   'listPluginInWidget' => $listPluginInWidget,
		]);
	}

	public function widget_list(Request $request)
	{
		$optionObject = new Option;
		$data = $request->all();

		$listWidget = $this->getListWidget();
		if( count($listWidget) == 0 )
		{
			return redirect('admin');
		}

		$sidebarsWidget = $optionObject->getOptionValue_option('sidebars_widget');
		$arraySidebarsWidget = decode_serialize($sidebarsWidget);

		foreach( $listWidget as $widget )
		{
			// $rq_sidebar = isset($data['plugin'][$widget]) ? $data['plugin'][$widget] : [];
			// $db_sidebar = isset($arraySidebarsWidget[$widget]) ? $arraySidebarsWidget[$widget] : [];
			// if($rq_sidebar)
			// {
			//     $data['plugin'][$widget] = array_values($data['plugin'][$widget]);
			//     array_unshift($data['plugin'][$widget], null);
			//     unset($data['plugin'][$widget][0]);

			//     $arraySidebarsWidget[$widget] = $data['plugin'][$widget];
			// }
			// else
			// {
				
			//     if(!$rq_sidebar){
					
			//         // if($db_sidebar == $widget){

			//         //     unset($arraySidebarsWidget[$widget]);
			//         // }else if(){

			//         // }
			//         // return '2';
			//     }
			//     else if($db_sidebar && $rq_sidebar == $widget) 
			//     {

			//         unset($arraySidebarsWidget[$widget]);
			//     }
			// }
			if( isset($data['plugin'][$widget]) && count($data['plugin'][$widget]) )
			{
				$data['plugin'][$widget] = array_values($data['plugin'][$widget]);
				array_unshift($data['plugin'][$widget], null);
				unset($data['plugin'][$widget][0]);

				$arraySidebarsWidget[$widget] = $data['plugin'][$widget];
			}
			else
			{
				if( isset($arraySidebarsWidget[$widget]) )
				{
					unset($arraySidebarsWidget[$widget]);
				}
			}
		}

		$optionObject->update_option('sidebars_widget',encode_serialize($arraySidebarsWidget));

		return redirect('admin/widget');
	}

	public function widget_edit($widget,$plugin,$order)
	{
		$optionObject = new Option;

		/*-- Check Input Variable --*/
		if( !$this->checkInputVariable($widget,$plugin,$order) )
		{
			return redirect('admin');
		}
		/*-- End Check Input Variable --*/

		$data = [];

		$pluginOption = $optionObject->get_option('widget_'.$plugin);

		if( $pluginOption != null )
		{
			$optionValue = decode_serialize(Option::where([
				'option_name' => 'widget_'.$plugin,
			])->first()->option_value);

			$optionValue = decode_serialize($optionObject->getOptionValue_option('widget_'.$plugin));

			if( isset($optionValue[$widget][$order]) )
			{
				$data = $optionValue[$widget][$order];
			}
			
		}

		require_once('system/plugins/'.$plugin.'/'.$plugin.'.php');
		$class = new $plugin;
		if( !method_exists($class,'widget_form') )
		{
			return redirect('admin');
		}
		$widgetForm = $class->widget_form($data);

		return view('backend.pages.website.widget.editWidget',[
		   'widgetForm' => $widgetForm,
		]);
	}

	public function widget_save($widget,$plugin,$order,Request $request)
	{
		$optionObject = new Option;

		/*-- Check Input Variable --*/
		if( !$this->checkInputVariable($widget,$plugin,$order) )
		{
			return redirect('admin');
		}
		/*-- End Check Input Variable --*/

		$data = $request->all();

		require_once('system/plugins/'.$plugin.'/'.$plugin.'.php');
		$class = new $plugin;
		if( !method_exists($class,'widget_data') )
		{
			return redirect('admin');
		}
		$widgetData = $class->widget_data($data);
		
		$pluginOption = $optionObject->get_option('widget_'.$plugin);

		if( $pluginOption == null )
		{
			$dataInsert = [];

			$dataInsert['option_name'] = 'widget_'.$plugin;
			$dataInsert['option_value'] = encode_serialize([
				$widget => [
					$order => $widgetData,
				],
			]);

			$optionObject->insert_option($dataInsert);
		}
		else
		{
			$pluginOption = $optionObject->getOptionValue_option('widget_'.$plugin);
			
			$pluginOptionDatabase = decode_serialize($pluginOption);

			$pluginOptionDatabase[$widget][$order] = $widgetData;

			$optionObject->update_option('widget_'.$plugin,encode_serialize($pluginOptionDatabase));
		}

		return redirect('admin/widget/'.$widget.'/'.$plugin.'/'.$order);
	}

	public function removeOrderAttribute(Request $request)
	{
		$optionObject = new Option;
		$data = $request->all();

		$widget = isset($data['widget']) ? $data['widget'] : null;
		$plugin = isset($data['plugin']) ? $data['plugin'] : null;
		$order = isset($data['order']) ? $data['order'] : null;

		if( $widget == null || $plugin == null || $order == null )
		{
			return null;
		}

		/*-- Check Input Variable --*/
		if( !$this->checkInputVariable($widget,$plugin,$order) )
		{
			return null;
		}
		/*-- End Check Input Variable --*/

		$pluginOption = $optionObject->get_option('widget_'.$plugin);

		if( $pluginOption != null )
		{
			$pluginOption = $optionObject->getOptionValue_option('widget_'.$plugin);
			
			$pluginOptionDatabase = decode_serialize($pluginOption);

			unset($pluginOptionDatabase[$widget][$order]);

			$optionObject->update_option('widget_'.$plugin,encode_serialize($pluginOptionDatabase));
		}
	}

	private function checkInputVariable($widget,$plugin,$order)
	{
		$optionObject = new Option;

		$listWidget = $this->getListWidget();
		if( count($listWidget) == 0 )
		{
			return false;
		}
		if( !in_array($widget,$listWidget) )
		{
			return false;
		}

		$listPlugin = $this->getListPlugin();
		if( !array_key_exists($plugin,$listPlugin) )
		{
			return false;
		}

		$sidebarsWidget = $optionObject->getOptionValue_option('sidebars_widget');
		$arraySidebarsWidget = decode_serialize($sidebarsWidget);

		if( !isset($arraySidebarsWidget[$widget][$order]) || $arraySidebarsWidget[$widget][$order] != $plugin )
		{
			return false;
		}

		return true;
	}

	private function getListWidget()
	{
		$optionObject = new Option;
		$listWidget = [];

		$active_template = $optionObject->getOptionValue_option('active_template');

		require_once('system/application/views/frontend/'.$active_template.'/function.php');
		if( function_exists('resgisterWidget') )
		{
			$listWidget = resgisterWidget();
		}

		return $listWidget;
	}

	private function getListPlugin()
	{
		$listPlugin = [];

		$plugins = list_files('system/plugins',1);
		foreach( $plugins as $plugin )
		{
			$_substr = substr($plugin,0,-1);
			$_explode = explode('/',$_substr);
			$pluginName = array_pop($_explode);
			$listPlugin[$pluginName] = get_info($plugin,'Plugin Name',$pluginName.'.php');
		}

		return $listPlugin;
	}
}
