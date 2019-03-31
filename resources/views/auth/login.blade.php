<?php
/**
 * @Author Faazy Ahamed
 * @eMail <faaziahamed@gmail.com>
 * @Mobile +94713221220
 * Date: 31-Oct-17
 * Time: 4:26 PM
 */ ?>

<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("css/font.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("fonts/feather/style.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("fonts/font-awesome/css/font-awesome.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("vendors/css/extensions/pace.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("vendors/css/forms/icheck/icheck.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("vendors/css/forms/icheck/custom.css")}}">
    <!-- END VENDOR CSS-->

    <!-- BEGIN App CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("css/bootstrap-extended.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("css/app.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("css/colors.min.css")}}">
    <!-- END App CSS-->

    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("css/pages/login-register.min.css")}}">
    <!-- END Page Level CSS-->

    <!--[if lt IE 9]>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->

</head>
<body data-open="click" data-menu="vertical-menu" data-col="1-column"
      class="vertical-layout vertical-menu 1-column bg-full-screen-image blank-page blank-page">
<noscript>
    <div class="global-site-notice noscript">
        <div class="notice-inner">
            <p>
                <strong>JavaScript seems to be disabled in your browser.</strong><br>You must have JavaScript enabled in
                your browser to utilize the functionality of this website.
            </p>
        </div>
    </div>
</noscript>

{{--Begin Content--}}
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-3 p-0">
                    <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                        <div class="card-header no-border">
                            <div class="card-title text-xs-center">
                                <h2>{{config('app.client')}}</h2>
                            </div>
                        </div>

                        @if ($errors->has('email'))
                            <div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible fade in mb-2"
                                 role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <div class="card-body collapse in" id="login_panel">

                            <p class="card-subtitle line-on-side text-muted text-xs-center font-small-3 mx-2 my-1">
                                <span>Please login to your account.</span>
                            </p>
                            <div class="card-block">
                                <form class="login" method="POST" action="{{ route('login') }}" data-toggle="validator">
                                    {{ csrf_field() }}
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" id="email" name="email"
                                               placeholder="Your Username"
                                               value="{{ old('email') }}" required autofocus>
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>

                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" class="form-control" id="password"
                                               placeholder="Enter Password" name="password"
                                               required>
                                        <div class="form-control-position">
                                            <i class="fa fa-key"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group row">
                                        <div class="col-md-6 col-xs-12 text-xs-center text-sm-left">
                                            <fieldset>
                                                <input type="checkbox" id="remember" name="remember"
                                                       class="chk-remember">
                                                <label for="remember-me"> Remember Me</label>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-xs-12 float-sm-left text-xs-center text-sm-right"><a
                                                    href="#forgot_password" class="card-link password_recovery_link">Forgot
                                                Password?</a>
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-outline-primary btn-block">
                                        <i class="ft-unlock"></i> Login
                                    </button>
                                </form>
                            </div>
                            <p class="card-subtitle line-on-side text-muted text-xs-center font-small-3 mx-2 my-1">
                                <span></span>
                            </p>
                        </div>

                        {{--Forgot Password Panel--}}
                        <div id="forgot_password" style="display: none">
                            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2">
                                <span>We will send you a link to reset password.</span>
                            </h6>
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    <form class="login form-horizontal" method="POST" action="{{ route('login') }}"
                                          data-toggle="validator">
                                        {{ csrf_field() }}

                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="email" name="forgot_email"
                                                   class="form-control form-control-lg input-lg"
                                                   placeholder="Email Address') ?>" required="required"/>
                                            <div class="form-control-position">
                                                <i class="ft-mail"></i>
                                            </div>
                                            <div class="help-block"></div>
                                        </fieldset>
                                        <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><i
                                                    class="ft-unlock"></i> Recover Password
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer no-border">
                                <div class="form-action">
                                    <a class="btn btn-success pull-left login_link float-sm-left text-xs-center"
                                       href="#login_panel">
                                        <i class="ft-arrow-left"></i> Back </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
{{-- End Content--}}

<!-- BEGIN VENDOR JS-->
<script src="{{asset("vendors/js/vendors.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendors/js/bootstrapValidator.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendors/js/forms/icheck/icheck.min.js")}}" type="text/javascript"></script>
<!-- END VENDOR JS-->

<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset("js/scripts/forms/form-login-register.min.js")}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

</body>
</html>
