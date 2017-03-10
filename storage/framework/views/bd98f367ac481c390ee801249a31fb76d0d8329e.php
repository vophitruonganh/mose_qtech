<!--  Họ tên khách hàng: <?php echo e($name); ?> <br>
Email: <?php echo e($email); ?> <br>
Phone: <?php echo e($phone); ?> <br> <br> <br>
Nội dung: <?php echo e($_message); ?> -->

<table>
	<tr>
		<td>Tên khách hàng :</td>
		<td><?php echo e($name); ?></td>
	</tr>
	<tr>
		<td>Số điện thoại:</td>
		<td><?php echo e($phone); ?></td>
	</tr>
	<tr>
		<td>Email :</td>
		<td><?php echo e($email); ?></td>
	</tr>
	<tr>
		<td>Nội dung :</td>
		
	</tr>
	<tr><?php echo e($_message); ?></tr>
	
</table>