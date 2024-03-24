<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-translate-customization" content="9f841e7780177523-3214ceb76f765f38-gc38c6fe6f9d06436-c" />

    <title>HikayatAlref - Stores</title>
    <link rel="stylesheet" href="{{ asset('frontend/screen2/style.css') }}">

    <link rel="stylesheet" href="{{asset('frontend/Create new frontend/style.css')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{asset('frontend/about us/css/swiper-bundle.min.css')}}" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper JS -->
    <script src="{{asset('frontend/about us/js/swiper-bundle.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('frontend/contactus/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/Our services/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/cutomer shop service/css/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/cutomer shop service/style.css')}}" />

    {{-- social icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


    {{-- card add --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <style>
        body {
            padding-top: 90px;
        }

        a{
        text-decoration: none !important;
        }

        .goog-te-combo {
            cursor: pointer !important;
        }

        /* Set higher z-index for modal and backdrop */
        #signupmodal .modal-backdrop {
            z-index: 1050;
        }

        /* Remove any opacity from the modal and backdrop */
        #signupmodal .modal-backdrop {
            opacity: 1;
        }

        @media only screen and (max-width: 600px) {
            .login-buttons {
                display: flex;
                justify-content: center;
            }
        }
    </style>
    <style>
        .goog-logo-link {
            display: none !important;
        }

        /* Hide the "Powered by Google Translate" text and the link */
        .goog-te-gadget span[style="white-space:nowrap"] {
            display: none;
        }

        .goog-te-combo,
        .changeLanguage {
            font-size: 1.2rem !important;
        }

        #:0.targetLanguage+*:not(:first-child) {
            display: none;
        }


        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
            justify-content: center;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            /* flex-grow: 1; */
        }

        /* Flexbox for card body content alignment */
        .card-text {
            margin: 5px 0;
        }

        .shopcl {
            margin-top: auto;
            /* Pushes the "View Store" link to the bottom */
        }

        /* Media query for responsiveness */
        @media (max-width: 767px) {
            .container {
                max-width: 100%;
                justify-content: center;
            }

            /* .row {
                width: 100%;
            } */

            .col-lg-3 {
                flex-basis: 100%;
                max-width: 100%;
                margin-bottom: 20px;
                /* margin-left: 10%; */
            }
        }

        .button-three:hover {
            background-color: #5627ff
        }

        .category-filter.selected {
            background-color: #5627ff;
            /* Set the selected button's background color */
            color: white;
            /* Set the text color for the selected button */
        }

        .file-drop-area {
            position: relative;
            display: flex;
            align-items: center;
            width: 450px;
            max-width: 100%;
            padding: 25px;
            border: 1px dashed rgba(255, 255, 255, 0.4);
            border-radius: 3px;
            transition: 0.2s;

        }

        .choose-file-button {
            flex-shrink: 0;
            background-color: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            padding: 8px 15px;
            margin-right: 10px;
            font-size: 12px;
            text-transform: uppercase;
        }

        .file-message {
            font-size: small;
            font-weight: 300;
            line-height: 1.4;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .file-input {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            cursor: pointer;
            opacity: 0;
        }

        .shopch {
            font-weight: 500;
            font-size: 16px;
        }

        .shopcp {
            font-weight: 400;
            font-size: 14px;
        }

        .shopcl {
            text-align: center;
            color: #004aad;
            font-weight: 500;
        }

        .button-on {
            position: relative;
            background-color: #a0ffe3;
            border-style: solid;
            border-color: #a0ffe3;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 12px;
            padding-right: 12px;
            width: 120px;
            text-align: center;
            border-radius: 45px;
            font-size: 14px;
            font-weight: 500;



            overflow: hidden;
            box-shadow: none !important;

        }

        .button-off {
            position: relative;
            background-color: #c0c0c0;
            border-style: solid;
            border-color: #c0c0c0;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 12px;
            padding-right: 12px;
            width: 120px;
            text-align: center;
            border-radius: 45px;
            font-size: 14px;
            font-weight: 500;



            overflow: hidden;
            box-shadow: none !important;

        }

        .cardwidth {
            width: auto;
        }

        @media only screen and (max-width: 600px) {
            .cardwidth {
                width: 18rem;
            }
        }

        .btncart {
            background-color: #5627ff;
            color: white;
            border-color: #5627ff;
            padding: 5px;
            border-radius: 3px;
        }

        .btncart2 {
            background-color: #00e476;
            color: white;
            border-color: #00e476;
            padding: 5px;
            border-radius: 3px;
        }

        body>.skiptranslate {
            display: none;
        }

        .goog-logo-link {
            display: none !important;
        }

        .goog-te-gadget {
            color: transparent !important;
        }


        .nav-link {
            font-size: 20px;
        }

        #fontnav {
            font-size: 20px;

        }


        /* your recipt in card in pandding  */
        @media only screen and (max-width: 991px) {
            .p-btn-cen {
                margin-left: 30px;
            }

            .card-img-mob {
                height: 300px !important;
            }

            .product-details {
                height: 500px !important;
            }
        }

        @media only screen and (min-width: 991px) {
            .product-details {
                height: 294px !important;
            }
        }

        @media only screen and (max-width: 600px) {
            .p-btn-cen {
                margin-left: 40px;
            }
        }

        @media only screen and (max-width: 766px) {
            .card-img-store {
                padding-right: 0px !important;
            }

            .view-store-center {
                margin-left: 0px !important;
            }

            #login_link,
            #navbarDropdownMenuLink {
                margin-left: 9px;
            }

            .btn-container {
                justify-content: center;
            }
        }


        .aboutheading {
            font-size: 55px;
            color: #1458b3ff;
            font-weight: 800;
            text-align: left;
            margin-top: 80px;
            padding: 20px;
        }

        @media only screen and (max-width: 600px) {
            .aboutheading {
                font-size: 35px;
                color: #1458b3ff;
                font-weight: 800;
                text-align: left;
                padding: 10px;
            }
        }

        .aboutheading2 {
            font-size: 55px;
            color: #1458b3ff;
            font-weight: 800;
            text-align: right;
            margin-top: 80px;
            padding: 20px;
        }

        @media only screen and (max-width: 600px) {
            .aboutheading2 {
                font-size: 35px;
                color: #1458b3ff;
                font-weight: 800;
                text-align: right;
                padding: 10px;
            }
        }

        .aboutpara {
            font-size: 20px;
            font-weight: 500;
            text-align: left;
            padding: 20px;
        }

        .aboutpara2 {
            font-size: 20px;
            font-weight: 500;
            text-align: right;
            padding: 20px;
        }

        .order-list-icon {
            background-color: white !important;
            border-radius: 12px !important;
            font-weight: 600 !important;
            font-size: 15px !important;
            -webkit-appearance: none;
            /* position: absolute; */
            color: black !important;
            box-shadow: none !important;
            border-color: white !important;
            /* border:  5px solid red; */
        }

        .order-list-search {
            /* border: 2px solid black; */
            border-color: white !important;
            background-color: white !important;
            border-radius: 12px !important;
            padding: 0px 20px !important;
            font-weight: 600 !important;
            font-size: 15px !important;
            -webkit-appearance: none;
            color: black !important;
            box-shadow: none !important;
            /* width: 100% !important; */
        }

        .order-list-search:focus {
            border-color: white !important;
            box-shadow: none !important;
        }


        .order-list-icon-s {
            background-color: white !important;
            border-radius: 12px !important;
            font-weight: 600 !important;
            font-size: 15px !important;
            -webkit-appearance: none;
            color: black !important;
            box-shadow: none !important;
            border-color: white !important;
            /* border:  5px solid red; */
        }

        .order-list-search-s {
            /* border: 2px solid black; */
            border-color: white !important;
            background-color: white !important;
            border-radius: 12px !important;
            padding: 0px 20px !important;
            font-weight: 600 !important;
            font-size: 15px !important;
            -webkit-appearance: none;
            color: black !important;
            box-shadow: none !important;
            /* width: 100% !important; */

        }

        .order-list-search-s:focus {
            border-color: white !important;
            box-shadow: none !important;
        }

        .search-bar-order input {
            /* border: 2px solid black; */
            border-color: white !important;
            background-color: white !important;
            border-radius: 30px !important;
            padding: 0px 20px 0px 65px !important;
            box-shadow: none !important;
        }

        .search-bar-order {
            border-radius: 100px !important;
            ;
            box-shadow: none !important;
            ;
        }

        .hero1 {
            font-family: Manrope;
            line-height: initial;
            letter-spacing: 0em;
        }
    </style>

    <style>
   @media only screen and (max-width: 600px) {
       .navbar-phone {
        display: none !important;
     }
        }

        @media only screen and (min-width: 600px) {
       #h-navbar {
        display: none !important;
     }
        }


        @media only screen and (max-width: 770px) {
       .navbar-brand {
        padding-left: 10px;
     }
        }



        .navbar-nav .dropdown-menu {
         position: absolute !important;
        }


    </style>

    @yield('style')
