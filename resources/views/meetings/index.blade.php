@extends('main')

@section('title', '| All Meetings')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>All Meetings</h1>
        </div>

    <div class="col-md-2">
            <a href="{{ route('meetings.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">  <span class="glyphicon glyphicon-plus"></span> New Meeting</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div> <!-- end of .row -->

     <div class="table-responsive">

                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>  <th>#</th>
                         <th width="">Meeting Name</th>
                            <th width="">Visit Reason</th>
            
                           
                            <th width="">Status</th>
                            <th width="">Host</th>

                            <th width="">Start at</th>
                              
                               <th width="">Ended at</th>
                              <th width="">Visitor arrival at</th>
                                <th width="">Visitor departure at</th>
                        </tr>
                    </thead>

                    <tbody>
                     @foreach($meetings as $meeting )
 
                            <tr>
                            <th>{{ $meeting->idMeeting }}</th>
                             <th>{{ $meeting->meetingName }}</th>

                                <td>{{ $meeting->visitReason }}</td>
                          
                                <td> @if ($meeting->meetStatus === 1) 
                                      {{ 'Scheduled' }}
                                    @elseif ($meeting->meetStatus === 2) 
                                        {{ 'Waiting Confirmation' }}
                                    
                                    @elseif ($meeting->meetStatus === 3) 
                                        {{ 'Canceled' }}
                                    
                                     @elseif ($meeting->meetStatus === 4) 
                                        {{ 'Finished' }}
                                     @endif</td>
                                 
                                <td>{{$user->find($meeting->meetIdHost)->username}}</td>
                         
                                <td>{{ date('M j, Y H:i', strtotime($meeting->meetStartDate)) }}</td>
                                 <td>{{ date('M j, Y H:i', strtotime($meeting->meetEndDate)) }}</td>
                                   <td>{{ ($meeting->entryTime ? date('h:i:s A', strtotime($meeting->entryTime)) : '')  }}</td>
                                     <td>{{ ($meeting->exitTime ? date(' h:i:s A', strtotime($meeting->exitTime)) : '')  }}</td>
                                    <td>
                                <a href="{{ route('meetings.show', $meeting->idMeeting) }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-zoom-in"></span> View</a> 
                                </td>
                                <td>
                              
                                @if(!empty($meeting->entryTime))<a href="{{ route('meetings.checkin',$meeting->idMeeting)}}" class="btn btn-default btn-sm" disabled><i class="fa fa-mail-forward"></i> Check-In</a> 
                                 @else <a href="{{ route('meetings.checkin',$meeting->idMeeting)}}" class="btn btn-default btn-sm"><i class="fa fa-map-marker"></i> Check-In</a> @endif
                                 </td>
                                 <td>
                                @if(!empty($meeting->exitTime))<a href="{{ route('meetings.checkout',$meeting->idMeeting)}}" class="btn btn-default btn-xsms" disabled><i class="fa fa-mail-forward"></i> Check-Out</a> 
                                @else <a href="{{ route('meetings.checkout',$meeting->idMeeting)}}" class="btn btn-default btn-sm"><i class="fa fa-mail-forward" ></i> Check-Out</a> @endif
                                
                                </td>
                                
                        </tr>
               
                    @endforeach

                </tbody>
            </table>
            <div class="text-center">
                {!! $meetings->links(); !!}
            </div>
        
        </div>
    
    
@stop

