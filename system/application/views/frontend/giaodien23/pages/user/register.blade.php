@extends('frontend.giaodien9.layouts.default')
@section('content')

<div id="customer-register" class="page wrapper">
   <header class="page-header">
      <h1 class="page-title">
         Đăng ký thành viên
      </h1>
   </header>
   <div class="entry-content page-content">
      <div id="register" class="userbox">
            @if( count($errors) > 0 )
               <ul>
               @foreach( $errors->all() as $error )
                  <li>{{ $error }}</li>
               @endforeach
               </ul>
            @endif
         <form accept-charset="UTF-8" action="{{url('user/register')}}" id="create_customer" method="post">
            <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input name="form_type" type="hidden" value="create_customer">
            <input name="utf8" type="hidden" value="✓">
            <p id="first_name" class="clearfix field">
               <label for="first_name" class="label"><i class="fa fa-user"></i></label>
               <input type="text" value="{{old('name')}}" name="name" id="first_name" class="text" placeholder="Họ và tên">
            </p>
            
            <p id="email" class="field">
               <label for="email" class="label"><i class="fa fa-envelope"></i></label>
               <input type="email" value="{{old('email')}}" name="email" id="email" class="text" placeholder="Email">
            </p>
            <p id="password" class="field">
               <label for="password" class="label"><i class="fa fa-lock"></i></label>
               <input type="password" value="" name="password" id="password" class="password text" placeholder="Mật khẩu">
            </p>
            <p id="password" class="field">
               <label for="password" class="label"><i class="fa fa-lock"></i></label>
               <input type="password" value="" name="password_confirmation" id="password" class="password text" placeholder="Xác nhận mật khẩu">
            </p>
            <p id="gender" class="field">
               <label for="gender" class="label"><i class="fa fa-envelope"></i></label>
                <select name="gender" class="form-control">
                   <option value="choise">— Chọn giới tính —</option>
                   <option value="1" @if( old('gender') == '1' )selected="selected"@endif >Nam</option>
                   <option value="2" @if( old('gender') == '2' )selected="selected"@endif >Nữ</option>
                   <option value="3" @if( old('gender') == '3' )selected="selected"@endif >Khác</option>
               </select>
            </p>
            <div class="action_bottom">
               <input class="btn" type="submit" value="Đăng ký">
            </div>
            <span class="note"> hoặc <a href="{{url('user/login')}}">Quay lại đăng nhập</a></span>
         </form>
      </div>
      <!-- #register -->
   </div>
   <!-- .row -->
</div>
@stop        
