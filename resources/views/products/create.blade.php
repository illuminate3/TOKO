@extends('layouts.app')
 
@section('content')
 <div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Tambah Produk </div>
				<div class="panel-body">
					 
    				{!! Form::open(['url' => route('admin.products.store'),
						'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
						@include('products._form')
					{!! Form::close() !!}
	
				</div>
			</div>
		</div>
	</div>
</div>	
@endsection