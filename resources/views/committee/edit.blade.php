@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header bg-green bg-inverse">
            <h4>Create a Committee</h4>
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

            <form class="form-horizontal" action="{{route('committee.update',$committee->id)}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH')}}
                <div class="form-group">
                    <label class="col-xs-12" for="committee-name">Committee Name</label>
                    <div class="col-xs-12">
                        <input class="form-control" type="text" id="committee-name" name="name"
                               value="{{$committee->name}}" placeholder="Enter Committee Name...">
                    </div>
                </div>

                <div class="form-group m-b-0">
                    <div class="col-xs-12">
                        <button class="btn btn-app" type="submit">Update Committee</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- .card-block -->
    </div>
    <!-- .card -->
@endsection
