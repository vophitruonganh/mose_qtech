<footer class="footer">
     
      <div class="footer-middle container">
      <div class="row">
      <div class="col-md-4 col-sm-4">
      <?php $about = isset($about) ? $about : []; ?>
      <?php if( count($about) > 0 ): ?>
        <h2 class="h2_footer"><?php echo e($about['title']); ?></h2>
        <span class="sp_footer"></span>
        <div class="footer-logo">
          <a class="logo" href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e($about['logo']); ?>" />
          </a>
        </div>
        <p><?php echo e($about['text']); ?></p>
      <?php endif; ?>
      </div>
      <div class="col-md-2 col-sm-2">
        <h2 class="h2_footer"><?php echo e($bottom_menu['heading']); ?></h2>
        <span class="sp_footer"></span>
        <ul class="links">
          <?php unset($bottom_menu['heading']); ?>
          <?php $__currentLoopData = $bottom_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <li><a href="<?php echo e($row['url']); ?>"><?php echo e($row['title']); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
      </div>
      <div class="col-md-3 col-sm-3">
        <h2 class="h2_footer"><?php echo e($service['heading']); ?></h2>
        <span class="sp_footer"></span>
        <ul class="links">
          <?php unset($service['heading']); ?>
          <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <li><a href="<?php echo e($row['url']); ?>"><?php echo e($row['title']); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>				
      </div>
      <div class="col-md-3 col-sm-3">
      <h2 class="h2_footer">Liên hệ</h2>
      <span class="sp_footer"></span>
      <div class="contacts-info">
      <address><span style="color:#777" class="glyphicon glyphicon-map-marker"></span> &nbsp;Địa chỉ:  <?php echo e($storeSetting['address']); ?></address>
      <div class="phone-footer"><span style="color:#777" class="glyphicon glyphicon-earphone"></span> &nbsp; <?php echo e($storeSetting['telephone']); ?></div>
      <div class="phone-footer"><i style="color:#777" class="fa fa-archive"></i> &nbsp; <?php echo e($storeSetting['telephone']); ?></div>
      <div class="email-footer"><span style="color:#777" class="glyphicon glyphicon-envelope"></span> &nbsp;<a href="mailto:<?php echo e($storeSetting['email']); ?>"> <?php echo e($storeSetting['email']); ?></a> </div>
      </div>
      <div class="payment-accept">
      <div>
      <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <a target="_blank" href="<?php echo e($row['url']); ?>"><img src="<?php echo e($row['image']); ?>"></a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="footer-bottom">
      <div class="container">
      <div class="row">
      <div class="col-sm-5 col-xs-12 coppyright">
      <?php echo e($copyright['text']); ?>

      </div>
      <!--
      <div class="col-sm-7 col-xs-12 company-links hidden-xs" style="text-align: right;">
      <a href="/"><img src="<?php echo e(asset('template/giaodien11/asset/images/icon_visa.png')); ?>" alt="thanh-toan"></a>
      </div>
      -->
      </div>
      </div>
      </div>
      </footer>
      <!-- End Footer -->
      </div>
      <script type="text/javascript">
           function deletePerItem(id){
             var url = '/cart/delete_item/'+id;
                $.ajax({
                  'url'       : url, 
                  'type'      : 'GET',
                  'success'   : function(data){
                      if(data == 'Success'){
                          window.location = 'cart';
                      }
                  },
              });
              return false;
         
           }
      </script>
   </body>
</html>