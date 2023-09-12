@extends('frontend.auth.app')
@section('title', _trans('auth.Sign In'))
@section('content')
    <!-- form heading  -->
    <div class="page-content d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4 pe-md-0">
                            <div class="auth-side-wrapper"
                                style="background-image: url({{ url(asset('public/theme/assets/images/login.png')) }})">
                            </div>
                        </div>
                        <div class="col-md-8 ps-md-0">

                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo d-block mb-2"> <img
                                        src="{{ asset('public/theme/assets/images/logo.png') }}" alt="">
                                </a>
                                <h2 class="title mb-8">{{ _trans('auth.Sign In') }}</h2>

                                <h5 class="text-muted fw-normal mb-4">
                                    {{ _trans('auth.welcome back please login to your account') }}</h5>

                                <div class="alert alert-success validation" role="alert" style="display: none"></div>
                                <div class="alert alert-danger validation" role="alert" style="display: none"></div>
                                <div class="alert alert-info validation" role="alert" style="display: none"></div>



                                <input type="hidden" id="login_success_fully"
                                    value="{{ _trans('frontend.Login successfully') }}">
                                <!-- Start With form -->
                                <form action="{{route('adminLogin') }}" method="post" id="login"
                                    class="  form-sample  __login_form">
                                    @csrf

                                    <input type="hidden" hidden name="is_email" value="1">
                                    <!-- username input field  -->


                                    <div class="mb-3">
                                        <label for="username" class="form-label">{{ _trans('auth.Email') }}
                                            <sup>*</sup></label>
                                        <input type="email" class="form-control" id="username" name="email"
                                            placeholder="{{ _trans('auth.Email') }}">

                                        <p class="text-danger cus-error __phone small-text"></p>

                                    </div>



                                    <div class="mb-3">
                                        <label for="passwordLoginInput"
                                            class="form-label">{{ _trans('auth.Password') }}<sup>*</sup></label>
                                        <input type="password" class="form-control" id="passwordLoginInput"
                                            autocomplete="current-password" name="password" placeholder="@lang('Type Password')">

                                        <p class="text-danger cus-error __password small-text"></p>

                                    </div>


                                    <div class="d-flex justify-content-between w-100">
                                        <!-- Forget Password link  -->
                                        <div class="authenticate-now">
                                            <a href="" class=" text-link ">
                                            </a>
                                        </div>
                                    </div>
                                    <div>
                                        <input id="authdata" type="hidden" value="{{ __('Authenticating...') }}">

                                        <button type="submit"
                                            class="submit-btn btn btn-primary me-2 mb-2 mb-md-0 submit">{{ _trans('auth.Sign In') }}</button>
                                        <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                            <i class="btn-icon-prepend" data-feather="facebook"></i>
                                            @lang('Login with facebook')
                                        </button>
                                    </div>


                                    </button>
                                    <a href="{{ route('password.forget') }}" class="d-block mt-3 text-muted">
                                        {{ _trans('auth.Forgot password?') }}</a>
                                </form>

                            </div>


                        

                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection

@section('script')
    <script src="{{ asset('/') }}public/frontend/assets/jquery.min.js"></script>
    <script src="{{ asset('/') }}public/frontend/assets/bootstrap/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}public/backend/js/select2.min.js"></script>
    @include('backend.partials.message')
    <script src="{{ asset('public/js/toastr.js') }}"></script>
    {!! Toastr::message() !!}
    <script src="{{ asset('public/frontend/js/registration.js') }}"></script>
    <script src="{{ asset('public/frontend/js/show-hide-password.js') }}"></script>
@endsection
