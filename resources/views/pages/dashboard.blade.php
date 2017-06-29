
  @extends('main')
  @section('title','| HomePage')

    @section('content')
    
<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Dashboard</a></li>
        <li><a href="#">Age</a></li>
        <li><a href="#">Gender</a></li>
        <li><a href="#">Geo</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Logo</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Dashboard</a></li>
        <li><a href="#section2">Age</a></li>
        <li><a href="#section3">Gender</a></li>
        <li><a href="#section3">Geo</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
     
        <!-- prepare a DOM container with width and height -->
    <div id="main" style="width: 600px;height:400px;"></div>
    <script type="text/javascript">
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('main'));

        // specify chart configuration item and data
        var option = {

            title: {
                text: '{{ date('M') }}' + ' Regists'
            },
            tooltip: { trigger: 'axis'},
            legend: {
                data:['Sales']
            },
            xAxis: {
                data: ["Deliveries","Drops","LostF Items","Meetings","Visitors"]
            },
            yAxis: {},
            series: [{
                name: 'regists',
               
                type: 'bar',
                data: [{{ $deliveries->count() }},{{  $drops->count() }}, {{ $lostItems->count() }}, {{ $meetings->count() }}, {{ $visitors->count() }}]
            }]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
    </script>
      </div>
      <div class="row" >
        <div class="col-sm-3" >
          <div class="well">
     
             <div id="main1" style="width: 600px;height:400px;"></div>
            <script type="text/javascript">
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('main1'));

        // specify chart configuration item and data
        var option = {
           color: 'blue',
            title: {
                text: 'Users'
            },
            tooltip: {},
            legend: {
                data:['users']
            },
            xAxis: {
                data: ["Users"]
            },
            yAxis: {},
            series: [{
                name: 'regists',
                type: 'line',
                data: [{{ $users->count() }}]
            }]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
    </script>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Pages</h4>
            <p>100 Million</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Sessions</h4>
            <p>10 Million</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Bounce</h4>
            <p>30%</p> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="well">
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- <table class="bar-chart">
<tr ng-repeat="jog in data | limitTo:-10">
<td> {{jog.date | date}} </td>
<td> {{jog.time | number}} Minutes </td>
<td> {{jog.distance | number}} Miles </td>
</tr>
</table> --}}

@endsection