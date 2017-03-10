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
        
        // $data['type'] = ( isset($data['type']) ) ? $data['type'] : 'all';
        // $arrayType = [
        //     'all',
        //     'document',
        //     'image'
        // ];
        // if( !in_array($data['type'],$arrayType) )
        // {
        //     $data['type'] = 'all';
        // }
        
        if( $request->isMethod('get') )
        {
            $mode = ( isset($_COOKIE['view_attachment']) ) ? $_COOKIE['view_attachment'] : null;
            $data['search'] = ( isset($data['search']) ) ? $data['search'] : '';
            if($data['search'])
            {
                $attachments = Attachment::orderBy('attachment_id','DESC')->where('attachment_title','like','%'.$data['search'].'%')->paginate(10);
                $attachmentsPage = $attachments->appends(array('search' => $data['search']))->render();
            }else {
                $attachments = Attachment::orderBy('attachment_id','DESC')->paginate(10);
                $attachmentsPage = $attachments->render();
            }
            if($mode != 'list')
                $mode = 'grid';
            return view('backend.pages.attachment.list',[
                'attachments' => $attachments,
                'mode' => $mode,
                'pagination' => $attachmentsPage
            ]);
        }
        
        elseif( $request->isMethod('post') )
        {
            // if( $data['type'] == 'all' )
            // {
            //     if( isset($data['search']) )
            //     {
            //         $attachments = Attachment::orderBy('attachment_id','DESC')->where('attachment_title','like','%'.$data['search'].'%')->paginate(10);
            //         $attachments->render();
            //     }
            //     else
            //     {
            //         $attachments = Attachment::orderBy('attachment_id','DESC')->paginate(10);
            //         $attachments->render();
            //     }
            // }
            // elseif( $data['type'] == 'document' )
            // {   
            //     $attachments = Attachment::orderBy('attachment_id','DESC')->whereIn('attachment_type',[
            //         'word',
            //         'excel',
            //     ])->paginate(10);
            // }
            // else // $data['type'] == 'image'
            // {
            //     //$attachments = Attachment::orderBy('attachment_id','DESC')->where('attachment_type','image')->paginate(10);
            // }
            if( $request->ajax()) {
                $data['attachment_id'] = ( isset($data['attachment_id']) ) ? $data['attachment_id'] : '';
                $data['search'] = ( isset($data['search']) ) ? $data['search'] : '';
                $data['mode'] = ( isset($data['mode']) ) ? $data['mode'] : 'grid';
                if($data['attachment_id'])
                    $this->destroy($data['attachment_id'],$request);
                if($data['search'])
                {
                    $attachments = Attachment::orderBy('attachment_id','DESC')->where('attachment_title','like','%'.$data['search'].'%')->paginate(10);
                }else {
                    $attachments = Attachment::orderBy('attachment_id','DESC')->paginate(10);
                }
                if($data['mode'] != 'list')
                    $data['mode'] = 'grid';
                return $this->listAction($attachments,$data['mode'],$data['search']);
            }
        }
    }
    public function listAction($attachments,$mode='grid',$search='')
    {
        $viewmode = '';
        $objdata = Array('Response'=>'True','Error'=>'Cập nhật dữ liệu không thành công','Page'=>'','List'=>'');
        if($mode == 'list'){
            $viewmode = view('backend.pages.attachment.viewList',[
                'attachments' => $attachments
            ]);
        }else {
            $viewmode = view('backend.pages.attachment.viewGrid',[
                'attachments' => $attachments
            ]);
        }
        if($search){
            $objdata['Page'] = urlencode($attachments->appends(array('search' => $search))->render());
        }else {
            $objdata['Page'] = urlencode($attachments->render());
        }
        $objdata['List'] = urlencode($viewmode);
        if($objdata['List']){
            $objdata['Response'] = 'True';
            $objdata['Error'] = '';
        }else {
            $objdata['Response'] = 'False';
        }
        return $objdata;
    }
    public function create()
    {
        return view('backend.pages.attachment.create');
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        
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
            return '<div class="alert alert-danger" role="alert"><div classs="uploading-error">'.$messages->first('file').'</div></div>';
            //return redirect('admin/attachment/create')->withErrors($validator)->withInput();
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
            $uploads->thumbImage = Option::where([
                'option_name' => 'size_thumb_image',
            ])->first()->option_value;
            $uploads->mediumImage = Option::where([
                'option_name' => 'size_medium_image',
            ])->first()->option_value;
            $uploads->largerImage = Option::where([
                'option_name' => 'size_larger_image',
            ])->first()->option_value;
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
            return '<div class="alert alert-danger" role="alert"><p classs="uploading-error">Upload không thành công, vui lòng thử lại</p></div>';
        }
        /*-- End Upload Image To Host Image --*/
        
        $time = time();
        
        $attachment = new Attachment;
        
        /*-- Just Get File Name ( Except Extension ) --*/
        $_explode = explode('.',$fileName);
        unset($_explode[count($_explode)-1]);
        $titleFileName = implode('.',$_explode);
        /*-- End Just Get File Name ( Except Extension ) --*/
        
        //$attachment->attachment_title = $fileName;
        $attachment->attachment_title = $titleFileName;
        $attachment->attachment_url = $urlImage;
        
        $attachment->attachment_name = $fileName;
        $attachment->attachment_content = '';
        $attachment->attachment_mime_type = $data['file']->getMimeType();
        
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
        $attachment->attachment_type = $attachmentType;
        /*-- End Process variable $attachment->attachment_type --*/
        
        $attachment->attachment_date = $time;
        $attachment->user_id = Session::get('user_id');
        
        $attachment->save();
        
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

        if( isset($data['upload_type']) )
        {
            $output = '';
            $output .= '<div class="uploading-item-name clearfix"><div class="pinkynail"><div class="thumbnail"><div class="centered"><img src="'.$urlImage.'" alt="" /></div></div></div><span class="filename new">'.$attachment->attachment_title.'</span></div>';
            $output .= '<div class="uploading-item-action"><a class="attacment-edit" href="'.url('admin/attachment/edit/'.$attachmentID).'" target="_blank" title="Chỉnh sửa"><label class="sr-only">Chỉnh sửa</label><span class="dashicons dashicons-edit"></span></a>';
            $output .= '<a class="attacment-delete" data-id="'.$attachmentID.'" href="'.url('admin/attachment/delete/'.$attachmentID).'" target="_blank" title="Xóa"><label class="sr-only">Xóa</label><span class="dashicons dashicons-no"></span></a></div>';
            return $output;            
        }
        else
        {
            return redirect('admin/attachment');
        } 
    }
    
    public function edit($idAttachment)
    {
        $attachment = Attachment::where('attachment_id',$idAttachment)->join('qm_user','qm_attachment.user_id','=','qm_user.user_id')->first();
        
        if( count($attachment) == 0 )
        {
            return redirect('admin/attachment');
        }
        
        return view('backend.pages.attachment.edit',[
            'attachment' => $attachment,
        ]);
    }
    
    public function update($idAttachment,Request $request)
    {
        $data = $request->all();
        
        /*-- Validator --*/
        $validator = Validator::make($data,[
            'file' => 'mimes:jpeg,jpg,png,gif,xls,xlsx,doc,docx|max:5000',
        ],[
            'file.mimes' => 'Tập tin của bạn phải là hình ảnh,word,excel',
            'file.max' => 'Tập tin upload có kích thước tối đa là 5 Mb',
        ]);
        
        if( $validator->fails() )
        {
            return redirect('/admin/attachment/edit/'.$idAttachment)->withErrors($validator)->withInput();
        }
        /*-- End Validator --*/
        
        $time = time();
        $dataUpdate = [];
        
        $attachment = Attachment::where('attachment_id',$idAttachment)->first();
        if( count($attachment) == 0 )
        {
            return redirect('admin/attachment');
        }
        
        if( strlen($data['title']) == 0 && !isset($data['file']) )
        {
            $data['title'] = $attachment->attachment_name;
        }
        
        $dataUpdate['attachment_content'] = $data['content'];
        
        /*-- If User Have Upload File --*/
        if( isset($data['file']) )
        {
            /*-- Upload Image To Host Image And Delete Old Image --*/
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
                $uploads->thumbImage = Option::where([
                    'option_name' => 'size_thumb_image',
                ])->first()->option_value;
                $uploads->mediumImage = Option::where([
                    'option_name' => 'size_medium_image',
                ])->first()->option_value;
                $uploads->largerImage = Option::where([
                    'option_name' => 'size_larger_image',
                ])->first()->option_value;
            }
            
            $fileName = $data['file']->getClientOriginalName();
            $_explode = explode('.',$fileName);
            $extension = $_explode[count($_explode)-1];
            unset($_explode[count($_explode)-1]);
            $justFileName = str_slug(implode('.',$_explode),'_');
            $fileName = $justFileName.'.'.$extension;
            $_jsonResultUpload = $uploads->imageUpload($data['file']->getPathName(),$fileName);
            $_arrayresultUpload = json_decode($_jsonResultUpload, true);
            if( $_arrayresultUpload['Response'] === 'True' )
            {
                /*-- Get Return FileName From Result Of Json Upload --*/
                $fileName = $_arrayresultUpload['FileName'];
                /*-- End Get Return FileName From Result Of Json Upload --*/
                
                /*-- Get Return UrlImage From Result Of Json Upload --*/
                $urlImage = $_arrayresultUpload['UrlImage'];
                /*-- End Get Return UrlImage From Result Of Json Upload --*/
                
                /*-- Delete Old Image --*/
                $deleteFile = new Uploads();
                $deleteFile->case = 'deleteFile';
                $infoStore = new InfoStore();
                $deleteFile->idStore = $infoStore->idStore;
                $deleteFile->token = $infoStore->token;
                //$_jsonResultDeleteFile = $deleteFile->deleteFile($attachment->attachment_url);
                $deleteFile->deleteFile($attachment->attachment_url);
                /*-- End Delete Old Image --*/
                
                $dataUpdate['attachment_url'] = $urlImage;
            }
            else
            {
                // $validator->getMessageBag()->add('file','Upload không thành công, xin vui lòng thử lại');
                // return redirect('admin/attachment/create')->withErrors($validator)->withInput();
                return '<p>Upload không thành công, vui lòng thử lại</p>';
            }
            /*-- End Upload Image To Host Image And Delete Old Image --*/
            
            $dataUpdate['attachment_name'] = $fileName;
            
            $mineType = $data['file']->getMimeType();
            $dataUpdate['attachment_mime_type'] = $mineType;
            
            /*-- Process variable $attachment->attachment_type --*/
            $attachmentAllType = [
                'image' => [
                    'image/jpeg',
                    'image/gif',
                    'image/png',
                ],
                'word' => [
                    'application/msword',
                ],
                'excel' => [
                    'application/excel',
                ],
            ];
            
            $attachmentType = null;
            foreach($attachmentAllType as $k => $v)
            {
                if( in_array($mineType,$v) )
                {
                    $attachmentType = $k;
                    break;
                }
            }
            $dataUpdate['attachment_type'] = $attachmentType;
            /*-- End Process variable $attachment->attachment_type --*/
            
            if( strlen($data['title']) == 0 )
            {
                $data['title'] = $fileName;
            }
        }
        /*-- End If User Have Upload File --*/
        
        $dataUpdate['attachment_title'] = $data['title'];
        $dataUpdate['attachment_date'] = $time;
        $dataUpdate['user_id'] = Session::get('user_id');
        
        DB::table('qm_attachment')->where('attachment_id',$idAttachment)->update($dataUpdate);
        
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'attach', __FUNCTION__, "0,$idAttachment,0");
        /* END SAVE DATABASE LOG */
        
        if( $request->ajax() )
        {
            return '{"Response":"True","Message":"Đã cập nhật thành công"}';
        }
        else
        {
            return redirect('admin/attachment');
        }
    }
    
    public function destroy($idAttachment,Request $request)
    {
        $attachment = Attachment::where('attachment_id',$idAttachment)->first();
        if( count($attachment) == 0 )
        {
            return redirect('admin/attachment');
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
        
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'attach', __FUNCTION__, "0,$idAttachment,0");
        /* END SAVE DATABASE LOG */
        if($request->ajax()){
            return true;
        }else {
            return redirect('admin/attachment');
        }
    }
    
    public function getDataImage()
    {
        $attachments = Attachment::where('attachment_type','image')->orderBy('attachment_id','DESC')->get();
        $html = '';
        if( count($attachments) == 0 ) return $html;
        $html .= '<ul>';
        foreach( $attachments as $attachment )
        {
            $html .= '<li>';
            $html .= '<img src="'.$attachment->attachment_url.'" width="150" height="150" />';
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}