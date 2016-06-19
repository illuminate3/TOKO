@extends('welcome')

@section('content')
<!-- Comment form -->
	<article>
		<h4 align="center">Isikan Data Anda</h4>
		{!! Form::open(['route'=>['customer.save',$formid],'role'=> 'form', 'class' => 'form-horizontal']) !!}

		<div class="panel-body">

			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
				{!! Form::label('name', 'Nama Lengkap', ['class' => 'col-md-4 control-label'])  !!}
				<div class="col-md-6">
					{!! Form::text('name', null,['class' => 'form-control', 'placeholder'=>'Nama']) !!}
					{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
				</div>
				{!! Form::hidden('formid', $formid) !!}
			</div>

			<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
				{!! Form::label('phone', 'Nomor Handphone', ['class' => 'col-md-4 control-label'])  !!}
				<div class="col-md-6">
					{!! Form::text('phone', null, ['class' => 'form-control','placeholder'=>'handphone']) !!}
					{!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
				</div>
			</div>

			<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
				{!! Form::label('address', 'Alamat lengkap', ['class' => 'col-md-4 control-label'])  !!}
				<div class="col-md-6">
					{!! Form::textarea('address',null, ['class' => 'form-control','placeholder'=>'alamat']) !!}
					{!! $errors->first('address', '<p class="help-block">:message</p>') !!}
				</div>
			</div>

			<div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
				{!! Form::label('province', 'Provinsi', ['class' => 'col-md-4 control-label'])  !!}
				<div class="col-md-6">
					{!! Form::text('province', null, ['class' => 'form-control','placeholder'=>'provinsi']) !!}
					{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
				</div>
			</div>

			<div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
				{!! Form::label('postal_code', 'Kodepos', ['class' => 'col-md-4 control-label'])  !!}
				<div class="col-md-6">
					{!! Form::text('postal_code', null, ['class' => 'form-control','placeholder'=>'kodepos']) !!}
					{!! $errors->first('postal_code', '<p class="help-block">:message</p>') !!}
				</div>
			</div>

			<div class="col-md-12 form-group text-center">
				{!! Form::submit('Submit', ['class'=>'btn btn-primary btn-large']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</article>
@endsection
