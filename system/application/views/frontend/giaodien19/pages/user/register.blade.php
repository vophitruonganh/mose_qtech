@extends('frontend.giaodien19.layouts.default')
@section('content')


<div id="layout-page" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
			<div class="content-reg">
				<div class="page-title">
					<h2>Tạo tài khoản</h2>
				</div>
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
						<div id="last_name" class="clearfix large_form">
							<label for="email">Nhập họ tên <span class="required">*</span></label>
							<label for="last_name" class="label icon-field"><i class="icon-login icon-user "></i></label>
							<input required="" type="text" value="{{old('name')}}" name="name" placeholder="Họ tên" id="last_name" class="text" size="30">
						</div>
						<div id="email" class="clearfix large_form">
							<label for="email">Nhập Email <span class="required">*</span></label>
							<label for="email" class="label icon-field"><i class="icon-login icon-envelope "></i></label>
							<input required="" type="email" value="{{old('email')}}" placeholder="Email" name="email" id="email" class="text" size="30">
						</div>

						<div id="gender" class="clearfix large_form">
							<label for="gender">Giới tính <span class="required">*</span></label>
							<label for="gender" class="label icon-field"><i class="icon-login icon-user "></i></label>
							<select name="gender">
				                   <option value="choise">— Chọn giới tính —</option>
				                   <option value="1" @if( old('gender') == '1' )selected="selected"@endif >Nam</option>
				                   <option value="2" @if( old('gender') == '2' )selected="selected"@endif >Nữ</option>
				                   <option value="3" @if( old('gender') == '3' )selected="selected"@endif >Khác</option>
				            </select>
							
						</div>
						<div id="password" class="clearfix large_form">
							<label for="email">Nhập mật khẩu <span class="required">*</span></label>
							<label for="password" class="label icon-field"><i class="icon-login icon-shield "></i></label>
							<input required="" type="password" value="" placeholder="Mật khẩu" name="password" id="password" class="password text" size="30">
						</div>
						<div id="password" class="clearfix large_form">
							<label for="email">Nhập mật khẩu <span class="required">*</span></label>
							<label for="password" class="label icon-field"><i class="icon-login icon-shield "></i></label>
							<input required="" type="password" value="" placeholder="Mật khẩu" name="password_confirmation" id="password" class="password text" size="30">
						</div>

						<div class="action_bottom">
							<button type="submit" class="button login"><span>Đăng ký</span></button>	
						</div>
						<div class="req_pass">
							<a class="come-back" href="{{url('user/login')}}">Quay về</a>
						</div>

					</form>
				</div>
			</div>


		</div>

@stop

