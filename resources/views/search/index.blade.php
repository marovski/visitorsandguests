@extends('main')

@section('title', '| Search Meetings Results')

@section('content')

	<div class="container">
     
     <div class="row">
         <div class="col-md-8 col-md-offset-2">
             
<div class="panel panel-default">
    
    <div class="panel-heading">Search Results for "{{ Request::get('q') }}"</div>

    <div class="panel-body">
        

    @if($meetings->count())

    <h4>Meetings</h4>

<div class="well">
@foreach($meetings as $meeting)
    <div class="media">
    <div class="media-left">
        <table class="table">
    <thead>
      <tr>
        <th>Meeting Name</th>
        <th>Visit Reason</th>
        <th>Host</th>
        <th>Start Date</th>
         <th>End Date</th>
         <th>Visitor Name</th>

      </tr>
    </thead>
    <tbody>
    @if(!empty($meeting->entryTime))
        <tr class="success">
        <td>{{ $meeting->meetingName }}</td>
        <td>{{ $meeting->visitReason }}</td>
        <td>{{$user->find($meeting->meetIdHost)->username}}</td>
        <td>{{ date('M j, Y H:i', strtotime($meeting->meetStartDate)) }}</td>
           <td>{{ date('M j, Y H:i', strtotime($meeting->meetEndDate)) }}</td>
             <td></td>
      </tr>
      @else
          <tr class="info">
        <td>{{ $meeting->meetingName }}</td>
        <td>{{ $meeting->visitReason }}</td>
        <td>{{$user->find($meeting->meetIdHost)->username}}</td>
        <td>{{ date('M j, Y H:i', strtotime($meeting->meetStartDate)) }}</td>
           <td>{{ date('M j, Y H:i', strtotime($meeting->meetEndDate)) }}</td>
           <td></td>
      </tr>  
      @endif
    </tbody>
  </table>

    </div>
        

    </div>
    @endforeach

</div>

@endif



    </div>
</div>
         </div>
     </div>   
    </div>
@stop