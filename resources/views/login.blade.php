<?php $page = 'login'; ?>
@extends('layout.mainlayout')
@section('content')
<?php $page = 'login'; ?>
@extends('layout.mainlayout')
@section('content')
<div class="container-fuild">
    <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
        <div class="row">
            <div class="col-lg-6">
                <div class="login-background position-relative d-lg-flex align-items-center justify-content-center d-lg-block d-none flex-wrap vh-100 overflowy-auto">
                    <div>
                        <img src="{{URL::asset('build/img/authentication/authentication-02.jpg')}}" alt="Img">
                    </div>
                    <div class="authen-overlay-item  w-100 p-4">
                        <h4 class="mb-3" style="color: #E5D8C0;">Elevating Standars, Inspiring Pilots</h4>
                        <div
                            class="d-flex align-items-center flex-row mb-3 justify-content-between p-3 br-5 gap-3 card">
                            <div>
                                <h6>Simplicity</h6>
                                <p class="mb-0 text-truncate">We aim to simplify all aspects of training.</p>
                            </div>
                        </div>
                        <div
                            class="d-flex align-items-center flex-row mb-3 justify-content-between p-3 br-5 gap-3 card">
                            <div>
                                <h6>Comprehensive Scope</h6>
                                <p class="mb-0 text-truncate">Our platform covers everything related to training.
                                </p>
                            </div>
                        </div>
                        <div
                            class="d-flex align-items-center flex-row mb-3 justify-content-between p-3 br-5 gap-3 card">
                            <div>
                                <h6>Efficiency</h6>
                                <p class="mb-0 text-truncate">The process is designed to be straightforward and user-friendly.</p>
                            </div>

                        </div>
                        <div
                            class="d-flex align-items-center flex-row mb-3 justify-content-between p-3 br-5 gap-3 card">
                            <div>
                                <h6>Precision Learning</h6>
                                <p class="mb-0 text-truncate">Structured training designed to mirror real-world aviation scenarios.</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                    <div class="col-md-8 mx-auto p-4">
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div>
                                <div class=" mx-auto mb-5 text-center">
                                    <img src="{{URL::asset('build/img/general/logo_sas.png')}}"
                                        class="img-fluid" alt="Logo" style="width: 200px;">
                                </div>
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class=" mb-4">
                                            <h2 class="mb-2">Welcome to Simple Aviation Solutions</h2>
                                            <p class="mb-0">Please enter your details to sign in</p>
                                        </div>
                                        <div class="mb-3 ">
                                            <label class="form-label">Email Address</label>
                                            <div class="input-icon mb-3 position-relative">
                                                <span class="input-icon-addon">
                                                    <i class="ti ti-mail"></i>
                                                </span>
                                                <input type="text" id="Email" name="email" value="{{ old('email') }}" class="form-control">
                                                <div class="text-danger pt-2">
                                                    @error('0')
                                                        {{$message}}
                                                    @enderror
                                                    @error('email')
                                                        {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                            <label class="form-label">Password</label>
                                            <div class="pass-group">
                                                <input type="password"  id="password" name="password" value="{{ old('password') }}" class="pass-input form-control">
                                                <span class="ti toggle-password ti-eye-off"></span>
                                                <div class="text-danger pt-2">
                                                    @error('0')
                                                        {{$message}}
                                                    @enderror
                                                    @error('password')
                                                        {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-wrap form-wrap-checkbox mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="form-check form-check-md mb-0">
                                                    <input class="form-check-input mt-0" type="checkbox">
                                                </div>
                                                <p class="ms-1 mb-0 ">Remember Me</p>
                                            </div>
                                            <div class="text-end ">
                                                <a href="{{url('forgot-password')}}" class="link-danger">Forgot
                                                    Password?</a>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary w-100">Sign In</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 text-center">
                                    <p class="mb-0 ">Copyright &copy; {{ date('Y') }} - Simple Aviation Solutions</p>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
