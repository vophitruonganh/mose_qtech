@extends('frontend.giaodien16.layouts.default')
@section('content')

<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="inner">
            <ul>
               <li class="home"> <a title="Quay lại trang chủ" href="/">Trang chủ</a></li>
               <i class="fa fa-angle-double-right" aria-hidden="true"></i>
               <li><span class="brn"> {{$slug_name}}</span></li>
            </ul>
         </div>
      </div>
   </div>
</div>


<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 news">
   <div class="container">
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
            <img src="//bizweb.dktcdn.net/100/091/132/themes/139143/assets/banner.jpg?1472118628278" alt="Quảng cáo">
         </div>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 news_posts">
         <h2 class="fw_600">{{$slug_name}}</h2>
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 blog-posts">
            @foreach($dataNews as $data)
                <?php 
                    $username = (!empty($data->user_nickname)) ? $data->user_nickname : $data->user_email;
                    $date     = date('d/m/Y',$data->post_date);
                    $value    = decode_serialize($data->meta_value);
                ?>
                <div class="news_post_loop">
                   <div class="news_post_loop_img">
                      <a href="{{url($data->post_slug)}}">
                      <img src="{{ loadFeatureImage($value['post_featured_image']) }}" alt="{{$data->post_title}}">
                      </a>
                   </div>
                   <div class="news_post_loop_title">
                      <h3><a href="{{url($data->post_slug)}}">{{$data->post_title}}</a></h3>
                   </div>
                   <div class="news_post_loop_info">
                      <p class="cl_old">
                         <span><i class="fa fa-user" aria-hidden="true"></i> {{$username}}</span> <span><i class="fa fa-calendar" aria-hidden="true"></i> {{$date}}</span>
                      </p>
                   </div>
                   <div class="news_post_loop_content cl_old">
                      {{$data->post_excerpt}}
                   </div>
                   <div class="news_post_loop_more">
                      <button class="btn_viewmore" onclick="location.href='{{url($data->post_slug)}}'">Đọc thêm <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                   </div>
                </div>
            @endforeach
            


            <div class="paginate-pages">
               <div class="pager">
                  <div class="pages">
                     <ul class="pagination">
                     @if($dataNews->currentPage() != 1)
                          <li>
                              <a href="{{ $dataNews->url($dataNews->currentPage()-1) }}"><</a>
                          </li>
                          @endif
                          @for ($i = 1; $i <= $dataNews->lastPage(); $i++)
                              <li class="{{ ($dataNews->currentPage() == $i) ? 'active' : '' }}">
                                  <a href="{{ $dataNews->url($i) }}">{{ $i }}</a>
                              </li>
                          @endfor
                          @if($dataNews->currentPage() != $dataNews->lastPage())
                          <li>
                              <a href="{{ $dataNews->url($dataNews->currentPage()+1) }}" >></a>
                          </li>
                      @endif
                        
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>






@stop
      