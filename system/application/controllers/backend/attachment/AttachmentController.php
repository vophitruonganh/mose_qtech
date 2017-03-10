<?php

namespace App\Http\Controllers\backend\attachment;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;
/*
 * Use Library of Laravel
 */
use App\Models\Attachment;
use App\Models\Option;
use Validator;
use DB;
use App\Libraries\Uploads;
use App\Config\InfoStore;
use Session;

class AttachmentController extends BackendController
{
    public function index(Request $request)
    {
        $data = $request->all();

        $search = ( isset($data['search']) ) ? $data['search'] : '';
        $select_action = ( isset($data['select_action']) ) ? $data['select_action'] : '';
        $check = isset($data['check']) ? $data['check'] : [];
        $mode = ( isset($_COOKIE['VSAttachment']) ) ? $_COOKIE['VSAttachment'] : 'grid';
        if($mode != 'list'){
            $mode = 'grid';
        }
        if( $request->isMethod('post') && $request->ajax())
        {
            $mode = ( isset($data['mode']) ) ? $data['mode'] : 'grid';
            $attachment_id = ( isset($data['attachment_id']) ) ? $data['attachment_id'] : '';
            if($mode != 'list'){ $mode = 'grid'; }
            $count = count($check);
            if( $select_action == 'edit' && $count)
            {
                $output = Array('Response'=>'True','Redirect'=>url('admin/attachment/edit/'.$check[0]),'Page'=>'','List'=>'');
                return $output;
            }else if( $select_action == 'trash' && $count){
                foreach( $check as $v )
                {
                    $this->destroy($v,$request);
                }
            }else if($select_action == 'trash' && $attachment_id){
                $this->destroy($attachment_id,$request);
            }

            $attachments = $this->attachmentActionSearch($search);
            return $this->attachmentView($attachments,$select_action,$mode,$search);
        }else {
            /*-- Edit --*/
            if($select_action){
                $count = count($check);
                if( $select_action == 'edit' && $count)
                {
                    return redirect('admin/attachment/edit/'.$check[0]);
                }
                if( $select_action == 'trash' && $count)
                {
                    foreach( $check as $v )
                    {
                        $this->destroy($v,$request);
                    }
                }
                return redirect('admin/attachment');
            }
            /*-- Search Without Ajax --*/
            $attachmentsPage = array();
            if($search)
            {
                $attachmentsPage['search'] = $search;
            }
            $attachments = $this->attachmentActionSearch($search);

            return view('backend.pages.attachment.listAttachment',[
                'attachments' => $attachments,
                'mode' => $mode,
                'pagination' => $attachmentsPage,
                'search' => $search,
            ]);
            /*-- End Search Without Ajax --*/
        }
    }
    private function attachmentActionSearch($search='')
    {
        $attachmentObject = new Attachment;
        if($search)
        {
            $attachments = $attachmentObject->search_attachment('attachment_id','DESC','attachment_title',$search);
        }else {
            $attachments = $attachmentObject->search_attachment('attachment_id','DESC',null,null);
        }
        return $attachments;
    }
    private function attachmentView($attachments,$select_action='',$mode='grid',$search='')
    {
        $objdata = Array('Response'=>'False','Page'=>'','List'=>'');
        $viewmode = view('backend.pages.attachment.viewGridAttachment',[
                'attachments' => $attachments
        ]);
        $objdata['Page'] = urlencode($attachments->render());
        if($mode == 'list'){
            $viewmode = view('backend.pages.attachment.viewListAttachment',[
                'attachments' => $attachments
            ]);
        }
        if($search){
            $objdata['Page'] = urlencode($attachments->appends(array('search' => $search))->render());
        }
        $objdata['List'] = urlencode($viewmode);
        if($objdata['List']){
            $objdata['Response'] = 'True';
        }
        if($select_action == 'trash'){
            $objdata['Message'] = 'Xóa tập tin thành công!';
        }
        return $objdata;
    }
    public function create()
    {
        return view('backend.pages.attachment.createAttachment');
    }

