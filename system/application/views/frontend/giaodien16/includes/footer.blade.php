<footer class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="container">
    <div class="row">
      <section class="footer-up hidden-xs">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
          <?php 
                 $heading_info = $information['heading']; 
                 unset($information['heading']) 
          ?>
          <h5>{{$heading_info}}</h5>
          @foreach( $information as $row )
              <li><a href="{{$row['url']}}" title="Thông tin">{{$row['text']}}</a></li>
          @endforeach
         
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
          <?php 
                  $heading_contact = $contact['heading']; 
                  unset($contact['heading']); 
          ?>
          <h5>{{$heading_contact}}</h5>
          @foreach( $contact as $row)
            <li><a href="{{$row['url']}}" title="{{$row['text']}}">{{$row['text']}}</a></li>
          @endforeach
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
           <?php 
                  $heading_policy = $policy['heading'];
                  unset($policy['heading']);
           ?>
          <h5>{{$heading_policy}}</h5>
          @foreach($policy as $row)
             <li><a href="{{$row['url']}}" title="{{$row['text']}}">{{$row['text']}}</a></li>
          @endforeach
        </div>
        <div class="col-lg-3 col-md-3 hidden-sm col-xs-12">
         @foreach ( $facebook as $row)
             <div class="fb-page" data-href="{{$row['url']}}" data-tabs="timeline" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <div class="fb-xfbml-parse-ignore">
              <blockquote cite="{{$row['url']}}">
                <a href="{{$row['url']}}">Facebook</a>
              </blockquote>
            </div>
          </div>
          @endforeach
        </div>
      </section>
      <section class="hidden-lg hidden-md hidden-sm col-xs-12 footer-mobile">
        <ul class="topnav">
          <li class="level0 level-top parent">
            <a class="level-top" href="/"> <span>{{$heading_info}}</span> </a>
            <ul class="level0">
              @foreach ($information as $row)
                <li class="level1"> <a href="{{$row['url']}}"> <span>{{$row['text']}}</span> </a></li>
              @endforeach
            </ul>
          </li>
          <li class="level0 level-top parent">
            <a class="level-top" href="/"> <span>{{$heading_contact}}</span> </a>
            <ul class="level0">
               @foreach( $contact as $row)
                <li class="level1"><a href="{{$row['url']}}"><span>{{$row['text']}}</span></a></li>
             @endforeach
            </ul>
          </li>
          <li class="level0 level-top parent">
            <a class="level-top" href="/"> <span>{{$heading_policy}}</span> </a>
            <ul class="level0">
               @foreach($policy as $row)
                <li class="level1"> <a href="{{$row['url']}}"> <span>{{$row['text']}}</span> </a></li>
              @endforeach
            </ul>
          </li>
        </ul>
        <div class="col-lg-3 col-md-3 hidden-sm col-xs-12">
          @foreach ( $facebook as $row)
            <div class="fb-page" data-href="{{$row['url']}}" data-tabs="timeline" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <div class="fb-xfbml-parse-ignore">
              <blockquote cite="{{$row['url']}}">
                <a href="{{$row['url']}}">Facebook</a>
              </blockquote>
            </div>
          </div>
          @endforeach
        </div>
      </section>
      <section class="footer-mid">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 f-mid-1">
          <h5>{{$payment['heading']}}</h5>
          <?php unset($payment['heading']) ?>
          @foreach( $payment as $row)
              <img src="{{asset('template/giaodien16/asset/images/'.$row['image'])}}" height="40" width="65" alt="Master Card" />
          @endforeach
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 f-mid-2">
          <h5>{{$support['heading']}}</h5>
          <div class="tuvan">
            <img src="{{asset('template/giaodien16/asset/images/'.$support['image'])}}" alt="Tư vấn"/>
          </div>
          <?php
                unset($support['heading']);
                unset($support['image']); 
           ?>
          @foreach ($support as $row)
             <div class="f-mid-2-1">
                  <p>{{$row['text']}}</p>
                  <p>{{$row['phone']}}</p>
              </div>
          @endforeach
         
        </div>
      </section>
      <section class="footer-low">
      
          <?php 
              $i = 1;
              $heading_branch = $branch['heading'];
              unset( $branch['heading']);
           ?>
           @foreach ($branch as $row)
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 f-low-{{$i}}">
                @if($i==1)<h5> {{$heading_branch}}</h5> @endif
                <p>{{$row['address']}}</p>
                <p>{{$row['phone']}}</p>
              </div>
              <?php $i++; ?>
           @endforeach
          <!-- <h5>Công ty cổ phần Công nghệ DKT</h5>
          <p>Trụ sở chính: Tầng 4 - Tòa nhà Hanoi Group - 442 Đội Cấn - Ba Đình - Hà Nội</p>
          <p>Điện thoại: HN - (04) 6674 2332 - (04) 3786 8904</p> -->
       
      </section>
    </div>
  </div>
</footer>
<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 copyright">
  <div class="container">
    <div class="row mg0">
      <div>© Bản quyền thuộc về Avent Team | Cung cấp bởi <a href="https://www.bizweb.vn" target="_blank" title="Bizweb" style="color:#ec5d5d;">Bizweb</a></div>
    </div>
  </div>
</section>

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

<script src="{{ asset('template/giaodien16/asset/js/common.js?1471504577257') }}" type='text/javascript'></script>
<script src="{{ asset('template/giaodien16/asset/js/jquery.flexslider.js?1471504577257') }}" type='text/javascript'></script>
<script src="{{ asset('template/giaodien16/asset/js/cloud-zoom.js?1471504577257') }}" type='text/javascript'></script>
<script src="{{ asset('template/giaodien16/asset/js/owl.carousel.min.js?1471504577257') }}" type='text/javascript'></script> 
<script src="{{ asset('template/giaodien16/asset/js/parallax.js?1471504577257') }}" type='text/javascript'></script>
<script src="{{ asset('template/giaodien16/asset/js/api.jquery.js?16052016') }}" type='text/javascript'></script>
<script src="{{ asset('template/giaodien16/asset/js/jgrowl.js?1471504577257') }}" type='text/javascript'></script>
<script src="{{ asset('template/giaodien16/asset/js/cs.script.js?1471504577257') }}" type='text/javascript'></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>