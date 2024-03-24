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
                <h1 style="font-weight: bold;">Our Services</h1>
            </div>
            <p style="text-align: center;font-size:25px;font-weight:500">For project and commercial companies</p>
        </div>

    </div>

</div>
<!-- heading end -->

<div class="container" style="margin-bottom:30px">
    <!-- row 1 -->
    <div style="margin-top: 30px;" class="row">
        <div class="col-lg-4">
            <div style="background-color: #f6f9ffff;border: 1px solid #cadbffff;border-radius:10px">

                <div style="display: flex;justify-content:center"><img
                        src="{{asset('frontend/Our services/images/image 40.png')}}"
                        style="width: 42%;height:auto;padding:20px" /></div>

                <h4 style="text-align:center;padding:10px;font-size:20px;font-weight:600">Management consulting and
                    strategic planning</h4>

            </div>
        </div>

        <!-- 2nd -->
        <div class="col-lg-4">
            <div style="background-color: #f6f9ffff;border: 1px solid #cadbffff;border-radius:10px">

                <div style="display: flex;justify-content:center"><img
                        src="{{asset('frontend/Our services/images/fi_9712693.png')}}"
                        style="width: 42%;height:auto;padding:20px" /></div>

                <h4 style="text-align:center;padding:10px;font-size:20px;font-weight:600">Creating the corporate
                    organizational structure</h4>

            </div>
        </div>

        <!-- 3rd -->
        <div class="col-lg-4">
            <div style="background-color: #f6f9ffff;border: 1px solid #cadbffff;border-radius:10px">

                <div style="display: flex;justify-content:center"><img
                        src="{{asset('frontend/Our services/images/fi_2769614.png')}}"
                        style="width: 42%;height:auto;padding:20px" /></div>

                <h4 style="text-align:center;padding:10px;font-size:20px;font-weight:600">Preparing internal policies
                    and procedures</h4>

            </div>
        </div>
    </div>

    <!-- row 2 -->
    <div style="margin-top: 30px;" class="row">
        <div class="col-lg-4">
            <div style="background-color: #f6f9ffff;border: 1px solid #cadbffff;border-radius:10px">

                <div style="display: flex;justify-content:center"><img
                        src="{{asset('frontend/Our services/images/fi_11210270.png')}}"
                        style="width: 42%;height:auto;padding:20px" /></div>

                <h4 style="text-align:center;padding:10px;font-size:20px;font-weight:600">Corporate Governance</h4>

            </div>
        </div>

        <!-- 2nd -->
        <div class="col-lg-4">
            <div style="background-color: #f6f9ffff;border: 1px solid #cadbffff;border-radius:10px">

                <div style="display: flex;justify-content:center"><img
                        src="{{asset('frontend/Our services/images/Vector (2).png')}}"
                        style="width: 42%;height:auto;padding:20px" /></div>

                <h4 style="text-align:center;padding:10px;font-size:20px;font-weight:600">Restructuring</h4>

            </div>
        </div>

        <!-- 3rd -->
        <div class="col-lg-4">
            <div style="background-color: #f6f9ffff;border: 1px solid #cadbffff;border-radius:10px">

                <div style="display: flex;justify-content:center"><img
                        src="{{asset('frontend/Our services/images/fi_11244624.png')}}"
                        style="width: 42%;height:auto;padding:20px" /></div>

                <h4 style="text-align:center;padding:10px;font-size:20px;font-weight:600">Strategic Planning</h4>

            </div>
        </div>
    </div>


    <!-- row 3 -->
    <div style="margin-top: 30px;" class="row">
        <div class="col-lg-4">
            <div style="background-color: #f6f9ffff;border: 1px solid #cadbffff;border-radius:10px">

                <div style="display: flex;justify-content:center"><img
                        src="{{asset('frontend/Our services/images/fi_9551805.png')}}"
                        style="width: 42%;height:auto;padding:20px" /></div>

                <h4 style="text-align:center;padding:10px;font-size:20px;font-weight:600">Establish performance
                    indicators</h4>

            </div>
        </div>

        <!-- 2nd -->
        <div class="col-lg-4">
            <div style="background-color: #f6f9ffff;border: 1px solid #cadbffff;border-radius:10px">

                <div style="display: flex;justify-content:center"><img
                        src="{{asset('frontend/Our services/images/fi_9322127.png')}}"
                        style="width: 42%;height:auto;padding:20px" /></div>

                <h4 style="text-align:center;padding:10px;font-size:20px;font-weight:600">Administrative Development
                </h4>

            </div>
        </div>

        <!-- 3rd -->
        <div class="col-lg-4">
            <div style="background-color: #f6f9ffff;border: 1px solid #cadbffff;border-radius:10px">

                <div style="display: flex;justify-content:center"><img
                        src="{{asset('frontend/Our services/images/fi_11934224.png')}}"
                        style="width: 42%;height:auto;padding:20px" /></div>

                <h4 style="text-align:center;padding:10px;font-size:20px;font-weight:600">Business Consulting</h4>

            </div>
        </div>
    </div>



    <!-- this is container div below -->
</div>
@endsection
