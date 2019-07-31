@extends('layouts.errors')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))
<div class="col-sm-6 col-sm-offset-3">
    <div class="card">
        <h3 class="card-header h4">Server Error</h3>
        <div class="card-block">
            <span>Server error</span>
        </div>
        <!-- .card-block -->
    </div>
    <!-- .card -->
</div>
<!-- .col-md-6 -->

@endsection

