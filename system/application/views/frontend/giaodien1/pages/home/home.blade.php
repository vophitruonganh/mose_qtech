@extends('frontend.giaodien1.layouts.default')
@section('content')

<!-- Slider -->
<section class="slider">
    <div id="owl-slider">
       @foreach( $slide_main as $row )
         <div class="item">
            <a href="{{ $row['url'] }}"><img src="{{$row['image']}}" alt="alt"></a>
         </div>
       @endforeach
</section>
<!-- End Slider -->

<!-- Row 1 -->
<section class="feature">
    <div class="container">
       <div class="row">
          @foreach( $feature as $row )
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
             <div class="feature-item">
                <img src="{{ $row['image'] }}" alt="alt">
                <h2>{{ $row['title'] }}</h2>
                <p>{{ $row['description'] }}</p>
             </div>
          </div>
          @endforeach
       </div>
    </div>
</section>
<!-- End Row 1 -->

<!-- Row 2 -->
<section class="news-seminor">
    <div class="container">
       <div class="row">

		  <!-- Widget a -->
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <?php
                $posts = get_post_cat_limit($post_slug_1,5);
                $headingText = get_taxonomy_name($post_type_1,$post_slug_1);
                if( $headingText == '' ) $headingText = 'Bài viết Mới';
              ?>
              @if(count($posts)>0)
             <section class="news">
                <div class="box">
                   <div class="box-heading">
                      <h2>{{ $headingText }}</h2>
                      <div class="owl-buttons">
                         <a href="javascript:void(0)" onclick="$('#owl-news').data('owlCarousel').prev();"><i class="fa fa-angle-left"></i></a>
                         <a href="javascript:void(0)" onclick="$('#owl-news').data('owlCarousel').next();"><i class="fa fa-angle-right"></i></a>
                      </div>
                   </div>
                   <div id="owl-news">
                        @foreach ($posts as $post)
                            <div class="item">
                               <div class="on-item">
                                  <a href="{{url($post->post_slug)}}" class="on-item-image"><img src="{{get_image_url($post->post_image)}}" alt="{{$post->post_title}}"></a>
                                  <a href="{{url($post->post_slug)}}" class="on-item-name">
                                     <h3>{{$post->post_title}}</h3>
                                  </a>
                                  <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Ngày đăng {{date('d/m/Y', $post->post_date)}}</p>
                                  <p class="on-item-summary">
                                  <p style="text-align: justify;">{{$post->post_excerpt}}</p>
                               </div>
                            </div>
                        @endforeach
                   </div>
                </div>
             </section>
              @endif
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <?php
                $posts = get_post_cat_limit($post_slug_2,9);
                $headingText = get_taxonomy_name($post_type_2,$post_slug_2);
                if( $headingText == '' ) $headingText = 'Bài viết Mới';
              ?>
              @if(count($posts)>0)
             <section class="seminor">
                <div class="box">
                   <div class="box-heading">
                      <h2>{{ $headingText }}</h2>
                      <div class="owl-buttons">
                         <a href="javascript:void(0)" onclick="$('#owl-seminor').data('owlCarousel').prev();"><i class="fa fa-angle-left"></i></a>
                         <a href="javascript:void(0)" onclick="$('#owl-seminor').data('owlCarousel').next();"><i class="fa fa-angle-right"></i></a>
                      </div>
                   </div>
                   <div id="owl-seminor">
                    <?php $i=0; ?>
                        @foreach ($posts as $post)
                          @if($i%3 ==0 ) <div class="item"> @endif
                            <div class="os-item">
                                <a href="{{url($post->post_slug)}}" class="os-item-image"><img src="{{get_image_url($post->post_image)}}" alt="{{$post->post_title}}"></a>
                                <a href="{{url($post->post_slug)}}" class="os-item-name">
                                   <h3>{{$post->post_title}}</h3>
                                </a>
                                <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Ngày đăng {{date('d/m/Y', $post->post_date)}}</p>
                                <p class="cultural-item-summary"><p style="text-align: justify;">{{!empty($post->post_excerpt ) ? get_excerpt($post->post_excerpt,20) : get_excerpt($post->post_content,20)}}</p></p>
                           </div>
                          <?php $i++; ?>

                          @if( $i%3==0 ) </div> @endif
                        @endforeach
                   </div>
             </section>
              @endif
             </div>
          </div>
      <!-- End Widget a -->
             
          </div>
       </div>
 </section>
 <!-- End Row 2 -->
 <!-- Row 3 -->
 <section class="school">
    <div class="container">
    <?php
      $posts = get_post_cat_limit($post_slug_3,8);
      $headingText = get_taxonomy_name($post_type_3,$post_slug_3);
      if( $headingText == '' ) $headingText = 'Bài viết Mới';
    ?>
    @if(count($posts)>0)
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="school-heading">
          <h2>{{ $headingText }}</h2>
        </div>
      </div>
        <div id="owl-school">
            @foreach ($posts as $post)
                <div class="item">
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="school-item">
                      <div class="school-item-thumbnail">
                        <img src="{{get_image_url($post->post_image)}}" alt="{{$post->post_title}}">
                        <a href="{{url($post->post_slug)}}">Xem chi tiết</a>
                      </div>
                      <a href="{{url($post->post_slug)}}" class="shool-item-name"><h3>{{$post->post_title}}</h3></a>
                      <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>{{date('d/m/Y', $post->post_date)}}</p>
                      <div class="school-item-summary"><p style="text-align: justify;">{{ !empty($post->post_excerpt ) ? get_excerpt($post->post_excerpt,20) : get_excerpt($post->post_content,20)}}</div> 
                      <div class="school-item-buttons">
                        <a href="{{url($post->post_slug)}}" class="school-item-view">Xem chi tiết</a>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
      <div class="col-lg-12 col-md-12 col-sm-12 hidden-xs">
      <div class="school-footer">
      <a href="{{ url($post_slug_3) }}" class="school-button">Xem thêm</a>
      </div>
      </div>
    </div>
    </div>
  </section>
