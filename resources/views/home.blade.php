@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}

    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </a>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @if(Auth::check())

            @if(Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin') }}">Halaman Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('author') }}">Halaman author</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('reader') }}">Halaman reader</a>
                </li>
            @endif

            @if(Auth::user()->role == 'author')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('author') }}">Halaman author</a>
                </li>
            @endif

            @if(Auth::user()->role == 'reader')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('reader') }}">Halaman reader</a>
                </li>
            @endif

        @endif
    </ul>

    {{-- <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </a>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{url('admin')}}">Halaman Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('author')}}">Halaman author</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('reader')}}">Halaman reader</a>
        </li>
    </ul> --}}
</div>
@endsection
