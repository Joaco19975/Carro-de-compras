@extends("layouts.app")
@section("content")
<div class="big-padding text-center blue-grey white-text">
    <h1>Your shopping cart</h1>
</div>

<div class="container">
    <table class="table table-border">

    <thead>
        <tr>
            <td>Product</td>
            <td>Price</td>
        </tr>
    </thead>
    
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->title}}</td>
            <td>{{$product->price}}</td>
        </tr>
        @endforeach
        <tr>
            <td>Total</td>
            <td>{{$total}}</td>
        </tr>
    </tbody>

    </table>
</div>

@endsection