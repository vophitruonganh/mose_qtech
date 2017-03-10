@extends('frontend.giaodien19.layouts.default')
@section('content')
<div id="blog">
   <div class="main-content">
     
      <!-- Begin content -->
      <div class="container">
         <div class="col-md-12 ">
            <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
               <li><a href="/" target="_self">Trang chủ</a></li>
               <li class="active"><span>{{$slug_name}}</span></li>
            </ol>
         </div>
         <div class="blog-content">
            <div class="row">
               <div class="col-md-9 col-sm-8 col-xs-12" id="blog-container">
                  <div class="articles clearfix" id="layout-page">
                     <div class="visible-xs" style="display: none !important;">
                        <!-- Begin: Danh mục tin tức -->
                        <div class="news-menu list-group">
                           <span class="list-group-item active list-tfix">Danh mục</span>
                           <ul class="nav sidebar av-tfix">
                              <li class="active"><a href="/blogs/news/">{{$slug_name}}</a></li>
                           </ul>
                        </div>
                        <!-- End: Danh mục tin tức -->
                     </div>
                     <!-- Begin: Nội dung blog -->      
                      @foreach($dataNews as $data)
                         <?php 
                             $username = (!empty($data->user_nickname)) ? $data->user_nickname : $data->user_email;
                             $date     = date('d/m/Y',$data->post_date);
                             $value    = decode_serialize($data->meta_value);
                         ?>
                         <div class="news-content">
                           <div class="row">
                              <div class="col-sm-5 col-xs-12 img-article">
                                 <a href="{{url($data->post_slug)}}"><img alt="{{$data->post_title}}" src="{{ loadFeatureImage($value['post_featured_image']) }}" style="outline: 0px; color: rgb(85, 85, 85); font-size: 14px; line-height: 20px; box-sizing: border-box; text-rendering: geometricPrecision; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; width: 560px; height: auto; background: transparent;"><br data-mce-bogus="1"></a>
                              </div>
                              <div class="col-sm-7 col-xs-12">
                                 <!-- Begin: Nội dung bài viết -->
                                 <ul class="info-more hidden-xs">
                                    <!-- <li><a href="/blogs/news"> Tin Tức</a> </li> -->
                                 </ul>
                                 <h3 class="blogtt-xs visible-xs">
                                    <!-- <a href="/blogs/news"> Tin tức   </a> -->
                                 </h3>
                                 <h2 class="title-article"><a href="{{url($data->post_slug)}}">{{$data->post_title}}</a></h2>
                                 <div class="body-content">
                                    <p>{{$data->post_excerpt}}</p>
                                 </div>
                                 <!-- End: Nội dung bài viết -->
                              </div>
                           </div>
                        </div>
                        <hr class="line-blog">
                      @endforeach
                     

                  </div>
                  <div class="col-sm-12">
                     <div id="pagination" class="">
                        <!-- Begin: Phân trang blog --> 
                        <div id="pagination" class="clearfix">
                           <ul class="pagination">
                              @if($dataNews->currentPage()!=1)
                                 <li>
                                    <a href="{{str_replace('/?','?',$dataNews->url($dataNews->currentPage()-1))}}">Trước </a>
                                 </li>
                              @endif
                              @for($i=1;$i<=$dataNews->lastPage();$i=$i+1)
                                 <li class="{{($dataNews->currentPage()==$i)? 'active' : ''}}">
                                    <a href="{{str_replace('/?','?',$dataNews->url($i))}}">{{$i}}</a>
                                 </li>
                              @endfor
                              @if($dataNews->currentPage()!=$dataNews->lastPage())
                                 <li>
                                    <a class="next-arrow" href="{{str_replace('/?','?',$dataNews->url($dataNews->currentPage()+1))}}" title="2">Sau</a>
                              </li>
                              @endif
                           </ul>
                        </div>
                     </div>
                     <!-- End: Phân trang blog --> 
                  </div>
               </div>
               <div class="col-md-3 col-sm-4 hidden-xs clearfix">
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
                  
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End content -->
</div>
<script type="text/javascript">
  

      function order(i)
      {
         $("#form_order_"+i).submit();   
      }
</script>
@stop
          