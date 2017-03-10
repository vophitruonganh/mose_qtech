<?php $__env->startSection('content'); ?>


<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ</a><span>|</span></li>
            <li><strong>xe - Bike-themes</strong></li>
         </ul>
      </div>
   </div>
</div>
<div class="main-container col2-right-layout">
   <div class="main container">
      <div class="row">
         <section class="col-main col-sm-12">
            <div class="my-account">
               <div class="page-title" style="border-bottom:1px solid #ccc;">
                  <h2>Tìm kiếm</h2>
               </div>
               <div class="sort-select" style="padding: 0px;">
                  <form action="<?php echo e(url('collections')); ?>" method="get" class="search-form" role="search">
                     <p>
                        <input style="height: 34px; margin-bottom: 0px; padding-left: 15px;width: 235px;" type="text" name="search" value="<?php echo e($search); ?>">
                        <input type="submit" value="Tìm kiếm" class="btn btn-search">
                     </p>
                  </form>
               </div>
               <div class="my-wishlist">
                  <div class="table-responsive">
                     <form method="post" action="#/wishlist/index/update/wishlist_id/1/" id="wishlist-view-form">
                        <fieldset>
                           <input type="hidden" value="ROBdJO5tIbODPZHZ" name="form_key">
                           <table id="wishlist-table" class="clean-table linearize-table data-table">
                              <tbody>
                                 <?php if(count($products)>0): ?>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr id="item_31" class="first odd">
                                       <td class="wishlist-cell0 customer-wishlist-item-image" style=" width: 120px;">
                                          <a title="<?php echo e($product['product_title']); ?>" href="<?php echo e(url('collections/'.$product['product_slug'])); ?>" class="product-image"> 
                                          <img src="<?php echo e(get_image_url($product['product_image_id'])); ?>"> 
                                          </a>
                                       </td>
                                       <td class="wishlist-cell1 customer-wishlist-item-info">
                                          <h3 class="product-name"><a href="<?php echo e(url('collections/'.$product['product_slug'])); ?>"><?php echo e($product['product_title']); ?></a></h3>
                                          <div class="description std">
                                             <?php echo e($product['product_excerpt']); ?>

                                          </div>
                                       </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                 <?php else: ?>
                                    Không tìm thấy sản phẩm nào
                                 <?php endif; ?>
                                 

                                

                               
                              </tbody>
                           </table>
                        </fieldset>
                     </form>
                  </div>
               </div>
                <div class="clearfix"></div>
                <div class="pull-right">
                  <?php echo e($products->links()); ?>

                </div>
               <?php
               /*
               <div class="pager">
                  <div class="pages">
                     <ul class="pagination">
                     @if($products->currentPage()!=1)
                            <li>
                                <a href="{{str_replace('/?','?',$products->url($products->currentPage()-1))}}">
                                    Trang trước
                                </a>
                            </li>
                            @endif
                            @for($i=1;$i<=$products->lastPage();$i=$i+1)
                            <li class="{{($products->currentPage()==$i)? 'active' : ''}}">
                                <a href="{{str_replace('/?','?',$products->url($i))}}">{{$i}}</a>
                            </li>
                            <!-- <li class="current"><a href="#" style="pointer-events:none">1</a></li>
                            <li><a href="/collections/all?page=2">2</a></li> -->
                            @endfor
                            <!-- <li><a href="/collections/all?page=3">3</a></li>
                            <li><a href="/collections/all?page=4">4</a></li> -->
                            @if($products->currentPage()!=$products->lastPage())
                            <li>
                                <a class="next-arrow" href="{{str_replace('/?','?',$products->url($products->currentPage()+1))}}" title="2">
                                    Trang sau
                                </a>
                            </li>
                            @endif
                        
                     </ul>
                  </div>
               </div>
                */
               ?>
            </div>
         </section>
      </div>
   </div>
</div>

<style>
	.breadcrumbs{display:none;}
	.shop-pag label{
		float: left;
		margin-top: 28px;
		margin-right: 15px;
	}
	.btn-search{
		background: #fff;
		padding: 6px 15px;
		color: #333;
		border: 1px solid #ddd;
		text-transform: uppercase;
		border-radius: 0px;
	}
	.btn-search:hover{
		background: #c22b3b;
		color: #fff;
		border: 1px solid #c22b3b;
	}
</style>
      

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien11.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>