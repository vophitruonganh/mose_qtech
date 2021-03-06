<?php
	function load_scripts()
    {
		$type = (isset($_GET['t']) ? $_GET['t'] : '');
		if(!in_array($type, ['common','module','main']))
			exit();
		$compress = 'gzip';
		$force_gzip = ( $compress && 'gzip');
		$expires_offset = 31536000; // 1 year
		$version ='0.1';

    	if ( isset( $_SERVER['HTTP_IF_NONE_MATCH'] ) && stripslashes( $_SERVER['HTTP_IF_NONE_MATCH'] ) === $version ) {
			$protocol = $_SERVER['SERVER_PROTOCOL'];
			if ( ! in_array( $protocol, array( 'HTTP/1.1', 'HTTP/2', 'HTTP/2.0' ) ) ) {
				$protocol = 'HTTP/1.0';
			}
			header( "$protocol 304 Not Modified" );
			exit();
		}
		$out = '';
		$out = get_curl('http://mosecdn.com/0/scripts.php?t='.$type);
		
		//header("Etag: $version");
		header('Content-Type: application/javascript; charset=UTF-8');
		//header('Expires: ' . gmdate( "D, d M Y H:i:s", time() + $expires_offset ) . ' GMT');
		//header("Cache-Control: public, max-age=$expires_offset");

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

		echo $out;
		exit;
    }

    function get_curl($url,$data=array(),$timeout=15)
    {
        $curl = curl_init();
        $header[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
        $header[] = "Accept-Language: en-u\s,en;q=0.5";
        $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
        $header[] = "Cache-Control: max-age=600";
        $header[] = "Connection: keep-alive";
        $header[] = "Keep-Alive: 115";
        $header[] = "Pragma: ";
        $agent = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)";
      
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, $agent);
        // curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_REFERER, 'http://google.com');
        curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
        curl_setopt($curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        if( $data )
        {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        //curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
      
        $html = curl_exec($curl);
      
        if( curl_errno($curl) )
        {
            return false;
        }
        curl_close($curl);
        return $html;
    }
    load_scripts();
?>