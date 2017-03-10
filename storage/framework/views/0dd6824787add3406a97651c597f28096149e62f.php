<?php $__env->startSection('titlePage','Theme Option'); ?>
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(url('admin/template/option')); ?>" method="post">
  <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="theme">
      

   <div id="firstAdvertise">
      <div><strong>First Advertise:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['firstAdvertise']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Image: <input type="text" name="firstAdvertise[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
          <div>Url: <input type="text" name="firstAdvertise[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
      
    <br/>
    
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
    
     <!-- CMS -->
    <div id="cms">
      <div><strong>CMS:</strong></div>
      <div>Url: <input type="text" name="cms[url]" value="<?php echo e($optionValue['cms']['url']); ?>" /></div>
      <div>Image: <input type="text" name="cms[image]" value="<?php echo e($optionValue['cms']['image']); ?>" /></div>
      <div>Text: <input type="text" name="cms[text]" value="<?php echo e($optionValue['cms']['text']); ?>" /></div>
      <div>TextArea: 
           <textarea type="text" name="cms[textArea]" rows="5" cols="80"><?php echo e($optionValue['cms']['textArea']); ?>

            </textarea>
      </div>
    </div>
    <br/>
    <!-- End First Banner -->
    
    <div><input type="submit" value="Save" /></div>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function(){

    // Advertise
    $('#firstAdvertise .addRow').click(function(){
      var numberMaxElement = parseInt($('#firstAdvertise .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="firstAdvertise['+numberMaxElement+'][image]" value="" /></div>';
      row += '<div>Url: <input type="text" name="firstAdvertise['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#firstAdvertise .block').append(row);
      return false;
    });
    $('.theme').on('click','#firstAdvertise .remove',function(){
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
    
    // Doi tac
    $('#doitac .addRow').click(function(){
      var numberMaxElement = parseInt($('#doitac .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Class: <input type="text" name="doitac['+numberMaxElement+'][class]" value="" /></div>';
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
    
    
    
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>