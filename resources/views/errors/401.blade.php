@extends('layouts.errors')
@section('title', __('Unauthorized'))
@section('code', '401')
@section('message')
<div class="col-sm-6 col-sm-offset-3">
    <div class="card">
        <h3 class="card-header h4">Unauthorized access</h3>
        <div class="card-block">
            <span>This page can’t be found..</span>
        </div>
        <!-- .card-block -->
    </div>
    <!-- .card -->
</div>
<!-- .col-md-6 -->
@endsection
