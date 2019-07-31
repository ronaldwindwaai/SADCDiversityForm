@extends('layouts.errors')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))
<div class="col-sm-6 col-sm-offset-3">
    <div class="card">
        <h3 class="card-header h4">Too many requests</h3>
        <div class="card-block">
            <span>Too many requests..</span>
        </div>
        <!-- .card-block -->
    </div>
    <!-- .card -->
</div>
<!-- .col-md-6 -->

@endsection

