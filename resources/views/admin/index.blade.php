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
                    <a class="btn btn-primary" href="{{ route('reviews.list') }}">Reviews List</a><br><br>
                    <a class="btn btn-primary" href="{{ route('admin.users') }}">Users List</a><br><br>
                    <a class="btn btn-primary" href="{{ route('admin.algorithm') }}">Algorithm Options</a><br><br>
                </div>
              </div>
          </div>
      </div>
  </div>
@endsection
