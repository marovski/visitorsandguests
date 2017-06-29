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
	</div> 
	     <!-- end of .row -->
<section class="panel panel-default" ng-app="deliverApp"  ng-controller="mainController">
<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>


						<!-- LOADING ICON -->
			<!-- show loading icon if the loading variable is set to true -->
		<div ng-show="loading == false"  ><br/><p class="text-center" ><span class="loader"></span></p></div>
		<div class="table-responsive"   ng-show="loading == true"  >
	
			<table class="table table-striped m-b-none" data-ride="datatables" id="table" >
				<thead>
				
					<th>Firm</th>
					<th>Vehicle</th>
					<th>Driver</th>
					<th>Delivered At</th>
					<th>Finished At</th>
					<th></th>
				</thead>
			
				<tbody >
				
								
	
						<tr class="delive"   ng-repeat="deliver in delivers" >

							
						
							<td>@{{deliver.deFirmSupplier}}</td>
							<td>@{{ deliver.vehicleRegistry}}</td>
							<td>@{{ deliver.deDriverName}}</td>
							<td>@{{ deliver.deEntryTime  | date : "medium" }}</td>
							<td>@{{ deliver.deExitTime  | date : "medium"  }}</td>
						
							<td>
							
								<a class="btn btn-default btn-sm" ng-click="showDeliver(deliver.idDeliver)"><span class="glyphicon glyphicon-zoom-in"></span>View</a></td>
								<td>
							
							
											<a  href="" id="checkOut" ng-click="submitCheckOut(deliver.idDeliver)" class="btn btn-default btn-sm"  ><span class="glyphicon glyphicon-check"></span> Check-out</a>

				</td>
							
						
						
			
							 </td>
						

						</tr>


				</tbody>
					
			</table>

	
			<div class="tedelivert-center">
				{!! $delivers->links(); !!}
			</div>
		</div>
		</section>


	<script type="text/javascript">
    var _deliver = {
    };




</script>

@stop
