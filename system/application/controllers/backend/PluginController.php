<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

class PluginController extends BackendController
{
	public function index(Request $request)
	{
		$data = $request->all();
		$action_status = isset($data['action_status']) ? $data['action_status'] : '';
		$check = isset($data['check']) ? $data['check'] : [];
		if( $action_status == 'activate' && is_array($check) && count($check) > 0 ){
			foreach( $check as $value )d{
				$_explode = explode('::',$value);
				if( count($_explode) != 2 ){
					return redirect('admin/plugin');
				}
				$folderPlugin = $_explode[0];
				$fileNamePlugin = $_explode[1];
				$this->active($folderPlugin,$fileNamePlugin);
			}
			return redirect('admin/plugin');
		}

		if( $action_status == 'deactivate' && is_array($check) && count($check) > 0 ){
			foreach( $check as $value ){
				$_explode = explode('::',$value);
				if( count($_explode) != 2 ){
					return redirect('admin/plugin');
				}
				$folderPlugin = $_explode[0];
				$fileNamePlugin = $_explode[1];
				$this->deactive($folderPlugin,$fileNamePlugin);
			}
			return redirect('admin/plugin');
		}

		$listPlugin = $this->getListPlugin();
		$this->checkPlugin();

		return view('backend.pages.plugins.listPlugin',[
			'listPlugin' => $listPlugin,
		]);
	}

	public function create(){
    	return view('backend.pages.plugins.createPlugin',[
		]);
    }

	public function active($folderPlugin,$fileNamePlugin){
		$checkInputVariable = $this->checkInputVariable($folderPlugin,$fileNamePlugin);
		if( !$checkInputVariable ){
			return redirect('admin');
		}

		$activedPlugins = decode_serialize($this->m_option->getOptionValue_option('active_plugins'));

		if( !in_array($folderPlugin.'/'.$fileNamePlugin.'.php',$activedPlugins) ){
			$activedPlugins[] = $folderPlugin.'/'.$fileNamePlugin.'.php';
			$this->m_option->Update_option('active_plugins',encode_serialize($activedPlugins));
		}

		return redirect('admin/plugin');
	}

	public function deactive($folderPlugin,$fileNamePlugin){
		$checkInputVariable = $this->checkInputVariable($folderPlugin,$fileNamePlugin);
		if( !$checkInputVariable ){
			return redirect('admin');
		}

		$activedPlugins = decode_serialize($this->m_option->getOptionValue_option('active_plugins'));

		if( in_array($folderPlugin.'/'.$fileNamePlugin.'.php',$activedPlugins) ){
			$key = array_search($folderPlugin.'/'.$fileNamePlugin.'.php',$activedPlugins);
			unset($activedPlugins[$key]);
			$activedPlugins = array_values($activedPlugins);

			$this->m_option->Update_option('active_plugins',encode_serialize($activedPlugins));
		}

		return redirect('admin/plugin');
	}
	public function delete($folderPlugin,$fileNamePlugin,$deletaPluginData=null){
		$checkInputVariable = $this->checkInputVariable($folderPlugin,$fileNamePlugin);
		if( !$checkInputVariable ){
			return redirect('admin');
		}

    	return view('backend.pages.plugins.deletePlugin',[
    		'folderPlugin' => $folderPlugin,
    		'fileNamePlugin' => $fileNamePlugin,
    		'deletaPluginData' => $deletaPluginData,
		]);
    }
	public function destroy($folderPlugin,$fileNamePlugin,$deletaPluginData=null){
		$checkInputVariable = $this->checkInputVariable($folderPlugin,$fileNamePlugin);
		if( !$checkInputVariable ){
			return redirect('admin');
		}

		$checkDeactive = $this->checkDeactive($folderPlugin,$fileNamePlugin);
		if( !$checkDeactive ){
			return redirect('admin');
		}

		$sidebarsWidget = $this->m_option->getOptionValue_option('sidebars_widget');
		$arraySidebarsWidget = decode_serialize($sidebarsWidget);

		foreach( $arraySidebarsWidget as $widget => $listPlugins ){
			if( count($listPlugins) > 0 ){
				foreach( $listPlugins as $key => $value ){
					if( $folderPlugin == $value ){
						unset($arraySidebarsWidget[$widget][$key]);
					}
				}
			}
		}

		$this->m_option->Update_option('sidebars_widget',encode_serialize($arraySidebarsWidget));

		deleteDir('system\plugins\\'.$folderPlugin);

		if( $deletaPluginData !== null ){
			$this->m_option->Delete_option('widget_'.$folderPlugin);
		}

		return redirect('admin/plugin');
    }

