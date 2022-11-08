{!! Form::open(['url' => $url, 'method' => $method]) !!}
<div class="form-group">
   {{ Form::text('title', $product->title, ['class' => 'form-control', 'placeholder' => 'Title...']) }}
</div>
<div class="form-group">
   {{ Form::textarea('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Description...']) }}
</div>
<div class="form-group">
   {{ Form::number('price', $product->price, ['class' => 'form-control', 'placeholder' => 'Price...']) }}
</div>

<div class="form-group text-right">
   <a href="{{url('/products')}}">Back to list </a>
   <input type="submit" value="Save" class="btn btn-success">
</div>

{!! Form::close() !!}