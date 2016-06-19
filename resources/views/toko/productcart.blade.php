@extends('welcome')

@section('content')
<!-- app/views/productcart.blade.php -->

	<div class="container">
		<h4><i class="fa fa-shopping-cart"></i> Keranjang Belanja</h4>
		<!-- Panel -->
		<div class="panel">
			<div class="panel-heading"></div>
			<table class="table table-striped m-b-none text-sm">
				<thead>
					<tr>
						<th width="8">No</th>
						<th width="300">Product Name</th>                    
						<th>Price</th>
						<th width="75">Quantity</th>
						<th width="200">Total</th>
						<th width="75">Action</th>
					</tr>
				</thead>

				<tbody>
					<?php $i = 1; ?>
					@foreach($cart_content as $cart)
						<tr>
							<td>{{ $i }}</td>
							<td>{{ $cart->name }}</td>
							<td>{{ "Rp ".number_format($cart->price,2, ',', '.') }}</td>
							<td>{{ $cart->qty }}</td>
							<td>{{ "Rp ".number_format($cart->price * $cart->qty,2, ',', '.') }}</td>
							<td>
								<a href="{{ url('cart/delete/'.$cart->rowId) }}">delete</a>
							</td>
						</tr>
						<?php $i++; ?>
					@endforeach
					<tr>
						<td class="highrow"></td>
						<td class="highrow"></td>
						<td ><strong>Subtotal</strong></td>
						<td class="highrow"></td>
						<td ><strong>{{ "Rp ".Cart::total(2, ',', '.') }}</strong></td>
						<td class="highrow"></td>
					</tr>
				</tbody>
			</table>

			<div class="panel-footer">
				<a href="{{ url('/') }}" class="btn btn-white">Continue Shopping</a>
				@if (Cart::count() != 0)
					<a href="{{ url('cart/checkout') }}" class="btn btn-info">Checkout</a>
				@endif
			</div>

		</div>
		<!-- / Panel -->
	</div>
@endsection