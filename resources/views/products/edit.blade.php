@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit product</h1>

    @include('products.form', ['product' => $product,
     'url' => '/products/'. $product->id , 'method' => 'PUT'])
</div>

@endsection