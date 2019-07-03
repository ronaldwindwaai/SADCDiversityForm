@extends('layouts.login')

@section('content')
    <div class="col-md-6">
        <div class="card">
            <h3 class="card-header h4">Login</h3>
            <div class="card-block">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <label class="sr-only" for="frontend_login_email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus id="frontend_login_email" placeholder="Email"/>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-app btn-block">Reset</button>
                </form>
            </div>
            <!-- .card-block -->
        </div>
        <!-- .card -->
    </div>
@endsection