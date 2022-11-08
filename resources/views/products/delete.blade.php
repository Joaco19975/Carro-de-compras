{!! Form::open(['url' => '/products/'. $product->id, 'method' => 'DELETE', 'class' => 'inline-block']) !!}
<input type="submit" class="btn btn-danger no-padding no-margin" value="Delete">
{!! Form::close() !!}