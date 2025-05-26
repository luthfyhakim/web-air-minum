@extends('layouts.app')

@section('title', 'Profil User | SWA Air Minum')

@section('content')
    @include('partials.navbar')

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-body p-5">
                        <h4 class="mb-4 fw-bold">Edit Profil</h4>
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="birth_date" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="birth_date" class="form-control"
                                    value="{{ old('birth_date', $user->birth_date) }}">
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">No. Handphone (+62)</label>
                                <div class="input-group">
                                    {{-- <span class="input-group-text">+62</span> --}}
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ old('phone', $user->phone) }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea name="address" class="form-control" rows="3">{{ old('address', $user->address) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('profile.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection
