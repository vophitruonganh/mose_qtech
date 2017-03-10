@extends('frontend.giaodien20.layouts.default')
@section('content')


<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <div class="inner">
         <a href="/" title="Quay lại trang chủ">Trang chủ</a>
         <span aria-hidden="true">/</span>
         <span>{{$slug_name}}</span>
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
                       $time     = date('H:i:s',$data->post_date);
                       $value    = decode_serialize($data->meta_value);
                   ?>
                   <article class="post">
                     <h4><a href="{{url($data->post_slug)}}">{{$data->post_title}}</a></h4>
                     <p class="entry-meta">Người viết <strong>{{$username}}</strong> lúc <time datetime="2016-07-29">{{$date}} {{$time}} </time></p>
                     <div class="rte">
                        <div><img src="{{ loadFeatureImage($value['post_featured_image']) }}" data-mce-src="{{ loadFeatureImage($value['post_featured_image']) }}"></div>
                     </div>
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
                     <p><a class="btn" href="{{url($data->post_slug)}}">Xem nhiều hơn →</a></p>
                     <hr>
                  </article>
             @endforeach
            
             
             <div class="pagination">
                 @if($dataNews->currentPage()!=1)
                     <span class="prev">
                        <a href="{{str_replace('/?','?',$dataNews->url($dataNews->currentPage()-1))}}">←</a>
                    </span>
                  @endif
                  @for($i=1;$i<=$dataNews->lastPage();$i=$i+1)

                     <span class="{{($dataNews->currentPage()==$i)? 'page current' : 'page'}}">
                        <a href="{{str_replace('/?','?',$dataNews->url($i))}}">{{$i}}</a>
                     </span>
                  @endfor
                  @if($dataNews->currentPage()!=$dataNews->lastPage())
                     <span class="next">
                        <a class="next-arrow" href="{{str_replace('/?','?',$dataNews->url($dataNews->currentPage()+1))}}" title="2">→</a>
                     </span>
                  @endif
            </div>
         </div>
      </div>
       
       
      <div class="sidebar grid__item large--one-quarter">
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
      </div>
   </div>
</main>


@stop  

