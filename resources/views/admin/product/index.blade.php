@extends('admin.master.main')
@section('content')

<div class="container mt-4">
    <form action="/product" method="post">
        @csrf
        <div class="form-group">
            <label for="">Catgory</label>
            <select id="" class="form-control" name="category_id">
                <option>Select</option>
                @foreach($category as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
            <label for="">Sku</label>
            <input type="text" class="form-control" name="sku">
        </div>

        <div class="form-group">
            <label for="">Unit</label>
            <input type="text" class="form-control" name="unit">
        </div>

        <div class="form-group">
            <label for="">Selling Price</label>
            <input type="text" class="form-control" name="selling_price">
        </div>

        <div class="form-group">
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
            @foreach($product as $prod)
            <tr>
                <td>{{$prod->name}}</td>
                <td>{{$prod->name}}</td>
                <td>{{$prod->name}}</td>
                <td>{{$prod->name}}</td>
                <td>{{$prod->name}}</td>
                <td>{{$prod->stock}}</td>
                <td>{{$prod->name}}</td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection