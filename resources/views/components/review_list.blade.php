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
            {!! Form::open(array('url' => '/evaluate', 'method' => 'post')) !!}
                {{ csrf_field() }}
                {{ Form::hidden('review', isset($review) ? $review->id : NULL, array('class' => 'form-control')) }}
                {{ Form::hidden('initial_rating', isset($review) ? $review->raw_rating : NULL, array('class' => 'form-control')) }}
                {!! Form::button('Accurate Prediction', array('class' => 'form-control buttons', 'type'=>'submit', 'value'=> '1', 'name' => 'user_rating')) !!}
                {!! Form::button('Inaccurate Prediction', array('class' => 'form-control buttons', 'type'=>'submit', 'value'=> '0', 'name' => 'user_rating')) !!}
            {!! Form::close() !!}
            @if(Auth::user())
                @if($review->user_id == Auth::user()->id)
                    <button onclick="window.location.href='{!! route('reviews.edit', $review->id)  !!}';" class="form-control buttons" style="margin-top: 10px;">
                        <i class="fa fa-plus"></i> @lang('Edit Review')
                    </button>
                    {!! Form::open(array('url' => '/reviews/delete', 'method' => 'delete', 'class'=>'delete')) !!}
                        {{ Form::hidden('review', isset($review) ? $review->id : NULL, array('class' => 'form-control')) }}
                        {{ Form::hidden('user_id', isset($review) ? Auth::user()->id : NULL, array('class' => 'form-control')) }}
                        {!! Form::button('Delete', array('class' => 'form-control', 'type'=>'submit', 'name' => 'submit')) !!}
                    {!! Form::close() !!}
                @endif
            @endif
        </div>
    </div>
</div>