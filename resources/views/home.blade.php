@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              @if(isset($title))<div class="card-header">{{ $title }}
              </div>
            @else
                <div class="card-header">@lang('my movies')
                </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br><br>
                    @if (count($movies) > 0)
                      @foreach ($movies as $movie)
                        <div class = "col-md-3" style="padding-bottom: 20px;">
                          <div class="card">
                            <div class="card-header"><a href="{{ url('show', $movie['id']) }}">{{ $movie->name }}</a></div>
                            <div class="card-body">
                            <a href="{{ url('show', $movie['id']) }}">{{$movie->omdb_id}}</a>
                            </div>
                      </div>
                      </div>
                        @endforeach
                    @endif
                  </div>
              </div>
          </div>
      </div>
  </div>
@if(isset($title))
  <br>
  <div class = "text-right">
    <div class = "container">
    <div class="col-md-2 col-md-offset-8">
    <form action="/delete/cluster/{{ $cluster_id }}" method="POST">
      {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="btn btn-default">
      <i class="fa fa-plus"></i>@lang('delete')
    </button>
</form>
</div>
</div>
</div>
@endif

@endsection
