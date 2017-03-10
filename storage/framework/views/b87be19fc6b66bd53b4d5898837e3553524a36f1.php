<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<table border="1" cellpadding="0" cellspacing="0" width="100%">
    <thead>
    <tr>
        <td>Sản phẩm</td>
        <td>Số lượng</td>
        <td>Giá</td>
        <td>Thành tiền</td>    
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
        <td><?php echo e($row->post_title); ?></td>
        <td><?php echo e($quantity); ?></td>
        <td><?php echo e(number_format($value["price_new"],0,',',',')); ?> đ</td>
        <td><?php echo e(number_format($quantity*$value["price_new"],0,',',',')); ?> đ</td>    
    </tr>
    <?php $total+=$quantity*$value["price_new"]; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
   
</table>
<p style="text-align:right;"><b>Tổng cộng: <?php echo e(number_format($total,0,',',',')); ?> đ</b></p>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>