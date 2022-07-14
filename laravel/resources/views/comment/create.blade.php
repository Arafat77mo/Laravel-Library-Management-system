@extends('layouts.app')

@section('cooment')



{!! Form::open(['route' => 'comment.store']) !!}
<label for="comment">Comments:</label>
<textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
<button type="submit" class="btn btn-primary" >Submit</button>

{!! Form::close() !!}
@endsection


@section('comment')
<div class="card" >
    {{-- @if (isset($comment)) --}}

@foreach($data as $comment)




{{-- <h6 class="card-subtitle mb-2 text-muted">{{$data['comment']}}</h6> --}}

<h5 class="card-title">{{$comment->comment}}</h5>

{{-- {!! Form::open(['route' => ['comment.destroy',$comments->user_id],'method' => 'delete']) !!}
      <button type="submit" class="btn btn-danger">Delete</button>
      {!! Form::close() !!} --}}

@endforeach
  {{-- @endif --}}
</div>


@endsection