@extends('layouts.app')
@section('title')
    {{trans('form.mps.edit.title')}}
@stop
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
            <h4>{{trans('form.mps.edit.title')}}</h4>
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
                    <p><strong>{{trans('form.snap')}}</strong> {{session('errors')}}</p>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    <p><strong>{{trans('form.well_done')}}</strong> {{session('success')}}</p>
                </div>
            @endif
            <form class="form-horizontal" action="{{route('mp.update',$mp->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH')}}
                <div class="form-group">
                    <label class="col-sm-6 col-sm-offset-3" for="first-name">{{trans('form.mps.first_name')}}</label>
                    <div class="col-sm-6 col-sm-offset-3">
                        <input class="form-control" type="text" id="first-name" name="first_name"
                               value="{{$mp->first_name}}" placeholder="{{trans('form.mps.place_holder.first_name')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 col-sm-offset-3" for="last-name">{{trans('form.mps.last_name')}}</label>
                    <div class="col-sm-6 col-sm-offset-3">
                        <input class="form-control" type="text" id="last-name" name="last_name"
                               value="{{$mp->last_name}}" placeholder="{{trans('form.mps.place_holder.last_name')}}">
                    </div>
                </div>
                @isset($genders)
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender"
                                    name="gender" size="1">
                                <option value="">{{trans('form.mps.place_holder.gender')}}</option>
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
                            <label for="date_of_birth">{{trans('form.mps.dob')}}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 col-sm-offset-3">{{trans('form.mps.erpp')}}</label>
                    <div class="col-sm-6 col-sm-offset-3">

                        <div class="radio">
                            <label for="elected_reserved">
                                <input type="radio" id="elected_reserved" name="erpp"
                                       onchange="show_reasons();"
                                       value="Yes" {{"Yes" === $mp->erpp ?"checked":""}}> {{trans('form.mps.yes')}}
                            </label>
                            <label for="elected_reserved">
                                <input type="radio" id="elected_reserved" name="erpp"
                                       onchange="show_reasons();"
                                       value="No" {{"No" === $mp->erpp ?"checked":""}}> {{trans('form.mps.no')}}
                            </label>
                        </div>
                    </div>
                </div>
                @isset($reserved_political_position_descriptions)
                    <div class="form-group" id="reasons" style="display: none">
                        <label class="col-sm-6 col-sm-offset-3" for="reserved_political_position_descriptions">{{trans('form.mps.rpp')}}</label>
                        <div class="col-sm-6 col-sm-offset-3">
                            <select class="form-control" id="reserved_political_position_descriptions"
                                    name="eppd" size="1">
                                <option value="">{{trans('form.mps.place_holder.rpp')}}</option>
                                @foreach($reserved_political_position_descriptions as $reserved_political_position_description)
                                    <option value="{{$reserved_political_position_description}}" {{$reserved_political_position_description === $mp->eppd ?"selected":""}}>{{$reserved_political_position_description}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endisset
                @isset($political_parties)
                    <div class="form-group">
                        <label class="col-sm-6 col-sm-offset-3" for="political_party">{{trans('form.political_party.political_party_name')}}</label>
                        <div class="col-sm-6 col-sm-offset-3">
                            <select class="form-control" id="political_party" name="political_party_id" size="1">
                                <option value="">{{trans('form.mps.place_holder.political_party')}}</option>
                                @foreach($political_parties as $political_party)
                                    <option value="{{$political_party->id}}" {{$political_party->id === $mp->political_party_id ?"selected":""}}>{{$political_party->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endisset

                @isset($committees)
                    <div class="form-group">
                        <label class="col-sm-6 col-sm-offset-3" for="committee_id">{{trans('form.committee.committee_name')}}</label>
                        <div class="col-sm-6 col-sm-offset-3">
                            <select class="js-select2 form-control" id="committee_id" name="committee_id[]"
                                    style="width: 100%;" data-placeholder="{{trans('form.mps.place_holder.committees')}}" multiple>
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
                        <button class="btn btn-app" type="submit">{{trans('form.mps.edit.form.submit')}}</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- .card-block -->
    </div>
    <!-- .card -->
    <script>
        function show_reasons() {
            var elected_reserved = document.getElementById("elected_reserved")
            var reasons = document.getElementById("reasons");


            if (elected_reserved.checked == true) {
                reasons.style.display = 'block';
            } else {
                reasons.style.display = 'none';
            }
        }
        show_reasons();
    </script>
@endsection
