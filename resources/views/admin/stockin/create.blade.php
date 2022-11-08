@extends('admin.master.main')
@section('content')

<div class="d-flex justify-content-between mt-4 m-3">
    <h4>Stocks in record</h4>
    <a href="/stock-in" class="btn btn-primary">Back</a>
</div>

<div class="container">

    <div class="form-group">
        <label for="">Select Vendor</label>
        <select name="" id="" class="form-control">
            @foreach($vendor as $ven)
            <option value="">{{$ven->name}}</option>
            @endforeach
        </select>
    </div>
</div>


<div class="container mt-4">
    <form action="/add-stock-in-item" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <select name="product_id" id="" class="form-control">
                        @foreach($product as $prod)
                        <option value="{{$prod->id}}">{{$prod->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <input type="number" step="any" name="rate" class="form-control" placeholder="rate">
            </div>
            <div class="col-lg-3">
                <input type="number" step="any" name="quantity" class="form-control" placeholder="quantity">
                <input type="hidden" name="stock_in_id" value="{{$stock_in->id}}">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-primary" type="submit">add</button>
            </div>
        </div>

    </form>
</div>



<div class="container mt-5">
    <table class="table">
        <thead>
            <th>Product Name</th>
            <th>Rate</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </thead>
        <tbody>

            @foreach($item as $itm)
            <tr>
                <td>{{$itm->product['name']}}</td>
                <td>{{$itm->rete}}</td>
                <td>{{$itm->quantity}}</td>
                <td>{{$itm->total}}</td>
            </tr>
            @endforeach


            <tr>
                <td colspan="3">Total</td>
                <td>Rs 3000</td>
            </tr>

        </tbody>
    </table>


</div>


@endsection