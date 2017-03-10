</div>
</div>
<!--dong the mo o header-->
<div class="payment-method">
	<div class="container">
		<div class="row">
			<!--
			<div class="row-eq-height payment-method-left col-xs-12 col-sm-12 col-md-6">
				<div class="method-item col-xs-6 col-sm-6 col-md-6">
					<span class="policy-text">
						<p>Trả hàng trong 30 ngày</p>
					</span>
				</div>
				<div class="method-item col-xs-6 col-sm-6 col-md-6">
					<span class="policy-text">
						<p>Giao hàng miễn phí</p>
					</span>
				</div>
			</div>
			<div class="row-eq-height payment-method-right col-xs-12 col-sm-12 col-md-6">
				<div class="method-item col-xs-6 col-sm-6 col-md-6">
					<span class="policy-text">
						<p>Thanh toán linh hoạt</p>
					</span>
				</div>
				<div class="method-item col-xs-6 col-sm-6 col-md-6">
					<span class="policy-text">
						<p>Hotline: 090 407 9496</p>
					</span>
				</div>
			</div>
			-->
			<div class="row-eq-height payment-method-left col-xs-12 col-sm-12 col-md-12">
				@foreach( $policy as $row )
				<div class="method-item col-xs-6 col-sm-6 col-md-6">
					<span class="policy-text">
						<p>{{ $row['text'] }}</p>
					</span>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
<style>	
	.payment-method {
	background: url("{{ asset('template/giaodien12/asset/images/pm.jpg?1470122713917') }}");
	position: relative;
	width: 100%;
	overflow: hidden;
	min-height: 85px;
	}
