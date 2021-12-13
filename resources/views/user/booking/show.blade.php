@extends('layouts.app')
@section('content')
    @include('layouts.header')
    <div class="container">
        <div class="row justify-content-center py-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="h3">Booking detail</h3>
                        <table class="table table-sm table-border small">
                            <thead>
                                <th scope="col">No</td>
                                <th scope="col">Booking Code</td>
                                <th scope="col">Booking Date</td>
                                <th scope="col">Expired Until</td>
                                <th scope="col">Status</td>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>{{ $booking->slug }}</td>
                                    <td>{{ $booking->booking_time }}</td>
                                    <td>{{ $booking->expired }}</td>
                                    <td>{{ $booking->booking_status }}</td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>Detail : 
                                    </td>
                                    <td colspan="3">
                                        <table class="table">
                                            <thead>
                                                <th>ticket code</th>
                                                <th>Concert Name</th>
                                                <th>Artist Name</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Total Price</th>
                                                <th>Pdf</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($booking->tickets as $item)
                                                <tr>
                                                    <td>{{ $item->pivot->slug }}</td>
                                                    <td>{{ $item->pivot->concert_name }}</td>
                                                    <td>{{ $item->pivot->artist_name }}</td>
                                                    <td>{{ $item->pivot->price }}</td>
                                                    <td>{{ $item->pivot->qty }}</td>
                                                    <td>{{ $item->pivot->total_price }}</td>
                                                    <td><a href="#">pdf</a></td>
                                                </tr>                                            
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
