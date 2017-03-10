<!-- !container -->
<div class="full-width section-emphasis-1 page-header">
  <div class="container">
    <header class="row">
      <div class="col-md-12">
        <h1 class="strong-header pull-left">Shop</h1>

        <!-- BREADCRUMBS -->
        <ul class="breadcrumbs list-inline pull-right">
          <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
          <!--
                         -->
          <li>Shop</li>
        </ul>
        <!-- !BREADCRUMBS -->
      </div>
    </header>
  </div>
</div>
<!-- !full-width -->
<div class="container">
<!-- !FULL WIDTH -->
<!-- !SECTION EMPHASIS 1 -->

<div class="row">
<div class="shop-list-filters col-sm-4 col-md-3">

 

  <button type="button" class="btn btn-default btn-small visible-xs" data-texthidden="Hide Filters" data-textvisible="Show Filters" id="toggleListFilters"></button>

  <div id="listFilters">

    <div class="filters-details element-emphasis-weak">
      <!-- ACCORDION -->
      <div class="accordion" >
        <div class="panel-group">
          <!-- price range -->
          <div class="panel panel-default" style="display: none">
            <div class="panel-heading">
              <h4 class="strong-header panel-title">
                <a class="accordion-toggle" data-toggle="collapse" href="#collapse-001">
                  Price range
                </a>
              </h4>
            </div>
            <div id="collapse-001" class="panel-collapse collapse in">
              <div class="panel-body">
                <div class="filters-range" data-min="10" data-max="320" data-step="5">
                  <div class="filter-widget"></div>
                  <div class="filter-value">
                    <input type="text" class="min">
                    <input type="text" class="max">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end -->
          
          <!-- Danh mục sản phẩm -->
          <?php $list_tax = get_taxonomy_product( 'product_category' ) ?>
          <?php if($list_tax): ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="strong-header panel-title">
                <a class="accordion-toggle" data-toggle="collapse" href="#collapse-002">
                  Danh mục sản phẩm
                </a>
              </h4>
            </div>
            <div id="collapse-002" class="panel-collapse ">
              <div class="panel-body">
                <div class="filters-checkboxes" >
                  <?php $__currentLoopData = $list_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <a href="<?php echo e(url('collections/'.$tax->taxonomy_slug)); ?>">
                  <div class="form-group-sidebar">
                      <label ><?php echo e($tax->taxonomy_name); ?></label>
                  </div>
                   </a>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>

              </div>
            </div>
          </div>
          <?php endif; ?>
          <!-- End danh mục -->
      
          <!-- Nhóm sản phẩm -->
          <?php $list_tax = get_taxonomy_product( 'product_group' ) ?>
          <?php if($list_tax): ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="strong-header panel-title">
                <a class="accordion-toggle" data-toggle="collapse" href="#collapse-003">
                  Nhóm sản phẩm
                </a>
              </h4>
            </div>
            <div id="collapse-003" class="panel-collapse collapse in">
              <div class="panel-body">
               <div class="filters-checkboxes" >
                  <?php $__currentLoopData = $list_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <a href="<?php echo e(url('collections/'.$tax->taxonomy_slug)); ?>">
                  <div class="form-group-sidebar">
                      <label ><?php echo e($tax->taxonomy_name); ?></label>
                  </div>
                   </a>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <!-- End nhóm sản phẩm -->
         

          
        </div>
      </div>
      <!-- !ACCORDION -->
    </div>
  </div>
  <!-- / #listFilters -->
</div>

<div class="clearfix visible-xs"></div>