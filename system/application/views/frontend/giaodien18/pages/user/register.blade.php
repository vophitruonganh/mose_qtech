@extends('frontend.giaodien18.layouts.default')
@section('content')

<div class="breadcrumb">
   <div class="container">
      <ul>
         <li><a href="{{url('/')}}" target="_self">Trang chủ</a></li>
         <li><a href="{{url('user/login')}}" target="_self">Tài khoản</a></li>
         <li class="active"><span>Đăng ký</span></li>
      </ul>
   </div>
</div>

<div id="layout-page-register" class="container">
   <span class="header-contact header-page clearfix">
      <h1 class="title-register"> Tạo tài khoản </h1>
   </span>
   <div class="userbox">
      @if( count($errors) > 0 )
           <ul>
               @foreach( $errors->all() as $error )
               <li>{{ $error }}</li>
               @endforeach
           </ul>
       @endif
      <form accept-charset="UTF-8" action="{{url('user/register')}}" id="create_customer" method="post">
         <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
         <input name="utf8" type="hidden" value="✓">
         <div id="first_name" class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input required="" type="text" value="{{old('name')}}" name="name" placeholder="Họ tên" id="first_name" class="text form-control" size="30">
         </div>
         <div id="email" class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input required="" type="email" value="{{old('email')}}" name="email" placeholder="email" id="email" class="text form-control" size="30">
         </div>
         <div id="last_name" class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <select name="gender">
                   <option value="choise">— Chọn giới tính —</option>
                   <option value="1" @if( old('gender') == '1' )selected="selected"@endif >Nam</option>
                   <option value="2" @if( old('gender') == '2' )selected="selected"@endif >Nữ</option>
                   <option value="3" @if( old('gender') == '3' )selected="selected"@endif >Khác</option>
            </select>
         </div>
         <div id="password" class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input required="" type="password" value="" name="password" placeholder="Mật khẩu" id="password" class="text form-control" size="30">
         </div>
         <div id="password" class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input required="" type="password" value="" name="password_confirmation" placeholder="Xác nhận mật khẩu" id="password" class="text form-control" size="30">
         </div>
         <div class="action_bottom">
            <input class="btn" type="submit" value="Đăng ký">			
         </div>
         <div class="req_pass">
            <a class="come-back" href="{{url('user/login')}}">Quay về</a>
         </div>
      </form>
   </div>
</div>

@stop

        
        
           
          
        