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
            <h4>Update a Political Party</h4>
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
            <form class="form-horizontal" action="{{route('parliament.update',$parliament->id)}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH')}}
                <div class="form-group">
                    <label class="col-sm-6 col-sm-offset-3" for="parliament-name">Parliament Name</label>
                    <div class="col-sm-6 col-sm-offset-3">
                        <input class="form-control" type="text" id="parliament-name" name="name"
                               value="{{$parliament->name}}" placeholder="Enter Parliament Name...">
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
                                    <option value="{{$country}}" {{$country === $parliament->country ?"selected":""}}>{{$country}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endisset
                @isset($types_of_parliaments)
                    <div class="form-group">
                        <label class="col-sm-6 col-sm-offset-3">Parliament Type</label>
                        <div class="col-sm-6 col-sm-offset-3">
                            @foreach($types_of_parliaments as $types_of_parliament)
                                <div class="radio">
                                    <label for="{{$types_of_parliament}}">
                                        <input type="radio" id="{{$types_of_parliament}}" name="parliament_type"
                                               {{$types_of_parliament === $parliament->parliament_type ?"checked":""}}
                                               value="{{$types_of_parliament}}"> {{$types_of_parliament}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endisset
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-material">
                            <input class="js-datepicker form-control" type="text" id="date_of_inaguration"
                                   name="date_of_inaguration" value="{{$parliament->date_of_inaguration}}"
                                   data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                            <label for="example-datepicker5">Date of Inaugural Plenary Session</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-material">
                            <input class="js-datepicker form-control" type="text" id="end_of_term" name="end_of_term"
                                   value="{{$parliament->end_of_term}}" data-date-format="yyyy-mm-dd"
                                   placeholder="yyyy-mm-dd">
                            <label for="example-datepicker5">End of Parliament's Term</label>
                        </div>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button class="btn btn-app" type="submit">Update Parliament</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- .card-block -->
    </div>
@endsection