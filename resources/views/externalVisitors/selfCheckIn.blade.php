
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

			<div class="col-md-6" ng-controller="BarcodeCtrl">     
			<div data-barcode-scanner="barcodeScanned"></div>
			<div>
   			 <span>Barcode:</span>
    		<span data-ng-bind="model.barcode"></span>
			</div>
			<div><input type="text" data-ng-model="testvalue"></input></div>
			<div><span data-ng-bind="testvalue"></span></div>
			</div> 




            </div>
            </div>
            </div>
            </div>
            @endsection


