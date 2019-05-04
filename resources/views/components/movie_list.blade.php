@if (isset($movies))
    @foreach ($movies as $movie)
    <div class="col-md" style="padding-bottom: 20px;">
        <div class="card">
            <div class="card-header"><a href="{{ url('movie', $movie['id']) }}">{{ $movie->name }}</a></div>
            <div class="card-body">
                <a href="{{ url('movie', $movie['id']) }}">{{$movie->omdb_id}}</a>
            </div>
        </div>
    </div>
    @endforeach
@endif