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
							<td><a href="{!! url('admin/invoice/'.$list->formid) !!}">{{ $list->formid }}</a></td>
							<td>{{ $list->tanggal }}</td>
							<td>{{ $list->product->name }}</td>
							<td>{{ "Rp ".number_format($list->product->price,2, ',', '.') }}</td>
							<td>{{ $list->qty }}</td>
							<td>{{ "Rp ".number_format($list->total_price,2, ',', '.') }}</td>
						</tr>
						@endforeach
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
