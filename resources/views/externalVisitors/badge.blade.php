
    @extends('main')

    @section('title', '| Badge')

    @section('assets')
    <link rel='stylesheet' href='/css/parsley.css' />
    @endsection

    @section('content')
    <?php
use Carbon\Carbon;?>

    
    <div class="container" ng-app="MyApp" style="width: 550px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="width: 400px; height: 260px;">
                <div class="panel-body" ng-controller="showInputController">
                {!! Form::open(array('route'=>'visitors.badge')) !!}
                <div class="form-group" style="">
                <div class="row">
                <div class="col-md-6" style="width: 400px">
                    <div id="logo">
                    <img src="../images/nanium.jpg">
                     <h5 style="">Expires at: {{ date('d-m-Y', strtotime($current = Carbon::now()))}}</h5>
                    </div>
                    <div class="row"> 
                    <div class="col-xs-6">         
                    <h4 align="left">Visitor: {{ $externalVisitor->visitorName }}</h4>
                    @foreach ($externalVisitor->meeting as $meetingE)
                    <p align="left">
                    Topic: {{ $meetingE->meetingName }}<br>
                    Host: {{ $user->find($meetingE->meetIdHost)->username}}
                    </p>
                    </div>
                    <div class="col-xs-6 text-right">
                    {!! DNS2D::getBarcodeSVG(" $externalVisitor->idVisitor, $externalVisitor->visitorName, $externalVisitor->visitorCompanyName", 'QRCODE') !!}
                    </div>
                    <br>
                    <br>
                    @endforeach
                    </div>
                </div>
                </div>
                </div>
                {!! Form::close() !!}               
          
                </div>
                <br><br>
                <br><br>
                <div class="header b-b b-light hidden-print">
                <button href="#" class="btn btn-m btn-info pull-right" onClick="window.print();">Print</button>     
                </div>  
            </div>
        </div>
    </div>
</div>




        @endsection