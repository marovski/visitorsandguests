

    @extends('main')

    @section('title', '| Create New External Visitor')

    @section('assets')
    <link rel='stylesheet' href='/css/parsley.css' />
    @endsection

    @section('content')

        <div class="row">

                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading"><span class="glyphicon glyphicon-blackboard"></span>  Create New External Visitor for Meeting - {{$meeting->meetingName}}</div>
                            <div class="panel-body">



                
                    <form  class="form-horizontal" role="form" method="POST" action="{{ route('visitors.store') }}" data-parsley-validate="" onsubmit="return ConfirmExternVisitor()">
                          
                        {{ csrf_field() }}
                           <input id="idMeeting" name="idMeeting" class="ng-hide" type="number"  value="{{$meeting->idMeeting}}"/>
              
                        <div class="form-group{{ $errors->has('visitorName') ? ' has-error' : '' }}">
                            <label for="visitorName" class="col-md-4 control-label"> Name:</label>

                            <div class="col-md-6">
                                <input id="visitorName" type="text" class="form-control" name="visitorName" value="{{ old('visitorName') }}"  autofocus  ng-model="visitorName">

                                @if ($errors->has('visitorName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visitorName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>
                         <div class="form-group{{ $errors->has('visitorCitizenCardType') ? ' has-error' : '' }}">
                            <label for="visitorCitizenCardType" class="col-md-4 control-label">Citizen Identification Type:</label>

                            <div class="col-md-6"  name="visitorCitizenCardType">
                                <select class="form-control">
                                  <option value="1">Passport</option>
                                  <option value="2">Citizen Card</option>
                                 
                                </select>

                               

                                @if ($errors->has('visitorCitizenCardType'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visitorCitizenCardType') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('visitorCitizenCard') ? ' has-error' : '' }}">
                            <label for="visitorCitizenCard" class="col-md-4 control-label">Citizen Card/Passaport Number:</label>

                            <div class="col-md-6">
                                <input id="visitorCitizenCard" type="text" class="form-control" name="visitorCitizenCard" value="{{ old('visitorCitizenCard') }}"  autofocus  ng-model="visitorCitizenCard"></input>

                                @if ($errors->has('visitorCitizenCard'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visitorCitizenCard') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                              
                        <div class="form-group{{ $errors->has('visitorNPhone') ? ' has-error' : '' }}">
                            <label for="visitorNPhone" class="col-md-4 control-label">Phone Number:</label>

                            <div class="col-md-6">
                            
                                <input id="visitorNPhone" type="text"  class="form-control" name="visitorNPhone" value="{{ old('visitorNPhone') }}"  autofocus ng-model="visitorNPhone">

                                @if ($errors->has('visitorNPhone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visitorNPhone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('visitorEmail') ? ' has-error' : '' }}">
                            <label for="visitorEmail" class="col-md-4 control-label">Email:</label>

                            <div class="col-md-6">
                               <input type="email" class="form-control" name="visitorEmail"></input>

                                @if ($errors->has('visitorEmail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visitorEmail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('visitorEmail') ? ' has-error' : '' }}">
                            <label for="visitorEmail" class="col-md-4 control-label">Confirm Email:</label>

                            <div class="col-md-6">
                               <input type="email" class="form-control" name="visitorEmail"></input>

                                @if ($errors->has('visitorEmail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visitorEmail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('visitorCompanyName') ? ' has-error' : '' }}">
                            <label for="visitorCompanyName" class="col-md-4 control-label">Company:</label>

                            <div class="col-md-6">
                                <input id="visitorCompanyName" type="text" class="form-control" name="visitorCompanyName" value="{{ old('visitorCompanyName') }}"  autofocus  ng-model="visitorCompanyName">

                                @if ($errors->has('visitorCompanyName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visitorCompanyName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('wifiAccess') ? ' has-error' : '' }}">
                            <label for="wifiAccess" class="col-md-4 control-label">WiFi Access:</label>

                            <div class="col-md-6">
                                <input id="wifiAccess" type="checkbox" name="wifiAccess" value="1"  autofocus>

                                @if ($errors->has('wifiAccess')) 
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wifiAccess') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('visitorDeclaredGood') ? ' has-error' : '' }}">
                            <label for="visitorDeclaredGood" class="col-md-4 control-label">Declared Goods:</label>

                            <div class="col-md-6">
                                <input id="visitorDeclaredGood" type="text" class="form-control" name="visitorDeclaredGood" value=""  autofocus >

                                @if ($errors->has('visitorDeclaredGood'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visitorDeclaredGood') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('visitorDangerousGood') ? ' has-error' : '' }}">
                            <label for="visitorDangerousGood" class="col-md-4 control-label">Dangerous Goods:</label>

                            <div class="col-md-6">
                                <input id="visitorDangerousGood" type="checkbox" name="visitorDangerousGood" value="1"  autofocus >

                                @if ($errors->has('visitorDangerousGood')) 
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visitorDangerousGood') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('escorted') ? ' has-error' : '' }}">
                            <label for="escorted" class="col-md-4 control-label">Escorted:</label>

                            <div class="col-md-6">
                                <input id="escorted" type="checkbox" name="escorted" value="1"  autofocus >

                                @if ($errors->has('escorted')) 
                                    <span class="help-block">
                                        <strong>{{ $errors->first('escorted') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                                                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Save
                                </button>
                              
                                  <a href="{{ route('meetings.show', $meeting->idMeeting) }}" class="btn btn-danger btn-lg btn-block">Cancel</a>  
                            </div>
                        </div>
                        
                  </form>
                </div>
                </div>
                </div>
                </div>
                
         
       

        @endsection