@extends('frontend.giaodien17.layouts.default')
@section('content')

<div class="fvc" style="float:left;width:100%;">
   <div class="banner_page_list">
      <h1>{{$post->post_title}}</h1>
   </div>
   <div class="breadcrumbs">
      <div class="container">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ &nbsp;</a></li>
           <!--  <li><a href="/tin-noi-bat">Tin nổi bật</a></li> -->
            <li><strong>{{$post->post_title}}</strong></li>
         </ul>
      </div>
   </div>
   <section class="tzblog-wrap">
      <div class="container">
         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 tzshop-aside">
            <!-- Widget hhhhhhhhh -->
               {!!showWidget('widgethhhhhhhhh')!!}
            <!-- End Widget hhhhhhhhh -->
            
            <!-- Widget iiiiiiiii -->
               {!!showWidget('widgetiiiiiiiii')!!}
            <!-- End Widget iiiiiiiii -->
          
         </div>
         <?php 
                $username = (!empty($post->user_nickname)) ? $post->user_nickname : $post->user_email;
                $date     = date('d/m/Y',$post->post_date);
            ?>
         <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="tzpost-content">
               <h2>{{$post->post_title}}</h2>
               <div class="infor_article post-date">
                  <p style="color: #bda87f;"><i class="fa fa-user"></i>{{$username}} - <i class="fa fa-clock-o"></i>{{$date}}</p>
               </div>
               {!! $post->post_content !!}
            </div>
            <!-- <div class="tag_article">
               <h2>TAGS : </h2>
               <a href="/thiet-ke-noi-that-tinh-te-cho-can-ho-nho-dep/can-ho" title="can-ho">Căn hộ</a>
               <a href="/thiet-ke-noi-that-tinh-te-cho-can-ho-nho-dep/van-phong" title="van-phong">Văn phòng</a>
               <a href="/thiet-ke-noi-that-tinh-te-cho-can-ho-nho-dep/chung-cu" title="chung-cu">Chung cư</a>
            </div> -->
            <div class="social-media" style="float: right;width: 70%;margin-top: 30px;text-align: right;">
               <ul style=" text-align: right;">
                  <li>
                     <a style="padding: 10px 15px;" class="color-tooltip facebook" target="_blank" href="http://www.facebook.com/sharer.php?u={{url($post->post_slug)}}" data-toggle="tooltip" title="" data-original-title="Facebook">
                     <i class="fa fa-facebook"></i>
                     </a>
                  </li>
                  <li>
                     <a style="padding: 10px 13px;" class="color-tooltip twitter" target="_blank" data-toggle="tooltip" title="" href="http://twitter.com/share?url={{url($post->post_slug)}}" data-original-title="Twitter">
                     <i class="fa fa-twitter"></i>
                     </a>
                  </li>
                  <li>
                     <a style="padding: 10px 10px;" class="color-tooltip google-plus" target="_blank" data-toggle="tooltip" title="" href="https://plus.google.com/share?url={{url($post->post_slug)}}" data-original-title="Google-plus">
                     <i class="fa fa-google-plus"></i>
                     </a>
                  </li>
                  <li>
                     <a style="padding: 10px 13px;" class="color-tooltip dribbble" target="_blank" data-toggle="tooltip" title="" href="http://www.pinterest.com/pin/create/button/?url={{url($post->post_slug)}}" data-original-title="instagram">
                     <i class="fa fa-instagram"></i>
                     </a>
                  </li>
               </ul>
            </div>
            @if($post->comment_status=='yes')
               <div class="tzcomments-area">
                  <h3 class="tz-title-comment">VIẾT BÌNH LUẬN CỦA BẠN:</h3>
                  
                  <div class="fb-comments" data-href="{{url($post->post_slug)}}" data-width="100%" data-numposts="5"></div>
               </div>
            @endif
         </div>
      </div>
   </section>
   <!--end class tzblog-wrap-->

</div>

@stop