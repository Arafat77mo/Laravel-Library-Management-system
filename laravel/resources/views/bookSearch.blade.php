@extends('memory.nav')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4 me-5">
    <p class="pt-2">ordered by </p>

<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      rate
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{route('home')}}">All rates</a></li>

      

    </ul>
  </div> -->

<!-- 
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      latest
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{route('home')}}">All rates</a></li>

      <li><a class="dropdown-item" href="#">Another action</a></li>
      <li><a class="dropdown-item" href="#">Something else here</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">Separated link</a></li>
    </ul>
  </div>
    </div> -->
    <div class="container">
    <div class="row">
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
</div>
</div>
        </div>
        
    </div>
</div>

</body>
</html>
@endsection