    private function checkDeactive($folderPlugin,$fileNamePlugin)
    {
    	$activedPlugins = decode_serialize($this->m_option->getOptionValue_option('active_plugins'));
    	if( in_array($folderPlugin.'/'.$fileNamePlugin.'.php',$activedPlugins)){
    		return false;
    	}
    	return true;
    }

	private function getListPlugin()
	{
		$listPlugin = [];
		$activedPlugins = decode_serialize($this->m_option->getOptionValue_option('active_plugins'));

		$directoryPlugins = list_files('system/plugins',1);

		foreach( $directoryPlugins as $directoryPlugin ){
			$fullDirectories = list_files(substr($directoryPlugin,0,-1),1);
			foreach( $fullDirectories as $fullDirectory  ){
				$directoryFilePlugin = str_replace('system/plugins/','',$fullDirectory);
				$_explode = explode('/',$fullDirectory);
				$fileName = $_explode[count($_explode)-1];
				$folderPlugin = $_explode[count($_explode)-2];
				$pluginName = get_info($directoryPlugin,'Plugin Name',$fileName);
				$pluginUri = get_info($directoryPlugin,'Plugin URI',$fileName);
				$pluginDescription = get_info($directoryPlugin,'Description',$fileName);
				$pluginAuthor = get_info($directoryPlugin,'Author',$fileName);
				$pluginAuthorUri = get_info($directoryPlugin,'Author URI',$fileName);
				$pluginVersion = get_info($directoryPlugin,'Version',$fileName);

				if( $pluginName !== null && strlen($pluginName) > 0 ){
					$activedPlugin = 0;
					if( in_array($folderPlugin.'/'.$fileName,$activedPlugins) ){
						$activedPlugin = 1;
					}

					$listPlugin[] = [
						'pluginName' => $pluginName,
						'pluginUri' => $pluginUri,
						'pluginDescription' => $pluginDescription,
						'pluginAuthor' => $pluginAuthor,
						'pluginAuthorUri' => $pluginAuthorUri,
						'pluginVersion' => $pluginVersion,
						'folderPlugin' => $folderPlugin,
						'fileNamePlugin' => str_replace('.php','',$fileName),
						'activedPlugin' => $activedPlugin,
					];
				}
			}
		}

		return $listPlugin;
	}

	private function checkInputVariable($folderPlugin,$fileNamePlugin)
	{
		if( !file_exists('system/plugins/'.$folderPlugin.'/'.$fileNamePlugin.'.php') ){
			return false;
		}

		$info = get_info('system/plugins/'.$folderPlugin.'/','Plugin Name',$fileNamePlugin.'.php');
		if( strlen($info) == 0 ){
			return false;
		}

		return true;
	}

	private function checkPlugin(){
		$activedPlugins = decode_serialize($this->m_option->getOptionValue_option('active_plugins'));

		foreach( $activedPlugins as $key => $value ){
			$_explode = explode('/',$value);
			$folderPlugin = $_explode[0];
			$fileNamePlugin = $_explode[1];

			if( !file_exists('system/plugins/'.$value) ){
				unset($activedPlugins[$key]);
			}
			else{
				$info = get_info('system/plugins/'.$folderPlugin.'/','Plugin Name',$fileNamePlugin);
				if( strlen($info) == 0 ){
					unset($activedPlugins[$key]);
				}
			}
		}

		$this->m_option->Update_option('active_plugins',encode_serialize($activedPlugins));
	}
}
