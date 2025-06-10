@extends('layouts.dashboard')

@section('title', 'Dashboard | Income Report')
@section('header', 'Laporan Pendapatan')

@section('content')
    <a href="{{ route('order_histories.index') }}" class="btn btn-primary me-3 mb-3">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="alert alert-info d-flex align-items-center mb-0 flex-grow-1" role="alert">
            <i class="bi bi-bar-chart-line-fill me-2 fs-4"></i>
            <div>
                Laporan pendapatan bulan {{ \Carbon\Carbon::create()->locale('id')->month($month)->translatedFormat('F') }}
                tahun {{ $year }}.
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title mb-3">Pemasukan Bulan
                {{ \Carbon\Carbon::create()->locale('id')->month($month)->translatedFormat('F') }} Tahun {{ $year }}
            </h5>
            <h2 class="text-success">Rp {{ number_format($income, 0, ',', '.') }}</h2>
            <a href="{{ route('income.report.export', ['month' => $month, 'year' => $year]) }}"
                class="btn btn-success mt-3">
                <i class="bi bi-file-earmark-excel"></i> Download Excel
            </a>
        </div>
    </div>
@endsection
