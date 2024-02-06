@extends('layouts.dashboard')

@section('header-isi')
    <h1 class="m-0">Tabel {{ $title }}</h1>
@endsection

@section('isi')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    @yield('tambah-data')
                </div>
                <div class="col">
                </div>
            </div>
        </div>
        <div class="card-body p-0">
          @yield('tabel')
        </div>
    </div>
@endsection
