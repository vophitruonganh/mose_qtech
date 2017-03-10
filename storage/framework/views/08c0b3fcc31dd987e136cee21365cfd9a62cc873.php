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
    
    <!-- Welcome -->
    <div id="welcome">
      <div><strong>Welcome:</strong></div>
      <div><input type="text" name="welcome" value="<?php echo e($optionValue['welcome']); ?>" /></div>
    </div>
    <br/>
    <!-- End Welcome -->

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

    <!-- Slider -->
    <?php $slider = isset($optionValue['slider']) ? $optionValue['slider']: [];  ?>
    <?php
      if( count($slider) == 0 )
      {
        $slider = [
          [
            'image' => 'http://hstatic.net/796/1000055796/1000090795/slideshow_1.jpg',
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
      <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row form-group" data-id="<?php echo e($i); ?>">
          <div>Image: <input type="text" class="form-control" name="slider[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
          <span class="input-group-btn">
            <span class="fileUpload btn btn-primary">
              <span>Upload</span>
              <input type="file" name="file" class="upload" />
            </span>
          </span>
          <div>Url: <input type="text" name="slider[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <br/>
    <!-- End Slider -->

    <!-- Slider Menu -->
    <?php $slider_menu = isset($optionValue['slider_menu']) ? $optionValue['slider_menu']: [];  ?>
    <?php
      if( count($slider_menu) == 0 )
      {
        $slider_menu = [
          [
            'title' => '',
            'url' => '',
          ],
        ];
      }
    ?>
    <div id="slider_menu">
      <div><strong>Slider Menu:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $slider_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Title: <input type="text" name="slider_menu[<?php echo e($i); ?>][title]" value="<?php echo e($row['title']); ?>" /></div>
          <div>Url: <input type="text" name="slider_menu[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End -->

    <!-- Channel -->
    <div id="channel" data-plugin="upload">
      <div><strong>Channel:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['channel']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row form-group" data-id="<?php echo e($i); ?>">
          <div>Image: <input type="text" class="form-control" name="channel[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
          <span class="input-group-btn">
            <span class="fileUpload btn btn-primary">
              <span>Upload</span>
              <input type="file" name="file" class="upload" />
            </span>
          </span>
          <div>Title: <input type="text" name="channel[<?php echo e($i); ?>][title]" value="<?php echo e($row['title']); ?>" /></div>
          <div>Url: <input type="text" name="channel[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End channel -->

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

    <!-- Facebook -->
    <div id="facebook">
      <div><strong>Facebook:</strong></div>
      <div>Url: <input type="text" name="facebook[url]" value="<?php echo e($optionValue['facebook']['url']); ?>" /></div>
    </div>
    <br/>
    <!-- End Facebook -->

    <!-- Seventh Banner -->
    <div id="seventhBanner" data-plugin="upload">
      <div class="form-group">
        <div><strong>Seventh Banner:</strong></div>
        <div>Url: <input type="text" name="seventhBanner[url]" value="<?php echo e($optionValue['seventhBanner']['url']); ?>" /></div>
        <div>Image: <input type="text" class="form-control" name="seventhBanner[image]" value="<?php echo e($optionValue['seventhBanner']['image']); ?>" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
      </div>
    </div>
    <br/>
    <!-- End Seventh Banner -->

    <!-- Policy -->
    <div id="policy">
      <div><strong>Policy:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="policy[heading]" value="<?php echo e($optionValue['policy']['heading']); ?>" /></div>
      <br/>
      <?php unset($optionValue['policy']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['policy']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Class: <input type="text" name="policy[<?php echo e($i); ?>][class]" value="<?php echo e($row['class']); ?>" /></div>
          <div>Text: <input type="text" name="policy[<?php echo e($i); ?>][text]" value="<?php echo e($row['text']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End Policy -->

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

    <!-- Eighth Banner -->
    <div id="eighthBanner" data-plugin="upload">
      <div class="form-group">
        <div><strong>Eighth Banner:</strong></div>
        <div>Url: <input type="text" name="eighthBanner[url]" value="<?php echo e($optionValue['eighthBanner']['url']); ?>" /></div>
        <div>Image: <input type="text" class="form-control" name="eighthBanner[image]" value="<?php echo e($optionValue['eighthBanner']['image']); ?>" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
      </div>
    </div>
    <br/>
    <!-- End Eighth Banner -->

    <!-- Ninth Banner -->
    <div id="ninthBanner" data-plugin="upload">
      <div class="form-group">
        <div><strong>Ninth Banner:</strong></div>
        <div>Url: <input type="text" name="ninthBanner[url]" value="<?php echo e($optionValue['ninthBanner']['url']); ?>" /></div>
        <div>Image: <input type="text" class="form-control" name="ninthBanner[image]" value="<?php echo e($optionValue['ninthBanner']['image']); ?>" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
      </div>
    </div>
    <br/>
    <!-- End Ninth Banner -->

    <!-- Product Select Container -->
    <?php
      $numBegin = 1;
      $numEnd = 7;
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

    <!-- Links -->
    <?php $links = isset($optionValue['links']) ? $optionValue['links']: [];  ?>
    <?php
      if( count($links) == 0 )
      {
        $links = [
          'heading' => '',
          [
            'title' => '',
            'url' => '',
          ],
        ];
      }
    ?>
    <div id="links">
      <div><strong>Links:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="links[heading]" value="<?php echo e($links['heading']); ?>" /></div>
      <br/>
      <?php unset($links['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Title: <input type="text" name="links[<?php echo e($i); ?>][title]" value="<?php echo e($row['title']); ?>" /></div>
          <div>Url: <input type="text" name="links[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End -->

    <!-- Support -->
    <?php $support = isset($optionValue['support']) ? $optionValue['support']: [];  ?>
    <?php
      if( count($support) == 0 )
      {
        $support = [
          'heading' => '',
          [
            'title' => '',
            'url' => '',
          ],
        ];
      }
    ?>
    <div id="support">
      <div><strong>Support:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="support[heading]" value="<?php echo e($support['heading']); ?>" /></div>
      <br/>
      <?php unset($support['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $support; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Title: <input type="text" name="support[<?php echo e($i); ?>][title]" value="<?php echo e($row['title']); ?>" /></div>
          <div>Url: <input type="text" name="support[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End -->

    <!-- Service Menu -->
    <?php $service_menu = isset($optionValue['service_menu']) ? $optionValue['service_menu']: [];  ?>
    <?php
      if( count($service_menu) == 0 )
      {
        $service_menu = [
          'heading' => '',
          [
            'title' => '',
            'url' => '',
          ],
        ];
      }
    ?>
    <div id="service_menu">
      <div><strong>Service Menu:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="service_menu[heading]" value="<?php echo e($service_menu['heading']); ?>" /></div>
      <br/>
      <?php unset($service_menu['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $service_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Title: <input type="text" name="service_menu[<?php echo e($i); ?>][title]" value="<?php echo e($row['title']); ?>" /></div>
          <div>Url: <input type="text" name="service_menu[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
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

    // Slider Menu
    $('#slider_menu .addRow').click(function(){
      var numberMaxElement = parseInt($('#slider_menu .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Title: <input type="text" name="slider_menu['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Url: <input type="text" name="slider_menu['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#slider_menu .block').append(row);
      return false;
    });
    $('.theme').on('click','#slider_menu .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Channel
    $('#channel .addRow').click(function(){
      var numberMaxElement = parseInt($('#channel .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row form-group" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" class="form-control" name="channel['+numberMaxElement+'][image]" value="" /></div>';
      row += '<span class="input-group-btn">';
      row += '<span class="fileUpload btn btn-primary">';
      row += '<span>Upload</span>';
      row += '<input type="file" name="file" class="upload" />';
      row += '</span>';
      row += '</span>';
      row += '<div>Title: <input type="text" name="channel['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Url: <input type="text" name="channel['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#channel .block').append(row);
      return false;
    });
    $('.theme').on('click','#channel .remove',function(){
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

    // Policy
    $('#policy .addRow').click(function(){
      var numberMaxElement = parseInt($('#policy .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Class: <input type="text" name="policy['+numberMaxElement+'][class]" value="" /></div>';
      row += '<div>Text: <input type="text" name="policy['+numberMaxElement+'][text]" value="" /></div>';
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
      $numEnd = 7;
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

    // Links
    $('#links .addRow').click(function(){
      var numberMaxElement = parseInt($('#links .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Title: <input type="text" name="links['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Url: <input type="text" name="links['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#links .block').append(row);
      return false;
    });
    $('.theme').on('click','#links .remove',function(){
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

    // Service Menu
    $('#service_menu .addRow').click(function(){
      var numberMaxElement = parseInt($('#service_menu .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Title: <input type="text" name="service_menu['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Url: <input type="text" name="service_menu['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#service_menu .block').append(row);
      return false;
    });
    $('.theme').on('click','#service_menu .remove',function(){
      $(this).parent().remove();
      return false;
    });

  }); 
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>