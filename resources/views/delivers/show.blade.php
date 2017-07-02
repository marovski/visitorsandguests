@extends('main')

@section('title', '| View Deliver')

@section('content')

	<div class="row">
		<div class="col-md-8">
		<table class="table">
          <thead>
            <tr>
              <th>Firm Supplier</th>
              <th>Content</th>
              <th>Entry Weight</th>
              <th>Exit Weight</th>
              <th width="100px"></th>
            </tr>
          </thead>

          <tbody>
            
            <tr>
              <td>{!! $deliver->deFirmSupplier !!}</td>
              <td>@foreach ($deliver->type as $typeItem)
        <span class="label label-default">{{ $typeItem->materialDetails }}</span>
       @endforeach</td>
              <td>{{ $deliver->entryWeight }}</td>
			  <td>{{ $deliver->exitWeight }}</td>
               </tr>

          </tbody>
        </table>
    
			
			<div id="backend-comments" style="margin-top: 50px;">
				<h3>Items <small>{{ $deliver->type()->count() }} total</small></h3>

				<table class="table">
					<thead>
						<tr>
							<th>Driver Name</th>
							<th>Vehicle License</th>
							<th>Danger</th>
							<th>Caution</th>
							<th>Quantitity</th>
							<th>Entry Time</th>
							<th>Exit Time</th>
						
							<th width="70px"></th>
						</tr>
					</thead>

					<tbody>
						@foreach ($deliver->type as $delivers)
				
						<tr>
							<td>{{ $deliver->deDriverName }}</td>
							<td>{{ $deliver->vehicleRegistry }}</td>
					
							<td>
								@if ($delivers->dangerousGood === 1) 
                                      {{ 'Danger' }}
                                    @elseif ($delivers->dangerousGood === 0) 
                                        {{ 'Not Danger' }}
                                    
                                     @endif

							</td>
									<td>
									@if ($delivers->sensitiveLevel === 1)
									{{ 'Low' }}
									@elseif($delivers->sensitiveLevel === 2)
									{{ 'Medium' }}
									@elseif ($delivers->sensitiveLevel === 3)
									 {{ 'High' }}
									@endif
									</td>
							<th>{{ $delivers->quantitity }}</th>
							<th>{{ $deliver->deEntryTime }}</th>
							<th>{{ $deliver->deExitTime }}</th>
							
							<td>
								<a href="{{ route('deliveryType.edit', $delivers->idDeliverType) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
								<a href="{{ route('deliveryType.destroy', $delivers->idDeliverType) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
					
						@endforeach
					</tbody>
				</table>
			</div>

		</div>

		<div class="col-md-4">
			<div class="well">
				

				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($deliver->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j, Y h:ia', strtotime($deliver->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('delivers.edit', 'Edit', array($deliver->idDeliver), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['delivers.destroy', $deliver->idDeliver], 'method' => 'DELETE']) !!}

						{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

						{!! Form::close() !!}
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('delivers.index', '<< See All Deliveries', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection