@extends('frontend.giaodien13.layouts.default')
@section('content')
<?php
    if(isset($product->value_postmeta)){
        $metaValue = decode_serialize($product->value_postmeta);
        $priceNew  = number_format($metaValue['price_new'], 0, ',', '.');
        $priceOld  = ($metaValue['price_old'] == 0) ? ' ' : number_format($metaValue['price_old'], 0, ',', '.') . '&#8363;';
        $title     = $product->post_title;
        $slug      = $product->post_slug;
        $excerpt   = $product->post_excerpt;
        $content   = $product->post_content;
        $featureImage = $metaValue['post_featured_image'];
    }else{
        $priceNew  = number_format($product['price_discount'], 0, ',', '.');
        $priceOld  = number_format($product['price_new'], 0, ',', '.') . '&#8363;';
        $title     = $product['post_title'];
        $slug      = $product['post_slug'];
        $excerpt   = $product['post_excerpt'];
        $content   = $product['post_content'];
        $featureImage = $product['featureImage'];
    }
  $featureImage = loadFeatureImage($featureImage);
?>

<section>
   <div class="page-header" style="">
      <div class="container">
         <h1 class="page-header__title  display-1">{{$title}}</h1>
      </div>
   </div>
   <div id="breadcrumb">
      <div class="container">
         <div class="breadcrumb ">
            <ol class=" breadcrumb-arrow">
               <li><a href="/" target="_self">Trang chủ</a></li>
               <!--li><a href="/collections" target="_self">Danh mục</a></li-->
               <li class="active"><span> {{$title}}</span></li>
            </ol>
         </div>
      </div>
   </div>
   <div id="primary" class="content-area  container">
      <div class="row">
         <div class="col-lg-6 col-md-6">
            <div class="hentry">
               <h2 class="portfolio__title">{{$title}}</h2>
               <div class="portfolio--left">
                  <div class="panel-group" id="accordion">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="panel-title portfolio__meta-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="collapsed">Mô tả</a>
                           </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse" style="height: 0px;">
                           <div class="panel-body">
                              {{$excerpt}}
                               <br data-mce-bogus="1">
                              
                              
                           </div>
                        </div>
                     </div>
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="panel-title portfolio__meta-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="collapsed">Bình luận</a>
                           </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse" style="height: 0px;">
                           <div class="panel-body">
                              <div id="fb-root" class=" fb_reset">
                                <div class="fb-comments" data-href="{{url('collections/'.$slug)}}" data-width="100%" data-numposts="5"></div>
                              </div>
                              <!-- script comment fb -->
                              <script type="text/javascript">(function(d, s, id) {
                                 var js, fjs = d.getElementsByTagName(s)[0];
                                 if (d.getElementById(id)) return;
                                 js = d.createElement(s); js.id = id;
                                 js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
                                 fjs.parentNode.insertBefore(js, fjs);
                                 }(document, 'script', 'facebook-jssdk'));
                              </script>
                           </div>
                        </div>
                     </div>
                     <div class="panel panel-default">
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-6 portfolio--right">
            <div class="portfolio__gallery  portfolio__gallery--col-1" data-featherlight-gallery="" data-featherlight-filter="a">
               <a class="portfolio__gallery-link fancybox_gallery_1" rel="gallery1" href="http://hstatic.net/998/1000081998/1/2016/4-11/pr13.jpg">
              <!--
               <img class="img-responsive  portfolio__gallery-image" src="//hstatic.net/998/1000081998/1/2016/4-11/pr13_master.jpg">
              -->
              <img class="img-responsive  portfolio__gallery-image" src="{{ $featureImage }}">
               </a>
               <a class="portfolio__gallery-link fancybox_gallery_1" rel="gallery1" href="http://hstatic.net/998/1000081998/1/2016/4-11/pr14.jpg">
               <img class="img-responsive  portfolio__gallery-image" src="//hstatic.net/998/1000081998/1/2016/4-11/pr14_master.jpg">
               </a>
            </div>
         </div>
      </div>
   </div>
   <script>
      $(document).ready(function() {
      	$(".fancybox_gallery_1").fancybox({
      		openEffect	: 'none',
      		closeEffect	: 'none'
      	});
      });
   </script>
</section>


@stop
     
      
      
      