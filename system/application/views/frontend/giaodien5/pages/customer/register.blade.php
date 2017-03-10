 @extends('frontend.giaodien5.layouts.default')
@section('content')  
     
 <div class="mt60">
   <div id="layout-page" class="container clearfix">
      <h1>Tạo tài khoản</h1>
      <div class="userbox contact">
         @if( count($errors) > 0 )
           <ul>
               @foreach( $errors->all() as $error )
               <li>{{ $error }}</li>
               @endforeach
           </ul>
           @endif
         <form accept-charset="UTF-8" action="{{url('customer/register')}}" id="create_customer" method="post">
         <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input name="form_type" type="hidden" value="create_customer">
            <input name="utf8" type="hidden" value="✓">
            <div id="last_name" class="clearfix large_form">
               <input type="text" value="{{old('name')}}" name="name" placeholder="Họ tên" id="last_name" class="text" size="30">
            </div>
            <div id="email" class="clearfix large_form">    
               <input  type="email" value="{{old('email')}} " placeholder="Email" name="email" id="email" class="text" size="30">
            </div>
            <div id="first_name" class="clearfix large_form">				
               <input type="password" value="" name="password" placeholder="Mật khẩu" id="first_name" class="text" size="30">
            </div>
            <div id="password" class="clearfix large_form">
               <input  type="password" value="" placeholder="Xác nhận mật khẩu" name="password_confirmation" id="password" class="password text" size="30">
            </div>
            <div class="clearfix large_form">
               <select name="gender">
                <option value="choise">— Chọn giới tính —</option>
                <option value="1" @if( old('gender') == '1' )selected="selected"@endif >Nam</option>
                <option value="2" @if( old('gender') == '2' )selected="selected"@endif >Nữ</option>
                <option value="3" @if( old('gender') == '3' )selected="selected"@endif >Khác</option>
               </select>
            </div>
            
            <div class="action_bottom">
               <button type="submit" class="message-btn">Đăng ký</button>
            </div>
            <div class="req_pass">
               <a class="come-back" href="{{url('customer/login')}}">Trở lại trang đăng nhập</a>
            </div>
         </form>
      </div>
   </div>
   <!-- #register -->
</div>   
  
@stop