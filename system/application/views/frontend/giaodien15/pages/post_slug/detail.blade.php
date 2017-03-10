@extends('frontend.giaodien15.layouts.default')
@section('content')

 <?php 
                $username = (!empty($post->user_nickname)) ? $post->user_nickname : $post->user_email;
                $date     = date('d/m/Y',$post->post_date);
                $time     = date('h:i:s',$post->post_date);
                $value    = decode_serialize($post->meta_value);
?>
<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <img src="//hstatic.net/033/1000104033/1000147703/bg-breadcrumb.jpg?v=55" alt="">
      <div class="inner">
         <div class="breadcrumb-list">
            <a href="/" title="Quay lại trang chủ">Trang chủ</a>
            <!-- <span aria-hidden="true">/</span>
            <a href="/blogs/news" title="">Tin tức</a>
            <span aria-hidden="true">/</span> -->
            <span>{{ $post->post_title }}</span>
         </div>
      </div>
   </nav>
   <!-- /templates/article.liquid -->
   <div class="grid">
      <article class="grid__item large--three-quarters" itemscope="" itemtype="http://schema.org/Article">
         <header class="section-header">
            <div class="section-header__left">
               <h1>{{ $post->post_title }}</h1>
               <p class="entry-meta">Người viết <strong>{{$username}}</strong> lúc <time datetime="2016-08-02">{{$date}} {{$time}}</time></p>
            </div>
         </header>
         <div class="rte" itemprop="articleBody">
            {!! $post->post_content!!}
         </div>
        
      </article>
      <aside class="sidebar grid__item large--one-quarter" role="complementary">
         <!-- /snippets/blog-sidebar.liquid -->
          <!-- Widget ffffffff -->
             {!!showWidget('widgetffffffff')!!}
           <!-- End Widget ffffffff -->
         
          <!-- Widget gggggggg -->
             {!!showWidget('widgetgggggggg')!!}
           <!-- End Widget gggggggg -->
         
          <!-- Widget hhhhhhhh -->
             {!!showWidget('widgethhhhhhhh')!!}
           <!-- End Widget hhhhhhhh -->
         
         <!-- end category sidebar -->
         <div class="widget widget-ads">
            @foreach($new as $row)
             <a href="{{ $row['url'] }}"><img src="{{ $row['image'] }}" alt=""></a>
              @endforeach
         </div>
         <!-- end advertising -->
      </aside>
   </div>
</main>

@stop