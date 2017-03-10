@extends('frontend.giaodien5.layouts.default')
@section('content')
    <div id="trangchu">
         <div id="slideshow">
            <div class="slider-container ">
               <ul id="sliderlayer" class="slides clearfix">
                  <?php $slider = isset($slider) ? $slider: []; ?>
                  @foreach( $slider as $row )
                  <li>
                     <a href="{{ $row['url'] }}" class="slide-link">
                        <img class="img-responsive" alt="Slider index" src="{{ $row['image'] }}" />
                     </a>
                  </li>
                  @endforeach
               </ul>
            </div>
         </div>
      </div>
      <!-- Dịch vụ -->
      <div class="section primary-section dichvu-bg" id="dichvu">
         <div class="container">
            <div class="title">
               <h2>{{ $service['heading'] }}</h2>
               <p>{{ $service['description'] }}</p>
            </div>
            <div class="row">
               <?php
                  unset($service['heading']);
                  unset($service['description']);
               ?>
               @foreach( $service as $row )
               <div class="col-xs-12 col-sm-4">
                  <div class="centered service">
                     <div class="circle-border zoom-in">
                        <img class="img-circle" src="{{ $row['image'] }}" alt="{{ $row['text'] }}">
                     </div>
                     <h3>{{ $row['text'] }}</h3>
                     <p>{{ $row['content'] }}</p>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
     <!-- End Dịch vụ -->

      <!-- Dự án start -->
      <div class="section secondary-section duan-bg" id="duan">
      <?php $products = get_product_tax_limit('','',4 ) ?>
         @if($products)
         <div class="container">
            <div class=" title">
               <h2>Sản phẩm</h2>
               <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elementum gravida pharetra. Morbi interdum dapibus dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
            </div>
            <div id="single-project">
               <div class="row">
                  @foreach($products as $product)
                  <div class="col-xs-12 col-sm-6 col-md-3">
                     <div class="product-loop">
                        <!-- Add code html -->
                        <div class="product-thumbnail-preview">
                           <a href="{{url('collections/'.$product['product_slug'])}}">
                              <div class="product-thumbnail">
                                 <div class="centered">
                                    <img src="{{get_image_url($product['product_image_id'])}}" alt="{{$product['product_title']}}">
                                 </div>
                              </div>
                           </a>
                        </div>
                        <!-- End -->
                        <!--
                        <a href="{{url('collections/'.$product['product_slug'])}}">
                        <img src="{{get_image_url($product['product_image_id'])}}" alt="{{$product['product_title']}}">
                        </a>
                        -->
                        <div class="product-info clearfix">
                           <h3><a href="{{url('collections/'.$product['product_slug'])}}">{{$product['product_title']}}</a></h3>
                           <p class="price ">
                              <span class="new-price">{{ number_format($product['price_new'],0,'.','.') }}₫</span>
                           </p>
                           <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post">
                              <!-- Begin product options -->
                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <input id="quantity" type="hidden" name="quantity" value="1" class="tc item-quantity">
                              <button type="submit" class="add-to-cart btn-fix" name="add">Giỏ Hàng</button>
                           </form>
                        </div>
                     </div>
                  </div>
                  @endforeach

               </div>
            </div>
            <div class="viewmore text-center">
               <a href="{{url('collections')}}">Xem thêm</a>
            </div>
         </div>
         @endif
      </div>
      <!-- Dự án end -->

      <!-- Nhân Sự -->
      <div class="section primary-section gioithieu-bg" id="gioithieu">
         <div class="container">
            <div class="title">
               <h2>{{ $personnel['heading'] }}</h2>
               <p>{{ $personnel['text'] }}</p>
            </div>
            <div class="row team">
               <?php
                  unset($personnel['heading']);
                  unset($personnel['text']);
               ?>
               @foreach( $personnel as $row )
               <div class="col-xs-12 col-sm-6 col-md-3 mb10">
                  <div class="thumbnail">
                     <img src="{{ $row['image'] }}" alt="{{ $row['name'] }}">
                     <div class="thumbnail-info">
                        <p>{{ $row['name'] }}</p>
                        <span>{{ $row['job'] }}</span>
                     </div>
                     <ul class="social">
                        <li>
                           <a href="{{ $row['facebook'] }}" target="_blank">
                           <span class="fa fa-facebook-square"></span>
                           </a>
                        </li>
                        <li>
                           <a href="{{ $row['twitter'] }}" target="_blank">
                           <span class="fa fa-twitter-square"></span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      <!-- End Nhân Sự -->
      
      <!-- Nhận xét khách hàng start -->
      <div id="nhanxet2" class="preview">
         <div class="section primary-section nhanxet-bg">
            <div class="container">
               <div class="row">

                  <!-- About -->
                  <div class="col-xs-12 col-sm-6">
                     <div class="about-text title">
                        <h2>{{ $about['heading'] }}</h2>
                        <p>{{ $about['text'] }}</p>
                     </div>
                  </div>
                  <!-- End About -->

                  <!-- Testimonial -->
                  <div class="col-xs-12 col-sm-6">
                     <div class="title">
                        <h2>{{ $testimonial['heading'] }}</h2>
                     </div>
                     <div class="slider-container ">
                        <ul class="slides clearfix">
                           <?php unset($testimonial['heading']); ?>
                           @foreach( $testimonial as $row )
                           <li>
                              <div class="testimonial">
                                 <p>"{{ $row['content'] }}"</p>
                                 <div class="whopic">
                                    <img src="{{ $row['image'] }}" class="centered" alt="{{ $row['name'] }}">
                                    <strong>{{ $row['name'] }}</strong>
                                 </div>
                              </div>
                           </li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
                  <!-- End Testimonial -->

               </div>
            </div>
         </div>
      </div>

      <!-- Widget fff -->
      <div class="section secondary-section blog-bg" id="blog-index">
         <?php $posts = get_post_cat_limit( '',4) ?>
         @if($posts)
         <div class="container">
            <div class="title">
               <h2>
                  <a href="{{url('tin-chinh')}}">Tin tức</a>
               </h2>
            </div>
            <div class="row">
               @foreach($posts as $post)
               <div class="col-xs-12 col-sm-12">
                  <div class="blog-loop clearfix">
                     <div class="blog-img pull-left">
                        <a href="{{url($post->post_slug)}}">
                        <img src="{{get_image_url($post->post_image)}}" alt="{{$post->post_title}}">
                        </a>
                     </div>
                     <div class="blog-info pull-right">
                        <h3>
                           <a href="{{url($post->post_slug)}}">{{$post->post_title}}</a>
                        </h3>
                        <p>
                          {{!empty($post->post_excerpt) ? $post->post_excerpt : get_excerpt($post->post_content , 30) }}
                        </p>
                        <a href="{{url($post->post_slug)}}" class="readmore">Xem thêm ...</a>
                     </div>
                  </div>
               </div>
               @endforeach

            </div>
         </div>
         @endif
      </div>
      <!-- End Widget fff -->
   

      <!-- Widget ggg -->
      <div class="section primary-section doitac-bg" id="doitac">
         <div class="container centered">
            <div class="sub-section">
               <div class="title">
                  <h2>{{ $doitac['heading'] }}</h2>
               </div>
               <div class="index-slider">
                  <ul class="row client-slider" id="client-slider">
                     <?php unset($doitac['heading']); ?>
                     @foreach( $doitac as $row )
                     <li>
                        <a href="{{ $row['url'] }}" target="_blank"><img src="{{ $row['image'] }}"></a>
                     </li>
                     @endforeach
                  </ul>
                  <ul class="client-nav ">
                     <li id="client-prev"></li>
                     <li id="client-next"></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- End Widget ggg -->
     
               
@stop