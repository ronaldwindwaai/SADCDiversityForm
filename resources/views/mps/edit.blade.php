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

@stop
@section('content')

    <div class="card">
        <div class="card-header bg-green bg-inverse">
            <h4>Update Member of Parliament</h4>
            <ul class="card-actions">
                <li>
                    <button type="button" data-toggle="card-action" data-action="refresh_toggle"
                            data-action-mode="demo"><i class="ion-refresh"></i></button>
                </li>
                <li>
                    <button type="button" data-toggle="card-action" data-action="content_toggle"><i
                                class="ion-chevron-down"></i></button>
                </li>
            </ul>
        </div>
        <div class="card-block">
            @if (session('errors'))
                <div class="alert alert-danger">
                    <p><strong>Oh snap!</strong> {{session('errors')}}</p>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    <p><strong>Well done!</strong> {{session('success')}}</p>
                </div>
            @endif
            <form class="form-horizontal" action="{{route('mp.update',$mp->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH')}}
                <div class="form-group">
                    <label class="col-sm-6 col-sm-offset-3" for="first-name">First Name</label>
                    <div class="col-sm-6 col-sm-offset-3">
                        <input class="form-control" type="text" id="first-name" name="first_name"
                               value="{{$mp->first_name}}" placeholder="Enter First Name...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 col-sm-offset-3" for="last-name">Last Name</label>
                    <div class="col-sm-6 col-sm-offset-3">
                        <input class="form-control" type="text" id="last-name" name="last_name"
                               value="{{$mp->last_name}}" placeholder="Enter Last Name...">
                    </div>
                </div>
                @isset($genders)
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender"
                                    name="gender" size="1">
                                <option value="">Please select Gender</option>
                                @foreach($genders as $gender)
                                    <option value="{{$gender}}" {{$gender === $mp->gender ?"selected":""}}>{{$gender}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endisset
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-material">
                            <input class="js-datepicker form-control" type="text" id="date_of_birth"
                                   name="date_of_birth" data-date-format="yyyy-mm-dd" value="{{$mp->date_of_birth}}" placeholder="yyyy-mm-dd">
                            <label for="date_of_birth">Date of Birth</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 col-sm-offset-3">is this a Elected as reserved Political Position</label>
                    <div class="col-sm-6 col-sm-offset-3">

                        <div class="radio">
                            <label for="elected_reserved">
                                <input type="radio" id="elected_reserved" name="erpp"
                                       value="Yes" {{"Yes" === $mp->erpp ?"checked":""}}> Yes
                            </label>
                            <label for="elected_reserved">
                                <input type="radio" id="elected_reserved" name="erpp"
                                       value="No" {{"No" === $mp->erpp ?"checked":""}}> No
                            </label>
                        </div>
                    </div>
                </div>
                @isset($reserved_political_position_descriptions)
                    <div class="form-group">
                        <label class="col-sm-6 col-sm-offset-3" for="reserved_political_position_descriptions">Reason
                            for Reserved Political Position</label>
                        <div class="col-sm-6 col-sm-offset-3">
                            <select class="form-control" id="reserved_political_position_descriptions"
                                    name="eppd" size="1">
                                <option value="">Select Reason for Reserved Political Position</option>
                                @foreach($reserved_political_position_descriptions as $reserved_political_position_description)
                                    <option value="{{$reserved_political_position_description}}" {{$reserved_political_position_description === $mp->eppd ?"selected":""}}>{{$reserved_political_position_description}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endisset
                @isset($political_parties)
                    <div class="form-group">
                        <label class="col-sm-6 col-sm-offset-3" for="political_party">Political Party</label>
                        <div class="col-sm-6 col-sm-offset-3">
                            <select class="form-control" id="political_party" name="political_party_id">
                                name="political_party_id" size="1">
                                <option value="">Select Political Party</option>
                                @foreach($political_parties as $political_party)
                                    <option value="{{$political_party->id}}" {{$political_party->id === $mp->political_party_id ?"selected":""}}>{{$political_party->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endisset

                @isset($committees)
                    <div class="form-group">
                        <label class="col-sm-6 col-sm-offset-3" for="committee_id">Committee(s)</label>
                        <div class="col-sm-6 col-sm-offset-3">
                            <select class="js-select2 form-control" id="committee_id" name="committee_id[]"
                                    style="width: 100%;" data-placeholder="Choose the Committee(s)" multiple>
                                <option></option>
                                <!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                @foreach($committees as $committee)
                                    <option value="{{$committee->id}}" {{in_array($committee->id,$mp->committee_id)?"selected":""}}>{{$committee->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endisset
                <div class="form-group m-b-0">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button class="btn btn-app" type="submit">Update Member of Parliament</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- .card-block -->
    </div>
    <!-- .card -->

@endsection
