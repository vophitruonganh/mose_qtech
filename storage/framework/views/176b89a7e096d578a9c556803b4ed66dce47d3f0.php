<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-1 table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
            <th class="col-2">Tên sản phẩm</th>       
            <th class="col-3">Danh mục</th>     
            <th class="col-4 text-nowrap text-xs-center col-4">Tình trạng</th>
        </tr>
    </thead>
    <tbody>
    <?php if( count($products) == 0 ): ?>
        <tr><th class="table-check"></th><td colspan="4"><?php echo $__env->make('backend.includes.nodata', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td></tr>
    <?php else: ?>
        <?php $i = 0; ?>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php
            $i++;
            $productMeta = decode_serialize($product->meta_value);
            $featureImage = get_image_url($productMeta['post_featured_image']);
            if( strlen($featureImage) > 0 )
            {
                $featureImage = '<img src="'.$featureImage.'" alt="'.$product->product_title.'" width="50" />';
            }
         ?>
        <tr>
            <th class="table-check col-1"><input id="tbl-check-<?php echo e($i); ?>" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="<?php echo e($product->product_id); ?>" /><label for="tbl-check-<?php echo e($i); ?>"></label></th>
         
            <?php if( strlen($product->product_title) == 0 ){ $title = $product->product_id; }else { $title = $product->product_title; }  ?>            
            <td class="col-2"><?php if($product_status=='trash' || $product->product_status == 'trash'): ?> <?php echo $featureImage; ?> <div class="title-text text-muted"><?php echo e($title); ?></div> <?php else: ?> <div class="title-link"><?php echo $featureImage; ?> <a href="<?php echo e(url('admin/product/edit/'.$product->product_id)); ?>"><?php echo e($title); ?></a></div><?php endif; ?></td>
            <td class="col-3"><?php echo get_cat_product($product->product_id) ?></td>
            <td class="col-4 text-nowrap text-xs-center"><?php if( $product->product_status == 'public' ): ?> <span class="label label-success">Công khai</span> <?php elseif( $product->product_status == 'pending' ): ?> <span class="label label-primary">Đang chờ duyệt</span> <?php elseif( $product->product_status == 'draft' ): ?> <span class="label label-default">Nháp</span> <?php elseif( $product->product_status == 'trash' ): ?> <span class="label label-danger">Xóa</span> <?php endif; ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php endif; ?>
    </tbody>
</table>  