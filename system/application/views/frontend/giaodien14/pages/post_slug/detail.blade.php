@extends('frontend.giaodien14.layouts.default')
@section('content')

<?php 
    $username = (!empty($post->user_nickname)) ? $post->user_nickname : $post->user_email;
    $date     = date('d/m/Y',$post->post_date);
?>
<div class="list-sections clearfix">
   <div id="article" class="article-detail clearfix">
      <div class="container article">
         <div class="main-content">
            <div class="row theme-breadcrumb">
               <div class="col-md-12 blog-breadcrumb">
                  <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
                     <li><a href="/" target="_self">Trang chủ</a></li>
                     <!-- <li><a href="/blogs/news" target="_self">Tin tức</a> </li> -->
                     <li class="active"><span>{{$post->post_title}}</span></li>
                  </ol>
               </div>
            </div>
            <div class="row article-body">
               <div class="col-md-9 articles clearfix" id="layout-page">
                  <div class="title-article">
                     <span class="header-page clearfix">
                        <h1>{{$post->post_title}}</h1>
                     </span>
                     <ul class="author-date-count">
                        <!--Begin:ngày giờ đăng bài viết  -->
                        <li class="date-post">
                           <p>
                              {{$date}}
                           </p>
                        </li>
                        <!--End:ngày giờ đăng bài viết  -->
                        <!--Begin: số bình luận  -->
                        @if($post->comment_status=='yes')
                           <li class="count-comment">
                              <a href="{{url($post->post_slug)}}">
                              <span class="fb-comments-count" data-href="{{ url($post->post_slug) }}"> </span> Bình luận
                              </a>
                           </li>
                        @endif
                        
                        <!--End: số đăng bình luận   -->
                     </ul>
                  </div>
                  <div class="content-page">
                     <div class="article-content">
                        <div class="body-content">
                           {!! $post->post_content !!}
                        </div>
                        <div class="row clearfix pl0">
                           @if($post->comment_status =='yes')
                              <!-- Begin article comments -->
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
                                 <div role="tabpanel" class="row product-comment">
                                    <!-- Nav tabs -->
                                    <ul class="nav visible-lg visible-md" role="tablist">
                                       <li role="presentation" class="active">
                                          <a data-spy="scroll" data-target="#comment" href="#comment" aria-controls="comment" role="tab">Viết bình luận</a>
                                       </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div id="comment">
                                       <!-- Begin comments -->
                                      <div class="fb-comments" data-href="{{url($post->post_slug)}}" data-width="100%" data-numposts="5"></div>
                                       <!-- End comments -->
                                    </div>
                                 </div>
                              </div>
                           @endif
                           <!-- End article comments -->
                        </div>
                     </div>
                  </div>
                  <!-- End article--> 
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
         
     