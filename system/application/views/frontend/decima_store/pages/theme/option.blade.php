@extends('backend.layouts.default')
@section('titlePage','Theme Option')
@section('content')
<form action="{{ url('admin/template/option') }}" method="post">
  @include('backend.includes.token')
  <div class="theme">
        
        <!-- Slider -->
        <?php $slider = isset($optionValue['slider']) ? $optionValue['slider']: [];  ?>
        <div id="slider" data-plugin="upload"> 
            <div>
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="true" aria-controls="collapse">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i>
               </a> 
              <strong>Slider:</strong>
              
            </div> 
            <div id ="collapse" class = "panel-collapse collapse">
              <?php $i = 0; ?>
                    <div class="block" id="collapse">
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
                          <div>Header: <input type="text" name="slider[{{ $i }}][header]" value="{{ $row['header'] }}" /></div>
                          <div>Content: <input type="text" name="slider[{{ $i }}][content]" value="{{ $row['content'] }}" /></div>
                          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
                       </div>
                       <br/>
                       <?php $i++; ?>
                       @endforeach
                    </div>
              
              <div class="resultetc"></div>
                    <a class="addRow" href="#">Add new image</a>
            </div>
         </div>

         <br/>
        <!-- End slider -->

        <!-- features -->
        <?php $features = isset($optionValue['features']) ? $optionValue['features']: [];  ?>
        <div id="features" data-plugin="upload"> 
            <div>
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_banner" aria-expanded="true" aria-controls="collapse">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i>
               </a> 
              <strong>Features:</strong>
              
            </div> 
            <div id ="collapse_banner" class = "panel-collapse collapse">
              <?php $i = 0; ?>
                    <div class="block" id="collapse">
                       @foreach( $features as $row )
                       <div class="row form-group" data-id="{{ $i }}">
                          <div>Class: <input type="text" name="features[{{ $i }}][class]" value="{{ $row['class'] }}" /></div>
                          <div>Header: <input type="text" name="features[{{ $i }}][header]" value="{{ $row['header'] }}" /></div>
                          <div>Content: <input type="text" name="features[{{ $i }}][content]" value="{{ $row['content'] }}" /></div>
                          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
                       </div>
                       <br/>
                       <?php $i++; ?>
                       @endforeach
                    </div>
              
              <div class="resultetc_features"></div>
                    <a class="addRow" href="#">Add new image</a>
            </div>
         </div>

         <br/>
        <!-- End features -->

        <!-- highlights -->
        <?php $highlights = isset($optionValue['highlights']) ? $optionValue['highlights']: [];  ?>
        <div id="highlights" data-plugin="upload"> 
            <div>
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_highlights" aria-expanded="true" aria-controls="collapse">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i>
               </a> 
              <strong>Highlights:</strong>
              
            </div> 
            <div id ="collapse_highlights" class = "panel-collapse collapse">
              <?php $i = 0; ?>
                    <div class="block" id="collapse">
                       @foreach( $highlights as $row )
                       <div class="row form-group" data-id="{{ $i }}">
                          <div>Image: <input type="text" class="form-control" name="highlights[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
                          <span class="input-group-btn">
                          <span class="fileUpload btn btn-primary">
                          <span>Upload</span>
                          <input type="file" name="file" class="upload" />
                          </span>
                          </span>
                          <div>Url: <input type="text" name="highlights[{{ $i }}][url]" value="{{ $row['url'] }}" /></div>
                          <div>Header: <input type="text" name="highlights[{{ $i }}][header]" value="{{ $row['header'] }}" /></div>
                          <div>Content: <input type="text" name="highlights[{{ $i }}][content]" value="{{ $row['content'] }}" /></div>
                          @if( $i > 0 ) <a class="remove" href="javascript:;">Remove</a> @endif
                       </div>
                       <br/>
                       <?php $i++; ?>
                       @endforeach
                    </div>
              
              <div class="resultetc_highlights"></div>
                    <a class="addRow" href="#">Add new image</a>
            </div>
         </div>

         <br/>
        <!-- End highlights -->

        <!-- FEATURED BRANDS -->
        <?php $featured_brands = isset($optionValue['featured_brands']) ? $optionValue['featured_brands']: [];  ?>
        <?php
          if( count($featured_brands) == 0 )
          {
            $featured_brands = [
              'heading' => '',
              [
                'image' => '',
              ],
            ];
          }
        ?>
          <div id="featured_brands">
            <div>
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_featured_brands" aria-expanded="true" aria-controls="collapse">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i>
               </a>
              <strong>Featured branches:</strong>
            </div>
            <div id ="collapse_featured_brands" class = "panel-collapse collapse">
            <div>Heading: <input type="text" name="featured_brands[heading]" value="{{ $featured_brands['heading'] }}" /></div>
            <br/>
            <?php unset($featured_brands['heading']); ?>
            
            <?php $i = 0; ?>
            <div class="block">
            @foreach( $featured_brands as $row )
              <div class="row form-group" data-id="{{ $i }}">
                <div>Image: <input type="text" class="form-control" name="featured_brands[{{ $i }}][image]" value="{{ $row['image'] }}" /></div>
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
            <div class="resultetc_featured_brands"></div>
             <a class="addRow" href="#">Add new image</a>
          </div>
          </div>
        <!-- END FEATURED BRANDS  -->
        
        <!-- Product Select Container -->
        <?php
           $productCategory = get_taxonomy_product('product_category');
           $productGroup = get_taxonomy_product('product_group');
           ?>
        @for( $i=1; $i<=1; $i++ )
        <?php  
           $productSlug = isset($optionValue['product_slug_'.$i]) ? $optionValue['product_slug_'.$i] : '';
           $productType = isset($optionValue['product_type_'.$i]) ? $optionValue['product_type_'.$i] : '';
           if( $productType == '' ) $productType = 0;
           elseif( $productType == 'product_category' ) $productType = 1;
           else $productType = 2; // product_group
           ?>
        <!-- start  -->
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
        <!-- End -->
        @endfor
        <!--  End Product Select Container -->
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
      row += '<div>Header: <input type="text" name="slider['+numberMaxElement+'][header]" value="" /></div>';
      row += '<div>Content: <input type="text" name="slider['+numberMaxElement+'][content]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      // $('#slider .block').append(row);
      $('.resultetc').append(row);
      return false;
    });
    $('.theme').on('click','#slider .remove',function(){
      $(this).parent().remove();
      return false;
    });
    //End slide

    // features
    $('#features .addRow').click(function(){
      var numberMaxElement = parseInt($('#features .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row form-group" data-id="'+numberMaxElement+'">';
      row += '<div>Class: <input type="text" name="features['+numberMaxElement+'][class]" value="" /></div>';
      row += '<div>Header: <input type="text" name="features['+numberMaxElement+'][header]" value="" /></div>';
      row += '<div>Content: <input type="text" name="features['+numberMaxElement+'][content]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      // $('#features .block').append(row);
      $('.resultetc_features').append(row);
      return false;
    });
    $('.theme').on('click','#features .remove',function(){
      $(this).parent().remove();
      return false;
    });
    //End features

    //highlights
    $('#highlights .addRow').click(function(){
      var numberMaxElement = parseInt($('#highlights .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row form-group" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" class="form-control" name="highlights['+numberMaxElement+'][image]" value="" /></div>';
      row += '<span class="input-group-btn">';
      row += '<span class="fileUpload btn btn-primary">';
      row += '<span>Upload</span>';
      row += '<input type="file" name="file" class="upload" />';
      row += '</span>';
      row += '</span>';
      row += '<div>Url: <input type="text" name="highlights['+numberMaxElement+'][url]" value="" /></div>';
      row += '<div>Header: <input type="text" name="highlights['+numberMaxElement+'][header]" value="" /></div>';
      row += '<div>Content: <input type="text" name="highlights['+numberMaxElement+'][content]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      // $('#highlights .block').append(row);
      $('.resultetc_highlights').append(row);
      return false;
    });
    $('.theme').on('click','#highlights .remove',function(){
      $(this).parent().remove();
      return false;
    });
    //end highlights

    //highlights
    $('#featured_brands .addRow').click(function(){
      var numberMaxElement = parseInt($('#featured_brands .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row form-group" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" class="form-control" name="featured_brands['+numberMaxElement+'][image]" value="" /></div>';
      row += '<span class="input-group-btn">';
      row += '<span class="fileUpload btn btn-primary">';
      row += '<span>Upload</span>';
      row += '<input type="file" name="file" class="upload" />';
      row += '</span>';
      row += '</span>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      // $('#featured_brands .block').append(row);
      $('.resultetc_featured_brands').append(row);
      return false;
    });
    $('.theme').on('click','#featured_brands .remove',function(){
      $(this).parent().remove();
      return false;
    });
    //end highlights

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
   
  }); 
</script>
@stop