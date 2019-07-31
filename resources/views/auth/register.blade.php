@extends('layouts.login')
@section('title')
    {{trans('form.auth.signup.page_title')}}
@stop
@section('content')

    <!-- Sign up -->
    <div class="col-sm-6 col-sm-offset-3">
        <div class="card">
            <h3 class="card-header h4">{{trans('form.auth.sign_up.title')}}</h3>
            <div class="card-block">

                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="sr-only" for="frontend_signup_full_namee">{{trans('form.auth.sign_up.full_name')}}</label>
                            <input class="form-control @error('full_name') is-invalid @enderror" type="text"
                                   id="frontend_signup_full_namee" placeholder="{{trans('form.auth.sign_up.full_name')}}" name="full_name"
                                   value="{{ old('full_name') }}" required autocomplete="full_name"/>
                            @error('full_name')
                            <div class="alert alert-danger">
                                <p><strong>{{trans('form.snap')}}</strong> {{ $message }}</p>
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="sr-only" for="frontend_signup_email">{{trans('form.auth.email')}}</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email"
                                   id="frontend_signup_email" placeholder="{{trans('form.auth.email')}}" name="email"
                                   value="{{ old('email') }}" required autocomplete="email"/>
                            @error('email')
                            <div class="alert alert-danger">
                                <p><strong>{{trans('form.snap')}}</strong> {{ $message }}</p>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="sr-only" for="frontend_signup_password">{{trans('form.auth.password')}}</label>
                            <input type="password" id="frontend_signup_password"
                                   placeholder="{{trans('form.auth.password_place_holder')}}" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="password">
                        </div>
                        <div class="col-sm-6">
                            <label class="sr-only" for="frontend_signup_confirm_password">{{trans('form.auth.sign_up.confirm_password')}}</label>
                            <input class="form-control" type="password" id="frontend_signup_confirm_password"
                                   placeholder="{{trans('form.auth.sign_up.confirm_password')}}" name="password_confirmation" required
                                   autocomplete="confirm-password"/>
                        </div>
                        @error('password')
                        <div class="alert alert-danger">
                            <p><strong>{{trans('form.snap')}}</strong> {{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <select class="form-control" id="country" name="country" size="1" required>
                                <option value="">{{trans('form.auth.sign_up.select_country')}}</option>
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
                                <p><strong>{{trans('form.snap')}}</strong> {{ $message }}</p>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="frontend_signup_terms" class="css-input switch switch-sm switch-app">
                                <input value="1" type="checkbox" id="frontend_signup_terms"
                                       name="signup_terms" required /><span></span> {{trans('form.auth.sign_up.i_agree')}} <a data-toggle="modal"
                                                                                          data-target="#modal-signup-terms"
                                                                                          href="#">{{trans('form.auth.sign_up.terms')}}</a>
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
                                <p>{{trans('form.auth.google.error')}}</p>
                            </div>
                        @endif
                    </div>
                    <button class="btn btn-app btn-block" type="submit">{{trans('form.auth.sign_up.submit')}}</button>
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __(trans('form.auth.login.submit')) }}
                    </a>
                </form>
            </div>
            <!-- .card-block -->
        </div>
        <!-- .card -->
    </div>
    <!-- .col-md-6 -->
    <!-- End sign up -->
@endsection
