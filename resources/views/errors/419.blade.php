@extends('layouts.errors')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))
<div class="col-sm-6 col-sm-offset-3">
    <div class="card">
        <h3 class="card-header h4">Page expired</h3>
        <div class="card-block">
            <span>This page has expired.</span>
        </div>
        <!-- .card-block -->
    </div>
    <!-- .card -->
</div>
<!-- .col-md-6 -->

@endsection

