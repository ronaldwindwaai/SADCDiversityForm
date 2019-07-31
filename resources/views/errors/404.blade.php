@extends('layouts.errors')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
<div class="col-sm-6 col-sm-offset-3">
    <div class="card">
        <h3 class="card-header h4">Page not found</h3>
        <div class="card-block">
            <span>This page can’t be found..</span>
        </div>
        <!-- .card-block -->
    </div>
    <!-- .card -->
</div>
<!-- .col-md-6 -->

@endsection

