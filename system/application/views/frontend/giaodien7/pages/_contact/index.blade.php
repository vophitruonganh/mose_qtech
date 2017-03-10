@extends('frontend.giaodien7.layouts.default')
@section('content') 

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="inner">
				<ul>
					<li class="home">
						<a title="Quay lại trang chủ" href="/">Trang chủ</a>
					</li>
					
					<i class="fa fa-angle-double-right" aria-hidden="true"></i>
					<li class="cl_breadcrumb">Liên hệ</li>
					
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="main-container col2-right-layout">
	<div class="main container">
		<div class="row">
			<section class="col-main col-sm-7">
				<div class="page-title">
					<h2>Liên hệ</h2>
				</div>
				<div class="static-contain">
						@if( count($errors) > 0 )
		                    <ul>
                               @foreach( $errors->all() as $error )
                               <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                        @endif
					<form accept-charset="UTF-8" action="{{url('/contact/sendmail.html')}}" id="contact" method="post">
						<input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
						<input name="FormType" type="hidden" value="contact">
						<input name="utf8" type="hidden" value="true">
						<fieldset>
							<input name="form_type" type="hidden" value="contact"><input name="utf8" type="hidden" value="?">               

							<div class="customer-name">
								<div class="input-box">
									<label>Họ và tên<span class="required">*</span></label>
									<br>
									<input type="text" size="35" class="input-text" value="{{old('name')}}" name="name">
								</div>
								<div class="input-box">
									<label>Email <span class="required">*</span> </label>
									<br>                          
									<input type="email" size="35" id="email" value="{{old('email')}}" class="input-text" name="email">
								</div>
								<div class="input-box">
									<label>Số điện thoại<span class="required"></span></label>
									<br>
									<input type="text" size="35" class="input-text" value="{{old('phone')}}" name="phone">
								</div>
							</div>

						<label>Nội dung<em class="required">*</em></label>
						<br>
						<div style="float:none" class="">
							<textarea name="message" id="comment" title="Nội dung" class="input-text" cols="150" rows="3">{{old('message')}}</textarea>                        
						</div>

					</fieldset>

					<span class="require"><em class="required">* </em>Thông tin bắt buộc</span>
					<div class="buttons-set">
						<button type="submit" title="Submit" class="button submit"> <span> Gửi </span> </button>
					</div>
					</form>
				</div>
			</section>
			<aside class="col-right sidebar col-sm-5">
				<div class="row">
                                    
					     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2032145838784!2d106.65163631433687!3d10.79574226179004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175293594a7b199%3A0xbfcd85e0efe33de7!2zMTU3IFh1w6JuIEjhu5NuZywgMTIsIFTDom4gQsOsbmgsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1470195617119" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						
                         
				</div>
			</aside>
		</div>
	</div>
</div>


@stop