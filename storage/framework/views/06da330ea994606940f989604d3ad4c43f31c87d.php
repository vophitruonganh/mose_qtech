<?php $__env->startSection('titlePage','Theme Option'); ?>
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(url('admin/template/option')); ?>" method="post">
  <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="theme">

    <!-- Favicon -->
    <div id="favicon" data-plugin="upload">
      <div class="form-group">
        <div><strong>Favicon:</strong></div>
        <div>Image: <input type="text" class="form-control" name="favicon[image]" value="<?php echo e(isset($optionValue['favicon']['image']) ? $optionValue['favicon']['image'] : ''); ?>" /></div>
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
        <div>Image: <input type="text" class="form-control" name="logo_main" value="<?php echo e(isset($optionValue['logo_main']) ? $optionValue['logo_main'] : ''); ?>" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
      </div>
    </div>
    <!-- End Logo Main -->

    <!-- Phone -->
    <div id="phone">
      <div><strong>Phone:</strong></div>
      <div>Phone: <input type="text" name="phone" value="<?php echo e(isset($optionValue['phone']) ? $optionValue['phone'] : ''); ?>" /></div>
    </div>
    <!-- End -->    

    <!-- Slider -->
    <?php $slider = isset($optionValue['slider']) ? $optionValue['slider']: [];  ?>
    <?php
      if( count($slider) == 0 )
      {
        $slider = [
          [
            'big_image' => '',
            'url' => '#',
            'thumb_image' => '',
            'title' => '',
            'description' => '',
          ],
        ];
      }
    ?>
    <div id="slider" data-plugin="upload">
      <div><strong>Slider:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div class="form-group">
            <div>Big Image: <input type="text" class="form-control" name="slider[<?php echo e($i); ?>][big_image]" value="<?php echo e($row['big_image']); ?>" /></div>
            <span class="input-group-btn">
              <span class="fileUpload btn btn-primary">
                <span>Upload</span>
                <input type="file" name="file" class="upload" />
              </span>
            </span>
          </div>
          <div>Url: <input type="text" name="slider[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <div class="form-group">
            <div>Thumb Image: <input type="text" class="form-control" name="slider[<?php echo e($i); ?>][thumb_image]" value="<?php echo e($row['thumb_image']); ?>" /></div>
            <span class="input-group-btn">
              <span class="fileUpload btn btn-primary">
                <span>Upload</span>
                <input type="file" name="file" class="upload" />
              </span>
            </span>
          </div>
          <div>Title: <input type="text" name="slider[<?php echo e($i); ?>][title]" value="<?php echo e($row['title']); ?>" /></div>
          <div>Description: <input type="text" name="slider[<?php echo e($i); ?>][description]" value="<?php echo e($row['description']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <br/>
    <!-- End Slider -->

    <!-- Facebook -->
    <div id="facebook">
      <div><strong>Facebook:</strong></div>
      <div>Url: <input type="text" name="facebook[url]" value="<?php echo e($optionValue['facebook']['url']); ?>" /></div>
    </div>
    <br/>
    <!-- End Facebook -->

    <!-- First Banner -->
    <div id="firstBanner" data-plugin="upload">
      <div class="form-group">
        <div><strong>First Banner:</strong></div>
        <div>Url: <input type="text" name="firstBanner[url]" value="<?php echo e($optionValue['firstBanner']['url']); ?>" /></div>
        <div>Image: <input type="text" class="form-control" name="firstBanner[image]" value="<?php echo e($optionValue['firstBanner']['image']); ?>" /></div>
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
        <div>Url: <input type="text" name="secondBanner[url]" value="<?php echo e($optionValue['secondBanner']['url']); ?>" /></div>
        <div>Image: <input type="text" class="form-control" name="secondBanner[image]" value="<?php echo e($optionValue['secondBanner']['image']); ?>" /></div>
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
        <div>Url: <input type="text" name="thirdBanner[url]" value="<?php echo e($optionValue['thirdBanner']['url']); ?>" /></div>
        <div>Image: <input type="text" class="form-control" name="thirdBanner[image]" value="<?php echo e($optionValue['thirdBanner']['image']); ?>" /></div>
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

    <!-- Fourth Banner -->
    <div id="fourthBanner" data-plugin="upload">
      <div class="form-group">
        <div><strong>Fourth Banner:</strong></div>
        <div>Url: <input type="text" name="fourthBanner[url]" value="<?php echo e($optionValue['fourthBanner']['url']); ?>" /></div>
        <div>Image: <input type="text" class="form-control" name="fourthBanner[image]" value="<?php echo e($optionValue['fourthBanner']['image']); ?>" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
      </div>
    </div>
    <br/>
    <!-- End Fourth Banner -->

    <!-- Service -->
    <div id="service">
      <div><strong>Service:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['service']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Class: <input type="text" name="service[<?php echo e($i); ?>][class]" value="<?php echo e($row['class']); ?>" /></div>
          <div>Heading: <input type="text" name="service[<?php echo e($i); ?>][heading]" value="<?php echo e($row['heading']); ?>" /></div>
          <div>Content: <input type="text" name="service[<?php echo e($i); ?>][content]" value="<?php echo e($row['content']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End Service -->

    <!-- Hotline -->
    <div id="hotline">
      <div><strong>Hotline:</strong></div>
      <div>Text 1: <input type="text" name="hotline[text1]" value="<?php echo e($optionValue['hotline']['text1']); ?>" /></div>
      <div>Text 2: <input type="text" name="hotline[text2]" value="<?php echo e($optionValue['hotline']['text2']); ?>" /></div>
      <div>Text 3: <input type="text" name="hotline[text3]" value="<?php echo e($optionValue['hotline']['text3']); ?>" /></div>
    </div>
    <br/>
    <!-- End Hotline -->

    <!-- Information -->
    <div id="information">
      <div><strong>Information:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="information[heading]" value="<?php echo e($optionValue['information']['heading']); ?>" /></div>
      <br/>
      <?php unset($optionValue['information']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['information']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Text: <input type="text" name="information[<?php echo e($i); ?>][text]" value="<?php echo e($row['text']); ?>" /></div>
          <div>Url: <input type="text" name="information[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End Information -->

    <!-- Customer Link -->
    <?php $customer_link = isset($optionValue['customer_link']) ? $optionValue['customer_link'] : []; ?>
    <div id="customer_link">
      <div><strong>Customer Link:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="customer_link[heading]" value="<?php echo e($customer_link['heading']); ?>" /></div>
      <br/>
      <?php unset($customer_link['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $customer_link; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Text: <input type="text" name="customer_link[<?php echo e($i); ?>][text]" value="<?php echo e($row['text']); ?>" /></div>
          <div>Url: <input type="text" name="customer_link[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End -->

    <!-- Support -->
    <div id="support">
      <div><strong>Support:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="support[heading]" value="<?php echo e($optionValue['support']['heading']); ?>" /></div>
      <br/>
      <?php unset($optionValue['support']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['support']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Text: <input type="text" name="support[<?php echo e($i); ?>][text]" value="<?php echo e($row['text']); ?>" /></div>
          <div>Url: <input type="text" name="support[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End Support -->

    <!-- Social -->
    <div id="social">
      <div><strong>Social:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['social']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Class: <input type="text" name="social[<?php echo e($i); ?>][class]" value="<?php echo e($row['class']); ?>" /></div>
          <div>Url: <input type="text" name="social[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End Social -->

    <!-- Fifth Banner -->
    <div id="fifthBanner" data-plugin="upload">
      <div class="form-group">
        <div><strong>Fifth Banner:</strong></div>
        <div>Url: <input type="text" name="fifthBanner[url]" value="<?php echo e($optionValue['fifthBanner']['url']); ?>" /></div>
        <div>Image: <input type="text" class="form-control" name="fifthBanner[image]" value="<?php echo e($optionValue['fifthBanner']['image']); ?>" /></div>
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

    <!-- Sixth Banner -->
    <div id="thirdBanner" data-plugin="upload">
      <div class="form-group">
        <div><strong>Sixth Banner:</strong></div>
        <div>Url: <input type="text" name="sixthBanner[url]" value="<?php echo e($optionValue['sixthBanner']['url']); ?>" /></div>
        <div>Image: <input type="text" class="form-control" name="sixthBanner[image]" value="<?php echo e($optionValue['sixthBanner']['image']); ?>" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
      </div>
    </div>
    <br/>
    <!-- End Sixth Banner -->

    <!-- Product Select Container -->
    <?php
      $numBegin = 1;
      $numEnd = 3;
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
    <div class="product-select-container product-select-container-row-<?php echo e($i); ?>">
      <div><strong>Product Position <?php echo e($i); ?>:</strong></div>
      <select class="main-select" name="main_select_<?php echo e($i); ?>">
        <option value="0" <?php if( $productType == 0 ): ?> selected <?php endif; ?> >Sản Phẩm Mới</option>
        <option value="1" <?php if( $productType == 1 ): ?> selected <?php endif; ?> >Danh Mục Sản Phẩm</option>
        <option value="2" <?php if( $productType == 2 ): ?> selected <?php endif; ?> >Nhóm Sản Phẩm</option>
      </select>
      <select class="product-category-select" name="product_category_<?php echo e($i); ?>">
        <?php $__currentLoopData = $productCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <option value="<?php echo e($taxonomy->taxonomy_slug); ?>" <?php if( $productSlug == $taxonomy->taxonomy_slug ): ?> selected <?php endif; ?> ><?php echo e($taxonomy->taxonomy_name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </select>
      <select class="product-group-select" name="product_group_<?php echo e($i); ?>">
        <?php $__currentLoopData = $productGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <option value="<?php echo e($taxonomy->taxonomy_slug); ?>" <?php if( $productSlug == $taxonomy->taxonomy_slug ): ?> selected <?php endif; ?> ><?php echo e($taxonomy->taxonomy_name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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
    <div class="post-select-container post-select-container-row-<?php echo e($i); ?>">
      <div><strong>Post Position <?php echo e($i); ?>:</strong></div>
      <select class="main-select" name="post_main_select_<?php echo e($i); ?>">
        <option value="0" <?php if( $postType == 0 ): ?> selected <?php endif; ?> >Bài viết Mới</option>
        <option value="1" <?php if( $postType == 1 ): ?> selected <?php endif; ?> >Danh Mục Bài viết</option>
      </select>
      <select class="post-category-select" name="post_category_<?php echo e($i); ?>">
        <?php $__currentLoopData = $postCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <option value="<?php echo e($taxonomy->taxonomy_slug); ?>" <?php if( $postSlug == $taxonomy->taxonomy_slug ): ?> selected <?php endif; ?> ><?php echo e($taxonomy->taxonomy_name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </select>
    </div>
    <?php
      }
    ?>
    <!-- End -->

    <!-- Logo footer -->
    <div id="logo_footer" data-plugin="upload">
      <div class="form-group">
        <div><strong>Logo Footer:</strong></div>
        <div>Image: <input type="text" class="form-control" name="logo_footer" value="<?php echo e(isset($optionValue['logo_footer']) ? $optionValue['logo_footer'] : ''); ?>" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
      </div>
    </div>
    <!-- End -->

    <!-- Copyright -->
    <div id="copyright">
      <div><strong>Copyright:</strong></div>
      <div>Text: <input type="text" name="copyright[text]" value="<?php echo e(isset($optionValue['copyright']['text']) ? $optionValue['copyright']['text'] : ''); ?>" /></div>
    </div>
    <!-- End Copyright -->

    <!-- Google Map -->
    <div id="google_map">
      <div><strong>Google Map:</strong></div>
        <div>Url: <input type="text" name="google_map[url]" value="<?php echo e(isset($optionValue['google_map']['url']) ? $optionValue['google_map']['url'] : ''); ?>" /></div>
    </div>
    <br/>
    <!-- End Google Map -->

    <!-- Information More -->
    <?php $information_more = isset($optionValue['information_more']) ? $optionValue['information_more'] : []; ?>
    <?php
      if( count($information_more) == 0 )
      {
        $information_more = [
          'heading' => '',
          [
            'text' => '',
          ],
        ];
      }
    ?>
    <div id="information_more">
      <div><strong>Information More:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="information_more[heading]" value="<?php echo e($information_more['heading']); ?>" /></div>
      <br/>
      <?php unset($information_more['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $information_more; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Text: <input type="text" name="information_more[<?php echo e($i); ?>][text]" value="<?php echo e($row['text']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
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
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div class="form-group">';
      row += '<div>Big Image: <input type="text" class="form-control" name="slider['+numberMaxElement+'][big_image]" value="" /></div>';
      row += '<span class="input-group-btn">';
      row += '<span class="fileUpload btn btn-primary">';
      row += '<span>Upload</span>';
      row += '<input type="file" name="file" class="upload" />';
      row += '</span>';
      row += '</span>';
      row += '</div>';
      row += '<div>Url: <input type="text" name="slider['+numberMaxElement+'][url]" value="" /></div>';
      row += '<div class="form-group">';
      row += '<div>Thumb Image: <input type="text" class="form-control" name="slider['+numberMaxElement+'][thumb_image]" value="" /></div>';
      row += '<span class="input-group-btn">';
      row += '<span class="fileUpload btn btn-primary">';
      row += '<span>Upload</span>';
      row += '<input type="file" name="file" class="upload" />';
      row += '</span>';
      row += '</span>';
      row += '</div>';
      row += '<div>Title: <input type="text" name="slider['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Description: <input type="text" name="slider['+numberMaxElement+'][description]" value="" /></div>';
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
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Class: <input type="text" name="service['+numberMaxElement+'][class]" value="" /></div>';
      row += '<div>Heading: <input type="text" name="service['+numberMaxElement+'][heading]" value="" /></div>';
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

    // Customer Link
    $('#customer_link .addRow').click(function(){
      var numberMaxElement = parseInt($('#customer_link .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="customer_link['+numberMaxElement+'][text]" value="" /></div>';
      row += '<div>Url: <input type="text" name="customer_link['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#customer_link .block').append(row);
      return false;
    });
    $('.theme').on('click','#customer_link .remove',function(){
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
      $numEnd = 3;
      for( $i=$numBegin; $i<=$numEnd; $i++ )
      {
    ?>
    var mainSelect = $('.product-select-container-row-<?php echo e($i); ?> select[name=main_select_<?php echo e($i); ?>]').val();
    if( mainSelect == 0 )
    {}
    else if( mainSelect == 1 )
    {
      $('.product-select-container-row-<?php echo e($i); ?> select[name=product_category_<?php echo e($i); ?>]').show();
    }else // mainSelect == 2
    {
      $('.product-select-container-row-<?php echo e($i); ?> select[name=product_group_<?php echo e($i); ?>]').show();
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
    var mainSelect = $('.post-select-container-row-<?php echo e($i); ?> select[name=post_main_select_<?php echo e($i); ?>]').val();
    if( mainSelect == 0 )
    {}
    else // mainSelect == 1
    {
      $('.post-select-container-row-<?php echo e($i); ?> select[name=post_category_<?php echo e($i); ?>]').show();
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

    // Information More
    $('#information_more .addRow').click(function(){
      var numberMaxElement = parseInt($('#information_more .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="information_more['+numberMaxElement+'][text]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#information_more .block').append(row);
      return false;
    });
    $('.theme').on('click','#information_more .remove',function(){
      $(this).parent().remove();
      return false;
    });

  }); 
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>