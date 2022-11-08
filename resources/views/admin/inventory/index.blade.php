@extends('admin.master.main')
@section('content')

<div class="container mt-4">
    <form action="/inventory" method="post">
        @csrf
        <div class="form-group mt-3">
            <label for="">Catgory</label>
            <select id="" class="form-control" name="product_id">
                <option>Select</option>
                @foreach($product as $prod)
                <option value="{{$prod->id}}">{{$prod->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="">Type</label> <br>
            <label for="">Increase quantity</label>
            <input type="radio" name="type" value="1" id="">
            <label for="">Decrease quantity</label>
            <input type="radio" name="type" value="0" id="">
        </div>
        <div class="form-group mt-3">
            <label for="">quantity</label>
            <input type="number" class="form-control" name="quantity">
        </div>
        <input type="submit" class="btn btn-primary mt-3">

    </form>
</div>



<div class="container mt-5">
    <table class="table">
        <thead>
            <th width="20%">Date of adjustment</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Type</th>
            <th width="15%">Action</th>
        </thead>
        <tbody>

            @foreach($inventory as $inv)
            <tr>
                <td>{{$inv->created_at->format('Y-m-d')}}</td>
                <td>{{$inv->product['name']}}</td>
                <td>{{$inv->quantity}}</td>
                @if($inv->type == 1 )
                <td>Increment</td>
                @else
                <td>Decrement</td>
                @endif
                <td><button class="btn btn-primary">Edit</button><button class="btn btn-danger ms-3">Delete</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection