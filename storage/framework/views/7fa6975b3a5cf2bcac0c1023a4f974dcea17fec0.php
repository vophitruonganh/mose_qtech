<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<?php 
    $email = isset($order_meta['email']) ? $order_meta['email']: '';
    $address = isset($order_meta['address']) ? $order_meta['address']: '';
    $fullname =  isset($order_meta['fullname']) ? $order_meta['fullname']: '';
    $province =  isset($order_meta['province']) ? $order_meta['province']: '';
    $district =  isset($order_meta['district']) ? $order_meta['district']: '';
    $phone =  isset($order_meta['phone']) ? $order_meta['phone']: '';
    $total_temp = $order->amount_order;
    $total = $order->amount_payment;
    $discount_title = $order->order_discount_notes
 ?>

<div style="font-family:&quot;Arial&quot;,Helvetica Neue,Helvetica,sans-serif;line-height:18pt"><div class="adM">

</div><p style="color:red;font-size:15px">Đây là website mẫu và không có sản phẩm thực </p>

<p>Cảm ơn Anh/chị đã đặt hàng tại <strong><?php echo e(url('/')); ?>!</strong></p>

<p>Đơn hàng của Anh/chị đã được tiếp nhận, chúng tôi sẽ nhanh chóng liên hệ với Anh/chị.</p>

<p>Để kiểm tra trạng thái đơn hàng, Anh/chị vui lòng Đăng nhập vào tài khoản.</p>
 <strong>Thông tin người mua</strong><br>
 
<table>
 <tbody>
  <tr>
   <td>Họ tên</td>
   <td><?php echo e($fullname); ?></td>
  </tr>
  <tr>
   <td>Điện thoại</td>
   <td><?php echo e($phone); ?></td>
  </tr>
  <tr>
   <td>Email</td>
   <td><a href="mail to:trandotheanh@gmail.com" target="_blank"><?php echo e($email); ?></a></td>
  </tr>
  <tr>
   <td>Địa chỉ</td>
   <td><?php echo e($address); ?>-<?php echo e($district); ?>-<?php echo e($province); ?></td>
  </tr>
 </tbody>
</table>
<br>
  <strong>Thông tin người nhận</strong>

<table>
 <tbody>
  <tr>
   <td>Họ tên</td>
   <td><?php echo e($fullname); ?></td>
  </tr>
  <tr>
   <td>Điện thoại</td>
   <td><?php echo e($phone); ?></td>
  </tr>
  <tr>
   <td>Địa chỉ</td>
   <td><?php echo e($address); ?>-<?php echo e($district); ?>-<?php echo e($province); ?></td>
  </tr>
 </tbody>
</table>
 <strong>Thông tin đơn hàng</strong>

<table>
 <tbody>
  <tr>
   <td><strong>Mã đơn hàng:</strong> <?php echo e(get_template_order_code($order->order_code)); ?></td>
   <td><strong>Ngày tạo:</strong> <?php echo e(date('d/m/Y',$order->date_create)); ?></td>
  </tr>
 </tbody>
</table>
<br>
<br>

<table>
 <tbody>
  <tr>
   <td>Sản phẩm</td>
   <td style="text-align:center;width:100px">Số lượng</td>
   <td style="text-align:right;width:150px">Tổng</td>
  </tr>
  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <tr>
   <td><?php echo e($product->title); ?> - <?php echo e($product->variant_name); ?></td>
   <td style="text-align:center;width:100px"><?php echo e($product->quantity_buy); ?></td>
   <td style="text-align:right;width:150px"><?php echo e(number_format($product->quantity_buy* $product->price, 0, ',', '.')); ?>&#8363;</td>
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
  <tr>
   <td>&nbsp;</td>
   <td colspan="3">   
   <table style="width:100%">
    <tbody>
     <tr>
      <td><strong>Giảm giá:</strong></td>
      <td style="width:150px"><?php echo e(number_format($order->amount_discount, 0, ',', '.')); ?>&#8363;</td>
     </tr>
     <tr>
      <td><strong>Tổng giá trị sản phẩm:</strong></td>
      <td style="width:150px"><?php echo e(number_format($order->amount_order, 0, ',', '.')); ?> &#8363;</td>
     </tr>
     <tr>
      <td><strong>Phí vận chuyển:</strong></td>
      <td style="width:150px"> 0&#8363;</td>
     </tr>
     <tr>
      <td><strong>Thành tiền:</strong></td>
      <td style="width:150px"><?php echo e(number_format($order->amount_payment, 0, ',', '.')); ?> &#8363;</td>
     </tr>
    </tbody>
   </table>
   </td>
  </tr>
 </tbody>
</table>
&nbsp;

<hr> <strong>Trân trọng cảm ơn</strong><br>
Ban quản trị <a href="<?php echo e(url('/')); ?>" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=vi&amp;q=http://office365-theme.bizwebvietnam.net&amp;source=gmail&amp;ust=1478772361307000&amp;usg=AFQjCNEtsPtQgzTjGXqDkY8otp7Ye3CLeA"><?php echo e(url('/')); ?></a></div>

</body>
</html>

