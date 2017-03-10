<?php

namespace App\Http\Controllers\backend\website;

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
	public function index(Request $request)
	{
		$optionObject = new Option;
		$data = $request->all();

		$post_action = isset($data['action']) ? $data['action'] : '';
		$post_widget = isset($data['widget']) ? $data['widget'] : '';
		$post_plugin = isset($data['plugin']) ? $data['plugin'] : '';
		$post_order = isset($data['order']) ? $data['order'] : '';

		if( !$post_action )
		{
			// Get Widget Active
			$listWidget = $this->getListWidget();
			if( count($listWidget) == 0 )
			{
				return redirect('admin');
			}

			$listPlugin = $this->getListPlugin();

			$listPluginInWidget = [];
			
			$sidebarsWidget = $optionObject->getOptionValue_option('sidebars_widget');
			$arraySidebarsWidget = decode_serialize($sidebarsWidget);

			foreach( $listWidget as $widget )
			{
				if( isset($arraySidebarsWidget[$widget]) && count($arraySidebarsWidget[$widget]) > 0 )
				{
					foreach( $arraySidebarsWidget[$widget] as $key => $value )
					{
						$listPluginInWidget[$widget][$key]['folderPlugin'] = $value;
						$enableEditButton = 0;
						if( array_key_exists($value, $listPlugin) )
						{
							$enableEditButton = 1;
						}
						$listPluginInWidget[$widget][$key]['enableEditButton'] = $enableEditButton;

						$fullDirectoryPlugins = list_files('system/plugins/'.$value,1);
						foreach( $fullDirectoryPlugins as $fullDirectoryPlugin )
						{
							$_explode = explode('/',$fullDirectoryPlugin);
							$fileName = $_explode[count($_explode)-1];
							$info = get_info('system/plugins/'.$value.'/','Plugin Name',$fileName);
							if( $info !== null && strlen($info) > 0 )
							{
								$listPluginInWidget[$widget][$key]['pluginName'] = $info;
								continue;
							}
						}
					}
				}
				else
				{
					$listPluginInWidget[$widget] = [];
				}
			}
			// End

			// Get Widget Not Active
			$widgetsNotActive = [];
			$arrayWidget = array_keys($arraySidebarsWidget);

			foreach( $arrayWidget as $widget )
			{
				if( !in_array($widget,$listWidget) )
				{
					$widgetsNotActive[] = $widget;
				}
			}
			//End

			// Description Widget
			$descriptionWidget = [];
			$resgisterWidget = [];
			$active_template = $optionObject->getOptionValue_option('active_template');

			require_once('system/application/views/frontend/'.$active_template.'/function.php');
			if( function_exists('resgisterWidget') )
			{
				$resgisterWidget = resgisterWidget();
			}

			foreach( $resgisterWidget as $widget )
			{
				$descriptionWidget[$widget['name']] = $widget['description'];
			}
			//End

			return view('backend.pages.website.widget.listWidget',[
			   'listPlugin' => $listPlugin,
			   'listPluginInWidget' => $listPluginInWidget,
			   'widgetsNotActive' => $widgetsNotActive,
			   'descriptionWidget' => $descriptionWidget,
			]);
		}
		elseif( $post_action == 'add' )
		{
			$listWidget = $this->getListWidget();
			if( count($listWidget) == 0 )
			{
				return '{"Response":"False","Message":"List widget is empty"}';
			}
			if( !in_array($post_widget,$listWidget) )
			{
				return '{"Response":"False","Message":"Widget isn\'t exists"}';
			}

			$directoryPlugins = list_files('system/plugins',1);
			if( !in_array('system/plugins/'.$post_plugin.'/',$directoryPlugins) )
			{
				return '{"Response":"False","Message":"Plugin isn\'t exists"}';
			}

			$sidebarsWidget = $optionObject->getOptionValue_option('sidebars_widget');
			$arraySidebarsWidget = decode_serialize($sidebarsWidget);
			if( isset($arraySidebarsWidget[$post_widget][$post_order]) )
			{
				return '{"Response":"False","Message":"Plugin isn\'t exists in list widget"}';
			}
			else
			{
				$arraySidebarsWidget[$post_widget][$post_order] = $post_plugin;
				$optionObject->Update_option('sidebars_widget',encode_serialize($arraySidebarsWidget));
				return '{"Response":"True"}';
			}
			
			return '{"Response":"False","Message":"Error System"}';
		}
		elseif( $post_action == 'edit' )
		{
			return '{"Response":"True","Redirect":"'.url('admin/widget/'.$post_widget.'/'.$post_plugin.'/'.$post_order).'"}';
		}
		elseif( $post_action == 'remove' )
		{
			// Remove Attribute
			if( $post_widget == null || $post_plugin == null || $post_order == null )
			{
				return '{"Response":"False","Message":"Varibles send to sever is null"}';
			}
			
			if( !$this->checkInputVariable($post_widget,$post_plugin,$post_order) )
			{
				return '{"Response":"False","Message":"Function checkInputVariable() is false"}';
			}
			
			$pluginOption = $optionObject->Get_option('widget_'.$post_plugin);

			if( $pluginOption != null )
			{
				$pluginOption = $optionObject->getOptionValue_option('widget_'.$post_plugin);
				
				$pluginOptionDatabase = decode_serialize($pluginOption);

				if( isset($pluginOptionDatabase[$post_widget][$post_order]) )
				{
					unset($pluginOptionDatabase[$post_widget][$post_order]);
					if( count($pluginOptionDatabase[$post_widget]) == 0 )
					{
						unset($pluginOptionDatabase[$post_widget]);
					}
				}

				$optionObject->Update_option('widget_'.$post_plugin,encode_serialize($pluginOptionDatabase));
			}
			// End

			// Remove Plugin
			$listWidget = $this->getListWidget();
			if( count($listWidget) == 0 )
			{
				return '{"Response":"False","Message":"List widget is empty"}';
			}
			if( !in_array($post_widget,$listWidget) )
			{
				return '{"Response":"False","Message":"Widget isn\'t exists"}';
			}

			$directoryPlugins = list_files('system/plugins',1);
			if( !in_array('system/plugins/'.$post_plugin.'/',$directoryPlugins) )
			{
				return '{"Response":"False","Message":"Plugin isn\'t exists"}';
			}

			$sidebarsWidget = $optionObject->getOptionValue_option('sidebars_widget');
			$arraySidebarsWidget = decode_serialize($sidebarsWidget);
			if( isset($arraySidebarsWidget[$post_widget][$post_order]) && $arraySidebarsWidget[$post_widget][$post_order] == $post_plugin )
			{
				unset($arraySidebarsWidget[$post_widget][$post_order]);
				$optionObject->Update_option('sidebars_widget',encode_serialize($arraySidebarsWidget));
				return '{"Response":"True"}';
			}
			else
			{
				return '{"Response":"False","Message":"Plugin isn\'t exists in list widget"}';
			}
			// End
			
			return '{"Response":"False","Message":"Error System"}';
		}
		elseif( $post_action == 'delete' )
		{
			$sidebarsWidget = $optionObject->getOptionValue_option('sidebars_widget');
			$arraySidebarsWidget = decode_serialize($sidebarsWidget);
			if( isset($arraySidebarsWidget[$post_widget]) )
			{
				unset($arraySidebarsWidget[$post_widget]);
				$optionObject->Update_option('sidebars_widget',encode_serialize($arraySidebarsWidget));
				return '{"Response":"True"}';
			}
			else
			{
				return '{"Response":"False","Message":"Widget isn\'t exists in list widget"}';
			}

			return '{"Response":"False","Message":"Error System"}';
		}
	}

	// public function widget_list(Request $request)
	// {
	// 	$optionObject = new Option;
	// 	$data = $request->all();

	// 	$listWidget = $this->getListWidget();
	// 	if( count($listWidget) == 0 )
	// 	{
	// 		return redirect('admin');
	// 	}

	// 	$listPlugin = $this->getListPlugin();

	// 	$directoryPlugins = list_files('system/plugins',1);

	// 	$sidebarsWidget = $optionObject->getOptionValue_option('sidebars_widget');
	// 	$arraySidebarsWidget = decode_serialize($sidebarsWidget);

	// 	foreach( $data['plugin'] as $widget => $folderPlugins )
	// 	{
	// 		if( !in_array($widget,$listWidget) )
	// 		{
	// 			return redirect('admin');
	// 		}

	// 		foreach( $folderPlugins as $folderPlugin )
	// 		{
	// 			if( !in_array('system/plugins/'.$folderPlugin.'/',$directoryPlugins) )
	// 			{
	// 				return redirect('admin');
	// 			}
	// 		}
	// 	}

	// 	foreach( $listWidget as $widget )
	// 	{
			
	// 		if( isset($data['plugin'][$widget]) && count($data['plugin'][$widget]) )
	// 		{
	// 			$data['plugin'][$widget] = array_values($data['plugin'][$widget]);
	// 			array_unshift($data['plugin'][$widget], null);
	// 			unset($data['plugin'][$widget][0]);

	// 			$arraySidebarsWidget[$widget] = $data['plugin'][$widget];
	// 		}
	// 		else
	// 		{
	// 			if( isset($arraySidebarsWidget[$widget]) )
	// 			{
	// 				unset($arraySidebarsWidget[$widget]);
	// 			}
	// 		}
	// 	}
		
	// 	$optionObject->Update_option('sidebars_widget',encode_serialize($arraySidebarsWidget));

	// 	return redirect('admin/widget');
	// }

	public function widget_edit($widget,$folderPlugin,$order)
	{
		$optionObject = new Option;

		/*-- Check Input Variable --*/
		if( !$this->checkInputVariable($widget,$folderPlugin,$order) )
		{
			return redirect('admin');
		}
		/*-- End Check Input Variable --*/

		$data = [];

		$pluginOption = $optionObject->Get_option('widget_'.$folderPlugin);

		if( $pluginOption != null )
		{
			$optionValue = decode_serialize($optionObject->getOptionValue_option('widget_'.$folderPlugin));

			if( isset($optionValue[$widget][$order]) )
			{
				$data = $optionValue[$widget][$order];
			}
			
		}

		$fileNamePlugin = '';

		$directoryFile = list_files('system/plugins/'.$folderPlugin,1);
		foreach( $directoryFile as $directoryPlugin  )
		{
			$directoryFilePlugin = str_replace('system/plugins/','',$directoryPlugin);
			$_explode = explode('/',$directoryFilePlugin);
			$fileName = $_explode[count($_explode)-1];
			$info = get_info('system/plugins/'.$folderPlugin.'/','Plugin Name',$fileName);
			if( $info !== null && strlen($info) > 0 )
			{
				$fileNamePlugin = str_replace('.php','',$fileName);
				break;
			}
		}

		if( strlen($fileNamePlugin) == 0 )
		{
			return redirect('admin');
		}

		require_once('system/plugins/'.$folderPlugin.'/'.$fileNamePlugin.'.php');
		if( !class_exists($folderPlugin) )
		{
			return redirect('admin');
		}
		
		$class = new $folderPlugin;
		if( !method_exists($class,'widget_form') )
		{
			return redirect('admin');
		}
		$widgetForm = $class->widget_form($data);

		return view('backend.pages.website.widget.editWidget',[
		   'widgetForm' => $widgetForm,
		   'pluginName' => $info,
		]);
	}

	public function widget_save($widget,$folderPlugin,$order,Request $request)
	{
		$optionObject = new Option;

		/*-- Check Input Variable --*/
		if( !$this->checkInputVariable($widget,$folderPlugin,$order) )
		{
			return redirect('admin');
		}
		/*-- End Check Input Variable --*/

		$data = $request->all();

		$fileNamePlugin = '';

		$directoryFile = list_files('system/plugins/'.$folderPlugin,1);
		foreach( $directoryFile as $directoryPlugin  )
		{
			$directoryFilePlugin = str_replace('system/plugins/','',$directoryPlugin);
			$_explode = explode('/',$directoryFilePlugin);
			$fileName = $_explode[count($_explode)-1];
			$info = get_info('system/plugins/'.$folderPlugin.'/','Plugin Name',$fileName);
			if( $info !== null && strlen($info) > 0 )
			{
				$fileNamePlugin = str_replace('.php','',$fileName);
				break;
			}
		}

		if( strlen($fileNamePlugin) == 0 )
		{
			return redirect('admin');
		}

		require_once('system/plugins/'.$folderPlugin.'/'.$fileNamePlugin.'.php');
		$class = new $folderPlugin;
		if( !method_exists($class,'widget_data') )
		{
			return redirect('admin');
		}
		$widgetData = $class->widget_data($data);
		
		$pluginOption = $optionObject->Get_option('widget_'.$folderPlugin);

		if( $pluginOption == null )
		{
			$dataInsert = [];

			$dataInsert['option_name'] = 'widget_'.$folderPlugin;
			$dataInsert['option_value'] = encode_serialize([
				$widget => [
					$order => $widgetData,
				],
			]);

			$optionObject->Insert_option($dataInsert);
		}
		else
		{
			$pluginOption = $optionObject->getOptionValue_option('widget_'.$folderPlugin);
			
			$pluginOptionDatabase = decode_serialize($pluginOption);

			$pluginOptionDatabase[$widget][$order] = $widgetData;

			// Remove Widget dont exsits
			$sidebarsWidget = $optionObject->getOptionValue_option('sidebars_widget');
			$arraySidebarsWidget = decode_serialize($sidebarsWidget);
			$_arraySidebarsWidget = array_keys($arraySidebarsWidget);
			$_pluginOptionDatabase = array_keys($pluginOptionDatabase);
			
			foreach( $_pluginOptionDatabase as $_widget)
			{
				if( !in_array($_widget, $_arraySidebarsWidget) )
				{
					unset($pluginOptionDatabase[$_widget]);
				}
			}
			// End

			$optionObject->Update_option('widget_'.$folderPlugin,encode_serialize($pluginOptionDatabase));
		}

		return redirect('admin/widget/'.$widget.'/'.$folderPlugin.'/'.$order);
	}

	public function removeOrderAttribute(Request $request)
	{
		$optionObject = new Option;
		$data = $request->all();

		$widget = isset($data['widget']) ? $data['widget'] : null;
		$folderPlugin = isset($data['folderPlugin']) ? $data['folderPlugin'] : null;
		$order = isset($data['order']) ? $data['order'] : null;

		if( $widget == null || $folderPlugin == null || $order == null )
		{
			return null;
		}

		/*-- Check Input Variable --*/
		if( !$this->checkInputVariable($widget,$folderPlugin,$order) )
		{
			return null;
		}
		/*-- End Check Input Variable --*/

		$pluginOption = $optionObject->Get_option('widget_'.$folderPlugin);

		if( $pluginOption != null )
		{
			$pluginOption = $optionObject->getOptionValue_option('widget_'.$folderPlugin);
			
			$pluginOptionDatabase = decode_serialize($pluginOption);

			unset($pluginOptionDatabase[$widget][$order]);

			$optionObject->Update_option('widget_'.$folderPlugin,encode_serialize($pluginOptionDatabase));
		}
	}

	private function checkInputVariable($widget,$folderPlugin,$order)
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
		if( !array_key_exists($folderPlugin,$listPlugin) )
		{
			return false;
		}

		$sidebarsWidget = $optionObject->getOptionValue_option('sidebars_widget');
		$arraySidebarsWidget = decode_serialize($sidebarsWidget);

		if( !isset($arraySidebarsWidget[$widget][$order]) || $arraySidebarsWidget[$widget][$order] != $folderPlugin )
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

		$widgets = [];

		foreach( $listWidget as $widget )
		{
			$widgets[] = $widget['name'];
		}

		return $widgets;
	}

	private function getListPlugin()
	{
		$optionObject = new Option;
		$activedPlugins = decode_serialize($optionObject->getOptionValue_option('active_plugins'));

		$listPlugin = [];
		$directoryPlugins = list_files('system/plugins',1);

		foreach( $directoryPlugins as $directoryPlugin )
		{
			$fullDirectories = list_files(substr($directoryPlugin,0,-1),1);

			foreach( $fullDirectories as $fullDirectory  )
			{
				$directoryFilePlugin = str_replace('system/plugins/','',$fullDirectory);
				$_explode = explode('/',$fullDirectory);
				$fileName = $_explode[count($_explode)-1];
				$folderPlugin = $_explode[count($_explode)-2];
				$info = get_info($directoryPlugin,'Plugin Name',$fileName);
				if( $info !== null && strlen($info) > 0 && in_array($directoryFilePlugin,$activedPlugins) )
				{
					$listPlugin[$folderPlugin] = $info;
				}
			}
		}

		return $listPlugin;
	}
}
