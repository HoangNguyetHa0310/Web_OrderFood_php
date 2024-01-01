
<?php include("detail_front/menu.php") ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">About Us</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            We have a lot of new and interesting things. Feel free to experience it
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-2">
                <h3 class="mb-3">Our array of new and captivating offerings invites you to experience the extraordinary</h3>
                <p>
                    Explore a world of novelty and excitement at our venue.
                    Unveil a myriad of new and intriguing offerings, inviting you to freely immerse yourself in a rich tapestry of experiences.
                    Your journey awaits—delight in the discovery of all the captivating and innovative elements we have in store for you.
                    Embark on a journey of endless possibilities as we present a plethora of new and interesting things.
                    Feel free to dive into the excitement and make each moment uniquely yours. Uncover surprises, savor discoveries, and create memories that linger long after your visit.
                    The adventure is yours to embrace!
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
                    <h4 class="mt-3"> 100+ Rooms</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/customers.svg" width="70px">
                    <h4 class="mt-3">200+ Customers</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/rating.svg" width="70px">
                    <h4 class="mt-3">150+ Revivews</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/staff.svg" width="70px">
                    <h4 class="mt-3">100+ Staffs</h4>
                </div>
            </div>
        </div>
    </div>

    <h3 class="my-5 fw-bold h-font text-center">Management Team</h3>
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