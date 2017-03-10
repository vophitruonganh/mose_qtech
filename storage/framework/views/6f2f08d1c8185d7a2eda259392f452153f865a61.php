<?php $__env->startSection('titlePage','Bảng điều khiển'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Bảng điều khiển'
    );
    //$setion_heading = section_title($heading);
?>
    <div class="section-dashboard">
        <div class="section-group">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="box-typical b-t-p">
                        <i class="font-icon text-muted material-icons md-24">add_shopping_cart</i>
                        <h6 class="text-muted text-uppercase m-b-20">Đơn hàng hôm nay</h6>
                        <h2 class="m-b-1"><span data-plugin="counterup">1,587</span></h2>
                        <span class="label label-success"> +11% </span> <span class="text-muted">hôm qua</span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="box-typical b-t-p tilebox-one">
                        <i class="font-icon text-muted material-icons md-24">group_add</i>
                        <h6 class="text-muted text-uppercase m-b-20">Khách hàng hôm nay</h6>
                        <h2 class="m-b-1"><span data-plugin="counterup">102</span></h2>
                        <span class="label label-warning"> +89% </span> <span class="text-muted">hôm qua</span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="box-typical b-t-p tilebox-one">
                        <i class="font-icon text-muted material-icons md-24">local_atm</i>
                        <h6 class="text-muted text-uppercase m-b-20">Sản phẩm bán được</h6>
                        <h2 class="m-b-1"><span data-plugin="counterup">15</span></h2>
                        <span class="label label-pink"> 0% </span> <span class="text-muted">hôm qua</span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="box-typical b-t-p tilebox-one">
                        <i class="font-icon text-muted material-icons md-24">trending_up</i>
                        <h6 class="text-muted text-uppercase m-b-20">Doanh số hôm nay</h6>
                        <h2 class="m-b-1"><span data-plugin="counterup">46,782,000</span> đ</h2>
                        <span class="label label-danger"> -29% </span> <span class="text-muted">hôm qua</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-group">
            <div class="box-typical b-t-p">
                <ul class="list-inline text-center">
                    <li class="list-inline-item"><h5>Series A</h5></li>
                    <li class="list-inline-item"><h5>Series B</h5></li>
                </ul>
                <div id="myfirstchart" style="height: 250px;" data-plugin="morris"></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>