<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Requests;
/*
 * Use Library of Laravel
 */
class CartController extends FrontendController{

    protected $c_cart = null;
    /**
     * Class Constructor
     */
    function __construct(){
        $this->c_cart = new OrderController;
    }

    public function index(){
       return $this->c_cart->getCart();
    }

    public function getOrder($slug = ''){
    	return $this->c_cart->getOrder($slug);
    }

    public function postCart(){
    	return $this->c_cart->postCart();
    }

    public function getCheckout(){
    	return $this->c_cart->getCheckout();
    }

    public function postCheckout(Request $request){
    	return $this->c_cart->postCheckout($request);
    }

    public function postCheckoutLogin(Request $request){
    	return $this->c_cart->postCheckoutLogin($request);
    }

    public function pendingCheckout(){
    	return $this->c_cart->pendingCheckout();
    }

    public function deleteCartItem( $id = ''){
    	return $this->c_cart->deleteCartItem($id);
    }

    public function get_discount_code( $code = ''){
        return $this->c_cart->get_discount_code($code);
    }

    public function get_district($idProvince){
        return $this->c_cart->get_district($idProvince);
    }

    public function delete_cart_all(){
        return $this->c_cart->delete_cart_all();
    }

    public function get_camon( $order_id = ''){
        return $this->c_cart->get_camon( $order_id);
    }

}
