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
                        <table style="width:100%" class="table table-striped table-bordered my-3">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>Booking Code</td>
                                    <td>Artist</td>
                                    <td>Booking Date</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>bk9177737177512</td>
                                    <td>Black Eyed Peas</td>
                                    <td>2021 12 10 23:23:00</td>
                                    <td>not paid</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end py-2">           
                        <a href="#" class="badge badge-pill badge-primary py-2 px-3">Boking page</a>
                        </div>
                    </div>
            </div>




        </div>
    </div>   


</div>
@endsection
