<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Controllers\BackendController;
//use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\Controller;

/*
 * Use Library of Laravel
 */
use Validator;
use Session;
use App\Libraries\FacebookLibrary\Facebook;

class FacebookController extends Controller
{

  /**
   * Class Constructor
   */
  public function __construct()
  {
    parent::__construct();
  }

  public function login()
  {
      $facebook        = new Facebook(['appId' => '1136963499687042', 'secret' => '4abbfdcc36e14b6247e5f8247c5bf50f']);
      $userID          = $facebook->getUser();
      $user_profile    = $facebook->api('/'.$userID.'?fields=email,name');

      //$user = User::where([ 'user_email' => $user_profile['email'], 'user_status' => 1,])->whereNotIn('user_level',[4])->first();
      $user = $this->m_user->where([ 'user_email' => $user_profile['email'], 'user_status' => 1,])->whereIn('user_level',[1])->first();
      if (count($user) > 0) {
         Session::put('loginBackend',1);
         Session::put('user_id',$user->user_id);
         Session::put('user_level',$user->user_level);

         //FACEBOOK ADMIN
         if($user->user_level == 1){
             if ($userID) {
                 if (Session::get('user_id_facebook') == "") {
                     Session::put('user_id_facebook',$userID);
                 }
             }
         }

         return redirect('admin/dashboard');
      }

      return redirect('admin/login');

  }

}
