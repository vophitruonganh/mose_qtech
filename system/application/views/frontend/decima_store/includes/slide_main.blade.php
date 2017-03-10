  <!-- SPECIAL VERSION 1 -->
  <div class="flexslider">
    <ul class="slides">

    <?php $slider = isset($slider) ? $slider: []; ?>
      <!-- FLEXSLIDER SLIDE -->
      @foreach( $slider as $row )
      <li style="background-image: url({{$row['image']}}); min-height: 560px">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 col-sm-offset-6">
              <br><br><br><br><br><br><br>

              <div class="calltoaction-box  text-center">
                <h4 class="strong-header">{{$row['header']}}</h4>
                <p>{!!$row['content']!!}</p>
                <a href="{{$row['url']}}" class="btn btn-primary">Shop now</a>
              </div>
            </div>
          </div>
        </div>
      </li>
      @endforeach

    </ul>
    <div class="flexslider-full-width-controls-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="flexslider-full-width-controls"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- !FLEXSLIDER -->