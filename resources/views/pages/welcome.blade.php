
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
            <h3>Your next meetings:</h3>
                
                @foreach($meetings as $meet)

                    <div class="post">
                        <h4>{{ $meet->meetingName }}</h4> <h5>at :</h5> {{ $meet->meetStartDate }} 
                        <p>{{ substr(strip_tags($meet->visitorCompanyName), 0, 300) }}{{ strlen(strip_tags($meet->visitReason)) > 300 ? "..." : "" }}</p>
                        <a href="{{ url('meetings/') }}" class="btn btn-primary btn-sm">See More</a>
                    </div>

                    <hr>

                @endforeach

            </div>
        <div class="col-md-3 col-md-offset-1">
    
    
<!-- start feedwind code --> 
<script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="30616/"></script> <!-- end feedwind code -->
        </div>
      </div>
@endsection
  