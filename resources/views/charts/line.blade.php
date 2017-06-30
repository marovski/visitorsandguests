@extends ('pages.dashboard')
@section('title','| Line Charts')

@section('dashboard')
<input type="button" value="Line Chart" ng-click="ShowHide(2)">

          <div class="well" ng-show="IsVisible2">
     
<canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['2016', '2017'],
    datasets: [{
      label: 'users',
      data: [12],
      backgroundColor: "rgba(153,255,51,0.4)"
    }]
  }
});
</script>
 </div>

@endsection