</style>
<footer id="footer" class="footer">
	<div class="widget">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="widget-item">
						<ul class="widget-menu">
							<li class="ylogo">
								<a href="/"><img src="{{ asset('template/giaodien12/asset/images/logocolor.png?1470122713917') }}" alt="Sport">
								</a>
							</li>
							<li class="location-title">Trụ sở:</li>
							<li class="widget-address">
								<i><img src="{{ asset('template/giaodien12/asset/images/location.png?1470122713917') }}" alt="Sport"></i>
								<span>{{ $storeSetting['address'] }}</span>
							</li>
							<li><i><img src="{{ asset('template/giaodien12/asset/images/phone1.png?1470122713917') }}" alt="Sport"></i><span>{{ $storeSetting['telephone'] }}</span> <i><img src="{{ asset('template/giaodien12/asset/images/phone2.png?1470122713917') }}" alt="Sport"></i><span>{{ $storeSetting['telephone'] }}</span>
							</li>
							<li><i><img src="{{ asset('template/giaodien12/asset/images/phone1.png?1470122713917') }}" alt="Sport"></i><span>{{ $storeSetting['telephone'] }}</span> <i><img src="{{ asset('template/giaodien12/asset/images/mail.png?1470122713917') }}" alt="Sport"></i><span>{{ $storeSetting['email'] }}</span>
							</li>
						</ul>
						<!-- End .widget-menu -->
					</div>
					<!-- End .widget-item -->
				</div>
				<div class="col-md-2 col-sm-6">
					<div class="widget-item">
						<h4 class="widget-title">{{ $rules['heading'] }}</h4>
						<!-- End .widget-title -->
						<ul class="widget-menu">
							<?php unset($rules['heading']); ?>
							@foreach( $rules as $row )
							<li><a href="{{ $row['url'] }}">{{ $row['text'] }}</a></li>
							@endforeach
						</ul>
						<!-- End .widget-menu -->
					</div>
					<!-- End .widget-item -->
				</div>
				<div class="col-md-2 col-sm-6">
					<div class="widget-item">
						<h4 class="widget-title">{{ $guide['heading'] }}</h4>
						<!-- End .widget-title -->
						<ul class="widget-menu">
							<?php unset($guide['heading']); ?>
							@foreach( $guide as $row )
							<li><a href="{{ $row['url'] }}">{{ $row['text'] }}</a></li>
							@endforeach
						</ul>
						<!-- End .widget-menu -->
					</div>
					<!-- End .widget-item -->
				</div>
				<div class="col-md-2 col-sm-6">
					<div class="widget-item">
						<h4 class="widget-title">{{ $service['heading'] }}</h4>
						<!-- End .widget-title -->
						<ul class="widget-menu">
							<?php unset($service['heading']); ?>
							@foreach( $service as $row )
							<li><a href="{{ $row['url'] }}">{{ $row['text'] }}</a></li>
							@endforeach
						</ul>
						<!-- End .widget-menu -->
					</div>
					<!-- End .widget-item -->
				</div>
				<div class="col-md-2 col-sm-6">
					<div class="widget-item">
						<h4 class="widget-title">LIÊN KẾT</h4>
						<!-- End .widget-title -->
						<ul class="widget-menu">
							<li><a href="{{ url('collections?search=') }}">Tìm kiếm</a>
							</li>
							<li><a href="{{ url('pages/gioi-thieu') }}">Giới thiệu</a>
							</li>
							<li><a href="{{ url('collections') }}">Sản phẩm</a>
							</li>
							<li><a href="{{ url('post') }}">Tin tức</a>
							</li>
						</ul>
						<!-- End .widget-menu -->
					</div>
					<!-- End .widget-item -->
				</div>
			</div>
		</div>
	</div>
	<!-- End .widget -->
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<span class="copyright">© Bản quyền thuộc về <a href="http://qmtech.com.vn" class="">Sport Theme</a> | Cung cấp bởi <a class="" href="http://qmtech.com.vn">qmtech.com.vn</a></span>
					<!--
					<span><img src="{{ asset('template/giaodien12/asset/images/pay-ments1.png?1470122713917') }}" alt="thanh-toan" /></span>
					<span><img src="{{ asset('template/giaodien12/asset/images/pay-ments2.png?1470122713917') }}" alt="thanh-toan" /></span>
					<span><img src="{{ asset('template/giaodien12/asset/images/pay-ments3.png?1470122713917') }}" alt="thanh-toan" /></span>
					<span><img src="{{ asset('template/giaodien12/asset/images/pay-ments4.png?1470122713917') }}" alt="thanh-toan" /></span>
					-->
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- /SITE FOOTER -->
</div>
<script src="{{ asset('template/giaodien12/asset/js/main.js?1470122713917') }}" type='text/javascript'></script>	
<script src="{{ asset('template/giaodien12/asset/js/bootstrap.js?1470122713917') }}" type='text/javascript'></script>
<script src="{{ asset('template/giaodien12/asset/js/jquery.menu-aim.js?1470122713917') }}" type='text/javascript'></script>
<script src="{{ asset('template/giaodien12/asset/js/menu.js?1470122713917') }}" type='text/javascript'></script>
<div class="overlayopacity"></div>
<div class="ajax-error-modal modal">
	<div class="modal-inner">
		<div class="ajax-error-title">Lỗi</div>
		<div class="ajax-error-message"></div>
	</div>
</div>
<div class="ajax-success-modal modal">
	<div class="overlay"></div>
	<div class="content">
		<div class="ajax-left">
			<img class="ajax-product-image" alt="&nbsp;" src="" style="max-width:65px; max-height:100px"/>
		</div>
		<div class="ajax-right">
			<p class="ajax-product-title"></p>
			<p class="success-message btn-go-to-cart"><span style="color:#000">&#10004;</span> Đã được thêm vào giỏ hàng.</p>
			<div class="actions">          
				<button onclick="window.location='/cart'" class="btn btn-red-popup">Đi tới giỏ hàng</button>
				<button onclick="window.location='/checkout'" class="btn btn-red-popup">Thanh toán</button>
			</div>
		</div>
		<a href="javascript:void(0)" class="close-modal"><i class="fa fa-times"></i></a>
	</div>
</div>
<script type="text/javascript">
     function deletePerItem(id){
    	 var url = '/cart/delete_item/'+id;
          $.ajax({
            'url'       : url, 
            'type'      : 'GET',
            'success'   : function(data){
                if(data == 'Success'){
                    window.location = 'cart';
                }
            },
        });
        return false;

    	
     }
</script>
<script src="{{ asset('template/giaodien12/asset/js/components.js?1470122713917') }}" type='text/javascript'></script>
<script src="{{ asset('template/giaodien12/asset/js/app.js?1470122713917') }}" type='text/javascript'></script>
</body>
</html>

