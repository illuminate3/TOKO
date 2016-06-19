@extends('welcome')

@section('content')

<article>
	<h2><a href="{!! url('/product/'.$product->id.'/show') !!}">{{ $product->name }}</a></h2>

	<div class="row">
		<div class="col-sm-3 col-md-3">
			<div class="thumbnail">
				<img src="{{ asset('img/'.$product->image) }}" class="img-responsive">
			</div>
		</div>
		<div class="col-sm-7 col-md-7">
			<p>{{ $product->desc }}</p>
		</div>
		<div class="text-center col-sm-2 col-md-2">
			<a href="{!! url('product/cart/'.$product->id) !!}" class="btn btn-primary">Beli</a>
		</div>
	</div>

</article>

@endsection
