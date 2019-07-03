@extends('layouts.login')

@section('content')
    <!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
    <!-- Sign up -->
    <div class="col-sm-6 col-sm-offset-3">
        <div class="card">
            <h3 class="card-header h4">Sign up</h3>
            <div class="card-block">

                <form  class="form-horizontal" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="sr-only" for="frontend_signup_full_namee">Full Name</label>
                            <input class="form-control @error('full_name') is-invalid @enderror"  type="text" id="frontend_signup_full_namee" placeholder="Full Name" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" />
                            @error('full_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="sr-only" for="frontend_signup_email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" id="frontend_signup_email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="sr-only" for="frontend_signup_password">Password</label>
                            <input type="password" id="frontend_signup_password"
                                   placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="sr-only" for="frontend_signup_confirm_password">Confirm Password</label>
                            <input class="form-control" type="password" id="frontend_signup_confirm_password"
                                   placeholder="Confirm password" name="password_confirmation" required autocomplete="confirm-password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="frontend_signup_terms" class="css-input switch switch-sm switch-app">
                                <input type="checkbox" id="frontend_signup_terms"
                                       name="frontend_signup_terms"/><span></span> I agree with <a data-toggle="modal"
                                                                                                   data-target="#modal-signup-terms"
                                                                                                   href="#">terms &amp;
                                    conditions</a>
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-app btn-block" type="submit">Sign Up</button>
                </form>
            </div>
            <!-- .card-block -->
        </div>
        <!-- .card -->
    </div>
    <!-- .col-md-6 -->
    <!-- End sign up -->
@endsection
