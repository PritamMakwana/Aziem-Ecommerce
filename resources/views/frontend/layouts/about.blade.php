@extends('frontend.layouts.app')
@section('content')
<div class="container">
    <!-- heading start -->
    <div class="container">
        <div style="margin-top: 20px;" class="row">
            <div class="col-lg-4">
                <div> <a href="{{url('/Stores')}}" style="font-weight: bold;color:black;font-size:20px;"><i
                            style="font-size:20px;" class="bi bi-arrow-left-circle"></i> Back</a></div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div style="display: flex;justify-content:center;padding:10px;margin-top:40px;">
                    <h1 style="font-weight: bold;">About Us</h1>
                </div>
            </div>

        </div>

    </div>
    <!-- heading end -->


    <!-- row 1 start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <img style="width:100%;height:auto" src="{{asset('frontend/about us/images/2672335 1.png')}}" />
            </div>

            <div class="col-lg-6 col-sm-12">
                <h2 class="aboutheading">The hekayatalref Trading Est.</h2>
                <p class="aboutpara"> is one of the company that perseveres to reach the
                    summit and commercial centers and provide integrated services in management, consulting, feasibility
                    studies, development of commercial projects and marketing them with plans and start-up.

                    There were serious attempts by the owners of the idea of ​​​​the establishment to reach the right
                    path since 2019 AD and through the path of the establishment by following several methods and
                    studying all ideas in keeping with the global conditions affecting the global commercial sector.
                    </p>
            </div>

        </div>
    </div>
    <!-- row 1 end -->




    <!-- row 2 start -->
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-sm-12">
                <h2 class="aboutheading2">business can be summed up in the following points:</h2>
                <p class="aboutpara2">
                    1.Management and operation of commercial companies<br>
                    2.Marketing on behalf of others<br>
                    3.Administrative and marketing consulting<br>
                    4.Opening new markets for any project or services<br>
                    5.Restructuring of commercial companies<br>
                    6.Developing plans and developing companies
                <p>
            </div>

            <div class="col-lg-6 col-sm-12">
                <img style="width:100%;height:auto" src="{{asset('frontend/about us/images/2672335 2.png')}}" />
            </div>

        </div>
    </div>
    <!-- row 2 end -->

    {{-- <p style="text-align: center;color:#407bffff;font-size:20px">What our users said about our service</p>

    <!-- testimonial -->
    <section style="display:flex;justify-content:center">
        <div class="testimonial mySwiper">
            <div class="testi-content swiper-wrapper">
                <div class="slide swiper-slide">
                    <img src="{{asset('frontend/about us/images/img1.jpg')}}" alt="" class="image" />
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam,
                        saepe provident dolorem a quaerat quo error facere nihil deleniti
                        eligendi ipsum adipisci, fugit, architecto amet asperiores
                        doloremque deserunt eum nemo.
                    </p>

                    <i class="bx bxs-quote-alt-left quote-icon"></i>

                    <div class="details">
                        <span class="name">Marnie Lotter</span>
                        <span class="job">Web Developer</span>
                    </div>
                </div>
                <div class="slide swiper-slide">
                    <img src="{{asset('frontend/about us/images/img2.jpg')}}" alt="" class="image" />
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam,
                        saepe provident dolorem a quaerat quo error facere nihil deleniti
                        eligendi ipsum adipisci, fugit, architecto amet asperiores
                        doloremque deserunt eum nemo.
                    </p>

                    <i class="bx bxs-quote-alt-left quote-icon"></i>

                    <div class="details">
                        <span class="name">Marnie Lotter</span>
                        <span class="job">Web Developer</span>
                    </div>
                </div>
                <div class="slide swiper-slide">
                    <img src="{{asset('frontend/about us/images/img3.jpg')}}" alt="" class="image" />
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam,
                        saepe provident dolorem a quaerat quo error facere nihil deleniti
                        eligendi ipsum adipisci, fugit, architecto amet asperiores
                        doloremque deserunt eum nemo.
                    </p>

                    <i class="bx bxs-quote-alt-left quote-icon"></i>

                    <div class="details">
                        <span class="name">Marnie Lotter</span>
                        <span class="job">Web Developer</span>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next nav-btn"></div>
            <div class="swiper-button-prev nav-btn"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section> --}}
</div>
@endsection

@section('style')
<style>
    /* Google Fonts - Poppins */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");


    .testimonial {
        position: relative;
        max-width: 900px;
        width: 100%;
        padding: 50px 0;
        overflow: hidden;
    }

    .testimonial .image {
        height: 170px;
        width: 170px;
        object-fit: cover;
        border-radius: 50%;
    }

    .testimonial .slide {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        row-gap: 30px;
        height: 100%;
        width: 100%;
    }

    .slide p {
        text-align: center;
        padding: 0 160px;
        font-size: 14px;
        font-weight: 400;
        color: #333;
    }

    .slide .quote-icon {
        font-size: 30px;
        color: #4070f4;
    }

    .slide .details {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .details .name {
        font-size: 14px;
        font-weight: 600;
        color: #333;
    }

    .details .job {
        font-size: 12px;
        font-weight: 400;
        color: #333;
    }

    /* swiper button css */
    .nav-btn {
        height: 40px;
        width: 40px;
        border-radius: 50%;
        transform: translateY(30px);
        background-color: rgba(0, 0, 0, 0.1);
        transition: 0.2s;
    }

    .nav-btn:hover {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .nav-btn::after,
    .nav-btn::before {
        font-size: 20px;
        color: #fff;
    }

    .swiper-pagination-bullet {
        background-color: rgba(0, 0, 0, 0.8);
    }

    .swiper-pagination-bullet-active {
        background-color: #4070f4;
    }

    @media screen and (max-width: 768px) {
        .slide p {
            padding: 0 20px;
        }

        .nav-btn {
            display: none;
        }
    }
</style>
@endsection

@section('script')
<script>
    var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  grabCursor: true,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
</script>
@endsection
