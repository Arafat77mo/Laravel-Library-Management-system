@extends('user.layout')
@section('content')

<div class ="container text-center ">

<div class="row col ">
@foreach ($catbookdata as $mybook)
<div class="card col-4 m-1 product filter " style="width: 18rem;">
    <a href=""><img src="https://fakeimg.pl/350x200/ff0000,128/000,255"  class="card-img-top" alt="..."> </a>
    <div class="card-body">
      <h5 class="card-title">{{$mybook['title']}}</h5>

      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

         <div class="row justify-content-between">
         <p style="color: maroon" class="col-5 fw-bold">rate {{$mybook['rate']}}  stars</p>
          <a style="font-size: 33px;text-align:center mt-2" class="add col-4 "  href="" ><i class="fa-regular fa-heart"></i></a>
        </div>

      <div class="row justify-content-between">
      <div class ="col-4 fw-bold">${{$mybook['price']}}</div>

      <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $mybook->id }}" name="id">
        <input type="hidden" value="{{$mybook['title']}}" name="name">
        <input type="hidden" value={{$mybook['price']}} name="price">
        <input type="hidden" value="1" name="quantity">
        <button class="col-6 btn btn-warning" type="submit" >Addtocart</button>
      </form>
      {{-- <button class="col-5 btn btn-warning " type="submit">Add to cart</button> --}}
      </div>

    </div>
  </form>
  </div>

  @endforeach
<div class="m-4 ms-5 aligns-items-center justify-content-center" >
    <p class="text-center">  {!!$catbookdata->links()!!}</p>
</div>

</div>

</div>
{{-- </div> --}}

@endsection
