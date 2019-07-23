@extends('layouts.login')

@section('content')

    <!-- Login card -->
    <div class="col-sm-6 col-sm-offset-3">
        <div class="card">
            <h3 class="card-header h4">Login</h3>
            <div class="card-block">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @error('email')
                    <div class="form-group">
                        <span class="alert alert-danger" role="alert">
                            {{ $message }}
                        </span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label class="sr-only" for="frontend_login_email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus
                               id="frontend_login_email" placeholder="Email"/>

                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="frontend_login_password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               name="password"
                               required autocomplete="current-password" id="frontend_login_password"
                               placeholder="Password"/>
                    </div>

                    <div class="form-group">
                        <label for="frontend_login_remember" class="css-input switch switch-sm switch-app">
                            <input type="checkbox" id="frontend_login_remember"/><span></span> Remember me</a>
                        </label>
                    </div>

                    <div class="form-group">
                        @if(env('GOOGLE_RECAPTCHA_KEY'))
                            <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
                        @endif
                    </div>
                    <div class="form-group">
                        @if ($errors->has('g-recaptcha-response'))
                            {{--//$errors->first('g-recaptcha-response'--}}
                            <div class="alert alert-danger">
                                <p>{{'Error in validating if you are not a robot, try again..'}}</p>
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-app btn-block">Login</button>
                    <a class="btn btn-link" href="{{ route('register') }}">
                        {{ __('Sign up') }}
                    </a>
                    {{--
                    @if (Route::has('password.request'))
                         <a class="btn btn-link" href="{{ route('password.request') }}">
                             {{ __('Forgot Your Password?') }}
                         </a>
                     @endif--}}
 </form>
</div>
<!-- .card-block -->
</div>
<!-- .card -->
</div>
<!-- .col-md-6 -->
<!-- End login -->
@endsection