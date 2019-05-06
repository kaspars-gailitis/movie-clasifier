@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 card-group">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $movie->Title}}, {{$movie->Year}}</h4>
                        <h5 class="card-text">@lang('Movie Rating'): {{ round($rating * 100 ).'%' }}</h5>
                        <br>
                        <p class="card-text">{{ $movie->Plot }}</p>
                        <p class="card-text">@lang('Genre'): {{ $movie->Genre}}</p>
                        <p class="card-text">@lang('Director'): {{ $movie->Director}}</p>
                        <p class="card-text">@lang('Length'): {{ $movie->Runtime }}</p>
                    </div>
                </div>
                <div class="card">
                <img class="card-img-top" src='{{ $movie->Poster }}' >
                </div>
            </div>
            <div class="col-md-8" style="padding-top: 20px;">
                <div class="card">
                        <div class="card-header">@lang('Reviews')</div>
                    <div class="card-body">
                        <div class="col-md">
                        @if (Auth::check())
                            @include('components.review_form', ['review_from' => 'movie'])
                        @else
                            <p class="card-text">@lang('Please') <a href="{{ route('login') }}">{{ __('Login') }}</a> @lang('To Add a Review')</p>
                        @endif
                        </div>
                        @foreach ( $reviews as $review )
                            @include('components.review_list')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection