
@extends('frontend.shop.layouts.default')
@section('content')
      <div class="container_fullwidth">
        <div class="container">
          <div class="row">
			      <!-- sidebar -->
            @include('frontend.shop.includes.sidebar')
            <!-- end sidebar -->
			<div class="col-md-9">
              <div class="banner">
                <div class="bannerslide" id="bannerslide">
                  <ul class="slides">
                    <li>
                      <a href="#">
                        <img src="images/banner-01.jpg" alt=""/>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <img src="images/banner-02.jpg" alt=""/>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="clearfix">
              </div>
              <div class="products-list">
                <div class="toolbar">
                  <div class="sorter">
                    <div class="view-mode">
                      <a href="#" class="list active">
                        List
                      </a>
                      <?php $page = isset($_GET['page']) ? '&page='.$_GET['page'] : '' ?>
                      <a href="{{url('collections?view=grid'.$page)}}" class="grid">
                        Grid
                      </a>
                    </div>
                    <div class="sort-by">
                      Sort by : 
                      <select name="" >
                        <option value="Default" selected >
                          Default
                        </option>
                        <option value="Name">
                          Name
                        </option>
                        <option value="Price">
                          Price
                        </option>
                      </select>
                    </div>
                 
                  </div>
                  <div class="pager">
                    @if($products->currentPage()!=1)
                            <a class="prev-page" href="{{str_replace('/?','?',$products->url($products->currentPage()-1))}}"><i class="fa fa-angle-left">
                      </i></a>
                      @endif
                      @for($i=1;$i<=$products->lastPage();$i=$i+1)

                            <a class="{{($products->currentPage()==$i)? 'active' : ''}}" href="{{str_replace('/?','?',$products->url($i))}}">{{$i}}</a>
                      @endfor
                      @if($products->currentPage()!=$products->lastPage())
                            <a class="next-page" href="{{str_replace('/?','?',$products->url($products->currentPage()+1))}}" title="2"><i class="fa fa-angle-right">
                      </i></a>
                      @endif
                  </div>
                </div>
                <ul class="products-listItem">
                  @if(count($products)!=0)
                    <?php $i=0; ?>
                    @foreach( $products as $product )
                  <li class="products">
                    <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="form_order_{{$product['product_id']}}" enctype="multipart/form-data">
                       <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                       <input type="hidden" name="quantity" value="1" />
                    <div class="offer">
                      New
                    </div>
                    <div class="thumbnail">
                      <a href="{{url('collections/'.$product['product_slug'])}}">
                      <img src="{{ get_image_url($product['product_image_id']) }}" alt="{{$product['product_title']}}">
                      </a>
                    </div>
                    <div class="product-list-description">
                      <div class="productname">
                       <a href="{{url('collections/'.$product['product_slug'])}}">
                        {{$product['product_title']}}
                        </a>
                      </div>
                      <p>
                        <!-- <img src="images/star.png" alt="">
                        <a href="#" class="review_num">
                          02 Review(s)
                        </a> -->
                      </p>
                      <p>
                        {{  get_excerpt($product['product_excerpt'],30)}}
                      </p>
                      <div class="list_bottom">
                        <div class="price">
                          <span class="new_price">
                            {{number_format($product['price_new'],0,'.','.')}}
                            <sup>
                             đ
                            </sup>
                          </span>
                          @if($product['price_old'])
                          <span class="old_price">
                           {{number_format($product['price_old'],0,'.','.')}}
                            <sup>
                              đ
                            </sup>
                          </span>
                          @endif
                        </div>
                        <div class="button_group">
                          <button class="button" onclick="order({{$product['product_id']}})">
                            Add To Cart
                          </button>
                          <button class="button compare">
                            <i class="fa fa-exchange">
                            </i>
                          </button>
                          <button class="button favorite">
                            <i class="fa fa-heart-o">
                            </i>
                          </button>
                        </div>
                      </div>
                    </div>
                    </form>
                  </li>
                  @endforeach
                  @endif
                </ul>

                
                <div class="toolbar">
                  <div class="sorter bottom">
                    <div class="view-mode">
                      <a href="#" class="list active">
                        List
                      </a>
                      <a href="{{url('collections?view=grid'.$page)}}" class="grid">
                        Grid
                      </a>
                    </div>
                    <div class="sort-by">
                      Sort by : 
                      <select name="" >
                        <option value="Default" selected>
                          Default
                        </option>
                        <option value="Name">
                          Name
                        </option>
                        <option value="Price">
                          Price
                        </option>
                      </select>
                    </div>
                    
                  </div>
                  <div class="pager">
                    @if($products->currentPage()!=1)
                          <a class="prev-page" href="{{str_replace('/?','?',$products->url($products->currentPage()-1))}}"><i class="fa fa-angle-left">
                    </i></a>
                    @endif
                    @for($i=1;$i<=$products->lastPage();$i=$i+1)

                          <a class="{{($products->currentPage()==$i)? 'active' : ''}}" href="{{str_replace('/?','?',$products->url($i))}}">{{$i}}</a>
                    @endfor
                    @if($products->currentPage()!=$products->lastPage())
                          <a class="next-page" href="{{str_replace('/?','?',$products->url($products->currentPage()+1))}}" title="2"><i class="fa fa-angle-right">
                    </i></a>
                    @endif
                </div>
                </div>
              </div>
            </div>
          </div>
          
@stop