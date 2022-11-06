@extends('admin.master.main')
@section('content')

<div class="container mt-5">
    <table class="table">
        <thead>
            <th>Name</th>
            <th>No of product</th>
            <th>Action</th>

        </thead>
        <tbody>
            @foreach($category as $cat)
                <tr>
                    <td>{{$cat->name}}</td>
                    <td>{{$cat->product->count()}}</td>

                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection