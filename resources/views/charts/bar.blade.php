  
@extends ('pages.dashboard')
@section('title','| Bar Charts')

@section('dashboard')
<input type="button" value="Bar Chart" ng-click="ShowHide(1)">
 <div class="well"  ng-show="IsVisible"  >
     
        <!-- prepare a DOM container with width and height -->
    <div id="main" style="width: 600px;height:400px;"></div>
    <script type="text/javascript">
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('main'));

        // specify chart configuration item and data
        var option = {

            title: {
                text: '{{ date('F') }}' + ' Regists'
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

 
    @endsection