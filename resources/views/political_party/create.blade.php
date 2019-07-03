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
            <h4>Add a Political Party</h4>
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
                    <p><strong>Oh snap!</strong> {{session('errors')->first('message')}}</p>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    <p><strong>Well done!</strong> {{session('success')}}</p>
                </div>
            @endif
            <form class="form-horizontal" action="{{route('party.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label class="col-sm-6 col-sm-offset-3" for="parliament-name">Political Party Name</label>
                    <div class="col-sm-6 col-sm-offset-3">
                        <input class="form-control" type="text" id="parliament-name" name="name"
                               placeholder="Enter Parliament Name...">
                    </div>
                </div>
                @isset($political_designations)
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3">
                            <label for="country">Political Party Designation</label>
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
                <div class="form-group m-b-0">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button class="btn btn-app" type="submit">Add Political Party</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- .card-block -->
    </div>
    <!-- .card -->

@endsection
