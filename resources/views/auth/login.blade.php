@extends('layouts.app')

@section('content')
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-75 shadow rounded overflow-hidden">
            <div class="col-md-6 text-white p-5" style="background-color: #4E84BA">
                <h4 class="mb-4 fw-bold text-center">Login</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username"
                            class="form-control rounded-pill bg-secondary bg-opacity-50 text-white @error('username') is-invalid @enderror"
                            value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password"
                            class="form-control rounded-pill bg-secondary bg-opacity-50 text-white @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('register') }}" class="text-white">Registrasi</a>
                        <button type="submit" class="btn btn-secondary text-white px-4 rounded-pill">Login</button>
                    </div>
                </form>
            </div>

            <div class="col-md-6 bg-light p-3 text-center d-flex flex-column justify-content-center">
                <img src="{{ asset('images/login-banner.png') }}" class="img-fluid rounded" alt="Banner SWA">
            </div>
        </div>
    </div>
@endsection
