<div class="modal show fade" id="addressmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div style="border-radius: 20px;" class="modal-content">
            <div style="background-color:#e8efff;border-top-left-radius:20px;border-top-right-radius:20px"
                class="modal-heade">

                <button style="padding: 20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div style="background-color:#e8efff" class="modal-body">
                <div style="display: flex;justify-content:center;margin-top:-2rem;background-color:#e8efff"><img
                        style="border-radius: 0%;"
                        src="{{asset('frontend/Create new user/assets/image 26 (1).png')}}" /></div>
            </div>

            <div class="modal-body">
                <hr style="  border: 1px solid #b4cbff;" />
                <h3 style="text-align: center;padding-left:10px;padding-right:10px">Job Registration</h3>
                <p style="text-align: center;padding-left:10px;padding-right:10px">Please send your CV and fill the
                    following
                    form</p>
                <div style="padding: 25px;">
                    <form method="POST" action="{{ route('job.register') }}" enctype="multipart/form-data"
                        id="so-login">
                        @csrf
                        <div class="form-group">
                            <label for="inputShopname">Your Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="jname"
                                placeholder="Enter your Full Name" name="name" value="{{ old('name') }}">

                            <span class="invalid-feedback" id="jname_error" role="alert">
                            </span>

                        </div>

                        <div class="form-group">
                            <label for="inputShopname">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="jemail"
                                placeholder="Enter your email here" name="email" value="{{ old('email') }}">

                            <span class="invalid-feedback" id="jemail_error" role="alert">
                            </span>

                        </div>

                        <div class="form-group">
                            <label for="inputShopname">Phone Number</label>
                            <input type="tel" name="mobile" value="{{ old('mobile') }}"
                                class="form-control @error('mobile') is-invalid @enderror" id="jmobile"
                                placeholder="Phone Number">

                            <span class="invalid-feedback" id="jmobile_error" role="alert">
                            </span>

                        </div>

                        <div class="form-group">
                            <label for="inputShopname">Nationality</label>
                            <input type="text" name="nationality" value="{{ old('nationality') }}"
                                class="form-control @error('nationality') is-invalid @enderror" id="jnationality"
                                placeholder="Enter full address here">

                            <span class="invalid-feedback" id="jnationality_error" role="alert">
                            </span>

                        </div>

                        <div class="form-group">
                            <label for="inputShopname">Specialization</label>
                            <input type="text" name="specialization" value="{{ old('specialization') }}"
                                class="form-control @error('specialization') is-invalid @enderror" id="jspecialization"
                                placeholder="Enter your Specialization">
                            <span class="invalid-feedback" id="jspecialization_error" role="alert">
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="gender">Select your gender</label>
                            <select class="form-control  @error('gender') is-invalid @enderror" name="gender"
                                id="jgender">
                                <option selected disabled value="">Select your gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <span class="invalid-feedback" id="jgender_error" role="alert">
                            </span>
                        </div>





                        <div class="form-group">
                            <label for="gender">Upload Your CV</label>
                        </div>

                        <div style="border: 1px dotted #5627ff;border-style:dashed" class="file-drop-area  ">
                            <span class="choose-file-button">Choose file</span>
                            <span class="file-message">or drag and drop file here</span>
                            <input class="file-input @error('cv_file') is-invalid @enderror" name="cv_file" type="file"
                                id="cv_file" multiple>
                            <span class="invalid-feedback" id="cv_file_error" role="alert">
                            </span>
                            <span class="invalid-feedback" id="cv_file_error_req" role="alert">
                            </span>
                        </div>





                        <div style="margin:10px" class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">I authorize HikayatAlref to contact me
                                for
                                opportunities</label>
                        </div>

                        <!-- script for upload file -->
                        <script>
                            $(document).on('change', '.file-input', function () {


                  var filesCount = $(this)[0].files.length;

                  var textbox = $(this).prev();

                  if (filesCount === 1) {
                    var fileName = $(this).val().split('\\').pop();
                    textbox.text(fileName);
                  } else {
                    textbox.text(filesCount + ' files selected');
                  }
                });
                        </script>
                        <hr />


                </div>

                <div style="display:flex;justify-content:center"><button
                        style="background-color: #5627ff;color:white;border-color:#5627ff;border-radius:8px; padding:10px;margin-bottom:1rem"
                        type="submit" class="btn btn-primary">Submit </button></div>
                </form>




            </div>
        </div>
    </div>
</div>
