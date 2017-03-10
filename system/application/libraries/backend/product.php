<?php
if( !function_exists('product_modal_url') )
{
	function product_modal_url(){
		$html = '<div class="modal fade"><div class="modal-dialog" role="image"><div class="modal-content">';
      	$html .= '<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Thêm mới hình ảnh từ đường dẫn</h4></div>';
      	$html .= '<div class="modal-body"></div>';
      	$html .= '<div class="modal-footer"><button type="button" class="btn btn-link" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Lưu</button></div>';
    	$html .= '</div</div></div>';
    	return $html;
	}
}
?>