    public function store(Request $request)
    {
        $optionObject = new Option;
        $data = $request->all();
        $select_action = ( isset($data['select_action']) ) ? $data['select_action'] : '';
        $upload_type = ( isset($data['upload_type']) ) ? $data['upload_type'] : '';
        $upload_page = ( isset($data['upload_page']) ) ? $data['upload_page'] : '';

        if($select_action == 'trash'){
            $data['attachment_id'] = ( isset($data['attachment_id']) ) ? $data['attachment_id'] : '';
            if($data['attachment_id'])
                return $this->destroy($data['attachment_id'],$request);
        }

        /*-- Validator --*/
        $validator = Validator::make($data,[
            'file' => 'required|mimes:jpg,gif,png,jpeg,doc,dot,docx,docm,dotx,dotm,docb,xls,xlt,xlm,xlsx,xlsm,xltx,xltm,xlsb,xla,xlam,xll,xlw|max:5242',
        ],[
            'file.required' => 'Bạn cần phải chọn tập tin',
            'file.mimes' => 'Tập tin của bạn phải là hình ảnh,word,excel',
            'file.max' => 'Tập tin upload có kích thước tối đa là 5 Mb',
        ]);

        if( $validator->fails() )
        {
            $messages = $validator->errors();
            if($request->ajax()){
                return '<div class="alert alert-danger" role="alert"><div classs="uploading-error">'.$messages->first('file').'</div></div>';
            }else {
                return redirect('admin/attachment/create')->withErrors($validator)->withInput();
            }
        }
        /*-- End Validator --*/

        /*-- Upload Image To Host Image --*/
        $uploads = new Uploads();
        $uploads->case = 'uploadFile';
        $infoStore = new InfoStore();
        $uploads->idStore = $infoStore->idStore;
        $uploads->token = $infoStore->token;
        $uploads->isImage = 'false';

        $arrayImages = [
            'image/jpeg',
            'image/gif',
            'image/png',
        ];
        if( in_array($data['file']->getMimeType(),$arrayImages) )
        {
            $uploads->isImage = 'true';

            $thumbnail_size_w = $optionObject->getOptionValue_option('thumbnail_size_w');
            $thumbnail_size_h = $optionObject->getOptionValue_option('thumbnail_size_h');
            $medium_size_w = $optionObject->getOptionValue_option('medium_size_w');
            $medium_size_h = $optionObject->getOptionValue_option('medium_size_h');
            $large_size_w = $optionObject->getOptionValue_option('large_size_w');
            $large_size_h = $optionObject->getOptionValue_option('large_size_h');


            $uploads->thumbImage = $thumbnail_size_w.'x'.$thumbnail_size_h;
            $uploads->mediumImage = $medium_size_w.'x'.$medium_size_h;
            $uploads->largerImage = $large_size_w.'x'.$large_size_h;
        }

        $fileName = $data['file']->getClientOriginalName();
        $_explode = explode('.',$fileName);
        $extension = $_explode[count($_explode)-1];
        unset($_explode[count($_explode)-1]);
        $justFileName = str_slug(implode('.',$_explode),'_');
        $fileName = $justFileName.'.'.$extension;
        $_jsonResultUpload = $uploads->imageUpload($data['file']->getPathName(),$fileName);
        $_arrayresultUpload = json_decode($_jsonResultUpload, true);
        //dd($_arrayresultUpload);
        if( $_arrayresultUpload['Response'] === 'True' )
        {
            /*-- Get Return FileName From Result Of Json Upload --*/
            $fileName = $_arrayresultUpload['FileName'];
            /*-- End Get Return FileName From Result Of Json Upload --*/

            /*-- Get Return UrlImage From Result Of Json Upload --*/
            $urlImage = $_arrayresultUpload['UrlImage'];
            /*-- End Get Return UrlImage From Result Of Json Upload --*/
        }
        else
        {
            // $validator->getMessageBag()->add('file','Upload không thành công, xin vui lòng thử lại');
            // return redirect('admin/attachment/create')->withErrors($validator)->withInput();
            if($request->ajax()){
                return '<div class="alert alert-danger" role="alert"><p classs="uploading-error">Upload không thành công, vui lòng thử lại</p></div>';
            }else {
                return redirect('admin/attachment/create')->withErrors($validator)->withInput();
            }

        }
        /*-- End Upload Image To Host Image --*/

        $time = time();

        $attachment = new Attachment;
        $dataInsert = [];

        /*-- Just Get File Name ( Except Extension ) --*/
        $_explode = explode('.',$fileName);
        unset($_explode[count($_explode)-1]);
        $titleFileName = implode('.',$_explode);
        /*-- End Just Get File Name ( Except Extension ) --*/

        // $attachment->attachment_title = $titleFileName;
        $dataInsert['attachment_title'] = $titleFileName;
        // $attachment->attachment_url = $urlImage;
        $dataInsert['attachment_url'] = $urlImage;
        // $attachment->attachment_name = $fileName;
        $dataInsert['attachment_name'] = $fileName;
        // $attachment->attachment_content = '';
        $dataInsert['attachment_content'] = '';
        // $attachment->attachment_mime_type = $data['file']->getMimeType();
        $dataInsert['attachment_mime_type'] = $data['file']->getMimeType();

        /*-- Process variable $attachment->attachment_type --*/
        $attachmentAllType = [
            'image' => [
                'image/jpeg',
                'image/gif',
                'image/png',
            ],
            'word' => [
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            ],
            'excel' => [
                'application/excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ],
        ];

        $attachmentType = null;
        foreach($attachmentAllType as $k => $v)
        {
            if( in_array($data['file']->getMimeType(),$v) )
            {
                $attachmentType = $k;
                break;
            }
        }
        //$attachment->attachment_type = $attachmentType;
        $dataInsert['attachment_type'] = $attachmentType;
        /*-- End Process variable $attachment->attachment_type --*/

        //$attachment->attachment_date = $time;
        $dataInsert['attachment_date'] = $time;
        //$attachment->user_id = Session::get('user_id');
        $dataInsert['user_id'] = Session::get('user_id');

        //$attachment->save();
        $attachment->insert_attachment($dataInsert);

        /*
         * ADD DATABASE LOG
         */
        $attachmentID = $attachment->max('attachment_id');
        addTableLog("App\Models\Logs", Session::get('user_id'), 'attach', __FUNCTION__, "0,$attachmentID,0");
        /* END SAVE DATABASE LOG */


        if($attachmentType == 'word'){
            $urlImage = url('template/admin/images/attachment/document.png');
        }else if($attachmentType == 'excel'){
            $urlImage = url('template/admin/images/attachment/spreadsheet.png');
        }

        if($upload_type)
        {
            $output = '';
            if($upload_page == 'post'){
                $output .= '<li class="attachment-item">';
            }else {
                $output .= '<div class="uploading-item-name clearfix"><div class="pinkynail"><div class="thumbnail"><div class="centered"><img src="'.$urlImage.'" alt="" /></div></div></div><span class="filename new">'.$attachment->attachment_title.'</span></div>';
                $output .= '<div class="uploading-item-action"><a class="attacment-edit" href="'.url('admin/attachment/edit/'.$attachmentID).'" target="_blank" title="Chỉnh sửa"><label class="sr-only">Chỉnh sửa</label><i class="material-icons md-18">mode_edit</i></a>';
                $output .= '<a class="attacment-delete" data-id="'.$attachmentID.'" href="'.url('admin/attachment/delete/'.$attachmentID).'" target="_blank" title="Xóa"><label class="sr-only">Xóa</label><i class="material-icons md-18">delete</i></a></div>';
            }
            return $output;
        }
        else
        {
            return redirect('admin/attachment');
        }
    }

    public function edit($idAttachment)
    {
        $attachmentObject = new Attachment;
        //$attachment = Attachment::where('attachment_id',$idAttachment)->join('qm_user','qm_attachment.user_id','=','qm_user.user_id')->first();
        $attachment = $attachmentObject->getAndJoinUser_attachment($idAttachment)->first();

        if( count($attachment) == 0 )
        {
            return redirect('admin/attachment');
        }

        return view('backend.pages.attachment.editAttachment',[
            'attachment' => $attachment,
        ]);
    }

    public function update($idAttachment,Request $request)
    {
        $attachmentObject = new Attachment;
        $data = $request->all();
        $dataUpdate = [];

        $attachment = $attachmentObject->get_attachment($idAttachment)->first();

        if(!$attachment)
        {
            if($request->ajax()){
                return '{"Response":"False","Message":"Không tìm thấy tập tin chỉnh sửa"}';
            }else {
                return redirect('admin/attachment');
            }
        }

        if( strlen($data['title']) == 0 && !isset($data['file']) )
        {
            /*-- Just Get File Name ( Except Extension ) --*/
            $_explode = explode('.',$attachment->attachment_name);
            unset($_explode[count($_explode)-1]);
            $titleFileName = implode('.',$_explode);
            /*-- End Just Get File Name ( Except Extension ) --*/

            $data['title'] = $titleFileName;
        }

        $dataUpdate['attachment_id'] = $idAttachment;
        $dataUpdate['attachment_title'] = $data['title'];
        $dataUpdate['attachment_content'] = $data['content'];

        //DB::table('qm_attachment')->where('attachment_id',$idAttachment)->update($dataUpdate);
        $attachmentObject->update_attachment($dataUpdate);

		/*
         * ADD DATABASE LOG
         */
        //addTableLog("App\Models\Logs", Session::get('user_id'), 'attach', __FUNCTION__, "0,$idAttachment,0");
        /* END SAVE DATABASE LOG */
        if($request->ajax()){
            return '{"Response":"True","Redirect":"'.url('admin/attachment/edit/'.$idAttachment).'"}';
        }else {
            return redirect('admin/attachment/edit/'.$idAttachment);
        }
    }

    public function destroy($idAttachment,Request $request)
    {
        $attachmentObject = new Attachment;
        $attachment = $attachmentObject->get_attachment($idAttachment)->first();

        if(!$attachment)
        {
            if($request->ajax()){
                return '{"Response":"False","Message":"Xóa tập tin thất bại"}';
            }else {
                return redirect('admin/attachment');
            }
        }

        /*-- Delete Old Image --*/
        $deleteFile = new Uploads();
        $deleteFile->case = 'deleteFile';
        $infoStore = new InfoStore();
        $deleteFile->idStore = $infoStore->idStore;
        $deleteFile->token = $infoStore->token;
        //$_jsonResultDeleteFile = $deleteFile->deleteFile($attachment->attachment_url);
        $deleteFile->deleteFile($attachment->attachment_url);
        /*-- End Delete Old Image --*/

        DB::table('qm_attachment')->where('attachment_id',$idAttachment)->delete();
        $attachmentObject->delete_attachment($idAttachment);

		/*
         * ADD DATABASE LOG
         */
        //addTableLog("App\Models\Logs", Session::get('user_id'), 'attach', __FUNCTION__, "0,$idAttachment,0");
        /* END SAVE DATABASE LOG */
        if($request->ajax()){
            return '{"Response":"True","Message":"Xóa tập tin thành công."}';
        }else {
            return redirect('admin/attachment');
        }
    }
    public function uploadImageUrl(Request $request)
    {
        if($request->isMethod('post') && $request->ajax()){
            return 'http://mosecdn.com/0/1/logo.png';
        }
    }
    public function getListImage(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $search = ( isset($data['search']) ) ? $data['search'] : '';
            $arr = array(); $html = '';
            $attachment = new Attachment;
            $get_attachment = $attachment->get_attachment_image($search);
            if($get_attachment) {
                $html = $get_attachment;
            }
            return $html;
        }
    }

