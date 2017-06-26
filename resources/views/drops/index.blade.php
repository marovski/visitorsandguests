@extends('main')

@section('title', '| All Drops')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>All Drops</h1>
		</div>

	<div class="col-md-2">
			<a href="{{ route('drops.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">  <span class="glyphicon glyphicon-plus"></span> New Drop</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- end of .row -->

	 <div class="table-responsive">

                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>
                        	 <th width="">#</th>
                            <th width="">Company Name</th>
                            <th width="">Dropper Name</th>
                            <th width="">Receiver Name</th>
                            <th width="">Drop Item</th>
                            <th width="">Drop Type</th>
                            <th width="">Dropped at</th>
                            <th width="">Received at</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($drops as $drop )
                            <tr>
                            	<th>{{ $drop->idDrop }}</th>
                                <td>{{ $drop->dropperCompanyName }}</td>
                                <td>{{ $drop->dropperName }}</td>
                                 <td>{{ $drop->dropReceiver }}</td>
                                <td>{{ $drop->dropDescr }}</td>
                                <td>{{ $drop->dropType }}</td>
                                <td>{{ date('M j, Y', strtotime($drop->droppedWhen)) }}</td>
                                <td>{{ $drop->dropReceivedDate ? date('M j, Y', strtotime($drop->dropReceivedDate)) : '' }}</td>
                                <td>
                                	 <a href="{{ route('drops.show',$drop->idDrop) }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-zoom-in"></span>View</a>
                                <a href="{{ route('drops.checkOut',$drop->idDrop) }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-check"></span>Check-out</a>

                               </</td>
							    
						</tr>

					@endforeach

				</tbody>
			</table>

			<div class="text-center">
				{!! $drops->links(); !!}
			</div>
		</div>
	
	
@stop