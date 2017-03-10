<?php $__env->startSection('content'); ?>

        <div class="full-width section-emphasis-1 page-header">
            <div class="container">
                <header class="row">
                    <div class="col-md-12">
                        <h1 class=" pull-left">
                            <?php echo e($slug_name); ?>

                        </h1>
                        <!-- BREADCRUMBS -->
                        <ul class="breadcrumbs list-inline pull-right">
                            <li><a href="<?php echo e(url('/')); ?>">Home</a></li><!--
                            --><li><?php echo e($slug_name); ?></li>
                        </ul>
                        <!-- !BREADCRUMBS -->
                    </div>
                </header>
            </div>
        </div><!-- !full-width -->
            <!-- !FULL WIDTH -->
            <!-- !SECTION EMPHASIS 1 -->

        <div class="container">
            <div class="row">
                <div class="col-md-9 space-right-30">
                    <div class="row">
                        <?php $__currentLoopData = $dataNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php 
                            $title = !empty($data->post_title)? $data->post_title: 'No title';
                            $excerpt = !empty($data->post_excerpt) ? $data->post_excerpt : get_excerpt($data->post_content,40);
                            $date = date('d/m/Y', $data->post_date);
                        ?>
                        <div class="col-md-12 article-wrapper">
                            <!-- POST TYPE STANDARD -->
                            <article class="post-preview post-preview-image">
                                <a href="<?php echo e(url($data->post_slug)); ?>">
                                    <img src="<?php echo e(get_image_url($data->post_image)); ?>"  alt="Blog post image">
                                </a>
                                <header class="post-info-name-date-comments">
                                    <span class="date"><?php echo e($date); ?></span>&nbsp;&nbsp;
                                    <h2><a href="<?php echo e(url($data->post_slug)); ?>"><?php echo e($title); ?></a></h2>
                                </header>
                                <p><?php echo e($excerpt); ?></p>
                                <a href="<?php echo e(url($data->post_slug)); ?>" class="btn btn-default btn-small read-more">Đọc tiếp</a>
                            </article>
                            <!-- !POST TYPE STANDARD -->
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                        <div class="col-md-12 article-wrapper">
                            <!-- PAGER -->
                            <nav>
                                <div class="pager">
                                    <ul class="list-inline">
                                        <?php if($dataNews->currentPage()!=1): ?>
                                        <li class="prev">
                                            <a class="icon-decima-small-arrow-left" href="<?php echo e($dataNews->url($dataNews->currentPage()-1)); ?>"><span class="sr-only">Prev</span></a>
                                        </li>
                                        <?php endif; ?>
                                      
                                        <?php for($i=1;$i<=$dataNews->lastPage();$i=$i+1): ?>
                                            <li <?php echo e(($dataNews->currentPage()==$i)? 'class="active"' : ''); ?>><a href="<?php echo e(str_replace('/?','?',$dataNews->url($i))); ?>"><?php echo e($i); ?></a></li>
                                        <?php endfor; ?>
                                 
                                        <?php if($dataNews->currentPage()!=$dataNews->lastPage()): ?>
                                        <li class="next">
                                            <a class="icon-decima-small-arrow-right" href="<?php echo e($dataNews->url($dataNews->currentPage()+1)); ?>"><span class="sr-only">Next</span></a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </nav>
                            <!-- !PAGER -->
                        </div>
                    </div>
                </div>

                <div class="col-md-3">

                    <!-- SEARCH WIDGET -->
                    <div class="search-widget">
                        <form role="search">
                            <div class="form-group">
                                <label class="sr-only" for="page-search">Type your search here</label>
                                <input type="search" id="page-search" class="form-control">
                            </div><!-- no whitespace
                            --><button class="btn btn-default page-search">
                                <span class="fa fa-search">
                                    <span class="sr-only">Search</span>
                                </span>
                            </button>
                        </form>
                    </div>
                    <!-- !SEARCH WIDGET -->

                    <?php echo $__env->make('frontend.decima_store.includes.sidebar_blog', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.decima_store.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>