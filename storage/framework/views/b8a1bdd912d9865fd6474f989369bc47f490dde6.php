<?php $__env->startSection('titlePage','Theme Option'); ?>
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(url('admin/template/option')); ?>" method="post">
  <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="theme">

    <!-- Logo main -->
    <div id="logo_main">
      <div><strong>Logo main:</strong></div>
      <div>Image: <input type="text" name="logo_main" value="<?php echo e(isset($optionValue['logo_main']) ? $optionValue['logo_main'] : ''); ?>" /></div>
    </div>
    <!-- End Logo Main -->

    <!-- Slider -->
    <?php $slider = isset($optionValue['slider']) ? $optionValue['slider']: [];  ?>
    <?php
      if( count($slider) == 0 )
      {
        $slider = [
          [
            'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/slider-1.jpg',
            'url' => '#',
          ],
          [
            'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/slider-2.jpg',
            'url' => '#',
          ],
          [
            'image' => 'http://store.moseplus.com/template/giaodien5/asset/images/slider-3.jpg',
            'url' => '#',
          ],
        ];
      }
    ?>
    <div id="slider">
      <div><strong>Mini Slider:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Image: <input type="text" name="slider[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
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

    <!-- Service -->
    <div id="service">
      <div><strong>Service:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="service[heading]" value="<?php echo e($optionValue['service']['heading']); ?>" /></div>
      <div>Description: <input type="text" name="service[description]" value="<?php echo e($optionValue['service']['description']); ?>" /></div>
      <br/>
      <?php unset($optionValue['service']['heading']); ?>
      <?php unset($optionValue['service']['description']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['service']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Image: <input type="text" name="service[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
          <div>Text: <input type="text" name="service[<?php echo e($i); ?>][text]" value="<?php echo e($row['text']); ?>" /></div>
          <div>Content: <input type="text" name="service[<?php echo e($i); ?>][content]" value="<?php echo e($row['content']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End Service -->

    <!-- Personnel -->
    <div id="personnel">
      <div><strong>Personnel:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="personnel[heading]" value="<?php echo e($optionValue['personnel']['heading']); ?>" /></div>
      <div>Text: <input type="text" name="personnel[text]" value="<?php echo e($optionValue['personnel']['text']); ?>" /></div>
      <br/>
      <?php unset($optionValue['personnel']['heading']); ?>
      <?php unset($optionValue['personnel']['text']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['personnel']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Image: <input type="text" name="personnel[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
          <div>Name: <input type="text" name="personnel[<?php echo e($i); ?>][name]" value="<?php echo e($row['name']); ?>" /></div>
          <div>Job: <input type="text" name="personnel[<?php echo e($i); ?>][job]" value="<?php echo e($row['job']); ?>" /></div>
          <div>Facebook: <input type="text" name="personnel[<?php echo e($i); ?>][facebook]" value="<?php echo e($row['facebook']); ?>" /></div>
          <div>Twitter: <input type="text" name="personnel[<?php echo e($i); ?>][twitter]" value="<?php echo e($row['twitter']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End Personnel -->

    <!-- About -->
    <div id="about">
      <div><strong>About:</strong></div>
      <div>Heading: <input type="text" name="about[heading]" value="<?php echo e($optionValue['about']['heading']); ?>" /></div>
      <div>Text: <input type="text" name="about[text]" value="<?php echo e($optionValue['about']['text']); ?>" /></div>
    </div>
    <br/>
    <!-- End About -->

    <!-- Testimonial -->
    <div id="testimonial">
      <div><strong>testimonial:</strong><a class="addRow" href="#">Add</a></div>
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
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End Testimonial -->

    <!-- Đối tác -->
    <div id="doitac">
      <div><strong>Đối tác:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="doitac[heading]" value="<?php echo e($optionValue['doitac']['heading']); ?>" /></div>
      <br/>
      <?php unset($optionValue['doitac']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['doitac']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Image: <input type="text" name="doitac[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
          <div>Url: <input type="text" name="doitac[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End Đối tác -->

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
          <div>Title: <input type="text" name="policy[<?php echo e($i); ?>][title]" value="<?php echo e($row['title']); ?>" /></div>
          <div>Url: <input type="text" name="policy[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End Policy -->

    <!-- Facebook -->
    <div id="facebook">
      <div><strong>Facebook:</strong></div>
      <div>Url: <input type="text" name="facebook[url]" value="<?php echo e($optionValue['facebook']['url']); ?>" /></div>
    </div>
    <br/>
    <!-- End Facebook -->

    <!-- Google Map -->
    <div id="google_map">
      <div><strong>Google Map:</strong></div>
        <div>Url: <input type="text" name="google_map[url]" value="<?php echo e(isset($optionValue['google_map']['url']) ? $optionValue['google_map']['url'] : ''); ?>" /></div>
    </div>
    <br/>
    <!-- End Google Map -->

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
    
    // Service
    $('#service .addRow').click(function(){
      var numberMaxElement = parseInt($('#service .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="service['+numberMaxElement+'][image]" value="" /></div>';
      row += '<div>Text: <input type="text" name="service['+numberMaxElement+'][text]" value="" /></div>';
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

    // Personnel
    $('#personnel .addRow').click(function(){
      var numberMaxElement = parseInt($('#personnel .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="personnel['+numberMaxElement+'][image]" value="" /></div>';
      row += '<div>Name: <input type="text" name="personnel['+numberMaxElement+'][name]" value="" /></div>';
      row += '<div>Job: <input type="text" name="personnel['+numberMaxElement+'][job]" value="" /></div>';
      row += '<div>Facebook: <input type="text" name="personnel['+numberMaxElement+'][facebook]" value="" /></div>';
      row += '<div>Twitter: <input type="text" name="personnel['+numberMaxElement+'][twitter]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#personnel .block').append(row);
      return false;
    });
    $('.theme').on('click','#personnel .remove',function(){
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
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#testimonial .block').append(row);
      return false;
    });
    $('.theme').on('click','#testimonial .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Đối tác
    $('#doitac .addRow').click(function(){
      var numberMaxElement = parseInt($('#doitac .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="doitac['+numberMaxElement+'][image]" value="" /></div>';
      row += '<div>Url: <input type="text" name="doitac['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#doitac .block').append(row);
      return false;
    });
    $('.theme').on('click','#doitac .remove',function(){
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

  }); 
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>