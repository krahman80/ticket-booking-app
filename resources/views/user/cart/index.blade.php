@extends('layouts.app')
@section('content')
@include('layouts.header')
    <div class="container">
        <div class="row justify-content-center py-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table style="width:100%" class="table table-bordered my-3">
                            <thead>
                                <tr>        
                                    <th>No.</th>
                                    <th>Concert Name</th>
                                    <th>Artist Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Sub Total</th>
                                    <th>&nbsp;</th>
                                </tr>

                            </thead>
                            <tbody>
                                @php
                                   $total = 0 
                                @endphp
                                @php
                                    $i = 1
                                @endphp
                                @forelse ($cart as $key => $item)
                                @php $total += $item['price'] * $item['qty'] @endphp
                                <tr class="trow">
                                    <td>{{ $i++ }} </td>
                                    <td>{{ $item['concert-name'] }}</td>
                                    <td>{{ $item['artist-name'] }}</td>
                                    <td class="qty">
                                        <input type="number" value="{{ $item['qty'] }}" class="form-control" max=3 min=1 />
                                    </td>
                                    <td>{{ $item['price'] }}</td>
                                    <td data-th="quantity">{{ $item['qty'] * $item['price'] }}</td>
                                    <td data-th="btn">
                                        <button class="btn btn-info btn-sm update-item" data-id="{{ $key }}"><i class="fa fa-refresh"></i></button>
                                        <button class="btn btn-danger btn-sm delete-item"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>                                    
                                @empty
                                <tr>
                                    <td colspan="5">No data</td>
                                </tr>                                    
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr class="visible-sm">
                                    <td colspan="5" class="text-right">Total</td>
                                    <td class="text-left"><small><strong>{{ $total }}</strong></small></td>
                                </tr>
                        </table>
                        <div class="d-flex">
                            <div class="mr-auto p-1"><a href="{{ url('user.concert.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a></div>
                            <div class="p-1"><a href="{{ url('user.concert.index') }}" class="btn btn-sm btn-primary">Checkout&nbsp;<i class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('javascript')
<script>

const updateBtn = document.getElementsByClassName('update-item');

Array.from(updateBtn).forEach(v => v.addEventListener('click', function() {
    const dataid = this.getAttribute('data-id');
    
    const trow = this.closest(".trow");
    let qty;
    for (var i = 0; i < trow.childNodes.length; i++) {
        if (trow.childNodes[i].className == "qty") {
            qty = trow.childNodes[i].childNodes[1].value;
        break;
        }        
    }
    // console.log(dataid + '-' + notes);
    $.ajax({
        url: '{{ route('user.cart.update') }}',
        method: "patch",
        data: {_token: '{{ csrf_token() }}', id: dataid, qty: qty},
        success: function (response) {
            // window.location.reload();
            console.log(response);
        }
    });

}));



</script>    
@endsection