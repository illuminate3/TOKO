@extends('layouts.app')
 
@section('content')
 <div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Produk </div>
				<div class="panel-body">
					 
    				{!! Form::model($product, ['url' => route('admin.products.update', $product->id),
						'method'=>'put', 'files'=>'true', 'class'=>'form-horizontal']) !!}
						@include('products._form')
					{!! Form::close() !!}
	
				</div>
			</div>
		</div>
	</div>
</div>	
@endsection
