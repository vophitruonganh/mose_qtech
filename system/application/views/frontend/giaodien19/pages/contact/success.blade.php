@extends('frontend.giaodien19.layouts.default')
@section('content')


<div id="page">
   <div class="container">
      <div class="row">
         <div class="col-md-9 col-xs-12 col-sm-12" id="layout-page">
            <div class="block-title page-header"> Liên hệ </div>
            <div class="content-contact content-page">
               <p class="text-center">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.197827598388!2d106.65177431433693!3d10.79615526178249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752935e97b0445%3A0xa4b83f2f98a593fe!2zMTU3LTE1OSBYdcOibiBI4buTbmcsIFBoxrDhu51uZyAxMiwgVMOibiBCw6xuaCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1473064605702" width="800" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
               </p>
               <div class="col-md-7 col-form" id="contactFormWrapper">
                  <h3></h3>
                  <hr class="line-left">
                  <p>
                       Cảm ơn bạn! Email đã được gửi đến nhà quản trị!
                  </p>
                 
                  
               </div>
               <div class="col-md-5 col-form" id="col-right">
                  <h3>Chúng tôi ở đây</h3>
                  <hr class="line-right">
                  <h3 class="name-company">Twenty Co.Ltd</h3>
                  <p>	Giải pháp bán hàng toàn diện từ website đến cửa hàng	</p>
                  <ul class="info-address">
                     <li>
                        <i class="glyphicon glyphicon-map-marker"></i>
                        <span>56 Vân côi, Phường 7, Quận Tân Bình, Tp. Hồ Chí Minh</span>
                     </li>
                     <li>
                        <i class="glyphicon glyphicon-envelope"></i>
                        <span>hi@haravan.com</span>
                     </li>
                     <li>
                        <i class="glyphicon glyphicon-phone-alt"></i> 
                        <span>1900.636.099</span>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-3 col-sm-12 col-xs-12">
           <!-- Widget kkkkkkkkkk -->
            {!!showWidget('widgetkkkkkkkkkk')!!}
          <!-- End Widget kkkkkkkkkk -->

           <!-- Widget iiiiiiiiii -->
            {!!showWidget('widgetiiiiiiiiii')!!}
          <!-- End Widget iiiiiiiiii -->

         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   
      function order(i)
      {
         $("#form_order_"+i).submit();   
      }
</script>
@stop

          