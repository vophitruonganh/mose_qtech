<?php $__env->startSection('titlePage','Theme Option'); ?>
<?php $__env->startSection('content'); ?>
  <form action="<?php echo e(url('admin/template/option')); ?>" method="post">
    <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="theme">
      <!-- Header info !-->
      <?php $optionValue['header_info'] = isset($optionValue['header_info']) ? $optionValue['header_info']: [];  ?>
      <div>
        <div><strong>Header info:</strong></div>
        <div>Text: <input type="text" name="header_info[text]" value="<?php echo e(isset($optionValue['header_info']['text']) ? $optionValue['header_info']['text']:null); ?>" /></div>
      </div>
      <!-- End -->
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
            <?php $__currentLoopData = $background_page; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <div class="row form-group" data-id ="<?php echo e($i); ?>">
                  <div>Url: <input type="text" name="background_page[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
                  <div>Image: <input type="text" class="form-control" name="background_page[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
                  <span class="input-group-btn">
                    <span class="fileUpload btn btn-primary">
                      <span>Upload</span>
                      <input type="file" name="file" class="upload" />
                    </span>
                  </span>
                   <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
              </div>
              <br/>
              <?php $i++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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
          <div>Image: <input type="text" class="form-control" name="logo_main[image]" value="<?php echo e(isset($optionValue['logo_main']['image']) ? $optionValue['logo_main']['image'] : ''); ?>" /></div>
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
        <?php $__currentLoopData = $optionValue['slide_main']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <div class="row form-group" data-id="<?php echo e($i); ?>">
            <div>Image: <input type="text" class="form-control" name="slide_main[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
            <span class="input-group-btn">
              <span class="fileUpload btn btn-primary">
                <span>Upload</span>
                <input type="file" name="file" class="upload" />
              </span>
            </span>
            <div>Url: <input type="text" name="slide_main[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
            <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
          </div>
        <br/>
        <?php $i++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
      </div>
      <!-- End slide main -->

      <!-- Feature -->
      <div id="feature" data-plugin="upload">
        <div><strong>Feature:</strong><a class="addRow" href="#">Add</a></div>
        <?php $i = 0; ?>
        <div class="block">
        <?php $__currentLoopData = $optionValue['feature']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <div class="row form-group" data-id="<?php echo e($i); ?>">
            <div>Image: <input type="text" class="form-control" name="feature[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
            <span class="input-group-btn">
              <span class="fileUpload btn btn-primary">
                <span>Upload</span>
                <input type="file" name="file" class="upload" />
              </span>
            </span>
            <div>Title: <input type="text" name="feature[<?php echo e($i); ?>][title]" value="<?php echo e($row['title']); ?>" /></div>
            <div>Description: <input type="text" name="feature[<?php echo e($i); ?>][description]" value="<?php echo e($row['description']); ?>" /></div>
            <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
          </div>
        <br/>
        <?php $i++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
      </div>
      <!-- End Feature -->

      <!-- Testimonial -->
      <div id="testimonial" data-plugin="upload">
        <div><strong>Testimonial:</strong><a class="addRow" href="#">Add</a></div>
        <div>Heading: <input type="text" name="testimonial[heading]" value="<?php echo e($optionValue['testimonial']['heading']); ?>" /></div>
        <br/>
        <?php unset($optionValue['testimonial']['heading']); ?>
        <?php $i = 0; ?>
        <div class="block">
        <?php $__currentLoopData = $optionValue['testimonial']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <div class="row form-group" data-id="<?php echo e($i); ?>">
            <div>Content: <input type="text" name="testimonial[<?php echo e($i); ?>][content]" value="<?php echo e($row['content']); ?>" /></div>
            <div>Image: <input type="text" class="form-control" name="testimonial[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
            <span class="input-group-btn">
              <span class="fileUpload btn btn-primary">
                <span>Upload</span>
                <input type="file" name="file" class="upload" />
              </span>
            </span>
            <div>Name: <input type="text" name="testimonial[<?php echo e($i); ?>][name]" value="<?php echo e($row['name']); ?>" /></div>
            <div>Description: <input type="text" name="testimonial[<?php echo e($i); ?>][description]" value="<?php echo e($row['description']); ?>" /></div>
            <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
          </div>
        <br/>
        <?php $i++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
      </div>
      <!-- End Testimonial -->

      <!-- Photo -->
      <div data-plugin="upload">
        <div class="form-group">
          <div><strong>Photo:</strong></div>
          <div>Heading: <input type="text" name="photo[heading]" value="<?php echo e($optionValue['photo']['heading']); ?>" /></div>
          <div>Url: <input type="text" name="photo[url]" value="<?php echo e($optionValue['photo']['url']); ?>" /></div>
          <div>Image: <input type="text" class="form-control" name="photo[image]" value="<?php echo e($optionValue['photo']['image']); ?>" /></div>
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
          <?php $optionValue = $optionValue['about']['heading']?$optionValue['about']['heading']:[] ?>
          <div>Heading: <input type="text" name="about[heading]" value="<?php echo e($optionValue); ?>" /></div>
          <div>Url: <input type="text" name="about[url]" value="<?php echo e($optionValue['about']['url']); ?>" /></div>
          <div>Image: <input type="text" class="form-control" name="about[image]" value="<?php echo e($optionValue['about']['image']); ?>" /></div>
          <span class="input-group-btn">
            <span class="fileUpload btn btn-primary">
              <span>Upload</span>
              <input type="file" name="file" class="upload" />
            </span>
          </span>
          <div>Content: <input type="text" name="about[content]" value="<?php echo e($optionValue['about']['content']); ?>" /></div>
        </div>
      </div>

      <!-- End About -->
      <?php $optionValue['footer'] = isset($optionValue['footer']) ? $optionValue['footer']: [];  ?>
      <div>
        <div><strong>Footer:</strong></div>
        <div>Company: <input type="text" name="footer[company]" value="<?php echo e(isset($optionValue['footer']['company']) ? $optionValue['footer']['company']: ''); ?>" /></div>
        <?php /* <div>Address: <input type="text" name="footer[address]" value="{{ isset($optionValue['footer']['address']) ? $optionValue['footer']['address']: '' }}" /></div> */ ?>
        <?php /* <div>Contact: <input type="text" name="footer[contact]" value="{{ isset($optionValue['footer']['contact']) ? $optionValue['footer']['contact']: '' }}" /></div> */ ?>
        <div>Copyright: <input type="text" name="footer[copyright]" value="<?php echo e(isset($optionValue['footer']['copyright']) ? $optionValue['footer']['copyright']: ''); ?>" /></div>
      </div>
      <!-- Footer -->

      <!-- End footer -->
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


    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>