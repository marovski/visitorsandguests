
@extends('main')

	@section('title', '| Self Check-in')

	@section('assets')
	<link rel='stylesheet' href='/css/parsley.css' />
	@endsection

	@section('content')
<div ng-app="app" ng-controller="BarcodeCtrl">     
    <div data-barcode-scanner="barcodeScanned"></div>
    <div>
        <span>Barcode:</span>
        <span data-ng-bind="model.barcode"></span>
    </div>
    <div><input type="text" data-ng-model="testvalue"></input></div>
    <div><span data-ng-bind="testvalue"></span></div>
</div> 
  <div id="camera_info"></div>
    <div id="stream_stats"></div>

    <div id="camera">
      <div class="placeholder">
        Your browser does not support camera access.<br>
        We recommend
        <a href="https://www.google.com/chrome/" target="_blank">Chrome</a>
        &mdash; modern, secure, fast browser from Google.<br>
        It's free.
      </div>
    </div><br>

    <button id="take_snapshots">Take more snapshots</button>
    <button id="show_stream">Show stream</button><br>

    <div id="snapshots"></div>

    <button id="discard_snapshot">Discard snapshot</button>
    <button id="upload_snapshot">Upload to URL</button><br>

    <input type="text" id="api_url" placeholder="https://example.com/upload"><br>

    <img src="loader.gif" id="loader">
    <div id="upload_status"></div>
    <div id="upload_result"></div>