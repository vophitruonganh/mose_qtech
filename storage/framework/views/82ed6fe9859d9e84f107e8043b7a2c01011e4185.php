<table class="table table-hover">
    <thead>
        <tr>
            <th class="table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
            <th>Loại khuyến mãi</th>
            <th>Thời gian</th>
            <th class="col-4 text-nowrap text-xs-center">Sử dụng</th>
            <th class="col-5 text-nowrap text-xs-center">Tình trạng</th>
        </tr>
    </thead>
    <tbody>
    <?php if( count($discounts) == 0 ): ?>
        <tr><th class="table-check"></th><td colspan="5"><?php echo $__env->make('backend.includes.nodata', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td></tr>
    <?php else: ?>
    <?php $i = 0; ?>
    <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <?php $i++; ?>
    <tr data-id="<?php echo e($discount->discount_id); ?>" data-take="<?php echo e($discount->discount_take); ?>" data-option="<?php echo e($discount->discount_option); ?>">
        <th class="table-check"><input id="tbl-check-<?php echo e($i); ?>" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="<?php echo e($discount->discount_id); ?>" /><label for="tbl-check-<?php echo e($i); ?>"></label></th>
        <td class="col-2">
            <div class="discount-type" data-type="<?php echo e($discount->discount_type); ?>" data-promotion="<?php echo e($discount->promotion_allow); ?>"><?php if( $discount->discount_type == 1 ): ?> Mã khuyến mãi: <?php else: ?> Chương trình khuyến mãi: <?php endif; ?></div>
            <div class="title-link discount-title"><a href="javascript:;"><?php echo e($discount->discount_title); ?></a></div>
        </td>
        <?php
        	$date_end = '-';
            if( $discount->discount_date_end > 0 ) $date_end = date('h:i d-m-Y',$discount->discount_date_end);
        ?>
        <td>
          <div>Bắt đầu: <span class="discount-date-start" data-text="<?php echo e($discount->discount_date_start); ?>"><?php echo e(date('h:i d-m-Y',$discount->discount_date_start)); ?></span></div>
          <div>Kết thúc: <span class="discount-date-end" data-text="<?php echo e($discount->discount_date_end); ?>"><?php echo e($date_end); ?></span></div>
        </td>
        <?php
         	$discountLimitTimeUsed = '&#8734;';
         	if( $discount->discount_type == 1 ) $discountLimitTimeUsed = $discount->discount_limit_end.'/'.$discount->discount_limit_start;
        ?>
        <td class="col-4 text-nowrap text-xs-center"><span class="discount-limit" data-limitstart="<?php echo e($discount->discount_limit_start); ?>" data-limitend="<?php echo e($discount->discount_limit_end); ?>"><?php echo e($discountLimitTimeUsed); ?></span></td>
          <?php
            $status = '';

            if( $discount->discount_date_start <= $time && ($discount->discount_date_end >= $time || $discount->discount_date_end == 0) ){
            	if($discount->discount_status =='0'){
            		$status = '<span class="label label-primary discount-status" data-text="deactive">Tạm ngưng</span>';
	            }else {
	            	$status = '<span class="label label-success discount-status" data-text="active">Đã kích hoạt</span>';
	            }
            }elseif( $discount->discount_date_start > $time ) {
            	if($discount->discount_status =='0'){
            		$status = '<span class="label label-primary discount-status" data-text="deactive">Tạm ngưng</span>';
	            }else {
	            	$status = '<span class="label label-default discount-status" data-text="wating">Chưa kích hoạt</span>';
	            }
	        }
            elseif( $discount->discount_date_end > 0 && $discount->discount_date_end < $time) $status = '<span class="label label-danger discount-status" data-text="expired">Hết hạn</span>';
          ?>
        <td class="col-5 text-nowrap text-xs-center"><?php echo $status; ?></td>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
    <?php endif; ?>
</table>
<div class="modal fade in" id="discount-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="details">
      <div class="modal-content">
          <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel">Chi tiết khuyến mãi</h4></div>
          <div class="modal-body font-lg-size">
            <p><span class="lbl-type"></span> <span class="font-weight-bold text-danger lbl-title"></span></p>
            <p><span class="lbl-promotion text-muted"><span></p>
            <p><span class="lbl-limit"></span></p>
            <p><span class="lbl-group-info"></span></p>
            <p><i class="material-icons md-16">timer</i> <span class="lbl-date-start"></span></p>
            <p><i class="material-icons md-16">timer_off</i> <span class="lbl-date-end"></span></p>
            <p>Tình trạng: <span class="lbl-status"></span></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Sử dụng khuyến mãi</button>
            <button type="button" class="btn btn-danger">Ngưng khuyến mãi</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          </div>
      </div>
    </div>
</div>