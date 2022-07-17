@extends('memory.nav')
@section('content')

    <div class="container d-flex align-items-center justify-content-center ">
    <div class="row  ">
        <div >
        <form action="" method="POST" class ="container text-center " style="margin-top:50px">
            @csrf
            <input type="text" name="q" id="q">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <div class ="container text-center " style="margin-top:200px">
        <div class="row col ">
        @foreach($books as $book)
        <div class="card col-4 m-1 " style="width: 18rem; ">
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

      <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $book->id }}" name="id">
        <input type="hidden" value="{{$book['title']}}" name="name">
        <input type="hidden" value={{$book['price']}} name="price">
        <input type="hidden" value="1" name="quantity">
        <button class="col-6 btn btn-warning" type="submit" >Addtocart</button>
      </form>      </div>

    </div>
  </div>

        @endforeach

        <div class="m-4 ms-5 d-flex justify-content-center" >
            <p class="text-center">  {!!$books->links()!!}</p>
        </div>



</div>
</div>

 </div>





@endsection



