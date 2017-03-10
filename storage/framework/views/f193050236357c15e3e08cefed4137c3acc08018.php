<?php $__env->startSection('content'); ?>

<!-- Slider -->
<section class="slider">
    <div id="owl-slider">
       <?php $__currentLoopData = $slide_main; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
         <div class="item">
            <a href="<?php echo e($row['url']); ?>"><img src="<?php echo e($row['image']); ?>" alt="alt"></a>
         </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</section>
<!-- End Slider -->

<!-- Row 1 -->
<section class="feature">
    <div class="container">
       <div class="row">
          <?php $__currentLoopData = $feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
             <div class="feature-item">
                <img src="<?php echo e($row['image']); ?>" alt="alt">
                <h2><?php echo e($row['title']); ?></h2>
                <p><?php echo e($row['description']); ?></p>
             </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
       </div>
    </div>
</section>
<!-- End Row 1 -->

<!-- Row 2 -->
<section class="news-seminor">
    <div class="container">
       <div class="row">

		  <!-- Widget a -->
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <section class="news">
                <div class="box">
                   <div class="box-heading">
                      <h2>Tin tức</h2>
                      <div class="owl-buttons">
                         <a href="javascript:void(0)" onclick="$('#owl-news').data('owlCarousel').prev();"><i class="fa fa-angle-left"></i></a>
                         <a href="javascript:void(0)" onclick="$('#owl-news').data('owlCarousel').next();"><i class="fa fa-angle-right"></i></a>
                      </div>
                   </div>
                   <div id="owl-news">
                     <?php $posts = get_post_cat_limit( 'tin-tuc','5' ) ?>
                      <?php if(count($posts)>0): ?>
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <div class="item">
                               <div class="on-item">
                                  <a href="<?php echo e(url($post->post_slug)); ?>" class="on-item-image"><img src="<?php echo e(get_image_url($post->post_image)); ?>" alt="<?php echo e($post->post_title); ?>"></a>
                                  <a href="<?php echo e(url($post->post_slug)); ?>" class="on-item-name">
                                     <h3><?php echo e($post->post_title); ?></h3>
                                  </a>
                                  <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Ngày đăng <?php echo e(date('d/m/Y', $post->post_date)); ?></p>
                                  <p class="on-item-summary">
                                  <p style="text-align: justify;"><?php echo e($post->post_excerpt); ?></p>
                               </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      <?php endif; ?>
                      <?php /*
                      <div class="item">
                         <div class="on-item">
                            <a href="#hoc-bong-ho-tro-sinh-hoat-phi-nganh-luat-cua-dai-hoc-queensland-uc-2016" class="on-item-image"><img src="images/2.png?v=1457342669273" alt="Học bổng hỗ trợ sinh hoạt phí ngành luật của Đại học Queensland, Úc 2016"></a>
                            <a href="#hoc-bong-ho-tro-sinh-hoat-phi-nganh-luat-cua-dai-hoc-queensland-uc-2016" class="on-item-name">
                               <h3>Học bổng hỗ trợ sinh hoạt phí ngành luật của Đại học Queensland, Úc 2016</h3>
                            </a>
                            <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Ngày đăng 07/03/2016</p>
                            <p class="on-item-summary">
                            <p style="text-align: justify;">Trường Luật TC Beirne là một trong những cơ sở đào tạo ngành luật giàu truyền thống và chất lượng hàng đầu với các hệ đào tạo đại học và sau đại học. Tạo nên danh tiếng cho trường là đội ngũ giảng viên, nhân viên xuất sắc...</p>
                         </div>
                      </div>

                      <div class="item">
                         <div class="on-item">
                            <a href="#hoc-bong-toan-phan-sau-dai-hoc-tai-dai-hoc-oxford-vuong-quoc-anh-2016" class="on-item-image"><img src="images/oxford-university.jpg?v=1457342298443" alt="Học bổng Toàn phần Sau đại học tại Đại học Oxford, Vương quốc Anh 2016"></a>
                            <a href="#hoc-bong-toan-phan-sau-dai-hoc-tai-dai-hoc-oxford-vuong-quoc-anh-2016" class="on-item-name">
                               <h3>Học bổng Toàn phần Sau đại học tại Đại học Oxford, Vương quốc Anh 2016</h3>
                            </a>
                            <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Ngày đăng 07/03/2016</p>
                            <p class="on-item-summary">
                            <p style="text-align: justify;">Học bổng toàn phần Louis Dreyfus- Weidenfeld và chương trình lãnh đạo tại vương quốc Anh là chương trình nhằm mục tiêu tăng cường sự phát triển bền vững trong nông nghiệp, an ninh lương thực và tự cung bằng cách thông qua giáo dục và sự ủng...</p>
                         </div>
                      </div>

                      <div class="item">
                         <div class="on-item">
                            <a href="#tong-hop-hoc-bong-du-hoc-my-2016" class="on-item-image"><img src="images/untitled-2.jpg?v=1457341908977" alt="Tổng hợp học bổng du học Mỹ 2016"></a>
                            <a href="#tong-hop-hoc-bong-du-hoc-my-2016" class="on-item-name">
                               <h3>Tổng hợp học bổng du học Mỹ 2016</h3>
                            </a>
                            <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Ngày đăng 07/03/2016</p>
                            <p class="on-item-summary">
                            <p style="text-align: justify;">Mỹ vẫn luôn là điểm đến du học đáng mơ ước của sinh viên Việt Nam và quốc tế. Việc sở hữu những suất học bổng du học Mỹ là bước đệm vững vàng cho sinh viên Việt nam tiếp cận nền giáo dục hiện đại. Lần này,...</p>
                         </div>
                      </div>

                      <div class="item">
                         <div class="on-item">
                            <a href="#hoc-bong-toan-phan-sau-dai-hoc-cua-dai-hoc-bond-uc-2016-–-2017" class="on-item-image"><img src="images/untitled-1.jpg?v=1457341251853" alt="Học bổng Toàn phần Sau Đại học của Đại học Bond, Úc 2016 – 2017"></a>
                            <a href="#hoc-bong-toan-phan-sau-dai-hoc-cua-dai-hoc-bond-uc-2016-–-2017" class="on-item-name">
                               <h3>Học bổng Toàn phần Sau Đại học của Đại học Bond, Úc 2016 – 2017</h3>
                            </a>
                            <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Ngày đăng 29/05/2015</p>
                            <p class="on-item-summary">
                            <p style="text-align: justify;">Đại học Bond tọa lạc trên diện tích 49.86 hecta ở Robina tại thành phố Gold Coast thuộc bang Queensland, Úc. Bond có campus đẹp như một công viên sinh thái, với truyền thống học thuật ưu việt và là một trong những đại học hàng đầu thế...</p>
                         </div>
                      </div>
                      */ ?>
                   </div>
                </div>
             </section>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <section class="seminor">
                <div class="box">
                   <div class="box-heading">
                      <h2>Đời sống</h2>
                      <div class="owl-buttons">
                         <a href="javascript:void(0)" onclick="$('#owl-seminor').data('owlCarousel').prev();"><i class="fa fa-angle-left"></i></a>
                         <a href="javascript:void(0)" onclick="$('#owl-seminor').data('owlCarousel').next();"><i class="fa fa-angle-right"></i></a>
                      </div>
                   </div>
                   <div id="owl-seminor">
                    <?php $posts = get_post_cat_limit( 'doi-song','9' ); $i=0; ?>
                      <?php if(count($posts)>0): ?>
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <?php if($i%3 ==0 ): ?> <div class="item"> <?php endif; ?>

                            <div class="os-item">
                                <a href="<?php echo e(url($post->post_slug)); ?>" class="os-item-image"><img src="<?php echo e(get_image_url($post->post_image)); ?>" alt="<?php echo e($post->post_title); ?>"></a>
                                <a href="<?php echo e(url($post->post_slug)); ?>" class="os-item-name">
                                   <h3><?php echo e($post->post_title); ?></h3>
                                </a>
                                <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Ngày đăng <?php echo e(date('d/m/Y', $post->post_date)); ?></p>
                           </div>
                          <?php $i++; ?>

                          <?php if( $i%3==0 ): ?> </div> <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      <?php endif; ?>

                    <?php /*  <div class="item">
                        
                         <div class="os-item">
                            <a href="#gap-go-dai-dien-truong-atmc-va-mo-rong-co-hoi-du-hoc-tai-melbourne-uc" class="os-item-image"><img src="images/10r5192-e0eb16c0-fdba-4d32-8f49-e543914f2f5a.jpg?v=1457424933380" alt="Gặp gỡ đại diện trường ATMC và mở rộng cơ hội du học tại Melbourne, Úc"></a>
                            <a href="#gap-go-dai-dien-truong-atmc-va-mo-rong-co-hoi-du-hoc-tai-melbourne-uc" class="os-item-name">
                               <h3>Gặp gỡ đại diện trường ATMC và mở rộng cơ hội du học tại Melbourne, Úc</h3>
                            </a>
                            <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Ngày đăng 07/03/2016</p>
                         </div>

                         <div class="os-item">
                            <a href="#tuan-le-san-hoc-bong-khung-tai-tay-ban-nha" class="os-item-image"><img src="images/1.jpg?v=1457424873477" alt="Tuần lễ săn học bổng “khủng” tại Tây Ban Nha"></a>
                            <a href="#tuan-le-san-hoc-bong-khung-tai-tay-ban-nha" class="os-item-name">
                               <h3>Tuần lễ săn học bổng “khủng” tại Tây Ban Nha</h3>
                            </a>
                            <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Ngày đăng 07/03/2016</p>
                         </div>

                         <div class="os-item">
                            <a href="#tuan-le-tu-van-hoc-bong-truong-new-hampshire-cua-my-cho-ki-thang-9-2015" class="os-item-image"><img src="images/du-hoc-phap.jpg?v=1457424783853" alt="Tuần lễ tư vấn học bổng trường New Hampshire của Mỹ cho kì tháng 9/2015"></a>
                            <a href="#tuan-le-tu-van-hoc-bong-truong-new-hampshire-cua-my-cho-ki-thang-9-2015" class="os-item-name">
                               <h3>Tuần lễ tư vấn học bổng trường New Hampshire của Mỹ cho kì tháng 9/2015</h3>
                            </a>
                            <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Ngày đăng 07/03/2016</p>
                         </div>
                      </div>

                      <div class="item">
                         <div class="os-item">
                            <a href="#tuan-le-tu-van-hoc-bong-50-khong-gioi-han-tai-arkansas-state-university" class="os-item-image"><img src="images/library-book-86a586ea-c614-4edd-b4ba-43836f2aa794.jpg?v=1457424766577" alt="Tuần lễ tư vấn: Học bổng 50% không giới hạn tại Arkansas State University"></a>
                            <a href="#tuan-le-tu-van-hoc-bong-50-khong-gioi-han-tai-arkansas-state-university" class="os-item-name">
                               <h3>Tuần lễ tư vấn: Học bổng 50% không giới hạn tại Arkansas State University</h3>
                            </a>
                            <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Ngày đăng 07/03/2016</p>
                         </div>
                      </div> */ ?>
                   </div>
             </section>
             </div>
          </div>
      <!-- End Widget a -->
             
          </div>
       </div>
 </section>
 <!-- End Row 2 -->
 <!-- Row 3 -->
 <section class="school">
    <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="school-heading">
      <h2>Kinh doanh</h2>
      </div>
      </div>
      
          <!-- Widget b -->
        <div id="owl-school">
        <?php $posts = get_post_cat_limit( 'doi-song','9' );?>
          <?php if(count($posts)>0): ?>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
             
                <div class="item">
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="school-item">
                      <div class="school-item-thumbnail">
                        <img src="<?php echo e(get_image_url($post->post_image)); ?>" alt="<?php echo e($post->post_title); ?>">
                        <a href="<?php echo e(url($post->post_slug)); ?>">Xem chi tiết</a>
                      </div>
                      <a href="<?php echo e(url($post->post_slug)); ?>" class="shool-item-name"><h3><?php echo e($post->post_title); ?></h3></a>
                      <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i><?php echo e(date('d/m/Y', $post->post_date)); ?></p>
                      <div class="school-item-summary"><p style="text-align: justify;"><?php echo e(!empty($post->post_excerpt ) ? get_excerpt($post->post_excerpt,20) : get_excerpt($post->post_content,20)); ?></div> 
                      <div class="school-item-buttons">
                        <a href="<?php echo e(url($post->post_slug)); ?>" class="school-item-view">Xem chi tiết</a>
                      </div>
                    </div>
                  </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          <?php endif; ?>

        <?php /*
        <div class="item">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="school-item">
        <div class="school-item-thumbnail">
        <img src="images/anh-san-pham-7.jpg?v=1457339598867" alt="Du học Nhật Bản ngành xây dựng – Ngành “hot” thiếu nhân lực">
        <a href="#du-hoc-nhat-ban-nganh-xay-dung-nganh-hot-thieu-nhan-luc">Xem chi tiết</a>
        </div>
        <a href="#du-hoc-nhat-ban-nganh-xay-dung-nganh-hot-thieu-nhan-luc" class="shool-item-name"><h3>Du học Nhật Bản ngành xây dựng – Ngành “hot” thiếu nhân lực</h3></a>
        <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Mới cập nhật</p>
        <div class="school-item-summary"><p style="text-align: justify;">Hiện nay, xây dựng là một ngành “hot” nhưng luôn trong tình trạng thiếu nhân lực có trình...</div>
        <div class="school-item-buttons">
        <a href="#du-hoc-nhat-ban-nganh-xay-dung-nganh-hot-thieu-nhan-luc" class="school-item-register">Đăng ký</a>
        <a href="#du-hoc-nhat-ban-nganh-xay-dung-nganh-hot-thieu-nhan-luc" class="school-item-view">Xem chi tiết</a>
        </div>
        </div>
        </div>
        </div>

        <div class="item">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="school-item">
        <div class="school-item-thumbnail">
        <img src="images/anh-san-pham-11.png?v=1457333900957" alt="Trường Nhật ngữ Tokyo World, Nhật Bản">
        <a href="#truong-nhat-ngu-tokyo-world-nhat-ban">Xem chi tiết</a>
        </div>
        <a href="#truong-nhat-ngu-tokyo-world-nhat-ban" class="shool-item-name"><h3>Trường Nhật ngữ Tokyo World, Nhật Bản</h3></a>
        <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Mới cập nhật</p>
        <div class="school-item-summary"><p style="text-align: justify;">Shinjuku là ga lớn và là trung tâm sầm uất nhất của Tokyo, cũng là một trong ba...</div>
        <div class="school-item-buttons">
        <a href="#truong-nhat-ngu-tokyo-world-nhat-ban" class="school-item-register">Đăng ký</a>
        <a href="#truong-nhat-ngu-tokyo-world-nhat-ban" class="school-item-view">Xem chi tiết</a>
        </div>
        </div>
        </div>
        </div>

        <div class="item">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="school-item">
        <div class="school-item-thumbnail">
        <img src="images/anh-san-pham-2.png?v=1457333615570" alt="Trường Nhật ngữ Quốc tế Sendai, Nhật Bản">
        <a href="#truong-nhat-ngu-quoc-te-sendai-nhat-ban">Xem chi tiết</a>
        </div>
        <a href="#truong-nhat-ngu-quoc-te-sendai-nhat-ban" class="shool-item-name"><h3>Trường Nhật ngữ Quốc tế Sendai, Nhật Bản</h3></a>
        <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Mới cập nhật</p>
        <div class="school-item-summary"><p style="text-align: justify;">Với đội ngũ giáo viên nhiệt tình, giàu kinh nghiệm kết hợp cùng chương trình giảng dạy phong...</div>
        <div class="school-item-buttons">
        <a href="#truong-nhat-ngu-quoc-te-sendai-nhat-ban" class="school-item-register">Đăng ký</a>
        <a href="#truong-nhat-ngu-quoc-te-sendai-nhat-ban" class="school-item-view">Xem chi tiết</a>
        </div>
        </div>
        </div>
        </div>

        <div class="item">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="school-item">
        <div class="school-item-thumbnail">
        <img src="images/anh-san-pham-14-bbd739b3-f6b8-47bd-8235-52b8ca0fc246.png?v=1457334473670" alt="Du học Nhật Bản tại trường Nhật ngữ 3H">
        <a href="#truong-nhat-ngu-3h-nhat-ban">Xem chi tiết</a>
        </div>
        <a href="#truong-nhat-ngu-3h-nhat-ban" class="shool-item-name"><h3>Du học Nhật Bản tại trường Nhật ngữ 3H</h3></a>
        <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Mới cập nhật</p>
        <div class="school-item-summary"><p style="text-align: justify;">Trường Nhật ngữ 3H tọa lạc tại thành phố Chiba, tỉnh Chiba, cách thủ đô Tokyo 40 phút...</div>
        <div class="school-item-buttons">
        <a href="#truong-nhat-ngu-3h-nhat-ban" class="school-item-register">Đăng ký</a>
        <a href="#truong-nhat-ngu-3h-nhat-ban" class="school-item-view">Xem chi tiết</a>
        </div>
        </div>
        </div>
        </div>

        <div class="item">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="school-item">
        <div class="school-item-thumbnail">
        <img src="images/anh-san-pham-10.jpg?v=1457338797060" alt="Du học Singapore: Học viện công nghệ và quản lý Auston">
        <a href="#du-hoc-singapore-hoc-vien-cong-nghe-va-quan-ly-auston">Xem chi tiết</a>
        </div>
        <a href="#du-hoc-singapore-hoc-vien-cong-nghe-va-quan-ly-auston" class="shool-item-name"><h3>Du học Singapore: Học viện công nghệ và quản lý Auston</h3></a>
        <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Mới cập nhật</p>
        <div class="school-item-summary"><p style="text-align: justify;">Auston là một trong số trường đầu tiên của Singapore được cấp chứng nhận ISO 9001:2000. Auston cũng...</div>
        <div class="school-item-buttons">
        <a href="#du-hoc-singapore-hoc-vien-cong-nghe-va-quan-ly-auston" class="school-item-register">Đăng ký</a>
        <a href="#du-hoc-singapore-hoc-vien-cong-nghe-va-quan-ly-auston" class="school-item-view">Xem chi tiết</a>
        </div>
        </div>
        </div>
        </div>

        <div class="item">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="school-item">
        <div class="school-item-thumbnail">
        <img src="images/anh-san-pham-1-646ee6fd-e9ba-46e6-ae6d-30fc90974a15.png?v=1457335750917" alt="Khoa tiếng Nhật tại Học viện Ehle, Nhật Bản">
        <a href="#khoa-tieng-nhat-tai-hoc-vien-ehle-nhat-ban">Xem chi tiết</a>
        </div>
        <a href="#khoa-tieng-nhat-tai-hoc-vien-ehle-nhat-ban" class="shool-item-name"><h3>Khoa tiếng Nhật tại Học viện Ehle, Nhật Bản</h3></a>
        <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Mới cập nhật</p>
        <div class="school-item-summary"><p style="text-align: justify;">Học viện Ehle tọa lạc tại thành phố Osaka, Nhật Bản – thành phố lớn thứ 3 và...</div>
        <div class="school-item-buttons">
        <a href="#khoa-tieng-nhat-tai-hoc-vien-ehle-nhat-ban" class="school-item-register">Đăng ký</a>
        <a href="#khoa-tieng-nhat-tai-hoc-vien-ehle-nhat-ban" class="school-item-view">Xem chi tiết</a>
        </div>
        </div>
        </div>
        </div>

        <div class="item">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="school-item">
        <div class="school-item-thumbnail">
        <img src="images/singapore1.jpg?v=1457338682740" alt="Du Học Singapore Trường Đại Học James Cook ( JCU )">
        <a href="#du-hoc-singapore-truong-dai-hoc-james-cook-jcu">Xem chi tiết</a>
        </div>
        <a href="#du-hoc-singapore-truong-dai-hoc-james-cook-jcu" class="shool-item-name"><h3>Du Học Singapore Trường Đại Học James Cook ( JCU )</h3></a>
        <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Mới cập nhật</p>
        <div class="school-item-summary"><p style="text-align: justify;">Trường đại học JCU Singapore ( James Cook University Singapore ) được thành lập năm 2003 thuộc trường...</div>
        <div class="school-item-buttons">
        <a href="#du-hoc-singapore-truong-dai-hoc-james-cook-jcu" class="school-item-register">Đăng ký</a>
        <a href="#du-hoc-singapore-truong-dai-hoc-james-cook-jcu" class="school-item-view">Xem chi tiết</a>
        </div>
        </div>
        </div>
        </div>  */ ?>


    </div>
          <!-- End Widget b -->
          
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 hidden-xs">
      <div class="school-footer">
      <a href="<?php echo e(url('doi-song')); ?>" class="school-button">Xem thêm</a>
      </div>
      </div>
    </div>
    </div>
  </section>
