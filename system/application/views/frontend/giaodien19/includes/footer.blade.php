<footer class="footer">
  <div class="brand-logo ">
    
    <div class="container">
      <div class="slider-items-products">
        <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col6">
            <!-- <div class="item">
              <a href="1"><img src="//hstatic.net/817/1000069817/1000098314/b-logo1.png?v=1205" alt="Image"></a>
            </div>
            <div class="item">
              <a href="2"><img src="//hstatic.net/817/1000069817/1000098314/b-logo2.png?v=1205" alt="Image"></a>
            </div>
            <div class="item">
              <a href="3"><img src="//hstatic.net/817/1000069817/1000098314/b-logo3.png?v=1205" alt="Image"></a>
            </div>
            <div class="item">
              <a href="4"><img src="//hstatic.net/817/1000069817/1000098314/b-logo4.png?v=1205" alt="Image"></a>
            </div>
            <div class="item">
              <a href="5"><img src="//hstatic.net/817/1000069817/1000098314/b-logo5.png?v=1205" alt="Image"></a>
            </div>
            <div class="item">
              <a href="6"><img src="//hstatic.net/817/1000069817/1000098314/b-logo6.png?v=1205" alt="Image"></a>
            </div> -->
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="footer-middle container">
    <div class="col-md-3 col-sm-4">
      <div class="footer-logo">
        <a href="/" title="Logo"><img src="//hstatic.net/817/1000069817/1000098314/footer-logo.png?v=1205" alt="logo"></a>
      </div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu.</p>
      <div class="payment-accept">
        <div>
          <img src="{{asset('template/giaodien19/asset/images/payment-1.png')}}" alt="payment"> 
          <img src="{{asset('template/giaodien19/asset/images/payment-2.png')}}" alt="payment"> 
          <img src="{{asset('template/giaodien19/asset/images/payment-3.png')}}" alt="payment"> 
          <img src="{{asset('template/giaodien19/asset/images/payment-4.png')}}" alt="payment">
        </div>
      </div>
    </div>
    <div class="col-md-2 col-sm-4">
      <h4>Thông tin</h4>
      <ul class="links">
        <li><a href="/" title="Trang chủ">Trang chủ</a></li>
        <li><a href="/collections/all" title="Sản phẩm">Sản phẩm</a></li>
        <li><a href="/collections/all" title="Bộ sưu tập">Bộ sưu tập</a></li>
        <li><a href="/collections/all" title="Sản phẩm hot">Sản phẩm hot</a></li>
        <li><a href="/collections/all" title="Sản phẩm nỗi bật">Sản phẩm nỗi bật</a></li>
        <li><a href="/blogs/news" title="Blog">Blog</a></li>
      </ul>
    </div>
    <div class="col-md-2 col-sm-4">
      <h4>Liêt kết</h4>
      <ul class="links">
        <li><a href="/" title="Trang chủ">Trang chủ</a></li>
        <li><a href="/collections/all" title="Sản phẩm">Sản phẩm</a></li>
        <li><a href="/collections/all" title="Bộ sưu tập">Bộ sưu tập</a></li>
        <li><a href="/collections/all" title="Sản phẩm hot">Sản phẩm hot</a></li>
        <li><a href="/collections/all" title="Sản phẩm nỗi bật">Sản phẩm nỗi bật</a></li>
        <li><a href="/blogs/news" title="Blog">Blog</a></li>
      </ul>
    </div>
    <div class="col-md-2 col-sm-4">
      <h4>Kết nối</h4>
      <ul class="links">
        <li><a href="/" title="Trang chủ">Trang chủ</a></li>
        <li><a href="/collections/all" title="Sản phẩm">Sản phẩm</a></li>
        <li><a href="/collections/all" title="Bộ sưu tập">Bộ sưu tập</a></li>
        <li><a href="/collections/all" title="Sản phẩm hot">Sản phẩm hot</a></li>
        <li><a href="/collections/all" title="Sản phẩm nỗi bật">Sản phẩm nỗi bật</a></li>
        <li><a href="/blogs/news" title="Blog">Blog</a></li>
      </ul>
    </div>
    <div class="col-md-3 col-sm-4">
      <h4>Liên hệ</h4>
      <div class="contacts-info">
        <address>
          <i class="add-icon">&nbsp;</i>{{ $storeSetting['address'] }}
        </address>
        <div class="phone-footer"><i class="phone-icon">&nbsp;</i> {{ $storeSetting['telephone'] }} </div>
        <div class="email-footer"><i class="email-icon">&nbsp;</i> <a href="javascript:;">{{ $storeSetting['email'] }}</a>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-middle container cpr">
    <p>Copyright &copy; 2016 hkdev. <a target='_blank' href='https://www.haravan.com'>Powered by Haravan</a>.</p>
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
</footer>
</div>
<!-- Quick view -->
<!-- /.modal -->
<!-- Quick view -->
</body>
</html>