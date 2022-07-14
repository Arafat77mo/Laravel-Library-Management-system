@extends('user.layout')
@section('content')

<div class ="container text-center ">
<div class="row col ">
@foreach ($data as $book)

<div class="card col-4 m-1 " style="width: 18rem;">
    <a href=""><img src="https://fakeimg.pl/350x200/ff0000,128/000,255" class="card-img-top" alt="..."> </a>
    <div class="card-body">
      <h5 class="card-title">{{$book['title']}}</h5>

      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

         <div class="row justify-content-between">
         <p style="color: maroon" class="col-5 fw-bold">rate {{$book['rate']}}  stars</p>
          <a style="font-size: 33px;text-align:center " class="add col-4 "  href="" ><i class="fa-regular fa-heart"></i></a>
        </div>

      <div class="row justify-content-between">
      <div class ="col-4 fw-bold">${{$book['price']}}</div>

      <a href="#" class="col-4 btn btn-warning ">Buy </a>
      </div>

    </div>
  </div>

  @endforeach
<div class="m-4 ms-5 aligns-items-center justify-content-center" >
    <p class="text-center">  {!!$data->links()!!}</p>
</div>

</div>

</div>
{{-- </div> --}}

@endsection
