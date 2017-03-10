@extends('frontend.giaodien9.layouts.default')
@section('content')

<section id="blog" class="archive archive-news wrapper">
   <div class="banner-page">
      <img src="//hstatic.net/668/1000057668/1000083168/blog_news_banner.png?v=583" alt="Tin tức">
   </div>
   <div class="fix-width home-section ">
      <div class="section-header no-border">
         <h3 class="section-title wow fadeInUp" style="visibility: visible; animation-name: none;">Tin tức</h3>
         <div class="section-description wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: none;">
         </div>
      </div>
      <!-- Begin content -->
      <div class="section-content articles">
          @foreach($dataNews as $data)
                  <?php 
                      $username = (!empty($data->user_nickname)) ? $data->user_nickname : $data->user_email;
                      $date     = date('d/m/Y',$data->post_date);
                      $time     = date('h:iA',$data->post_date);
                      $value    = decode_serialize($data->meta_value);
                  ?>

            <div class="article entry clear">
               <a class="thumb" href="{{url($data->post_slug)}}">
                  <div><img src="{{ get_image_url($data->post_image) }}" alt="{{$data->post_title}}"></div>
               </a>
               <div class="section-content clearfix">
                  <h2 class="entry-title">
                     <a title="Website có quảng cáo dụ cài ứng dụng di động sẽ bị google phạt" href="{{url($data->post_slug)}}">{{$data->post_title}}</a>
                  </h2>
                  <div class="meta">
                     <p class="date">
                        {{$time}} - {{$date}}
                     </p>
                     <p class="category">
                        <span class="category-name">{{$slug_name}}</span>
                     </p>
                  </div>
                  <div class="excerpt">
                    {{ get_excerpt($data->post_content,20) }}
                  
                    <?php 
                    /*
                    bb{{ get_excerpt($data->post_content,20) }}bb
                     aa{{ !empty($data->post_excerpt ) ? get_excerpt($data->post_excerpt,20) : get_excerpt($data->post_content,20) }}aa
                     */
                     ?>
                     <p class="readmore">
                        <a rel="bookmark" href="{{url($data->post_slug)}}">Xem chi tiết</a>
                     </p>
                  </div>
               </div>
            </div>

          @endforeach
        


         <div class="navigation clearfix">
            @if($dataNews->currentPage() != 1)
                  <a class="prev" href="{{ $dataNews->url($dataNews->currentPage()-1) }}">Trang Trước</a>
              @endif
              @for ($i = 1; $i <= $dataNews->lastPage(); $i++)
                      @if($dataNews->currentPage() == $i)
                          <span class="page-node page-number current">{{$i}}</span>
                      @else
                          <a class="{{ ($dataNews->currentPage() == $i) ? 'page-node page-number' : '' }} " href="{{ $dataNews->url($i) }}">{{ $i }}</a>
                      @endif
              @endfor
              @if($dataNews->currentPage() != $dataNews->lastPage())
             
                  <a class="next" href="{{ $dataNews->url($dataNews->currentPage()+1) }}" >Trang Sau</a>
             
              @endif
         </div>
      </div>
     
   </div>
   <!-- End content -->
</section>

@stop