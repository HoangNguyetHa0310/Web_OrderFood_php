
<?php include("detail_front/menu.php") ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Giới Thiệu </h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
           Đội ngũ chuyên nghiệp tạo lên những món ăn tuyệt vời và những trải nghiệm thú vị !
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-2">
                <h3 class="mb-3">CEO: Phan Văn Hoàng </h3>
                <p style="text-align: justify;">
                Chào mừng bạn đến với gia đình chúng tôi, nơi mà sứ mệnh và đam mê hội tụ để tạo ra những đột phá không ngừng. 
                Dưới sự lãnh đạo tận tâm và tầm nhìn đổi mới của Giám đốc Công ty, 
                chúng tôi không chỉ xây dựng một doanh nghiệp mà còn xây dựng một cộng đồng mạnh mẽ và đoàn kết.

                Chúng tôi cam kết đem lại giá trị không chỉ cho khách hàng và đối tác mà còn cho từng thành viên trong đại gia đình chúng tôi. 
                Qua sự sáng tạo và nỗ lực không ngừng, chúng tôi định hình tương lai không chỉ cho doanh nghiệp mà còn cho cộng đồng và thế giới xung quanh.

                Hãy cùng nhau bước vào hành trình này, nơi những ước mơ trở thành hiện thực và thành công không có giới hạn. 
                Chúng ta là những người xây dựng tương lai, và tại đây, mỗi thành viên đều là nhân tố quan trọng, đóng góp vào câu chuyện lớn của chúng tôi. Xin chân thành cảm ơn vì bạn là một phần quan trọng của chúng tôi, và chúng tôi rất hân hạnh chia sẻ hành trình này cùng bạn!
                </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-1">
                <img src="images/about/about.jpg" class="w-100">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/hotel.svg" width="70px">
                    <h4 class="mt-3"> 100+ Cơ sở </h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/customers.svg" width="70px">
                    <h4 class="mt-3">200+ Khách hàng</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/rating.svg" width="70px">
                    <h4 class="mt-3">150+ Đánh giá</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/staff.svg" width="70px">
                    <h4 class="mt-3">100+ NV Hỗ Trợ</h4>
                </div>
            </div>
        </div>
    </div>

    <h3 class="my-5 fw-bold h-font text-center">Đội ngũ quản lý </h3>
    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/management1.jpg" class="equal-image" style="width: 375px; height: 300px;">
                    <h5 class="mt-2">Phan Van Hoang</h5>
                </div>

                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/management2.jpg" class="equal-image" style="width: 375px; height: 300px;">
                    <h5 class="mt-2">Hoang Nguyet Ha</h5>
                </div>

                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/management5.jpg" class="equal-image" style="width: 375px; height: 300px;">
                    <h5 class="mt-2">Hoang Lac Duong</h5>
                </div>

                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/management7.png" class="equal-image" style="width: 375px; height: 300px;">
                    <h5 class="mt-2">Bat Luong Soai </h5>
                </div>

                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/management3.jpg" class="equal-image" style="width: 375px; height: 300px;">
                    <h5 class="mt-2">Tran Nal Do</h5>
                </div>

                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/management4.jpg" class="equal-image" style="width: 375px; height: 300px;">
                    <h5 class="mt-2">Le Van Si</h5>
                </div>

                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/management6.jpg" class="equal-image" style="width: 375px; height: 300px;">
                    <h5 class="mt-2">Black Pink Jisoo</h5>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 40,
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    </script>


<?php include("detail_front/footer.php") ?>