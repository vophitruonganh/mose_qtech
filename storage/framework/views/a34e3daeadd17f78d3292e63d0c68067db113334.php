<?php $__env->startSection('titlePage','Chi tiết đơn hàng'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <form id="form" name="form" action="" method="post" enctype="multipart/form-data">
        <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <input id="order_code" name="order_code" type="hidden" value="<?php echo e($order->order_code); ?>"/>
        <div class="row">
        
            <table class="border">
                <thead>
                    <tr>
                        <td>Product</td>
                        <td>Order Product</td>
                        <td>Price</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                <?php $total=0 ?>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <?php 
                            $value=decode_serialize($row->meta_value);
                            $a=decode_serialize($row->om_value);
                            foreach ($a as $key => $v) {
                                $quantity=$v['quantity'];
                            }
                        ?>
                        <td>
                            <?php echo e($row->post_title); ?>

                        </td>
                        <td>
                            <?php echo e($quantity); ?>

                        </td>
                        <td>
                            <?php echo e(number_format($value["price_new"],0,',',',')); ?> đ
                        </td>       
                        <td>
                            <?php echo e(number_format($quantity*$value["price_new"],0,',',',')); ?> đ
                        </td>
                        <?php $total+=$quantity*$value["price_new"]; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
        </div>
		<div class="row">  
            Order Content: <span><?php 
            $order_content = $order->order_content; 
            $order_content = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $order_content);
            echo $order_content;
            ?></span>
        </div>
        <div class="row">      
            Total: <span><?php echo e(number_format($total,0,',',',')); ?> đ</span>
            <a href="<?php echo e(url('admin/order/print/'.$order->order_code)); ?>" onclick="window.open(this.href,'targetWindow', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=SomeSize, height=SomeSize'); return false;">in</a>
        </div> 
    </form>
    
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>