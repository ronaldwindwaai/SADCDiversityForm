@extends('layouts.errors')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Service Unavailable'))
<div class="col-sm-6 col-sm-offset-3">
<div class="card">
    <h3 class="card-header h4">Service Unavailable</h3>
    <div class="card-block">
        <span>Service unavailable</span>
    </div>
    <!-- .card-block -->
</div>
<!-- .card -->
</div>
<!-- .col-md-6 -->

@endsection