@extends('frontend.giaodien12.layouts.default')
@section('content')
            
<div class="header-breadcrumb">
    <div class="container">
        <div class="row ">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/" title="Trang chủ">Trang chủ</a></li>
                   <!--  <li><a href="/tin-tuc">Tin tức</a></li> -->
                    <li class="active breadcrumb-title">{{ $post->post_title }}</li>
                </ol>
            </div>
        </div>
    </div>
</div> 


<section class="mtb25">
<div class="container">
<div class="row">
           <!--dong o left-->
<?php 
        $username = (!empty($post->user_nickname)) ? $post->user_nickname : $post->user_email;
        $date     = date('d/m/Y',$post->post_date);
        $value    = decode_serialize($post->meta_value);
?>
<div class="megamenu-right col-md-9 col-md-push-3">
   <div class="row">
      <div class="section-article">
         <div class="blog-item">
            <h1 class="blog-name" title="{{ $post->post_title }}">{{ $post->post_title }}</h1>
            <p class="blog-info"><i class="fa fa-calendar"></i> {{$date}} <i class="fa fa-pencil-square-o"></i> {{$username}}
            </p>
            <div class="blog-description">
               {!! $post->post_content !!}
            </div>
            <div class="addthis">
               <script type="text/javascript" src="{{ loadFeatureImage($value['post_featured_image']) }}" async="async"></script>	
               <div class="addthis_native_toolbox"></div>
            </div>
         </div>
         
         <div id="comments" class="section-comments comment">
          
           <div class="fb-comments" data-href="{{url($post->post_slug)}}" data-width="100%" data-numposts="5"></div>
         </div>
          
          <div class="othernews">
            <!-- Widget 888888 -->
              {!!showWidget('widget888888')!!}
            <!-- End Widget 888888 -->
                 
          </div>
         
      </div>
   </div>
</div>
           
           
           
           
<!-- Left -->
<div class="megamenu-left col-md-3 col-md-pull-9">
  <div class="cd-dropdown-wrapper">
    <!-- Danh mục sản phẩm -->
        <!-- Widget 111111 -->
          {!!showWidget('widget111111')!!}
        <!-- End Widget 111111 -->
    <!-- .cd-dropdown -->
  </div>
  <!-- .cd-dropdown-wrapper -->

  <!-- Nhà sản xuất -->
  <!-- Widget 222222 -->
    {!!showWidget('widget222222')!!}
    <!-- End Widget 222222 -->
  
  <!-- Sản phẩm nổi bật -->
  <!-- Widget 333333 -->
    {!!showWidget('widget333333')!!}
    <!-- End Widget 333333 -->
  
  <!-- Video -->
  <!-- Widget 666666 -->
    {!!showWidget('widget666666')!!}
    <!-- End Widget 666666 -->
</div>
</div>
</div>
</section>
<!--dong right-->
<!-- End Left -->  


@stop