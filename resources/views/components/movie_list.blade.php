@if (isset($movies))
    @foreach ($movies as $movie)
    <div class="col-md" style="padding-bottom: 20px;">
        <div class="card">
            <div class="card-header"><a href="{{ url('movie', $movie['id']) }}">{{ $movie->name }}</a></div>
            <div class="card-body">
                <p class="card-text">@lang('Movie Rating'): {{ round($movie->rating * 100 ).'%' }}</p>
            </div>
        </div>
    </div>
    @endforeach
@endif