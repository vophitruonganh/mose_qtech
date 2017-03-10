<?php $__env->startSection('content'); ?>


      <div class="full-width section-emphasis-1 page-header">
          <div class="container">
              <header class="row">
                  <div class="col-md-12">
                      <h1 class="strong-header pull-left">
                          My account
                      </h1>
                      <!-- BREADCRUMBS -->
                      <ul class="breadcrumbs list-inline pull-right">
                          <li><a href="<?php echo e(url('/')); ?>">Home</a></li><!--
                          --><li><a href="<?php echo e(url('collections')); ?>">Shop</a></li><!--
                          --><li>My account</li>
                      </ul>
                      <!-- !BREADCRUMBS -->
                  </div>
              </header>
          </div>
      </div><!-- !full-width -->
      <div class="container">
          <!-- !FULL WIDTH -->
          <!-- !SECTION EMPHASIS 1 -->

          <div class="row">
              <div class="col-md-6 space-right-20">
                  <section class="login element-emphasis-strong">
                      <h2 class="strong-header large-header">
                          Existing customers
                      </h2>
                       <?php if( count($errors) > 0 ): ?>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                        <?php endif; ?>
                        <?php if( Session::has('loginFrontend') ): ?>
                        Bạn đã đăng nhập
                        <?php else: ?>
                      <form role="form" action="<?php echo e(url('customer/login')); ?>" method="post" novalidate>
                           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                          <div class="form-group">
                              <label for="email">Email address</label>
                              <input type="email" class="form-control" id="email" name="email" >
                          </div>
                          <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" id="password" name="password" >
                          </div>
                          <button type="submit" class="btn btn-primary pull-left">Login</button>
                          
                      </form>
                      <?php endif; ?>
                  </section>
              </div>
              <div class="col-md-6 space-left-20">
                  <section class="element-emphasis-weak">
                      <h2 class="strong-header">
                          New customers
                      </h2>
                      <p>
                          By creating an account with our store, you will be able to move through the checkout process
                          faster, store multiple shipping addresses, view and track your orders in your account and more
                      </p>
                      <a href="<?php echo e(url('customer/register')); ?>" class="btn btn-default">
                          Register
                      </a>
                  </section>
              </div>
          </div>

      </div>
  </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.decima_store.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>