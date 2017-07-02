
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
            @if(!isset($user->fk_idSecurity))
            @elseif($user->fk_idSecurity == 1)
            <h4>Your next meetings:</h4><hr>
                
                @foreach($meetings as $meet)

                    <div class="post" >
                        <h4><b>{{ $meet->meetingName }}</b></h4>{{ date('M j, Y H:i', strtotime($meet->meetStartDate)) }} 
                        <p>{{ substr(strip_tags($meet->visitorCompanyName), 0, 300) }}{{ strlen(strip_tags($meet->visitReason)) > 300 ? "..." : "" }}</p>
                        <a href="{{ url('meetings') }}" class="btn btn-primary btn-sm">See More</a>
                    </div>

                    <hr>

                @endforeach
                          
@else
 @foreach($meetingWithoutCheckin as $meet)

                    <div class="post" >
                        <h4><b>{{ $meet->meetingName }}</b></h4>{{ date('M j, Y H:i', strtotime($meet->meetStartDate)) }} 
                        <p>{{ substr(strip_tags($meet->visitorCompanyName), 0, 300) }}{{ strlen(strip_tags($meet->visitReason)) > 300 ? "..." : "" }}</p>
                        <a href="{{ url('meetings') }}" class="btn btn-primary btn-sm">See More</a>
                    </div>

                    <hr>

                @endforeach
               
@endif
                </div>
      
            
        <div class="col-md-3 col-md-offset-1">
    <h3 style="margin-left: 68px">Lost and Found</h3>
               
                @foreach($lostItems as $item)

                    <div class="mySlides" >
                       <b style="color: #0078ab;
    margin-left: 93px;">Category:

     


                       @if($item->itemCategory==1)
                       Electronic
                       @elseif($item->itemCategory==2)
                       Document
                       @elseif($item->itemCategory==3)
                       Money
                       @elseif($item->itemCategory==4)
                       Gadget
                       @elseif($item->itemCategory==5)
                       Cloth
                       @else Other
                       @endif
                     </b>
                      @if(!empty($item->photo))
            <div class="thumbnail">
               <div class="image">
       

              <img src="{{ asset('images/'. $item->photo)}}" height="150"  width="200" style="margin-left: 35px;" alt="Some awesome text"/>

             
      </div>
                </div>
                 @else
<h3>No photo available</h3>
             
              @endif
                     
                        <h5>Found Date: {{ $item->foundDate ? date('F j, Y', strtotime($item->foundDate)) : '' }}</h5>  
                        
                        <a href="{{ url('/losts/' . $item->idLostFound) }}" class="btn btn-primary btn-sm">See More</a>
                    </div>
                

                    <hr>

                @endforeach
                      <div class="tedelivert-center">
                 {!! $lostItems->links(); !!}
                     </div>

      <script>
            var myIndex = 0;
            carousel();
                         function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                 x[i].style.display = "none";  
             }
             myIndex++;
             if (myIndex > x.length) {myIndex = 1}    
                x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
</div>

      </div>
@endsection
  