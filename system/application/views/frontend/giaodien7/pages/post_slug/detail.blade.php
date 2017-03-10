@extends('frontend.giaodien7.layouts.default')
@section('content')

<?php 
      if(count($post)>0)
      {
            $username = (!empty($post->user_fullname)) ? $post->user_fullname : $post->user_email;
            $date     = date('d/m/Y',$post->post_date);
            $time     = date('h:iA',$post->post_date);
      } 
               
            
 ?>
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="inner">
            <ul>
               <li class="home">
                  <a title="Quay lại trang chủ" href="/">Trang chủ</a>
               </li>
               /
               <li><a href="/tin-tuc">Tin tức</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
               <li class="cl_breadcrumb">{{$post->post_title}}</li>
            </ul>
         </div>
      </div>
   </div>
</div>
<section class="main-container col2-right-layout mg_top">
   <div class="main container">
      <div class="row">
         
         
         
                 
               <!-- Left -->
          <div class="col-lg-3 col-md-3 hidden-sm hidden-xs left-panel">
            <!-- Danh mục sản phẩm -->
            <?php $list_tax = get_taxonomy_product('product_category'); ?>
            @if( $list_tax )
            <div class="block bl_danhmucsanpham hidden-xs">
               <div class="block-title">
                  <h5>
                     <a href="collections/all">
                     <span>
                     <i class="fa fa-bars" aria-hidden="true"></i> &nbsp; Danh mục sản phẩm
                     </span>
                     </a>
                  </h5>
               </div>
               <div class="block-content">
                  <ul>
                    @foreach($list_tax as $tax)
                    <li class="level0 parent "><a href="{{ url('collections/'.$tax->taxonomy_slug) }}"><i class="fa fa-caret-right" aria-hidden="true"></i><span>{{ $tax->taxonomy_name }}</span></a></li>
                    @endforeach
                  </ul>
               </div>
            </div>
            @endif
            <!-- End Danh Mục Sản Phẩm -->
            <!-- Sản Phẩm Mới -->
            <?php
              $products_tax = get_product_tax_limit($product_type_1,$product_slug_1,8);
              $headingText = get_taxonomy_name($product_type_1,$product_slug_1);
              if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
            ?>
            @if( $products_tax )
            <div class="sanphambanchay block mg_bt mg_top">
               <div class="block-title pd_bt_10">
                  <h5 class="fw600"><span>{{ $headingText }}</span></h5>
               </div>
               <div class="block-content bd_old">
                  <div id="slideshowproboxwrapper">
                     <div class="slideshowprobox_best_sale_products">
                        <ul class="menu">
                          @foreach( $products_tax as $product )
                           <li class="product-loop-list">
                              <div class="prd-loop-list">
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 loop-img">
                                    <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                                    <img src="{{ get_image_url($product['product_image_id']) }}" alt="{{ $product['product_title'] }}">
                                    </a>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 loop-content">
                                    <p class="item-name"><a href="/benro-a1681tb0">{{ $product['product_title'] }}</a></p>
                                    <p class="item-price cl_main fw600"><span>{{ number_format($product['price_new'],0,'.','.') }}₫</span></p>
                                    @if( $product['price_old'] > 0 )
                                    <p class="item-price cl_old txt_line fs12"><span>{{ number_format($product['price_old'],0,'.','.') }}₫</span></p>
                                    @endif
                                 </div>
                              </div>
                           </li>
                          @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            @endif
            <!-- End Sản Phẩm Mới -->
            <!--
            <div class="hotrotructuyen block mg_bt mg_top">
               <div class="block-title pd_bt_10">
                  <h5 class="fw600"><span>Hỗ trợ trực tuyến</span></h5>
               </div>
               <div class="block-content bd_old pd_10">
                  <div class="support_loop">
                     <p class="fw600">Hỗ trợ bán hàng</p>
                     <p>Hotline<span class="cl_main">1900 6750</span></p>
                     <div class="support_loop_content">
                        <div class="support_loop_img">
                           <img src="//bizweb.dktcdn.net/thumb/thumb/100/091/136/themes/137517/assets/skype.png?1468549824886" height="24" width="50" alt="Skype">
                        </div>
                        <div class="support_loop_chat">
                           <span class="support_loop_style">Chat ngay để nhận tư vấn</span>
                        </div>
                     </div>
                  </div>
                  <div class="support_loop">
                     <p class="fw600">Hỗ trợ bán hàng</p>
                     <p>Hotline<span class="cl_main">1900 6750</span></p>
                     <div class="support_loop_content">
                        <div class="support_loop_img">
                           <img src="//bizweb.dktcdn.net/thumb/thumb/100/091/136/themes/137517/assets/skype.png?1468549824886" height="24" width="50" alt="Skype">
                        </div>
                        <div class="support_loop_chat">
                           <span class="support_loop_style">Chat ngay để nhận tư vấn</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            -->
            <div class="fanpage_facebook block mg_bt mg_top hidden-xs">
               <div class="block-content">
                  <div class="fb-page" data-href="{{ $facebook['url'] }}" data-tabs="timeline" data-height="230" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                     <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/MOSEVN">
                           <a href="https://www.facebook.com/MOSEVN">Facebook</a>
                        </blockquote>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Tin tức -->
            <?php
              $posts = get_post_cat_limit($post_slug_1,3);
              $headingText = get_taxonomy_name($post_type_1,$post_slug_1);
              if( $headingText == '' ) $headingText = 'Bài viết Mới';
            ?>
            @if( $posts )
            <div class="news_blogs block mg_bt mg_top">
               <div class="block-title pd_bt_10">
                  <h5><a href="tin-tuc"><span class="fw600">{{ $headingText }}</span></a></h5>
               </div>
               <div class="block-content bd_old pd_10">
                  <div id="owl-news-blog" class="owl-carousel owl-theme">
                    @foreach( $posts as $post )
                    <?php
                      $username = (!empty($post->user_fullname)) ? $post->user_fullname : $post->user_email;
                      $excerpt = !empty($post->post_excerpt) ? get_excerpt($post->post_excerpt,30) : get_excerpt($post->post_content,30);
                    ?>
                    <div class="item blog-post">
                        <div class="blog-image">
                           <a href="{{ url($post->post_slug) }}"><img src="{{ get_image_url($post->post_image) }}" alt="{{ $post->post_title }}"/></a>
                        </div>
                        <div>
                           <h5 class="fw600"><a href="{{ url($post->post_slug) }}">{{ $post->post_title }}</a></h5>
                           <p class="cl_old fs13">
                              <span><i class="fa fa-user" aria-hidden="true"></i> {{ $username }}</span> &nbsp;
                              <span><i class="fa fa-calendar" aria-hidden="true"></i> {{ date('d/m/Y',$post->post_date) }}</span>
                           </p>
                           <p class="cl_old">{{ $excerpt }}</p>
                        </div>
                     </div>
                    @endforeach
                  </div>
               </div>
            </div>
            @endif
            <!-- End Tin Tức -->
        </div>
              <!-- End left -->
      


         <div class="col-main col-sm-9" style="overflow: hidden;">
            <div class="blog-wrapper" id="main">
               <div class="site-content" id="primary">
                  <div role="main" id="content">
                     <article class="blog_entry clearfix wow bounceInLeft animated animated" id="203465" style="visibility: visible;">
                        <header class="blog_entry-header clearfix">
                           <div class="blog_entry-header-inner">
                              <h3 class="blog_entry-title fw600"><a href="{{url('/'.$post->post_slug)}}">{{$post->post_title}}</a></h3>
                           </div>
                           <div class="cl_old">
                              <span style="margin-right: 20px;"><i class="fa fa-user" aria-hidden="true"></i> {{$username}}</span>
                              <span><i class="fa fa-calendar" aria-hidden="true"></i> {{$date}}</span>
                           </div>
                           
                              {!!$post->post_content!!}
                        </header>
                     </article>
                     <div class="new_post_loop_tag_share">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 post_tags pull-left">
                          <?php $list_tax = get_taxonomy_post_detail( 'post_tag', $post->post_slug) ?>
                           @if($list_tax)
                           <span class="fw600 txt_u">Tags</span>:
                              @foreach($list_tax as $tax)
                                <span class="tag_post"><a href="{{url( $tax->taxonomy_slug)}}" title="{{$tax->taxonomy_slug}}">{{$tax->taxonomy_name}}</a></span>
                              @endforeach
                           @endif
                        </div>
                        
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@stop