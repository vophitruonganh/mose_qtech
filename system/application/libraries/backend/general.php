<?php

/*
*  Constructor
*
*  This function will construct all the neccessary actions, filters and functions for the ACF plugin to work
*
*  @type    function
*  @date    23/06/2012
*  @since   1.0.0
*
*  @param   N/A
*  @return  N/A
*/

if( !function_exists('get_curl') ){
    function get_curl($url='',$data=array(),$timeout=15)
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
        //curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        //curl_setopt($curl, CURLOPT_REFERER, 'http://google.com');
        curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
        curl_setopt($curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        //curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        if( $data )
        {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        
        $html = curl_exec($curl);
        
        if( curl_errno($curl) )
        {
            return curl_errno($curl);
            return false;
        }
        curl_close($curl);
        return $html;
    }
}

/*-- Encode & Decode Serialized --*/
if( !function_exists('is_serialized') )
{
    function is_serialized( $data, $strict = true )
    {
        // if it isn't a string, it isn't serialized.
        if ( ! is_string( $data ) ) {
            return false;
        }
        $data = trim( $data );
        if ( 'N;' == $data ) {
            return true;
        }
        if ( strlen( $data ) < 4 ) {
            return false;
        }
        if ( ':' !== $data[1] ) {
            return false;
        }
        if ( $strict ) {
            $lastc = substr( $data, -1 );
            if ( ';' !== $lastc && '}' !== $lastc ) {
                return false;
            }
        } else {
            $semicolon = strpos( $data, ';' );
            $brace     = strpos( $data, '}' );
            // Either ; or } must exist.
            if ( false === $semicolon && false === $brace )
                return false;
            // But neither must be in the first X characters.
            if ( false !== $semicolon && $semicolon < 3 )
                return false;
            if ( false !== $brace && $brace < 4 )
                return false;
        }
        $token = $data[0];
        switch ( $token ) {
            case 's' :
                if ( $strict ) {
                    if ( '"' !== substr( $data, -2, 1 ) ) {
                        return false;
                    }
                } elseif ( false === strpos( $data, '"' ) ) {
                    return false;
                }
                // or else fall through
            case 'a' :
                case 'O' :
                    return (bool) preg_match( "/^{$token}:[0-9]+:/s", $data );
                case 'b' :
                case 'i' :
                case 'd' :
                    $end = $strict ? '$' : '';
                    return (bool) preg_match( "/^{$token}:[0-9.E-]+;$end/", $data );
        }
        return false;
    }
}

if( !function_exists('maybe_unserialize') )
{    
    function maybe_unserialize($original)
    {
        if (is_serialized($original))
            return @unserialize($original);
        return $original;
    }
}

if( !function_exists('decode_serialize') )
{    
    function decode_serialize($original='')
    {
        $arr = array();
        $arr = maybe_unserialize($original);
        if(!is_array($arr)) return false;
        $out_array = array();
        foreach($arr as $key => $value){
            if(is_serialized($value)){
                $out_array[$key] = decode_serialize($value);
            }else {
                $out_array[$key] = urldecode($value);
            }
        }
        if(!is_array($out_array)) return false;
        return $out_array;
    }
}

if( !function_exists('encode_serialize') )
{    
    function encode_serialize ($arr = array())
    {
        if(!is_array($arr)) return false;
        $out_array = array();
        foreach($arr as $key => $value){
            if(is_array($value)){
                $out_array[$key] = encode_serialize($value);
            }else {
                $out_array[$key] = urlencode($value);
            }
        }
        if(!is_array($out_array)) return false;
        return serialize($out_array);
    }
}
/*-- End Encode & Decode Serialized --*/


/*
*   Section Title
*
*  This function will display section title in page
*
*  @type    function
*  @date    25/10/2016
*  @since   1.0.0
*
*  @param   array
*  @return  string
*/
if( !function_exists('section_title') )
{  
    function section_title($html = array()){
        $output = '';
        if($html){
            $heading_group = ''; $link = ''; $title = ''; $sep = ''; $btn = '';
            if(isset($html['heading_link']) && isset($html['heading_link_text'])){
                $link = '<a href="'.$html['heading_link'].'" class="heading-link">'.$html['heading_link_text'].'</a>';
            }
            if(isset($html['heading_text'])){
                $title = '<span class="heading-text">'.$html['heading_text'].'</span>';
            }
            if($link){
                $sep = '<span class="sep">/</span>';
            }
            $heading_group = $link.$sep.$title;
            if(isset($html['heading_button'])){
                $btn = '<div class="heading-action pull-sm-right">'.$html['heading_button'].'</div>';
            }
            $output = '<div class="section-heading clearfix"><div class="heading-group pull-sm-left">'.$heading_group.'</div>'.$btn.'</div>';
        }
        return $output;
    }
}

/*
*  Seo Content
*
*  This function will show seo value hidden
*
*  @type    function
*  @date    25/10/2016
*  @since   1.0.0
*
*  @param   array
*  @return  string
*/
if( !function_exists('seo_content') )
{    
    function seo_content($seo_data = array())
    {
        $seo_url = isset($seo_data['seo_url']) ? $seo_data['seo_url'] : '';
        $seo_title = isset($seo_data['seo_title']) ? $seo_data['seo_title'] : '';
        $seo_description = isset($seo_data['seo_description']) ? $seo_data['seo_description'] : '';
        $seo_keyword = isset($seo_data['seo_keyword']) ? $seo_data['seo_keyword'] : '';
        $site_url  = DB::table('qm_option')->where('option_name','site_url')->first()->option_value;
        $site_title  = DB::table('qm_option')->where('option_name','site_title')->first()->option_value;
        if(!$site_url){
            $seo_url = '';
        }else {
            $seo_url = $site_url.'/'.$seo_url;
        }
        if(!$site_title){
            $site_title = '';
        }
        $seo_title = old('seo_title',$seo_title);
        $seo_description = old('seo_description',$seo_description);
        $seo_keyword = old('seo_keyword',$seo_keyword);
        $html = '<div id="snippet-preview" data-bind="load: Seo.SnippetForm, load: Seo.SnippetPreview"><input type="hidden" name="sp_seo_title" id="sp_seo_title" value="'.$seo_title.'" /><input type="hidden" name="sp_seo_site_title" id="sp_seo_site_title" value="'.$site_title.'" /><input type="hidden" name="sp_seo_url" id="sp_seo_url" value="'.$seo_url.'" /><input type="hidden" name="sp_seo_desc" id="sp_seo_desc" value="'.$seo_description.'" /><input type="hidden" name="sp_seo_keyword" id="sp_seo_keyword" value="'.$seo_keyword.'" /></div>';
        return $html;
    }
}

/*
*  Pagination
*
*  This function will setup pagination
*
*  @type    function
*  @date    25/10/2016
*  @since   1.0.0
*
*  @param   string, array
*  @return  string
*/
if( !function_exists('pagination') )
{
    function pagination($data='', $arr = array()){
        if($data){
            if($arr){
                $data = $data->appends($arr)->render();
                return '<div id="pagination">'.$data.'</div>';
            }
            $data = $data->render();
            return '<div id="pagination">'.$data.'</div>';
        }
        return '<div id="pagination"></div>';
    }
}

/*
*  Constructor
*
*  This function will construct all the neccessary actions, filters and functions for the ACF plugin to work
*
*  @type    function
*  @date    23/06/12
*  @since   1.0.0
*
*  @param   N/A
*  @return  N/A
*/

if( !function_exists('main_site_url') )
{    
    function main_site_url()
    {
    	$site_url  = DB::table('qm_option')->where('option_name','site_url')->first()->option_value;
    	return $site_url;
    }
}

if( !function_exists('get_excerpt') )
{    
    function get_excerpt( $str = '', $limit = '')
    {
    	//Cắt html
    	$str = strip_tags($str);
    	//Cắt khoảng trắng
    	$str = preg_replace('!\s+!',' ', $str );
    	//Lấy số từ
    	if($limit){
    		 $str = word_limiter($str, $limit);
    	}
    	return $str;
    }
}

/*-- Word Limiter --*/
if( !function_exists('word_limiter') )
{
	function word_limiter($str, $limit = 100, $end_char = '&#8230;')
	{
		if (trim($str) === '')
		{
			return $str;
		}

		preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);

		if (strlen($str) === strlen($matches[0]))
		{
			$end_char = '';
		}

		return rtrim($matches[0]).$end_char;
	}
}
/*-- End Word Limiter --*/
if( !function_exists('get_currency') )
{    
    function get_currency($type = 2)
    {
        if($type ==1){
            return '<span class="currency-symbols" data-type="USD">$</span>';
        }
        return '<span class="currency-symbols" data-type="VND">&#8363;</span>';
    }
}


?>