    public function quickCreate(Request $request)
    {
        $data = $request->all();

        $optionObject = new Option;
        $uploads = new Uploads();
        $uploads->case = 'uploadFile';
        $infoStore = new InfoStore();
        $uploads->idStore = $infoStore->idStore;
        $uploads->token = $infoStore->token;
        $uploads->isImage = 'false';

        $arrayImages = [
            'image/jpeg',
            'image/gif',
            'image/png',
        ];
        if( in_array($data['file']->getMimeType(),$arrayImages) )
        {
            $uploads->isImage = 'true';

            $thumbnail_size_w = $optionObject->getOptionValue_option('thumbnail_size_w');
            $thumbnail_size_h = $optionObject->getOptionValue_option('thumbnail_size_h');
            $medium_size_w = $optionObject->getOptionValue_option('medium_size_w');
            $medium_size_h = $optionObject->getOptionValue_option('medium_size_h');
            $large_size_w = $optionObject->getOptionValue_option('large_size_w');
            $large_size_h = $optionObject->getOptionValue_option('large_size_h');


            $uploads->thumbImage = $thumbnail_size_w.'x'.$thumbnail_size_h;
            $uploads->mediumImage = $medium_size_w.'x'.$medium_size_h;
            $uploads->largerImage = $large_size_w.'x'.$large_size_h;
        }

        $fileName = $data['file']->getClientOriginalName();
        $_explode = explode('.',$fileName);
        $extension = $_explode[count($_explode)-1];
        unset($_explode[count($_explode)-1]);
        $justFileName = str_slug(implode('.',$_explode),'_');
        $fileName = $justFileName.'.'.$extension;
        $_jsonResultUpload = $uploads->imageUpload($data['file']->getPathName(),$fileName);
        $_arrayresultUpload = json_decode($_jsonResultUpload, true);
        //dd($_arrayresultUpload);
        if( $_arrayresultUpload['Response'] === 'True' )
        {
            /*-- Get Return FileName From Result Of Json Upload --*/
            $fileName = $_arrayresultUpload['FileName'];
            /*-- End Get Return FileName From Result Of Json Upload --*/

            /*-- Get Return UrlImage From Result Of Json Upload --*/
            $urlImage = $_arrayresultUpload['UrlImage'];
            /*-- End Get Return UrlImage From Result Of Json Upload --*/
        }
        else
        {
            // Error
            return;
        }

        $time = time();

        $attachment = new Attachment;
        $dataInsert = [];

        /*-- Just Get File Name ( Except Extension ) --*/
        $_explode = explode('.',$fileName);
        unset($_explode[count($_explode)-1]);
        $titleFileName = implode('.',$_explode);
        /*-- End Just Get File Name ( Except Extension ) --*/

        // $attachment->attachment_title = $titleFileName;
        $dataInsert['attachment_title'] = $titleFileName;
        // $attachment->attachment_url = $urlImage;
        $dataInsert['attachment_url'] = $urlImage;
        // $attachment->attachment_name = $fileName;
        $dataInsert['attachment_name'] = $fileName;
        // $attachment->attachment_content = '';
        $dataInsert['attachment_content'] = '';
        // $attachment->attachment_mime_type = $data['file']->getMimeType();
        $dataInsert['attachment_mime_type'] = $data['file']->getMimeType();

        /*-- Process variable $attachment->attachment_type --*/
        $attachmentAllType = [
            'image' => [
                'image/jpeg',
                'image/gif',
                'image/png',
            ],
            'word' => [
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            ],
            'excel' => [
                'application/excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ],
        ];

        $attachmentType = null;
        foreach($attachmentAllType as $k => $v)
        {
            if( in_array($data['file']->getMimeType(),$v) )
            {
                $attachmentType = $k;
                break;
            }
        }
        //$attachment->attachment_type = $attachmentType;
        $dataInsert['attachment_type'] = $attachmentType;
        /*-- End Process variable $attachment->attachment_type --*/

        //$attachment->attachment_date = $time;
        $dataInsert['attachment_date'] = $time;
        //$attachment->user_id = Session::get('user_id');
        $dataInsert['user_id'] = Session::get('user_id');

        //$attachment->save();
        $attachment->insert_attachment($dataInsert);

        /*
         * ADD DATABASE LOG
         */
        $attachmentID = $attachment->max('attachment_id');
        addTableLog("App\Models\Logs", Session::get('user_id'), 'attach', __FUNCTION__, "0,$attachmentID,0");
        /* END SAVE DATABASE LOG */


        return $urlImage;
    }
}