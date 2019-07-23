@extends('layouts.login')

@section('content')

    <!-- Sign up -->
    <div class="col-sm-6 col-sm-offset-3">
        <div class="card">
            <h3 class="card-header h4">Sign up</h3>
            <div class="card-block">

                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="sr-only" for="frontend_signup_full_namee">Full Name</label>
                            <input class="form-control @error('full_name') is-invalid @enderror" type="text"
                                   id="frontend_signup_full_namee" placeholder="Full Name" name="full_name"
                                   value="{{ old('full_name') }}" required autocomplete="full_name"/>
                            @error('full_name')
                            <div class="alert alert-danger">
                                <p><strong>Oh snap!</strong> {{ $message }}</p>
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="sr-only" for="frontend_signup_email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email"
                                   id="frontend_signup_email" placeholder="Email" name="email"
                                   value="{{ old('email') }}" required autocomplete="email"/>
                            @error('email')
                            <div class="alert alert-danger">
                                <p><strong>Oh snap!</strong> {{ $message }}</p>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="sr-only" for="frontend_signup_password">Password</label>
                            <input type="password" id="frontend_signup_password"
                                   placeholder="Password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password">
                        </div>
                        <div class="col-sm-6">
                            <label class="sr-only" for="frontend_signup_confirm_password">Confirm Password</label>
                            <input class="form-control" type="password" id="frontend_signup_confirm_password"
                                   placeholder="Confirm password" name="password_confirmation" required
                                   autocomplete="confirm-password"/>
                        </div>
                        @error('password')
                        <div class="alert alert-danger">
                            <p><strong>Oh snap!</strong> {{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <select class="form-control" id="country" name="country" size="1" required>
                                <option value="">Please select your country</option>
                                <option value="Angola">Angola</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Democratic Republic of Congo">Democratic Republic of Congo</option>
                                <option value="Eswatini">Eswatini</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Mozambique">Moza mbique</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                            @error('country')
                            <div class="alert alert-danger">
                                <p><strong>Oh snap!</strong> {{ $message }}</p>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="frontend_signup_terms" class="css-input switch switch-sm switch-app">
                                <input value="1" type="checkbox" id="frontend_signup_terms"
                                       name="signup_terms" required /><span></span> I agree with <a data-toggle="modal"
                                                                                          data-target="#modal-signup-terms"
                                                                                          href="#">terms &amp;
                                    conditions</a>
                            </label>
                            @error('signup_terms')
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                        @if(env('GOOGLE_RECAPTCHA_KEY'))
                            <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
                        @endif
                        </div>
                    </div>
                    <div class="form-group">
                        @if ($errors->has('g-recaptcha-response'))
                            {{--//$errors->first('g-recaptcha-response'--}}
                            <div class="alert alert-danger">
                                <p>{{'Error in validating if you are not a robot, try again..'}}</p>
                            </div>
                        @endif
                    </div>
                    <button class="btn btn-app btn-block" type="submit">Sign Up</button>
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </form>
            </div>
            <!-- .card-block -->
        </div>
        <!-- .card -->
    </div>
    <!-- .col-md-6 -->
    <!-- End sign up -->
    <script type="application/javascript">

    </script>
@endsection
