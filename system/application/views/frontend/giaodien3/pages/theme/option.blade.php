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
  
    <!-- OpenDoor -->
    <div id="openDoor">
      <div><strong>OpenDoor:</strong></div>
      <div>Text: <input type="text" name="openDoor" value="{{ isset($optionValue['openDoor']) ? $optionValue['openDoor'] : '' }}" /></div>
    </div>
    <br/>
    <!-- End OpenDoor -->

    <!-- Slider -->
    <?php $slider = isset($optionValue['slider']) ? $optionValue['slider']: [];  ?>
    <?php
      if( count($slider) == 0 )
      {
        $slider = [
          [
            'image' => 'http://store.moseplus.com/template/giaodien3/images/banner_cover1.jpg',
            'url' => '#',
          ],
          [
            'image' => 'http://store.moseplus.com/template/giaodien3/images/banner_cover2.jpg',
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

    <!-- About -->
    <div id="about">
      <div><strong>About:</strong></div>
      <div>Image: <input type="text" name="about[image]" value="{{ $optionValue['about']['image'] }}" /></div>
      <div>Heading: <input type="text" name="about[heading]" value="{{ $optionValue['about']['heading'] }}" /></div>
      <div>Content: <input type="text" name="about[content]" value="{{ $optionValue['about']['content'] }}" /></div>
    </div>
    <br/>
    <!-- End About -->

    <!-- Social -->
    <div id="social">
      <div><strong>Social:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="social[heading]" value="{{ $optionValue['social']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['social']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['social'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Class 1: <input type="text" name="social[{{ $i }}][class1]" value="{{ $row['class1'] }}" /></div>
          <div>Class 2: <input type="text" name="social[{{ $i }}][class2]" value="{{ $row['class2'] }}" /></div>
          <div>Title: <input type="text" name="social[{{ $i }}][title]" value="{{ $row['title'] }}" /></div>
          <div>Url: <input type="text" name="social[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Social -->

    <!-- Bottom Menu -->
    <?php $bottom_menu = isset($optionValue['bottom_menu']) ? $optionValue['bottom_menu']: [];  ?>
    <?php
      if( count($bottom_menu) == 0 )
      {
        $bottom_menu = [
          'heading' => '',
          [
            'title' => '',
            'url' => '',
          ],
        ];
      }
    ?>
      <div id="bottom_menu">
        <div><strong>Bottom Menu:</strong><a class="addRow" href="#">Add</a></div>
        <div>Heading: <input type="text" name="bottom_menu[heading]" value="{{ $bottom_menu['heading'] }}" /></div>
        <br/>
        <?php unset($bottom_menu['heading']); ?>
        <?php $i = 0; ?>
        <div class="block">
        @foreach( $bottom_menu as $row )
          <div class="row" data-id="{{ $i }}">
            <div>Title: <input type="text" name="bottom_menu[{{ $i }}][title]" value="{{ $row['title'] }}" /></div>
            <div>Url: <input type="text" name="bottom_menu[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
            @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
          </div>
        <br/>
        <?php $i++; ?>
        @endforeach
        </div>
      </div>
      <!-- End Bottom -->

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
          <div>Title: <input type="text" name="support[{{ $i }}][title]" value="{{ $row['title'] }}" /></div>
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

    <!-- Guide -->
    <div id="guide">
      <div><strong>Guide:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="guide[heading]" value="{{ $optionValue['guide']['heading'] }}" /></div>
      <br/>
      <?php unset($optionValue['guide']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      @foreach( $optionValue['guide'] as $row )
        <div class="row" data-id="{{ $i }}">
          <div>Title: <input type="text" name="guide[{{ $i }}][title]" value="{{ $row['title'] }}" /></div>
          <div>Url: <input type="text" name="guide[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
        </div>
      <br/>
      <?php $i++; ?>
      @endforeach
      </div>
    </div>
    <!-- End Guide -->

    <!-- About Contact -->
    <div id="about_contact" data-plugin="upload">
      <div class="form-group">
        <div><strong>About Contact:</strong></div>
        <div>Logo: <input type="text" class="form-control" name="about_contact[logo]" value="{{ isset($optionValue['about_contact']['logo']) ? $optionValue['about_contact']['logo'] : '' }}" /></div> 
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
        <div>Text: <input type="text" name="about_contact[text]" value="{{ isset($optionValue['about_contact']['text']) ? $optionValue['about_contact']['text'] : '' }}" /></div>
      </div>
    </div>
    <!-- End About Contact -->

    <!-- Copyright -->
    <div id="copyright">
      <div><strong>Copyright:</strong></div>
      <div>Text: <input type="text" name="copyright[text]" value="{{ isset($optionValue['copyright']['text']) ? $optionValue['copyright']['text'] : '' }}" /></div>
    </div>
    <!-- End Copyright -->

    <!-- Product Select Container -->
    <?php
      $numBegin = 1;
      $numEnd = 5;
      $productCategory = get_taxonomy_product('product_category');
      $productGroup = get_taxonomy_product('product_group');
    ?>
    <?php
      for( $i=$numBegin; $i<=$numEnd; $i++ )
      {
        $productSlug = $optionValue['product_slug_'.$i];
        $productType = $optionValue['product_type_'.$i];
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

    // Social
    $('#social .addRow').click(function(){
      var numberMaxElement = parseInt($('#social .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Class 1: <input type="text" name="social['+numberMaxElement+'][class1]" value="" /></div>';
      row += '<div>Class 2: <input type="text" name="social['+numberMaxElement+'][class2]" value="" /></div>';
      row += '<div>Title: <input type="text" name="social['+numberMaxElement+'][title]" value="" /></div>';
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

    // Bottom Menu
    $('#bottom_menu .addRow').click(function(){
      var numberMaxElement = parseInt($('#bottom_menu .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Title: <input type="text" name="bottom_menu['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Url: <input type="text" name="bottom_menu['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#bottom_menu .block').append(row);
      return false;
    });
    $('.theme').on('click','#bottom_menu .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Support
    $('#support .addRow').click(function(){
      var numberMaxElement = parseInt($('#support .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Title: <input type="text" name="support['+numberMaxElement+'][title]" value="" /></div>';
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

    // Guide
    $('#guide .addRow').click(function(){
      var numberMaxElement = parseInt($('#guide .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Title: <input type="text" name="guide['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Url: <input type="text" name="guide['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#guide .block').append(row);
      return false;
    });
    $('.theme').on('click','#guide .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Product Select Container
    $('.product-select-container .product-category-select, .product-select-container .product-group-select').hide();
    <?php
      $numBegin = 1;
      $numEnd = 5;
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

  }); 
</script>
@stop