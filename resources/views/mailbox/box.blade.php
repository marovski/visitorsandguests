
@extends('main')
@section('title','| MailBox')
@section('assets')



@endsection
    @section('content')

<h1>Mailbox</h1>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Security Guard</th>    
                    <th>Message</th>    
                    <th>Date</th>    
                    <th>Time</th>    
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
  
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
      <td><a id="d" href="./professional.php?mailboxd=<?= $row[4]; ?>&if=<?= $row[5]; ?>">  Ver    <span class='icon-search'  title='ver'></span></a><a href="./professional.php?id=<?= $row[5]; ?>">   Eliminar     <span class='icon-remove-sign' title='eliminar'></span></a></td>
                    </tr>
                    <tr class="toggle2">
                        <td></td>

                    </tr> 
   
        </table>
    </div>


    @endsection