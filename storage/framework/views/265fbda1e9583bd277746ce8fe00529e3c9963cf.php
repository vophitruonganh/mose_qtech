<?php 
$idBody = 'home';
if(Request::url() != url('/')){
	$idBody = '';
}
 ?>