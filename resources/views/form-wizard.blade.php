@extends('layouts.app')
@section('js')
    <!-- Page JS Plugins -->
    <script src="{{asset('themes/assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
    <script src="{{asset('themes/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('themes/assets/js/pages/base_forms_wizard.js')}}"></script>
@stop
@section('content')

    <!-- Simple Classic Progress Wizard (.js-wizard-simple class is initialized in js/pages/base_forms_wizard.js) -->
    <!-- For more examples please check http://vadimg.com/twitter-bootstrap-wizard-example/ -->
    <div class="card js-wizard-simple">
        <!-- Step Tabs -->
        <ul class="nav nav-tabs nav-justified">
            <li class="active">
                <a href="#simple-classic-progress-step1" data-toggle="tab" aria-expanded="true">1. Parliament</a>
            </li>
            <li class="">
                <a href="#simple-classic-progress-step2" data-toggle="tab" aria-expanded="false">2. Committee</a>
            </li>
            <li class="">
                <a href="#simple-classic-progress-step3" data-toggle="tab" aria-expanded="false">3. Political Party</a>
            </li>
        </ul>
        <!-- End Step Tabs -->

        <!-- Form -->
        <form class="form-horizontal" action="base_forms_wizard.html" method="post">
            <!-- Steps Progress -->
            <div class="card-block b-b">
                <div class="wizard-progress progress progress-mini m-b-0">
                    <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="100"
                         aria-valuemin="0" aria-valuemax="100" style="width: 33.3333%;"></div>
                </div>
            </div>
            <!-- End Steps Progress -->

            <!-- Steps Content -->
            <div class="card-block tab-content">
                <!-- Step 1 -->
                <div class="tab-pane fade fade-up m-t-md m-b-lg active in" id="simple-classic-progress-step1">
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">

                            <label for="simple-classic-progress-firstname">Parliament Name</label>
                            <input class="form-control" type="text" id="simple-classic-progress-firstname"
                                   name="name" placeholder="Please enter the parliament name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <label for="simple-classic-progress-country">Country</label>
                            <select class="form-control" id="simple-classic-progress-country"
                                    name="country" size="1">
                                <option value="">Please select your country</option>
                                <option value="Angola">Angola</option>
                                <option value="Democratic Republic of Congo">Democratic Republic of Congo</option>
                                <option value="Eswatini">Eswatini</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <label for="simple-classic-progress-email">Email</label>
                            <input class="form-control" type="email" id="simple-classic-progress-email"
                                   name="simple-classic-progress-email" placeholder="Please enter your email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <label>Parliament Type</label>
                            <div class="radio">
                                <label for="example-radio1">
                                    <input type="radio" name="parliament_type" value="Lower house"> Lower house
                                </label>
                            </div>
                            <div class="radio">
                                <label for="example-radio2">
                                    <input type="radio" name="parliament_type" value="Upper house"> Upper house
                                </label>
                            </div>
                            <div class="radio">
                                <label for="example-radio3">
                                    <input type="radio" name="parliament_type" value="Unicameral"> Unicameral
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Step 1 -->

            <!-- Step 2 -->
            <div class="tab-pane fade fade-up m-t-md m-b-lg" id="simple-classic-progress-step2">
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <label for="simple-classic-progress-details">Details</label>
                        <textarea class="form-control" id="simple-classic-progress-details"
                                  name="simple-classic-progress-details" rows="9"
                                  placeholder="Share something about yourself"></textarea>
                    </div>
                </div>
            </div>
            <!-- End Step 2 -->

            <!-- Step 3 -->
            <div class="tab-pane fade fade-up m-t-md m-b-lg" id="simple-classic-progress-step3">
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <label for="simple-classic-progress-city">City</label>
                        <input class="form-control" type="text" id="simple-classic-progress-city"
                               name="simple-classic-progress-city" placeholder="Where do you live?">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <label for="simple-classic-progress-skills">Skills</label>
                        <select class="form-control" id="simple-classic-progress-skills"
                                name="simple-classic-progress-skills" size="1">
                            <option value="">Please select your best skill</option>
                            <option value="1">Photoshop</option>
                            <option value="2">HTML</option>
                            <option value="3">CSS</option>
                            <option value="4">JavaScript</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <label class="css-input switch switch-sm switch-primary"
                               for="simple-classic-progress-terms">
                            <input type="checkbox" id="simple-classic-progress-terms"
                                   name="simple-classic-progress-terms"><span></span> Agree with the <a
                                    data-toggle="modal" data-target="#modal-terms" href="#">terms</a>
                        </label>
                    </div>
                </div>
            </div>
            <!-- End Step 3 -->
    </div>
    <!-- End Steps Content -->

    <!-- Steps Navigation -->
    <div class="card-block b-t">
        <div class="row">
            <div class="col-xs-6">
                <button class="wizard-prev btn btn-default disabled" type="button">Previous</button>
            </div>
            <div class="col-xs-6 text-right">
                <button class="wizard-next btn btn-default" type="button" style="display: inline-block;">Next
                </button>
                <button class="wizard-finish btn btn-app" type="submit" style="display: none;"><i
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
    <!-- End Simple Classic Progress Wizard -->

@endsection