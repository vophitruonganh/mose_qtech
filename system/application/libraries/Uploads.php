<?php
namespace App\Libraries;

use App\Libraries\Curl;

class Uploads
{
    public $case;
    public $token;
    public $idStore;
    
    public $thumbImage;
    public $mediumImage;
    public $largerImage;
    
    public $isImage;
    
    //private $urlHostUpload = 'http://localhost/hostImage/Image.php';
    private $urlHostUpload = 'http://mosecdn.com/Image.php';
    
    public function imageUpload($fileUpload,$fileName)
    {
        $postFields = array(
            'case' => $this->case,
            'idStore' => $this->idStore,
            'token' => $this->token,
            'fileData' => new \CurlFile($fileUpload),
            'fileName' => $fileName,
            
            'thumbImage' => $this->thumbImage,
            'mediumImage' => $this->mediumImage,
            'largerImage' => $this->largerImage,
            
            'isImage' => $this->isImage,
        );
        
        $culr = new Curl();
        $response = $culr->get_curl($this->urlHostUpload,$postFields);
        
        return $response;
    }
    
    public function deleteFile($urlImage)
    {
        $postFields = array(
            'case' => $this->case,
            'idStore' => $this->idStore,
            'token' => $this->token,
            'urlImage' => $urlImage,
        );
        
        $culr = new Curl();
        $response = $culr->get_curl($this->urlHostUpload,$postFields);
        
        return $response;
    }
}
?>