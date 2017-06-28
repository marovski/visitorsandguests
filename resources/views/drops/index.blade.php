@extends('main')

@section('title', '| All Drops')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>All Drops</h1>
		</div>

	<div class="col-md-2">
			<a href="{{ route('drops.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing"><span class="glyphicon glyphicon-plus"></span> New Drop</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- end of .row -->
<section class="panel panel-default">
<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
	 <div class="table-responsive">

                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>
                            <th width="">Company Name</th>
                            <th width="">Dropper Name</th> 
                            <th width="">Receiver Name</th>
                            <th width="">Drop Item</th>
                            <th width="">Dropped at</th>
                            <th width="">Received at</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($drops as $drop )
                            <tr>
                                <td>{{ $drop->dropperCompanyName }}</td>
                                <td>{{ $drop->dropperName }}</td>
                                <td>{{ $drop->dropReceiver }}</td>
                                <td>{{ $drop->dropDescr }}</td>
                                <td>{{ date('M j, Y H:i', strtotime($drop->droppedWhen)) }}</td>
                                <td>{{ $drop->dropReceivedDate ? date('M j, Y H:i', strtotime($drop->dropReceivedDate)) : '' }}</td>
                                <td>
                                @if (empty($drop->dropReceivedDate))
                                <a href="{{ route('drops.checkOut',$drop->idDrop) }}" class="btn btn-default btn-sm">Check-out</a>
                                @else <a disabled="disabled" class="btn btn-default btn-sm">Check-out</a>
                                @endif
                                <a href="{{ route('drops.show',$drop->idDrop) }}" class="btn btn-default btn-sm">View</a>
                                {{ Form::open(['route' => ['drops.destroy', $drop->idDrop], 'method' => 'delete', 'style'=>'display:inline-block']) }}
                                <button type="submit" class="btn btn-default btn-sm" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                {{ Form::close() }}
                                </td>
							    
						</tr>

					@endforeach

				</tbody>
			</table>

			<div class="text-center">
				{!! $drops->links(); !!}
			</div>
		</div>
	</section>
	
@stop