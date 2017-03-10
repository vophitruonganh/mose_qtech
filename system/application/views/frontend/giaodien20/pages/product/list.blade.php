@extends('frontend.giaodien20.layouts.default')
@section('content')
<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <div class="inner">
         <a href="/" title="Quay lại trang chủ">Trang chủ</a>
         <span aria-hidden="true">/</span>
         <span>Danh sách sản phẩm </span>
      </div>
   </nav>
   <!-- /templates/collection.list.liquid -->
   <div class="grid--rev">
      <div class="grid__item large--three-quarters collection-list">
         <header class="collection__info section-header">
            <h1 class="section-header__title">Sản phẩm </h1>
            <div class="rte rte--header space-10">
            </div>
         </header>
         <div class="collection__sort section-header">
            <div class="section-header__right">
               <!-- /snippets/collection-sorting.liquid -->
               <div class="form-horizontal">
                  <form class="filter-xs" method="POST" id="filter_product">
                     <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                     <label for="SortBy">Sắp xếp bởi</label>
                     <select name="sortBy" id="sortBy">
                        <option selected="" value="default">Mặc định</option>
                        <option value="price-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''}}>Giá: Tăng dần</option>
                        <option value="price-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''}}>Giá: Giảm dần</option>
                        <option value="alpha-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''}}>Tên: A-Z</option>
                        <option value="alpha-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''}}>Tên: Z-A</option>
                        <option value="created-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''}}>Cũ nhất</option>
                        <option value="created-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''}}>Mới nhất</option>
                     </select>
                  </form>
               </div>
               <div class="collection-view left">
                  <button type="button" onclick="window.location='{{url("collections?view=grid")}}'" title="Lưới xem" class="change-view" data-view="grid">
                  <span class="icon-fallback-text">
                  <span class="icon icon-grid-view" aria-hidden="true"></span>
                  <span class="fallback-text">Lưới xem</span>
                  </span>
                  </button>
                  <button type="button" onclick="window.location='{{url("collections?view=list")}}'" title="Danh sách xem" class="change-view change-view--active" data-view="list">
                  <span class="icon-fallback-text">
                  <span class="icon icon-list-view" aria-hidden="true"></span>
                  <span class="fallback-text">Danh sách xem</span>
                  </span>
                  </button>
               </div>
               
            </div>
         </div>
         <div class="grid-uniform">
            @if(count($posts)!=0)
               @foreach( $posts as $post )
                  <!-- begin product list output -->
                   <div class="grid__item">
                     <div class="grid large--display-table">
                        <div class="grid__item large--two-eighths large--display-table-cell medium--one-third">
                           <a href="{{url('collections/'.$post['post_slug'])}}">
                           <img src="{{ loadFeatureImage($post['post_featured_image'])}}" alt="{{$post['post_title']}}" class="grid__image">
                           </a>
                        </div>
                        <div class="grid__item large--six-eighths large--display-table-cell medium--two-thirds">
                           <p class="h6">{{$post['post_title']}}</p>
                           <div class="product-price">
                            @if($post['price_old']>0)   <strong>Giảm</strong> @endif
                             {{number_format($post['price_new'],0,'.','.')}}₫
                             @if($post['price_old']>0)
                              <br><span class="visually-hidden">Giá ban đầu</span><s>{{number_format($post['price_old'],0,'.','.')}}₫</s>
                             @endif
                           </div>
                           <div class="rte">
                              <p>{{$post['post_excerpt']}}</p>
                           </div>
                        </div>
                     </div>
                  </div>
               @endforeach
            @endif
            <!-- //product list output -->
         </div>

         <div class="pagination">
            @if($posts->currentPage()!=1)
               <span class="prev">
                  <a href="{{str_replace('/?','?',$posts->url($posts->currentPage()-1))}}">←</a>
              </span>
            @endif
            @for($i=1;$i<=$posts->lastPage();$i=$i+1)

               <span class="{{($posts->currentPage()==$i)? 'page current' : 'page'}}">
                  <a href="{{str_replace('/?','?',$posts->url($i))}}">{{$i}}</a>
               </span>
            @endfor
            @if($posts->currentPage()!=$posts->lastPage())
               <span class="next">
                  <a class="next-arrow" href="{{str_replace('/?','?',$posts->url($posts->currentPage()+1))}}" title="2">→</a>
               </span>
            @endif
         </div>
      </div>
      <div class="sidebar grid__item large--one-quarter">
         <div class="collection-sidebar inner">
            <!-- /snippets/collection-sidebar.liquid -->
               <!-- Widget 9999999999 -->
                  {!!showWidget('widget9999999999')!!}
               <!-- End Widget 9999999999 -->
            <!-- end category sidebar -->
            
          
            <!-- end widget 1 -->
            <div class="widget-ads widget">
               <a href="{{ $cms['url'] }}"><img src="{{ $cms['image'] }}" alt=""></a>
            </div>
            <!-- end advertising -->
            <div class="widget-cms widget">
               <h4 class="widget__title">{{ $cms['text'] }}</h4>
               <em>
                  {!! $cms['textArea'] !!}
               </em>
            </div>
            <!-- end advertising --><em>
            </em>
         </div>
         <em>
         </em>
      </div>
      <em>
      </em>
   </div>
   <em>
   </em>
</main>
<script type="text/javascript">
      $("#sortBy").change(function(){
           $("#filter_product").submit();
      });

      function order(i)
      {
         $("#form_order_"+i).submit();   
      }
</script>

@stop
