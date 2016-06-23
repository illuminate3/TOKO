@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="text-center">
                <i class="fa fa-search-plus pull-left icon"></i>
                <h2> Invoice :  {{ $notrans->formid }}</h2><br>
				<h3> Tanggal :  {{ $notrans->created_at }}</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 ">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Alamat Pengiriman</div>
                        <div class="panel-body">
                            <strong>Nama : {{ $customer->name }}</strong><br>
                            <strong>Alamat : {{ $customer->address }}</strong><br>
                            <strong>Propinsi : {{ $customer->province }}</strong><br>
                            <strong>Kodepos : {{ $customer->postal_code}}</strong><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-center"><strong>Item Price</strong></td>
									<td class="text-center"><strong>Item Quantity</strong></td>
                                    <td class="text-center"><strong>Total Price</strong></td>
                                </tr>
                            </thead>
                            <tbody>
							 @foreach ($transaction as $list)
                                <tr>
                                    <td>{{ $list->product->name }}</td>
                                    <td class="text-center">{{ "Rp ".number_format($list->product->price,2, ',', '.') }}</td>
									<td class="text-center">{{ $list->qty }}</td>
                                    <td class="text-center">{{ "Rp ".number_format($list->total_price,2, ',', '.') }}</td>
                                </tr>
							@endforeach
                                <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    @if(\Entrust::hasRole('member'))
                                        <td class="highrow text-center"><strong>Subtotal (member discount 5%)</strong></td>
                                    @else
                                        <td class="highrow text-center"><strong>Subtotal</strong></td>
                                    @endif
                                    
                                    <td class="highrow text-center">{{ $notrans->subtotal }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
		 <p class="text-center">
		<a href="{!! url('/') !!}" class="btn btn-primary">Selesai</a></p>
    </div>
</div>

<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style>

<!-- Simple Invoice - END -->

@endsection
