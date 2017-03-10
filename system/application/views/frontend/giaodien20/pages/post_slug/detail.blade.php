@extends('frontend.giaodien20.layouts.default')
@section('content')

<?php 
    $username = (!empty($post->user_nickname)) ? $post->user_nickname : $post->user_email;
    $date     = date('d/m/Y',$post->post_date);
    $time     = date('H:i:s',$post->post_date);
?>
<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <div class="inner">
         <a href="/" title="Quay lại trang chủ">Trang chủ</a>
         <span aria-hidden="true">/</span>
      <!--    <a href="/blogs/news" title="">Tin tức</a> -->
         <span aria-hidden="true">/</span>
         <span>{{$post->post_title}}</span>
      </div>
   </nav>
   <!-- /templates/article.liquid -->
   <div class="grid">
      <article class="grid__item large--three-quarters" itemscope="" itemtype="http://schema.org/Article">
         <header class="section-header">
            <div class="section-header__left">
               <h1>{{$post->post_title}}</h1>
               <p class="entry-meta">Người viết <strong>{{$username}}</strong> lúc <time datetime="2016-07-29">{{$date}} {{$time}} </time></p>
            </div>
         </header>
         <div class="rte" itemprop="articleBody">{!! $post->post_content !!}</div>          
         <!-- <ul class="inline-list">
            <li>
               <span>Tags:</span>
               <a href="/blogs/news/tagged/accessories">Accessories</a>, 
               <a href="/blogs/news/tagged/collections">Collections</a>, 
               <a href="/blogs/news/tagged/women">Women</a>, 
               <a href="/blogs/news/tagged/shop">Shop</a>, 
               <a href="/blogs/news/tagged/men">Men</a>, 
               <a href="/blogs/news/tagged/new">New</a>
            </li>
         </ul> -->
          @if($post->comment_status=='yes')
            <div class="fb-comments" data-href="{{url($post->post_slug)}}" data-width="100%" data-numposts="5"></div>
          @endif
      </article>
      <aside class="sidebar grid__item large--one-quarter" role="complementary">
         <!-- /snippets/blog-sidebar.liquid -->

         <div class="inner">
            
            <!-- Widget 9999999999b -->
               {!!showWidget('widget9999999999b')!!}
            <!-- End Widget 9999999999b -->
            
            <!-- Widget 9999999999c -->
               {!!showWidget('widget9999999999c')!!}
            <!-- End Widget 9999999999c -->
            
            <!-- Widget 8888888888 -->
               {!!showWidget('widget8888888888')!!}
            <!-- End Widget 8888888888 -->
            
            <!-- end category sidebar -->
            <div class="widget widget-ads">
               <a href="#"><img src="//hstatic.net/030/1000104030/1000147045/ads_block.jpg?v=96" alt=""></a>
            </div>
            <!-- end advertising -->



         </div>
      </aside>
   </div>
</main>


@stop 

