<!-- BEGIN: Head-->
@include('datatrans::layouts.header')
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static d-flex align-items-center" >

    <!-- BEGIN: Content-->
    <div class="w-100 100vh">
        
            <div class="content-wrapper justify-content-center d-flex">
                
                <div class="content-body">
                    <!-- Login v1 -->
                    <div class="card">
                        <div class="card-body">
                            
                            <h4 class="card-title mb-1">Welcome to Our Service!</h4>
                            <p class="card-text mb-2 pr-5">Please sign-in to your account and start the adventure</p>
                            @if ($errors->has('login_failed'))
                            <div class="alert alert-danger d-flex alert-dismissible fade show">
                                {{ $errors->first('login_failed') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <form class="auth-login-form mt-2" action="{{ route('login.custom') }}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="john@example.com" aria-describedby="email" tabindex="1" autofocus required/>
                                </div>

                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input type="password" class="form-control form-control-merge" id="password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required/>
                                        <div class="input-group-append">
                                            <span class="input-group-text cursor-pointer"><i><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="remember-me" tabindex="3" />
                                        <label class="custom-control-label" for="remember-me"> Remember Me </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block" tabindex="4">Sign in</button>
                            </form>

                            <p class="text-center mt-2">
                                <span>New on our platform?</span>
                                <a href="{{route('register-user')}}">
                                    <span>Create an account</span>
                                </a>
                            </p>

                        </div>
                    </div>
                    <!-- /Login v1 -->
                
            

                </div>
            </div>
        
    </div>
    <!-- END: Content-->
    
    <!-- BEGIN: Footer-->
    @include('datatrans::layouts.footer')
    <!-- END: Footer-->   

    <script>
    
   
    </script>
</body>
<!-- END: Body-->

</html>