</head>

<body style="margin-top:0px !important">


    @include('frontend.layouts.header')
    <!-- Header start -->
    <!-- Header end -->

    @yield('content')

    @if (request()->routeIs('so-home'))
    @php
    $q = $query;
    @endphp
    @endif

    <!-- footer start  -->
    @auth('shop_owner')
    @include('frontend.layouts.footer', ['query' => $query])
    @else
    @include('frontend.layouts.footer')
    @endauth
    <!-- footer end  -->

</body>

@yield('script')





{{-- <script type="text/javascript"
    src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    --}}
{{--
</script> --}}
 {{-- card view store--}}
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
 integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
 crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
 integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
 crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
 integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
 crossorigin="anonymous"></script>

 {{-- card view store --}}

<script type="text/javascript">
    function googleTranslateElementInit() {
        console.log('gggoawd');
      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE},
      autoDisplay: false,
       'google_translate_element');
    }
</script>

<script type="text/javascript">
    //   document.addEventListener('DOMContentLoaded', function() {
//     googleTranslateElementInit();
//   });

//    public function googleTranslateElementInit() {
//         console.log('okkeytd');
//       new google.translate.TranslateElement(
//         {
//           pageLanguage: 'en',  // Set the default page language to English (Change 'en' to your desired language code)
//           autoDisplay: false,  // Disable automatic display of the widget
//         },
//         'google_translate_element'  // Replace 'google_translate_element' with the ID of the element where you want to display the widget
//       );
//     }
// function googleTranslateElementInit() {
//     console.log('gggoawd');
//     new google.translate.TranslateElement(
//         {
//           pageLanguage: 'en',  // Set the default page language to English (Change 'en' to your desired language code)
//           autoDisplay: false,  // Disable automatic display of the widget
//         },
//         'google_translate_element'  // Replace 'google_translate_element' with the ID of the element where you want to display the widget
//       );
//       console.log('last');
//   // Remove the "Powered by Google Translate" text
//   var poweredByElement = document.querySelector('.goog-logo-link');
//   if (poweredByElement) {
//     poweredByElement.style.display = 'none';
//   }
//   console.log('last2');
// }

