@extends('layouts.frontend')
@section('content')
          <main class="my-8">
            <div class="container px-6 mx-auto">
                <div class="flex justify-center my-6">
                    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                      @if ($message = Session::get('success'))
                          <div class="p-4 mb-3 bg-green-400 rounded">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                      @endif
                        <h3 class="text-3xl text-bold">Cart List</h3>
                      <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                          <thead>
                            <tr class="h-12 uppercase">
                              <th class="hidden md:table-cell"></th>
                              <th class="text-left">Name</th>
                              <th class="pl-5 text-left lg:text-right lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qtd</span>
                                <span class="hidden lg:inline">Quantity</span>
                              </th>
                              <th class="hidden text-right md:table-cell"> price</th>
                              <th class="hidden text-right md:table-cell"> Remove </th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($cartItems as $item)
                            <tr>
                              <td class="hidden pb-4 md:table-cell">
                                <a href="#">
                                  <img src="https://fakeimg.pl/350x200/ff0000,128/000,255" class="w-20 rounded" alt="Thumbnail">
                                </a>
                              </td>
                              <td>
                                <a href="#">
                                  <p class="mb-2 md:ml-4">{{ $item->name }}</p>

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
                                    ${{ $item->price }}
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

                          </tbody>
                        </table>
                        <div>
                         Total: ${{ Cart::getTotal() }}
                        </div>
                        <div>
                          <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="px-6 py-2 text-red-800 bg-red-300">Remove All Cart</button>
                          </form>
                        </div>


                      </div>
                    </div>
                  </div>
            </div>
        </main>



        {!! Form::open(['route' => 'comment.store']) !!}
        <label  class='ms-3' for="comment">Comments:</label>

        <textarea class="form-control m-3 col-5" rows="5" id="comment" name="comment"></textarea>


        @foreach ($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
        @endforeach
        <button type="submit" class="btn btn-primary ms-5" >Submit</button>

        {!! Form::close() !!}


        <h5 class="card-title mx-4 m-4">{{'comment'}}</h5>

        @foreach($users as $user)
        @endforeach
        @foreach($comments as $comment)
        <div class="card m-5" >


          {{-- <h5 class="card-title mx-4 m-4">{{$user['name']}} : {{$user['created_at']}}</h5>  --}}
          <h5 class="card-title mx-4 m-4">{{$comment->user->name}} : {{$comment->user->created_at}}</h5>


        <h6 class="card-subtitle mb-2 text-muted m-5">{{$comment['comment']}}</h6>



        {!! Form::open(['route' => ['comment.destroy',$comment->user_id],'method' => 'delete']) !!}

        {!! Form::open(['route' => ['comment.destroy',$comment->id],'method' => 'delete']) !!}
          <button type="submit" class="btn btn-danger">Delete</button>
          {!! Form::close() !!}
        </div>
        @endforeach




        @endsection


        {{-- @section('comment')
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

         --}}
    {{-- @endsection --}}
