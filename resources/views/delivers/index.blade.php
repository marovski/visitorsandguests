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
<section class="panel panel-default" >
<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>

<div class="input-group custom-search-form">
<form action="/search/deliver" method="get" role="form">
                                <input type="text" name="q" class="form-control" placeholder="Search..." value="{{ Request::get('q') }}"> <i class="fa fa-search"></i>
                              
                          
                            </form>
                            </div>
				
		<div class="table-responsive"    >
	
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
				
								@foreach($delivers as $deliver)
	
						<tr class="delive" >

							
						
							<td>{{$deliver->deFirmSupplier }}</td>
							<td>{{ $deliver->vehicleRegistry}}</td>
							<td>{{ $deliver->deDriverName}}</td>
							
							     <td>{{ ($deliver->deEntryTime ? date('M, d, y - h:i:s A', strtotime($deliver->deEntryTime)) : '')  }}</td>
                                     <td>{{ ($deliver->deExitTime ? date('M, d, y - h:i:s A', strtotime($deliver->deExitTime)) : '')  }}</td>
						
							<td>
							
								<a class="btn btn-default btn-sm" href="{{ route('delivers.show',$deliver->idDeliver) }}"><span class="glyphicon glyphicon-zoom-in"></span>View</a></td>
								<td>
							
							@if (empty($deliver->deExitTime))
										
					
					<a  href="{{ route('delivers.checkout', $deliver->idDeliver) }}" id="checkOut" onclick="return confirm('Are you certain to proceed to the Check-out process?')" class="btn btn-default btn-sm"   ><span class="glyphicon glyphicon-check"></span> Check-out</a>

								@else
					<a disabled readonly id="checkOut"  class="btn btn-default btn-sm"  ><span class="glyphicon glyphicon-check"></span> Check-out</a>

											@endif

				</td>
							
						
						
			
							 </td>
						

						</tr>
@endforeach

				</tbody>
					
			</table>

	
			<div class="tedelivert-center">
				{!! $delivers->links(); !!}
			</div>
		</div>
		</section>

@stop
