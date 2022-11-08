@extends('admin.master.main')
@section('content')

<div class="d-flex justify-content-between mt-4 m-3">
    <h4>Stocks in record</h4>
    <a href="/stock-in/create" class="btn btn-primary">Record Stock In</a>
</div>



<div class="container mt-5">
    <table class="table">
        <thead>
            <th>Name</th>
            <th>sku</th>
            <th>unit</th>
            <th>sp</th>
            <th>cp</th>
            <th>stock</th>

            <th>Action</th>
        </thead>
        <tbody>
           

        </tbody>
    </table>
</div>
@endsection