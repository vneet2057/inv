@extends('admin.master.main')
@section('content')

<div class="container mt-4">
    <form action="/product" method="post">
        @csrf
       

        <div class="form-group mt-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group mt-3">
            <label for="">Sku</label>
            <input type="text" class="form-control" name="sku">
        </div>

        <div class="form-group mt-3">
            <label for="">Unit</label>
            <input type="text" class="form-control" name="unit">
        </div>

        <div class="form-group mt-3">
            <label for="">Selling Price</label>
            <input type="text" class="form-control" name="selling_price">
        </div>

        <div class="form-group mt-3">
            <label for="">Cost Price</label>
            <input type="text" class="form-control" name="cost_price">
        </div>

        <input type="submit" class="btn btn-primary mt-3">

    </form>
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