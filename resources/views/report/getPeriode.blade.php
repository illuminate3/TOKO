@extends('layouts.app')
 
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
			<div class="panel-heading">Laporan Periode : Tanggal {{ $from }} s/d {{ $to }}</div>
				<div class="panel-body">

					<table class="table table-hover table-striped">
						<tr><th>Invoice</th><th>Tanggal</th><th>Nama Produk</th><th>Harga</th><th>Qty</th><th>Total</th></tr>
						@foreach( $transaction as $list )
						<tr>
							<td>{{ $list->formid }}</td>
							<td>{{ $list->tanggal }}</td>
							<td>{{ $list->product->name }}</td>
							<td>{{ $list->product->price }}</td>
							<td>{{ $list->qty }}</td>
							<td>{{ $list->total_price }}</td>
						</tr>
						@endforeach
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
