<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	{!! Form::label('name', 'Nama Produk', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
		{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
{!! Form::label('desc', 'Deskripsi', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
		{!! $errors->first('desc', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
	{!! Form::label('price', 'Harga', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::number('price', null, ['class' => 'form-control']) !!}
		{!! $errors->first('price', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
	{!! Form::label('image', 'Gambar Produk', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::file('image',['class' => 'btn btn-primary']) !!}
		{!! $errors->first('image', '<p class="help-block">:message</p>') !!}
		@if (isset($product) && $product->image)
		<p>
			{!! Html::image(asset('img/'.$product->image), null, ['class'=>'img-rounded', 'width'=>'100%', 'height'=>'100%']) !!}
		</p>
		@endif
	</div>
</div>

<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		{!! Form::submit('Simpan Produk', ['class'=>'btn btn-primary']) !!}
	</div>
</div>