@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('New Review')</div>
                <div class="card-body">
                    @include('components.review_form', ['review_from' => 'new'])
                </div>
            </div>
        </div>
    </div>
@endsection
