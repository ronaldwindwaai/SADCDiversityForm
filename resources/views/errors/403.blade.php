@extends('layouts.errors')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))

<div class="col-sm-6 col-sm-offset-3">
    <div class="card">
        <h3 class="card-header h4">Forbidden</h3>
        <div class="card-block">
            <span>This page is forbidden..</span>
        </div>
        <!-- .card-block -->
    </div>
    <!-- .card -->
</div>
<!-- .col-md-6 -->

@endsection

