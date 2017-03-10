<?php $__env->startSection('content'); ?>


<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <div class="inner">
         <a href="/" title="Quay lại trang chủ">Trang chủ</a>
         <span aria-hidden="true">/</span>
         <span><?php echo e($page->post_title); ?></span>
      </div>
   </nav>
   <!-- /templates/page.liquid -->
   <div class="grid">
      <div class="sidebar grid__item large--one-quarter">
         <div class="collection-sidebar inner">
            <!-- /snippets/collection-sidebar.liquid -->
            <!-- Widget 8888888888 -->
               <?php echo showWidget('widget8888888888'); ?>

            <!-- End Widget 8888888888 -->
           

            <!-- end category sidebar -->
            <div class="widget-product widget">
               <h4 class="widget__title">Sản phẩm bán chạy</h4>
               <div class="widget__content">
               </div>
            </div>
            <!-- end widget 1 -->
            <div class="widget-ads widget">
               <a href="<?php echo e(url('collections')); ?>"><img src="//hstatic.net/030/1000104030/1000147045/ads_block.jpg?v=96" alt=""></a>
            </div>
            <!-- end advertising -->
            <div class="widget-cms widget">
               <h4 class="widget__title">CMS hướng dẫn</h4>
               <em>
                  khối CMS tùy chỉnh hiển thị ở thanh bên trái trên Catalog trang. Đặt nội dung của riêng bạn ở đây:. Text, html, hình ảnh, truyền thông ... bất cứ điều gì bạn thích <!-- em--> <br> <em> Có rất nhiều tương tự như giữ chỗ nội dung mẫu trên cửa hàng. Tất cả có thể chỉnh sửa từ bảng quản trị.</em>
               </em>
            </div>
            <!-- end advertising --><em>
            </em>
         </div>
         <em>
         </em>
      </div>
      <em>
         <div class="grid__item large--three-quarters ">
            <h1 class="page_name"><?php echo e($page->post_title); ?></h1>
            <div class="rte">
               <?php echo preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page->post_content); ?>

            </div>
         </div>
      </em>
   </div>
   <em>
   </em>
</main>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.giaodien20.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>