  
@extends ('pages.dashboard')
@section('title','| Bar Charts')

@section('dashboard')
<form action="{{ route('barChart.show') }}"> <input type="month" name="month"  required=""> <button type="submit" >Make</button></form>
 <div class="well"  >
     
        <!-- prepare a DOM container with width and height -->
    <div id="main" style="width: 600px;height:400px;"></div>

    <script type="text/javascript">
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('main'));

        // specify chart configuration item and data
        var option = {

            title: {
                text: '{{ date('M', strtotime("$input")) }}' + ' Regists'
            },
            toolbox: {
            show : true,
             feature : {
                mark : {show: true},
                restore : {show: true},
                saveAsImage : {show: true}
                     }
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
                data: [@if (!empty($deliveries)) {{ $deliveries->count() }}@else "Empty Month" @endif,@if (!empty($drops)) {{  $drops->count() }}@else "Empty Month" @endif,@if (!empty($lostItems)) {{ $lostItems->count() }} @else "Empty Month" @endif, @if (!empty($meetings)) {{ $meetings->count() }}@else "Empty Month" @endif,@if (!empty($meetings)) {{ $visitors->count() }}@else "Empty Month" @endif]
            }]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
    </script>
      </div>

 
    @endsection