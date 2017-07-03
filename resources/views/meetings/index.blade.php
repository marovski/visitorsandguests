@extends('main')

@section('title', '| All Meetings')

@section('assets')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> 
@endsection

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

<form action="/search" method="get" role="form">
<div class="input-group custom-search-form">

                                <input type="text" name="q" class="form-control" placeholder="Search..." value="{{ Request::get('q') }}">    <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                              
                          
                      
                            </div>
      </form>


<section class="panel panel-default" >
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
                     @foreach($meetingsStaff as $meeting )
 
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
                             
                                
                        </tr>
               
                    @endforeach

                </tbody>
            </table>
            <div class="text-center">
                {!! $meetingsStaff->links(); !!}
            </div>
        
        </div>
        </section>
    
    
@stop

