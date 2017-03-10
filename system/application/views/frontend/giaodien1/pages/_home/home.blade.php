@extends('frontend.giaodien1.layouts.default')
@section('content')
<!-- Slider -->
<section class="slider">
    <div id="owl-slider">
       <div class="item">
          <a href="{{ url('/') }}"><img src="{{ asset('template/giaodien1/images/slider1.jpg?1459497974444') }}" alt="alt"></a>
       </div>
       <div class="item">
          <a href="{{ url('/') }}"><img src="{{ asset('template/giaodien1/images/slider2.jpg?1459497974444') }}" alt="alt"></a>
       </div>
       <div class="item">
          <a href="{{ url('/') }}"><img src="{{ asset('template/giaodien1/images/slider3.jpg?1459497974444') }}" alt="alt"></a>
       </div>
    </div>
</section>
<!-- End Slider -->

<!-- Row 1 -->
<section class="feature">
    <div class="container">
       <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
             <div class="feature-item">
                <img src="{{ asset('template/giaodien1/images/feature1.png?1459497974444') }}" alt="alt">
                <h2>Thủ tục nhanh chóng</h2>
                <p>Chúng tôi có đội ngũ nhân viên chuyên nghiệp, thân thiện, được đào tạo bài bản với hơn 20 năm kinh nghiệm trong việc hỗ trợ làm hồ sơ</p>
             </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
             <div class="feature-item">
                <img src="{{ asset('template/giaodien1/images/feature2.png?1459497974444') }}" alt="alt">
                <h2>Liên kết trường danh tiếng</h2>
                <p>Bạn hoàn toàn có cơ hội được trải nghiệm học tập ở nước ngoài tại “campus” của các đối tác có danh tiếng của ĐHHS ở Pháp, Mỹ, Bỉ....</p>
             </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
             <div class="feature-item">
                <img src="{{ asset('template/giaodien1/images/feature3.png?1459497974444') }}" alt="alt">
                <h2>Miễn phí kiểm tra ngôn ngữ</h2>
                <p>Kết quả nhanh chóng của bài kiểm tra tiếng Anh EF tương ứng với những mức trình độ được Hội Đồng Châu Âu chấp nhận.</p>
             </div>
          </div>
       </div>
    </div>
</section>
<!-- End Row 1 -->

<!-- Row 2 -->
<section class="news-seminor">
    <div class="container">
       <div class="row">

		  <!-- Widget a -->
          {!!showWidget('widgeta')!!}
          <!-- End Widget a -->
             
          </div>
       </div>
 </section>
 <!-- End Row 2 -->
 <!-- Row 3 -->
 <section class="school">
    <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="school-heading">
      <h2>Các trường đang tuyển sinh</h2>
      </div>
      </div>
      
          <!-- Widget b -->
          {!!showWidget('widgetb')!!}
          <!-- End Widget b -->
          
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 hidden-xs">
      <div class="school-footer">
      <a href="{{ url('news.html') }}" class="school-button">Xem thêm</a>
      </div>
      </div>
    </div>
    </div>
  </section>
<!-- End Row 3 -->
<!-- Row 4 -->
<!-- End Row 4 -->
<!-- Row 5 -->
<section class="cultural-photo-info">
    <div class="container">
      <div class="row">
        
		<!-- Widget c -->
        {!!showWidget('widgetc')!!}
        <!-- End Widget c -->
        
        </div>
    </div>
</section>
<!-- End Row 5 -->
@stop