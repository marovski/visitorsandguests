
    @extends('main')

    @section('title', '| Create New Internal Visitor')

    @section('assets')
    <link rel='stylesheet' href='/css/parsley.css' />
    @endsection

    @section('content')
        <div class="row" ng-app="MyApp">

                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading"><span class="glyphicon glyphicon-blackboard"></span>  Create Internal Visitor for Meeting: <b>{{ $meetingRestricted->meetingName }}</b></div>
                                    <div class="panel-body" ng-controller="showInputController">
                                <!-- LOADING ICON -->
            <!-- show loading icon if the loading variable is set to true -->
        <div ng-show="loading == false"  ><p class="text-center" ><span class="loader"></span></p></div>
                   <form  class="form-horizontal" role="form" method="POST" action="{{ route('visitors.storeInternalVisitor') }}" data-parsley-validate="" onsubmit="return ConfirmExternVisitor()"  ng-show="loading == true">

 
                        {{ csrf_field() }}


                             <div class="form-group{{ $errors->has('meeting') ? ' has-error' : '' }}">
                            <label for="meeting" class="col-md-4 control-label">Meeting:</label>

                            <div class="col-md-6">
                                

                                <select class="form-control" id="meeting"  name="meeting" readonly>
                                
                                    <option value="{{ $meetingRestricted->idMeeting }}"> {{ $meetingRestricted->meetingName }}</option>
                                  
                                </select>

                               

                                @if ($errors->has('meeting'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('meeting') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
              
                            <div class="form-group{{ $errors->has('internalVisitor') ? ' has-error' : '' }}">
                            <label for="" class="col-md-4 control-label">Name:</label>

                            <div class="col-md-6">
                                
                                <select class="form-control" name="internalVisitor" >
                                @foreach($users as $user )
                                    <option value="{{ $user->idUser }}"> {{ $user->username }}</option>
                                     @endforeach
                                </select>
                                </p>

                                @if ($errors->has('internalVisitor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('internalVisitor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                                                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-basic btn-sm btn-block">
                                   Save 
                                </button>

                                  <a href="{{ route('meetings.show', $meetingRestricted->idMeeting) }}" class="btn btn-default btn-sm btn-block">Cancel</a>  
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                </div>
</div>

        @endsection