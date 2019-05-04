@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                  @if(isset($title))<div class="card-header">{{ $title }}
                  </div>
                @else
                    <div class="card-header">@lang('Reviews')</div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (count($reviews) > 0)
                            @foreach ( $reviews as $review )
                                @include('components.review_list')
                            @endforeach
                        @endif
                      </div>
                  </div>
              </div>
          </div>
      </div>
@endsection