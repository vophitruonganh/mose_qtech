<?php

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
if( !function_exists('product_modal_url')){
	function product_modal_url(){
		$html = '<div class="modal fade"><div class="modal-dialog" role="image"><div class="modal-content">';
      	$html .= '<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Thêm mới hình ảnh từ đường dẫn</h4></div>';
      	$html .= '<div class="modal-body"></div>';
      	$html .= '<div class="modal-footer"><button type="button" class="btn btn-link" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Lưu</button></div>';
    	$html .= '</div></div></div>';
    	return $html;
	}
}

/*
*  Set Image Size
*
*  This function will set image size from url
*
*  @type    function
*  @date    25/10/2016
*  @since   1.0.0
*
*  @param   string, string
*  @return  string
*/
if( !function_exists('set_image_size') ){
	function set_image_size($url='',$size='thumb')
	{
        if(!$url){return;}
		$_explode = explode('.',$url);
        $extension = $_explode[count($_explode)-1];
        unset($_explode[count($_explode)-1]);
        $justFileName = implode('.',$_explode);
        $allowSize = ['larger','medium','thumb'];
        if( !in_array($size,$allowSize) || $size == 'fullsize') $size = '';
        return $justFileName.'_'.$size.'.'.$extension;
	}
}

/*
*  Get Image Url
*
*  This function will get image url from id
*
*  @type    function
*  @date    25/10/2016
*  @since   1.0.0
*
*  @param   int
*  @return  string
*/
if( !function_exists('get_image_url') ){
    function get_image_url($id=0)
    {
        $attachment = DB::table('qm_attachment')->where('attachment_id',$id)->where('attachment_type','image')->first();
        if($attachment){
            return $attachment->attachment_url;
        }
        return;
    }
}

/*
*  Get Image
*
*  This function will get image url by size
*
*  @type    function
*  @date    25/10/2016
*  @since   1.0.0
*
*  @param   int or string
*  @return  string
*/
if( !function_exists('get_image') )
{
    function get_image($id=0,$size='')
    {
        $attachment = DB::table('qm_attachment')->where('attachment_id',$id)->where('attachment_type','image')->first();
        if($attachment){
            return set_image_size($attachment->attachment_url,$size);
        }
        return;
    }
}
?>