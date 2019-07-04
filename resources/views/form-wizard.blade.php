@extends('layouts.app')
@section('css')
    <link rel="stylesheet"
          href="{{asset('themes/assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css')}}"/>
    <link rel="stylesheet"
          href="{{asset('themes/assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('themes/assets/js/plugins/select2/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('themes/assets/js/plugins/select2/select2-bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('themes/assets/js/plugins/dropzonejs/dropzone.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('themes/assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css')}}"/>
@stop
@section('js')
    <!-- Page JS Plugins -->
    <script src="{{asset('themes/assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
    <script src="{{asset('themes/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{asset('themes/assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('themes/assets/js/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('themes/assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('themes/assets/js/plugins/masked-inputs/jquery.maskedinput.min.js')}}"></script>
    <script src="{{asset('themes/assets/js/plugins/dropzonejs/dropzone.min.js')}}"></script>
    <script src="{{asset('themes/assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>

    <!-- Page JS Code -->
    <script>
        $(function () {
            // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
            App.initHelpers(['datepicker', 'colorpicker', 'select2', 'masked-inputs', 'tags-inputs']);
        });
    </script>

    <!-- Page JS Code -->
    <script src="{{asset('themes/assets/js/pages/base_forms_wizard.js')}}"></script>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Classic Validation Wizard (.js-wizard-classic-validation class is initialized in js/pages/base_forms_wizard.js) -->
            <!-- For more examples please check http://vadimg.com/twitter-bootstrap-wizard-example/ -->
            <div class="card js-wizard-classic-validation">
                <!-- Step Tabs -->
                <ul class="nav nav-tabs nav-justified">
                    <li class="active">
                        <a class="inactive" href="#validation-classic-step1" data-toggle="tab" aria-expanded="false">1.
                            Parliament</a>
                    </li>
                    <li class="inactive">
                        <a class="inactive" href="#validation-classic-step2" data-toggle="tab" aria-expanded="true">2.
                            Committees</a>
                    </li>
                    <li>
                        <a class="inactive" href="#validation-classic-step3" data-toggle="tab">3. Political Party</a>
                    </li>
                </ul>
                <!-- End Step Tabs -->

                <!-- Form -->
                <!-- jQuery Validation (.js-form1 class is initialized in js/pages/base_forms_wizard.js) -->
                <!-- For more examples please check https://github.com/jzaefferer/jquery-validation -->
                @if (session('errors'))
                    <div class="alert alert-danger">
                        <p><strong>Oh snap!</strong> {{session('errors')->first('messages')}}</p>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        <p><strong>Well done!</strong> {{session('success')}}</p>
                    </div>
            @endif
            <!-- Form -->
                <!-- jQuery Validation (.js-form1 class is initialized in js/pages/base_forms_wizard.js) -->
                <!-- For more examples please check https://github.com/jzaefferer/jquery-validation -->
                <form class="js-form1 validation form-horizontal" action="{{route('wizard')}}" method="post">
                @csrf
                    <!-- Steps Content -->
                    <div class="card-block tab-content">
                        <!-- Step 1 -->
                        <div class="tab-pane m-t-md m-b-lg active" id="validation-classic-step1">
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <label for="parliament-name">Parliament Name</label>
                                    <input class="form-control" type="text" id="parliament-name" name="parliament_name"
                                           placeholder="Please enter your parliament name"/>
                                </div>
                            </div>
                            @isset($countries)
                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <label for="country">Country</label>
                                        <select class="form-control" id="country"
                                                name="country" size="1">
                                            <option value="">Please select your country</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country}}">{{$country}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endisset
                            @isset($types_of_parliaments)
                                <div class="form-group">
                                    <label class="col-sm-6 col-sm-offset-3">Parliament Type</label>
                                    <div class="col-sm-6 col-sm-offset-3">
                                        @foreach($types_of_parliaments as $type_of_parliament)
                                            <div class="radio">
                                                <label for="{{$type_of_parliament}}">
                                                    <input type="radio" id="{{$type_of_parliament}}"
                                                           name="parliament_type"
                                                           value="{{$type_of_parliament}}"> {{$type_of_parliament}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endisset
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="form-material">
                                        <label for="date_of_inaguration">Date of Inaugural Plenary Session</label>
                                        <input class="js-datepicker form-control" type="text" id="date_of_inaguration"
                                               name="date_of_inaguration" data-date-format="yyyy/mm/dd"
                                               placeholder="yyyy/mm/dd">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="form-material">
                                        <input class="js-datepicker form-control" type="text" id="end_of_term"
                                               name="end_of_term"
                                               data-date-format="yyyy/mm/dd" placeholder="yyyy/mm/dd">
                                        <label for="end_of_term">End of Parliament's Term</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Step 1 -->

                        <!-- Step 2 -->
                        <div class="tab-pane m-t-md m-b-lg" id="validation-classic-step2">
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <label for="committee_name">Committee Name</label>
                                    <input class="form-control" type="text" id="committee_name" name="committee_name"
                                           placeholder="Please enter your committee name"/>
                                </div>
                            </div>
                        </div>
                        <!-- End Step 2 -->

                        <!-- Step 3 -->
                        <div class="tab-pane m-t-md m-b-lg" id="validation-classic-step3">
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <label for="political-party-name">Political Party
                                        Name</label>
                                    <input class="form-control" type="text" id="political-party-name" name="parliament_party_name"
                                           placeholder="Please enter political party name"/>
                                </div>
                            </div>
                            @isset($political_designations)
                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <label for="political_designation">Political Party Designation</label>
                                        <select class="form-control" id="political_designation"
                                                name="political_designation" size="1">
                                            <option value="">Please select the Political Designation</option>
                                            @foreach($political_designations as $political_designation)
                                                <option value="{{$political_designation}}">{{$political_designation}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endisset
                        </div>
                        <!-- End Step 3 -->
                    </div>
                    <!-- End Steps Content -->

                    <!-- Steps Navigation -->
                    <div class="card-block b-t">
                        <div class="row">
                            <div class="col-xs-6">
                                <button class="wizard-prev btn btn-default" type="button">Previous</button>
                            </div>
                            <div class="col-xs-6 text-right">
                                <button class="wizard-next btn btn-default" type="button">Next</button>
                                <button class="wizard-finish btn btn-app" type="submit"><i
                                            class="ion-checkmark m-r-xs"></i> Submit
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- End Steps Navigation -->
                </form>
                <!-- End Form -->
            </div>
            <!-- .card -->
            <!-- End Classic Validation Wizard -->
        </div>
        <!-- .col-lg-6 -->
    </div>
@endsection