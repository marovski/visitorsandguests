
  @extends('main')
  @section('title','| HomePage')

    @section('content')

      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
          <img src="http://www.nanium.com/_gi/nanium-logo.svg">
            <h4 style="text-align: justify;text-align: center;">Welcome to NANIUM's Guests and Visitors Management System</h4>
          
       
          </div>
        </div>
      </div>
      <!-- end of header .row -->
      @if(!isset($user))
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Login Information</b></div>
                <div class="panel-body">

             <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="username" type="password" class="form-control" name="username" required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                           
                            </div>
                        </div>
                    </form>
             </div>
         </div>
     </div>
 </div>
</div>
@else
@endif

 <div class="row">
            <div class="col-md-8">
            @if(!isset($user->fk_idSecurity))
            @elseif($user->fk_idSecurity == 1)
            <h4>Your next meetings:</h4><hr>
                
                @foreach($hostMeetings as $meet)

                    <div class="post" >
                    <img src="/images/{{ Auth::user()->photo }}" style="width:32px; height:32px;border-radius:50%"></img>
                        <h4><b>{{ $meet->meetingName }}</b></h4>{{ date('M j, Y H:i', strtotime($meet->meetStartDate)) }} 
                        <p>{{ substr(strip_tags($meet->visitorCompanyName), 0, 300) }}{{ strlen(strip_tags($meet->visitReason)) > 300 ? "..." : "" }}</p>
                        <a href="{{ url('meetings') }}" class="btn btn-primary btn-sm">See More</a>
                    </div>

                    <hr>
                    
                @endforeach
                 {!! $hostMeetings->links(); !!}         
@else

            <h4>Next meetings:</h4><hr>
                @foreach($meetings as $meet)
                 <img src="/images/{{$userPhoto->find($meet->meetIdHost)->photo}}" style="width:32px; height:32px;border-radius:50%"></img>
                   
                    <div class="post" >
                        <h4><b>{{ $meet->meetingName }}</b></h4>{{ date('M j, Y H:i', strtotime($meet->meetStartDate)) }} 
                        <p>{{ substr(strip_tags($meet->visitorCompanyName), 0, 300) }}{{ strlen(strip_tags($meet->visitReason)) > 300 ? "..." : "" }}</p>
                        <a href="{{ url('meetings') }}" class="btn btn-primary btn-sm">See More</a>
                    </div>

                    <hr>

                @endforeach
                {!! $meetings->links(); !!}
@endif
                </div>
        @if(isset($user))    
        <div class="col-md-3 col-md-offset-1">
    <h4 style="margin-left: 68px">Lost and Found:</h4>
               
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
@else
@endif

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
  