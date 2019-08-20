@extends('layouts.app')
@section('title')
    {{trans('form.political_party.list.title')}}
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
            <h4>{{trans('form.political_party.list.title')}}</h4>
            <a href="{{route('party.create')}}">
                <button class="btn btn-app" type="button"><i class="ion-archive"></i> <span class="m-l-xs hidden-xs">{{trans('form.create_button.political_party')}}</span>
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
            @isset($politcal_parties)
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>{{trans('form.political_party.political_party_name')}}</th>
                        <th class="hidden-xs">{{trans('form.political_party.political_designation')}}</th>
                        <th class="hidden-xs">{{trans('form.political_party.parliament')}}</th>
                        <th class="text-center" style="width: 10%;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>

                    @foreach($politcal_parties as $political_party)
                        <tr>
                            <td class="text-center">{{$i}}</td>
                            <td class="font-500">{{$political_party->name}}</td>
                            <td class="hidden-xs">{{$political_party->political_designation}}</td>
                            <td class="hidden-xs">{{$political_party->parliament->name}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{route('party.edit',$political_party->id)}}">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip"
                                                title="{{trans('form.tooltip.edit')}}"><i class="ion-edit"></i></button>
                                    </a>
                                    <form name="form{{$political_party->id}}"
                                          action="{{route('party.destroy', $political_party->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @method('delete')
                                        @csrf
                                        <a class="nav-link js-swal-confirm btn btn-light push mb-md-0"
                                           onclick="document.form{{$political_party->id}}.submit();"
                                           href="javascript:void(0);">
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
            @endisset
        </div>
        <!-- .card-block -->
    </div>
@endsection('content')
