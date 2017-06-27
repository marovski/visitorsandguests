@extends('main')

@section('title', '| Lost and Found')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>Lost and Found</h1>
		</div>

	<div class="col-md-2">
			<a href="{{ route('losts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Register
            </a>
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
                            <th width="">Finder Name</th>
                            <th width="">Finder Phone</th>
                            <th width="">Description</th>
                            <th width="">Item Size</th>
                            <th width="">Receiver Name</th>
                            <th width="">Received at</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($losts as $lost )
                            <tr>
                                <td>{{ $lost->lostFoundFinder }}</td>
                                <td>{{ $lost->finderPhone }}</td>
                                <td>{{ $lost->lostFoundDescr }}</td>
                                <td>{{ $lost->lostFoundItemSize }}</td>
                                <td>{{ $lost->lostFoundReceiver }}</td>
                                <td>{{ $lost->lostFoundReceivedDate ? date('M j, Y H:i', strtotime($lost->lostFoundReceivedDate)) : '' }}</td>
                                <td>
                                @if (empty($lost->lostFoundReceivedDate))
                                <a href="{{ route('losts.show',$lost->idLostFound) }}" class="btn btn-default btn-sm">Check-out</a>
                                @else <a href="{{ route('losts.show',$lost->idLostFound) }}" disabled="disabled" class="btn btn-default btn-sm">Check-out</a>
                                @endif
                              
                                {{ Form::open(['route' => ['losts.destroy', $lost->idLostFound], 'method' => 'delete', 'style'=>'display:inline-block']) }}
                                <button type="submit" class="btn btn-default btn-sm" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                {{ Form::close() }}
                                </td>
							    
						</tr>

					@endforeach

				</tbody>
			</table>

			<div class="text-center">
				{!! $losts->links(); !!}
			</div>
		</div>
	</section>
	
@stop