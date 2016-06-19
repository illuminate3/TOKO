@extends('layouts.app')
 
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Data Produk</div>
				<div class="panel-body">

		 		<table class="table table-hover table-striped">
				<tr><th class="col-md-3">Nama Produk</th>
				<th class="col-md-5">Deskripsi</th>
				<th class="col-md-2">Harga</th>
				<th class="col-md-1">Edit</th>
				<th class="col-md-1">Delete</th></tr>
         	   @foreach( $product as $products )
                    <tr>
				{!! Form::open(['class' => 'form-inline js-confirm', 'data-confirm'=>'Anda yakin akan menghapus produk ' . $products->name, 'method' => 'DELETE', 'route' => ['admin.products.destroy', $products->id]]) !!}
                      	<td>{{ $products->name }}</td>
						<td>{{ $products->desc }}</td>
						<td>{{ "Rp ".number_format($products->price, 2, ',', '.') }}</td>
                        <td><a href="{!! route('admin.products.edit', [$products->id]) !!}" class="btn btn-info">Edit</a></td>
                         <td> {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}</td>
                    {!! Form::close() !!}
						</tr>
            @endforeach
			</table>
			 <p>{!! $product->render() !!}</p>
 			  <p>
    		  <a href="{!! route('admin.products.create') !!}" class="btn btn-primary">Tambah Produk</a>
  			  </p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
