@extends('frontend.giaodien11.layouts.default')
@section('content')

<?php 
      if(count($post)>0)
      {
            $username = (!empty($post->user_fullname)) ? $post->user_fullname : $post->user_email;
            $date     = date('d/m/Y',$post->post_date);
           
      } 
               
            
 ?>
      
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ</a><span>|</span></li>
            <li><a href="/tin-tuc">Tin tức</a></li>
            <li><span style="margin-right:5px;">|</span><strong>{{$post->post_title}}</strong></li>
         </ul>
      </div>
   </div>
</div>
<div class="main-container col2-left-layout">
   <div class="main container">
      <div class="row">
         
         <div class="col-main col-sm-9 col-sm-push-3">
            <div class="page-title">
               <h2>Blog</h2>
            </div>
            <div class="blog-wrapper" id="main">
               <div class="site-content" id="primary">
                  <div role="main" id="content">
                     <article class="blog_entry clearfix">
                        <header class="blog_entry-header clearfix">
                           <div class="blog_entry-header-inner">
                              <h1 class="blog_entry-title">{{$post->post_title}}</h1>
                           </div>
                           <div class="interview">
                              <div class="author_blog">
                                 <p><span class="glyphicon glyphicon-user"></span> &nbsp; {{$username}}</p>
                              </div>
                              <div class="date_blog">
                                 <p><span class="glyphicon glyphicon-calendar"></span> &nbsp; {{$date}}</p>
                              </div>
                              
                           </div>
                           <!--blog_entry-header-inner--> 
                        </header>
                        <!--blog_entry-header clearfix-->
                        <div class="entry-content">
                           {!!$post->post_content!!}
                        </div>
                     </article>
                   
                  </div>
                   @if($post->comment_status =='yes')
                   <div class="comment">
                       <div class="fb-comments" data-href="{{url($post->post_slug)}}" data-width="100%" data-numposts="5"></div>
                   </div>
                   @endif
                   <div class="othernews">
                   <?php $post_related = get_post_related( 'post_category ', $post->post_slug, '5'  ) ?>
                   <span>Các bài viết khác</span>
                      <ul>
                         @foreach( $post_related as $data)
                         <?php 
                              $excerpt = get_excerpt((!empty($data->post_excerpt) ? $data->post_excerpt: $data->post_content) , 20) ;
                          ?>
                          <li><a href="{{$data->post_slug}}" style="text-decoration:none;">{{$excerpt}}</a> (02.05.2014)</li>
                         @endforeach
                      </ul>
                    </div>
                   
                  
               </div>
            </div>
         </div>
          <!-- left -->

            <div class="col-right sidebar col-sm-3 col-sm-pull-9">
             <?php $list_tax = get_taxonomy_product( 'product_category' ) ?>
                 @if($list_tax)
                 <div class="box_collection_pr">
                    <div class="title_st">
                       <h2>Danh mục sản phẩm</h2>
                       <span class="arrow_title visible-md visible-md"></span>
                       <div class="show_nav_bar hidden-lg hidden-md"></div>
                    </div>
                    <div class="list_item">
                       <ul>
                        @foreach($list_tax as $tax)
                          <li> <a href="{{url('collections/'.$tax->taxonomy_slug)}}">{{$tax->taxonomy_name}}</a> </li>
                        @endforeach
                       </ul>
                    </div>
                 </div>
                 @endif

                 <?php $list_tax = get_taxonomy_post('post_category') ?>
                 
                 @if($list_tax)
                 <div class="box_collection_pr">
                    <div class="title_st">
                       <h2>Danh mục tin tức</h2>
                       <span class="arrow_title"></span>
                    </div>
                    <div class="list_item">
                       <ul>
                          @foreach($list_tax as $tax)
                          <li><a href="{{url($tax->taxonomy_slug)}}">{{$tax->taxonomy_name}}</a></li>
                          @endforeach
                       </ul>
                    </div>
                 </div>
                 @endif
                
                <?php
                  $posts = get_post_cat_limit($post_slug_2,5);
                  $headingText = get_taxonomy_name($post_type_2,$post_slug_2);
                  if( $headingText == '' ) $headingText = 'Bài viết Mới';
                ?>
                 @if($posts)
                 <div class="popular-posts widget widget__sidebar stl_list_item " id="recent-posts-4">
                    <div class="title_st">
                       <h2>{{ $headingText }}</h2>
                       <span class="arrow_title"></span>
                    </div>
                    <div class="widget-content">
                       <ul class="posts-list unstyled clearfix">
                          @foreach( $posts as $post)
                            <li>
                             <figure class="featured-thumb" style="width:35%">
                                <a href="{{url($post->post_slug)}}" title="{{$post->post_title}}">
                                <img src="{{get_image_url($post->post_image)}}" style=" width: 100px;" alt="{{$post->post_title}}">
                                </a> 
                             </figure>
                             <!--featured-thumb-->
                             <h4><a title="{{$post->post_title}}" href="{{url($post->post_slug)}}">{{$post->post_title}}</a></h4>
                             <p class="post-meta"><i class="icon-calendar"></i>
                                <time class="entry-date">{{date('d/m/Y', $post->post_date)}}</time>
                                .
                             </p>
                          </li>
                          @endforeach
                          
                         
                       </ul>
                    </div>
                    <!--widget-content--> 
                 </div>
                 @endif

                 <div class="ad-spots widget widget__sidebar">
                    <!-- <div class="widget-content"><a target="_self" href="#" title=""><img alt="offer banner" src="//bizweb.dktcdn.net/100/049/382/themes/145846/assets/blog-offer-banner.jpg?1470100651174"></a></div> -->
                 </div>
          </div>
          <!-- end left -->
      </div>
   </div>
</div>
   
     
      
@stop