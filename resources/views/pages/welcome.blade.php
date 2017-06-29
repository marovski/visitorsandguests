
  @extends('main')
  @section('title','| HomePage')

    @section('content')

      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
          <img src="http://www.nanium.com/_gi/nanium-logo.svg">
            <h4 style="text-align: justify;text-align: center;">Welcome to NANIUM's Visitors and Guests Management System</h4>
          
       
          </div>
        </div>
      </div>
      <!-- end of header .row -->

 <div class="row">
            <div class="col-md-8">
            <h3>Lost and Found items:</h3>
                
                @foreach($lostItems as $item)

                    <div class="lostitems">
                    <div class="thumbnail">
    <div class="image">
    <b>Item: {{ $item->itemCategory }}</b>
        <img  src="{{ asset('images/'. $item->photo)}}" height="150"  width="400" alt="Some awesome text"/>
    </div>
</div>
                     
                        <h5>Found Date:</h5> {{ $item->foundDate ? date('M j, Y H:i', strtotime($item->foundDate)) : '' }} 
                        
                        <a href="{{ url('/losts/' . $item->idLostFound) }}" class="btn btn-primary btn-sm">See More</a>
                    </div>
                

                    <hr>

                @endforeach
                      <div class="tedelivert-center">
                 {!! $lostItems->links(); !!}
                     </div>

            </div>
        <div class="col-md-3 col-md-offset-1">
    
    
<!-- start feedwind code --> 
<script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="30616/"></script> <!-- end feedwind code -->
        </div>
      </div>
@endsection
  