@extends('frontend.giaodien6.layouts.default')
@section('content')                
                  <main class="padding-top-mobile">
                     <div class="header-navigate">
                        <div class="container">
                           <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
                                 <ol class="breadcrumb breadcrumb-arrow">
                                    <li><a href="{{ url('/') }}" target="_self">Trang chủ</a></li>
                                    <li><i class="fa fa-angle-right"></i></li>
                                    <li class="active"><span>{{ $title_name }}</span></li>
                                 </ol>
                              </div>
                           </div>
                        </div>
                     </div>
                     <section class="sidebar-col">
                        <div class="container">
                           <div class="row clearfix">
                              <aside class="col-xs-12">
                                 <div class="header-collection">
                                    <div class="row">
                                       <div class="col-xs-12 pd5">
                                          <div class="box-title-collection clearfix">
                                             <h1>
                                                {{ $title_name }}
                                             </h1>
                                             <!-- <span class="collection-size">(<?php echo count($products) ?> sản phẩm)</span> -->
                                             <a class="hidden-lg pull-right btn-filter-mobile" href="javascript:void(0);">Bộ lọc<i class="fa fa-angle-double-right"></i></a>
                                             <a onclick="changeTemplate(this)" class="btn-change-list pull-right" data-template="template-list" href="javascript:void(0);">
                                                <svg class="svg-icon-size-20 svg-icon-bg svg-icon-inline">
                                                   <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-list-products"></use>
                                                </svg>
                                             </a>
                                             <a onclick="changeTemplate(this)" class="btn-change-list active pull-right" data-template="template-grid" href="javascript:void(0);">
                                                <svg class="svg-icon-size-20 svg-icon-bg svg-icon-inline">
                                                   <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-grid-products"></use>
                                                </svg>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pd5 flex-left">
                                           <div class="box-group-collection mb10">
                                              <!-- Danh mục sản phẩm -->
                                              <?php $list_tax = get_taxonomy_product('product_category'); ?>
                                              @if( $list_tax )
                                              <div class="box-group-collection mb10">
                                                 <div class="group-collection-title">
                                                    <span>Danh mục sản phẩm</span>
                                                 </div>
                                                 <div class="group-menu-collection">
                                                    <ul id="menusidebarleft" class="clearfix">
                                                      @foreach($list_tax as $tax)
                                                       <li class="">
                                                          <a href="{{ url('collections/'.$tax->taxonomy_slug) }}" title="{{ $tax->taxonomy_name }}">{{ $tax->taxonomy_name }}</a>
                                                       </li>
                                                      @endforeach
                                                    </ul>
                                                 </div>
                                              </div>
                                              @endif
                                              <!-- End -->
                                           </div>
                                           <div class="box-group-collection mb10">
                                              <div class="group-collection-title">
                                                 <span>Facebook</span>
                                              </div>
                                              <div class="fb-page fb_iframe_widget" data-href="{{ $facebook['url'] }}" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=1613769142230848&amp;container_width=270&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fnobita.designer%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false"><span style="vertical-align: bottom; width: 270px; height: 230px;"><iframe name="f902288c3891d4" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/v2.5/plugins/page.php?adapt_container_width=true&amp;app_id=1613769142230848&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fbz-D0tzmBsw.js%3Fversion%3D42%23cb%3Df1dd0b672fea6e%26domain%3Dsaga-hamburg.myharavan.com%26origin%3Dhttps%253A%252F%252Fsaga-hamburg.myharavan.com%252Ff28f39fced8dbf4%26relation%3Dparent.parent&amp;container_width=270&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fnobita.designer%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false" style="border: none; visibility: visible; width: 270px; height: 230px;" class=""></iframe></span></div>
                                           </div>
                                          
                                            <!-- Tin tức -->
                                            <?php
                                              $posts = get_post_cat_limit($post_slug_1,3);
                                              $headingText = get_taxonomy_name($post_type_1,$post_slug_1);
                                              if( $headingText == '' ) $headingText = 'Bài viết Mới';
                                            ?>
                                            @if( $posts )
                                            <div class="box-group-collection mb10">
                                               <div class="group-collection-title">
                                                  <span>{{ $headingText }}</span>
                                               </div>
                                               <div class="owl-carousel position-owlCarousel" id="group-blog-slide">
                                              @foreach($posts as $post)
                                                <?php $excerpt = !empty($post->post_excerpt) ? get_excerpt($post->post_excerpt,30) : get_excerpt($post->post_content,30); ?>
                                                  <div class="item">
                                                     <div class="clearfix">
                                                        <div class="infor-blog-image-slide">
                                                           <a href="{{ url($post->post_slug) }}">
                                                           <img src="{{ get_image_url($post->post_image) }}" />
                                                           </a>
                                                        </div>
                                                        <div class="infor-blog-name-slide">
                                                           <a href="{{ url($post->post_slug) }}">
                                                              <h2>
                                                                 {{ $post->post_title }}
                                                              </h2>
                                                           </a>
                                                           <p>
                                                              {{ $excerpt }}
                                                           </p>
                                                        </div>
                                                     </div>
                                                  </div>
                                              @endforeach
                                              </div>
                                               <script>
                                                  var owl_tab_blog = $('#group-blog-slide');
                                                  owl_tab_blog.owlCarousel({
                                                     items:1,
                                                     nav:true
                                                  });
                                                  owl_tab_blog.find('.owl-next').html("<i class='fa fa-angle-right'></i>");
                                                  owl_tab_blog.find('.owl-prev').html("<i class='fa fa-angle-left'></i>");
                                               </script>
                                            </div>
                                            @endif
                                            <!-- End -->
                                            
                                            
                                        </div>
                                        
                                        
                                       <div class="col-lg-9 col-xs-12 pd5 clearfix">
                                          <div class="clearfix product-lists product-item box-product-lists mt15 clearfix" id="event-grid">
                                             @if(count($products)>0)
                                                  @foreach($products as $product)
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb10 product-wrapper product-resize animated zoomIn fixheight" style="height: 320px;">
                                                <div class="product-information">
                                                   <div class="product-detail clearfix">
                                                      <div class="product-image image-resize" style="height: 181px;">
                                                         <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                                                         <img src="{{ get_image_url($product['product_image_id']) }}" alt="{{ $product['product_title'] }}">
                                                         </a> 
                                                         <div class="label-product field-new  countdown_1002078986" style="display: none">
                                                            <span>new</span>
                                                         </div>
                                                        @if( $product['percentage']>0 )
                                                         <div class="label-product field-sale">
                                                            <span>-{{$product['percentage']}}%</span>
                                                         </div>
                                                        @endif
                                                      </div>
                                                      <div class="product-info">
                                                         <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                                                            <h2>
                                                              {{$product['product_title']}}
                                                            </h2>
                                                         </a>
                                                         <div class="price-info clearfix">
                                                            <div class="price-new-old">
                                                               <span>{{number_format($product['price_new'],0,'.','.')}}₫</span>
                                                               @if($product['price_old'])
                                                                <del>{{number_format($product['price_old'],0,'.','.')}}₫</del>
                                                               @endif
                                                            </div>
                                                         </div>
                                                         <div class="product-info-description hidden-xs">
                                                            <p>
                                                            </p>
                                                         </div>
                                                         <div class="product-buttons">
                                                            <div>
                                                            <form id="form_order_{{$product['product_id']}}" action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants"  enctype="multipart/form-data">
                                                              <input id="page_token" type="hidden" name="_token" value="{{csrf_token()}}" />
                                                              <input type="hidden" name="quantity" value="1" />
                                                               <a class="btn-detail hidden-xs quickview" href="javascript:void(0)" data-handle="{{ url('collections/'.$product['product_slug']) }}" title="">
                                                               <i class="fa fa-eye"></i>
                                                               </a>
                                                               <a class="btn-addtocart" href="javascript:void(0)" onclick="order({{$product['product_id']}})" title="">Mua Ngay</a>
                                                               <a class="btn-wishlist hidden-xs" href="{{ url('collections/'.$product['product_slug']) }}" title="">
                                                               <i class="fa fa-heart"></i>
                                                               </a>
                                                               </form>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>

                                                  @endforeach
                                             @endif
                                         
                                             <div class="icon-loading" style="display: none;">
                                                <div class="uil-ring-css">
                                                   <div></div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="paginations">
                                            {{ $products->links() }}
                                          </div>
                                          <?php
                                          /*
                                         @if(count($posts)>0)
                                          <div class="paginations">
                                                <ul>
                                                    @if($posts->currentPage()!=1)
                                                    <li>
                                                        <a href="{{str_replace('/?','?',$posts->url($posts->currentPage()-1))}}">
                                                            Trang trước
                                                        </a>
                                                    </li>
                                                    @endif
                                                    @for($i=1;$i<=$posts->lastPage();$i=$i+1)
                                                    <li class="{{($posts->currentPage()==$i)? 'current' : ''}}">
                                                        <a href="{{str_replace('/?','?',$posts->url($i))}}">{{$i}}</a>
                                                    </li>
                                                    <!-- <li class="current"><a href="#" style="pointer-events:none">1</a></li>
                                                    <li><a href="/collections/all?page=2">2</a></li> -->
                                                    @endfor
                                                    <!-- <li><a href="/collections/all?page=3">3</a></li>
                                                    <li><a href="/collections/all?page=4">4</a></li> -->
                                                    @if($posts->currentPage()!=$posts->lastPage())
                                                    <li>
                                                        <a class="next-arrow" href="{{str_replace('/?','?',$posts->url($posts->currentPage()+1))}}" title="2">
                                                            Trang sau
                                                        </a>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            @endif
                                            */
                                            ?>
                                           
                                       </div>
                                    </div>
                                 </div>
                              </aside>
                           </div>
                        </div>
                     </section>
                     <div class="wrapper-filter"></div>
                     
                    
                  </main>
      <script type="text/javascript">
        function order(i)
        {
          $("#form_order_"+i).submit();   
        }
      </script>>
@stop