<section class="apply-form form_sec-box">
    <div class="container">
        <div class="wrap-80 wrap-100">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="header_offset-1">
                        <h5 class="title-head">Start Your<br>
                            Journey</h5>
                        <p>If you're interested in the role why not apply below and send us your CV? we'd be

                            delighted to hear from you!</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-wrap">
                        <form action="{{ route('careers.submit')}}" method="post" enctype="multipart/form-data"
                            class="form" id="form">
                            @csrf
                            <input type="hidden" name="job_name" value="{{ $row->name}}" class="form-control">
                            <input type="hidden" name="job_slug" value="{{ $row->slug}}" class="form-control">
                            <div class="form-field">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control required"
                                    aria-required="true" placeholder="Name *">
                            </div>
                            <div class="form-field">
                                <input type="text" name="phone_number" value="{{ old('phone_no') }}" placeholder="Phone No *"
                                    class="form-control required" autocomplete="off">
                            </div>
                            <div class="form-field">
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control required"
                                    aria-required="true" placeholder="Email *">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-field">
                                    <div class="cv">
                                        <div class="input-container">
                                            <div class="choose_file"> Upload Your CV
                                                    <input type="file" id="cv_file" accept=".doc, .docx, .pdf">
                                                    <input type="hidden" name="cv" id="cv" class="form-control" >
                                            </div>
                                            <span id="uploadedCv" class="uploaded__Cv-filename"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-field">
                                <textarea class="form-control" name="inquiry" placeholder="Ask a question about this position"></textarea>
                            </div>
                            <div class="form-field">
                                <button type="submit" aria-label="Submit your job application"
                                    class="sub_btn-form btn-loading">Apply Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>