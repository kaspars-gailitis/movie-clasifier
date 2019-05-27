@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if(isset($title))<div class="card-header">{{ $title }}
              </div>
            @else
                <div class="card-header">@lang('administrator dashboard')</div>
            @endif
                <div class="card-body center">
                    <h3 class="total">Performance based on user ratings: {{ ((float)$positiveCount/(float)($positiveCount+$negativeCount)) * 100}}%</h3>
                    <p>Total <span class="negative-bg">Negative</span>: {{$negativeCount}} </p>
                    <p>Total <span class="positive-bg">Positive</span>: {{$positiveCount}} </p>
                    <a class="btn btn-primary" href="{{ route('admin.reviews') }}">Reviews List</a>
                    <a class="btn btn-primary" href="{{ route('admin.users') }}">Users List</a>
                    <a class="btn btn-primary" href="{{ route('admin.algorithm') }}">Algorithm Options</a>
                </div>
              </div>
          </div>
      </div>
  </div>
@endsection
