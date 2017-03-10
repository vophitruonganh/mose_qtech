<?php $__env->startSection('titlePage','Theme Option'); ?>
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(url('admin/template/option')); ?>" method="post">
  <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="theme">

    <!-- Right Menu -->
    <div><strong>Right Menu:</strong></div>
    <div>Telephone: <input type="text" name="rightMenu[telephone]" value="<?php echo e($optionValue['rightMenu']['telephone']); ?>" /></div>
    <div>Link:<br />
      Text: <input type="text" name="rightMenu[link][text]" value="<?php echo e($optionValue['rightMenu']['link']['text']); ?>" />
      <br/>
      Url: <input type="text" name="rightMenu[link][url]" value="<?php echo e($optionValue['rightMenu']['link']['url']); ?>" />
    </div>
    <div>Video:<br />
      Text: <input type="text" name="rightMenu[video][text]" value="<?php echo e($optionValue['rightMenu']['video']['text']); ?>" />
      <br/>
      Youtube: <input type="text" name="rightMenu[video][youtube]" value="<?php echo e($optionValue['rightMenu']['video']['youtube']); ?>" />
    </div>
    <div>Open Door:<br />
      Text: <input type="text" name="rightMenu[openDoor][text]" value="<?php echo e($optionValue['rightMenu']['openDoor']['text']); ?>" />
      <br/>
      Image: <input type="text" name="rightMenu[openDoor][image]" value="<?php echo e($optionValue['rightMenu']['openDoor']['image']); ?>" />
      <br/>
      Text1: <textarea name="rightMenu[openDoor][text1]" ><?php echo e($optionValue['rightMenu']['openDoor']['text1']); ?></textarea>
      <br/>
      Text2: <textarea name="rightMenu[openDoor][text2]" ><?php echo e($optionValue['rightMenu']['openDoor']['text2']); ?></textarea>
    </div>
    <br/>
    <br/>
    <!-- End Right Menu -->

    <!-- Description Web -->
    <div><strong>Description Web:</strong></div>
    <div>Title: <textarea name="descriptionWeb[title]" ><?php echo e($optionValue['descriptionWeb']['title']); ?></textarea>
    <div>Content: <textarea name="descriptionWeb[content]" ><?php echo e($optionValue['descriptionWeb']['content']); ?></textarea>
    <div>Image: <input type="text" name="descriptionWeb[image]" value="<?php echo e($optionValue['descriptionWeb']['image']); ?>" /></div>
    <br/>
    <br/>
    <!-- End Description Web -->

    <!-- Vị Trí -->
    <div><strong>Vị Trí:</strong></div>
    <div>Text View Google Map: <input type="text" name="viTri[textViewGoogleMap]" value="<?php echo e($optionValue['viTri']['textViewGoogleMap']); ?>" /></div>
    <div>Link Google Map: <input type="text" name="viTri[linkGoogleMap]" value="<?php echo e($optionValue['viTri']['linkGoogleMap']); ?>" /></div>
    <div>Description: <textarea name="viTri[description]" ><?php echo e($optionValue['viTri']['description']); ?></textarea></div>
    <div>Image: <input type="text" name="viTri[image]" value="<?php echo e($optionValue['viTri']['image']); ?>" /></div>
    <br/>
    <br/>
    <!-- End Vị Trí -->

    <!-- Mặt Bằng Căn Hộ -->
    <div id="matBangCanHo">
      <div><strong>Mặt Bằng Căn Hộ:</strong><a class="addRowSlider" href="#">Add Slider</a> - <a class="addRowItem" href="#">Add Item</a></div>
      <div>Text: <textarea name="matBangCanHo[text]" ><?php echo e($optionValue['matBangCanHo']['text']); ?></textarea></div>
      <br/>
      <?php $i = 0; ?>
      <div class="blockSlider">
      <?php $__currentLoopData = $optionValue['matBangCanHo']['slider']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="rowSlider" data-id="<?php echo e($i); ?>">
          <div>Image: <input type="text" name="matBangCanHo[slider][<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
      <br/>
      <?php $i = 0; ?>
      <div class="blockItem">
      <?php $__currentLoopData = $optionValue['matBangCanHo']['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="rowItem" data-id="<?php echo e($i); ?>">
          <div>Title: <input type="text" name="matBangCanHo[item][<?php echo e($i); ?>][title]" value="<?php echo e($row['title']); ?>" /></div>
          <div>Url: <input type="text" name="matBangCanHo[item][<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <div>Image: <input type="text" name="matBangCanHo[item][<?php echo e($i); ?>][image]" value="<?php echo e($row['image']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End Mặt Bằng Căn Hộ -->

    <!-- Tiện Ích -->
    <div id="tienIch">
      <div><strong>Tiện Ích:</strong><a class="addRowLinkMore" href="#">Add Link</a> - <a class="addRowList" href="#">Add List</a></div>
      <div>Heading: <textarea name="tienIch[heading]" ><?php echo e($optionValue['tienIch']['heading']); ?></textarea></div>
      <br/>
      <?php $i = 0; ?>
      <div class="blockLinkMore">
      <?php $__currentLoopData = $optionValue['tienIch']['linkMore']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="rowLinkMore" data-id="<?php echo e($i); ?>">
          <div>Title: <input type="text" name="tienIch[linkMore][<?php echo e($i); ?>][title]" value="<?php echo e($row['title']); ?>" /></div>
          <div>Url: <input type="text" name="tienIch[linkMore][<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
      <br/>
      <?php $i = 0; ?>
      <div class="blockList">
      <?php $__currentLoopData = $optionValue['tienIch']['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="rowList" data-id="<?php echo e($i); ?>">
          <div>Image Hold: <input type="text" name="tienIch[list][<?php echo e($i); ?>][imageHold]" value="<?php echo e($row['imageHold']); ?>" /></div>
          <div>Title: <input type="text" name="tienIch[list][<?php echo e($i); ?>][title]" value="<?php echo e($row['title']); ?>" /></div>
          <div>Image Main: <input type="text" name="tienIch[list][<?php echo e($i); ?>][imageMain]" value="<?php echo e($row['imageMain']); ?>" /></div>
          <div>Description: <input type="text" name="tienIch[list][<?php echo e($i); ?>][description]" value="<?php echo e($row['description']); ?>" /></div>
          <div>Content: <textarea name="tienIch[list][<?php echo e($i); ?>][content]" ><?php echo e($row['content']); ?></textarea></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End Tiện Ích -->

    <!-- Gallery -->
    <div id="gallery">
      <div><strong>Gallery:</strong><a class="addRow" href="#">Add</a></div>
      <div>Heading: <input type="text" name="gallery[heading]" value="<?php echo e($optionValue['gallery']['heading']); ?>" /></div>
      <br/>
      <?php unset($optionValue['gallery']['heading']); ?>
      <?php $i = 0; ?>
      <div class="block">
      <?php $__currentLoopData = $optionValue['gallery']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="row" data-id="<?php echo e($i); ?>">
          <div>Text: <input type="text" name="gallery[<?php echo e($i); ?>][text]" value="<?php echo e($row['text']); ?>" /></div>
          <div>Image Title: <input type="text" name="gallery[<?php echo e($i); ?>][imageTitle]" value="<?php echo e($row['imageTitle']); ?>" /></div>
          <div>Title Url: <input type="titleUrl" name="gallery[<?php echo e($i); ?>][titleUrl]" value="<?php echo e($row['titleUrl']); ?>" /></div>
          <div>Url: <input type="text" name="gallery[<?php echo e($i); ?>][url]" value="<?php echo e($row['url']); ?>" /></div>
          <div>Image 1: <input type="text" name="gallery[<?php echo e($i); ?>][image1]" value="<?php echo e($row['image1']); ?>" /></div>
          <div>Image 2: <input type="text" name="gallery[<?php echo e($i); ?>][image2]" value="<?php echo e($row['image2']); ?>" /></div>
          <div>Image 3: <input type="text" name="gallery[<?php echo e($i); ?>][image3]" value="<?php echo e($row['image3']); ?>" /></div>
          <div>Image 4: <input type="text" name="gallery[<?php echo e($i); ?>][image4]" value="<?php echo e($row['image4']); ?>" /></div>
          <div>Image 5: <input type="text" name="gallery[<?php echo e($i); ?>][image5]" value="<?php echo e($row['image5']); ?>" /></div>
          <div>Image 6: <input type="text" name="gallery[<?php echo e($i); ?>][image6]" value="<?php echo e($row['image6']); ?>" /></div>
          <?php if( $i > 0 ): ?> <a class="remove" href="javascript:;">Remove</a> <?php endif; ?>
        </div>
      <br/>
      <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
    <!-- End Gallery -->

    <!-- Map Contact -->
    <div id="mapContact">
      <div><strong>Map Contact:</strong></div>
      <div><input type="text" name="mapContact" value="<?php echo e($optionValue['mapContact']); ?>" /></div>
    </div>
    <br/>
    <!-- End Map Contact -->

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

    <br/>
    <div><input type="submit" value="Save" /></div>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function(){

    // Mặt Bằng Căn Hộ
    $('#matBangCanHo .addRowSlider').click(function(){
      var numberMaxElement = parseInt($('#matBangCanHo .rowSlider').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="rowSlider" data-id="'+numberMaxElement+'">';
      row += '<div>Image: <input type="text" name="matBangCanHo[slider]['+numberMaxElement+'][image]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#matBangCanHo .blockSlider').append(row);
      return false;
    });

    $('#matBangCanHo .addRowItem').click(function(){
      var numberMaxElement = parseInt($('#matBangCanHo .rowItem').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="rowItem" data-id="'+numberMaxElement+'">';
      row += '<div>Title: <input type="text" name="matBangCanHo[item]['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Url: <input type="text" name="matBangCanHo[item]['+numberMaxElement+'][url]" value="" /></div>';
      row += '<div>Image: <input type="text" name="matBangCanHo[item]['+numberMaxElement+'][image]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#matBangCanHo .blockItem').append(row);
      return false;
    });

    $('.theme').on('click','#matBangCanHo .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Tiện Ích
    $('#tienIch .addRowLinkMore').click(function(){
      var numberMaxElement = parseInt($('#tienIch .rowLinkMore').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="rowLinkMore" data-id="'+numberMaxElement+'">';
      row += '<div>Title: <input type="text" name="tienIch[linkMore]['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Url: <input type="text" name="tienIch[linkMore]['+numberMaxElement+'][url]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#tienIch .blockLinkMore').append(row);
      return false;
    });

    $('#tienIch .addRowList').click(function(){
      var numberMaxElement = parseInt($('#tienIch .rowList').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="rowList" data-id="'+numberMaxElement+'">';
      row += '<div>Image Hold: <input type="text" name="tienIch[list]['+numberMaxElement+'][imageHold]" value="" /></div>';
      row += '<div>Title: <input type="text" name="tienIch[list]['+numberMaxElement+'][title]" value="" /></div>';
      row += '<div>Image Main: <input type="text" name="tienIch[list]['+numberMaxElement+'][imageMain]" value="" /></div>';
      row += '<div>Description: <input type="text" name="tienIch[list]['+numberMaxElement+'][description]" value="" /></div>';
      row += '<div>Content: <textarea name="tienIch[list]['+numberMaxElement+'][content]" ></textarea></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#tienIch .blockList').append(row);
      return false;
    });

    $('.theme').on('click','#tienIch .remove',function(){
      $(this).parent().remove();
      return false;
    });

    // Gallery
    $('#gallery .addRow').click(function(){
      var numberMaxElement = parseInt($('#gallery .row').last().attr('data-id')) + 1;
      var row = '';
      row += '<div class="row" data-id="'+numberMaxElement+'">';
      row += '<div>Text: <input type="text" name="gallery['+numberMaxElement+'][text]" value="" /></div>';
      row += '<div>Image Title: <input type="text" name="gallery['+numberMaxElement+'][imageTitle]" value="" /></div>';
      row += '<div>Title Url: <input type="titleUrl" name="gallery['+numberMaxElement+'][titleUrl]" value="" /></div>';
      row += '<div>Url: <input type="text" name="gallery['+numberMaxElement+'][url]" value="" /></div>';
      row += '<div>Image 1: <input type="text" name="gallery['+numberMaxElement+'][image1]" value="" /></div>';
      row += '<div>Image 2: <input type="text" name="gallery['+numberMaxElement+'][image2]" value="" /></div>';
      row += '<div>Image 3: <input type="text" name="gallery['+numberMaxElement+'][image3]" value="" /></div>';
      row += '<div>Image 4: <input type="text" name="gallery['+numberMaxElement+'][image4]" value="" /></div>';
      row += '<div>Image 5: <input type="text" name="gallery['+numberMaxElement+'][image5]" value="" /></div>';
      row += '<div>Image 6: <input type="text" name="gallery['+numberMaxElement+'][image6]" value="" /></div>';
      row += '<a class="remove" href="javascript:;">Remove</a>';
      row += '</div>';
      $('#gallery .block').append(row);
      return false;
    });
    $('.theme').on('click','#gallery .remove',function(){
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

  }); 
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>