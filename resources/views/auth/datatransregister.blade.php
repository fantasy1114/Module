<!-- BEGIN: Head-->
@include('datatrans::layouts.header')
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static d-flex align-items-center" >

    <!-- BEGIN: Content-->
    <div class="w-100 100vh">
        
            <div class="content-wrapper justify-content-center d-flex">
        
                <div class="content-body">
                    
                    <!-- Register -->
                    <div class="card">
                        <div class="card-body">
                            
                            <h4 class="card-title mb-1">Adventure starts here </h4>
                            <p class="card-text mb-2 pr-5 mr-5">Make your app management easy and fun!</p>

                            <form class="auth-register-form mt-2" action="{{ route('register.custom') }}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="name" placeholder="johndoe" aria-describedby="username" tabindex="1" autofocus required/>
                                </div>
                                <div class="form-group">
                                    <label for="useremail" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="useremail" name="email" placeholder="john@example.com" aria-describedby="useremail" tabindex="2" required/>
                                </div>

                                <div class="form-group">
                                    <label for="userpassword" class="form-label">Password</label>

                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input type="password" minlength="6" class="form-control form-control-merge" id="password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" tabindex="3" required/>
                                        <div class="input-group-append">
                                            <span class="input-group-text cursor-pointer"><i><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="register-privacy-policy" tabindex="4" required/>
                                        <label class="custom-control-label" for="register-privacy-policy">
                                            I agree to <a href="javascript:void(0);">privacy policy & terms</a>
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block" tabindex="5">Sign up</button>
                            </form>

                            <p class="text-center mt-2">
                                <span>Already have an account?</span>
                                <a href="{{route('login')}}">
                                    <span>Sign in instead</span>
                                </a>
                            </p>

                        </div>
                    </div>
                    <!-- /Register -->
                        
    
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