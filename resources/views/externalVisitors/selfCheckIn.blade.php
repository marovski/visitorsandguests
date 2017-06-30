
@extends('main')

@section('title', '| Self Check-in')

@section('assets')
<link rel='stylesheet' href='/css/parsley.css' />
@endsection

@section('content')


<div class="row" ng-app="MyApp">

     <div class="col-md-8 col-md-offset-2">
     <div class="panel panel-default" ng-controller="showInputController">
    <div class="panel-heading"><span class="glyphicon glyphicon-blackboard"></span> Visitor Self Check-In</div>

                                                    <!-- LOADING ICON -->
    		    <!-- show loading icon if the loading variable is set to true -->
   			<div ng-show="loading == false"  ><p class="text-center" ><span class="loader"></span></p></div>
            <div class="panel-body"  ng-show="loading == true" > 
            <form  class="form-horizontal" >
            	
            	  <div class="form-group{{ $errors->has('visitorName') ? ' has-error' : '' }}">
                            <label for="visitorName" class="col-md-4 control-label"> Name:</label>

                            <div class="col-md-6">
                    <input id="visitorName" type="text" class="form-control" name="visitorName" value=""  autofocus  ng-model="visitorName"  
                              >

                                @if ($errors->has('visitorName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visitorName') }}</strong>
                                    </span>
                                @endif
                            </div>

                            </div>
                              <div class="form-group{{ $errors->has('visitorName') ? ' has-error' : '' }}">
                            <label for="visitorName" class="col-md-4 control-label"> Company:</label>

                            <div class="col-md-6">
                    <input id="visitorCompany" type="text" class="form-control" name="visitorCompany" value=""  autofocus    
                              >

                                @if ($errors->has('visitorCompany'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visitorCompany') }}</strong>
                                    </span>
                                @endif
                            </div>

                            </div>
                                <div class="form-group{{ $errors->has('visitorEmail') ? ' has-error' : '' }}">
                            <label for="visitorName" class="col-md-4 control-label"> Email:</label>

                            <div class="col-md-6">
                    <input id="visitorEmail" type="text" class="form-control" name="visitorEmail" value=""  autofocus    
                              >

                                @if ($errors->has('visitorEmail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visitorEmail') }}</strong>
                                    </span>
                                @endif
                            </div>

                            </div>

                               <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-basic btn-sm btn-block">
                                    Confirm
                                </button>
                              
                                  <a href="#" class="btn btn-default btn-sm btn-block">Cancel</a>  
                            </div>
                        </div

            </form>
		{{-- 	<div class="col-md-6" ng-controller="BarcodeCtrl">     
			<div data-barcode-scanner="barcodeScanned"></div>
			<div>
   			 <span>Barcode:</span>
    		<span data-ng-bind="model.barcode"></span>
			</div>
			<div><input type="text" data-ng-model="testvalue"></input></div>
			<div><span data-ng-bind="testvalue"></span></div>
			</div> 
 --}}



            </div>
            </div>
            </div>
            </div>
            @endsection


