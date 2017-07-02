@extends('main')

@section('title', '| View Meeting')

@section('content')

  <div class="row">
    <div class="col-md-8">
      
      <h3 class="lead">Topic: {!! $meetingData->meetingName !!}</h3>

      <hr>
          <p class="lead">Confidentiality: @if($meetingData->confidentiality==1) Top Secret @else Unclassified @endif</p>
          <hr>
          <h3>Sensibility: @if($meetingData->sensibility==1) Small @elseif($meetingData->sensibility==2) Medium @else High @endif</h3>
      <hr>
      <div class="visitors">
      <p class="lead">Escorted Visitors:
      
        
          <span class="label label-default">{{$meetingData->visitor->where('escorted', 1)->count()}} </span>
       
        </p>
        

      </div>

      <div id="visitors" style="margin-top: 50px;">
          <h3>External Visitors <small>{{ $meetingData->visitor()->count() }} total   </small></h3>
</h3>
        
         

        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Company</th>
              <th>ID Number</th>
              <th width="100px"></th>
            </tr>
          </thead>

          <tbody>
            @foreach ($meetingData->visitor as $visitorEx)
            <tr>
              <td>{{ $visitorEx->visitorName }}</td>
              <td>{{ $visitorEx->visitorEmail }}</td>
              <td>{{ $visitorEx->visitorCompanyName }}</td>
              <td>{{ $visitorEx->visitorCitizenCard }}</td>
              <td>
                <a href="{{ route('visitors.edit', $visitorEx->idVisitor)}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
           
                <a href="{{ route('visitors.show',$visitorEx->idVisitor) }}" class="btn btn-xs btn-icon btn-success"><span class="glyphicon glyphicon-print"></span></a>
              </td>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

        <div class="visitors">
        @foreach ($meetingData->user() as $user)
          <span class="label label-default">{{ $user->username }}</span>
        @endforeach
      </div>
        <div id="visitors" style="margin-top: 50px;">
        <h3>Internal Visitors <small>{{ $meetingData->user()->count() }} total   </small></h3>
  
         

        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Department</th>
           
              <th width="70px"></th>
            </tr>
          </thead>

          <tbody>
            @foreach ($meetingData->user as $visitorInt)
            <tr>
              <td>{{ $visitorInt->username }}</td>
              <td>{{ $visitorInt->email }}</td>
               <td>{{ $visitorInt->department }}</td>
              
              
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

  </div>

       

    <div class="col-md-4" >
      <div class="well">
     

        <dl class="dl-horizontal">
         <label>Start at:</label>
          <p>{{ ($meetingData->meetStartDate ? date('M j, Y h:ia', strtotime($meetingData->meetStartDate)) : '')  }}</p>
        </dl>

        <dl class="dl-horizontal">
          <label>End Date:</label>
          <p>{{ ($meetingData->meetEndDate ? date('M j, Y h:ia', strtotime($meetingData->meetEndDate)) : '')  }}</p>
        </dl>
        <hr>
        <div class="row">
        <div class="form-group">
        <div class="col-md-12">
             <a href="{{ route('meetings.edit', $meetingData->idMeeting) }}" class="btn btn-primary btn-block">Edit</a> 
        
            
          </div>



 <div class="col-md-12">
          <a href="{{ route('meetings.index') }}" class="btn btn-default btn-block btn-h1-spacing"> << See All Meetings</a> 
        
            
          </div>
          </div>
          
         
       

           
        </div>

       

      </div>
  
  </div>
  </div>

@endsection
