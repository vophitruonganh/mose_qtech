@extends('backend.layouts.default')
@section('titlePage','Theme Option')
@section('content')

<form action="{{ url('admin/template/option') }}" method="post">
  @include('backend.includes.token')
  <div class="theme">
    <table>
      <tbody>
        <!-- Header Info !-->
        <tr>
          <td class=""><h1>Header Infomation</h1></td>
        </tr>
        <tr>
          <td>
            <input class="form-control" type="text" placeholder="Infomation header" name="header_info[text]" value="{{ isset($optionValue['header_info']['text']) ? $optionValue['header_info']['text']:null  }}" />
          </td>
        </tr>
        <!-- End Header Info !-->

        <!-- Favicon -->
        <tr>
          <td class=""><h1>Favicon</h1></td>
        </tr>
        <tr>
          <td>
            <input type="text" class="form-control" placeholder="Path URL Images" name="favicon[image]" value="{{ isset($optionValue['favicon']['image']) ? $optionValue['favicon']['image'] : '' }}" />
          </td>
          <td>
            <span class="input-group-btn">
              <span class="fileUpload btn btn-primary">
                <span>Upload</span>
                <input type="file" name="file" class="upload" />
              </span>
            </span>
          </td>
        </tr>
        <!--End Favicon -->

        <!-- Background Page -->
        <?php
          $background_page = isset($optionValue['background_page']) ? $optionValue['background_page'] : [];
          if( count($background_page) == 0 )
          {
            $background_page = [
              [
                'url' => '',
                'image' => '',
              ],
            ];
          }
        ?>
        <tr>
          <td><h1>Background Page <a class="addRow btn btn-primary" href="#">Add</a></h1></td>
        </tr>
        <tr>
          <td>
            <?php $i=0; ?>
            <div class="block">
                @foreach ( $background_page as $row)
                  <div class="form-group" data-id ="{{$i}}">
                      <div><input class="form-control" type="text" placeholder="URL Images" name="background_page[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
                      <div><input type="text" class="form-control" placeholder="Choose Images Upload" name="background_page[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
                      <span class="input-group-btn">
                        <span class="fileUpload btn btn-primary">
                          <span>Upload</span>
                          <input type="file" name="file" class="upload" />
                        </span>
                      </span>
                       @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
                  </div>
                  <br/>
                  <?php $i++; ?>
                @endforeach
            </div>
          </td>
        </tr>
        <!-- End Background Page -->
        <!-- Logo -->
        <tr>
          <td>
            <h1>Logo Main <a class="addRow" href="#">Add</a></h1>
          </td>
        </tr>
        <tr>
          <?php $optionValue['logo_main'] = isset($optionValue['logo_main']) ? $optionValue['logo_main']: [];  ?>
          <td>
            <div id="logo_main">
              <?php $i=0; ?>
              <div class="block">
                  @foreach ( $optionValue['logo_main'] as $row)
                    <div class="row" data-id ="{{$i}}">
                        <div>Image: <input type="text" name="logo_main[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
                        <div>Url: <input type="text" name="logo_main[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
                         @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
                    </div>
                    <br/>
                    <?php $i++; ?>
                  @endforeach
              </div>
            </div>
          </td>
        </tr>
        <!-- Endlogo -->
      </tbody>
    </table>
    </div>



    <!-- Slide main -->
    <?php $optionValue['slide_main'] = isset($optionValue['slide_main']) ? $optionValue['slide_main']: [];  ?>
    <div id="slide_main" data-plugin="upload">
      <div><strong>Slide Main:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['slide_main'] as $row )
        <div class="row form-group" data-id="{{ $i }}">
          <div>Image: <input type="text" class="form-control" name="slide_main[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <span class="input-group-btn">
            <span class="fileUpload btn btn-primary">
              <span>Upload</span>
              <input type="file" name="file" class="upload" />
            </span>
          </span>
          <div>Url: <input type="text" name="slide_main[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End slide main -->

    <!-- About -->
    <div data-plugin="upload">
      <div class="form-group">
        <div><strong>About:</strong></div>

        <div>
          <label for="">
          Heading:
          <input type="text" name="about[heading]" value="{{
            isset($optionValue['about']['heading'])?$optionValue['about']['heading']:null
        }}" />
          </label>
        </div>
        <div>Url: <input type="text" name="about[url]" value="{{
          isset($optionValue['about']['heading'])?$optionValue['about']['url']:null
         }}" /></div>
        <div>Image: <input type="text" class="form-control" name="about[image]" value="{{
          isset($optionValue['about']['heading'])?$optionValue['about']['images']:null
        }}" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
        <div>Content: <input type="text" name="about[content]" value="{{ isset($optionValue['about']['content'])?$optionValue['about']['content']:null }}" /></div>
      </div>
    </div>


  </div>
</form>
<script type="text/javascript">
  $(document).ready(function(){
    //Logo main
    $('#logo_main .addRow').click(function(){
      var numberMaxElement = parseInt($('#logo_main .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="logo_main['+numberMaxElement+'][image]" value="" /></div>';
      row += '<div>Url: <input type="text" name="logo_main['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#logo_main .block').append(row);
      return false;
    });
    $('.theme').on('click','#logo_main .remove',function(){
      $(this).parent().remove();
      return false;
    });


    // Background Page
    $('#background_page .addRow').click(function(){
      var numberMaxElement = parseInt($('#background_page .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row form-group col-lg-12" data-id="'+numberMaxElement+'">';
      row += '<div>URL: <input class="form-control" type="text" name="background_page['+numberMaxElement+'][url]" value="" /></div>';
      row += '<div>Image: <input type="text" class="form-control" name="background_page['+numberMaxElement+'][image]" value="" /></div>';
      row += '<span class="input-group-btn">';
      row += '<span class="fileUpload btn btn-primary">';
      row += '<span>Upload</span>';
      row += '<input type="file" name="file" class="upload" />';
      row += '</span>';
      row += '</span>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#background_page .block').append(row);
      return false;
    });
    $('.theme').on('click','#background_page .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Slide main
    $('#slide_main .addRow').click(function(){
      var numberMaxElement = parseInt($('#slide_main .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row form-group" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" class="form-control" name="slide_main['+numberMaxElement+'][image]" value="" /></div>';
      row += '<span class="input-group-btn">';
      row += '<span class="fileUpload btn btn-primary">';
      row += '<span>Upload</span>';
      row += '<input type="file" name="file" class="upload" />';
      row += '</span>';
      row += '</span>';
      row += '<div>Url: <input type="text" name="slide_main['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#slide_main .block').append(row);
      return false;
    });
    $('.theme').on('click','#slide_main .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Feature
    $('#feature .addRow').click(function(){
      var numberMaxElement = parseInt($('#feature .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row form-group" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" class="form-control" name="feature['+numberMaxElement+'][image]" value="" /></div>';
      row += '<span class="input-group-btn">';
      row += '<span class="fileUpload btn btn-primary">';
      row += '<span>Upload</span>';
      row += '<input type="file" name="file" class="upload" />';
      row += '</span>';
      row += '</span>';
      row += '<div>Title: <input type="text" name="feature['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Description: <input type="text" name="feature['+numberMaxElement+'][description]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#feature .block').append(row);
      return false;
    });
    $('.theme').on('click','#feature .remove',function(){
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
      row += '<div>Description: <input type="text" name="testimonial['+numberMaxElement+'][description]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#testimonial .block').append(row);
      return false;
    });
    $('.theme').on('click','#testimonial .remove',function(){
      $(this).parent().remove();
      return false;
    });


  });
</script>

@stop