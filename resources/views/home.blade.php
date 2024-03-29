@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('movies.list') }}">{{ __('All Movies') }}</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reviews.list') }}">{{ __('All Reviews') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reviews.edit') }}">{{ __('New Review') }}</a>
                    </li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
