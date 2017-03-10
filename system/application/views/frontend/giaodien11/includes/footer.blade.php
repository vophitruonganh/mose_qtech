<footer class="footer">
     
      <div class="footer-middle container">
      <div class="row">
      <div class="col-md-4 col-sm-4">
      <?php $about = isset($about) ? $about : []; ?>
      @if( count($about) > 0 )
        <h2 class="h2_footer">{{ $about['title'] }}</h2>
        <span class="sp_footer"></span>
        <div class="footer-logo">
          <a class="logo" href="{{url('/')}}">
            <img src="{{ $about['logo'] }}" />
          </a>
        </div>
        <p>{{ $about['text'] }}</p>
      @endif
      </div>
      <div class="col-md-2 col-sm-2">
        <h2 class="h2_footer">{{ $bottom_menu['heading'] }}</h2>
        <span class="sp_footer"></span>
        <ul class="links">
          <?php unset($bottom_menu['heading']); ?>
          @foreach( $bottom_menu as $row )
          <li><a href="{{ $row['url'] }}">{{ $row['title'] }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="col-md-3 col-sm-3">
        <h2 class="h2_footer">{{ $service['heading'] }}</h2>
        <span class="sp_footer"></span>
        <ul class="links">
          <?php unset($service['heading']); ?>
          @foreach( $service as $row )
          <li><a href="{{ $row['url'] }}">{{ $row['title'] }}</a></li>
          @endforeach
        </ul>				
      </div>
      <div class="col-md-3 col-sm-3">
      <h2 class="h2_footer">Liên hệ</h2>
      <span class="sp_footer"></span>
      <div class="contacts-info">
      <address><span style="color:#777" class="glyphicon glyphicon-map-marker"></span> &nbsp;Địa chỉ:  {{ $storeSetting['address'] }}</address>
      <div class="phone-footer"><span style="color:#777" class="glyphicon glyphicon-earphone"></span> &nbsp; {{ $storeSetting['telephone'] }}</div>
      <div class="phone-footer"><i style="color:#777" class="fa fa-archive"></i> &nbsp; {{ $storeSetting['telephone'] }}</div>
      <div class="email-footer"><span style="color:#777" class="glyphicon glyphicon-envelope"></span> &nbsp;<a href="mailto:{{ $storeSetting['email'] }}"> {{ $storeSetting['email'] }}</a> </div>
      </div>
      <div class="payment-accept">
      <div>
      @foreach( $social as $row )
        <a target="_blank" href="{{ $row['url'] }}"><img src="{{ $row['image'] }}"></a>
      @endforeach
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="footer-bottom">
      <div class="container">
      <div class="row">
      <div class="col-sm-5 col-xs-12 coppyright">
      {{ $copyright['text'] }}
      </div>
      <!--
      <div class="col-sm-7 col-xs-12 company-links hidden-xs" style="text-align: right;">
      <a href="/"><img src="{{asset('template/giaodien11/asset/images/icon_visa.png')}}" alt="thanh-toan"></a>
      </div>
      -->
      </div>
      </div>
      </div>
      </footer>
      <!-- End Footer -->
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
   </body>
</html>