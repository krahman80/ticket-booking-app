@extends('layouts.app')
@section('content')
@include('layouts.header')
<div class="container py-5">
    <div class="row py-3">
        <div class="col md-12">
            <div class="card shadow">
                <div class="card-body shadow-sm p-5">
                    <div class="card-header">{{ __('Concert List') }}</div>
                    <table id="concert" style="width:100%" class="table table-striped table-bordered my-3">
                        <thead>
                          <tr>
                            <th>Concert</th>
                            <th>Artist</th>
                            <th>Date</th>
                            <th>Venue</th>
                            <th>Seat</th>
                            <th>Updated at</th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse ($concerts as $concert)
                            <tr>
                                <td>{{ $concert->name }}</td>
                                <td>{{ $concert->artist }}</td>
                                <td>{{ $concert->date }}</td>
                                <td>{{ $concert->venue }}</td>
                                <td>{{ $concert->seat }}</td>
                                <td>{{ $concert->updated_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No Data</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                        <div class="d-flex justify-content-center py-2">
                        {!! $concerts->links() !!}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection