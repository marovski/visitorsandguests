
  @extends('main')

  @section('title', '| Edit Visitor')

  @section('assets')
  <link rel='stylesheet' href='/css/parsley.css' />
  @endsection

  @section('content')
  
      <div class="row"  >

         

      <div class="panel-heading"><span class="glyphicon glyphicon-blackboard"></span> Edit External Visitor</div>



  {!! Form::model($externalVisitor,['route' => ['visitors.update', $externalVisitor->idVisitor], 'method' => 'PUT','class' => 'form-horizontal','data-parsley-validate' => '']) !!}
  {{ csrf_field() }}

  <div class="col-md-8">
                        

                     

                        

           <div class="form-group{{ $errors->has('visitorName') ? ' has-error' : '' }}">
                            <label for="visitorName" class="col-md-4 control-label"> Name:</label>

                            <div class="col-md-6">
                                <input id="visitorName" type="text" class="form-control" name="visitorName" value="{{ $externalVisitor->visitorName }}"  autofocus  ng-model="visitorName">

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
                                <input id="visitorCitizenCard" type="text" class="form-control" name="visitorCitizenCard" value="{{ $externalVisitor->visitorCitizenCard}}"  autofocus  ng-model="visitorCitizenCard"></input>

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
                            
                                <input id="visitorNPhone" type="text"  class="form-control" name="visitorNPhone" value="{{$externalVisitor->visitorNPhone  }}"  autofocus ng-model="visitorNPhone">

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
                               <input type="email" class="form-control" name="visitorEmail" value="{{ $externalVisitor->visitorEmail }}"></input>

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
                                <input id="visitorCompanyName" type="text" class="form-control" name="visitorCompanyName" value="{{ $externalVisitor->visitorCompanyName }}"  autofocus  ng-model="visitorCompanyName">

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
                                <input id="visitorDeclaredGood" type="text" class="form-control" name="visitorDeclaredGood" value="{{ $externalVisitor->visitorDeclaredGood }}"  autofocus >

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

           
          </div>


  <div class="col-md-4" > 
    <div class="well">
      <dl class="dl-horizontal">
        <dt>Created At:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($externalVisitor->created_at)) }}</dd>
      </dl>

      <dl class="dl-horizontal">
        <dt>Last Updated:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($externalVisitor->updated_at)) }}</dd>
      </dl>
      <hr>
      <div class="row">
        <div class="col-sm-6">
       
         
        <a class="btn btn-danger btn-block"  href="{{ route('meetings.show', $externalVisitor->meeting->first()->idMeeting) }}">Cancel</a>
        </div>
        <div class="col-sm-6">
          {{ Form::submit('Save Changes', ['class' => 'btn btn-default btn-block']) }}
        </div>
      </div>

    </div>
    </div>
    
{!! Form::close() !!}

              </div><!-- end of .row (form) -->
     




 


  @endsection
