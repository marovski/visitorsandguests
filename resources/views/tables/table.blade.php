  
@extends ('pages.dashboard')
@section('title','| Tables')

@section('dashboard')
   <header class="panel-heading">
            
                <button onClick ="$('#table').tableExport({type:'pdf',escape:'false',pdfFontSize:12,separator: ','});" class="btn btn-default btn-xs pull-right">PDF</i></button>
                <button onClick ="$('#table').tableExport({type:'csv',escape:'false'});" class="btn btn-default btn-xs pull-right">CSV</button>
                <button onClick ="$('#table').tableExport({type:'excel',escape:'false'});" class="btn btn-default btn-xs pull-right">Excel</i></button>
                
            
            </header>
<input type="button" value="Drops" ng-click="ShowHide(1)">
 <div class="well"  ng-show="IsVisible"  >
     
     <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
     <div class="table-responsive">

                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>
                            <th width="">Company Name</th>
                            <th width="">Dropper Name</th> 
                            <th width="">Receiver Name</th>
                            <th width="">Drop Item</th>
                            <th width="">Dropped at</th>
                            <th width="">Received at</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($drops as $drop )
                            <tr>
                                <td>{{ $drop->dropperCompanyName }}</td>
                                <td>{{ $drop->dropperName }}</td>
                                <td>{{ $drop->dropReceiver }}</td>
                                <td>{{ $drop->dropDescr }}</td>
                                <td>{{ date('M j, Y H:i', strtotime($drop->droppedWhen)) }}</td>
                                <td>{{ $drop->dropReceivedDate ? date('M j, Y H:i', strtotime($drop->dropReceivedDate)) : '' }}</td>
                                <td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

       
        </div>
      </div>
<script>
 function myFunction() {
    var x = document.getElementById('myDIV');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>

      <input type="button" value="Delivers" onClick="myFunction()"> 
     <div id="myDIV" class="well" >
     <div class="table-responsive">

                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>
                            <th>Firm</th>
                            <th>Vehicle</th>
                            <th>Driver</th>
                            <th>Delivered At</th>
                            <th>Finished At</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        
                    @foreach ($delivers as $deliver)
                        
                        <tr>
                            <th>{{ $deliver->id }}</th>
                                <td>{{ $deliver->deFirmSupplier}}</td>
                                    <td>{{ $deliver->vehicleRegistry}}</td>
                                        <td>{{ $deliver->deDriverName}}</td>
                            <td>{{ date('M j, Y', strtotime($deliver->deEntryTime)) }}</td>
                            <td>{{ $deliver->deExitTime ? date('M j, Y', strtotime($deliver->deExitTime)) : '' }}</td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

       
        </div>
        </div>



 
    @endsection