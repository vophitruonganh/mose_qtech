<footer class="">
   <div class="footer-inner">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 hidden-xs footer-col">
               <h5>{{ $information['heading'] }}</h5>
               <ul class="links">
                  <?php $infoHeading = $information['heading']; unset($information['heading']); ?>
                  @foreach( $information as $row )
                  <li>
                     <a href="{{ $row['url'] }}" title="{{ $row['text'] }}">{{ $row['text'] }}</a>
                  </li>
                  @endforeach
               </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 hidden-xs footer-col">
               <h5>{{ $support['heading'] }}</h5>
               <ul class="links">
                  <?php $supHeading = $support['heading']; unset($support['heading']); ?>
                  @foreach( $support as $row )
                  <li>
                     <a href="{{ $row['url'] }}" title="{{ $row['text'] }}">{{ $row['text'] }}</a>
                  </li>
                  @endforeach
               </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 hidden-xs footer-col">
               <h5>{{ $policy['heading'] }}</h5>
               <ul class="links">
                  <?php $poliHeading = $policy['heading']; unset($policy['heading']); ?>
                  @foreach( $policy as $row )
                  <li>
                     <a href="{{ $row['url'] }}" title="{{ $row['text'] }}">{{ $row['text'] }}</a>
                  </li>
                  @endforeach
               </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 hidden-xs footer-col">
               <h5>{{ $channel['heading'] }}</h5>
               <p>{{ $channel['text'] }}</p>
               <p>
                  @foreach( $social as $row )
                  <span><a href="{{ $row['url'] }}"><img src="{{ $row['image'] }}" title="{{ $row['title'] }}" alt="{{ $row['title'] }}"/></a></span>
                  @endforeach
               </p>
            </div>
            <div class="hidden-lg hidden-md hidden-sm col-xs-12 footer-mobile raw_mobile">
               <ul class="topnav">
                  <li class="level0 level-top parent">
                     <a class="level-top" href="/gioi-thieu">
                        <h5>{{ $infoHeading }}</h5>
                     </a>
                     <ul class="level0">
                        @foreach( $information as $row )
                        <li class="level1"> <a href="{{ $row['url'] }}"><span>{{ $row['text'] }}</span></a></li>
                        @endforeach
                     </ul>
                  </li>
                  <li class="level0 level-top parent">
                     <a class="level-top" href="/gioi-thieu">
                        <h5>{{ $supHeading }}</h5>
                     </a>
                     <ul class="level0">
                         @foreach( $support as $row )
                        <li class="level1"> <a href="{{ $row['url'] }}"><span>{{ $row['text'] }}</span></a></li>
                        @endforeach
                     </ul>
                  </li>
                  <li class="level0 level-top parent">
                     <a class="level-top" href="/gioi-thieu">
                        <h5>{{ $poliHeading }}</h5>
                     </a>
                     <ul class="level0">
                        @foreach( $policy as $row )
                        <li class="level1"> <a href="{{ $row['url'] }}"><span>{{ $row['text'] }}</span></a></li>
                        @endforeach
                     </ul>
                  </li>
               </ul>
               <div class="hidden-lg hidden-md hidden-sm col-xs-12">
                  <div class="fanpage_facebook block mg_bt mg_top hidden-xs">
                     <div class="block-content">
                        <div class="fb-page" data-href="https://www.facebook.com/congtyDKT" data-tabs="timeline" data-height="230" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                           <div class="fb-xfbml-parse-ignore">
                              <blockquote cite="https://www.facebook.com/congtyDKT">
                                 <a href="https://www.facebook.com/congtyDKT">Facebook</a>
                              </blockquote>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row footer-low hidden-sm hidden-xs">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 f-low-1">
               <h5>{{ $companyName }}</h5>
               <p>Trụ sở chính: {{ $storeSetting['address'] }}</p>
               <p>Điện thoại: {{ $storeSetting['telephone'] }}</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 f-low-2">
               <p>VPDD: {{ $storeSetting['address'] }}</p>
               <p>Điện thoại: {{ $storeSetting['telephone'] }}</p>
            </div>
         </div>
      </div>
      <div class="footer-bottom">
         <div class="container">
            <div class="row ">
               <div class="col-sm-12 col-xs-12 coppyright">{!! $copyright['text'] !!}</div>
            </div>
         </div>
      </div>
   </div>
</footer>
<script src="{{ asset('template/giaodien7/asset/js/common.js?1468549824886') }}" type='text/javascript'></script>
<script src="{{ asset('template/giaodien7/asset/js/jquery.flexslider.js?1468549824886') }}" type='text/javascript'></script>
<script src="{{ asset('template/giaodien7/asset/js/cloud-zoom.js?1468549824886') }}" type='text/javascript'></script>
<script src="{{ asset('template/giaodien7/asset/js/owl.carousel.min.js?1468549824886') }}" type='text/javascript'></script>
<script src="{{ asset('template/giaodien7/asset/js/parallax.js?1468549824886') }}" type='text/javascript'></script>
<script src="//bizweb.dktcdn.net/assets/themes_support/api.jquery.js?16052016" type='text/javascript'></script>
<script src="{{ asset('template/giaodien7/asset/js/jgrowl.js?1468549824886') }}" type='text/javascript'></script>
<script src="{{ asset('template/giaodien7/asset/js/cs.script.js?1468549824886') }}" type='text/javascript'></script>

</script>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 0;"></span></a>
<!--  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5565f9cf142bb517"></script>-->
<script type="text/javascript">
         function deletePerItem(id){
            var url = 'cart/delete_item/'+id;
             $.ajax({
               'url'       : url, 
               'type'      : 'GET',
               'success'   : function(data){
                   if(data == 'Success'){
                       window.location = '/cart';
                   }
               },
           });
         return false;

      
     }
</script>
<script type="text/javascript">
      function order(i)
      {
         $("#form_order_"+i).submit();   
      }
    </script>
</body>
</html>