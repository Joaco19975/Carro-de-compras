@extends('layouts.app')

@section('content')

<div class="container text-center">
    <div class="card product text-left">

    @if(Auth::check() && $product->user_id == Auth::user()->id)
        <div class="absolute-actions">
        <a href="{{url('/products/' . $product->id . '/edit')}}" class="btn btn-warning">Edit</a>
                        @include('products.delete', ['product' => $product])

        </div>
    
    @endif

        <h1>{{$product->title}}</h1>

        <div class="row text-center">
        <div class="col-sm-6 col-xs-12"></div>
        <div class="col-sm-6 col-xs-12">
            <p>
                <strong>Description</strong>
            </p>
            <p>
                {{$product->description}}
            </p>
            <p>
                @include("in_shopping_carts.form", ["product" => $product])
            </p>
        </div>
    </div>
    </div>
    
</div>

@endsection