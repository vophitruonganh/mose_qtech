<?php


/*-- Frontend Home --*/
Route::get('/','frontend\HomeController@index');
/*--end--*/

/* sản phẩm */
Route::get('collections','frontend\CollectionsController@index');
Route::post('collections','frontend\CollectionsController@filter');
Route::get('collections/discount','frontend\CollectionsController@discount');
Route::post('collections/discount','frontend\CollectionsController@filter_discount');
Route::get('collections/{slugDetail}','frontend\CollectionsController@detail'); 
/* end sản phẩm */

/*Cart*/
Route::get('cart','frontend\CartController@index');
Route::post('cart/order/{product_slug}','frontend\CartController@getOrder');
Route::post('cart','frontend\CartController@postCart');
Route::get('cart/checkout','frontend\CartController@getCheckout');
Route::post('cart/checkout','frontend\CartController@postCheckout');
Route::post('cart/checkoutLogin','frontend\CartController@postCheckoutLogin');
Route::post('cart/checkout-pending','frontend\CartController@pendingCheckout');
Route::get('cart/delete_item/{id}','frontend\CartController@deleteCartItem');
/* end cart*/

/* page */
//Route::get('pages/contact','frontend\PagesController@contact');
//Route::post('pages/contact','frontend\PagesController@sendmail');
//Route::get('pages/contact_success','frontend\PagesController@success');

Route::get('pages/{slug}','frontend\PagesController@index'); 
/* end page */

/* user */
Route::get('user/logout','frontend\UserController@logout');
Route::get('user/login','frontend\UserController@index');
Route::post('user/login','frontend\UserController@login');
Route::get('user/register','frontend\UserController@create');
Route::post('user/register','frontend\UserController@register');
/* end user */

/* post */
//Route::get('{slug}','frontend\CheckSlugController@index');
/* end post */


?>