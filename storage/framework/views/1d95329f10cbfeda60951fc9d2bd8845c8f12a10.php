<?php $__env->startSection('titlePage','Theme Option'); ?>
<?php $__env->startSection('content'); ?>

<form action="<?php echo e(url('admin/template/option')); ?>" method="post">
  <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="theme">
    <table>
      <tbody>
        <!-- Header Info !-->
        <tr>
          <td class=""><h1>Header Infomation</h1></td>
        </tr>
        <tr>
          <td>
            <input class="form-control" type="text" placeholder="Infomation header" name="header_info[text]" value="<?php echo e(isset($optionValue['header_info']['text']) ? $optionValue['header_info']['text']:null); ?>" />
          </td>
        </tr>
        <!-- End Header Info !-->

        <!-- Favicon -->
        <tr>
          <td class=""><h1>Favicon</h1></td>
        </tr>
        <tr>
          <td>
            <input type="text" class="form-control" placeholder="Path URL Images" name="favicon[image]" value="<?php echo e(isset($optionValue['favicon']['image']) ? $optionValue['favicon']['image'] : ''); ?>" />
          </td>
          <td>
            <span class="input-group-btn">
              <span class="fileUpload btn btn-primary">
                <span>Upload</span>
                <input type="file" name="file" class="upload" />
              </span>
            </span>
          </td>
        </tr>
        <!--End Favicon -->

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
        <tr>
          <td><h1>Background Page <a class="addRow btn btn-primary" href="#">Add</a></h1></td>
        </tr>
        <tr>
          <td>
            <?php $i=0; ?>
            <div class="block">
                <?php $__currentLoopData = $background_page; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <div class="form-group" data-id ="<?php echo e($i); ?>">
                      <div><input class="form-control" type="text" placeholder="URL Images" name="background_page[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
                      <div><input type="text" class="form-control" placeholder="Choose Images Upload" name="background_page[<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
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
          </td>
        </tr>
        <!-- End Background Page -->
        <!-- Logo -->
        <tr>
          <td>
            <h1>Logo Main <a class="addRow" href="#">Add</a></h1>
          </td>
        </tr>
        <tr>
          <?php $optionValue['logo_main'] = isset($optionValue['logo_main']) ? $optionValue['logo_main']: [];  ?>
          <td>
            <div id="logo_main">
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
          </td>
        </tr>
        <!-- Endlogo -->
      </tbody>
    </table>
    </div>



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

    <!-- About -->
    <div data-plugin="upload">
      <div class="form-group">
        <div><strong>About:</strong></div>

        <div>
          <label for="">
          Heading:
          <input type="text" name="about[heading]" value="<?php echo e(isset($optionValue['about']['heading'])?$optionValue['about']['heading']:null); ?>" />
          </label>
        </div>
        <div>Url: <input type="text" name="about[url]" value="<?php echo e(isset($optionValue['about']['heading'])?$optionValue['about']['url']:null); ?>" /></div>
        <div>Image: <input type="text" class="form-control" name="about[image]" value="<?php echo e(isset($optionValue['about']['heading'])?$optionValue['about']['images']:null); ?>" /></div>
        <span class="input-group-btn">
          <span class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" name="file" class="upload" />
          </span>
        </span>
        <div>Content: <input type="text" name="about[content]" value="<?php echo e(isset($optionValue['about']['content'])?$optionValue['about']['content']:null); ?>" /></div>
      </div>
    </div>


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


    // Background Page
    $('#background_page .addRow').click(function(){
      var numberMaxElement = parseInt($('#background_page .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row form-group col-lg-12" data-id="'+numberMaxElement+'">';
      row += '<div>URL: <input class="form-control" type="text" name="background_page['+numberMaxElement+'][url]" value="" /></div>';
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