@extends('layouts.app')

@section('content')
<div class="container">
    <h1>New product</h1>

   @include('products.form', ['product' => $product, 'url' => '/products', 'method' => 'POST'])
</div>

@endsection