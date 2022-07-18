@extends('memory.nav')

@section('cooment')





{!! Form::open(['route' => 'comment.store']) !!}
<label  class='ms-3' for="comment">Comments:</label>

<textarea class="form-control m-3" rows="5" id="comment" name="comment"></textarea>


@foreach ($errors->all() as $error)
<li class="text-danger">{{ $error }}</li>
@endforeach
<button type="submit" class="btn btn-primary ms-5" >Submit</button>

{!! Form::close() !!}

<h5 class="card-title mx-4">{{'comment'}}</h5> 
{{-- @if (isset($comments)) --}}

<h5 class="card-title mx-4">{{'comment'}}</h5>
@if (isset($comments))


@foreach($comments as $comment)
<div class="card m-5"  >




<h6 class="card-subtitle mb-2 text-muted m-5">{{$comment['comment']}}</h6> 



 {!! Form::open(['route' => ['comment.destroy',$comment->user_id],'method' => 'delete']) !!}
  <button type="submit" class="btn btn-danger">Delete</button>

  {!! Form::close() !!} 
</div> 
@endforeach   
{{-- @else <H1 class="mx-4" > you comment  can not publsh</H1>  --}}
{{-- @endif  --}}

  {!! Form::close() !!}
</div>
@endforeach
@else <H1 class="mx-4" > you comment  can not publsh</H1>
@endif



@endsection



