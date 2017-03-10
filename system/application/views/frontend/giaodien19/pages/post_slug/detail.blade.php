@extends('frontend.giaodien19.layouts.default')
@section('content')

<?php 
    $username = (!empty($post->user_nickname)) ? $post->user_nickname : $post->user_email;
    $date     = date('d/m/Y',$post->post_date);
    $value    = decode_serialize($post->meta_value);
?>
<div id="article" class="article-detail clearfix container">
   <div class="col-md-12 blog-breadcrumb">
      <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
         <li><a href="/" target="_self">Trang chủ</a></li>
    <!--      <li><a href="/blogs/news" target="_self">Tin tức</a> </li> -->
         <li class="active"><span>{{$post->post_title}}</span></li>
      </ol>
   </div>
   <div class="col-md-12 col-sm-12 col-xs-12 article">
      <div class="main-content">
         <!-- Begin article -->
         <div class="article-body">
            <div class="col-md-9 articles clearfix" id="layout-page">
               <div class="header-ar">
                  <h1>{{$post->post_title}}</h1>
                 
                  <p class="au">
                     Của <span class="name">{{$username}}</span> <!-- thuộc chuyên mục <a href="/blogs/news"><span class="name-bl"> Tin tức </span></a> -->
                  </p>
                 
               </div>
               <div class="content-page row">
                  
                  <div class="col-md-12 col-sm-12 col-xs-12 article-content">
                     <div class="post-thumb">
                        <img alt="{{$post->post_title}}" src="{{ loadFeatureImage($value['post_featured_image']) }}" data-mce-src="http://img.v3.news.zdn.vn/w660/Uploaded/ynssi/2016_01_22/Apple_Watch_zing1.JPG" data-mce-style="box-sizing: border-box; text-rendering: geometricPrecision; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; width: 560px; height: auto; background: transparent;" style="outline: 0px; color: rgb(85, 85, 85); font-size: 14px; line-height: 20px; box-sizing: border-box; text-rendering: geometricPrecision; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; width: 560px; height: auto; background: transparent;"><br data-mce-bogus="1">
                     </div>
                     <!-- /blog-alt-image -->
                     <div class="body-content">
                        {!! $post->post_content!!}
                     </div>
                  </div>
                  @if($post->comment_status=='yes')
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- Begin article comments  facebbok-->
                        <div class="fb-comments" data-href="{{url($post->post_slug)}}" data-width="100%" data-numposts="5">
                        </div>
                        <!-- End article comments -->
                     </div>
                  @endif
               </div>
               <div class="clearfix"></div>
            </div>
            <!-- End article--> 
            <!-- Begin sidebar -->
            <div class="col-md-3 hidden-xs clearfix news">
               <div class="sidebar">
                     <!-- Widget kkkkkkkkkk -->
                        {!!showWidget('widgetkkkkkkkkkk')!!}
                      <!-- End Widget kkkkkkkkkk -->
                     
                      <!-- Widget iiiiiiiiii -->
                        {!!showWidget('widgetiiiiiiiiii')!!}
                      <!-- End Widget iiiiiiiiii -->
                  <div class="fangae-blog">
                     <div class="block-title"> Chúng tôi ở đây </div>
                     <div class="page-face">
                        <div class="fb-page" data-href="{{ $facebook['url'] }}" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="{{ $facebook['url'] }}" class="fb-xfbml-parse-ignore"><a href="{{ $facebook['url'] }}">Mose - QMPLus</a></blockquote></div>
             
                     </div>
                  </div>
               </div>
               <!-- End sidebar -->
            </div>
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
          