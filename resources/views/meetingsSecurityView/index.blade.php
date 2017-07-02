@extends('main')

@section('title', '| All Meetings')
@section('assets')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  

@endsection

@section('content')
<div class="container" ng-app="MyApp" >
    <div class="row">
        <div class="col-md-10">
            <h1>All Meetings</h1>
        </div>
<!-- end of .row -->
</div>


<form action="/search" method="get" role="form">
<div class="input-group custom-search-form">

                                <input type="text" name="q" class="form-control" placeholder="Search..." value="{{ Request::get('q') }}">    <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                              
                          
                      
                            </div>
      </form>

<section class="panel panel-default"   ng-controller="showInputController">
<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>

 
     <div class="table-responsive" >

                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>  
                         <th width="">Meeting Name</th>
                            <th width="">Visit Reason</th>
            
                           
                            <th width="">Status</th>
                            <th width="">Host</th>

                            <th width="">Start </th>
                              
                               <th width="">Ended </th>
                             
                        </tr>
                    </thead>

                    <tbody>
                     @foreach($meetings as $meeting )
 
                            <tr>
                            
                             <th>{{ $meeting->meetingName }}</th>

                                <td>{{ $meeting->visitReason }}</td>
                          
                                <td> @if ($meeting->meetStatus === 1) 
                                      {{ 'Scheduled' }}
                                    @elseif ($meeting->meetStatus === 2) 
                                        {{ 'Started' }}
                                    
                                    @elseif ($meeting->meetStatus === 3) 
                                        {{ 'Canceled' }}
                                    
                                     @elseif ($meeting->meetStatus === 4) 
                                        {{ 'Finished' }}
                                     @endif</td>
                                 
                                <td>{{$user->find($meeting->meetIdHost)->username}}</td>
                         
                                <td>{{ date('M j, Y H:i', strtotime($meeting->meetStartDate)) }}</td>
                                 <td>{{ date('M j, Y H:i', strtotime($meeting->meetEndDate)) }}</td>
                               
                                    <td>
                                <a href="{{ route('meetings.show', $meeting->idMeeting) }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-zoom-in"></span> View</a> 
                                </td>
                                <td>
                              
                                @if(!empty($meeting->entryTime))<button  class="btn btn-default btn-sm" disabled="true"><i class="fa fa-map-marker"></i>  Check-In</button> 
                                 @else 
                                  {!! Form::open(array('action' => array('MeetingController@checkin', $meeting->idMeeting))) !!}
                              
                               <button  type="submit" class="btn btn-default btn-sm"><i class="fa fa-map-marker"></i> Check-In</button>
                              
                                {!! Form::close() !!}
                                @endif
                                 </td>
                                 <td>
                                @if(!empty($meeting->exitTime))<button class="btn btn-default btn-sm" disabled="true"><i class="fa fa-mail-forward"></i> Check-Out</button> 
                                @else 
                                {!! Form::open(array('action' => array('MeetingController@checkout', $meeting->idMeeting))) !!}
                              
                             <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-mail-forward" ></i> Check-Out</button>
                                {!! Form::close() !!}

                                @endif
                                
                                </td>
                                
                        </tr>
               
                    @endforeach

                </tbody>
            </table>
            <div class="text-center">
                {!! $meetings->links(); !!}
            </div>
        
        </div>
        </section>
    
    </div>
@stop

