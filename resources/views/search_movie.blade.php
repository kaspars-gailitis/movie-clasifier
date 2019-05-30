@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(isset($title))<div class="card-header">{{ $title }}</div>
                    @else<div class="card-header">@lang('movies')</div>
                    @endif
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="get" action="">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="input-group stylish-input-group" style="padding-bottom: 30px;">
                                <input type="text" id="txtSearch" name="txtSearch" class="form-control"  placeholder="Search..." >
                            </div>
                        </form>
                            <iframe src="giphy.gif" 
                                    width="256" height="256" 
                                    frameBorder="0" id="loading-image" 
                                    style="margin-left: 30%; position: relative;" 
                                    allowFullScreen></iframe>
                        <div id="result">
                        </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
      <script>
          $(document).ready(function(){
            $('#loading-image').hide();
            $('#txtSearch').on('keyup', function(){
                if($(this).val().length > 4) {
                    $('#result').children().remove();
                    if (typeof request != "undefined") {
                        request.abort();
                    }
                    var text = $('#txtSearch').val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                            .attr('content')
                        }
                    });
                    $('#loading-image').show();
                    request = $.ajax({
                        type:"GET",
                        url: 'search',
                        data: {text: $('#txtSearch').val()},
                        success: function(response) {
                            $('#result').append(response.html);
                            $('#loading-image').hide();
                        }
                    });
                }
            });
        });
</script>
@endsection