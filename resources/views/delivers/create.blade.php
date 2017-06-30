@extends('main')

	@section('title', '| Create New Deliver')

	@section('assets')
	<link rel='stylesheet' href='/css/parsley.css' />
	@endsection

	@section('content')

	<div class="row" ng-app="MyApp" >

		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><span class="glyphicon glyphicon-list-alt"></span> Create Delivery</div>
				<div class="panel-body"  ng-controller="showInputController"> 
							<!-- LOADING ICON -->
			<!-- show loading icon if the loading variable is set to true -->
		<div ng-show="loading == false"  ><p class="text-center" ><span class="loader"></span></p></div>

					<form ng-show="loading == true"  class="form-horizontal" role="form" method="POST" action="{{ route('delivers.store') }}" data-parsley-validate="" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('driverName') ? ' has-error' : '' }}">
							<label for="driverName" class="col-md-4 control-label">Driver Name:</label>

							<div class="col-md-6">
								<input id="driverName" type="text" class="form-control" name="driverName" value="{{ old('driverName') }}" required autofocus>

								@if ($errors->has('driverName'))
								<span class="help-block">
									<strong>{{ $errors->first('driverName') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('driverIDType') ? ' has-error' : '' }}"  >
							<label for="driverIDType" class="col-md-4 control-label">Identification Card Type:</label>

							<div class="col-md-6">
								<select class="form-control" id="driverIDType" name="driverIDType" ng-model="driverIDType">
									<option value="1" >Passport</option>
									<option value="2" >Citizen Card</option>
									<option value="3" >Driver License</option>

								</select>

								@if ($errors->has('driverIDType'))
								<span class="help-block">
									<strong>{{ $errors->first('driverIDType') }}</strong>
								</span>
								@endif
							</div>
						</div>


						<div ng-show="driverIDType != 0" class="form-group{{ $errors->has('driverID') ? ' has-error' : '' }}"   >
							<label for="driverID" class="col-md-4 control-label">Identification Card Number:</label>

							<div class="col-md-6">
								<input id="driverID" max="9" type="text" class="form-control" name="driverID" value="{{ old('driverID') }}" required autofocus>

								@if ($errors->has('driverID'))
								<span class="help-block">
									<strong>{{ $errors->first('driverID') }}</strong>
								</span>
								@endif
							</div>
						</div>

			

						<div class="form-group{{ $errors->has('vehicleLicensePlate') ? ' has-error' : '' }}">
							<label for="vehicleLicensePlate" class="col-md-4 control-label">Vehicle License Plate:</label>

							<div class="col-md-6">
								<input id="vehicleLicensePlate" type="text" class="form-control" name="vehicleLicensePlate" value="{{ old('vehicleLicensePlate') }}" required autofocus data-parsley-pattern="(^(?:[A-Z]{2}-\d{2}-\d{2})|(?:\d{2}-[A-Z]{2}-\d{2})|(?:\d{2}-\d{2}-[A-Z]{2})$)" max-lenght="40">

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
								<input id="firm" type="text" class="form-control" name="firm" value="{{ old('firm') }}" required autofocus>

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
								<input id="cargo" type="text" class="form-control" name="cargo" value="{{ old('cargo') }}" required autofocus>

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

									<label class="radio-inline"><input type="radio" name="danger" value="1">Yes</label>
									<label class="radio-inline"><input type="radio" name="danger" value="0">No</label>

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
								<select class="form-control" id="sensitivity" name="sensitivity">
									<option value="1">Low</option>
									<option value="2">Medium</option>
									<option value="3">High</option>

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
								<input type="number"  name="weight"  min="0" placeholder="Kg" data-parsley-pattern="/^\d{2,3} ?kg$/">

							                               

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
								<input type="number" name="quantity" required="" min="0" placeholder="">

							                            

							@if ($errors->has('quantity'))
							<span class="help-block">
								<strong>{{ $errors->first('quantity') }}</strong>
							</span>
							@endif
						</div>
					</div>
				
						<div class="form-group">
						<label for="image" class="col-md-4 control-label" >Image Upload:</label>
						<div class="col-md-6">
						<input name="image" id="image" type="file" class="form-control" />
							
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4" >
							<button type="submit" class="btn btn-basic btn-sm btn-block">
								Save Delivery
							</button>
							<a href="{{ route('delivers.index') }}" class="btn btn-default btn-sm btn-block">Cancel</a>
						</div>
					</div>
				</form>



			</div>
		</div>
	</div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/java				script" src="/js/parsley.min.js"></script>
@endsection