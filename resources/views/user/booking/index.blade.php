@extends('layouts.app')
@include('layouts.header')
@section('content')
    <div class="container">
        <div class="row justify-content-center py-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="h3">Booking list</h3>
                        <table class="table table-striped table-bordered small">
                            <thead>
                                <tr>
                                    <th scope="col">No</td>
                                    <th scope="col">Booking Code</td>
                                    <th scope="col">Booking Date</td>
                                    <th scope="col">Expired Until</td>
                                    <th scope="col">Status</td>
                                </tr>
                            </thead>
                            <tbody>
                        @php 
                            $i = 1;
                        @endphp
                        @forelse ($bookings as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><a href="{{ route('user.booking.show',['id'=> $item->id]) }}" class="">{{ $item->slug }}</a></td>
                                <td>{{ $item->booking_time }}</td>
                                <td class="text-danger">{{ $item->expired }}</td>
                                <td>{{ $item->booking_status }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td scope="row" colspan="5" class="text-center"><span>Not found</span></td>
                            </tr>
                        @endforelse
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
