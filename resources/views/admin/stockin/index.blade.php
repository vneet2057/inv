@extends('admin.master.main')
@section('content')


<?php

use App\Models\Vendor;
?>


<div class="d-flex justify-content-between mt-4 m-3">
    <h4>Stocks in record</h4>
    <a href="/stock-in/create" class="btn btn-primary">Record Stock In</a>
</div>



<div class="container mt-5">
    <table class="table">
        <thead>
            <th>date</th>
            <th>vendor name
            </th>
            <th>total price</th>
            <th>pending price</th>
            <th>paid amount</th>
            <th>status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($stock_in as $stock)
            <tr>
                <td>{{$stock->date}}</td>
                <td>{{$stock->vendor_id}}</td>
                <td>{{$stock->total_price}}</td>
                <td>{{$stock->pending_amount}}</td>
                <td>{{$stock->paid_amount}}</td>
                <td>{{$stock->status}}</td>
                <td></td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection