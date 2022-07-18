 @extends('memory.nav')

@section('cooment')



<div>@foreach ($book as $book)
@endforeach
<div class="card col-4 m-1 product filter " style="width: 18rem;">
  <a href="#" ><img src="https://fakeimg.pl/350x200/ff0000,128/000,255" class="card-img-top" alt="..."> </a>


@if($book->id)

  <div class="card-body">
    <h5 class="card-title">{{$book['title']}}</h5>

    <p class="card-text">{{$book['description']}}</p>


       <div class="row justify-content-between">
       <p style="color: maroon" class="col-5 fw-bold">rate {{$book['rate']}} stars</p>
        <a style="font-size: 33px;text-align:center " class=" col-12 "  href="" ><i class="fa-regular fa-heart fav"></i></a>
      </div>

    <div class="row justify-content-between">
    <div class ="col-4 fw-bold">${{$book['price']}}</div>

    <form action="{{ route('cart.store',$book->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="{{ $book->id }}" name="id">
      <input type="hidden" value="{{$book['title']}}" name="name">
      <input type="hidden" value="{{$book['price']}}" name="price">
      <input type="hidden" value="1" name="quantity">
      <button class="col-6 btn btn-warning" type="submit" >Addtocart</button>
    </form>
  </div>
</div>
</div>
@endif
{!! Form::open(['route' => 'comment.store']) !!}
<label  class='ms-3' for="comment">Comments:</label>

<textarea class="form-control m-3 col-5" rows="5" id="comment" name="comment"></textarea>


@foreach ($errors->all() as $error)
<li class="text-danger">{{ $error }}</li>
@endforeach
<button type="submit" class="btn btn-primary ms-5" >Submit</button>

{!! Form::close() !!}


<h5 class="card-title mx-4 m-4">{{'comment'}}</h5>


@foreach($comments as $comment)
<div class="card m-5" >


  {{-- <h5 class="card-title mx-4 m-4">{{$user['name']}} : {{$user['created_at']}}</h5>  --}}
  <h5 class="card-title mx-4 m-4">{{$comment->user->name}} : {{$comment->user->created_at}}</h5>


<h6 class="card-subtitle mb-2 text-muted m-5">{{$comment['comment']}}</h6>


{!! Form::open(['route' => ['comment.destroy',$comment->id],'method' => 'delete']) !!}
  <button type="submit" class="btn btn-danger">Delete</button>
  {!! Form::close() !!}  
</div> 
@endforeach  
@endsection


