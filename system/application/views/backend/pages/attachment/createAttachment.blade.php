@extends('backend.layouts.default')
@section('titlePage','Thêm mới tập tin')
@section('content')
<?php 
    $heading = array(
        'heading_link' => url("admin/attachment"),
        'heading_link_text' => 'Danh sách tập tin',
        'heading_text' => 'Thêm mới',
    );
    $setion_heading = section_title($heading);
?>
    <div class="section-attachment" data-bind="load: Attachment.Create, load: Attachment.DeleteCreatePage">
        <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
        <form id="attachment-form" class="media-upload-form" action="{{ url('admin/attachment/create') }}" method="post" enctype="multipart/form-data">
            <div class="box-typical b-t-p">
                @include('backend.includes.token')
                <div id="plupload-upload-ui">
                    <div id="drag-drop-area" class="drop-zone">
                        <div class="drag-drop-inside">
                            <i class="font-icon material-icons md-20">cloud_upload</i>
                            <p class="drag-drop-info">Thả vào tập tin để tải lên</p>
                            <p class="drag-drop-buttons"><button id="plupload-browse-button" type="button" class="btn btn-primary waves-effect">Chọn tập tin</button></p>
                        </div>
                    </div>
                </div>
                <div id="media-items"></div>
            </div>
            <script type="text/javascript">
                var domain = "{{ str_replace('/','\/',url('/')) }}";
                var token = $('#page_token').val();
                var mUploaderInit = {
                    runtimes:"html5,flash,silverlight,html4",
                    browse_button:"plupload-browse-button",
                    container:"plupload-upload-ui",
                    drop_element:"drag-drop-area",
                    file_data_name:"file",
                    url:domain+"\/admin\/attachment\/create",
                    flash_swf_url:"http:\/\/mosecdn.com\/0\/0\/plupload\/Moxie.swf",
                    silverlight_xap_url:"http:\/\/mosecdn.com\/0\/0\/plupload\/Moxie.xap",
                    multipart_params:{
                        _token:""+token+"",
                        upload_type:"plupload",
                        upload_page:"attachment"
                    },
                    filters:{
                        max_file_size:"5242880b",
                        mime_types: [{title:"Image files", extensions : "jpg,gif,png,jpeg"},{title : "Document files", extensions : "doc,dot,docx,docm,dotx,dotm,docb,xls,xlt,xlm,xlsx,xlsm,xltx,xltm,xlsb,xla,xlam,xll,xlw"}]
                    }
                }
            </script>
        </form>
    </div>
@stop