 @extends('main')

    @section('title', '| Lost and Found Check-out')

    @section('assets')
    <link rel='stylesheet' href='/css/parsley.css' />
    @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Lost and Found Check-out</div>
                <div class="panel-body">
                  {!! Form::model($lost, array('method'=>'PATCH','class'=>'form-horizontal', 'role'=> 'form', 'route' => array('losts.update', $lost->idLostFound))) !!}

                      <div class="form-group{{ $errors->has('finderName') ? ' has-error' : '' }}">
                            <label for="finderName" class="col-md-4 control-label">Finder Name:</label>

                            <div class="col-md-6">
                                <input id="finderName" type="text" class="form-control" name="finderName" disabled="true" value="{{ $lost->lostFoundFinder }}" required autofocus>

                                @if ($errors->has('finderName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('finderName') }}</strong>
                                    </span>
                                @endif
                            </div>
                       </div>

                       <div class="form-group{{ $errors->has('finderPhone') ? ' has-error' : '' }}">
                            <label for="finderPhone" class="col-md-4 control-label">Finder Phone:</label>

                            <div class="col-md-6">
                                <input id="finderPhone" type="text" class="form-control" name="finderPhone" disabled="true" value="{{ $lost->finderPhone=$request->finderPhone }}" required autofocus>

                                @if ($errors->has('finderPhone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('finderPhone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('ReceiverName') ? ' has-error' : '' }}">
                            <label for="ReceiverName" class="col-md-4 control-label">Receiver Name:</label>

                            <div class="col-md-6">
                                <input id="ReceiverName" type="text" class="form-control" name="ReceiverName" value="{{ old('ReceiverName') }}" required autofocus>

                                @if ($errors->has('ReceiverName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ReceiverName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('receiverPhone') ? ' has-error' : '' }}">
                            <label for="receiverPhone" class="col-md-4 control-label">Receiver Phone:</label>

                            <div class="col-md-6">
                                <input id="receiverPhone" type="text" class="form-control" name="receiverPhone" value="{{ old('receiverPhone') }}" required autofocus>

                                @if ($errors->has('receiverPhone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('receiverPhone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lostFoundDescription') ? ' has-error' : '' }}">
                            <label for="lostFoundDescription" class="col-md-4 control-label"> Description:</label>

                            <div class="col-md-6">
                                <textarea rows="4" cols="" class="form-control" disabled="true" name="lostFoundDescription">{{ $lost->lostFoundDescr }}</textarea>                               

                                @if ($errors->has('lostFoundDescription'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lostFoundDescription') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lostFoundItemSize') ? ' has-error' : '' }}">
                            <label for="lostFoundItemSize" class="col-md-4 control-label">Item:</label>
                             <div class="col-md-6">
                                <label class="radio-inline"><input type="radio" name="lostFoundItemSize" disabled="true"  checked="checked" value="">{{ $lost->lostFoundItemSize}}</label>
                                

                                @if ($errors->has('lostFoundItemSize'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lostFoundItemSize') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div>

                        <div class="form-group{{ $errors->has('lostFoundImportance') ? ' has-error' : '' }}">
                            <label for="lostFoundImportance" class="col-md-4 control-label">Importance:</label>

                            <div class="col-md-6" >
                            <p>
                                <select class="form-control" name="lostFoundImportance" disabled="true">
                                  <option value="">{{ $lost->lostFoundImportance }}</option>
                                  
                                </select>

                                @if ($errors->has('lostFoundImportance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lostFoundImportance') }}</strong>
                                    </span>
                                @endif
                            </p>
                            </div>
                        </div>

                                                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Check-out
                                </button>
                                <a href="{{ route('losts.index') }}" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                     {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection