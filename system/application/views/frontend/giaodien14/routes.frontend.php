<?php
/*-- Frontend Home --*/
Route::get('/','frontend\HomeController@index');
/*--end--*/

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