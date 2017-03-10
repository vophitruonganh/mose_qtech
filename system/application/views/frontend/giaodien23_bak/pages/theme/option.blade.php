@extends('backend.layouts.default')
@section('titlePage','Theme Option')
@section('content')
<?php
    $heading = array(
        'heading_text' => 'Thiết lập giao diện',
    );
    $setion_heading = section_title($heading);
?>
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

    <!-- Service-->
    <div id="service" data-plugin="upload">
      <div><strong>Service:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="service[heading]" value="{{ $optionValue['service']['heading'] }}" /></div>
      <div>Text: <input type="text" name="service[text]" value="{{ $optionValue['service']['text'] }}" /></div>
      <br/>
      <?php unset($optionValue['service']['heading']); unset($optionValue['service']['text']); ?>
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
          <div>Title: <input type="text" name="service[{{ $i }}][title]" value="{{ $row['title'] }}" /></div>
          <div>Url: <input type="text" name="service[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          <div>Text: <input type="text" name="service[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Service-->
    <!-- Slider -->
    <?php $slider = isset($optionValue['slider']) ? $optionValue['slider']: [];  ?>
    <?php
      if( count($slider) == 0 )
      {
        $slider = [
          [
            'big_image' => '',
            'url' => '#'
          ],
        ];
      }
    ?>
    <div id="slider" data-plugin="upload">
      <div><strong>Slider:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $slider as $row )
        <div class="row" data-id="{{ $i }}">
          <div class="form-group">
            <div>Big Image: <input type="text" class="form-control" name="slider[{{ $i }}][big_image]" value="{{ $row['big_image'] }}" /></div>
            <span class="input-group-btn">
              <span class="fileUpload btn btn-primary">
                <span>Upload</span>
                <input type="file" name="file" class="upload" />
              </span>
            </span>
          </div>
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
    <!-- About -->
    <div id="about" data-plugin="upload">
      <div><strong>About:</strong></div>
      <div>Image: <input type="text" class="form-control" name="about[image]" value="{{ $optionValue['about']['image'] }}" />
      </div>
      <span class="input-group-btn">
        <span class="fileUpload btn btn-primary">
          <span>Upload</span>
          <input type="file" name="file" class="upload" />
        </span>
      </span>
      <div>Heading: <input type="text" name="about[heading]" value="{{ $optionValue['about']['heading'] }}" /></div>
      <div>Text: <input type="text" name="about[text]" value="{{ $optionValue['about']['text'] }}" /></div>
    </div>
    <br/>
    <!-- End About -->

    <!-- Product Text -->
    <div id="productText">
      <div><strong>Product Text:</strong></div>
      <div>Text: <input type="text" name="productText" value="{{ $optionValue['productText'] }}" /></div>
    </div>
    <br/>
    <!-- End Product Text -->

    <!-- Comment -->
    <div id="comment">
      <div><strong>Comment:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="comment[heading]" value="{{ $optionValue['comment']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['comment']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['comment'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Image: <input type="text" name="comment[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <div>Content: <textarea name="comment[{{ $i }}][content]" >{{ $row['content'] }}</textarea></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Comment -->

    <!-- Partner -->
    <div id="partner">
      <div><strong>Partner:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="partner[heading]" value="{{ $optionValue['partner']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['partner']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['partner'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Image: <input type="text" name="partner[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <div>Url: <input type="text" name="partner[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End partner -->

    <!-- Facebook -->
    <div id="facebook">
      <div><strong>Facebook:</strong></div>
      <div>Url: <input type="text" name="facebook[url]" value="{{ $optionValue['facebook']['url'] }}" /></div>
    </div>
    <br/>
    <!-- End Facebook -->

    <!-- Social -->
    <div id="social">
      <div><strong>Social:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['social'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Class: <input type="text" name="social[{{ $i }}][class]" value="{{ $row['class'] }}" /></div>
          <div>Url: <input type="text" name="social[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Social -->

    <!-- Product Select Container -->
    <?php
      $numBegin = 1;
      $numEnd = 1;
      $productCategory = get_taxonomy_product('product_category');
      $productGroup = get_taxonomy_product('product_group');
    ?>
    <?php
      for( $i=$numBegin; $i<=$numEnd; $i++ )
      {
        $productSlug = isset($optionValue['product_slug_'.$i]) ? $optionValue['product_slug_'.$i] : '';
        $productType = isset($optionValue['product_type_'.$i]) ? $optionValue['product_type_'.$i] : '';
        if( $productType == '' ) $productType = 0;
        elseif( $productType == 'product_category' ) $productType = 1;
        else $productType = 2; // product_group
    ?>
    <div class="product-select-container product-select-container-row-{{ $i }}">
      <div><strong>Product Position {{ $i }}:</strong></div>
      <select class="main-select" name="main_select_{{ $i }}">
        <option value="0" @if( $productType == 0 ) selected @endif >Sản Phẩm Mới</option>
        <option value="1" @if( $productType == 1 ) selected @endif >Danh Mục Sản Phẩm</option>
        <option value="2" @if( $productType == 2 ) selected @endif >Nhóm Sản Phẩm</option>
      </select>
      <select class="product-category-select" name="product_category_{{ $i }}">
        @foreach( $productCategory as $taxonomy )
        <option value="{{ $taxonomy->taxonomy_slug }}" @if( $productSlug == $taxonomy->taxonomy_slug ) selected @endif >{{ $taxonomy->taxonomy_name }}</option>
        @endforeach
      </select>
      <select class="product-group-select" name="product_group_{{ $i }}">
        @foreach( $productGroup as $taxonomy )
        <option value="{{ $taxonomy->taxonomy_slug }}" @if( $productSlug == $taxonomy->taxonomy_slug ) selected @endif >{{ $taxonomy->taxonomy_name }}</option>
        @endforeach
      </select>
    </div>
    <?php
      }
    ?>
    <!-- End -->

    <!-- Post Select Container -->
    <?php
      $numBegin = 1;
      $numEnd = 2;
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
      row += '<div>Title: <input type="text" name="service['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Url: <input type="text" name="service['+numberMaxElement+'][url]" value="" /></div>';
      row += '<div>Text: <input type="text" name="service['+numberMaxElement+'][text]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#service .block').append(row);
      return false;
    });
    $('.theme').on('click','#service .remove',function(){
      $(this).parent().remove();
      return false;
    });


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

    // About
    $('#about .addRow').click(function(){
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
      row += '<div>Title: <input type="text" name="service['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Url: <input type="text" name="service['+numberMaxElement+'][url]" value="" /></div>';
      row += '<div>Text: <input type="text" name="service['+numberMaxElement+'][text]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#service .block').append(row);
      return false;
    });
    // End About

    // Comment
    $('#comment .addRow').click(function(){
      var numberMaxElement = parseInt($('#comment .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="comment['+numberMaxElement+'][image]" value="" /></div>';
      row += '<div>Content: <textarea name="comment['+numberMaxElement+'][content]" ></textarea></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#comment .block').append(row);
      return false;
    });
    $('.theme').on('click','#comment .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Partner
    $('#partner .addRow').click(function(){
      var numberMaxElement = parseInt($('#partner .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="partner['+numberMaxElement+'][image]" value="" /></div>';
      row += '<div>Url: <input type="text" name="partner['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#partner .block').append(row);
      return false;
    });
    $('.theme').on('click','#partner .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Social
    $('#social .addRow').click(function(){
      var numberMaxElement = parseInt($('#social .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Class: <input type="text" name="social['+numberMaxElement+'][class]" value="" /></div>';
      row += '<div>Url: <input type="text" name="social['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#social .block').append(row);
      return false;
    });
    $('.theme').on('click','#social .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Product Select Container
    $('.product-select-container .product-category-select, .product-select-container .product-group-select').hide();
    <?php
      $numBegin = 1;
      $numEnd = 1;
      for( $i=$numBegin; $i<=$numEnd; $i++ )
      {
    ?>
    var mainSelect = $('.product-select-container-row-{{ $i }} select[name=main_select_{{ $i }}]').val();
    if( mainSelect == 0 )
    {}
    else if( mainSelect == 1 )
    {
      $('.product-select-container-row-{{ $i }} select[name=product_category_{{ $i }}]').show();
    }else // mainSelect == 2
    {
      $('.product-select-container-row-{{ $i }} select[name=product_group_{{ $i }}]').show();
    }
    <?php
      }
    ?>
    $('.product-select-container').on('change','.main-select',function(){
      var mainSelect = $(this).val();
      var selectParentElement = $(this).parent();
      if( mainSelect == 0 )
      {
        selectParentElement.find('.product-category-select, .product-group-select').hide();
      }
      else if( mainSelect == 1 )
      {
        selectParentElement.find('.product-category-select').show();
        selectParentElement.find('.product-group-select').hide();
      }
      else // mainSelect == 2
      {
        selectParentElement.find('.product-category-select').hide();
        selectParentElement.find('.product-group-select').show();
      }
    });


    // Post Select Container
      $('.post-select-container .post-category-select').hide();

      <?php
        $numBegin = 1;
        $numEnd = 2;
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
      // End Post Select Container

  });
</script>
@stop