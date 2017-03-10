@extends('frontend.giaodien3.layouts.default')
@section('content')
<div class="product-area">
   
    <!-- BREADCRUMB -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="breadcrumbs">
                <ul>
                    <li class="home"> <a href="{!! url('/') !!}" title="Trang chủ">Trang chủ<i class="sp_arrow">/</i></a></li>
                    <!--
                    <li><a href="{!! url('news.html') !!}">Tin Tức</a></li>
                    -->
                    <li><strong>{{ $post->post_title }}</strong></li>
                </ul>
            </div>
            </div>
        </div>
    </div>
    <!-- END BREADCRUMB -->
    
    <div class="blog-content-area">
    <div class="container">
        <div class="row">
            <!-- COL-LG-3 -->
            <div class="col-lg-3 col-md-3">
                <!-- Widget 5 -->
                <div class="sidebar-right">
                    <!-- RECENT-POST-START -->
                    
                    <?php
                        $post_cats = get_post_cat_limit($post_slug_2,3);
                        $headingText = get_taxonomy_name($post_type_2,$post_slug_2);
                        if( $headingText == '' ) $headingText = 'Bài viết Mới';
                    ?>
                    @if($post_cats)
                    <div class="recent-post">
                        <h3 class="right-bar-title">{{ $headingText }}</h3>
                        @foreach($post_cats as $post_cat)
                        <div class="single-recent-post">
                            <div class="post-thumb">
                                <a href="{{url($post_cat->post_slug)}}" title="{{$post_cat->post_title}}">
                                <img alt="{{$post_cat->post_title}}" src="{{ get_image_url($post_cat->post_image) }}">
                                </a>
                            </div>
                            <div class="post-info">
                                <h3><a title="{{$post_cat->post_title}}" href="{{url($post_cat->post_slug)}}">{{$post_cat->post_title}}</a></h3>
                                <div class="post_cat-date">{{date('d/m/Y',$post_cat->post_date)}}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif


                    <!-- RECENT-POST-END -->
                    <!-- PRODUCT-START -->
                    <?php $list_cats = get_taxonomy_post( 'post_tag') ?>
                    @if($list_cats)
                    <div class="tags">
                        <h3 class="right-bar-title">Tags bài viết</h3>
                        <ul>
                            @foreach($list_cats as $cat)
                            <li> 
                                <a href="{{url($cat->taxonomy_slug)}}" title="{{$cat->taxonomy_slug}}">{{$cat->taxonomy_name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <!-- PRODUCT-END -->
                </div>
                <!-- End Widget 5 -->
            </div>
            <!-- END COL-LG-3  -->
            
            
            <!--COL-LG-9 -->
            <?php 
                $username = (!empty($post->user_fullname)) ? $post->user_fullname : $post->user_email;
                $date     = date('d-m-Y',$post->post_date);
            ?>
            <div class="col-lg-9 col-md-9">
                <div class="blog-post-content">
                    <div class="single-blog">
                        <div class="hedding">
                            <h1 class="blog-hedding">
                                <a href="{!! url($post->post_slug) !!} ">{{ $post->post_title }}</a>
                            </h1>
                        </div>
                        <div class="interview">
                            <div class="author_blog">
                                <p><span class="glyphicon glyphicon-user"></span> &nbsp; {{ $username }}</p>
                            </div>
                            <div class="date_blog">
                                <p><span class="glyphicon glyphicon-time"></span> &nbsp; {{ $date }}</p>
                            </div>
                            @if($post->comment_status=='yes')
                                 <div class="comment_blog">
                                <p class="comments" slug="{{$post->post_slug}}" style="cursor: pointer;-webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none;">
                                <span class="glyphicon glyphicon-comment"></span> &nbsp;  <span class="fb-comments-count" data-href="{{ url($post->post_slug) }}"></span> nhận xét</p>
                            </div>
                            @endif
                        </div>
                        <div class="postinfo-wrapper">
                            <div class="post-info">
                                <div class="post-decrip">
                                    {!! $post->post_content !!}
                                </div>
                            </div>
                        </div>
                        <div class="fb-comments fb-comments-{{$post->post_slug}}" data-href="{{ url($post->post_slug) }}" data-width="100%" data-numposts="5"></div>
                    </div>
                </div>
            </div>
             <!-- END COL-LG-9  -->
            
        </div>
    </div>
</div>
</div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1136963499687042";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$(".comments").on('click', function() {
    var btn = $(this);
    // alert($(btn).attr('slug')) 
   $(".fb-comments-"+ $(btn).attr('slug')).toggle();

});
</script>
@stop