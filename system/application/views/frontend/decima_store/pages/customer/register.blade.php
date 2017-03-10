@extends('frontend.decima_store.layouts.default')
@section('content')


      <div class="full-width section-emphasis-1 page-header">
          <div class="container">
              <header class="row">
                  <div class="col-md-12">
                      <h1 class="strong-header pull-left">
                          My account
                      </h1>
                      <!-- BREADCRUMBS -->
                      <ul class="breadcrumbs list-inline pull-right">
                          <li><a href="index.html">Home</a></li><!--
                          --><li><a href="03-shop-products.html">Shop</a></li><!--
                          --><li>Register</li>
                      </ul>
                      <!-- !BREADCRUMBS -->
                  </div>
              </header>
          </div>
      </div><!-- !full-width -->
      <div class="container">
          <!-- !FULL WIDTH -->
          <!-- !SECTION EMPHASIS 1 -->

          <div class="row">
              <div class="col-md-6 space-right-20">
                  <section class="element-emphasis-weak">
                      <h2 class="strong-header">
                          Already have an account?
                      </h2>
                      <a href="{{url('customer/login')}}" class="btn btn-default">
                          Login
                      </a>
                  </section>
              </div>
              <div class="col-md-6 space-left-20">
                  <section class="register element-emphasis-strong">
                      <h2 class="strong-header large-header">
                          Create an account
                      </h2>
                      @if( count($errors) > 0 )
                        <ul>
                            @foreach( $errors->all() as $error )
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                      <form role="form" action="{{ url('customer/register') }}" method="post" novalidate>
                          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                          <div class="form-group">
                              <label for="first-name">Họ tên</label>
                              <input type="text" class="form-control" value="{{ old('name') }}" name="name">
                          </div>
                         
                          <div class="form-group">
                              <label for="email">Email </label>
                              <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" >
                          </div>
                           <div class="form-group">
                              <label for="last-name">Giới tính</label>
                              <div class="controls">  
                                <select name="gender" class="form-control">
                                    <option value="choise">— Chọn giới tính —</option>
                                    <option value="1" @if( old('gender') == '1' )selected="selected"@endif >Nam</option>
                                    <option value="2" @if( old('gender') == '2' )selected="selected"@endif >Nữ</option>
                                    <option value="3" @if( old('gender') == '3' )selected="selected"@endif >Khác</option>
                                </select> 
                            </div>
                          </div>
                          <div class="form-group">
                              <label for="password">Mật khẩu</label>
                              <input type="password" class="form-control" id="password" name="password" >
                          </div>
                          <div class="form-group">
                              <label for="password-repeat">Xác nhận mật khẩu</label>
                              <input type="password" class="form-control" id="password-repeat" name="password_confirmation" >
                          </div>
                          <button type="submit" class="btn btn-primary">Register</button>
                      </form>
                  </section>
              </div>
          </div>

      </div>
  </section>

@stop