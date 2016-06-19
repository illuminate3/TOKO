@extends('welcome')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3>Produk Terbaru</h3>
    </div>
</div>
<!-- /.row -->

<!-- Page Features -->
<div class="row text-center">

    @foreach($product as $item)

    <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
        <img src="{{ asset('img/'.$item->image) }}" width="800" height="500">
            <div class="caption">
                <h4>{{ $item->name }}</h4>
                <h5>{{ "Rp ".number_format($item->price,2, ',', '.') }}</h5>
                <p>
                    <a href="{!! url('product/cart/'.$item->id) !!}" class="btn btn-primary">Beli</a> <a href="{!! url('/product/'.$item->id.'/show') !!}" class="btn btn-default">Detail</a>
                </p>
            </div>
        </div>
    </div>

    @endforeach

</div>

<div align="center">
    {!! $product->render() !!}
</div>
@endsection
