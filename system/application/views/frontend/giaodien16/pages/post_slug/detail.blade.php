@extends('frontend.giaodien16.layouts.default')
@section('content')  

<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="inner">
            <ul>
               <li class="home"> <a title="Quay lại trang chủ" href="/">Trang chủ</a></li>
               /
               <li><span class="brn"><a href="/tin-tuc">Tin tức</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></li>
               <li><span class="brn">{{$post->post_title}}</span></li>
            </ul>
         </div>
      </div>
   </div>
</div>


<section class="main-container col2-right-layout">
   <div class="main container">
      <div class="row">
         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 news_sitebar">
             <!-- Widget 99999999 -->
                {!!showWidget('widget99999999')!!}
             <!-- End Widget 99999999 -->
           
             <!-- Widget 33333333 -->
                {!!showWidget('widget33333333')!!}
             <!-- End Widget 33333333 -->
             <script>
                      $(document).ready(function() {
                             var owl = $("#owl-news-blog");
                             owl.owlCarousel({
                                     autoPlay: 5000,
                                     pagination: false,
                                     navigation: false,
                                     navigationText: false,
                                     itemsCustom : [
                                             [0, 1],
                                             [450, 1],
                                             [600, 1],
                                             [700, 1],
                                             [1000, 1],
                                             [1200, 1],
                                             [1400, 1],
                                             [1600, 1]
                                     ],
                             });
                             $(".next").click(function(){
                                     owl.trigger('owl.next');
                             })
                             $(".prev").click(function(){
                                     owl.trigger('owl.prev');
                             })
                      });
                   </script>
            <div class="quangcao block">
               <img src="//bizweb.dktcdn.net/100/091/132/themes/139143/assets/banner.jpg?1472390005557" alt="Quảng cáo">
            </div>
         </div>
         <?php 
                $username = (!empty($post->user_nickname)) ? $post->user_nickname : $post->user_email;
                $date     = date('d/m/Y',$post->post_date);
                $value    = decode_serialize($post->meta_value);
            ?>
         <div class="col-main col-sm-9">
            <div class="blog-wrapper" id="main">
               <div class="site-content" id="primary">
                  <div role="main" id="content">
                     <article class="blog_entry clearfix wow bounceInLeft animated animated" id="178653" style="visibility: visible;">
                        <header class="blog_entry-header clearfix">
                           <div class="entry-img">
                              <img src="{{ loadFeatureImage($value['post_featured_image']) }}" alt="{{$post->post_title}}">
                           </div>
                           <div class="blog_entry-header-inner">
                              <h3 class="blog_entry-title fw_600">{{$post->post_title}}</h3>
                           </div>
                           <div class="article-info">
                              <span><i class="fa fa-user" aria-hidden="true"></i> {{$username}}</span>
                              <span><i class="fa fa-calendar" aria-hidden="true"></i> {{$date}}</span>
                           </div>
                           <div class="entry-content">
                              {!! $post->post_content !!}
                           </div>
                        </header>
                     </article>
                     <div class="new_post_loop_tag_share">
                        <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 post_tags pull-left">
                           <span class="fw_600 txt_u">Tags</span>:
                           <span class="tag_post"><a href="/chon-giay-the-thao-cho-ba-n-ga-i-nu-tinh/tintuc" title="tintuc">tintuc</a></span>
                           <span class="tag_post"><a href="/chon-giay-the-thao-cho-ba-n-ga-i-nu-tinh/giay" title="giay">giay</a></span>
                        </div> -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 post-share">
                           <div class="custom_share fw_600" style="text-align: right; width: 100%;">Share : </div>
                           <div id="shareIcons" class="jssocials">
                              <div class="jssocials-shares">
                                 <div class="jssocials-share jssocials-share-facebook"><a target="_blank" href="{{url($post->post_slug)}}" class="jssocials-share-link"><i class="fa fa-facebook jssocials-share-logo"></i></a></div>
                                 <div class="jssocials-share jssocials-share-twitter"><a target="_blank" href="{{url($post->post_slug)}}" class="jssocials-share-link"><i class="fa fa-twitter jssocials-share-logo"></i></a></div>
                                 <div class="jssocials-share jssocials-share-googleplus"><a target="_blank" href="https://plus.google.com/share?url={{url($post->post_slug)}}" class="jssocials-share-link"><i class="fa fa-google jssocials-share-logo"></i></a></div>
                              </div>
                           </div>
                           <script>
                              $("#shareIcons").jsSocials({
                              	showLabel: false,
                              	showCount: false,
                              	shares: ["facebook", "twitter", "googleplus"]
                              });
                           </script>
                        </div>
                     </div>
                     @if($post->comment_status == 'yes')
                       <div class="comment-content" id="comments">
                          <div class="comments-wrapper">
                             <div class="fb-comments" data-href="{{url($post->post_slug)}}" data-width="100%" data-numposts="5"></div> 
                          </div>
                       </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


@stop
      