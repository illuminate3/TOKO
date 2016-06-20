@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Laporan Pemesanan Periode</div>
				<div class="panel-body">

					{!! Form::model(new App\Transaction, ['class' => 'form-horizontal','files'=>true, 'route' => ['report.show']]) !!}

					<div class="form-group{{ $errors->has('begin') ? ' has-error' : '' }}">
						{!! Form::label('begin', 'Periode Awal', ['class' => 'col-md-4 control-label'])  !!}
						<div class="col-md-6">
							{!! Form::text('begin',null, ['id' => 'datepicker','class' => 'form-control']) !!}
							{!! $errors->first('begin', '<p class="help-block">:message</p>') !!}
						</div>
					</div>

					<div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
						{!! Form::label('end', 'Periode Akhir', ['class' => 'col-md-4 control-label'])  !!}
						<div class="col-md-6">
							{!! Form::text('end',null, ['id' => 'datepicker2','class' => 'form-control']) !!}
							{!! $errors->first('end', '<p class="help-block">:message</p>') !!}	
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							{!! Form::submit('Kirim', ['class'=>'btn btn-primary']) !!}
						</div>
						{!! Form::close() !!}
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
		$( "#datepicker2" ).datepicker();
	});
</script>
@endsection