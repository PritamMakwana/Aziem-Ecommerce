@extends('frontend.layouts.app')
@section('content')
    <div class="container">
        <div class="modal-dialog" role="document">
            <div style="border-radius: 20px;" class="modal-content">
                <div style="background-color:#e8efff;border-top-left-radius:20px;border-top-right-radius:20px"
                    class="modal-heade">

                    <button style="padding: 20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <!-- <span aria-hidden="true">&times;</span> -->
                    </button>

                </div>
                <div style="background-color:#e8efff" class="modal-body">
                    <div style="display: flex;justify-content:center;margin-top:-2rem;background-color:#e8efff"><img
                            style="border-radius: 0%;" src="{{ asset('frontend/screen3/assets/logo.png') }}" /></div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div id="exp_timer" class="alert alert-danger" style="display: none;">
                    <ul>
                        <li id="otpExpiredMessage" style="display: none;">OTP expired. Please resend a new one.</li>
                    </ul>
                </div>
                <div class="modal-body">
                    <hr style="  border: 1px solid #b4cbff;" />
                    <h3 style="text-align: center;padding-left:10px;padding-right:10px"> OTP Verification</h3>
                    <h4 style="text-align: center;padding-left:10px;padding-right:10px">Let’s verify your Number</h4>
                    <p style="text-align: center;padding-left:10px;padding-right:10px">Enter the code we have sent you on
                        </hp>
                    <p style="text-align: center;padding-left:10px;padding-right:10px;color: #004aad">
                        {{ session()->get('email') }}</p>
                    <hr />
                    <div style="padding:20px;">

                        <form method="POST" action="{{ route('otp.verify') }}">
                            @csrf
                            <input type="hidden" id="timerExpired" name="timerExpired" value="0">
                            <div class="form-group">
                                <input type="text" class="form-control" name="otp" placeholder="Enter Your OTP">
                            </div>
                            <p style="font-size:12px;"><b>Otp is case sensitive</b></p>
                            <div style="display:flex;justify-content:center"><button
                                    style="background-color: #5627ff;color:white;border-color:#5627ff;border-radius:8px; padding:10px;margin-bottom:1rem"
                                    type="submit" class="btn btn-primary">Verify Otp</button></div>
                        </form>
                    </div>
                    <form method="POST" action="{{ route('otp.resend') }}">
                        @csrf
                        <p style="text-align: center;padding:px;color:#808080">Didn't get OTP ? <button type="submit"
                                class="btn btn-link">Resend OTP</button></p>
                    </form>
                    <div style="display:flex;justify-content:center"><button id="otpTimerButton"
                            style="background-color: #ebf1f8;color:#407bff;border-color:#ebf1f8;border-radius:20px; padding:5px;margin-bottom:1rem"
                            type="submit" class="btn btn-primary"><i class="bi bi-clock-fill"></i>
                            <span id="timer">3:00</span>
                        </button>
                    </div>
                    </form>




                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let timerExpired = false;

        function startCountdown(duration, display) {
            let timer = duration,
                minutes, seconds;
            setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timerExpired = true;
                    display.textContent = "00:00";
                    document.getElementById('otpTimerButton').disabled = true;
                    document.getElementById('timerExpired').value = '1';
                    document.getElementById('otpExpiredMessage').style.display = 'block';
                    document.getElementById('exp_timer').style.display = 'block';
                }
            }, 1000);
        }

        startCountdown(180, document.getElementById("timer"));
    </script>
@endsection
