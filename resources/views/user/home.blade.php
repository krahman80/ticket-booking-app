@extends('layouts.app')

@section('content')
@include('layouts.header')
<div class="container">
    
    <div class="row justify-content-center py-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @include('layouts.msg')                
                    


                        {{-- @forelse ($concerts as $concert)
                            <h4 class="h4">{{ $concert->name }}</h4>
                            <p>{{ $concert->artist }}</p>
                        @empty
                            <p>no data</p>
                        @endforelse --}}

                        <h3 class="h3">Latest Concert</h3>
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
                                {{-- <div class="d-flex justify-content-end py-2">
                                <a href="" class="badge badge-pill badge-info py-2 px-3">show</a>
                                </div> --}}
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
                        <div class="d-flex justify-content-end py-2">           
                        <a href="{{ route('user.concert.index') }}" class="badge badge-pill badge-primary py-2 px-3">More concert</a>
                        </div>
                        <hr/>
                        <h3 class="h3">Recent Booking</h3>
                        <table class="table table-sm table-striped table-bordered my-3">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Booking Code</th>
                                    <th scope="col">Booking Date</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($booking as $item)
                                <tr>
                                    <td scope="row">1.</td>
                                    <td scope="row"><a href="{{ route('user.booking.show',['id' => $item->id]) }}" class="link-text">{{ $item->slug }}</a></td>
                                    <td scope="row">{{ $item->booking_time}}</td>
                                    <td scope="row">{{ $item->booking_status}}</td>
                                </tr>                                    
                                @empty
                                <tr>
                                    <td scope="row" colspan="4" class="text-center">No data available</td>
                                </tr>                                   
                                @endforelse
                             </tbody>
                        </table>

                        <div class="d-flex justify-content-end py-2">           
                        <a href="{{ route('user.booking.index') }}" class="badge badge-pill badge-primary py-2 px-3">Boking page</a>
                        </div>
                    </div>
            </div>




        </div>
    </div>   


</div>
@endsection
