<div class="col-md" style="padding-top: 20px;">
    <div class="card">
        <div class="card-header"><a href="{{ url('movie', $review->movie->id) }}">{{ $review->movie->name }}</a></div>
        <div class="card-body">
            <p>{{ $review->review_text }}</p>
            <p>@lang('Algorithm Rated as'): <b>
                @if($review->final_rating == 1)
                    @lang('Positive')
                @elseif($review->final_rating == 0)
                    @lang('Negative')
                @else 
                    @lang('Inconclusive')
                @endif
                </b>
            </p>
            <p>@lang('Added'): {{ $review->formatTime() }}</p>
        </div>
    </div>
</div>