<?php
class Bundles
{
    function build_local_bundles(){
        $file = isset($_GET['file']) ? $_GET['file'] : 'script';
        $type = isset($_GET['t']) ? $_GET['t'] : '';
        $out = ''; $name = '';
        $out = $this->get_local_files($file,$type);
        if($file == 'script'){
            if($type == 'main'){
                $name = 'main.js';
            }else if($type == 'common'){
                $name = 'common.js';
            }else if($type == 'module'){
                $name = 'module.js';
            } 
        }else {
            $name = 'styles.css';
        }
        if(!$name)
            return;
        $writefile = @fopen(dirname(__FILE__).'/'.$name,"w");
        @fwrite($writefile,$out);
        @fclose($writefile);
    }

    function load_local_bundles($version='0',$cache=false){
        $file = isset($_GET['file']) ? $_GET['file'] : 'script';
        $type = isset($_GET['t']) ? $_GET['t'] : '';
        
        $compress = 'gzip';
        $force_gzip = ( $compress && 'gzip');
        $expires_offset = 31536000; // 1 year
        //$version ='0.1';

        if ( isset( $_SERVER['HTTP_IF_NONE_MATCH'] ) && stripslashes( $_SERVER['HTTP_IF_NONE_MATCH'] ) === $version ) {
            $protocol = $_SERVER['SERVER_PROTOCOL'];
            if ( ! in_array( $protocol, array( 'HTTP/1.1', 'HTTP/2', 'HTTP/2.0' ) ) ) {
                $protocol = 'HTTP/1.0';
            }
            header( "$protocol 304 Not Modified" );
            exit();
        }
        $out = '';
        $out = $this->get_local_files($file,$type);
        if($file == 'script'){
            header('Content-Type: application/javascript; charset=UTF-8');
        }else {
             header('Content-Type: text/css; charset=UTF-8');
        }
        if($cache){
            header("Etag: $version");
            header('Expires: ' . gmdate( "D, d M Y H:i:s", time() + $expires_offset ) . ' GMT');
            header("Cache-Control: public, max-age=$expires_offset");
        }

        if ( $compress && ! ini_get('zlib.output_compression') && 'ob_gzhandler' != ini_get('output_handler') && isset($_SERVER['HTTP_ACCEPT_ENCODING']) ) {
            header('Vary: Accept-Encoding'); // Handle proxies
            if ( false !== stripos($_SERVER['HTTP_ACCEPT_ENCODING'], 'deflate') && function_exists('gzdeflate') && ! $force_gzip ) {
                header('Content-Encoding: deflate');
                $out = gzdeflate( $out, 3 );
            } elseif ( false !== stripos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') && function_exists('gzencode') ) {
                header('Content-Encoding: gzip');
                $out = gzencode( $out, 3 );
            }
        }

        return $out;
    }

    function set_local_scripts($type=''){
        $main_script = array(
            'jquery' => 'assets/plugins/jquery/jquery-3.0.0.min.js',
            'jquery-migrate' => 'assets/plugins/jquery/jquery-migrate-3.0.0.min.js',
        );
        $common_script = array(
            'tether' => 'assets/plugins/bootstrap/4.0.0-alpha.4/js/tether.min.js',
            'bootstrap' => 'assets/plugins/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js',
        );
        $module_script = array(
            'app'=> 'assets/plugins/backend/app.js',
        );
        if($type == 'main'){
            return $main_script;
        }else if($type == 'common'){
            return $common_script;
        }else if($type == 'module'){
            return $module_script;
        } 
    }
    function set_local_styles(){
        return array(
            'bootstrap' => 'assets/plugins/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css',
            'material-icon' => 'assets/plugins/material-icons/fonts.css',
            'style' => 'assets/themes/admin-light/style.css',
        );
    }

    function get_local_files($file='',$type='')
    {
        $dir = dirname(dirname(dirname(__FILE__))) . '/';
        $out = ''; $file_arr = '';
        if($file == 'script'){
            $file_arr = $this->set_local_scripts($type);
        }else {
            $file_arr = $this->set_local_styles();
        }
        foreach ( $file_arr as $k => $v ) {
            $path = $dir . $v;
            if(file_exists($path)){
                $out .= $this->read_local_files($path) . "\n";
            }
        }
        return $out;
    }
    
    function read_local_files($path)
    {   
        if (function_exists('realpath')) {
            $path = realpath( $path );
        }
        if ( !$path || !@is_file( $path ) ) {
            return '';
        }

        return @file_get_contents($path); 
    }
}
$bundles = new Bundles;
echo $bundles->load_local_bundles('1.0.0',false);
// $bundles->build_local_bundles();
?>