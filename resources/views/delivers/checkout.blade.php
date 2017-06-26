@extends('main')

	@section('title', '| Deliver Check-out')

	@section('assets')
	<link rel='stylesheet' href='/css/parsley.css' />
	@endsection

	@section('content')

	<div class="row">

		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Deliver Check-out</div>
				<div class="panel-body"> 
					{!! Form::model($deliver, array('method'=>'PATCH','class'=>'form-horizontal', 'role'=> 'form', 'route' => array('delivers.checkOut', $deliver->idDeliver))) !!}

						<div class="form-group{{ $errors->has('driverName') ? ' has-error' : '' }}">
							<label for="driverName" class="col-md-4 control-label">Driver Name:</label>

							<div class="col-md-6">
								<input id="driverName" type="text" class="form-control" name="driverName"  value="{{ $deliver->deDriverName}}">

								@if ($errors->has('driverName'))
								<span class="help-block">
									<strong>{{ $errors->first('driverName') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('vehicleLicensePlate') ? ' has-error' : '' }}">
							<label for="vehicleLicensePlate" class="col-md-4 control-label">Vehicle License Plate:</label>
							<div class="col-md-6">
								<input id="vehicleLicensePlate" type="text" class="form-control" name="vehicleLicensePlate" value="{{ $deliver->vehicleRegistry }}"  data-parsley-pattern="(^(?:[A-Z]{2}-\d{2}-\d{2})|(?:\d{2}-[A-Z]{2}-\d{2})|(?:\d{2}-\d{2}-[A-Z]{2})$)" max-lenght="25">

								@if ($errors->has('vehicleLicensePlate'))
								<span class="help-block">
									<strong>{{ $errors->first('vehicleLicensePlate') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('dropperName') ? ' has-error' : '' }}">
							<label for="firm" class="col-md-4 control-label">Firm Supplier:</label>

							<div class="col-md-6">
								<input id="firm" type="text" class="form-control" name="firm" value="{{ $deliver->deFirmSupplier }}">

								@if ($errors->has('firm'))
								<span class="help-block">
									<strong>{{ $errors->first('firm') }}</strong>
								</span>
								@endif
							</div>
						</div>


						<div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
							<label for="cargo" class="col-md-4 control-label">Cargo Details:</label>

							<div class="col-md-6">
								<input id="cargo" type="text" class="form-control" name="cargo" value="{{ $deliver->deMaterialDetails }}">

								@if ($errors->has('cargo'))
								<span class="help-block">
									<strong>{{ $errors->first('cargo') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('danger') ? ' has-error' : '' }}">
							<label for="danger" class="col-md-4 control-label">Dangerous Cargo:</label>

							<div class="col-md-6" >
								<p>

									<label class="radio-inline"><input type="radio" name="danger">{{$deliver->deDangerousGood}}</label>									

									@if ($errors->has('danger'))
									<span class="help-block">
										<strong>{{ $errors->first('danger') }}</strong>
									</span>
									@endif
								</p>
							</div>
						</div>

						<div class="form-group{{ $errors->has('sensitivity') ? ' has-error' : '' }}">
							<label for="sensitivity" class="col-md-4 control-label"> Sensitivity Level (select one):</label>

							<div class="col-md-6">
								<select class="form-control" id="sensitivity">
									<option value="">{{$deliver->deSensitiveLevel}}</option>
									

								</select>                               

								@if ($errors->has('sensitivity'))
								<span class="help-block">
									<strong>{{ $errors->first('sensitivity') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}" >
							<label for="weight" class="col-md-4 control-label">Entry Weight (Kg):</label>

							<div class="col-md-6">
								<input type="number"  name="weight" required="" max="1000" min="100" placeholder="Kg" value="{{ $deliver->entryWeight}}">

							</select>                               

							@if ($errors->has('weight'))
							<span class="help-block">
								<strong>{{ $errors->first('weight') }}</strong>
							</span>
							@endif
						</div>
					</div>

						<div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}" >
							<label for="quantity" class="col-md-4 control-label">Quantity (per unity):</label>

							<div class="col-md-6">
								<input type="number" name="quantity" required="" max="1000" min="100" placeholder="" value="{{ $deliver->deQuantity}}">

							</select>                               

							@if ($errors->has('quantity'))
							<span class="help-block">
								<strong>{{ $errors->first('quantity') }}</strong>
							</span>
							@endif
						</div>
					</div>
									
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4" >
							<button type="submit" class="btn btn-default btn-lg btn-block">
								Check-out
							</button>
							<a href="{{ route('drops.index') }}" class="btn btn-default btn-lg btn-block">Cancel</a>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/java				script" src="/js/parsley.min.js"></script>
@endsection