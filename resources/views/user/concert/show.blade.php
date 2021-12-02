@extends('layouts.app')
@section('content')
@include('layouts.header')
<div class="container">
    <div class="row justify-content-center py-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Concert Name : <span class="font-weight-bold">{{ $concert->name }}<span></div>
                    <div class="card-body">
                        <p class="card-text">Artist : <span class="font-weight-bold">{{ $concert->artist }} </span><br/>
                            Venue : <span class="text-primary text-info font-weight-bold">{{ $concert->venue }}</span><br/>
                        Date : <span class="font-weight-bold">{{ $concert->date }}</span> <br/>
                        Available Seat : <span class="font-weight-bold">{{ $concert->seat}}</span>
                        </p>
                        <hr/>
                        <div class="row"><div class="col-md-4">
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" value="1" min="1" max="3" id="qty" data-id="{{ $concert->ticket->id }}" data-slug="{{ $concert->ticket->slug }}" data-price="{{ $concert->ticket->price }}">
                            <div class="input-group-append">
                              <button class="btn btn-primary" type="button" id="addToCartBtn">Add to Cart</button>
                            </div>
                        </div>    
                        </div></div>
                        
                        

                    </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('javascript')
    <script>
        const addToCartBtn = document.getElementById('addToCartBtn');
        addToCartBtn.addEventListener('click', (e) => {
            const ticket = document.getElementById('qty');
            // console.log(ticket.value);
            // console.log(ticket.getAttribute('data-id'));
            let cart = new Array();
            cart.push({'id':ticket.getAttribute('data-id'), 'qty': ticket.value});
            console.log(cart);
        });
        
    </script>
@endsection
