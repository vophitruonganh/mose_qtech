<?php

/*-- Frontend Home --*/
Route::get('/','frontend\HomeController@index');
/*-- End --*/

/*-- User --*/
Route::get('user/login','frontend\UserController@index');
Route::post('user/login','frontend\UserController@login');
Route::get('user/logout','frontend\UserController@logout');
Route::get('user/register','frontend\UserController@create');
Route::post('user/register','frontend\UserController@register');
/*-- End --*/

/*-- Collections --*/
Route::get('collections','frontend\CollectionsController@index');
Route::post('collections','frontend\CollectionsController@filter');
Route::get('collections/{slugDetail}','frontend\CollectionsController@detail');
//Route::get('collections/discount','frontend\CollectionsController@discount');
//Route::post('collections/discount','frontend\CollectionsController@filter_discount');
/*-- End --*/

/*-- Cart --*/
Route::get('cart','frontend\CartController@index');
Route::post('cart','frontend\CartController@postCart');
Route::get('cart/checkout','frontend\CartController@getCheckout');
Route::post('cart/checkout','frontend\CartController@postCheckout');
Route::post('cart/checkout-pending','frontend\CartController@pendingCheckout');
Route::post('cart/checkoutLogin','frontend\CartController@postCheckoutLogin');
Route::post('cart/order/{product_slug}','frontend\CartController@getOrder');
Route::get('cart/delete_item/{id}','frontend\CartController@deleteCartItem');
/*-- End --*/

/* page */
Route::get('pages/contact','frontend\PagesController@contact');
Route::post('pages/contact','frontend\PagesController@sendmail');
Route::get('pages/contact_success','frontend\PagesController@success');
Route::get('pages/{slug}','frontend\PagesController@index'); 
/* end page */



/* post */
Route::get('{slug}','frontend\CheckSlugController@index');
/* end post */

?>