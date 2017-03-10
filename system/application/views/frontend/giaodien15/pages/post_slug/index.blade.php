@extends('frontend.giaodien15.layouts.default')
@section('content')
<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <img src="//hstatic.net/033/1000104033/1000147703/bg-breadcrumb.jpg?v=55" alt="">
      <div class="inner">
         <div class="breadcrumb-list">
            <a href="/" title="Quay lại trang chủ">Trang chủ</a>
            <span aria-hidden="true">/</span>
            <!-- <span>Tin tức</span> -->
         </div>
         <h3 class="page_name">{{$slug_name}}</h3>
      </div>
   </nav>
   <!-- /templates/blog.liquid -->
   <div class="grid--rev">
      <div class="grid__item large--three-quarters">
         <h1>{{$slug_name}}</h1>
         <div class="list-blog">
             @foreach($dataNews as $data)
                  <?php 
                      $username = (!empty($data->user_nickname)) ? $data->user_nickname : $data->user_email;
                      $date     = date('d/m/Y',$data->post_date);
                      $time     = date('h:i',$data->post_date);
                      $value    = decode_serialize($data->meta_value);
                  ?>
                  <article class="post">
                     <h4><a href="{{url($data->post_slug)}}">{{$data->post_title}}</a></h4>
                     <p class="entry-meta">Người viết <strong>{{$username}}</strong> lúc <time datetime="2016-08-02">{{$date}} {{$time}} </time></p>
                     <div class="rte">
                        <a href="{{url($data->post_slug)}}" title="" class="post-thumbnail">
                           <div><img src="{{ loadFeatureImage($value['post_featured_image']) }}" data-mce-src="//hstatic.net/033/1000104033/10/2016/8-2/blog-29.jpg"></div>
                        </a>
                        <p class="entry-content">{{$data->post_excerpt}}</p>
                     </div>
                     
                     <p><a class="btn" href="{{url($data->post_slug)}}">Xem nhiều hơn →</a></p>
                     <hr>
                  </article>
            @endforeach
           
         </div>
         
          <div class="pagination">
           @if($dataNews->currentPage() != 1)
              <span class="prev">
                  <a href="{{ $dataNews->url($dataNews->currentPage()-1) }}"><-</a>
              </span>
              @endif
              @for ($i = 1; $i <= $dataNews->lastPage(); $i++)
                  <span class="{{ ($dataNews->currentPage() == $i) ? 'page current' : 'page' }}">
                      <a href="{{ $dataNews->url($i) }}">{{ $i }}</a>
                  </span>
              @endfor
              @if($dataNews->currentPage() != $dataNews->lastPage())
              <span class="next">
                  <a href="{{ $dataNews->url($dataNews->currentPage()+1) }}" >-></a>
              </span>
           @endif
           
         </div>
      </div>
      <div class="sidebar grid__item large--one-quarter">
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
      </div>
   </div>
</main>
@stop

       