<!-- End Row 3 -->
<!-- Row 4 -->
<section class="testimonial">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 hidden-xs">
        <div class="testimonial-heading">
          <h2><?php echo e($testimonial['heading']); ?></h2>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="owl-testimonial">
          <?php unset($testimonial['heading']); ?>
          <?php $__currentLoopData = $testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <div class="item">
            <div class="testimonial-item">
              <div class="testimonial-item-body">
                <p><?php echo e($row['content']); ?></p>
              </div>
              <div class="testimonial-item-user">
                <img src="<?php echo e($row['image']); ?>" alt="<?php echo e($row['name']); ?>">
                <h4><?php echo e($row['name']); ?></h4>
                <p><?php echo e($row['description']); ?></p>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Row 4 -->
<!-- Row 5 -->
<section class="cultural-photo-info">
    <div class="container">
      <div class="row">
        
		<!-- Widget c -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <section class="cultural">
          <div class="box">
          <div class="box-heading">
          <h2>Kinh doanh</h2>
          </div>
          <div class="box-content">
          <ul>
          
          <?php $posts = get_post_cat_limit( 'tin-tuc','4' ); $i=0; ?>
              <?php if(count($posts)>0): ?>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <?php if($i==0): ?>
                    <li>
                        <a href="<?php echo e(url($post->post_slug)); ?>" class="cultural-item-image"><img src="<?php echo e(get_image_url($post->post_image)); ?>" alt="<?php echo e($post->post_title); ?>"></a>
                        <a href="<?php echo e(url($post->post_slug)); ?>" class="cultural-item-name"><h3><?php echo e($post->post_title); ?></h3></a>
                        <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Ngày đăng <?php echo e(date('d/m/Y', $post->post_date)); ?></p>
                        <p class="cultural-item-summary"><p style="text-align: justify;"><?php echo e(!empty($post->post_excerpt ) ? get_excerpt($post->post_excerpt,20) : get_excerpt($post->post_content,20)); ?></p></p>
                    </li>
                  <?php else: ?>
                      <li><a href="<?php echo e(url($post->post_slug)); ?>"><?php echo e($post->post_title); ?></a></li>
                  <?php endif; ?>
                <?php $i++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              <?php endif; ?>

       <?php /*   <li>
          <a href="#chia-se-thanh-cong-tu-cuu-sv-top-100-gioi-nhat-the-gioi" class="cultural-item-image"><img src="images/anh-san-pham-6.jpg?v=1457346784773" alt="Chia sẻ thành công từ cựu sv Top 100 giỏi nhất thế giới"></a>
          <a href="#chia-se-thanh-cong-tu-cuu-sv-top-100-gioi-nhat-the-gioi" class="cultural-item-name"><h3>Chia sẻ thành công từ cựu sv Top 100 giỏi nhất thế giới</h3></a>
          <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>Ngày đăng 07/03/2016</p>
          <p class="cultural-item-summary"><p style="text-align: justify;">Là Tiến sĩ ĐH Stanford, đồng thời, anh Nguyễn Chí Hiếu còn từng là Top 100 sinh viên giỏi nhất thế giới 2006.</p></p>
          </li>
          <li><a href="#du-hoc-han-quoc-qua-goc-nhin-cua-du-hoc-sinh-viet">Du học Hàn Quốc qua góc nhìn của du học sinh Việt</a></li>
          <li><a href="#trai-nghiem-cuoc-song-sinh-vien-tai-boston-my">Trải nghiệm cuộc sống sinh viên tại Boston – Mỹ</a></li>
          <li><a href="#giai-phap-sieu-tiet-kiem-cho-du-hoc-chau-au-trong-thoi-khung-hoang">Giải pháp siêu tiêt kiệm cho du học Châu Âu</a></li> */ ?>
          </ul>
          </div>
          </div>
        </section>
        </div>
    <!-- End Widget c -->

    <!-- Photo -->
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="photo-video">
        <div class="box">
          <div class="box-heading">
            <h2><?php echo e($photo['heading']); ?></h2>
          </div>
          <div class="box-content">
            <a href="<?php echo e($photo['url']); ?>"><img src="<?php echo e($photo['image']); ?>"></a>
          </div>
        </div>
      </div>
    </div>

    <!-- About Us -->
    <div class="col-lg-4 col-md-4 hidden-sm col-xs-12">
      <div class="info">
        <div class="box">
          <div class="box-heading">
            <h2><?php echo e($about['heading']); ?></h2>
          </div>
          <div class="box-content">
            <a href="<?php echo e($about['url']); ?>" class="info-logo"><img src="<?php echo e($about['image']); ?>"></a>
            <p class="info-content"><?php echo e($about['content']); ?></p>
          </div>
        </div>
      </div>
    </div>
        
        </div>
    </div>
</section>

<!-- End Row 5 -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.giaodien1.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>