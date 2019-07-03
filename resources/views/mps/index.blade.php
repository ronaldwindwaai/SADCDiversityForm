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
            <h4>Member of Parliament</h4>
            <a href="{{route('mp.create')}}"><button class="btn btn-app" type="button"><i class="ion-archive"></i> <span class="m-l-xs hidden-xs">Create</span></button></a>
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
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                <tr>
                    <th class="text-center"></th>
                    <th>Deputy ID</th>
                    <th class="hidden-xs">Member of Parliament Name</th>
                    <th class="hidden-xs w-20">Gender</th>
                    <th class="text-center" style="width: 10%;">Actions</th>
                </tr>
                </thead>
                <tbody>
               <?php $i=1;?>
                @foreach($mps as $mp)
                <tr>
                    <td class="text-center">{{$i}}</td>
                    <td class="font-500">{{$mp->deputy_id}}</td>
                    <td class="hidden-xs">{{$mp->first_name.' '.$mp->last_name}}</td>
                    <td class="hidden-xs">{{$mp->gender}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{route('mp.edit',$mp->id)}}"> <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Member of Parliament"><i class="ion-edit"></i></button></a>
                            <form name="form{{$mp->id}}"action="{{route('mp.destroy', $mp->id)}}" method="post" enctype="multipart/form-data">
                                @method('delete')
                                @csrf
                                <a class="nav-link js-swal-confirm btn btn-light push mb-md-0" onclick="document.form{{$mp->id}}.submit();" href="javascript:void(0);"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Member of Parliament"><i class="ion-close"></i></button></a>
                            </form>
                        </div>
                    </td>
                </tr>
                    <?php $i++?>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- .card-block -->
    </div>
@endsection('content')
