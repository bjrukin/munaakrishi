@include('admin._partial.metahead')

<body>
    <div class="account-pages my-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card my-5">
                        <div class="text-center mt-4 mb-2">
                            <a href="{{ url('/') }}" target="_blank" class="d-inline-block">
                                <img src="{{ asset('assets/images/brand/munaa-logo-enhanced.png') }}" alt="{{ env('APP_NAME', 'Munaa Krishi Limited') }}" style="max-height: 72px; max-width: 230px; object-fit: contain;">
                            </a>
                            <p class="text-muted small mt-2 mb-0 fw-semibold">Administration Portal</p>
                        </div>
                        <div class="card-body p-4">
                            <form id="form" method="post" action="{{ route('admin.checkLogin') }}" class="form">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password" placeholder="Password" class="form-control" spellcheck="false" autocorrect="off"  autocapitalize="off">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 d-grid text-center">
                                <button class="btn btn-primary btn-loading" type="submit"> Log In </button>
                                </div>
                            </form>
                           
                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <p> <a href="{{ route('admin.forgot.password') }}" class="text-muted ms-1"><i class="fa fa-lock me-1"></i>Forgot your
                                            password?</a></p>

                                </div>
                            </div>
                             <div class="text-center">&copy; <a href="https://{{ env('APP_WEBSITE') }}" target="_blank" class="text-muted"><strong>{{ env('APP_NAME') }}</strong></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('admin._partial.scripts')
    @include('admin.auth.js.login')
</body>

</html>