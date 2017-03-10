@extends('frontend.giaodien3.layouts.default')
@section('content')
<div id="root"></div>
 <div class="product-area">
    <!-- BREADCRUMB -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"> <a href="{!! url('/') !!}" title="Trang chủ">Trang chủ<i class="sp_arrow">/</i></a></li>
                        <li><strong>{{ $slug_name }}</strong></li>
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
            <div class="sidebar-right">
                    <!-- Widget 5 -->
                    <?php
                        $posts = get_post_cat_limit($post_slug_1,3);
                        $headingText = get_taxonomy_name($post_type_1,$post_slug_1);
                        if( $headingText == '' ) $headingText = 'Bài viết Mới';
                    ?>
                    @if($posts)
                    <div class="recent-post">
                        <h3 class="right-bar-title">{{ $headingText }}</h3>
                        @foreach($posts as $post)
                        <div class="single-recent-post">
                            <div class="post-thumb">
                                <a href="{{url($post->post_slug)}}" title="{{$post->post_title}}">
                                <img alt="{{$post->post_title}}" src="{{ get_image_url($post->post_image) }}">
                                </a>
                            </div>
                            <div class="post-info">
                                <h3><a title="{{$post->post_title}}" href="{{url($post->post_slug)}}">{{$post->post_title}}</a></h3>
                                <div class="post-date">{{date('d/m/Y',$post->post_date)}}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <!-- End Widget 5 -->
                </div>
            </div>
            <!-- END COL-LG-3  -->
            
            
            <!-- COL-LG-9 -->
            <div class="col-lg-9 col-md-9">
                <div class="blog-post-content">
                    <!-- SINGLE-BLOG-START -->
                    @foreach($dataNews as $data)
                        <?php 
                            $username = (!empty($data->user_fullname)) ? $data->user_fullname : $data->user_email;
                            $date     = date('d-m-Y',$data->post_date);
                            $excerpt = get_excerpt(!empty($data->post_excert) ? $data->post_excert: $data->post_content,30);
                        ?>
                    <div class="single-blog">
                        <div class="hedding">
                            <h3 class="blog-hedding">
                                <a href="{!! url($data->post_slug) !!}">{{ $data->post_title }}</a>
                            </h3>
                        </div>
                        <div class="interview">
                            <div class="author_blog">
                                <p><span class="glyphicon glyphicon-user"></span> &nbsp; {!! $username !!}</p>
                            </div>
                            <div class="date_blog">
                                <p><span class="glyphicon glyphicon-time"></span> &nbsp; {!! $date !!}</p>
                            </div>
                            @if($data->comment_status=='yes')
                            <div class="comment_blog">
                                <p class="comments" slug="{{$data->post_slug}}" style="cursor: pointer;-webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none;"><span class="glyphicon glyphicon-comment"></span> &nbsp;  
                                <span class="fb-comments-count" data-href="{{ url($data->post_slug) }}"></span> nhận xét</p>
                            </div>
                            @endif
                        </div>
                        <div class="post-thumbnail">
                            <a href="{!! url($data->post_slug) !!}" title="{{ $data->post_title }}">
                            <img alt="{{ $data->post_title }}" src="{{ get_image_url($data->post_image) }}">
                            </a>
                        </div>
                        <div class="postinfo-wrapper">
                            <div class="post-info">
                                <div class="post-decrip">
                                    <p>{!! $excerpt !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="fb-comments fb-comments-{{$data->post_slug}}" data-href="{{ url($data->post_slug) }}" data-width="100%" data-numposts="5" style="display:none"></div>
                    </div>
                    @endforeach()
                    <!-- SINGLE-BLOG-END -->
                    
                    <div class="paginations pull-right">
                        {{ $dataNews->links() }}
                    </div>

                    <?php
                    /*
                    <!-- PAGINATION-START -->
                    <div class="col-xs-12 col-lg-12 col-md-12" style="padding:0px;">
                        @if ($dataNews->lastPage() > 1)
                        <div class="paginations">
                            <ul>
                                @if($dataNews->currentPage() != 1)
                                <li>
                                    <a href="{{ $dataNews->url($dataNews->currentPage()-1) }}">Trang Trước</a>
                                </li>
                                @endif
                                @for ($i = 1; $i <= $dataNews->lastPage(); $i++)
                                    <li class="{{ ($dataNews->currentPage() == $i) ? 'current' : '' }}">
                                        <a href="{{ $dataNews->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                @if($dataNews->currentPage() != $dataNews->lastPage())
                                <li>
                                    <a href="{{ $dataNews->url($dataNews->currentPage()+1) }}" >Trang Sau</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                        @endif
                    </div>
                    <!-- PAGINATION-START END-->
                    */
                    ?>
                    
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