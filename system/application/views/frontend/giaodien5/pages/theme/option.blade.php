@extends('backend.layouts.default')
@section('titlePage','Theme Option')
@section('content')
<form action="{{ url('admin/template/option') }}" method="post">
  @include('backend.includes.token')
  <div class="theme">

    <!-- Favicon -->
    <div id="favicon" data-plugin="upload">
      <div class="form-group">
        <div><strong>Favicon:</strong></div>
        <div>Image: <input type="text" class="form-control" name="favicon[image]" value="{{ isset($optionValue['favicon']['image']) ? $optionValue['favicon']['image'] : '' }}" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
      </div>
    </div>
    <!-- End Favicon -->
    
    <!-- Logo main -->
    <div id="logo_main" data-plugin="upload">
      <div class="form-group">
        <div><strong>Logo main:</strong></div>
        <div>Image: <input type="text" class="form-control" name="logo_main" value="{{ isset($optionValue['logo_main']) ? $optionValue['logo_main'] : '' }}" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
      </div>
    </div>
    <!-- End Logo Main -->

    <!-- Slider -->
    <?php $slider = isset($optionValue['slider']) ? $optionValue['slider']: [];  ?>
    <?php
      if( count($slider) == 0 )
      {
        $slider = [
          [
            'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/slider-1.jpg',
            'url' => '#',
          ],
          [
            'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/slider-2.jpg',
            'url' => '#',
          ],
          [
            'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/slider-3.jpg',
            'url' => '#',
          ],
        ];
      }
    ?>
    <?php
    /*
    <div id="slider">
      <div><strong>Slider:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $slider as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Image: <input type="text" name="slider[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <div>Url: <input type="text" name="slider[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    */
    ?>
    <div id="slider" data-plugin="upload">
      <div><strong>Slider:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $slider as $row )
        <div class="row form-group" data-id="{{ $i }}">
          <div>Image: <input type="text" class="form-control" name="slider[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <span class="input-group-btn">
            <span class="fileUpload btn btn-primary">
              <span>Upload</span>
              <input type="file" name="file" class="upload" />
            </span>
          </span>
          <div>Url: <input type="text" name="slider[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <br/>
    <!-- End Slider -->

    <!-- Service -->
    <div id="service" data-plugin="upload">
      <div><strong>Service:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="service[heading]" value="{{ $optionValue['service']['heading'] }}" /></div>
      <div>Description: <input type="text" name="service[description]" value="{{ $optionValue['service']['description'] }}" /></div>
      <br/>
      <?php unset($optionValue['service']['heading']); ?>
      <?php unset($optionValue['service']['description']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['service'] as $row )
        <div class="row form-group" data-id="{{ $i }}">
          <div>Image: <input type="text" class="form-control" name="service[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <span class="input-group-btn">
            <span class="fileUpload btn btn-primary">
              <span>Upload</span>
              <input type="file" name="file" class="upload" />
            </span>
          </span>
          <div>Text: <input type="text" name="service[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          <div>Content: <input type="text" name="service[{{ $i }}][content]" value="{{ $row['content'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Service -->

    <!-- Personnel -->
    <div id="personnel" data-plugin="upload">
      <div><strong>Personnel:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="personnel[heading]" value="{{ $optionValue['personnel']['heading'] }}" /></div>
      <div>Text: <input type="text" name="personnel[text]" value="{{ $optionValue['personnel']['text'] }}" /></div>
      <br/>
      <?php unset($optionValue['personnel']['heading']); ?>
      <?php unset($optionValue['personnel']['text']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['personnel'] as $row )
        <div class="row form-group" data-id="{{ $i }}">
          <div>Image: <input type="text" class="form-control" name="personnel[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <span class="input-group-btn">
            <span class="fileUpload btn btn-primary">
              <span>Upload</span>
              <input type="file" name="file" class="upload" />
            </span>
          </span>
          <div>Name: <input type="text" name="personnel[{{ $i }}][name]" value="{{ $row['name'] }}" /></div>
          <div>Job: <input type="text" name="personnel[{{ $i }}][job]" value="{{ $row['job'] }}" /></div>
          <div>Facebook: <input type="text" name="personnel[{{ $i }}][facebook]" value="{{ $row['facebook'] }}" /></div>
          <div>Twitter: <input type="text" name="personnel[{{ $i }}][twitter]" value="{{ $row['twitter'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Personnel -->

    <!-- About -->
    <div id="about">
      <div><strong>About:</strong></div>
      <div>Heading: <input type="text" name="about[heading]" value="{{ $optionValue['about']['heading'] }}" /></div>
      <div>Text: <input type="text" name="about[text]" value="{{ $optionValue['about']['text'] }}" /></div>
    </div>
    <br/>
    <!-- End About -->

    <!-- Testimonial -->
    <div id="testimonial" data-plugin="upload">
      <div><strong>Testimonial:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="testimonial[heading]" value="{{ $optionValue['testimonial']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['testimonial']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['testimonial'] as $row )
        <div class="row form-group" data-id="{{ $i }}">
          <div>Content: <input type="text" name="testimonial[{{ $i }}][content]" value="{{ $row['content'] }}" /></div>
          <div>Image: <input type="text" class="form-control" name="testimonial[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <span class="input-group-btn">
            <span class="fileUpload btn btn-primary">
              <span>Upload</span>
              <input type="file" name="file" class="upload" />
            </span>
          </span>
          <div>Name: <input type="text" name="testimonial[{{ $i }}][name]" value="{{ $row['name'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Testimonial -->

    <!-- Đối tác -->
    <div id="doitac" data-plugin="upload">
      <div><strong>Đối tác:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="doitac[heading]" value="{{ $optionValue['doitac']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['doitac']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['doitac'] as $row )
        <div class="row form-group" data-id="{{ $i }}">
          <div>Image: <input type="text" class="form-control" name="doitac[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <span class="input-group-btn">
            <span class="fileUpload btn btn-primary">
              <span>Upload</span>
              <input type="file" name="file" class="upload" />
            </span>
          </span>
          <div>Url: <input type="text" name="doitac[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Đối tác -->

    <!-- Policy -->
    <div id="policy">
      <div><strong>Policy:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="policy[heading]" value="{{ $optionValue['policy']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['policy']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['policy'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Title: <input type="text" name="policy[{{ $i }}][title]" value="{{ $row['title'] }}" /></div>
          <div>Url: <input type="text" name="policy[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Policy -->

    <!-- Facebook -->
    <div id="facebook">
      <div><strong>Facebook:</strong></div>
      <div>Url: <input type="text" name="facebook[url]" value="{{ $optionValue['facebook']['url'] }}" /></div>
    </div>
    <br/>
    <!-- End Facebook -->

    <!-- Google Map -->
    <div id="google_map">
      <div><strong>Google Map:</strong></div>
        <div>Url: <input type="text" name="google_map[url]" value="{{ isset($optionValue['google_map']['url']) ? $optionValue['google_map']['url'] : '' }}" /></div>
    </div>
    <br/>
    <!-- End Google Map -->

    <br/>
    <div><input type="submit" value="Save" /></div>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function(){

    <?php
    /*
    // Slider
    $('#slider .addRow').click(function(){
      var numberMaxElement = parseInt($('#slider .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="slider['+numberMaxElement+'][image]" value="" /></div>';
      row += '<div>Url: <input type="text" name="slider['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#slider .block').append(row);
      return false;
    });
    $('.theme').on('click','#slider .remove',function(){
      $(this).parent().remove();
      return false;
    });
    */
    ?>
    // Slider
    $('#slider .addRow').click(function(){
      var numberMaxElement = parseInt($('#slider .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row form-group" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" class="form-control" name="slider['+numberMaxElement+'][image]" value="" /></div>';
      row += '<span class="input-group-btn">';
      row += '<span class="fileUpload btn btn-primary">';
      row += '<span>Upload</span>';
      row += '<input type="file" name="file" class="upload" />';
      row += '</span>';
      row += '</span>';
      row += '<div>Url: <input type="text" name="slider['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#slider .block').append(row);
      return false;
    });
    $('.theme').on('click','#slider .remove',function(){
      $(this).parent().remove();
      return false;
    });
    
    // Service
    $('#service .addRow').click(function(){
      var numberMaxElement = parseInt($('#service .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row form-group" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" class="form-control" name="service['+numberMaxElement+'][image]" value="" /></div>';
      row += '<span class="input-group-btn">';
      row += '<span class="fileUpload btn btn-primary">';
      row += '<span>Upload</span>';
      row += '<input type="file" name="file" class="upload" />';
      row += '</span>';
      row += '</span>';
      row += '<div>Text: <input type="text" name="service['+numberMaxElement+'][text]" value="" /></div>';
      row += '<div>Content: <input type="text" name="service['+numberMaxElement+'][content]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#service .block').append(row);
      return false;
    });
    $('.theme').on('click','#service .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Personnel
    $('#personnel .addRow').click(function(){
      var numberMaxElement = parseInt($('#personnel .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row form-group" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" class="form-control" name="personnel['+numberMaxElement+'][image]" value="" /></div>';
      row += '<span class="input-group-btn">';
      row += '<span class="fileUpload btn btn-primary">';
      row += '<span>Upload</span>';
      row += '<input type="file" name="file" class="upload" />';
      row += '</span>';
      row += '</span>';
      row += '<div>Name: <input type="text" name="personnel['+numberMaxElement+'][name]" value="" /></div>';
      row += '<div>Job: <input type="text" name="personnel['+numberMaxElement+'][job]" value="" /></div>';
      row += '<div>Facebook: <input type="text" name="personnel['+numberMaxElement+'][facebook]" value="" /></div>';
      row += '<div>Twitter: <input type="text" name="personnel['+numberMaxElement+'][twitter]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#personnel .block').append(row);
      return false;
    });
    $('.theme').on('click','#personnel .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Testimonial
    $('#testimonial .addRow').click(function(){
      var numberMaxElement = parseInt($('#testimonial .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row form-group" data-id="'+numberMaxElement+'">';
      row += '<div>Content: <input type="text" name="testimonial['+numberMaxElement+'][content]" value="" /></div>';
      row += '<div>Image: <input type="text" class="form-control" name="testimonial['+numberMaxElement+'][image]" value="" /></div>';
      row += '<span class="input-group-btn">';
      row += '<span class="fileUpload btn btn-primary">';
      row += '<span>Upload</span>';
      row += '<input type="file" name="file" class="upload" />';
      row += '</span>';
      row += '</span>';
      row += '<div>Name: <input type="text" name="testimonial['+numberMaxElement+'][name]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#testimonial .block').append(row);
      return false;
    });
    $('.theme').on('click','#testimonial .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Đối tác
    $('#doitac .addRow').click(function(){
      var numberMaxElement = parseInt($('#doitac .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row form-group" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" class="form-control" name="doitac['+numberMaxElement+'][image]" value="" /></div>';
      row += '<span class="input-group-btn">';
      row += '<span class="fileUpload btn btn-primary">';
      row += '<span>Upload</span>';
      row += '<input type="file" name="file" class="upload" />';
      row += '</span>';
      row += '</span>';
      row += '<div>Url: <input type="text" name="doitac['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#doitac .block').append(row);
      return false;
    });
    $('.theme').on('click','#doitac .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Policy
    $('#policy .addRow').click(function(){
      var numberMaxElement = parseInt($('#policy .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Title: <input type="text" name="policy['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Url: <input type="text" name="policy['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#policy .block').append(row);
      return false;
    });
    $('.theme').on('click','#policy .remove',function(){
      $(this).parent().remove();
      return false;
    });

  }); 
</script>
@stop