@extends('main')

@section('title', '| Lost and Found')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>Lost and Found</h1>
		</div>

	<div class="col-md-2">
			<a href="{{ route('losts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing"><span class="glyphicon glyphicon-plus"></span> New Lost Item
            </a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>
     <!-- end of .row -->
<section class="panel panel-default" ng-app="MyApp"  ng-controller="showInputController" >
<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                    <!-- LOADING ICON -->
      <!-- show loading icon if the loading variable is set to true -->
    <div ng-show="loading == false"  ><p class="text-center" ><span class="loader"></span></p></div>
     <div class="table-responsive" ng-show="loading == true">

                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>
                            <th width="">Finder Name</th>
                            <th width="">Finder Phone</th>
                            <th width="">Item Description</th>
                            <th width="">Receiver Name</th>
                            <th width="">Claimed at</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($losts as $lost )
                            <tr>
                                <td>{{ $lost->finderName }}</td>
                                <td>{{ $lost->finderPhone }}</td>
                                <td>{{ $lost->itemDescription }}</td>
                                <td>{{ $lost->receiverName }}</td>
                                <td>{{ $lost->claimedDate ? date('M j, Y H:i', strtotime($lost->claimedDate)) : '' }}</td>
                                <td>

                                     <a href="{{ route('losts.show',$lost->idLostFound) }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-zoom-in"></span> View</a>
                                     </td>
                                     <td>
                                @if (empty($lost->claimedDate))
                                <a href="{{ route('losts.checkout',$lost->idLostFound) }}" class="btn btn-default btn-sm"><i class="fa fa-mail-forward" ></i> Check-out</a>
                                @else <a  disabled="disabled" class="btn btn-default btn-sm"><i class="fa fa-mail-forward" ></i> Check-out</a>
                                @endif
                           </td>
                           <td>
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