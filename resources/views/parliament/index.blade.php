@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('themes/assets/js/plugins/datatables/jquery.dataTables.min.css')}}"/>
@stop
@section('js')
    <!-- Page JS Plugins -->
    <script src="{{asset('themes/assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('themes/assets/js/pages/base_tables_datatables.js')}}"></script>

@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Parliament Committees</h4>
            <a href="{{route('parliament.create')}}">
                <button class="btn btn-app" type="button"><i class="ion-archive"></i> <span class="m-l-xs hidden-xs">Create</span>
                </button>
            </a>
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
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
            @isset($parliaments)
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>Parliament Name</th>
                        <th class="hidden-xs">Country</th>
                        <th class="hidden-xs w-20">Parliament Type</th>
                        <th class="text-center" style="width: 10%;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>
                    @foreach($parliaments as $parliament)
                        <tr>
                            <td class="text-center">{{$i}}</td>
                            <td class="font-500">{{$parliament->name}}</td>
                            <td class="hidden-xs">{{$parliament->country}}</td>
                            <td class="hidden-xs">{{$parliament->parliament_type}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{route('parliament.edit',$parliament->id)}}">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip"
                                                title="Edit Parliament"><i class="ion-edit"></i></button>
                                    </a>
                                    <form name="form{{$parliament->id}}"
                                          action="{{route('parliament.destroy', $parliament->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @method('delete')
                                        @csrf
                                        <a class="nav-link js-swal-confirm btn btn-light push mb-md-0"
                                           onclick="document.form{{$parliament->id}}.submit();"
                                           href="javascript:void(0);">
                                            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip"
                                                    title="Remove Parliament"><i class="ion-close"></i></button>
                                        </a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php $i++?>
                    @endforeach
                    </tbody>
                </table>
            @endisset
        </div>
        <!-- .card-block -->
    </div>
@endsection('content')
