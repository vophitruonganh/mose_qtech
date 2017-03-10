@extends('frontend.giaodien11.layouts.default')
@section('content')
  
      
<div class="breadcrumbs">
<div class="container">
  <div class="row">
     <ul>
        <li class="home"> <a href="/" title="Trang chủ">Trang chủ</a><span>|</span></li>
        <li><strong>{{$slug_name}}</strong></li>
     </ul>
  </div>
</div>
</div> 
     

<div class="main-container col2-left-layout">
   <div class="main container">
      <div class="row">
      
       
         <div class="col-main col-sm-9 col-sm-push-3">
             
                <div class="page-title" style="border-bottom: #ddd double;">
                   <h1>{{$slug_name}}</h1>
                </div>
                <div class="blog-wrapper" id="main">
                   <div class="site-content" id="primary">
                      <div role="main" id="content">
                         @foreach($dataNews as $data)
                          <?php 
                              $username = (!empty($data->user_fullname)) ? $data->user_fullname : $data->user_email;
                              $date     = date('d/m/Y',$data->post_date);
                              $excerpt = get_excerpt(!empty($data->post_excerpt) ? $data->post_excerpt: $data->post_content, 50);
                              
                          ?>
                             <article class="blog_entry clearfix">
                                <header class="blog_entry-header clearfix">
                                   <div class="blog_entry-header-inner">
                                      <h3 class="blog_entry-title"> <a rel="bookmark" href="{{url($data->post_slug)}}">{{$data->post_title}}</a> </h3>
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
                                <div class="entry-content">
                                   <div class="featured-thumb">
                                      <a href="{{url($data->post_slug)}}" title="{{url($data->post_title)}}">
                                      <img src="{{get_image_url($data->post_image)}}" alt="{{url($data->post_title)}}">
                                      </a>
                                   </div>
                                   <div class="entry-content">
                                      <p></p>
                                      <p style="text-align: justify;">{{$excerpt}}</p>
                                      <p></p>
                                   </div>
                                </div>
                             </article>
                         @endforeach

                      </div>
                   </div>
                    <div class="clearfix"></div>
                    <div class="pull-right">
                      {{ $dataNews->links() }}
                    </div>
                   <?php
                   /*
                   <div class="pager">
                      <div class="pages">
                         <ul class="pagination">
                              @if($dataNews->currentPage() != 1)
                                <li>
                                    <a href="{{ $dataNews->url($dataNews->currentPage()-1) }}">Trang Trước</a>
                                </li>
                                @endif
                                @for ($i = 1; $i <= $dataNews->lastPage(); $i++)
                                    <li class="{{ ($dataNews->currentPage() == $i) ? 'active' : '' }}">
                                        <a href="{{ $dataNews->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                @if($dataNews->currentPage() != $dataNews->lastPage())
                                <li>
                                    <a href="{{ $dataNews->url($dataNews->currentPage()+1) }}" >Trang Sau</a>
                                </li>
                                @endif
                             <!--<li><a href="/collections/all?page=1" title="1">«</a></li>-->
                            
                         </ul>
                      </div>
                   </div>
                    */
                   ?>
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