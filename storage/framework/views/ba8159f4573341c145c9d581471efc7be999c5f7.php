<?php $__env->startSection('titlePage','Theme Option'); ?>
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(url('admin/template/option')); ?>" method="post">
  <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="theme">

    <!-- Header info -->
    <?php $optionValue['header_info'] = isset($optionValue['header_info']) ? $optionValue['header_info']: [];  ?>
    <div>
      <div><strong>Header info:</strong></div>
      <div>Text: <input type="text" name="header_info[text]" value="<?php echo e(isset($optionValue['header_info']['text']) ? $optionValue['header_info']['text']: ''); ?>" /></div>
    </div>
    <!-- End -->
    <!-- Logo -->
    <?php $optionValue['logo_main'] = isset($optionValue['logo_main']) ? $optionValue['logo_main']: [];  ?>
    <div id="logo_main">
        <div><strong>Logo main:</strong><a class="addRow" href="#">Add</a></div>
        <?php $i=0; ?>
        <div class="block">
            <?php $__currentLoopData = $optionValue['logo_main']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <div class="row" data-id ="<?php echo e($i); ?>">
                  <div>Image: <input type="text" name="logo_main[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
                  <div>Url: <input type="text" name="logo_main[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
                   <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
              </div>
              <br/>
              <?php $i++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
    </div>
    <!-- Endlogo -->

    <!-- Slide main -->
    <?php $optionValue['slide_main'] = isset($optionValue['slide_main']) ? $optionValue['slide_main']: [];  ?>
    <div id="slide_main">
      <div><strong>Slide main:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['slide_main']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Image: <input type="text" name="slide_main[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
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
    <div id="feature">
      <div><strong>Feature:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['feature']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Image: <input type="text" name="feature[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
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
    <div id="testimonial">
      <div><strong>Testimonial:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="testimonial[heading]" value="<?php echo e($optionValue['testimonial']['heading']); ?>" /></div>
      <br/>
      <?php unset($optionValue['testimonial']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['testimonial']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Content: <input type="text" name="testimonial[<?php echo e($i); ?>][content]" value="<?php echo e($row['content']); ?>" /></div>
          <div>Image: <input type="text" name="testimonial[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
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
    <div>
      <div><strong>Photo:</strong></div>
      <div>Heading: <input type="text" name="photo[heading]" value="<?php echo e($optionValue['photo']['heading']); ?>" /></div>
      <div>Url: <input type="text" name="photo[url]" value="<?php echo e($optionValue['photo']['url']); ?>" /></div>
      <div>Image: <input type="text" name="photo[image]" value="<?php echo e($optionValue['photo']['image']); ?>" /></div>
    </div>
    <!-- End Photo -->

    <!-- About -->
    <div>
      <div><strong>About:</strong></div>
      <div>Heading: <input type="text" name="about[heading]" value="<?php echo e($optionValue['about']['heading']); ?>" /></div>
      <div>Url: <input type="text" name="about[url]" value="<?php echo e($optionValue['about']['url']); ?>" /></div>
      <div>Image: <input type="text" name="about[image]" value="<?php echo e($optionValue['about']['image']); ?>" /></div>
      <div>Content: <input type="text" name="about[content]" value="<?php echo e($optionValue['about']['content']); ?>" /></div>
    </div>

    <!-- End About -->
    <?php $optionValue['footer'] = isset($optionValue['footer']) ? $optionValue['footer']: [];  ?>
    <div>
      <div><strong>Footer:</strong></div>
      <div>Company: <input type="text" name="footer[company]" value="<?php echo e(isset($optionValue['footer']['company']) ? $optionValue['footer']['company']: ''); ?>" /></div>
      <div>Address: <input type="text" name="footer[address]" value="<?php echo e(isset($optionValue['footer']['address']) ? $optionValue['footer']['address']: ''); ?>" /></div>
      <div>Contact: <input type="text" name="footer[contact]" value="<?php echo e(isset($optionValue['footer']['contact']) ? $optionValue['footer']['contact']: ''); ?>" /></div>
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

    // Slide main
    $('#slide_main .addRow').click(function(){
      var numberMaxElement = parseInt($('#slide_main .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="slide_main['+numberMaxElement+'][image]" value="" /></div>';
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
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="feature['+numberMaxElement+'][image]" value="" /></div>';
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
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Content: <input type="text" name="testimonial['+numberMaxElement+'][content]" value="" /></div>';
      row += '<div>Image: <input type="text" name="testimonial['+numberMaxElement+'][image]" value="" /></div>';
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