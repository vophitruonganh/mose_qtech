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

    <!-- OpenDoor -->
    <div id="openDoor">
      <div><strong>OpenDoor:</strong></div>
      <div>Text: <input type="text" name="openDoor" value="{{ $optionValue['openDoor'] }}" /></div>
    </div>
    <br/>
    <!-- End OpenDoor -->

    <!-- Service -->
    <div id="service">
      <div><strong>Service:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['service'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Heading: <input type="text" name="service[{{ $i }}][heading]" value="{{ $row['heading'] }}" /></div>
          <div>Text: <input type="text" name="service[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Service -->

    <!-- Slider -->
    <?php $slider = isset($optionValue['slider']) ? $optionValue['slider']: [];  ?>
    <?php
      
      if( count($slider) == 0 )
      {
        $slider = [
          [
            'image' => '',
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
    <!-- End Slider -->

    <!-- Facebook -->
    <div id="facebook">
      <div><strong>Facebook:</strong></div>
      <div>Url: <input type="text" name="facebook[url]" value="{{ $optionValue['facebook']['url'] }}" /></div>
    </div>
    <br/>
    <!-- End Facebook -->

    <!-- First Banner -->
    <div id="firstBanner" data-plugin="upload">
      <div class="form-group">
        <div><strong>First Banner:</strong></div>
        <div>Url: <input type="text" name="firstBanner[url]" value="{{ $optionValue['firstBanner']['url'] }}" /></div>
        <div>Image: <input type="text" class="form-control" name="firstBanner[image]" value="{{ $optionValue['firstBanner']['image'] }}" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
      </div>
    </div>
    <br/>
    <!-- End First Banner -->

    <!-- Second Banner -->
    <div id="secondBanner" data-plugin="upload">
      <div class="form-group">
        <div><strong>Second Banner:</strong></div>
        <div>Url: <input type="text" name="secondBanner[url]" value="{{ $optionValue['secondBanner']['url'] }}" /></div>
        <div>Image: <input type="text" class="form-control" name="secondBanner[image]" value="{{ $optionValue['secondBanner']['image'] }}" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
      </div>
    </div>
    <br/>
    <!-- End Second Banner -->

    <!-- Third Banner -->
    <div id="thirdBanner" data-plugin="upload">
      <div class="form-group">
        <div><strong>Third Banner:</strong></div>
        <div>Url: <input type="text" name="thirdBanner[url]" value="{{ $optionValue['thirdBanner']['url'] }}" /></div>
        <div>Image: <input type="text" class="form-control" name="thirdBanner[image]" value="{{ $optionValue['thirdBanner']['image'] }}" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
      </div>
    </div>
    <br/>
    <!-- End Third Banner -->

    <!-- Information -->
    <div id="information">
      <div><strong>Information:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="information[heading]" value="{{ $optionValue['information']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['information']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['information'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Text: <input type="text" name="information[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          <div>Url: <input type="text" name="information[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End information -->

    <!-- Support -->
    <div id="support">
      <div><strong>Support:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="support[heading]" value="{{ $optionValue['support']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['support']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['support'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Text: <input type="text" name="support[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          <div>Url: <input type="text" name="support[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Support -->

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
          <div>Text: <input type="text" name="policy[{{ $i }}][text]" value="{{ $row['text'] }}" /></div>
          <div>Url: <input type="text" name="policy[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Policy -->

    <!-- Channel -->
    <div id="channel">
      <div><strong>Channel:</strong></div>
      <div>Heading: <input type="text" name="channel[heading]" value="{{ isset($optionValue['channel']['heading']) ? $optionValue['channel']['heading'] : '' }}" /></div>
      <div>Text: <input type="text" name="channel[text]" value="{{ isset($optionValue['channel']['text']) ? $optionValue['channel']['text'] : '' }}" /></div>
    </div>
    <br/>
    <!-- End Channel -->

    <!-- Company Name -->
    <div id="companyName">
      <div><strong>Company Name:</strong></div>
      <div>Name: <input type="text" name="companyName" value="{{ isset($optionValue['companyName']) ? $optionValue['companyName'] : '' }}" /></div>
    </div>
    <br/>
    <!-- End Company Name -->

    <!-- Copyright -->
    <div id="copyright">
      <div><strong>Copyright:</strong></div>
      <div>Text: <input type="text" name="copyright[text]" value="{{ isset($optionValue['copyright']['text']) ? $optionValue['copyright']['text'] : '' }}" /></div>
    </div>
    <!-- End Copyright -->

    <!-- Social -->
    <div id="social" data-plugin="upload">
      <div><strong>Social:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['social'] as $row )
        <div class="row form-group" data-id="{{ $i }}">
          <div>Image: <input type="text" class="form-control" name="social[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <span class="input-group-btn">
            <span class="fileUpload btn btn-primary">
              <span>Upload</span>
              <input type="file" name="file" class="upload" />
            </span>
          </span>
          <div>Url: <input type="text" name="social[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          <div>Title: <input type="text" name="social[{{ $i }}][title]" value="{{ $row['title'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Social -->

    <!-- Service Information -->
    <div id="serviceInfo" data-plugin="upload">
      <div><strong>Service Information:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['serviceInfo'] as $row )
        <div class="row form-group" data-id="{{ $i }}">
          <div>Image: <input type="text" class="form-control" name="serviceInfo[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
          <span class="input-group-btn">
            <span class="fileUpload btn btn-primary">
              <span>Upload</span>
              <input type="file" name="file" class="upload" />
            </span>
          </span>
          <div>Heading: <input type="text" name="serviceInfo[{{ $i }}][heading]" value="{{ $row['heading'] }}" /></div>
          <div>Content: <input type="text" name="serviceInfo[{{ $i }}][content]" value="{{ $row['content'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Service Information -->

    <!-- Product Select Container -->
    <?php
      $numBegin = 1;
      $numEnd = 4;
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
      $numEnd = 1;
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
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Heading: <input type="text" name="service['+numberMaxElement+'][heading]" value="" /></div>';
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

    // Information
    $('#information .addRow').click(function(){
      var numberMaxElement = parseInt($('#information .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="information['+numberMaxElement+'][text]" value="" /></div>';
      row += '<div>Url: <input type="text" name="information['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#information .block').append(row);
      return false;
    });
    $('.theme').on('click','#information .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Support
    $('#support .addRow').click(function(){
      var numberMaxElement = parseInt($('#support .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="support['+numberMaxElement+'][text]" value="" /></div>';
      row += '<div>Url: <input type="text" name="support['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#support .block').append(row);
      return false;
    });
    $('.theme').on('click','#support .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Policy
    $('#policy .addRow').click(function(){
      var numberMaxElement = parseInt($('#policy .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="policy['+numberMaxElement+'][text]" value="" /></div>';
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

    // Social
    $('#social .addRow').click(function(){
      var numberMaxElement = parseInt($('#social .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row form-group" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" class="form-control" name="social['+numberMaxElement+'][image]" value="" /></div>';
      row += '<span class="input-group-btn">';
      row += '<span class="fileUpload btn btn-primary">';
      row += '<span>Upload</span>';
      row += '<input type="file" name="file" class="upload" />';
      row += '</span>';
      row += '</span>';
      row += '<div>Url: <input type="text" name="social['+numberMaxElement+'][url]" value="" /></div>';
      row += '<div>Title: <input type="text" name="social['+numberMaxElement+'][title]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#social .block').append(row);
      return false;
    });
    $('.theme').on('click','#social .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Service Information
    $('#serviceInfo .addRow').click(function(){
      var numberMaxElement = parseInt($('#serviceInfo .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row form-group" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" class="form-control" name="serviceInfo['+numberMaxElement+'][image]" value="" /></div>';
      row += '<span class="input-group-btn">';
      row += '<span class="fileUpload btn btn-primary">';
      row += '<span>Upload</span>';
      row += '<input type="file" name="file" class="upload" />';
      row += '</span>';
      row += '</span>';
      row += '<div>Heading: <input type="text" name="serviceInfo['+numberMaxElement+'][heading]" value="" /></div>';
      row += '<div>Content: <input type="text" name="serviceInfo['+numberMaxElement+'][content]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#serviceInfo .block').append(row);
      return false;
    });
    $('.theme').on('click','#serviceInfo .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Product Select Container
    $('.product-select-container .product-category-select, .product-select-container .product-group-select').hide();
    <?php
      $numBegin = 1;
      $numEnd = 4;
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
      $numEnd = 1;
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