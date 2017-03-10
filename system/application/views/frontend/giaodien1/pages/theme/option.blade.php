@extends('backend.layouts.default')
@section('titlePage','Theme Option')
@section('content')
<form action="{{ url('admin/template/option') }}" method="post">
  @include('backend.includes.token')
  <div class="theme">

    <?php
    /*
    <!-- Header info -->
    <?php $optionValue['header_info'] = isset($optionValue['header_info']) ? $optionValue['header_info']: [];  ?>
    <div>
      <div><strong>Header info:</strong></div>
      <div>Text: <input type="text" name="header_info[text]" value="{{ isset($optionValue['header_info']['text']) ? $optionValue['header_info']['text']: ''  }}" /></div>
    </div>
    <!-- End -->
    */
    ?>

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
    <div id="background_page" data-plugin="upload">
      <div><strong>Background Page:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i=0; ?>
      <div class="block">
          @foreach ( $background_page as $row)
            <div class="row form-group" data-id ="{{$i}}">
                <div>Url: <input type="text" name="background_page[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
                <div>Image: <input type="text" class="form-control" name="background_page[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
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
    </div>
    <!-- End -->

    <?php
    /*
    <!-- Logo -->
    <?php $optionValue['logo_main'] = isset($optionValue['logo_main']) ? $optionValue['logo_main']: [];  ?>
    <div id="logo_main">
        <div><strong>Logo main:</strong><a class="addRow" href="#">Add</a></div>
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
    <!-- Endlogo -->
    */
    ?>
    <!-- Logo main -->
    <div id="logo_main" data-plugin="upload">
      <div class="form-group">
        <div><strong>Logo main:</strong></div>
        <div>Image: <input type="text" class="form-control" name="logo_main[image]" value="{{ isset($optionValue['logo_main']['image']) ? $optionValue['logo_main']['image'] : '' }}" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
      </div>
    </div>
    <!-- End Logo Main -->

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

    <!-- Feature -->
    <div id="feature" data-plugin="upload">
      <div><strong>Feature:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['feature'] as $row )
        <div class="row form-group" data-id="{{ $i }}">
          <div>Image: <input type="text" class="form-control" name="feature[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <span class="input-group-btn">
            <span class="fileUpload btn btn-primary">
              <span>Upload</span>
              <input type="file" name="file" class="upload" />
            </span>
          </span>
          <div>Title: <input type="text" name="feature[{{ $i }}][title]" value="{{ $row['title'] }}" /></div>
          <div>Description: <input type="text" name="feature[{{ $i }}][description]" value="{{ $row['description'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Feature -->

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
          <div>Description: <input type="text" name="testimonial[{{ $i }}][description]" value="{{ $row['description'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Testimonial -->

    <!-- Photo -->
    <div data-plugin="upload">
      <div class="form-group">
        <div><strong>Photo:</strong></div>
        <div>Heading: <input type="text" name="photo[heading]" value="{{ $optionValue['photo']['heading'] }}" /></div>
        <div>Url: <input type="text" name="photo[url]" value="{{ $optionValue['photo']['url'] }}" /></div>
        <div>Image: <input type="text" class="form-control" name="photo[image]" value="{{ $optionValue['photo']['image'] }}" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
      </div>
    </div>
    <!-- End Photo -->

    <!-- About -->
    <div data-plugin="upload">
      <div class="form-group">
        <div><strong>About:</strong></div>
        <div>Heading: <input type="text" name="about[heading]" value="{{ $optionValue['about']['heading'] }}" /></div>
        <div>Url: <input type="text" name="about[url]" value="{{ $optionValue['about']['url'] }}" /></div>
        <div>Image: <input type="text" class="form-control" name="about[image]" value="{{ $optionValue['about']['image'] }}" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
        <div>Content: <input type="text" name="about[content]" value="{{ $optionValue['about']['content'] }}" /></div>
      </div>
    </div>
    <!-- End About -->

    <!-- Footer -->
    <?php $optionValue['footer'] = isset($optionValue['footer']) ? $optionValue['footer']: [];  ?>
    <div>
      <div><strong>Footer:</strong></div>
      <div>Company: <input type="text" name="footer[company]" value="{{ isset($optionValue['footer']['company']) ? $optionValue['footer']['company']: ''  }}" /></div>
      <?php /* <div>Address: <input type="text" name="footer[address]" value="{{ isset($optionValue['footer']['address']) ? $optionValue['footer']['address']: '' }}" /></div> */ ?>
      <?php /* <div>Contact: <input type="text" name="footer[contact]" value="{{ isset($optionValue['footer']['contact']) ? $optionValue['footer']['contact']: '' }}" /></div> */ ?>
      <div>Copyright: <input type="text" name="footer[copyright]" value="{{ isset($optionValue['footer']['copyright']) ? $optionValue['footer']['copyright']: '' }}" /></div>
    </div>
    <!-- End footer -->

    <!-- Post Select Container -->
    <?php
      $numBegin = 1;
      $numEnd = 4;
      $postCategory = get_taxonomy_post();
    ?>
    <?php
      for( $i=$numBegin; $i<=$numEnd; $i++ )
      {
        $postSlug = isset($optionValue['post_slug_'.$i]) ? $optionValue['post_slug_'.$i] : '';
        $postType = isset($optionValue['post_type_'.$i]) ? $optionValue['post_type_'.$i] : '';
        if( $postType == '' ) $postType = 0;
        else $postType = 1; // post_category
    ?>
    <div class="post-select-container post-select-container-row-{{ $i }}">
      <div><strong>Post Position {{ $i }}:</strong></div>
      <select class="main-select" name="post_main_select_{{ $i }}">
        <option value="0" @if( $postType == 0 ) selected @endif >Bài viết Mới</option>
        <option value="1" @if( $postType == 1 ) selected @endif >Danh Mục Bài viết</option>
      </select>
      <select class="post-category-select" name="post_category_{{ $i }}">
        @foreach( $postCategory as $taxonomy )
        <option value="{{ $taxonomy->taxonomy_slug }}" @if( $postSlug == $taxonomy->taxonomy_slug ) selected @endif >{{ $taxonomy->taxonomy_name }}</option>
        @endforeach
      </select>
    </div>
    <?php
      }
    ?>
    <!-- End -->

    <br/>
    <div><input type="submit" value="Save" /></div>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function(){

    /*
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
    */

    // Background Page
    $('#background_page .addRow').click(function(){
      var numberMaxElement = parseInt($('#background_page .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row form-group" data-id="'+numberMaxElement+'">';
      row += '<div>Url: <input type="text" name="background_page['+numberMaxElement+'][url]" value="" /></div>';
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

    // Post Select Container
      $('.post-select-container .post-category-select').hide();

      <?php
        $numBegin = 1;
        $numEnd = 4;
        for( $i=$numBegin; $i<=$numEnd; $i++ )
        {
      ?>
      var mainSelect = $('.post-select-container-row-{{ $i }} select[name=post_main_select_{{ $i }}]').val();
      if( mainSelect == 0 )
      {}
      else // mainSelect == 1
      {
        $('.post-select-container-row-{{ $i }} select[name=post_category_{{ $i }}]').show();
      }
      <?php
        }
      ?>
      $('.post-select-container').on('change','.main-select',function(){
        var mainSelect = $(this).val();
        var selectParentElement = $(this).parent();
        if( mainSelect == 0 )
        {
          selectParentElement.find('.post-category-select').hide();
        }
        else // mainSelect == 1
        {
          selectParentElement.find('.post-category-select').show();
        }
      });


  }); 
</script>
@stop