@extends('admin.master.main')
@section('content')

<div class="container mt-4">
    <form action="/inventory" method="post">
        @csrf
        <div class="form-group">
            <label for="">Catgory</label>
            <select id="" class="form-control" name="product_id">
                <option >Select</option>
                @foreach($product as $prod)
                <option value="{{$prod->id}}">{{$prod->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Type</label> <br>
            <label for="">Increase quantity</label>
            <input type="radio" name="type" value="1" id="">
            <label for="">Decrease quantity</label>
            <input type="radio" name="type" value="0" id="">
        </div>
        <div class="form-group">
            <label for="">quantity</label>
            <input type="number" class="form-control" name="quantity">
        </div>
        <input type="submit" class="btn btn-primary mt-3">

    </form>
</div>



<div class="container mt-5">
    <table class="table">
        <thead>
            <th>Product Name</th>
            <th>unit</th>
            <th>Type</th>
            <th>Action</th>
        </thead>
        <tbody>
          

        </tbody>
    </table>
</div>
@endsection