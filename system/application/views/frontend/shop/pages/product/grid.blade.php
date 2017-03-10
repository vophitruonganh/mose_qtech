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
              <div class="products-grid">
                <div class="toolbar">
                  <div class="sorter">
                    <div class="view-mode">
                      <?php $page = isset($_GET['page']) ? '&page='.$_GET['page'] : '' ?>
                      <a href="{{url('collections?view=list'.$page)}}" class="list">
                        List
                      </a>
                      <a href="#" class="grid active">
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
                <div class="clearfix">
                </div>
                <div class="row">
                 @if(count($products)!=0)
                    <?php $i=0; ?>
                    @foreach( $products as $product )
                  <div class="col-md-4 col-sm-6">
                    <div class="products">
                    <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="form_order_{{$product['product_id']}}" enctype="multipart/form-data">
                       <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                       <input type="hidden" name="quantity" value="1" />
                      <div class="thumbnail">
                        <a href="{{url('collections/'.$product['product_slug'])}}">
                          <img src="{{ get_image_url($product['product_image_id']) }}" alt="{{$product['product_title']}}">
                        </a>
                      </div>
                      <div class="productname">
                        {{$product['product_title']}}
                      </div>
                      <h4 class="price">
                        {{number_format($product['price_old'],0,'.','.')}}&#8363;
                      </h4>
                      <div class="button_group">

                        <button class="button add-cart" type="button" onclick="order({{$product['product_id']}})">
                          Add To Cart
                        </button>
                        <button class="button compare" type="button">
                          <i class="fa fa-exchange">
                          </i>
                        </button>
                        <button class="button wishlist" type="button">
                          <i class="fa fa-heart-o">
                          </i>
                        </button>
                      </div>
                      </form>
                    </div>
                  </div>
                  <?php $i++; ?>
                  @if($i%3==0)
                  <div class="clearfix"></div>
                  @endif
                    @endforeach
                  @endif
                </div>


                <div class="clearfix">
                </div>
                <div class="toolbar">
                  <div class="sorter bottom">
                    <div class="view-mode">
                      <a href="{{url('collections?view=list'.$page)}}" class="list">
                        List
                      </a>
                      <a href="#" class="grid active">
                        Grid
                      </a>
                    </div>
                    <div class="sort-by">
                      Sort by : 
                      <select name="">
                        <option value="Default" selected>
                          Default
                        </option>
                        <option value="Name">
                          Name
                        </option>
                        <option value=""><strong>#</strong>Price
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
                <div class="clearfix">
                </div>
              </div>
            </div>
          </div>
          
@stop