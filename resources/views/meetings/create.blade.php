

    @extends('main')

    @section('title', '| Create New Meeting')

    @section('assets')
    <link rel='stylesheet' href='/css/parsley.css' />
    @endsection

    @section('content')
    <div class="container" ng-app="MyApp" > 
        <div class="row">

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-blackboard"></span>  Create Meeting</div>
                    <div class="panel-body">

                        <form  class="form-horizontal"  role="form" method="POST" action="{{ route('meetings.store') }}" data-parsley-validate="">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('meetingName') ? ' has-error' : '' }}">
                                <label for="meetingName" class="col-md-4 control-label">Meeting Topic:</label>

                                <div class="col-md-6">
                                    <textarea rows="2" cols="" class="form-control" name="meetingTopic" required autofocus></textarea>                                

                                    @if ($errors->has('meetingName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('meetingName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('meetStartDate') ? ' has-error' : '' }}">
                                <label for="meetStartDate" class="col-md-4 control-label">Start Date:</label>

                                <div class="col-md-6">
                                    <input id="meetStartDate" type="date" class="form-control" name="meetStartDate" value="{{ old('meetStartDate') }}" required autofocus>

                                    @if ($errors->has('meetStartDate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('meetStartDate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                
                            </div>
                            <div class="form-group{{ $errors->has('meetEndDate') ? ' has-error' : '' }}">
                                <label for="meetEndDate" class="col-md-4 control-label">End Date:</label>

                                <div class="col-md-6">
                                    <input id="meetEndDate" type="date" class="form-control" name="meetEndDate" value="{{ old('meetEndDate') }}"  autofocus>

                                    @if ($errors->has('meetEndDate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('meetEndDate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                
                            </div>

                            

                            <div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}">
                                <label for="room" class="col-md-4 control-label">Room:</label>

                                <div class="col-md-6">

                                    <p>
                                        <select class="form-control" name="room">
                                          <option value="1">Room 1</option>
                                          <option value="2">Room 2</option>
                                          <option value="3">Room 3</option>
                                          <option value="4">Room 4</option>
                                          <option value="5">Room 5</option>
                                      </select>


                                      @if ($errors->has('room'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('room') }}</strong>
                                    </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('visitReason') ? ' has-error' : '' }}">
                            <label for="visitReason" class="col-md-4 control-label"> Meeting Purpose:</label>

                            <div class="col-md-6">
                                <textarea rows="2" cols="" class="form-control" name="visitReason"></textarea>                                

                                @if ($errors->has('visitReason'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('visitReason') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}">
                            <label for="confidentiality" class="col-md-4 control-label">Confidentiality:</label>

                            <div class="col-md-6">

                                <input id="confidentiality" type="checkbox"  name="confidentiality" value="1"  autofocus>

                                </div>
                        </div>


                        <div class="form-group{{ $errors->has('sensibility') ? ' has-error' : '' }}">
                            <label for="sensibility" class="col-md-4 control-label">Sensibility:</label>

                            <div class="col-md-6">
                             <label class="radio-inline"><input type="radio" name="sensibility" value="1">Small</label>
                             <label class="radio-inline"><input type="radio" name="sensibility" value="2">Medium </label>
                             <label class="radio-inline"><input type="radio" name="sensibility" value="3">High</label>
                             

                             @if ($errors->has('sensibility'))
                             <span class="help-block">
                                <strong>{{ $errors->first('sensibility') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('meetStatus') ? ' has-error' : '' }}">
                        <label for="meetStatus" class="col-md-4 control-label">Status:</label>

                        <div class="col-md-6" >
                            <p>
                                <select class="form-control" value="scheduled" name="meetStatus">
                                  <option value="1">Scheduled</option>
                                  <option disabled value="2">Waiting Confirmation</option>
                                  <option  disabled="" value="3">Canceled</option>
                                  <option  disabled="" value="4">Finished</option>
                              </select>

                              @if ($errors->has('meetStatus'))
                              <span class="help-block">
                                <strong>{{ $errors->first('meetStatus') }}</strong>
                            </span>
                            @endif
                        </p>
                    </div>
                </div>


                <div class="form-group{{ $errors->has('meetIdHost') ? ' has-error' : '' }}">
                    <label for="meetIdHost" class="col-md-4 control-label">Host Identification:</label>

                    <div class="col-md-6">
                        <input class="form-control" name="meetIdHost" readonly value="{{ Auth::user()->username}}">  </input>                                

                        @if ($errors->has('meetIdHost'))
                        <span class="help-block">
                            <strong>{{ $errors->first('meetIdHost') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('sendmail') ? ' has-error' : '' }}">
                    <label for="sendmail" class="col-md-4 control-label">Send Email:</label>

                    <div class="col-md-6">

                        <input id="sendmail" type="checkbox"  name="sendmail" value="1" >

                        @if ($errors->has('sendmail'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sendmail') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-lg btn-block btn-default btn-h1-spacing">
                           Save Meeting
                       </button>


                   </div>
               </div>              

           </form>


       </div>
    </div>








    </div>
     <div class="col-md-4" >

      <div class="well">
     

        <dl class="dl-horizontal">

          <label>All Your Meetings</label>
        <div class="table-responsive">

                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>  <th>#</th>
                         <th width="">Meeting Name</th>
                            <th width="">Visit Reason</th>
            
                           
                            <th width="">Status</th>
                        
                            <th width="">Start at</th>
                              
                               <th width="">Ended at</th>
                                <th width="">Visitor arrival at</th>
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
                                 
                             
                         
                                <td>{{ date('M j, Y', strtotime($meeting->meetStartDate)) }}</td>
                                 <td>{{ date('M j, Y', strtotime($meeting->meetEndDate)) }}</td>
                                   <td>{{ date('M j, Y', strtotime($meeting->entryTime)) }}</td>
                              
                                
                        </tr>
               
                    @endforeach

                </tbody>
            </table>
       
        </div>

       </dl>
        <hr>

      


   
  
  </div>
  </div>

   
    </div>



    @endsection
