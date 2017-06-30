
  @extends('main')
  @section('title','| HomePage')

    @section('content')
    
<div class="container-fluid" ng-app="MyApp">
  <div class="row content">
            <div class="col-sm-3 navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ ('/') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li {{ (Request::is('*dashboard.barcharts') ? 'class="active"' : '') }}> 
                            <a href="{{ route('dashboard.barcharts') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Charts</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li {{ (Request::is('*tables') ? 'class="active"' : '') }}>
                            <a href="{{ ('tables') }}"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li {{ (Request::is('*forms') ? 'class="active"' : '') }}>
                            <a href="{{ ('forms') }}"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                      
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>


   
    
    <div class="col-sm-9">

      <div class="row" >
        <div class="col-sm-3" style="width: 80%;" ng-controller="ShowController">
        <input type="button" value="Bar Chart" ng-click="ShowHide(1)">

         <input type="button" value="Line Chart" ng-click="ShowHide(2)">
        @yield('dashboard')

        </div>
       </div>
  </div>
</div>

{{-- option = {
    tooltip : {
        formatter: "{a} <br/>{b} : {c}%"
    },
    toolbox: {
        show : true,
        feature : {
            mark : {show: true},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    series : [
        {
            name:'业务指标',
            type:'gauge',
            detail : {formatter:'{value}%'},
            data:[{value: 50, name: '完成率'}]
        }
    ]
};

clearInterval(timeTicket);
timeTicket = setInterval(function (){
    option.series[0].data[0].value = (Math.random()*100).toFixed(2) - 0;
    myChart.setOption(option, true);
},2000); --}}

{{-- <table class="bar-chart">
<tr ng-repeat="jog in data | limitTo:-10">
<td> {{jog.date | date}} </td>
<td> {{jog.time | number}} Minutes </td>
<td> {{jog.distance | number}} Miles </td>
</tr>
</table> --}}

@endsection