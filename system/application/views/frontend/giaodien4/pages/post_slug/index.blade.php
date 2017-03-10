@extends('frontend.giaodien4.layouts.default')
@section('content')

<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="col-md-12 ">
            <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
               <li><a href="{{ url('/') }}" target="_self">Trang chủ</a></li>
               <li class="active"><span>{{$slug_name}}</span></li>
            </ol>
         </div>
      </div>
   </div>
</div>


<div class="container">
   <div class="row">
      <!--Begin Content-->
      <div class="col-lg-12">
         <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
               <!-- Begin: Nội dung blog --> 
               <div class="content-blog">
               @foreach($dataNews as $data)
                  <?php 
                      $username = (!empty($data->user_fullname)) ? $data->user_fullname : $data->user_email;
                      $date     = date('d-m-Y',$data->post_date);
                  ?>

                  <div class="topLine">
                     <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <a href="{!! url($data->post_slug) !!}">
                        <img src="{{ get_image_url($data->post_image) }}">
                        </a>
                     </div>
                     <div class="dd col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <h2><a href="{!! url($data->post_slug) !!}">{{ $data->post_title }}</a></h2>
                        <span class="first-bor"><a href="#">Người đăng: {{$username}}</a></span><span>{{$date}}</span>
                        <span><a href="#"> Tin tức </a></span>
                        @if($data->comment_status=='yes')
                        <span><em class="views">
                        <i class="comment-icon fa fa-comments-o"slug="{{$data->post_slug}}" style="cursor: pointer;-webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none;">
                        <a class="fb-comments-count" data-href="{{ url($data->post_slug) }}">
                        0</a> Bình luận</i>
                                     
                        </em></span>
                        @endif
                        <p>{{$data->post_excerpt}}
                           <a href="{!! url($data->post_slug) !!}">Xem thêm <i class="fa fa-arrow-right"></i></a>
                        
                        </p>
                        <div class="fb-comments fb-comments-{{$data->post_slug}}" data-href="{{ url($data->post_slug) }}" data-width="100%" data-numposts="5" style="display:none"></div>
                     </div>
                  </div>

               @endforeach
                   
               </div>
               <div class="col-lg-12 pagination-blog">
                  <div class="row">
                     <!-- Begin: Phân trang blog --> 
                     <div id="pagination" class="pw">
                     
                        @if ($dataNews->lastPage() > 1)
                           @if($dataNews->currentPage() != 1)
                                <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">
                                 <a class="prev" href="{{ $dataNews->url($dataNews->currentPage()-1) }}"><span><i class=" fa fa-angle-left"></i>Trang trước  </span></a>
                            </div>
                           @endif
                            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 text-center">
                           @for ($i = 1; $i <= $dataNews->lastPage(); $i++)
                                 @if($dataNews->currentPage() == $i)
                                  <span class="page-node current">{{ $i }}</span>
                                 @else 
                                    <a class="page-node" href="{{ $dataNews->url($i) }}">{{$i}}</a>
                                 @endif
                                   
                            @endfor
                             </div>

                           @if($dataNews->currentPage() != $dataNews->lastPage())
                              <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">
                                 <a class="pull-right next" href="{{ $dataNews->url($dataNews->currentPage()+1) }}"><span>Trang sau <i class="fa fa-angle-right"></i></span></a>
                              </div>
                           @endif
                        @endif
                      </div>
                     
                     <!-- End: Phân trang blog --> 
                  </div>
               </div>
            </div>
            <div class="col-md-3  hidden-sm hidden-xs">
               <!-- Begin sidebar blog -->
               <div class="sidebar">
                  <!-- Begin: Danh mục tin tức -->
                  <?php $list_cat = get_taxonomy_post('post_category') ?>
                  @if($list_cat)
                     <div class="news-menu list-group">
                        <span class="list-group-item active">Danh mục bài viết</span>
                        <ul class="nav sidebar" id="menu-blog">
                           @foreach($list_cat as $cat )
                           <li class=" first">
                              <a href="{{url($cat->taxonomy_slug)}}">
                              <span>{{$cat->taxonomy_name}}</span>
                              </a>
                           </li>
                           @endforeach
                        </ul>
                     </div>
                  @endif
          
                  <!-- End: Danh mục tin tức -->
                  <!--Begin: Bài viết mới nhất-->
                  <div class="news-latest list-group">
                     <?php
                        $posts = get_post_cat_limit($post_slug_2,4);
                        $headingText = get_taxonomy_name($post_type_2,$post_slug_2);
                        if( $headingText == '' ) $headingText = 'Bài viết Mới';
                     ?>
                     <span class="list-group-item active">
                     {{ $headingText }}
                     </span>
                     @foreach( $posts as $post )
                     <div class="article">
                        <div class="col-ld-3 col-md-3 col-sm-4 col-xs-4">
                           <a href="{{ url($post->post_slug) }}"><img src="{{ get_image_url($post->post_image) }}" alt="{{ $post->post_title }}"></a>
                        </div>
                        <div class="post-content  col-lg-9 col-md-9 col-sm-8 col-xs-8 ">
                           <a href="{{ url($post->post_slug) }}">{{ $post->post_title }}</a><span class="date"> <i class="time-date"></i>{{ date('d/m/Y',$post->post_date) }}</span>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <!--End: Bài viết mới nhất-->
               </div>
               <!-- End sidebar blog -->
            </div>
         </div>
      </div>
      <!--End Content-->
   </div>
</div>
   <script>(function(d, s, id) {
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) return;
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1136963499687042";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

   $(".comment-icon").on('click', function() {
       var btn = $(this);
       // alert($(btn).attr('slug')) 
      $(".fb-comments-"+ $(btn).attr('slug')).toggle();

   });
   </script>				
@stop