<!-- End Row 3 -->
<!-- Row 4 -->
<section class="testimonial">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 hidden-xs">
        <div class="testimonial-heading">
          <h2>{{ $testimonial['heading'] }}</h2>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="owl-testimonial">
          <?php unset($testimonial['heading']); ?>
          @foreach( $testimonial as $row )
          <div class="item">
            <div class="testimonial-item">
              <div class="testimonial-item-body">
                <p>{{ $row['content'] }}</p>
              </div>
              <div class="testimonial-item-user">
                <img src="{{ $row['image'] }}" alt="{{ $row['name'] }}">
                <h4>{{ $row['name'] }}</h4>
                <p>{{ $row['description'] }}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Row 4 -->
<!-- Row 5 -->
<section class="cultural-photo-info">
    <div class="container">
      <div class="row">
        
		<!-- Widget c -->
        <?php
          $posts = get_post_cat_limit($post_slug_4,4);
          $headingText = get_taxonomy_name($post_type_4,$post_slug_4);
          if( $headingText == '' ) $headingText = 'Bài viết Mới';
        ?>
        @if(count($posts)>0)
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <section class="cultural">
          <div class="box">
          <div class="box-heading">
          <h2>{{ $headingText }}</h2>
          </div>
          <div class="box-content">
          <ul>
          <?php $i=0; ?>
                @foreach ($posts as $post)
                  @if($i==0)
                    <li>
                        <a href="{{url($post->post_slug)}}" class="cultural-item-image"><img src="{{get_image_url($post->post_image)}}" alt="{{$post->post_title}}"></a>
                        <a href="{{url($post->post_slug)}}" class="cultural-item-name"><h3>{{$post->post_title}}</h3></a>
                        <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Ngày đăng {{date('d/m/Y', $post->post_date)}}</p>
                        <p class="cultural-item-summary"><p style="text-align: justify;">{{!empty($post->post_excerpt ) ? get_excerpt($post->post_excerpt,20) : get_excerpt($post->post_content,20)}}</p></p>
                    </li>
                  @else
                      <li><a href="{{url($post->post_slug)}}">{{$post->post_title}}</a></li>
                  @endif
                <?php $i++; ?>
                @endforeach
          </ul>
          </div>
          </div>
        </section>
        </div>
        @endif
    <!-- End Widget c -->

    <!-- Photo -->
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="photo-video">
        <div class="box">
          <div class="box-heading">
            <h2>{{ $photo['heading'] }}</h2>
          </div>
          <div class="box-content">
            <a href="{{ $photo['url'] }}"><img src="{{ $photo['image'] }}"></a>
          </div>
        </div>
      </div>
    </div>

    <!-- About Us -->
    <div class="col-lg-4 col-md-4 hidden-sm col-xs-12">
      <div class="info">
        <div class="box">
          <div class="box-heading">
            <h2>{{ $about['heading'] }}</h2>
          </div>
          <div class="box-content">
            <a href="{{ $about['url'] }}" class="info-logo"><img src="{{ $about['image'] }}"></a>
            <p class="info-content">{{ $about['content'] }}</p>
          </div>
        </div>
      </div>
    </div>
        
        </div>
    </div>
</section>

<!-- End Row 5 -->
@stop