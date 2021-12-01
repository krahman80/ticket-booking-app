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
                    
                    <p></p>
                    </div>
            </div>
        </div>
    </div>

</div>
@endsection

