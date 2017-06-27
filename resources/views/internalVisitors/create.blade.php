
    @extends('main')

    @section('title', '| Create New Internal Visitor')

    @section('assets')
    <link rel='stylesheet' href='/css/parsley.css' />
    @endsection

    @section('content')
        <div class="row">

                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading"><span class="glyphicon glyphicon-blackboard"></span>  Create Internal Visitor for Meeting: {{ $meetingRestricted->meetingName }}</div>
                            <div class="panel-body">
                
                   <form  class="form-horizontal" role="form" method="POST" action="{{ route('visitors.saveInternalVisitor') }}" data-parsley-validate="" onsubmit="return ConfirmExternVisitor()">

 
                        {{ csrf_field() }}


                             <div class="form-group{{ $errors->has('meeting') ? ' has-error' : '' }}">
                            <label for="" class="col-md-4 control-label">Meeting:</label>

                            <div class="col-md-6">
                                

                                <select class="form-control" name="meeting" disabled="">
                                
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
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                   Save 
                                </button>

                                  <a href="{{ route('meetings.show', $meetingRestricted->idMeeting) }}" class="btn btn-danger btn-lg btn-block">Cancel</a>  
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                </div>
</div>

        @endsection