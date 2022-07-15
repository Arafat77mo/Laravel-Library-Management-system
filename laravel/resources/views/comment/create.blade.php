@extends('layouts.app')


@section('cooment')






{!! Form::open(['route' => 'comment.store']) !!}
<label  class='ms-3' for="comment">Comments:</label>

<textarea class="form-control m-3" rows="5" id="comment" name="comment"></textarea>


@foreach ($errors->all() as $error)
<li class="text-danger">{{ $error }}</li>
@endforeach
<button type="submit" class="btn btn-primary ms-5" >Submit</button>

{!! Form::close() !!}



@endsection


@section('comment')

    @if (isset($comments))

@foreach($comments as $comment) 
<div class="card m-5"  >

   {{-- <h5 class="card-title">{{$comment->user->name}}</h5>  --}}


   <h6 class="card-subtitle mb-2 text-muted">{{$comment['comment']}}</h6> 


   {!! Form::open(['route' => ['comment.destroy',$comment->user_id],'method' => 'delete']) !!}
      <button type="submit" class="btn btn-danger">Delete</button>
      {!! Form::close() !!} 
 </div> 
   @endforeach   
  @endif 
 
  


@endsection