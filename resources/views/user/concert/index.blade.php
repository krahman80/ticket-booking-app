@extends('layouts.app')
@section('content')
@include('layouts.header')
<div class="container">
    <div class="row justify-content-center py-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Concert') }}</div>
                    <div class="card-body">
                        @include('layouts.msg')                
                        <h3 class="h3">Concert</h3>
                        <div class="card-columns py-2">
                        @forelse ($concerts as $concert)
                            <div class="card bg-white text-dark text-left">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{ route('user.concert.show',[$concert->id]) }}">{{ $concert->name }}</a></h5>
                                <p class="card-text">Artist : {{ $concert->artist }} </p>
                                <p class="card-text">
                                    <small class="text-primary">Date : {{ $concert->date }}</small><br/>
                                    <small class="text-primary">Venue : {{ $concert->venue }} </small>
                                </p>
                                </div>
                            </div>
                        @empty
                            <div class="card">
                                <div class="card-body">
                                <h5 class="card-title">No data</h5>
                                </div>
                            </div>                       
                        @endforelse
                        </div>
                            <div class="d-flex justify-content-center py-2">
                                {!! $concerts->links() !!}
                            </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
