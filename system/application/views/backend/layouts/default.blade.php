@include('backend.includes.head')
<?php
/*
Session::get('user_level');
Session::get('user_id');
*/
?>
@include('backend.includes.header')
@yield('content')
@include('backend.includes.bottom')
@include('backend.includes.footer')