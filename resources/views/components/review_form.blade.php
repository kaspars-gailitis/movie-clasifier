@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
{!! Form::open(array('url' => '/review/store', 'method' => 'post')) !!}
{{ csrf_field() }}
@if($review_from == 'new')
    <p class="card-text">
        {!! Form::label('movie', __('Movie'))!!}
        {{ csrf_field() }}
        {{Form::text('movie', isset($review) ? $review->movie->name : NULL ,array('class' => 'form-control', 'placeholder'=>'Enter movie name', 'readonly'))}}
    </p>
    {{Form::hidden('movie', isset($review) ? $review->movie->id : NULL, array('class' => 'form-control'))}}
    {{Form::hidden('update', isset($review) ? 1 : 0, array('class' => 'form-control'))}}
    {{Form::hidden('review_id', isset($review) ? $review->id : NULL, array('class' => 'form-control'))}}
@elseif($review_from == 'movie')
    {{Form::hidden('movie', $id, array('class' => 'form-control'))}}
@endif
<p class="card-text">
{{Form::label('body', __('New Review'))}}
{{Form::textarea('body', isset($review) ? $review->review_text : NULL ,array('class' => 'form-control', 'placeholder'=>'New Review Text'))}}
</p>
<div class="text-right">
    {!! Form::button('Save', array('class' => 'form-control save', 'type'=>'submit', 'name' => 'submit')) !!}
</div>
{!! Form::close() !!}