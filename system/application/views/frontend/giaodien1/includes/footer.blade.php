<footer id="footer">
    <div class="footer-top text-center">
                    
                    <h5>{{ isset($footer['company']) ?$footer['company'] : '' }}</h5>
                    <p>Địa chỉ: {{ $storeSetting['address'] }}</p>
                    <p>Điện thoại: {{ $storeSetting['telephone'] }} - Email: {{ $storeSetting['email'] }}</p>
                    <p>{!! isset($footer['copyright']) ? $footer['copyright'] : '' !!}</p>
                    <div class="social">
                        <ul>
                            <li><a href="" class="facebook"></a></li>
                            <li><a href="" class="plusgoogle"></a></li>
                            <li><a href="" class="twitter"></a></li>
                        </ul>
                    </div>
               
    </div>
    
    
    <div class="footer-copyright">
    <div class="container">
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <!--<p>© Bản quyền thuộc về Đông Á Theme | Cung cấp bởi <a href="#">Qm</a></p>-->
    </div>
    <!--
    <div class="col-lg-6 col-md-6 col-sm-6 hidden-xs">
    <nav class="nav-payments">
    <ul>
    <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
    <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
    <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
    <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
    </ul>
    </nav>
    </div>
    -->
    </div>
    </div>
    </div>
</footer>
      </div>
     

      
<!--      <script src='js/api.jquery.js' type='text/javascript'></script>
	<script src='js/option-selectors.js' type='text/javascript'></script>-->
       
	<script src="{{ asset('template/giaodien1/js/owl.carousel.min.js') }}" type='text/javascript'></script>
	<script src="{{ asset('template/giaodien1/js/jquery.mmenu.min.js') }}" type='text/javascript'></script>
	<script src="{{ asset('template/giaodien1/js/main.js') }}" type='text/javascript'></script>
   </body>
</html>