// googleTranslateElementInit();


</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">


    // function googleTranslateElementInit() {
//   new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');

//   var $googleDiv = $("#google_translate_element .skiptranslate");
//   var $googleDivChild = $("#google_translate_element .skiptranslate div");
//   $googleDivChild.next().remove();

//   $googleDiv.contents().filter(function(){
//   	return this.nodeType === 3 && $.trim(this.nodeValue) !== '';
//   }).remove();

//   location.reload();
//   console.log('RTreload');

// }

// function googleTranslateElementInit() {
//         new google.translate.TranslateElement({
//             pageLanguage: 'en',   // The source language (English in this example)
//             includedLanguages: 'es,fr',  // Target languages (Spanish and French in this example)
//             layout: google.translate.TranslateElement.InlineLayout.SIMPLE
//         }, 'google_translate_element');
//         console.log('RTreload');
//     }
// function googleTranslateElementInit() {
//     new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
//     console.log('Treload');
//   }

// window.onload = function() {
//     console.log('Treload');
//     // Your function code here
//     // This code will be executed when the page is reloaded or initially loaded.
// };
// function googleTranslateElementInit() {
//   new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
// }
    // mobile view menu close button
    $('#menuc').click(function() {
        $("#menu").toggleClass("navbar-toggler-icon");
        console.log('9');
        $("#menu").toggleClass("btn-close");
        console.log('8');

    });
    // $('.btn-close').click(function() {
    //     console.log('click');
    // });
    // mobile view menu close button

    //moblie view in menu outside side is close menu
    document.addEventListener('click', function(event) {
        var menu = document.getElementById('navbarScroll');
        var menuToggle = document.getElementById('menuc');
        console.log('2');
        if (menu.classList.contains('show') && !menu.contains(event.target) && !menuToggle.contains(event
                .target)) {
                    console.log('3');
            menu.classList.remove('show');
            console.log('4');
            $("#menu").toggleClass("navbar-toggler-icon");
            $("#menu").toggleClass("btn-close");
            console.log('5');
            menuToggle.setAttribute('aria-expanded', 'false');
            console.log('6');
        }
    });
    //moblie view in menu outside side is close menu


