@extends('admin.master.main')
@section('content')

<div class="d-flex justify-content-between mt-4 m-4">
    <h4>Stocks in record</h4>
    <a href="/stock-in" class="btn btn-primary">Back</a>
</div>

<div class="container">

    <div class="form-group">
        <div class="row">
            <div class="col-lg-4">
                <label for="">Select Vendor</label>
                <select name="" id="vendor_id" class="form-control">
                    @foreach($vendor as $ven)
                    <option value="{{$ven->id}}">{{$ven->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4">
                <label for="">Vat no</label>
                <input type="text" id="vat-no" class="form-control">
            </div>
            <div class="col-lg-4">
                <label for="">Bill date</label>
                <input type="date" id="bill-date" class="form-control">
            </div>
        </div>
    </div>
</div>


<div class="container mt-4">
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label for="" class="mb-2">Select Product</label>
                <select name="product_id" id="product_id" class="form-control">
                    @foreach($product as $prod)
                    <option value="{{$prod->id}}">{{$prod->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <label for="" class="mb-2">Rate</label>
            <input type="number" step="any" id="rate" name="rate" class="form-control" placeholder="rate">
        </div>
        <div class="col-lg-3">
            <label for="" class="mb-2">quantity</label>
            <input type="number" id="quantity" step="any" name="quantity" class="form-control" placeholder="quantity">
            <input type="hidden" id="stock_in_id" name="stock_in_id" value="{{$stock_in->id}}">
        </div>
        <div class="col-lg-3 pt-4">
            <button class="btn btn-primary" onclick="addItem()" type="submit">add</button>
        </div>
    </div>
</div>

<div class="container mt-5">
    <table class="table table-head-fixed text-nowrap product-table">
        <thead>
            <th>Product Name</th>
            <th>Rate</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </thead>
        <tbody>


        </tbody>
        <tfoot>
            <tr class="h6">
                <td colspan="3" class="text-end">Total(Rs)</td>
                <td id="before-total"></td>
            </tr>
        </tfoot>

    </table>


    <div class="container bg-light mb-5">
        <div class="box row">

            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4 d-flex">
                <h6>Tax</h6>
                <input type="text" onkeyup="calculateTax()" placeholder="Vat(%)" value="" id="vat" class=" ms-1">
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4 mt-3 d-flex">
                <h6>Total</h6>
                <input type="text" id="after-vat" placeholder="" value="" class=" ms-1" disabled>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4 mt-3 d-flex">
                <h6>Paid Amount</h6>
                <input type="text" id="paid-amount" placeholder="" value="" class=" ms-1">
            </div>

        </div>
    </div>

    <button class="btn btn-primary mb-5" onclick="createBill()">Create Bill</button>

</div>




<script>
    function calculateTax() {
        var before_total = document.getElementById('before-total').innerHTML;
        console.log(before_total);

        var vat = document.getElementById('vat').value;
        console.log(vat)

        var final_vat = (parseInt(before_total) * parseInt(vat) / 100) + parseInt(before_total);
        console.log(final_vat)

        document.getElementById('after-vat').setAttribute('value', final_vat);
    }
</script>


<script>
    $(document).ready(function() {
        getItem();
    });

    function addItem() {
        // get data
        var product_id = document.getElementById('product_id').value;
        var rate = document.getElementById('rate').value;
        var quantity = document.getElementById('quantity').value;
        var stock_in_id = document.getElementById('stock_in_id').value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            // url
            url: "/add-stock-in-item",
            // data
            data: {
                "product_id": product_id,
                "rete": rate,
                "quantity": quantity,
                "stock_in_id": stock_in_id,
            },
            // method
            type: "post",

            // success
            success: function(result) {
                console.log(result)
                getItem()
            },

            // error
            error: function(err) {
                console.log(err)
            }
        });
    }


    function getItem() {
        // bill id
        var stock_in_id = document.getElementById('stock_in_id').value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            // url
            url: "/get-stock-in-items/" + stock_in_id,

            // type
            type: "get",
            // succcess
            success: function(result) {
                var items = result.item
                console.log(items)
                var total = 0
                $('.product-table tbody').empty();
                for (i = 0; i < items.length; i++) {
                    total += parseInt(`${items[i].total}`)
                    $('.product-table tbody').append(
                        `
                    <tr>
                    <td>${items[i].product_id}</td>
                    <td>${items[i].rete}</td>
                    <td>${items[i].quantity}</td>
                    <td>${items[i].total}</td>

                    </tr>
                    `
                    )
                }
                console.log(total)
                document.getElementById('before-total').innerHTML = total

            },
            error: function(err) {
                console.log(err)
            }
        });
    }

    function createBill() {

        var vendor_id = document.getElementById('vendor_id').value;
        var vat_no = document.getElementById('vat-no').value;
        var bill_date = document.getElementById('bill-date').value;
        var after_vat = document.getElementById('after-vat').value;
        var paid_amount = document.getElementById('paid-amount').value;
        var stock_in_id = document.getElementById('stock_in_id').value;


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        console.log('test')

        $.ajax({
            // url
            url: "/create-bill/" + stock_in_id,
            // data
            data: {
                "vendor_id": vendor_id,
                "vat_no": vat_no,
                "bill_date": bill_date,
                "total_price": after_vat,
                "paid_amount": paid_amount
            },
            // method
            type: "post",
            // success respones
            success: function(result) {
                console.log('success')
                window.location.href = '/stock-in'
            },
            // erro response
            error: function(err) {
                console.log(err)
            }
        });
    }
</script>


@endsection