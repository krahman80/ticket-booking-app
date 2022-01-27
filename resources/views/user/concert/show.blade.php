@extends('layouts.app')
@section('content')
@include('layouts.header')
<div class="container">
    <div class="row justify-content-center py-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Concert Name : <span class="font-weight-bold">{{ $concert->name }}<span></div>
                    <div class="card-body">
                        @include('layouts.msg')
                        <p class="card-text">Artist : <span class="font-weight-bold">{{ $concert->artist }} </span><br/>
                            Venue : <span class="text-primary text-info font-weight-bold">{{ $concert->venue }}</span><br/>
                        Date : <span class="font-weight-bold">{{ $concert->date }}</span> <br/>
                        Available Seat : <span class="font-weight-bold">{{ $concert->seat}}</span>
                        </p>
                        <hr/>
                        <div class="row"><div class="col-md-4">
                    @if ($concert->expired == 0)
                        @can('user-only', auth()->user())
                        <form action="{{ route('add.to.cart') }}" method="post">
                        @csrf
                            <input type="hidden" name="id" value="{{ $concert->id }}">
                            <input type="hidden" name="ticketId" value="{{ $ticket->id }}" >
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Add to Cart</button>
                            </div>
                        </form>
                        @endcan

                    @endif

                    </div>
                    </div>
                        
                        

                    </div>
            </div>
        </div>
    </div>

</div>
@endsection
