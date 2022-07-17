@extends('user.layout')
@section('content')

<div class ="container text-center ">

    <div class="row">
        



<div class="row">

@foreach ($data as $book)

<div class="card col-4 m-1 product filter " style="width: 18rem;">
    <a href=""><img src="https://fakeimg.pl/350x200/ff0000,128/000,255" class="card-img-top" alt="..."> </a>



    <a href="{{route('comment.create',$book->id)}}">
    <div class="card-body">
      <h5 class="card-title">{{$book['title']}}</h5>

      <p class="card-text">{{$book['description']}}</p>

         <div class="row justify-content-between">
         <p style="color: maroon" class="col-5 fw-bold">rate {{$book['rate']}}  stars</p>
          <a style="font-size: 33px;text-align:center " class=" col-12 "  href="" ><i class="fa-regular fa-heart fav"></i></a>
        </div>

      <div class="row justify-content-between">
      <div class ="col-4 fw-bold">${{$book['price']}}</div>

      <form action="{{ route('cart.store',$book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $book->id }}" name="id">
        <input type="hidden" value="{{$book['title']}}" name="name">
        <input type="hidden" value={{$book['price']}} name="price">
        <input type="hidden" value="1" name="quantity">
        <button class="col-6 btn btn-warning" type="submit" >Addtocart</button>
      </form>
     
      {{-- <button class="col-5 btn btn-warning " type="submit">Add to cart</button> --}}
      </div>

    </div>
  </form>
  </div>

  @endforeach
<div class="m-4 ms-5 d-flex justify-content-center" >
    <p class="text-center">  {!!$data->links()!!}</p>
</div>

</div>

</div>


@endsection


