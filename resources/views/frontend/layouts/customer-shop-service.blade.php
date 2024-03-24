@extends('frontend.layouts.app')
@section('content')

<!-- heading start -->
<div class="container">
    <div style="margin-top: 20px;" class="row">
        <div class="col-lg-4">
            <div> <a href="{{url('/Stores')}}" style="font-weight: bold;color:black;font-size:20px;"><i
                        style="font-size:20px;" class="bi bi-arrow-left-circle"></i> Back</a></div>
        </div>

        <div class="col-lg-12 col-sm-12">
            <div style="display: flex;justify-content:center;padding:10px;margin-top:40px">
                <h1 style="font-weight: bold;">Customer and Shop Service</h1>
            </div>
            <p style="text-align: center;font-size:25px;font-weight:500">For project and commercial Companies</p>
        </div>

    </div>

</div>
<!-- heading end -->

<div style="margin-top:80px" class="container">

    <div style="border: 1px solid #128ee9ff;border-radius:10px">
        <h3 style="padding-left:20px;font-weight:bold">For Individuals</h3>

        <div class="row">
            <div class="col-lg-3"><img style="width: 100%;height:auto;padding:10px"
                    src="{{asset('frontend/cutomer shop service/images/33101008_bink_c_bus_23_tale_04 2.png')}}" />
            </div>
            <div class="col-lg-9">
                <p style="font-size: 18px;padding:20px;margin-top:20px">Countryside Story Trading Est offers the most
                    wonderful methods of satisfying customers by giving them instant hooves and gifts equal to the value
                    of our customer's invoice</p>
            </div>
        </div>

    </div>

    <!-- 2nd -->
    <div style="border: 1px solid #128ee9ff;border-radius:10px;margin-top:30px">
        <h3 style="padding-left:20px;font-weight:bold">For Shop Owners</h3>

        <div class="row">
            <div class="col-lg-3"><img style="width: 100%;height:auto;padding:10px"
                    src="{{asset('frontend/cutomer shop service/images/33101008_bink_c_bus_23_tale_04 1.png')}}" />
            </div>
            <div class="col-lg-9">
                <p style="font-size: 18px;padding:20px;margin-top:20px">Countryside Story Trading Est We offer you our
                    comprehensive and distinguished services, as we work in the field of providing integrated services
                    and marketing, and we have a marketing team (field & home) to market any product or services for
                    commercial and individual projects. And we provide clients (clients) to the shops and work to
                    increase monthly sales, so our role is to carry out the marketing process and send the customer (the
                    client) to your showroom (your headquarters), and after the purchase is done, we take at least (10%)
                    of the customer’s invoice at the end of the month only for the customer Which came via our
                    marketing.</p>
            </div>
        </div>

    </div>
    <!-- container div -->
</div>


<div class="container">
    <div style="border: 1px solid #004AAD;border-radius:10px;margin:0px;margin-top:30px;margin-bottom:30px">
        <h2 style="text-align:center;color:#004AAD;padding-top:20px">About HikayatAlref</h2>
        <p
            style="text-align:center;padding-left:30px;padding-right:30px;padding-top:20px;padding-bottom:20px;font-weight:600">
            Countryside Story Trading Est provides integrated services for projects and commercial companies. It was
            established in the city of Al-Khobar, Kingdom of Saudi Arabia, according to the system of trading commercial
            in Saudi Arabia. It works to provide consultancy and integrated development solutions
            (marketing/financial/administrative) in the Kingdom of Saudi Arabia and the Arab world, and to provide
            marketing and development plans with Implementation within a trained staff for these tasks, and the company
            methodology is adopted to achieve guaranteed and satisfactory results for customers and reward individuals
            by giving them offers and gifts equal to what was purchased from the shops that fall within the participants
            in the marketing plans of the company.</p>
    </div>
</div>

@endsection
