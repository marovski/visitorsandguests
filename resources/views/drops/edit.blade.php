 @extends('main')

    @section('title', '| Drop Edit')

    @section('assets')
    <link rel='stylesheet' href='/css/parsley.css' />
    @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Drop Edit</div>
                <div class="panel-body">
                  {!! Form::model($drop, array('method'=>'post','class'=>'form-horizontal', 'role'=> 'form', 'route' => array('drops.updateEdit', $drop->idDrop))) !!}
                    
                        <div class="form-group{{ $errors->has('dropperCompany') ? ' has-error' : '' }}">
                            <label for="dropperCompany" class="col-md-4 control-label">Company Name:</label>
                            <div class="col-md-6">
                            <input id="dropperCompany" type="text" class="form-control" name="dropperCompany" value="{{ $drop->dropperCompanyName}}">

                                @if ($errors->has('dropperCompany'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dropperCompany') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div>

                        <div class="form-group{{ $errors->has('dropperName') ? ' has-error' : '' }}">
                            <label for="dropperName" class="col-md-4 control-label">Dropper Name:</label>

                            <div class="col-md-6">
                                <input id="dropperName" type="text" class="form-control" name="dropperName" value="{{ $drop->dropperName }}">

                                @if ($errors->has('dropperName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dropperName') }}</strong>
                                    </span>
                                @endif
                              </div>
                        </div>

                        <div class="form-group{{ $errors->has('dropperName') ? ' has-error' : '' }}">
                            <label for="ReceiverName" class="col-md-4 control-label">Receiver Name:</label>

                            <div class="col-md-6">
                                <input id="ReceiverName" type="text" class="form-control" name="ReceiverName" value="{{ $drop->dropReceiver }}" required autofocus>

                                @if ($errors->has('ReceiverName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ReceiverName') }}</strong>
                                    </span>
                                @endif
                              </div>
                        </div>


                          <div class="form-group{{ $errors->has('dropImportance') ? ' has-error' : '' }}">
                            <label for="dropSize" class="col-md-4 control-label">Type:</label>

                            <div class="col-md-6" >
                            <p>
                                <select class="form-control" name="dropSize">  
                                      @if($drop->dropSize)=='L')
                               
                                      <option value="L">Large</option>
                                        @elseif(($drop->dropSize)=='M')
                                        
                                         <option value="M">Medium</option>
                                        @endif
                               
                                  
                                </select>

                                @if ($errors->has('dropSize'))
                                    <span class="help-block">p
                                        <strong>{{ $errors->first('dropSize') }}</strong>
                                    </span>
                                @endif
                            </p>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dropImportance') ? ' has-error' : '' }}">
                            <label for="dropImportance" class="col-md-4 control-label">Importance:</label>

                            <div class="col-md-6" >
                            <p>
                                <select class="form-control" name="dropImportance">  
                                @if (($drop->dropImportance))           
                                <option value="High">{{ $drop->dropImportance }}</option>
                                @else <option value="High">High</option>
                                @endif
                                @if (($drop->dropImportance))           
                                <option value="Medium">{{ $drop->dropImportance }}</option>
                                @else <option value="Medium">Medium</option>
                                @endif
                                @if (($drop->dropImportance))           
                                <option value="Small">{{ $drop->dropImportance }}</option>
                                @else <option value="Small">Small</option>
                                @endif
                                  
                                </select>

                                @if ($errors->has('dropImportance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dropImportance') }}</strong>
                                    </span>
                                @endif
                            </p>
                            </div>
                        </div>
                     

                        <div class="form-group{{ $errors->has('dropDescription') ? ' has-error' : '' }}">
                            <label for="dropDescription" class="col-md-4 control-label"> Description:</label>

                            <div class="col-md-6">
                                <textarea rows="4" cols="" class="form-control" name="dropDescription">{{ $drop->dropDescr }}</textarea>                               

                                @if ($errors->has('dropDescription'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dropDescription') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <a href="{{ route('drops.index') }}" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                     {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection