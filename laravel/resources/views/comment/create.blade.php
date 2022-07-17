@extends('memory.nav')

@section('cooment')



{{-- @foreach ($books as $item)
<tr>
  <td class="hidden pb-4 md:table-cell">
    <a href="#">
      <img src="https://fakeimg.pl/350x200/ff0000,128/000,255" class="w-20 rounded" alt="Thumbnail">
    </a>
  </td>
  <td>
    <a href="#">
      <p class="mb-2 md:ml-4">{{ $item->book->name }}</p>
      
    </a>
  </td>
  <td class="justify-center mt-6 md:justify-end md:flex">
    <div class="h-10 w-28">
      <div class="relative flex flex-row w-full h-8">
        
        <form action="{{ route('cart.update') }}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{ $item->id}}" >
        <input type="number" name="quantity" value="{{ $item->quantity }}" 
        class="w-6 text-center bg-gray-300" />
        <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500">update</button>
        </form>
      </div>
    </div>
  </td>
  <td class="hidden text-right md:table-cell">
    <span class="text-sm font-medium lg:text-base">
        ${{ $item->book->price }}
    </span>
  </td>
  <td class="hidden text-right md:table-cell">
    <form action="{{ route('cart.remove') }}" method="POST">
      @csrf
      <input type="hidden" value="{{ $item->id }}" name="id">
      <button class="px-4 py-2 text-white bg-red-600">x</button>
  </form>
    
  </td>
</tr>
@endforeach
 --}}

{!! Form::open(['route' => 'comment.store']) !!}
<label  class='ms-3' for="comment">Comments:</label>

<textarea class="form-control m-3" rows="5" id="comment" name="comment"></textarea>


@foreach ($errors->all() as $error)
<li class="text-danger">{{ $error }}</li>
@endforeach
<button type="submit" class="btn btn-primary ms-5" >Submit</button>

{!! Form::close() !!}


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
@else <H1 class="mx-4" > you comment  can not publsh</H1> 
@endif 


@endsection


@section('comment')
  <h5 class="card-title mx-4">{{'comment'}}</h5> 
    @if (isset($comments))
    
@foreach($comments as $comment) 
<div class="card m-5"  >

 


   <h6 class="card-subtitle mb-2 text-muted">{{$comment['comment']}}</h6> 


   {!! Form::open(['route' => ['comment.destroy',$comment->user_id],'method' => 'delete']) !!}
      <button type="submit" class="btn btn-danger">Delete</button>
      {!! Form::close() !!} 
 </div> 
   @endforeach  
    @else <H1 class="mx-4" > you comment  can not publsh</H1> 
  @endif 
 
  


@endsection