<?php

/*-- Frontend Home --*/
Route::get('/','frontend\HomeController@index');
/*--end--*/


/* sản phẩm */
Route::get('collections/{slugDetail}','frontend\CollectionsController@detail'); 
/* end sản phẩm */


/* page */
Route::get('pages/contact','frontend\PagesController@contact');
Route::post('pages/contact','frontend\PagesController@sendmail');
Route::get('pages/contact_success','frontend\PagesController@success');

Route::get('pages/{slug}','frontend\PagesController@index'); 
/* end page */


?>