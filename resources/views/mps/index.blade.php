@extends('layouts.app')
@section('title')
    {{trans('form.mps.list.title')}}
@stop

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
            <h4>{{trans('form.mps.list.title')}}</h4>
            <a href="{{route('mp.create')}}">
                <button class="btn btn-app" type="button"><i class="ion-archive"></i> <span class="m-l-xs hidden-xs">{{trans('form.create_button.mps')}}</span>
                </button>
            </a>
        </div>
        <div class="card-block">
            @if (session('errors'))
                <div class="alert alert-danger">
                    <p><strong>{{trans('form.snap')}}</strong> {{session('errors')->first('message')}}</p>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    <p><strong>{{trans('form.well_done')}}</strong> {{session('success')}}</p>
                </div>
        @endif
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                <tr>
                    <th class="text-center"></th>
                    <th class="hidden-xs">{{trans('form.mps.mp_name')}}</th>
                    <th class="hidden-xs w-20">{{trans('form.mps.gender')}}</th>
                    @if (isset($admin) && $admin === true)
                        <th>{{trans('form.parliament.name')}}</th>
                    @else
                        <th>{{trans('form.political_party.political_party_name')}}</th>
                    @endif
                    <th class="text-center" style="width: 10%;">{{trans('form.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>
                @foreach($mps as $mp)
                    <tr>
                        <td class="text-center">{{$i}}</td>
                        <td class="hidden-xs">{{$mp->first_name.' '.$mp->last_name}}</td>
                        <td class="hidden-xs">{{$mp->gender}}</td>
                        @if (isset($admin) && $admin === true)
                            <td class="font-500">{{$mp->parliament->name}}</td>
                        @else
                            <td class="font-500">{{$mp->politicalParty->name}}</td>
                        @endif

                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{route('mp.edit',$mp->id)}}">
                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip"
                                            title="{{trans('form.tooltip.edit')}}"><i class="ion-edit"></i></button>
                                </a>
                                <form name="form{{$mp->id}}" action="{{route('mp.destroy', $mp->id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @method('delete')
                                    @csrf
                                    <a class="nav-link js-swal-confirm btn btn-light push mb-md-0"
                                       onclick="document.form{{$mp->id}}.submit();" href="javascript:void(0);">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip"
                                                title="{{trans('form.tooltip.delete')}}"><i class="ion-close"></i></button>
                                    </a>
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