//     document.addEventListener('click', function (event) {
//     var menu = document.getElementById('navbarScroll');
//     var menuToggle = document.getElementById('menuc');

//     if (menu.classList.contains('show') && !menu.contains(event.target) && !menuToggle.contains(event.target)) {
//         menu.classList.remove('show');
//         menu.classList.toggle('navbar-toggler-icon');
//         menu.classList.toggle('btn-close');
//         menuToggle.setAttribute('aria-expanded', 'false');
//     }
// });

    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
                pageLanguage: 'en'
            },
            'google_translate_element'
        );
        // Change the class of the select element
        setTimeout(function() {
            var selectElement = document.querySelector(".goog-te-combo");
            if (selectElement) {
                selectElement.classList.add("nav-link", "changeLanguage");
            }
        }, 1000); // Adjust the delay as needed
    }
</script>

<script type="text/javascript"
    src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>

 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script> --}}
<script src="{{ asset('toastr/toastr.min.js') }}"></script>
<script>
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>
<script>
    $(document).on("click", "#delete", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
                title: "Are you sure you want to delete the product?",
                text: "The data will not be recovered!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    // swal("Operation cancelled. Data is safe!");
                }
            });
    });
</script>
<script>
    // JavaScript code to handle category filtering
    document.addEventListener('DOMContentLoaded', function() {
        const categoryButtons = document.querySelectorAll('.category-filter');
        const allShops = document.querySelectorAll('.col-lg-4');

        categoryButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const categoryId = this.dataset.categoryId;
                const isButtonSelected = this.classList.contains('selected');

                // Remove 'selected' class from all buttons first
                categoryButtons.forEach(function(btn) {
                    btn.classList.remove('selected');
                });

                // Hide all shops first
                allShops.forEach(function(shop) {
                    shop.style.display = 'none';
                });

                // Show all shops if the button is already selected
                if (isButtonSelected) {
                    allShops.forEach(function(shop) {
                        shop.style.display = 'block';
                    });
                } else { // Show only shops with matching category_id if the button is not selected
                    const filteredShops = document.querySelectorAll(
                        `[data-shop-category="${categoryId}"]`);
                    filteredShops.forEach(function(shop) {
                        shop.style.display = 'block';
                    });

                    // Add 'selected' class to the clicked button
                    this.classList.add('selected');
                }
            });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // When the "Sign Up" link is clicked
        document.getElementById('showRegisterModalLink').addEventListener('click', function(e) {
            // e.preventDefault(); // Prevent the default link behavior

            // Hide the sign-in modal
            var signInModal = document.getElementById('siginmodal');
            if (signInModal) {
                signInModal.style.display = 'none';
                signInModal.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('modal-open');
                var modalBackdrop = document.querySelector('.modal-backdrop');
                if (modalBackdrop) {
                    modalBackdrop.parentNode.removeChild(modalBackdrop);
                }
            }
        });

        document.getElementById('showSORegister').addEventListener('click', function(e) {
            // e.preventDefault(); // Prevent the default link behavior

            // Hide the sign-in modal
            var signInModal = document.getElementById('shop_signin');
            if (signInModal) {
                signInModal.style.display = 'none';
                signInModal.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('modal-open');
                var modalBackdrop = document.querySelector('.modal-backdrop');
                if (modalBackdrop) {
                    modalBackdrop.parentNode.removeChild(modalBackdrop);
                }
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        const apiToken =
            "FD2RtPz0JqfSsspq_MAG1MQLJoYl_kg6oceit_uxGDuKZk8VLmHZX7EdeXrE4G3OI-o"; // Replace with your api-token
        const userEmail = "raghav.quantumitinnovation@gmail.com"; // Replace with your user-email
        let authToken = null; // Declare the authToken variable to store the authorization token

        // Step 1: Get the Authorization token
        $.ajax({
            url: "https://www.universal-tutorial.com/api/getaccesstoken",
            method: "GET",
            headers: {
                "Accept": "application/json",
                "api-token": apiToken,
                "user-email": userEmail
            },
            success: function(response) {
                authToken = response.auth_token; // Store the authorization token

                // Step 2: Fetch the list of countries and populate the nationality dropdown
                $.ajax({
                    url: "https://www.universal-tutorial.com/api/countries/",
                    method: "GET",
                    headers: {
                        "Authorization": "Bearer " + authToken,
                        "Accept": "application/json"
                    },
                    success: function(countries) {
                        const nationalityDropdown = $('#nationality');
                        nationalityDropdown.empty();
                        nationalityDropdown.append(
                            '<option value="">Select your Nationality</option>');
                        countries.forEach(function(country) {
                            nationalityDropdown.append('<option value="' +
                                country.country_name + '">' + country
                                .country_name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });

                // Event listener for the nationality dropdown
                $('#nationality').change(function() {
                    const selectedCountry = $(this).val();
                    if (selectedCountry !== '') {
                        // Fetch states for the selected country and populate the state dropdown
                        fetchStates(selectedCountry);
                    } else {
                        // Reset the state and city dropdowns if no country is selected
                        $('#state').empty().append(
                            '<option value="">Select your State</option>');
                        $('#city').empty().append(
                            '<option value="">Select your city</option>');
                    }
                });
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });

        // Function to fetch states for a selected country and populate the state dropdown
        function fetchStates(selectedCountry) {
            $.ajax({
                url: `https://www.universal-tutorial.com/api/states/${selectedCountry}`,
                method: "GET",
                headers: {
                    "Authorization": "Bearer " + authToken,
                    "Accept": "application/json"
                },
                success: function(states) {
                    const stateDropdown = $('#state');
                    stateDropdown.empty();
                    stateDropdown.append('<option value="">Select your State</option>');
                    states.forEach(function(state) {
                        stateDropdown.append('<option value="' + state.state_name + '">' +
                            state.state_name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        // Function to fetch cities for a selected state and populate the city dropdown
        function fetchCities(selectedState) {
            $.ajax({
                url: `https://www.universal-tutorial.com/api/cities/${selectedState}`,
                method: "GET",
                headers: {
                    "Authorization": "Bearer " + authToken,
                    "Accept": "application/json"
                },
                success: function(cities) {
                    const cityDropdown = $('#city');
                    cityDropdown.empty();
                    cityDropdown.append('<option value="">Select your city</option>');
                    cities.forEach(function(city) {
                        cityDropdown.append('<option value="' + city.city_name + '">' + city
                            .city_name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        // Event listener for the state dropdown
        $('#state').change(function() {
            const selectedState = $(this).val();
            if (selectedState !== '') {
                // Fetch cities for the selected state and populate the city dropdown
                fetchCities(selectedState);
            } else {
                // Reset the city dropdown if no state is selected
                $('#city').empty().append('<option value="">Select your city</option>');
            }
        });
    });



</script>

{{-- FD2RtPz0JqfSsspq_MAG1MQLJoYl_kg6oceit_uxGDuKZk8VLmHZX7EdeXrE4G3OI-o --}}
<script>
    $(document).on("click", "#addresmodel", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
                title: "Address Are you sure you want to delete the product?",
                icon: "info",
                buttons: true,
                dangerMode: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    // swal("Operation cancelled. Data is safe!");
                }
            });
    });
</script>
</html>
