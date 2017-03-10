@extends('frontend.giaodien14.layouts.default')
@section('content')        
  
<div class="list-sections clearfix">
   <div id="article" class="article-detail clearfix">
      <div class="container article">
         <div class="main-content">
            <div class="row theme-breadcrumb">
               <div class="col-md-12 blog-breadcrumb">
                  <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
                     <li><a href="/" target="_self">Trang chủ</a></li>
                     <li><a href="/blogs/news" target="_self">{{$slug_name}}</a> </li>
                  </ol>
               </div>
            </div>
            <div class="row article-body">
               <div class="col-md-9 articles clearfix" id="layout-page">
                        <div class="row">
                           <section class="section-blog">
                              <div class="section-blog-title">
                                 <h1 class="section-blog-title-heading">{{$slug_name}}</h1>
                              </div>
                              @foreach($dataNews as $data)
                                 <?php 
                                     $username = (!empty($data->user_nickname)) ? $data->user_nickname : $data->user_email;
                                     $date     = date('d-m-Y',$data->post_date);
                                     $value    = decode_serialize($data->meta_value);
                                 ?>
                                 <div class="blog-item">
                                    <div class="col-md-5">
                                       <div class="blog-img">
                                          <a href="{{url($data->post_slug)}}" title="{{url($data->post_title)}}"><img src="{{ loadFeatureImage($value['post_featured_image']) }}" alt="{{$data->post_title}}"></a>
                                       </div>
                                    </div>
                                    <div class="col-md-7">
                                       <h3 class="blog-name"><a href="{{url($data->post_slug)}}" title="{{url($data->post_title)}}">{{$data->post_title}}</a></h3>
                                       <p class="blog-description">{{$data->post_excerpt}} </p>
                                    </div>
                                 </div>
                              @endforeach
                           
                              <div class="col-xs-12">
                                 <div class="blog-info-page">
                                    <ul class="pagination pagination-blog">
                                    @if($dataNews->currentPage() != 1)
                                         <li>
                                             <a href="{{ $dataNews->url($dataNews->currentPage()-1) }}"><<</a>
                                         </li>
                                         @endif
                                         @for ($i = 1; $i <= $dataNews->lastPage(); $i++)
                                             <li class="{{ ($dataNews->currentPage() == $i) ? 'active' : '' }}">
                                                 <a href="{{ $dataNews->url($i) }}">{{ $i }}</a>
                                             </li>
                                         @endfor
                                         @if($dataNews->currentPage() != $dataNews->lastPage())
                                         <li>
                                             <a href="{{ $dataNews->url($dataNews->currentPage()+1) }}" >>></a>
                                         </li>
                                   @endif
                     
                                    </ul>
                                    
                                 </div>
                              </div>
                           </section>
                        </div>
                     </div>
               <!-- Begin sidebar -->
               <div class="col-md-3 clearfix">
                  <div class="sidebar">
                     <!-- Begin: Danh mục tin tức -->
                     <!-- Widget 3333333 -->
                       {!!showWidget('widget3333333')!!}
                     <!-- End Widget 3333333 -->
                     

                     <!-- End: Danh mục tin tức -->
                     <!--Begin: Bài viết mới nhất-->
                     <!-- Widget 4444444 -->
                       {!!showWidget('widget4444444')!!}
                     <!-- End Widget 4444444 -->
                     
                     <!--End: Bài viết mới nhất-->
                  </div>
                  <!-- End sidebar -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
        
@stop
     