@extends('frontend.giaodien15.layouts.default')
@section('content')


<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <img src="//hstatic.net/033/1000104033/1000147703/bg-breadcrumb.jpg?v=55" alt="">
      <div class="inner">
         <div class="breadcrumb-list">
            <a href="/" title="Quay lại trang chủ">Trang chủ</a>
            <span aria-hidden="true">/</span>
            <span>Tạo tài khoản</span>
         </div>
      </div>
   </nav>
   <!-- /templates/customers[register].liquid -->
   <div class="grid">
      <div class="grid__item large--one-third push--large--one-third text-center">
         <h1>tạo tài khoản</h1>
         <div class="form-vertical">
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
               <label for="FirstName" class="hidden-label">Họ tên</label>
               <input type="text" name="name" id="FirstName" class="input-full" placeholder="Họ, đệm" autocapitalize="words" autofocus="" value="{{old('name')}}">
               <label for="Email" class="hidden-label">Email</label>
               <input type="email" name="email" id="Email" class="input-full" placeholder="Email" autocorrect="off" autocapitalize="off" value="{{old('email')}}">
               <label for="Email" class="hidden-label">Giới tính</label>
               <select name="gender">
                   <option value="choise">— Chọn giới tính —</option>
                   <option value="1" @if( old('gender') == '1' )selected="selected"@endif >Nam</option>
                   <option value="2" @if( old('gender') == '2' )selected="selected"@endif >Nữ</option>
                   <option value="3" @if( old('gender') == '3' )selected="selected"@endif >Khác</option>
                 </select> 
               <label for="CreatePassword" class="hidden-label">Mật khẩu</label>
               <input type="password" name="password" id="CreatePassword" class="input-full" placeholder="Mật khẩu">
               <label for="CreatePassword" class="hidden-label">Xác nhận mật khẩu</label>
               <input type="password" name="password_confirmation" id="CreatePassword" class="input-full" placeholder="Xác nhận mật khẩu">
               <p>
                  <input type="submit" value="Tạo mới" class="btn btn--full">
               </p>
               <a href="http://localhost/giaodien15/">Quay lại cửa hàng</a>
            </form>
         </div>
      </div>
   </div>
</main>


@stop

       