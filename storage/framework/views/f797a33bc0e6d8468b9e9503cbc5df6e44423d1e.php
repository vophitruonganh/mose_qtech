<?php $__env->startSection('titlePage','Theme Option'); ?>
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(url('admin/template/option')); ?>" method="post">
  <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="theme">

    <!-- image_sidebar -->
    <div id="image_sidebar">
      <div><strong>Image_sidebar:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['image_sidebar']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Image: <input type="text" name="image_sidebar[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End image_sidebar -->

    <!-- first_banner -->
    <div id="first_banner">
      <div><strong>First_banner:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['first_banner']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Image: <input type="text" name="first_banner[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End first_banner -->

    <!-- second_banner -->
    <div id="second_banner">
      <div><strong>Second_banner:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['second_banner']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Image: <input type="text" name="second_banner[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End second_banner -->

   <!-- payment -->
    <div id="payment">
      <div><strong>Payment:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="payment[heading]" value="<?php echo e($optionValue['payment']['heading']); ?>" /></div>
      <br/>
      <?php unset($optionValue['payment']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['payment']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Image: <input type="text" name="payment[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End payment -->

    <!-- support -->
    <div id="support">
      <div><strong>Support:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="support[heading]" value="<?php echo e($optionValue['support']['heading']); ?>" /></div>
      <div>Image: <input type="text" name="support[image]" value="<?php echo e($optionValue['support']['image']); ?>" /></div>
      <br/>
      <?php unset($optionValue['support']['heading']); ?>
      <?php unset($optionValue['support']['image']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['support']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Text: <input type="text" name="support[<?php echo e($i); ?>][text]" value="<?php echo e($row['text']); ?>" /></div>
          <div>Phone: <input type="text" name="support[<?php echo e($i); ?>][phone]" value="<?php echo e($row['phone']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End support -->

    <!-- information -->
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
    <!-- End information -->

    <!-- contact -->
    <div id="contact">
      <div><strong>Contact:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="contact[heading]" value="<?php echo e($optionValue['contact']['heading']); ?>" /></div>
      <br/>
      <?php unset($optionValue['contact']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['contact']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Text: <input type="text" name="contact[<?php echo e($i); ?>][text]" value="<?php echo e($row['text']); ?>" /></div>
          <div>Url: <input type="text" name="contact[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End contact -->

    <!-- policy -->
    <div id="policy">
      <div><strong>Policy:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="policy[heading]" value="<?php echo e($optionValue['policy']['heading']); ?>" /></div>
      <br/>
      <?php unset($optionValue['policy']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['policy']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Text: <input type="text" name="policy[<?php echo e($i); ?>][text]" value="<?php echo e($row['text']); ?>" /></div>
          <div>Url: <input type="text" name="policy[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End policy -->

    <!-- facebook -->
    <div id="facebook">
      <div><strong>Facebook:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['facebook']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>url: <input type="text" name="facebook[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End facebook -->

    <!-- branch -->
    <div id="branch">
      <div><strong>Branch:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="branch[heading]" value="<?php echo e($optionValue['branch']['heading']); ?>" /></div>
      <br/>
      <?php unset($optionValue['branch']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['branch']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Address: <input type="text" name="branch[<?php echo e($i); ?>][address]" value="<?php echo e($row['address']); ?>" /></div>
          <div>Phone: <input type="text" name="branch[<?php echo e($i); ?>][phone]" value="<?php echo e($row['phone']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End branch -->

    <!-- map -->
    <div id="map">
      <div><strong>Map:</strong><a class="addRow" href="#">Add</a></div>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['map']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Src: <input type="text" name="map[<?php echo e($i); ?>][src]" value="<?php echo e($row['src']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End map -->

    <br/>
    <div><input type="submit" value="Save" /></div>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function(){
    // image_sidebar
    $('#image_sidebar .addRow').click(function(){
      var numberMaxElement = parseInt($('#image_sidebar .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="image_sidebar['+numberMaxElement+'][image]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#image_sidebar .block').append(row);
      return false;
    });
    $('.theme').on('click','#image_sidebar .remove',function(){
      $(this).parent().remove();
      return false;
    });
    //End image sidebar

    // first_banner
    $('#first_banner .addRow').click(function(){
      var numberMaxElement = parseInt($('#first_banner .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="first_banner['+numberMaxElement+'][image]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#first_banner .block').append(row);
      return false;
    });
    $('.theme').on('click','#first_banner .remove',function(){
      $(this).parent().remove();
      return false;
    });
    //End first_banner

    // second_banner
    $('#second_banner .addRow').click(function(){
      var numberMaxElement = parseInt($('#second_banner .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="second_banner['+numberMaxElement+'][image]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#second_banner .block').append(row);
      return false;
    });
    $('.theme').on('click','#second_banner .remove',function(){
      $(this).parent().remove();
      return false;
    });
    //End second_banner

    // payment
    $('#payment .addRow').click(function(){
      var numberMaxElement = parseInt($('#payment .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="payment['+numberMaxElement+'][image]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#payment .block').append(row);
      return false;
    });
    $('.theme').on('click','#payment .remove',function(){
      $(this).parent().remove();
      return false;
    });
    // End payment

    // support
    $('#support .addRow').click(function(){
      var numberMaxElement = parseInt($('#support .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="support['+numberMaxElement+'][text]" value="" /></div>';
      row += '<div>Phone: <input type="text" name="support['+numberMaxElement+'][phone]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#support .block').append(row);
      return false;
    });
    $('.theme').on('click','#support .remove',function(){
      $(this).parent().remove();
      return false;
    });
    // End support

    // information
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
    // End information

    // contact
    $('#contact .addRow').click(function(){
      var numberMaxElement = parseInt($('#contact .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="contact['+numberMaxElement+'][text]" value="" /></div>';
      row += '<div>Url: <input type="text" name="contact['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#contact .block').append(row);
      return false;
    });
    $('.theme').on('click','#contact .remove',function(){
      $(this).parent().remove();
      return false;
    });
    // End contact

    // policy
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
    // End policy

    // facebook
    $('#facebook .addRow').click(function(){
      var numberMaxElement = parseInt($('#facebook .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Url: <input type="text" name="facebook['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#facebook .block').append(row);
      return false;
    });
    $('.theme').on('click','#facebook .remove',function(){
      $(this).parent().remove();
      return false;
    });
    //End image sidebar


    // branch
    $('#branch .addRow').click(function(){
      var numberMaxElement = parseInt($('#branch .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Address: <input type="text" name="branch['+numberMaxElement+'][address]" value="" /></div>';
      row += '<div>Phone: <input type="text" name="branch['+numberMaxElement+'][phone]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#branch .block').append(row);
      return false;
    });
    $('.theme').on('click','#branch .remove',function(){
      $(this).parent().remove();
      return false;
    });
    // End branch


    // map
    $('#map .addRow').click(function(){
      var numberMaxElement = parseInt($('#map .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Src: <input type="text" name="map['+numberMaxElement+'][src]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#map .block').append(row);
      return false;
    });
    $('.theme').on('click','#map .remove',function(){
      $(this).parent().remove();
      return false;
    });
    // End map

  }); 
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>