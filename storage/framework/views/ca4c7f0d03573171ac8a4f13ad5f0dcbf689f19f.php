<!-- FOOTER-MIDDLE-AREA START-->
<div class="footer-middle-area">
    <div class="container">
        <div class="row  multi-columns-row">
            <div class="col-xs-12 col-sm-6 col-lg-4 col-md-4">
                <div class="footer-mid-menu contuct">
                    <h3><span>Liên hệ với chúng tôi</span></h3>
                    <ul>
                        <li style="margin-top:6px;margin-bottom: 15px;">
                            <i class="fa fa-map-marker"> </i> <?php echo e($storeSetting['address']); ?>

                        </li>
                        <li>
                            <i style="color:#fff;" class="fa fa-phone"> </i><span style="color:#3bb2ca;"><?php echo e($storeSetting['telephone']); ?></span>
                        </li>
                        <!--
                        <li>
                            <p>Trực 8h00-20h00 từ thứ 2 đến thứ 6  								</br>Thứ 7 từ 8h - 17h30 								</br>Hỗ trợ ngoài giờ hành chính và chủ nhật
                            </p>
                        </li>
                        -->
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-2 col-md-2">
                <div class="footer-mid-menu">
                    <h3><span><?php echo e($bottom_menu['heading']); ?></span></h3>
                    <ul>
                        <?php unset($bottom_menu['heading']); ?>
                        <?php $__currentLoopData = $bottom_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li><a href="<?php echo e($row['url']); ?>"><i class="fa fa-angle-right"></i> &nbsp;<?php echo e($row['title']); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-2 col-md-2">
                <div class="footer-mid-menu">
                    <h3><span><?php echo e($support['heading']); ?></span></h3>
                    <ul>
                        <?php unset($support['heading']); ?>
                        <?php $__currentLoopData = $support; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li><a href="<?php echo e($row['url']); ?>"><i class="fa fa-angle-right"></i> &nbsp;<?php echo e($row['title']); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-2 col-md-2">
                <div class="footer-mid-menu">
                    <h3><span><?php echo e($policy['heading']); ?></span></h3>
                    <ul>
                        <?php unset($policy['heading']); ?>
                        <?php $__currentLoopData = $policy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li><a href="<?php echo e($row['url']); ?>"><i class="fa fa-angle-right"></i> &nbsp;<?php echo e($row['title']); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-2 col-md-2">
                <div class="footer-mid-menu">
                    <h3><span><?php echo e($guide['heading']); ?></span></h3>
                    <ul>
                        <?php unset($guide['heading']); ?>
                        <?php $__currentLoopData = $guide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li><a href="<?php echo e($row['url']); ?>"><i class="fa fa-angle-right"></i> &nbsp;<?php echo e($row['title']); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FOOTER-MIDDLE-AREA END-->
<!-- FOOTER-BOTTUM-AREA START-->

<div class="footer-bottum-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-7 col-lg-6">
                <div class="copyright-info">
                    <?php echo $copyright['text']; ?>

                </div>
            </div>
            <!--
            <div class="col-sm-12 col-xs-12 col-lg-6 col-md-5">
                <div class="footer-payment-logo">
                    <a href="<?php echo e(url('/')); ?>"> <img src="images/icon_visa.png?1459504100932" alt="Office 365" /></a>
                </div>
            </div>
            -->
        </div>
    </div>
</div>
<!-- FOOTER-BOTTUM-AREA END-->
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
<script src="<?php echo e(asset('template/giaodien3/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('template/giaodien3/js/owl.carousel.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('template/giaodien3/js/jquery.meanmenu.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('template/giaodien3/js/jquery-ui.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('template/giaodien3/js/parallax.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('template/giaodien3/js/jquery.scrollup.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('template/giaodien3/js/jquery.sliderpro.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('template/giaodien3/js/themes.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('template/giaodien3/js/main.js')); ?>" type="text/javascript"></script>
    </body>
</html>