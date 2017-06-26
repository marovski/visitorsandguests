@extends('main')

@section('title', '| All Delivers')

@section('content')

		<div class="row" >
		<div class="col-md-10">
			<h1>All Deliveries</h1>
		</div>

	<div class="col-md-2">
			<a href="{{ route('delivers.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing"> <span class="glyphicon glyphicon-plus"></span> New Deliver </a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- end of .row -->

<div class="row"   ng-app="deliverApp"  >
		<div class="table-responsive" >
			<table class="table table-striped m-b-none" data-ride="datatables" id="table">
				<thead>
					<th>#</th>
					<th>Firm</th>
					<th>Vehicle</th>
					<th>Driver</th>
					<th>Delivered At</th>
					<th>Finished At</th>
					<th></th>
				</thead>

				<tbody ng-controller="mainController" >
				
								<!-- LOADING ICON -->
	<!-- show loading icon if the loading variable is set to true -->
	<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>
	
						<tr class="delive" ng-hide="loading"  ng-repeat="deliver in delivers" >

							
							<td >@{{ deliver.idDeliver }}</td>
							<td>@{{deliver.deFirmSupplier}}</td>
							<td>@{{ deliver.vehicleRegistry}}</td>
							<td>@{{ deliver.deDriverName}}</td>
							<td>@{{ deliver.deEntryTime  | date : "medium" }}</td>
							<td>@{{ deliver.deExitTime  | date : "medium"  }}</td>
						
							<td>
							
								<a class="btn btn-default btn-sm" ng-click="showDeliver(deliver.idDeliver)"><span class="glyphicon glyphicon-zoom-in"></span>View</a>
							
							
											<a  href="" id="checkOut" ng-click="submitCheckOut(deliver.idDeliver)" class="btn btn-default btn-sm"  ><span class="glyphicon glyphicon-check"></span> Check-out</a>

				
							
						
						
			
							 </td>
						

						</tr>


				</tbody>
					
			</table>

	
			<div class="tedelivert-center">
				{!! $delivers->links(); !!}
			</div>
		</div>
	</div>


	<script type="text/javascript">
    var _deliver = {
    };




</script>

@stop
