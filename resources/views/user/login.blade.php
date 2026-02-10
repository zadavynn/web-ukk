@extends('layouts.app-user')
@section('title', 'Login')
@section('content')
    <div class="container py-5">
        <div class="col-12 col-sm-10 col-md-8 col-lg-5 m-auto my-5 py-5">
            <div class="card shadow border-0 rounded-4 mb-5">
                <div class="card-header bg-secondary bg-gradient text-white text-center rounded-top-4">
                    <h4 class="mb-0 fw-semibold">
                        <i class="bi bi-person-circle me-2"></i> Login
                    </h4>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div id="alert-error" class="alert alert-danger d-flex align-items-center" role="alert">
                            <i class="bi bi-exclamation-circle-fill me-2"></i>
                            <div>{{ $errors->first() }}</div>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('proses') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold">Username</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Masukkan username" required autofocus>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Masukkan password" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-secondary w-100 rounded-3 mt-3">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
